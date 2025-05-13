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

class ContractController extends Controller
{
    public function create($appointment_id)
    {   
        $order_data = Quotation::with('appointment', 'franchise', 'quotaitonItem','quotaiton_section')->where('appointment_id',$appointment_id)->first();
         return view('admin.contract.create', compact('order_data'));

    }
}
