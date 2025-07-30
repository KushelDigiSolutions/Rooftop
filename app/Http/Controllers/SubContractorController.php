<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ZipCode;
use App\Models\MasterCity;
use App\Models\Franchise;
use App\Models\Quotation;
use App\Models\QuotationItem;
use App\Models\Subcontractor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\FranchiseRegistrationMail;

class SubContractorController extends Controller
{
    //
    public function sub_contractor(){
        $cityStateData = ZipCode::orderBy('state')->orderBy('city')->get();
        $groupedCityStateData = $cityStateData->groupBy('state')->map(function ($items) {
            return $items->pluck('city')->unique()->values();
        });
       return view('admin.sub_contractor.index',compact("groupedCityStateData"));
    }

    public function createSubcontractor(){
        return view('admin.sub_contractor.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());    
        $request->validate([
        'company_name' => 'required|string|max:255',
        'contact_person' => 'required|string|max:255',
        'phone' => 'required|digits:10',
        'email' => 'required|email|unique:subcontractors,email',
        'city' => 'required|string',
        'state' => 'required|string',
        'zip_code' => 'required|digits:6',
        'specialization' => 'required|string',
        'experience_years' => 'required|integer|min:0',
        'availability_status' => 'required|in:Active,Inactive',
        'payment_method' => 'required|string',
        'contract_signed' => 'required|in:Yes,No',
        'office_address' => 'required|string',
        'service_areas' => 'nullable|string',
        'license_number' => 'nullable|string',
        'insurance_certificate' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        'bank_details' => 'nullable|string',
        ]);

    
        $imagePath = null;
        if ($request->hasFile('insurance_certificate')) {
            $file = $request->file('insurance_certificate');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/insurance'), $filename);
            $imagePath = 'uploads/insurance/' . $filename;
        }
        // $validated['status'] = 'pending';
        // Subcontractor::create($validated);
        Subcontractor::create([
            'company_name'        => $request->company_name,
            'contact_person'      => $request->contact_person,
            'phone'               => $request->phone,
            'email'               => $request->email,
            'city'                => $request->city,
            'state'               => $request->state,
            'zip_code'            => $request->zip_code,
            'specialization'      => $request->specialization,
            'license_number'      => $request->license_number,
            'experience_years'    => $request->experience_years,
            'availability_status' => $request->availability_status,
            'payment_method'      => $request->payment_method,
            'contract_signed'     => $request->contract_signed,
            'office_address'      => $request->office_address,
            'service_areas'       => $request->service_areas,
            'bank_details'        => $request->bank_details,
            'insurance_certificate'        => $imagePath,
            
        ]);


        return response()->json(['status' => 'success', 'message' => 'Subcontractor added successfully.']);
    }   

    public function edit($id)
    {
        $subcontractor = Subcontractor::findOrFail($id);
        return view('admin.sub_contractor.edit', compact('subcontractor'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'company_name' => 'required',
        'contact_person' => 'required',
        'phone' => 'required|regex:/^[6-9]\d{9}$/',
        'email' => 'required|email|unique:subcontractors,email,' . $id,
        'city' => 'required',
        'state' => 'required',
        'zip_code' => 'required|digits:6',
        'specialization' => 'required',
        'experience_years' => 'required|numeric',
        'availability_status' => 'required',
        'payment_method' => 'required',
        'contract_signed' => 'required',
        'office_address' => 'required',
    ]);

    $subcontractor = Subcontractor::findOrFail($id);
    $subcontractor->fill($request->except('insurance_certificate'));

    if ($request->hasFile('insurance_certificate')) {
        $file = $request->file('insurance_certificate');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/insurance'), $filename);
        $subcontractor->insurance_certificate = $filename;
    }

    $subcontractor->save();

    return response()->json(['success' => true]);
}

    public function getSubcontractorData(Request $request){
        $statusMap = [
            
            "pending" => "1",
            "active" => "2",
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
               "pending" => "1",
          	  "active" => "2",
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
            $query = Subcontractor::query();
            if ($statusInput && isset($statusMap[$statusInput])) {
                $query->where("status", $statusMap[$statusInput]);
            }
            $query->where("status", "!=", "0");
            $franchises = $query->orderBy('id', 'desc')->get()->toArray();
        }

        // Return the data as a JSON response
        return response()->json([
            "data" => $franchises,
            "role" => Auth::user()->getRoleNames()[0] ?? "",
        ]);
    }
	
	public function generateSecurePassword($length = 8)
    {
        $uppercase = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $lowercase = "abcdefghijklmnopqrstuvwxyz";
        $numbers = "0123456789";
        $specialChars = '!@#$%^&*()_+-=[]{}|;:,.<>?';

        // Create the password with at least one of each type
        $password = [
            $uppercase[random_int(0, strlen($uppercase) - 1)],
            $lowercase[random_int(0, strlen($lowercase) - 1)],
            $numbers[random_int(0, strlen($numbers) - 1)],
            $specialChars[random_int(0, strlen($specialChars) - 1)],
        ];

        // Fill the rest of the password length with random characters
        $allChars = $uppercase . $lowercase . $numbers . $specialChars;
        for ($i = 4; $i < $length; $i++) {
            $password[] = $allChars[random_int(0, strlen($allChars) - 1)];
        }
        // Shuffle the password array to ensure randomness
        shuffle($password);

        return implode("", $password);
    }
	
	public function active($id)
    {
		
        $subcontractor = Subcontractor::findOrFail($id);
		//dd($subcontractor);
        // Check if the email already exists in the 'users' table
        $existingUser = User::where("email", $subcontractor->email)->first();
        if ($existingUser) {
            return redirect()
                ->back()
                ->with("error", "A user with this email already exists.");
        }

        //$password = $this->generateSecurePassword(8);
		$password = 'password';

        $user = User::create([
            "name" => $subcontractor->contact_person,

            "email" => $subcontractor->email,
			
			"subContract_id" => $subcontractor->id,

            "password" => Hash::make($password), // Use a secure method for passwords
        ]);

        // Assign franchise role to the user

        $user->assignRole("Sub Contractor");

        // Save additional franchise data

       // $lastFranchiseId = Franchise::max("franchise_id");
       // $nextFranchiseId = $this->generateNextCode($lastFranchiseId, "FR");

       
        // Send email notification

       
		$data = [
             "name" => $subcontractor->contact_person,

             "email" => $subcontractor->email,

            "password" => $password,
            
        ];
        Mail::to($subcontractor->email)->send(
            new FranchiseRegistrationMail($data)
        );

         // send whatsaap Message
       
	$subcontractor->status = 2; // 2 = active
    $subcontractor->save();


        return redirect()
            ->back()
            ->with(
                "success",
                "Sub-Contract approved and user created successfully."
            );
    }

    public function destroy($id)
    {
        $subcontractor = SubContractor::findOrFail($id);
        $subcontractor->delete();

        return response()->json(['success' => true]);
    }
}
