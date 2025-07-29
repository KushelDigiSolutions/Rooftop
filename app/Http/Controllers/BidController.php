<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Franchise;
use App\Models\ProductType;
use App\Models\Quotation;
use App\Models\QuotationItem;
use App\Mail\QuotationGeneratedMail;
use App\Models\Product;
use App\Models\QuotationSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Services\WhatsAppService;

class BidController extends Controller
{
    public function index()
        {
            if (!auth()->check()) {
                return redirect()->route('login')->with('error', 'Please login to access this page.');
                }

                $userRole = Auth::user()->getRoleNames()->first();

                $allowedRoles = ['Super Admin', 'Admin', 'Help Desk', 'Sub Contractor'];
                if (!in_array($userRole, $allowedRoles)) {
                    return redirect()->route('login')->with('error', 'You do not have permission to access this page.');
            }

            $user = Auth::user();
            $userRole = $user->getRoleNames()->first();  // Get first role if there are multiple
            if(!empty($user) && $userRole != 'Super Admin'){
                $franchise = Franchise::where('user_id',$user->id)->first();
            }
            // Constants for status values
            $statusPending = "0";
            $statusComplete = "1";
            $quotationQuery = Quotation::query();
            // If the user is a "Franchise", filter the quotations by franchise_id

            if ($userRole === 'Franchise') {
                $quotationQuery->where('franchise_id', $franchise->id);
            }

            // Get the list of all quotations (without filtering by status)

            $quotationList = $quotationQuery->get();

            // Clone the query builder for counting quotations by status

            $quotationQueryForCount = clone $quotationQuery;
            // Count the number of pending quotations

            $quotationListPending = $quotationQueryForCount
                ->where('status', $statusPending)
                ->count();

            // Clone the query builder again for fetching completed quotations

            $quotationQueryForComplete = clone $quotationQuery;

            // Retrieve the list of completed quotations

            $quotationListComplete = $quotationQueryForComplete
                ->where('status', $statusComplete)
                ->count();

            return view('admin.quotation.index', compact('quotationList', 'quotationListPending', 'quotationListComplete'));
        }
    public function create($appointment_id)
    {   

        $data['appointment_id'] = $appointment_id;
        $data['appointment_data'] = Appointment::where('id',$appointment_id)->first();
        $data['product_type'] = Product::distinct('tally_code')->with('ProductType')->get();
        // dd($data);
        return view("admin.bid.create", $data);

    }
}
