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
    public function create($appointment_id)
    {   

        $data['appointment_id'] = $appointment_id;
        $data['appointment_data'] = Appointment::where('id',$appointment_id)->first();
        $data['product_type'] = Product::distinct('tally_code')->with('ProductType')->get();
        // dd($data);
        return view("admin.bid.create", $data);

    }
}
