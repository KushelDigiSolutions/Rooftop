<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
class SubContractorsController extends Controller
{
   
       
        public function index()
        {
            
            $customers = User::where('role', 'Sub Contractor')->get() ?? collect();
            return view('admin.sub-contractors.index', compact("customers"));
            
                 
    
        }
        public function create()
        { 
                return view("admin.sub-contractors.create");    
        }public function store(Request $request)
        {
            $request->validate([
                "name" => "required|string|max:255",
                "mobile_number" => "required|digits_between:10,12",
                "email" => "required|email|unique:users,email|max:255",
                "city" => "required|string|max:255",
                "state" => "required|string|max:255",
                "country" => "required|string|max:255",
                "zip_code" => "required|string|max:10",
                "password" => "required|string|min:8|confirmed",
                'experience' => 'required|numeric|min:0',
                "password_confirmation" => "required|string|min:8",
            ]);
        
           
        
            // Create User
            $user = User::create([
                "name" => $request->input("name"),
                "mobile_number" => $request->input("mobile_number"),
                "email" => $request->input("email"),
                "city" => $request->input("city"),
                "state" => $request->input("state"),
                "country" => $request->input("country"),
                "zip_code" => $request->input("zip_code"),
                "password" => bcrypt($request->input("password")),
                "role" => "Sub Contractor",
                'experience' => $request->input('experience'),
                
            ]);
        
            return redirect()
                ->route("admin.sub-contractors.index")
                ->with("success", "Sub Contractor created successfully!");
        }
        public function show()
        {
            $customers = User::where('role', 'Sub Contractor')->get();
            return view("admin.subContractor.show", compact("customers"));
        }
        
    
    }
    
    
    

