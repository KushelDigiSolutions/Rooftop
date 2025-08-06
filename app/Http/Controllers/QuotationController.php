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
use App\Mail\UserRegistrationMail;


class QuotationController extends Controller

{
    protected $whatsAppService;
    public function __construct(WhatsAppService $whatsAppService)
    {
        $this->whatsAppService = $whatsAppService;
    }

    private function generateNextCode($lastCode, $prefix)
    {
        if (!$lastCode) {
            return $prefix . "000001";
        }
        $numberPart = (int) substr($lastCode, strlen($prefix));
        $nextNumber = str_pad($numberPart + 1, 6, "0", STR_PAD_LEFT);
        return $prefix . $nextNumber;
    }

        public function index()
        {
            if (!auth()->check()) {
                return redirect()->route('login')->with('error', 'Please login to access this page.');
                }

                $userRole = Auth::user()->getRoleNames()->first();

                $allowedRoles = ['Super Admin', 'Admin', 'Help Desk', 'Franchise'];
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
        return view("admin.quotation.create", $data);

    }


    public function store(Request $request)

    {
        //dd($request->all());
        $request->validate([
            'name' => 'string|max:255',
            'email' => 'email',
            'number' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'quot_for' => 'nullable|string',
            'cartage' => 'nullable|string',
        ]);

        $lastAppointmentId = Quotation::max("unique_id");
        $nextAppointmentId = $this->generateNextCode($lastAppointmentId, "KMI");
        $request["unique_id"] = $nextAppointmentId;

        // Prepare the quotation data
        $arrayForInsert = [
            'unique_id' => $request->unique_id,
            'appointment_id' => $request->appoint_id ?? '',
            'franchise_id' =>$request->franchise_id,
            'name' => $request->name ?? '',
            'email' => $request->email ?? '',
            'number' => $request->number ?? '',
            'address' => $request->address ?? '',
            'project_name' => $request->project_name ?? '',
            'project_description' => $request->project_description ?? '',
            'scope_work' => $request->scope_work ?? '',
            'quot_for' => $request->quotation_for ?? '',
            'cartage' => $request->cartage ?? '',
            'gst_no' =>  $request->gst_uin ?? '',
            'voucher_no' => $request->voucher_no ?? '',
            'buyer_ref' => $request->buyer_ref ?? '',
            'other_ref' =>  $request->other_ref ?? '',
            'dispatch' => $request->dispatch ?? '',
            'destination' => $request->destination ?? '',
            'city_port' => $request->city_port ?? '',
            'terms_delivery' => $request->terms_deliver ?? '',
             'date' => $request->date ?? '',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        // Create the quotation and get the quotation ID
        $quotation = Quotation::create($arrayForInsert);
        $newQuotationId = $quotation->id;
        $sections = [];
        $items = [];
        $sectionID = [];

        // Iterate over both section_name and product_item arrays together

        foreach ($request->section_name as $index => $section_name) {
            if (isset($section_name)) {
                $sections[] = [
                    'quotation_id' => $newQuotationId,  // Associate with the created quotation
                    'section_name' => $section_name,    // Access correct section_name 
					'description' => $request->description[$index] ?? '',
                    'created_at' => now(),
                    'updated_at' => now(),
                ];

                // Loop through the associated product items for this section
                if (isset($request->product_item[$index])) {

                    foreach ($request->product_item[$index] as $j => $product_item) {
                        if (isset($request->item_name[$index][$j])) {
							$product_data=Product::where('id',$product_item)->first();
                            $items[] = [
                                'quotation_id' => $newQuotationId, // Associate with the created quotation
                                'appointment_id' => $request->appoint_id ?? '',
                                'franchise_id' => $request->franchise_id,
                                'section_order' => $section_name, // Set section ID as the quotation ID temporarily (we'll fix it later)
                                'item_order' => $j,  // Item order (starting from 1)
                                'name' => $request->item_name[$index][$j] ?? '', // Access item name correctly
                                'item' => $product_item ?? '',
                                'qty' => $request->item_qty[$index][$j] ?? '',
                                'unit' => $request->item_unit[$index][$j] ?? '',
                                'price' => $request->item_price[$index][$j] ?? '',
                                'discount' => $request->item_discount[$index][$j] ?? '0',
								'gst_percentage' =>!empty($product_data->gst_percentage)?$product_data->gst_percentage:NULL,
                                'tally_code' =>!empty($product_data->tally_code)?$product_data->tally_code:NULL,
                                'file_number' =>!empty($product_data->file_number)?$product_data->file_number:NULL,
                                'total_amount' => $request->item_mrp[$index][$j] ?? '',
                                'created_at' => now(),
                                'updated_at' => now(),
                            ];
                        }
                    }
                }
            }
        }


        // Insert sections first
        $insertedSections = QuotationSection::insert($sections);
        // Now retrieve the section IDs from the inserted sections

        if ($insertedSections) {
            $sectionID = QuotationSection::where('quotation_id', $newQuotationId)->get(['id', 'section_name','description']);
            $sectionIDMap = $sectionID->pluck('id', 'section_name','description')->toArray();
            foreach ($items as &$item) {
                $item['section_order'] = $sectionIDMap[$item['section_order']] ?? null; // Set section_order based on section name
            }
        }


        // Insert items in bulk
        if (!empty($items)) {
            QuotationItem::insert($items);  
        }

        // Insert all items into the database at once
        $appointment = Appointment::findOrFail($request->appoint_id);
        $appointment->status = "3"; // Set the new status value
        $appointment->save(); // Save the changes
        $franchise_data = Franchise::find($request->franchise_id);
        $appointData = Appointment::find($request->appoint_id);
         // send whatsaap Message
         $parameters = [
            [
                'type' => 'text',
                'text' => $request->name
            ]  
        ];

        //  $this->whatsAppService->sendMessage('91'.$franchise_data->mobile, 'quotations_generated',$parameters);
        //  $this->whatsAppService->sendMessage('91'.$appointData->mobile, 'quotations_generated',$parameters);
        // end send whatsaap Message
        $user = \App\Models\User::where('lead_id', $appointment->id)->first();
        if ($user) {
                $mailData = [
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => 'password' // use same value you set during convertToCustomer()
                ];

                Mail::to($user->email)->send(new UserRegistrationMail($mailData));
            }
        Mail::to($appointment->email)->send(
            new QuotationGeneratedMail($appointment,$newQuotationId)
        );

        return redirect()
            ->route("quotations.list")
            ->with("success", "Bid created successfully!");
    }



    public function getQuotationsData(Request $request)

    {

        $status = $request->input('status', 'pending');
        switch ($status) {
            case 'pending':
                $status = '0';
                break;
            case 'complete':
                $status = '1';
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
        
       // return response()->json(['data' => $quotationList]);
		return response()->json(['data' => $quotationList,  'role' => $user->getRoleNames()->first()]);
    }

    public function getAppointmentDetails($id, $type)
    {

        $quotation = Quotation::with('quotaitonItem')->findOrFail($id);
        $appointment = Appointment::find($quotation->appointment_id);
        // Use a switch-case for better readability and easier status mapping

        switch ($type) {
            case 'pending':
                $status = 0;
                break;
            case 'complete':
                $status = 1;
                break;
            default:
                $status = 0;  // Default status
                break;
        }

        // Check if the appointment's status matches the type passed
        if ($quotation && $quotation->status == $status) {
            return response()->json([
                'status' => 'success',
                'data' => [
                    'quotation' => $quotation,
                    'appointment' => $appointment,
                ],
                'message' => 'Bids details fetched successfully.'
            ]);

        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Bid not found or status mismatch.'
            ]);
        }
    }


    public function deleteQuotationsData($id){
        $appointData = Quotation::findOrFail($id);
        $appointData->delete();
        return redirect()->back()->with('success', 'Bid deleted successfully.');
    }



    public function downloadQuotationView($quotation_Id){

        $order_data = Quotation::with('appointment', 'franchise', 'quotaitonItem','quotaiton_section')->find($quotation_Id);

        return view('admin.quotation.download_quote', compact('order_data'));
    }


    public function getQuotationData($appointment_id){
        if(!empty($appointment_id)){
            $appointment = Appointment::findorfail($appointment_id);
            if(!empty($appointment)){
                $quotation = Quotation::where([
                    'franchise_id' => $appointment->franchise_id,
                    'appointment_id' => $appointment->id
                ])->first();

                if ($quotation) {
                    $quotation_data = QuotationItem::select(
                        'quotation_id','discount','qty','price','gst_percentage'
                    )->where([
                        'franchise_id' => $quotation->franchise_id,
                        'appointment_id' => $quotation->appointment_id,
                        'quotation_id' => $quotation->id
                    ])->get();

					$total=0;

                   if($quotation_data){
					   foreach($quotation_data as $datas){
						  if($datas['price'] != '' && $datas['gst_percentage'] != ''){

						  $total=$total+(($datas['price']*$datas['qty'])+ ((($datas['price']*$datas['qty'])-($datas['price']*$datas['qty']*$datas['discount']/100)) *$datas['gst_percentage']/100)-($datas['price']*$datas['qty']*$datas['discount']/100)); 

                          }
					   }
				   } 

                    //echo $total;die; 	  			   

                    $quotation_items['quotation_id'] = $datas['quotation_id']; 
                    $quotation_items['total_order_value'] = !empty($total)?$total:0;					
                    $quotation_items['franchise_id'] = $appointment->franchise_id;
                    $quotation_items['appointment_id'] = $appointment->id;
                    $quotation_items['appointment_name'] = $appointment->name;
                    $quotation_items['appointment_mobile'] = $appointment->mobile;
                    return $quotation_items;

                } else {
                    $quotation_items = collect(); // return an empty collection or handle as needed
                }

            }else{
                return redirect()->back()->with('error', 'Appointment not found.');
            }
        }else{

            return redirect()->back()->with('error', 'Appointment blank.');
        }
    }
public function editQuotation($quotation_Id)
    {   
       

         $data['appointment_data'] = Quotation::with('appointment', 'franchise', 'quotaitonItem','quotaiton_section')->find($quotation_Id);
        // dd($data['appointment_data']);
        return view("admin.quotation.edit", $data);

    }
	
	 public function update(Request $request, $id)
    {
        // dd($request->all()); 
        $request->validate([
           'name' => 'string|max:255',
            'email' => 'email',
            'number' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'quot_for' => 'nullable|string',
            'cartage' => 'nullable|string',
        ]);

      
        $grandTotal = 0;
        foreach ($request->item_price ?? [] as $i => $priceArr) {
            foreach ($priceArr as $j => $price) {
                $qty      = $request->item_qty[$i][$j]      ?? 1;
                $discount = $request->item_discount[$i][$j] ?? 0;
                $grandTotal += ($price - $discount) * $qty;
            }
        }
       
     
        $quotation = Quotation::findOrFail($id);
        $quotation->update([
            'name'        => $request->name,
            'email'       => $request->email,
            'number'      => $request->number,
            'address'     => $request->address,
            'quot_for'    => $request->quotation_for,
            'cartage'     => $request->cartage,
            'gst_no'      => $request->gst_uin,
            'buyer_ref'   => $request->buyer_ref,
            'other_ref'   => $request->other_ref,
            'dispatch'    => $request->dispatch,
            'destination' => $request->destination,
            'city_port'   => $request->city_port,
            'terms_delivery' => $request->terms_deliver,
            'updated_at'  => now(),
        ]);

        
        $existingSectionIDs = $quotation->quotaiton_section->pluck('id')->toArray();
        $existingItemIDs    = QuotationItem::where('quotation_id',$id)->pluck('id')->toArray();

        $keepSectionIDs = [];   // IDs we’ll KEEP (update or leave)
        $keepItemIDs    = [];

       
        foreach ($request->section_name as $sIdx => $sectionName) {
            $sectionId   = $request->section_id[$sIdx] ?? null;  // hidden input (see Blade)
            $sectionData = [
                'quotation_id' => $quotation->id,
                'section_name' => $sectionName,
                'updated_at'   => now(),
            ];

            // -- Update or Create section
            if ($sectionId) {
                $section = QuotationSection::find($sectionId);
                $section->update($sectionData);
            } else {
                $section = QuotationSection::create($sectionData + ['created_at'=>now()]);
            }
            $keepSectionIDs[] = $section->id;

            /* ---- Items inside this section ---- */
            if (!empty($request->product_item[$sIdx])) {
                foreach ($request->product_item[$sIdx] as $iIdx => $productId) {
                    $itemId = $request->item_id[$sIdx][$iIdx] ?? null;  // hidden

                    // Re-fetch product to get GST, tally code, etc.
                    $prod = Product::find($productId);

                    $itemPayload = [
                        'quotation_id'   => $quotation->id,
                        'section_order'  => $section->id,
                        'item_order'     => $iIdx,
                        'name'           => $request->item_name[$sIdx][$iIdx],
                        'item'           => $productId,
                        'qty'            => $request->item_qty[$sIdx][$iIdx],
                        'unit'           => $request->item_unit[$sIdx][$iIdx],
                        'price'          => $request->item_price[$sIdx][$iIdx],
                        'discount'       => $request->item_discount[$sIdx][$iIdx] ?? 0,
                        'total_amount'   => $request->item_mrp[$sIdx][$iIdx],
                        'gst_percentage' => $prod->gst_percentage ?? null,
                        'tally_code'     => $prod->tally_code     ?? null,
                        'file_number'    => $prod->file_number    ?? null,
                        'updated_at'     => now(),
                    ];

                    if ($itemId) {
                        $item = QuotationItem::find($itemId);
                        $item->update($itemPayload);
                    } else {
                        $item = QuotationItem::create($itemPayload + ['created_at'=>now()]);
                    }
                    $keepItemIDs[] = $item->id;
                }
            }
        }

        /* (C) Delete sections/items the user has removed */
        $sectionsToDelete = array_diff($existingSectionIDs, $keepSectionIDs);
        $itemsToDelete    = array_diff($existingItemIDs,    $keepItemIDs);

        if ($sectionsToDelete) QuotationSection::whereIn('id', $sectionsToDelete)->delete();
        if ($itemsToDelete)    QuotationItem::whereIn('id', $itemsToDelete)->delete();

        /* 5. Redirect ----------------------------------- */
        return redirect()->route('quotations.list')
                         ->with('success','Bid updated successfully!');
    }

}

