<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use function PHPUnit\Framework\returnSelf;

class JobsController extends Controller
{

    public function index()
    {
        $jobs = Job::join('users', 'jobs.customer_id', '=', 'users.id')
           ->orderBy('jobs.created_at', 'desc')
           ->paginate(10);

        return view("admin.jobs.index", compact('jobs'));




    }
    public function create()
    {

        $custumers = User::where('role', 'Customer')->get();
        return view("admin.jobs.create", compact('custumers'));

    }
    public function store(Request $request)
    {


        $request->validate([
            'customer_id' => 'required|exists:users,id',
            'source' => 'required|string|max:255',
            'mobile_number' => 'required|digits_between:10,12',
            'email' => 'required|email|unique:jobs,email|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'zip_code' => 'required|string|max:10',
        ]);



        Job::create([
            'customer_id' => $request->input("customer_id"), // Storing customer ID instead of name
            'mobile_number' => $request->input("mobile_number"),
            'email' => $request->input("email"),
            'city' => $request->input("city"),
            'state' => $request->input("state"),
            'country' => $request->input("country"),
            'zip_code' => $request->input("zip_code"),
        ]);



        return redirect()
            ->route("Jobs.index")
            ->with("success", "User created successfully!");
    }
}
