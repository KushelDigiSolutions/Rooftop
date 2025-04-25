<?php

namespace App\Http\Controllers\Lead;

use App\Http\Controllers\Controller;
use App\Models\Lead\LeadModel;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;

class leadCustomer extends Controller
{
    public function convert($id)
    {
        // Lead ko find karo
        $lead = LeadModel::findOrFail($id);

        // Check karo agar lead already converted hai
        if ($lead->is_converted) {
            return back()->with('error', 'Already converted.');
        }

        // Email generate karo, agar email nahi hai to
        $email = $lead->email ?? 'user' . $lead->id . '@example.com';

        // Check karo agar email already exist karta hai
        if (User::where('email', $email)->exists()) {
            return back()->with('error', 'This email already exists in users. Cannot convert.');
        }

        // Random password generate karo
        $password = Str::random(8);

        // Naya user banao
        $user = User::create([
            'name'        => $lead->full_name,
            'lead_id'     => $lead->id,
            'email'       => $email,
            'password'    => Hash::make($password),
            'is_customer' => true,
        ]);

        // Role assign karo
        $user->assignRole('Customer Login');

        // Mail bhejna agar email available hai
        if ($lead->email) {
            $message = "Welcome {$lead->full_name},\n\nYour login details:\nEmail: {$email}\nPassword: {$password}";
            Mail::raw($message, function ($msg) use ($email) {
                $msg->to($email)->subject('Your Login Details');
            });
        }

        // Lead ko converted mark karo
        $lead->is_converted = true;
        $lead->save();

        return back()->with('success', 'Lead converted to customer successfully.');
    }

    public function customerList()
    {
        $customerdata = LeadModel::join('users', 'lead_models.email', '=', 'users.email')
            ->select('lead_models.*', 'users.id as user_id', 'users.name as user_name')
            ->get();

        $totalCustomer = $customerdata->count();

        return view('Coustomer.coustomer', compact('customerdata', 'totalCustomer'));
    }

    public function getCustomerDetails($id)
    {
        $customer = LeadModel::with('user')->find($id);

        if ($customer) {
            return response()->json([
                'status' => 'success',
                'data'   => $customer,
            ]);
        }

        return response()->json([
            'status'  => 'error',
            'message' => 'Customer not found.',
        ], 404);
    }
  

    public function updateCustomerStatus(Request $request, $id)
{
    // Validate the incoming request data
        $request->validate([
         'status'=>"required|in:prospect,dead,in_progress,active,completed,confirmed",
        ]);

    // Find the customer by user ID (assuming 'user_id' is the foreign key in the LeadModel)
    $customer = LeadModel::where('user_id', $id)->first();

    if ($customer) {
        // Update the customer status
        $customer->status = $request->input('status'); // Using `input()` ensures you're correctly fetching the status
        $customer->save();

        // Redirect back with success message
        return back()->with('success', 'Customer status updated successfully.');
    }

    // Return error if customer not found
    return back()->with('error', 'Customer not found.');
}


}
