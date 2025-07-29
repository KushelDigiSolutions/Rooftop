<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Franchise;
use App\Models\Subcontractor;
use App\Models\User;
use App\Models\Job;
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
use Illuminate\Support\Str;

class JobController extends Controller
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
            $statusPending = "1";
            $statusComplete = "2";
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

            return view('admin.jobs.index', compact('quotationList', 'quotationListPending', 'quotationListComplete'));
        }
	public function getQuotationsData(Request $request)
{
		//dd($request->all());
    $statusInput = $request->input('status', null);

    $status = null;
    $applyStatusFilter = true;

    switch ($statusInput) {
        case 'pending':
            $status = '0';
            break;
        case 'assign':
            $status = '1';
            break;
        case 'hold':
            $status = '2';
            break;    
		case 'prosessing':
            $status = '3';
            break;
		case 'complete':
            $status = '4';
            break;	
        default:
            $applyStatusFilter = false; // No filtering if not matched
            break;
    }

    $user = Auth::user();
    $userRole = $user->getRoleNames()->first();

    $quotationQuery = Job::query();

    if ($userRole === 'Super Admin') {
        // No filtering by user
    } elseif ($userRole === 'Sub Contractor') {
        $franchise = User::where('id', $user->id)->first();
        if ($franchise) {
            $quotationQuery->where('subContract_id', $franchise->subContract_id);
        } else {
            return response()->json(['data' => []]);
        }
    } else {
        return response()->json(['data' => []]);
    }
	//$quotationQuery->where('status', '=', 1);
    // Apply status filter only if it was matched
    if ($applyStatusFilter) {
        $quotationQuery->where('status', '=', $status);
    }
    $quotationList = $quotationQuery
        ->with(['appointment','bid','subcontract'])
        ->get();

    return response()->json([
        'data' => $quotationList,
        'role' => $userRole,
    ]);
}

	public function getQuotationsData2(Request $request)
{
    $status = $request->input('status', 'pending');
	
    switch ($status) {
        case 'pending':
            $status = '0';
            break;
        case 'assign':
            $status = '1';
            break;
    }

    $user = Auth::user();
		//dd($user->id);
    $userRole = $user->getRoleNames()->first();  // Get first role

    // Initialize default query builder
    $quotationQuery = Quotation::query();

    if ($userRole === 'Super Admin') {
        // No filtering, get all
    } elseif ($userRole === 'Sub Contractor') {
        $franchise = User::where('id', $user->id)->first();
		dd($franchise);
        if ($franchise) {
            $quotationQuery->where('franchise_id', $franchise->id);
        } else {
            return response()->json(['data' => []]); // No franchise found
        }
    } else {
        // For other roles, restrict access
        return response()->json(['data' => []]);
    }

    $quotationList = $quotationQuery
        ->with('franchise')
        ->where('status', '=', (string) $status)
        ->get();

   // return response()->json(['data' => $quotationList]);
		return response()->json(['data' => $quotationList,  'role' => $user->getRoleNames()->first()]);
}

	
	public function getQuotationsDataold(Request $request)

    {

        $status = $request->input('status', 'pending');
        switch ($status) {
            case 'pending':
                $status = '1';
                break;
            case 'complete':
                $status = '2';
                break;
        }

        $user = Auth::user();
		
        if(!empty($user)){
            $franchise = Franchise::where('user_id',$user->id)->first();
        }
        $userRole = $user->getRoleNames()->first();  // Get first role if there are multiple

        // Initialize default query builder for all quotations
        $quotationQuery = Quotation::query();
        if ($userRole == 'Franchise') {
            $quotationQuery->where('franchise_id', $franchise->id);
        }

        $quotationList = $quotationQuery->with('franchise')->where('status','=', (string) $status)->get();
        
        return response()->json(['data' => $quotationList]);
    }
	
	public function updateWork(Request $request)
{
		//dd($request->all(), $request->file('beforeImage'));
    $request->validate([
        'updatework_id' => 'required|exists:jobs,id',
        'beforeImage.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'beforeWorkRemark'      => 'nullable|string'
    ]);

    try {
        $quotation = Job::findOrFail($request->updatework_id);

        $imagePaths = [];

        if ($request->hasFile('beforeImage')) {
            foreach ($request->file('beforeImage') as $image) {
                $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/work'), $imageName);
                $imagePaths[] = $imageName;
            }
        }
		
		//dd($imagePaths);

        // Store JSON of image paths if needed
        if (!empty($imagePaths)) {
            $quotation->beforeImage = json_encode($imagePaths);
        }

        $quotation->beforeWorkRemark = $request->beforeWorkRemark ?? '';
        $quotation->status  = '3'; // Status: Work started

        $quotation->save();

        return redirect()->back()->with('success', 'Work updated successfully.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
    }
}

public function restartWork(Request $request){
     $request->validate([
        'job_id' => 'required|exists:jobs,id',
    ]);

    try {
        $quotation = Job::findOrFail($request->job_id);       
		$quotation->re_start_date = $request->re_start_date ?? '';
        $quotation->status  = '3'; // Status: Work started

        $quotation->save();

        return redirect()->back()->with('success', 'Work Start successfully.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
    }
}

public function holdWork(Request $request) {
    $request->validate([
        'job_id' => 'required|exists:jobs,id',
    ]);

    try {
        $quotation = Job::findOrFail($request->job_id);       
		$quotation->hold_date = $request->hold_date ?? '';
		$quotation->hold_reason = $request->hold_reason ?? '';
        $quotation->status  = '2'; // Status: Work started

        $quotation->save();

        return redirect()->back()->with('success', 'Work hold successfully.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
    }

}
	
	public function completeUpdateWork(Request $request)
{
		//dd($request->all(), $request->file('afterImage'));
    $request->validate([
        'updatework_id2' => 'required|exists:jobs,id',
        'afterImage.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'afterWorkRemark'      => 'nullable|string'
    ]);

    try {
        $job = Job::findOrFail($request->updatework_id2);
		
        $imagePaths = [];

        if ($request->hasFile('afterImage')) {
            foreach ($request->file('afterImage') as $image) {
                $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/work/after'), $imageName);
                $imagePaths[] = $imageName;
            }
        }
		
		//dd($imagePaths);

        // Store JSON of image paths if needed
        if (!empty($imagePaths)) {
            $job->afterImage = json_encode($imagePaths);
        }

        $job->afterWorkRemark = $request->afterWorkRemark ?? '';
        $job->status  = '4'; // Status: Work started
        $job->save();
		
		

        return redirect()->back()->with('success', 'Work updated successfully.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
    }
}
	
	public function getWorkImages($id)
{
    $quotation = Job::findOrFail($id);

    return response()->json([
        'before_images' => json_decode($quotation->beforeImage, true),
        'after_images'  => json_decode($quotation->afterImage, true),
        'afterWorkRemark'       => $quotation->afterWorkRemark,
        'beforeWorkRemark'       => $quotation->beforeWorkRemark,
    ]);
}

	
}
