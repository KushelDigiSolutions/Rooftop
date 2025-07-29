<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\User;
use App\Models\ZipCode;
use App\Mail\UserRegistrationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Models\Franchise;
use App\Models\Quotation;
use App\Models\QuotationItem;
use DB;

class CustomerController extends Controller
{
    public function index()
    {
        // dd(Auth::user());
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please login to access this page.');
        }

        $userRole = Auth::user()->getRoleNames()->first();

        $allowedRoles = ['Super Admin', 'Admin', 'Help Desk', 'Franchise'];
        if (!in_array($userRole, $allowedRoles)) {
            return redirect()->route('login')->with('error', 'You do not have permission to access this page.');
        }

        $user = Auth::user();
       
        
        $appointments = collect(); 

        // $appointmentsQuery = Appointment::with('franchise')->where("status", "!=", "0");
        $appointmentsQuery = Appointment::with('quotation') ->whereNotIn('status', [0, 1]);

        if ($userRole == "Franchise") {
            $franchise = Franchise::where("user_id", $user->id)->first();
            if ($franchise) {
                $appointments = $appointmentsQuery
                    ->where("franchise_id", $franchise->id)
                    ->get();
                $statusCounts = $appointments->groupBy("status")->map->count();

                $pendingCount = $statusCounts->get("2", 0);
                $completedCount = $statusCounts->get("4", 0);
                $holdCount = $statusCounts->get("3", 0);
                $assignedCount = $rejectCount = 0;
            } else {
                $pendingCount = $completedCount = $holdCount = $assignedCount = $rejectCount = 0;
            }
        } elseif (in_array($userRole, ["Admin", "Super Admin","Help Desk"])) {
            $appointments = $appointmentsQuery->get();
            $statusCounts = $appointments->groupBy("status")->map->count();

            // Access counts for all statuses
            $pendingCount = $statusCounts->get("1", 0);
            $rejectCount = $statusCounts->get("5", 0);
            $assignedCount = $statusCounts->get("2", 0);
            $completedCount = $statusCounts->get("4", 0);
            $holdCount = $statusCounts->get("3", 0);
        }

        $assignedAppointments = Appointment::join(
            "franchises",
            "appointments.franchise_id",
            "=",
            "franchises.id"
        )
            ->join("users", "users.id", "=", "franchises.user_id")
            ->select("appointments.*", "users.name as franchise_name")
            ->where("appointments.status", "2")
            ->with('franchise')
            ->get();
            

        $franchises = Franchise::orderBy("id", "desc")->get();
        // dd($appointments[0]->quotation);    
        return view(
            "admin.customers.index",
            compact(
                "appointments",
                "pendingCount",
                "rejectCount",
                "assignedCount",
                "completedCount",
                "holdCount",
                "assignedAppointments",
                "franchises"
            )
        );
    }

    public function getCustomerData(Request $request)
    {
    //   dd($request->all());
        $statusMap = [
            
            "pending" => "7",
            "assign" => "2",
            "complete" => "4",
            "sent_bid" => "3",
            "sent_contract" => "9",
            "rejected" => "5",
            "prospect" => "8",
            "dead" => "10",
			"approve_contract" => "11",
			"active" => "12",
        ];
        

        // $status = $request->input("status", "7");
        // $status = $statusMap[$status] ?? "7";
        $statusInput = $request->input("status");
		//dd($statusInput);
        $franchises = [];

        // Check if the user is a Franchise or Admin/Super Admin
        $userRole = Auth::user()->getRoleNames()[0];

        if ($userRole === "Franchise") {
            // Fetch Franchise-specific appointments
            $statusMap = [
                "pending" => "2",
                "complete" => "4",
                "sent_bid" => "3",
                "rejected" => "5",
                "prospect" => "7",
                // "prospect" => "8",
            ];

            // $status = $request->input("status");
            $status = $statusMap[$status] ?? null;
            $franchiseDetail = Franchise::where(
                "user_id",
                Auth::user()->id
            )->first();
            if ($franchiseDetail) {
                $franchises = Appointment::where("status", $status)
                    ->where("franchise_id", $franchiseDetail->id)
                    ->with('franchise')
                    ->orderBy('id', 'desc')
                    ->get()
                    ->toArray();
            }
        } elseif (in_array($userRole, ["Admin", "Super Admin","Help Desk"])) {
            
            $query = Appointment::with('quotation');
            if ($statusInput && isset($statusMap[$statusInput])) {
                $query->where("status", $statusMap[$statusInput]);
            }
            $query->where("status", "!=", "1");
            $franchises = $query->orderBy('id', 'desc')->get()->toArray();
        }

        // Return the data as a JSON response
        return response()->json([
            "data" => $franchises,
            "role" => Auth::user()->getRoleNames()[0] ?? "",
        ]);
    }  
    public function bidsStore(Request $request){
        dd($request->all());
    }
    public function convertToCustomer(Request $request)
    {
        $request->validate([
            'lead_id' => 'required|exists:appointments,id',
        ]);
        DB::beginTransaction();
        try {
        $appointment = Appointment::findOrFail($request->lead_id);
        $email = $appointment->email;
        $emailPrefix = explode('@', $email)[0];
        $randomPassword = $emailPrefix . rand(1000, 9999);
        
        $user = new User();
        $user->name = $appointment->name;
        $user->email = $email;
        $user->lead_id = $request->lead_id;
        $user->password = Hash::make('password');
        $user->save();
        if (Role::where('name', 'Customer')->exists()) {
            $user->assignRole('Customer');
        }
        $mailData = [
            'name' => $user->name,
            'email' => $user->email,
            'password' => 'password',
        ];
        
        $appointment->status = $request->status;
        $appointment->save();
        DB::commit();
        return redirect()
                ->back()
                ->with('success', 'Customer has been added successfully!');
    } catch (\Exception $e) {
        DB::rollBack(); // Rollback on error
        return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
    }
    }
	
	public function closeAndProspect(Request $request){
        // dd($request->all());
        $request->validate([
            'lead_id' => 'required|exists:appointments,id',
        ]);
        DB::beginTransaction();
        try {
        $appointment = Appointment::findOrFail($request->lead_id);
       
        // Mail::to($user->email)->send(new UserRegistrationMail($mailData));
        $appointment->status = $request->status;
        $appointment->save();
        DB::commit();
        return redirect()
                ->back()
                ->with('success', 'Customer go to close and prospect!');
    } catch (\Exception $e) {
        DB::rollBack(); // Rollback on error
        return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
    }
    }
	
	public function closeAndDead(Request $request){
        // dd($request->all());
        $request->validate([
            'lead_id' => 'required|exists:appointments,id',
        ]);
        DB::beginTransaction();
        try {
        $appointment = Appointment::findOrFail($request->lead_id);
       
        // Mail::to($user->email)->send(new UserRegistrationMail($mailData));
        $appointment->status = $request->status;
        $appointment->save();
        DB::commit();
        return redirect()
                ->back()
                ->with('success', 'Customer go to close and dead!');
    } catch (\Exception $e) {
        DB::rollBack(); // Rollback on error
        return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
    }
    }
	
	   private function generateNextCode($lastCode, $prefix)
    {
        if (!$lastCode) {
            return $prefix . "000001";
        }
        $numberPart = (int) substr($lastCode, strlen($prefix));
        $nextNumber = str_pad($numberPart + 1, 6, "0", STR_PAD_LEFT);
        return $prefix . $nextNumber;
    }

	
	public function createDirectCustomer(Request $request){
        // dd($request->all());
        //$request->validate([
           // 'lead_id' => 'required|exists:appointments,id',
        //]);
		$validatedData = $request->validate([
            "name" => "required|string|max:255",
            "email" => "required|email",
            "mobile" => "required|digits_between:10,15",
            "address" => "required|string|max:255",
            "type_property" => "required",
            "requirement_type" => "required|string",
            "lead_source" => "required|string",
            "notes" => "nullable",
			"user_id" => "nullable",
            "city" => "required",
            "state" => "required",
            "country" => "required",
            "pincode" => "required",
            "scope_work" => "required|string",
			
        ]);
        DB::beginTransaction();
        try {
        
        $lastAppointmentId = Appointment::max("uniqueid");

        $nextAppointmentId = $this->generateNextCode($lastAppointmentId, "LD");

        $validatedData["uniqueid"] = $nextAppointmentId;

        $appointment = Appointment::create($validatedData);
			
			
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
       $user->lead_id = $appointment->id;
        $user->password = Hash::make('password');
        $user->save();
        if (Role::where('name', 'Customer')->exists()) {
            $user->assignRole('Customer');
        }
			
			
        $mailData = [
            'name' => $user->name,
            'email' => $user->email,
			
            'password' => 'password',
        ];
        // Mail::to($user->email)->send(new UserRegistrationMail($mailData));
        $appointment->status = '7';
        $appointment->save();
        DB::commit();
        return redirect()
                ->back()
                ->with('success', 'Customer has been added successfully!');
    } catch (\Exception $e) {
        DB::rollBack(); // Rollback on error
        return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
    }
    }
	
public function create()
    {
        // $cityStateData = MasterCity::orderBy('state_name')->orderBy('city_name')->get();
        // $groupedCityStateData = $cityStateData->groupBy("state_name");
        $cityStateData = ZipCode::where('status', 'active') // 👈 Filter only active
        ->orderBy('state')
        ->orderBy('city')
        ->get();
        $groupedCityStateData = $cityStateData->groupBy('state')->map(function ($items) {
            return $items->pluck('city')->unique()->values();
        });
        // dd($groupedCityStateData);
			$customer = User::where('status', 'active')->get();
	//	dd($customers);
        return view("admin.customers.create", compact("groupedCityStateData","customer"));
    }

    public function myBid()
    {
        if (!auth()->check()) {
                return redirect()->route('login')->with('error', 'Please login to access this page.');
                }

                $userRole = Auth::user()->getRoleNames()->first();
                $allowedRoles = ['Customer'];
                if (!in_array($userRole, $allowedRoles)) {
                    return redirect()->route('login')->with('error', 'You do not have permission to access this page.');
            }

            $user = Auth::user();
            // dd($user);
            $userRole = $user->getRoleNames()->first();  // Get first role if there are multiple
            
            // Constants for status values
            $statusPending = "0";
            $statusComplete = "1";
            $quotationList = Quotation::where('appointment_id',$user->lead_id)->get();
            // dd($quotationList);
            // If the user is a "Franchise", filter the quotations by franchise_id

            if ($userRole === 'Franchise') {
                $quotationQuery->where('franchise_id', $franchise->id);
            }

            // Get the list of all quotations (without filtering by status)

            // $quotationList = $quotationQuery->get();

            // Clone the query builder for counting quotations by status


            return view('customer.bids.mybid', compact('quotationList'));
    }

    public function getQuotationsData(Request $request)

    {


        $user = Auth::user();
        if(!empty($user)){
            $franchise = Franchise::where('user_id',$user->id)->first();
        }
        $userRole = $user->getRoleNames()->first();  // Get first role if there are multiple

        // Initialize default query builder for all quotations
        $quotationQuery = Quotation::query();
        

        $quotationList = $quotationQuery->with('franchise')->where('appointment_id',$user->lead_id)->get();
        
       // return response()->json(['data' => $quotationList]);
		return response()->json(['data' => $quotationList,  'role' => $user->getRoleNames()->first()]);
    }
	
}
