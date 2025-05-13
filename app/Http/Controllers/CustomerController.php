<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\User;
use App\Mail\UserRegistrationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Models\Franchise;
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
        $appointmentsQuery = Appointment::with('franchise') ->whereNotIn('status', [0, 1]);

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
        // dd($appointments);    
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
      
        $statusMap = [
            
            "pending" => "1",
            "assign" => "2",
            "complete" => "4",
            "sent_bid" => "3",
            "sent_contract" => "9",
            "rejected" => "5",
            "prospect" => "7",
        ];
        

        // $status = $request->input("status", "7");
        // $status = $statusMap[$status] ?? "7";
        $statusInput = $request->input("status");
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
            // $franchises = Appointment::where("status", $status)
            //     ->with('franchise')
            //     ->orderBy('id', 'desc')
            //     ->get()
            //     ->toArray();
            $query = Appointment::with('franchise');
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
    public function convertToCustomer(Request $request){
        // dd($request->all());
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
        $user->password = Hash::make($randomPassword);
        $user->save();
        if (Role::where('name', 'Customer')->exists()) {
            $user->assignRole('Customer');
        }
        $mailData = [
            'name' => $user->name,
            'email' => $user->email,
            'password' => $randomPassword,
        ];
        Mail::to($user->email)->send(new UserRegistrationMail($mailData));
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
}
