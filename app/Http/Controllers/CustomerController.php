<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
   
    public function index()
    {
        
        $customers = User::where('role', 'Customer')->get() ?? collect();
        return view("admin.Customer.index", compact("customers"));
        
             

    }
    public function create()
    {
      
            return view("admin.Customer.create"); 
       
    }
    public function store(Request $request)
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
            "role" => "Customer"
            
        ]);
    
        return redirect()
            ->route("Customer.index")
            ->with("success", "User created successfully!");
    }
    public function show()
    {
        $customers = User::where('role', 'Customer')->get();
        return view("admin.Customer.show", compact("customers"));
    }
    

}


