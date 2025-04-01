<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReferralController extends Controller
{
    public function index()
    {
        $vendor = auth()->user();
        if ($vendor) {
            return view("admin.referral.index"); 
        }

        return redirect()->route('login'); 
    }
    public function create()
    {
        $vendor = auth()->user();
        if ($vendor) {
            return view("admin.referral.create"); 
        }

        return redirect()->route('login'); 
    }
}
