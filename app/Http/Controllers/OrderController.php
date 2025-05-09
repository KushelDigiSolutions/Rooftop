<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Franchise;
use App\Models\Order;
use App\Models\Quotation;
use App\Models\QuotationSection;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Mail\InvoiceGeneratedMail;
use App\Mail\InstallationScheduleMail;
use App\Mail\InstallationCompleteMail;
use App\Services\WhatsAppService;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;



class OrderController extends Controller

{

    protected $whatsAppService;
    public function __construct(WhatsAppService $whatsAppService)
    {

        $this->whatsAppService = $whatsAppService;
    }


    private function generateNextCode($lastCode, $prefix)
    {
        if (!$lastCode) {
          return $prefix . "00001";
        }

        $numberPart = (int) substr($lastCode, strlen($prefix));
        $nextNumber = str_pad($numberPart + 1, 6, "0", STR_PAD_LEFT);
        return $prefix . $nextNumber;
    }



    public function index()
    {
        $userRole = Auth::user()->getRoleNames()[0];
        $user = Auth::user();
        $franchise_data = Franchise::where('user_id',$user['id'])->first();
        $orders = collect();

        $ordersQuery = new Order;
        if($userRole == 'Franchise'){
            $ordersQuery = $ordersQuery->where('franchise_id', $franchise_data->id);
        }

        if($userRole == 'Fulfillment Desk'){
            $ordersQuery = $ordersQuery->whereIn('status', ['1','2','3']);
        }

        $orders = $ordersQuery->get();
        $allCount = count($orders);
        $statusCounts = $orders->groupBy("status")->map->count();
        // Access counts for all statuses
        $pendingCount = $statusCounts->get("0", 0);
        $scheduleCount = $statusCounts->get("1", 0);
        $installationCount = $statusCounts->get("3", 0);
        $completedCount = $statusCounts->get("2", 0);
        $franchises = Order::orderBy("id", "desc")->get();
// dd($installationCount);
        return view(
            "admin.order.index",
            compact(
                "orders",
                "allCount",
                "pendingCount",
                "scheduleCount",
                "completedCount",
                "installationCount"
            )
        );
    }

    public function getOrdersData(Request $request)
    {
        // dd($request->all());
        $userRole = Auth::user()->getRoleNames()[0];
        $user = Auth::user();
        $franchise_data = Franchise::where('user_id',$user['id'])->first();

        // Define status mapping
        $statusMap = [
            "pending" => "0",
            "schedule" => "1",
            "complete" => "2",
            "shipped" => "3"
        ];


        // Retrieve the 'status' input from the request, default to 'pending' if not set
        $status = $request->input("status", "0");

        // Get the mapped status from the $statusMap array or fallback to 1
        $status = $statusMap[$status] ?? "0";
            // Fetch Franchise-specific appointments
                $statusMap = [
                    "pending" => "0",
                    "schedule" => "1",
                    "complete" => "2",
                    "shipped" => "3"
                ];

              $status = $request->input("status");
            $status = $statusMap[$status] ?? "0";
            $orders_query = Order::with('appointment','franchise','quotation_data')->where("status", $status);
            if($userRole == 'Franchise'){
                $orders_query->where('franchise_id', $franchise_data->id);
            }

            $orders = $orders_query->orderBy('created_at','desc')
            ->get()
            ->toArray();
            // dd($orders);
            return response()->json([
                "data" => $orders,
                "role" => Auth::user()->getRoleNames()[0] ?? "",
            ]);  

    }


    public function store(Request $request)

    {
        $rules = [
            "payment_mode" => "required",
            "paid_amount" => "required",
            "payment_type" => "required"
        ];



        $messages = [
            "payment_mode.required" => "Please Select Payment Mode",
            "paid_amount.required" => "Please Enter Paid Amount",
            "payment_type.required" => "Please Select Payment Type"
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->with("errors", $validator->errors());
        }


        try {
            $lastAppointmentId = Order::max("txn_id");
            $nextAppointmentId = $this->generateNextCode($lastAppointmentId, "INV");
            $request["txn_id"] = $nextAppointmentId;

            $data = Order::create($request->all());

            if ($data) {
                $update_array = ['status' => "4"];
                $update_quotation = ['status' => '1'];
                $appointment = Appointment::findOrFail($data['appointment_id']);
                $appointment->update($update_array);

                $quotations = Quotation::where('appointment_id', $data['appointment_id'])->where('id',$request->quotation_id);

                $quotations->update($update_quotation);
                $franchise_id =$appointment->franchise_id;
                $franchise_data = Franchise::find($franchise_id);
                $franchisemobile = $franchiseDetail ? $franchiseDetail->mobile : 'N/A';

            }
            $parameters = [
                [
                    'type' => 'text',
                    'text' => $appointment->name
                ]
            ];

            //$this->whatsAppService->sendMessage('91'.$appointment->mobile, 'invoice_generated',$parameters);
            //$this->whatsAppService->sendMessage('91'.$franchisemobile, 'invoice_generated',$parameters);

            Mail::to($appointment->email)->send(
                new InvoiceGeneratedMail($appointment,$request->quotation_id)
            );

            return redirect()
                ->back()
                ->with("success", "Order Saved Successfully!");
        } catch (\Exception $e) {
            return redirect()
                ->back()
              ->with("errors", "Something Went Wrong!");
        }

    }



    /**
     * Display the specified resource.
     */

    public function show(Order $order)

    {
        return response()->json($order);
    }



    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Order $order)
    {
        $validatedData = $request->validate([
            'appointment_id' => 'nullable|integer',
            'franchise_id' => 'nullable|integer',
            'quotation_id' => 'nullable|integer',
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:15',
            'pincode' => 'required|string|max:10',
            'installation_date' => 'nullable|date',

        ]);

        $order->update($validatedData);
        return response()->json($order);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)

    {
        $order->delete();
        return response()->json(['message' => 'Order deleted successfully.']);
    }


    public function getOrdersDetails($id, $type)
    {
        // Fetch the appointment by ID
        $order_data = Order::with('appointment','franchise','quotation_data')->findOrFail($id);
        // Use a switch-case for better readability and easier status mapping
        switch ($type) {
            case "pending":
                $status = 0;
                break;
            case "schedule":
                $status = 1;
                break;
            case "complete":
                $status = 2;
                break;
            default:
                $status = 0; // Default status
                break;
        }

        // Check if the appointment's status matches the type passed
        if ($order_data && $order_data->status == $status) {
            return response()->json([
                "status" => "success",
                "data" => $order_data,
                "message" => "Orders details fetched successfully.",
            ]);
        } else {
            return response()->json([
                "status" => "error",
                "message" => "Orders not found or status mismatch.",
            ]);
        }
    }

    public function downloadOrderView($quotation_id)
    {
        $order_data = Quotation::with('appointment', 'franchise', 'quotaitonItem','quotaiton_section')->find($quotation_id);
        return view('admin.order.download_invoice', compact('order_data'));
    }

    public function updateSchedule(Request $request)
    {
        $orderId = $request->order_id;
        $installationDate = $request->dateFilter ?? null;

        if ($installationDate) {
            $installationDate = Carbon::parse($installationDate);
        }   
        
        $instDate = $installationDate->toDateString(); // Extract date
        $instTime = $installationDate->toTimeString(); // Extract time
        
        $order = Order::with('franchise','quotation_data','appointment')->findOrFail($orderId);
        
        $franchiseEmail = $order['franchise']['email']; 
        $franchiseMobile = $order['franchise']['mobile'];
        $appointmentName = $order['appointment']['name'];
        $personname ="A representative";
        $appointmentAddress = $order['appointment']['address'];
        $appointmentCity = $order['appointment']['city'];
        $appointmentState = $order['appointment']['state'];
        $appointmentPincode = $order['appointment']['pincode'];
        $appointmentFulladdress = $appointmentAddress.",".$appointmentCity.",".$appointmentState.",".$appointmentPincode."India";


        $quotationEmail = isset($order['quotation_data']) ? $order['quotation_data']['email'] : '';  
        $quotationMobile = isset($order['quotation_data']) ?  $order['quotation_data']['number'] : '' ; 
        
        
        $order->installation_date = $installationDate;
        $order->status = "1";
        $order->save();

        $parameters = [
                [
                    'type' => 'text',
                    'text' => $appointmentName
                ],
                [
                'type' => 'text',
                'text' => $personname
                ],
                [
                    'type' => 'text',
                    'text' => $instDate
                ],
                [
                    'type' => 'text',
                    'text' => $instTime
                ],
                [
                    'type' => 'text',
                    'text' => $appointmentFulladdress
                ],
            ];
            
        // if(!empty($franchiseEmail) && !empty($franchiseMobile)){
        //     $this->whatsAppService->sendMessage('91'.$franchiseMobile, 'installation_scheduled',$parameters);
        //     Mail::to($franchiseEmail)->send(
        //         new InstallationScheduleMail(
        //             $order, 
        //             $instDate, 
        //             $instTime, 
        //             $order['franchise']['name']
        //         )
        //     );
        // }

    
        // if(!empty($quotationEmail) && !empty($quotationMobile)){
        //     $this->whatsAppService->sendMessage('91'.$quotationMobile, 'installation_scheduled',$parameters);
        //     // end send whatsaap Message
        // Mail::to($quotationEmail)->send(
        //     new InstallationScheduleMail(
        //         $order, 
        //         $instDate, 
        //         $instTime,
        //         $order['franchise']['name']
        //     )
        // );    
        // }
        
        return redirect()->back()->with('success','Order Scheduled Successfully');
    }

    public function updateStatus(Request $request)
    {
        // dd($request->all());
        $orderId = $request->order_id;
        $order_data = Order::with('appointment','franchise','quotation_data')->findOrFail($orderId);
        //dd($order_data);
        $appointmentEmail = $order_data->appointment->email;

        $franchiseEmail = $order_data->franchise->email;
        $status = $request->status ?? null;

        switch ($status) {
            case 'pending':
                $update_status = '0';
                break;
            case 'complete':
                $update_status = '2';
                break;
            case 'shipped':
                $update_status = '3';
                break;     
            default:
                $update_status = '1';
                break;
        }

        $order = Order::findOrFail($orderId);
        $order->status = $update_status;
        $order->track_detail = $request->track_detail;
        $order->save();

            Mail::to($franchiseEmail)->send( new InstallationCompleteMail($order_data) );
        

            Mail::to($appointmentEmail)->send( new InstallationCompleteMail($order_data) );    
        

        return redirect()->back()->with('success', 'Status Updated Successfully');
    }



    public function updatePayment(Request $request)
    {
        $orderId = $request->order_id;
        $paid_amount = $request->update_amount ?? null;
        $prev_paid_amount = $request->order_paid_amount ?? null;
        $order = Order::findOrFail($orderId);
        $order->paid_amount = $paid_amount + $prev_paid_amount;
        $order->payment_type = 'full';
        $order->save();
        return redirect()->back()->with('success', 'Payment Updated Successfully ');
    }
   /********/
}

