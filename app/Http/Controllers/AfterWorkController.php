<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AfterWorkController extends Controller
{
    public function index()
    {
        $vendor = auth()->user();
        if ($vendor) {
            return view("admin.jobs.work_after.index"); // Ensure this matches the file path
        }

        return redirect()->route('login'); // Redirect if not authenticated
    }
    public function create()
    {
        $vendor = auth()->user();
        if ($vendor) {
            return view("admin.jobs.work_after.create"); // Ensure this matches the file path
        }
        return redirect()->route('login'); // Redirect if not authenticated
    }
}
