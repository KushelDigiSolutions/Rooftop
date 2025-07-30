<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Franchise;
use App\Models\ProductType;
use App\Models\Quotation;
use App\Models\QuotationItem;
use App\Models\Job; 

use App\Models\Contract; 
use App\Mail\QuotationGeneratedMail;
use App\Mail\SendContractMail;
use App\Models\Product;
use App\Models\QuotationSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Services\WhatsAppService;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
// use PDF; // barryvdh/laravel-dompdf


class ContractController extends Controller
{
    public function create($appointment_id,$qoutation_id)
    {  
		 $appointment = Appointment::findOrFail($appointment_id);
         $qoutationId = $qoutation_id;
		// dd($qoutationId);
        $order_data = Quotation::with('appointment', 'franchise', 'quotaitonItem','quotaiton_section')->where('appointment_id',$appointment_id)->first();
         return view('admin.contract.create', compact('order_data','appointment','qoutationId'));

    }
	
	
	public function sendContractToCustomer($appointment_id)
{
		
    $order_data = Quotation::with('appointment', 'franchise', 'quotaitonItem','quotaiton_section')
                    ->where('appointment_id', $appointment_id)->first();
    $lead_data = Appointment::where('id', $appointment_id)->firstOrFail();
    if (!$order_data || !$order_data->appointment || !$order_data->appointment->email) {
        return back()->with('error', 'Invalid appointment or email not found.');
    }
//dd($order_data);
    Mail::to($order_data->email)->send(new SendContractMail($order_data));
	$lead_data->status = 9+1;
	$lead_data->save();
    return back()->with('success', 'Contract sent to customer email successfully.');
}
	
	public function generateNextCode($lastCode, $prefix)
{
    if (!$lastCode) {
        return $prefix . '0001';
    }

    $number = (int) str_replace($prefix, '', $lastCode);
    return $prefix . str_pad($number + 1, 4, '0', STR_PAD_LEFT);
}
	
public function approve($token) {
    try {
		
		$contract = Quotation::where('unique_id', $token)->firstOrFail();
        
        // Find the related lead
        $lead_data = Appointment::where('id', $contract->appointment_id)->firstOrFail();

        // Check if both are already approved
        if ($contract->client_approval == 1 && $lead_data->client_approval == 1) {
            return view('admin.contract.already_approved', [
                'message' => 'You have already approved this contract.'
            ]);
        }
        // Start DB transaction
        DB::beginTransaction();

        $contract = Quotation::where('unique_id', $token)->firstOrFail();
        $lead_data = Appointment::where('id', $contract->appointment_id)->firstOrFail();

       $contract->status = '0';
		$contract->client_approval = 1;
		$lead_data->status = 11+1;
        $lead_data->client_approval = 1;
		

        // Save both models
        $contractSaved = $contract->save();
        $leadSaved = $lead_data->save();
		$lead_data_refreshed = $lead_data->fresh();
        // If both saved successfully, commit
        if ($contractSaved && $leadSaved) {
            DB::commit();
			$lastJobCode = Job::max('job_code');
            $nextJobCode = $this->generateNextCode($lastJobCode, 'JOB');
			
			Job::create([
                'quotation_id' => $contract->id,
                'job_code' => $nextJobCode,
                'lead_id' => $contract->appointment_id,
                'status' => '0',
                'start_date' => null,
                'end_date' => null,
            ]);
            return view('admin.contract.thankyou', ['message' => 'Thank you! You have approved the contract.']);
        } else {
            // Something failed, rollback
            DB::rollBack();
            return view('admin.contract.fail', ['error' => 'Unable to update approval status. Please try again.']);
        }

    } catch (\Exception $e) {
        // Rollback on any error
        DB::rollBack();

        return view('admin.contract.fail', ['error' => $e->getMessage()]);
    }
}

public function commentForm($token) {
    $contract = Quotation::where('unique_id', $token)->firstOrFail();
    return view('admin.contract.comment_form', compact('contract'));
}

public function submitComment(Request $request ) {
	//dd($request->all());
    $request->validate([
        'comment' => 'required|string|max:1000',
    ]);

    DB::beginTransaction();
    try {
        $contract = Quotation::where('unique_id', $request->token)->firstOrFail();
        $lead_data = Appointment::where('id', $contract->appointment_id)->firstOrFail();

        $contract->comment = $request->comment;
        $lead_data->comment = $request->comment;

        $contract->save();
        $lead_data->save();

        DB::commit();
        return view('admin.contract.thankyouComment', ['message' => 'Thank you! Your comment has been submitted.']);
    } catch (\Exception $e) {
        DB::rollBack();
        return view('admin.contract.error', ['error' => $e->getMessage()]);
    }
}
	
	public function store(Request $request)
{
    $request->validate([
        'quotation_id' => 'required|exists:quotations,id',
        'customer_name' => 'required|string',
        'contract_terms' => 'required|string',
        'start_date' => 'required|date',
    ]);

    $contract = Contract::create([
        'quotation_id' => $request->quotation_id,
        'customer_name' => $request->customer_name,
        'contract_terms' => $request->contract_terms,
        'start_date' => $request->start_date,
        'remarks' => $request->remarks,
        'status' => 'draft',
    ]);

    Quotation::where('id', $request->quotation_id)->update(['status' => "1"]);

    return redirect()->route('contracts.index')->with('success', 'Contract created successfully.');
}
public function preview(Request $request)
{
    // dd($request->all());
    $baseValidation = [
        'appointment_id' => 'nullable|exists:appointments,id',
        'qoutationId' => 'nullable',
        'customer_name' => 'nullable|string',
        'mobile' => 'nullable|string',
        'email' => 'nullable|string',
        'contract_date' => 'nullable|string',
        'street' => 'nullable|string',
        'city_state_zip' => 'nullable|string',
        'roof_type' => 'nullable|string',
        'roof_color' => 'nullable|string',
        'scope_of_work' => 'nullable|string',
        'notes' => 'nullable|string',
        'est_start' => 'nullable|string',
        'est_end' => 'nullable|string',
        'week_of' => 'nullable|string',
        'price' => 'nullable|numeric',
        'installments' => 'nullable|array'
    ];

    // Add dynamic payment schedules
    foreach ($request->all() as $key => $value) {
        if (preg_match('/payment_schedule_\d+_(date|amount)/', $key)) {
            $baseValidation[$key] = 'nullable|string';
        }
    }
    $data = $request->validate($baseValidation);
    // dd($data);
    $order_data = Quotation::with('appointment', 'franchise', 'quotaitonItem','quotaiton_section')->find($request->qoutationId);
    // dd($order_data);
    
    return view('admin.contract.preview', compact('data','order_data'));
}

	
	public function confirm(Request $request)
{
    // dd($request->all());
    $request->validate([
        'appointment_id' => 'nullable|exists:appointments,id',
        'customer_name' => 'nullable|string',
        'qoutationId' => 'nullable|string',
        'roof_type' => 'nullable|string',
        'roof_color' => 'nullable|string',
        'scope_of_work' => 'nullable|string',
        'notes' => 'nullable|string',
        'est_start' => 'nullable|string',
        'est_end' => 'nullable|string',
        'price' => 'nullable|string',
        'installments' => 'nullable|array'
    ]);

     $contract = Contract::create([
        'lead_id' => $request->appointment_id,
        'roof_type' => $request->roof_type,
        'roof_color' => $request->roof_color,
        'est_start' => $request->est_start,
        'est_end' => $request->est_end,
        'scope_of_work' => $request->scope_of_work,
        'notes' => $request->notes,
        'quotation_id' => $request->qoutationId,
        'price' => $request->price,
        // 'customer_name' => $request->customer_name,
        // 'notes' => $request->est_start,
        'status' => "0",
    ]);

    // dd($request->installments);
    if ($request->has('installments')) {
    foreach ($request->installments as $installment) {
        $formattedDate = Carbon::createFromFormat('m-d-y', $installment['due_date'])->format('Y-m-d');
        \App\Models\ContractInstallment::create([
            'contract_id' => $contract->id,
            'amount' => $installment['amount'],
            'due_date' => $formattedDate,
        ]);
    }
}
$lead_data = Appointment::where('id', $request->appointment_id)->firstOrFail();
    // dd($request->all());
    $order_data = Quotation::with('appointment', 'franchise', 'quotaitonItem','quotaiton_section')->find($request->qoutationId);
    // dd($request->all());
    // $pdf = PDF::loadView('admin.contract.pdf_template', ['data' => $request->all(),'order_data'=>$order_data]);
    $pdf = Pdf::setOptions(['isRemoteEnabled' => true])
          ->loadView('admin.contract.pdf_template', [
              'data' => $request->all(),
              'order_data' => $order_data
          ]);


Mail::send('emails.contract', ['order_data' => $order_data], function ($message) use ($request, $pdf) {
    $message->to($request->email)
        ->subject('Your Contract')
        ->attachData($pdf->output(), "contract.pdf");
});
$lead_data->status = '9';
	$lead_data->save();

    Quotation::where('id', $request->qoutationId)->update(['status' => "1"]);
    return redirect()->route('customer.list.index')->with('success', 'Contract created successfully.');
}

public function myContract()
{
    $user = auth()->user(); // Logged-in customer
    $contracts = Contract::with('customer')->where('lead_id', $user->lead_id)->orderByDesc('created_at')->get();
    // dd($contracts);
    return view('customer.contract.mycontract', compact('contracts'));
}

public function viewContract($id) {
    $data = Contract::with(['customer', 'installments'])->findOrFail($id);
//    dd($contract);
    return view('customer.contract.preview', compact('data'));
}

public function downloadPdf($id)
{
    $data = Contract::with(['customer', 'installments'])->findOrFail($id);

    $pdf = Pdf::loadView('customer.contract.contractPDF', compact('data'))
              ->setPaper('a4', 'portrait');

    return $pdf->download('contract_'.$id.'.pdf');
}
	
}
