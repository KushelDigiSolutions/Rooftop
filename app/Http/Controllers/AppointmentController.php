<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\ZipCode;
use App\Mail\AppointmentSuccessMail;
use App\Mail\AppointmentRejectedMail;
use App\Mail\QueryBookedMail;
use App\Mail\AppointmentScheduleMail;
use App\Mail\AppointmentRescheduleMail;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;
use App\Models\Franchise;
use App\Models\MasterCity;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Exports\BookQueryExport;
use App\Services\WhatsAppService;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Validation\Rules\Unique;
use Razorpay\Api\Api;

class AppointmentController extends Controller
{
    protected $whatsAppService;
    public function __construct(WhatsAppService $whatsAppService)
    {
        $this->whatsAppService = $whatsAppService;
    }
    
    public function schedule_appointment()
    {
        // $cityStateData = MasterCity::orderBy('state_name')->orderBy('city_name')->get();
        // $groupedCityStateData = $cityStateData->groupBy("state_name");
        $cityStateData = ZipCode::where('status', 'active') // 👈 Filter only active
        ->orderBy('state')
        ->orderBy('city')
        ->get();
        $groupedCityStateData = $cityStateData->groupBy('state')->map(function ($items) {
            return $items->pluck('city')->unique()->values();
        });
        // dd($groupedCityStateData);
        return view("frontend.schedule_appointment", compact("groupedCityStateData"));
    }

    public function create()
    {
        // $cityStateData = MasterCity::orderBy('state_name')->orderBy('city_name')->get();
        // $groupedCityStateData = $cityStateData->groupBy("state_name");
        $cityStateData = ZipCode::where('status', 'active') // 👈 Filter only active
        ->orderBy('state')
        ->orderBy('city')
        ->get();
        $groupedCityStateData = $cityStateData->groupBy('state')->map(function ($items) {
            return $items->pluck('city')->unique()->values();
        });
        // dd($groupedCityStateData);
        return view("admin.leads.create", compact("groupedCityStateData"));
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
        // dd(Auth::user());
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please login to access this page.');
        }

        $userRole = Auth::user()->getRoleNames()->first();

        $allowedRoles = ['Super Admin', 'Admin', 'Help Desk', 'Franchise'];
        if (!in_array($userRole, $allowedRoles)) {
            return redirect()->route('login')->with('error', 'You do not have permission to access this page.');
        }

        $user = Auth::user();
       
        
        $appointments = collect(); 

        $appointmentsQuery = Appointment::with('franchise')->where("status", "!=", "0");

        if ($userRole == "Franchise") {
            $franchise = Franchise::where("user_id", $user->id)->first();
            if ($franchise) {
                $appointments = $appointmentsQuery
                    ->where("franchise_id", $franchise->id)
                    ->get();
                $statusCounts = $appointments->groupBy("status")->map->count();

                $pendingCount = $statusCounts->get("2", 0);
                $completedCount = $statusCounts->get("4", 0);
                $holdCount = $statusCounts->get("3", 0);
                $assignedCount = $rejectCount = 0;
            } else {
                $pendingCount = $completedCount = $holdCount = $assignedCount = $rejectCount = 0;
            }
        } elseif (in_array($userRole, ["Admin", "Super Admin","Help Desk"])) {
            $appointments = $appointmentsQuery->get();
            $statusCounts = $appointments->groupBy("status")->map->count();

            // Access counts for all statuses
            $pendingCount = $statusCounts->get("1", 0);
            $rejectCount = $statusCounts->get("5", 0);
            $assignedCount = $statusCounts->get("2", 0);
            $completedCount = $statusCounts->get("4", 0);
            $holdCount = $statusCounts->get("3", 0);
        }

        $assignedAppointments = Appointment::join(
            "franchises",
            "appointments.franchise_id",
            "=",
            "franchises.id"
        )
            ->join("users", "users.id", "=", "franchises.user_id")
            ->select("appointments.*", "users.name as franchise_name")
            ->where("appointments.status", "2")
            ->with('franchise')
            ->get();
            

        $franchises = Franchise::orderBy("id", "desc")->get();
        // dd($assignedAppointments);    
        return view(
            "admin.leads.leads",
            compact(
                "appointments",
                "pendingCount",
                "rejectCount",
                "assignedCount",
                "completedCount",
                "holdCount",
                "assignedAppointments",
                "franchises"
            )
        );
    }


    public function querybooked()
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please login to access this page.');
        }

        $userRole = Auth::user()->getRoleNames()->first();

        $allowedRoles = ['Super Admin'];
        if (!in_array($userRole, $allowedRoles)) {
            return redirect()->route('login')->with('error', 'You do not have permission to access this page.');
        }
        
        // Fetch appointments with status 'Pending'
        $appointments = Appointment::where("status", "=", "0")->orderby('id','desc')->get();

        $statusCounts = $appointments
            ->groupBy("status")
            ->map(function ($appointments) {
                return $appointments->count();
            });

        // Now you can access the counts like so:
        $pendingCount = $statusCounts->get("0", 0); // Default to 0 if no 'pending' status found
        $assignedCount = $statusCounts->get("2", 0);
        $completedCount = $statusCounts->get("4", 0);
        $holdCount = $statusCounts->get("3", 0);

        $assignedAppointments = Appointment::join(
            "franchises",
            "appointments.franchise_id",
            "=",
            "franchises.id"
        )
            ->join("users", "users.id", "=", "franchises.user_id")
            ->select("appointments.*", "users.name as franchise_name")
            ->where("appointments.status", "2")
            ->get();
        $franchises = Franchise::orderby("id", "desc")->get();

        return view(
            "admin.query-booked",
            compact(
                "appointments",
                "pendingCount",
                "assignedCount",
                "completedCount",
                "holdCount",
                "assignedAppointments",
                "franchises"
            )
        );
    }

    public function getAppointmentData(Request $request)
    {
        // Define status mapping
        // dd($request->all());
        $statusMap = [
            
            "pending" => "1",
            "assign" => "2",
            "complete" => "4",
            "hold" => "3",
            "rejected" => "5",
            "prospect" => "7",
        ];
        

        $status = $request->input("status", "1");
        $status = $statusMap[$status] ?? "1";
        $franchises = [];

        // Check if the user is a Franchise or Admin/Super Admin
        $userRole = Auth::user()->getRoleNames()[0];

        if ($userRole === "Franchise") {
            // Fetch Franchise-specific appointments
            $statusMap = [
                "pending" => "2",
                "complete" => "4",
                "hold" => "3",
                "rejected" => "5",
                "prospect" => "7",
            ];

            $status = $request->input("status");
            $status = $statusMap[$status] ?? "2";
            $franchiseDetail = Franchise::where(
                "user_id",
                Auth::user()->id
            )->first();
            if ($franchiseDetail) {
                $franchises = Appointment::where("status", $status)
                    ->where("franchise_id", $franchiseDetail->id)
                    ->with('franchise')
                    ->orderBy('id', 'desc')
                    ->get()
                    ->toArray();
            }
        } elseif (in_array($userRole, ["Admin", "Super Admin","Help Desk"])) {
            $franchises = Appointment::where("status", $status)
                ->with('franchise')
                ->orderBy('id', 'desc')
                ->get()
                ->toArray();
        }

        // Return the data as a JSON response
        return response()->json([
            "data" => $franchises,
            "role" => Auth::user()->getRoleNames()[0] ?? "",
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $zipCodes = ZipCode::pluck("city")->toArray();
        // dd($zipCodes);
        $validatedData = $request->validate([
            "name" => "required|string|max:255",
            "email" => "required|email",
            "mobile" => "required|digits_between:10,15",
            "address" => "required|string|max:255",
            "type_property" => "required",
            "requirement_type" => "required|string|max:100",
            "lead_source" => "required|string|max:100",
            "notes" => "required",
            "scope_work" => "required|string|max:100",
        ]);

        // if (in_array($validatedData["city"], $zipCodes)) {
        //     $validatedData["status"] = "1";
        //     $responseMessage = "Appointment created successfully!";
        // } else {
        //     $validatedData["status"] = "0";
        //     $responseMessage = "Query created successfully!";
        // }

        $lastAppointmentId = Appointment::max("uniqueid");

        $nextAppointmentId = $this->generateNextCode($lastAppointmentId, "LD");

        $validatedData["uniqueid"] = $nextAppointmentId;

        $appointment = Appointment::create($validatedData);

        // if($validatedData["status"] == 0){

        //     // send whatsaap Message
        //     $parameters = [
                
        //     ];

        //     $this->whatsAppService->sendMessageWp('91'.$request->mobile, 'triggersforcustomerservicingtheirarea');
        //     // end send whatsaap Message



        //     Mail::to($appointment->email)->send(
        //         new QueryBookedMail($appointment)
        //     );
        // }else{
        //     // send whatsaap Message
        //     $parameters = [
        //         [
        //             'type' => 'text',
        //             'text' => $request->name
        //         ]
        //     ];

        //     $this->whatsAppService->sendMessage('91'.$request->mobile, 'new_appointment', $parameters);
        //     // end send whatsaap Message

        //     Mail::to($appointment->email)->send(
        //         new AppointmentSuccessMail($appointment)
        //     );
        // }
        // Send success email
        

        return response()->json(["message" => 'Appointment created successfully!'], 201);
    }

    public function assign(Request $request)
    {
        // Validate the input fields
        $request->validate([
            "appointment_id" => "required|exists:appointments,id",
            "franchise_id" => "required|exists:franchises,id",
            "dateFilter" => "required|date|after_or_equal:today",
        ]);

        // Find the appointment by ID
        $appointment = Appointment::findOrFail($request->appointment_id);

        // Convert the date to a Carbon instance (if it's not already)
        $appointment->appointment_date = Carbon::parse($request->dateFilter); // Convert the string to Carbon

        // Update the franchise and status
        $appointment->franchise_id = $request->franchise_id;
        $appointment->remarks = $request->remarks;
        $appointment->status = "2"; // Update the status

        // Save the appointment
        $appointment->save();
        $franchiseDetail = Franchise::find($request->franchise_id);
        $franchiseName = $franchiseDetail ? $franchiseDetail->name : 'N/A';
        $franchiseEmail = $franchiseDetail ? $franchiseDetail->email : 'N/A';
        $appointmentDate = Carbon::parse($appointment->appointment_date)->format('d/m/Y');
        $appointmentTime = Carbon::parse($appointment->appointment_date)->format('H.i').'hrs';
        $appointmentname= $appointment->name;
        $appointmentaddress =$appointment->address;
        $appointmentcity =$appointment->city;
        $appointmentstate =$appointment->state;
        $appointmentpincode =$appointment->pincode;
        $appointmentcountry =$appointment->country;
        $appointmentfulladdress =$appointmentaddress.",".$appointmentcity.",".$appointmentstate.",".$appointmentpincode.",".$appointmentcountry;


        // send whatsaap Message
        $parameters = [
            [
                'type' => 'text',
                'text' => $appointmentname
            ],
            [
                'type' => 'text',
                'text' => $franchiseName
            ],
            [
                'type' => 'text',
                'text' => ' '
            ],
            [
                'type' => 'text',
                'text' => $appointmentDate .' '.$appointmentTime
            ],
            [
                'type' => 'text',
                'text' => $appointmentfulladdress
            ],
            
        ];

        $this->whatsAppService->sendMessage('91'.$franchiseDetail->mobile, 'appointments_schedule_new', $parameters); // send to franchise
        $this->whatsAppService->sendMessage('91'.$appointment->mobile, 'appointments_schedule_new', $parameters); // send to customer
        // end send whatsaap Message

        // Pass these to the email
        Mail::to($appointment->email)->send(
            new AppointmentScheduleMail($appointment, $appointmentDate, $appointmentTime, $franchiseName)
        );
         Mail::to($franchiseEmail)->send(
            new AppointmentScheduleMail($appointment, $appointmentDate, $appointmentTime, $franchiseName)
        );
        

        // Redirect back with success message
        return redirect()
            ->back()
            ->with("success", "Franchise assigned successfully.");
    }

    public function book(Request $request){
       
        $request->validate([
            'appointment_id' => 'required|exists:appointments,id',
            'dateFilter' => 'required|date|after:now',
            'remarks' => 'nullable|string',
        ]);
        $appointmentId = $request->appointment_id;
        $slotStart = Carbon::parse($request->dateFilter);
        $slotEnd = (clone $slotStart)->addMinutes(30);
        
        $slotExists = Appointment::where('id', '!=', $appointmentId)
        ->whereNotNull('appointment_date')
        ->where(function ($query) use ($slotStart, $slotEnd) {
            $query->whereBetween('appointment_date', [$slotStart, $slotEnd])
                  ->orWhereRaw('? BETWEEN appointment_date AND DATE_ADD(appointment_date, INTERVAL 30 MINUTE)', [$slotStart]);
        })
        ->exists();
        // dd($slotExists);
        if ($slotExists) {
            return redirect()->back()->with('error', 'This slot is already booked. Please choose a different time.');
        }
        $appointment = Appointment::findOrFail($appointmentId);
        if (is_null($appointment->appointment_date)) {
            $appointment->appointment_date = $slotStart;
            $appointment->remarks = $request->remarks;
            $appointment->status = '6'; // Slot Book
            $appointment->save();
    
            return redirect()->back()->with('success', 'Appointment slot booked successfully.');
        } else {
            return redirect()->back()->with('error', 'This appointment already has a slot.');
        }
        // dd($slotExists);
    }

    public function reassign(Request $request)
    {
        // Validate the input fields
        // dd($request->all());
        $request->validate([
            "appointment_id1" => "required|exists:appointments,id",
            "dateFilter1" => "required|date|after_or_equal:today",
            "franchise_id1" => "required|exists:franchises,id",
        ]);

        // Find the appointment by ID
        
        $appointment = Appointment::findOrFail($request->appointment_id1);

        // Convert the date to a Carbon instance (if it's not already)
        $appointment->appointment_date = Carbon::parse($request->dateFilter1); // Convert the string to Carbon

        // Update the franchise and status
        $appointment->franchise_id = $request->franchise_id1;
        $appointment->remarks = $request->remarks1;
        $appointment->status = "2"; // Update the status

        // Save the appointment
        $appointment->save();
        $franchiseDetail = Franchise::find($request->franchise_id1);
        $franchiseName = $franchiseDetail ? $franchiseDetail->name : 'N/A';
        $franchiseEmail = $franchiseDetail ? $franchiseDetail->email : 'N/A';
        $appointmentDate = Carbon::parse($appointment->appointment_date)->format('d/m/Y');
        $appointmentTime = Carbon::parse($appointment->appointment_date)->format('H.i').'hrs';
        $appointmentname= $appointment->name;
        $appointmentaddress =$appointment->address;
        $appointmentcity =$appointment->city;
        $appointmentstate =$appointment->state;
        $appointmentpincode =$appointment->pincode;
        $appointmentcountry =$appointment->country;
        $appointmentfulladdress =$appointmentaddress.",".$appointmentcity.",".$appointmentstate.",".$appointmentpincode.",".$appointmentcountry;


        // send whatsaap Message
        $parameters = [
            [
                'type' => 'text',
                'text' => $appointmentname
            ],
            [
                'type' => 'text',
                'text' => $franchiseName
            ],
            [
                'type' => 'text',
                'text' => ' '
            ],
            [
                'type' => 'text',
                'text' => $appointmentDate .' '.$appointmentTime
            ],
            [
                'type' => 'text',
                'text' => $appointmentfulladdress
            ]
        ];

        $this->whatsAppService->sendMessage('91'.$franchiseDetail->mobile, 'appointments_reschedule', $parameters);  // send to franchise
        $this->whatsAppService->sendMessage('91'.$appointment->mobile, 'appointments_reschedule', $parameters); // send to customer
        // end send whatsaap Message

        // Send the success email
        Mail::to($appointment->email)->send(
            new AppointmentRescheduleMail($appointment, $appointmentDate, $appointmentTime, $franchiseName)
        );
        Mail::to($franchiseEmail)->send(
            new AppointmentRescheduleMail($appointment, $appointmentDate, $appointmentTime, $franchiseName)
        );

        // Redirect back with success message
        return redirect()
            ->back()
            ->with("success", "Franchise updated successfully.");
    }

    public function getAppointmentDetails($id, $type=null)
    {
		 //echo $type;die; 
        // Fetch the appointment by ID
        $appointment = Appointment::findOrFail($id);

        // Use a switch-case for better readability and easier status mapping
        switch ($type) {
            case "pending":
                $status = 1;
                break;
            case "assign":
                $status = 2;
                break;
            case "hold":
                $status = 3;
                break;
            case "complete":
                $status = 4;
                break;
            default:
                $status = 0; // Default status
                break;
        }

        // Check if the appointment's status matches the type passed
        if ($appointment && $appointment->status == $status) {
            return response()->json([
                "status" => "success",
                "data" => $appointment,
                "message" => "Appointment details fetched successfully.",
            ]);
        } else {
            return response()->json([
                "status" => "error",
                "message" => "Appointment not found or status mismatch.",
            ]);
        }
    }

    public function reject($id)
    {
        $appointData = Appointment::findOrFail($id);

        // Update the status to 'reject'
        $appointData->status = "5";  

        // Save the changes
        $appointData->save();
        if (!empty($appointData->email)) {
            Mail::to($appointData->email)->send(new AppointmentRejectedMail($appointData));
        }
        // return redirect()
        //     ->back()
        //     ->with("success", "Appointment rejected successfully.");
        return response()->json([
            'message' => 'Appointment Rejected Successfully.'
        ]);
    }

    public function exportBookQuery()
    {
        return Excel::download(new BookQueryExport, 'book_query.xlsx');
    }

    public function getFranchiseList($apnt_id){
        $franchises = Appointment::with('local_franchise')
        ->findOrFail($apnt_id);
        return $franchises;
    }

    public function getFranchiseName($apnt_id){
        $franchises =  Appointment::with(['local_franchise' => function($query) use ($apnt_id) {
            $query->where('id', '=', function($q) use ($apnt_id) {
                // Franchise_id ko match karte hue filter
                $q->select('franchise_id')
                  ->from('appointments')
                  ->where('id', $apnt_id)
                  ->limit(1); // Ensure only one row is returned
            });
        }])->findOrFail($apnt_id);
        return $franchises;
    }

        public function createRazorpayOrder(Request $request)
        {
            // dd($request->all());
            try {
                $api = new Api("rzp_test_IX6EFCqGoyCt59", "DlyvBZWmJuigIHM81VpCwKvw");
        
                $order = $api->order->create([
                    'receipt' => 'appointment_' . uniqid(),
                    'amount' => 750 * 100, // Amount in paise
                    'currency' => 'INR',
                    'payment_capture' => 1
                ]);
        
                return response()->json([
                    'order_id' => $order->id,
                    'amount' => $order->amount
                ]);
            } catch (\Exception $e) {
                return response()->json(['error' => 'Unable to create order.'], 500);
            }
        }   
    
    // public function ccavenueRedirect(Request $request)
    // {
    //     // CCAvenue Details
        
    //     $merchant_id = '4263500';
    //     $access_code = 'AVRR67MD91BY78RRYB';
    //     $working_key = 'FDB55EDAA233C28D70ED0003196E9955'; // This is used for encryption
    //     $redirect_url = 'https://curtainsandblinds.in'; // After payment redirect
    //     $cancel_url = route('ccavenue.cancel'); // If payment cancelled
    
    //     $order_id = 'CAB' . rand(100000, 999999);
    //     $amount = 750;
    
    //     $billing_name = $request->name;
    //     $billing_email = $request->email;
    //     $billing_tel = $request->mobile;
    //     $billing_address = $request->address;
    //     $billing_city = $request->city;
    //     $billing_state = $request->state;
    //     $billing_zip = $request->pincode;
    //     $billing_country = 'India';
    
    //     // Prepare all parameters
    //     $data = [
    //         "merchant_id" => $merchant_id,
    //         "order_id" => $order_id,
    //         "currency" => "INR",
    //         "amount" => $amount,
    //         "redirect_url" => $redirect_url,
    //         "cancel_url" => $cancel_url,
    //         "language" => "EN",
    //         "billing_name" => $billing_name,
    //         "billing_address" => $billing_address,
    //         "billing_city" => $billing_city,
    //         "billing_state" => $billing_state,
    //         "billing_zip" => $billing_zip,
    //         "billing_country" => $billing_country,
    //         "billing_tel" => $billing_tel,
    //         "billing_email" => $billing_email,
    //     ];
    
    //     // Convert array to query string
    //     $merchant_data = "";
    //     foreach ($data as $key => $value) {
    //         $merchant_data .= $key . '=' . urlencode($value) . '&';
    //     }
    
    //     // Encrypt the request
    //     $encRequest = $this->encrypt($merchant_data, $working_key);
    
    //     return response()->json([
    //         'status' => 'success',
    //         'encRequest' => $encRequest,
    //         'access_code' => $access_code,
    //         'payment_url' => 'https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction'
    //     ]);
    // }

    public function redirectToCcavenue(Request $request)
    {
        // Get CCAvenue credentials from .env
        $merchantId = '4263500';
        $accessCode = 'AVRR67MD91BY78RRYB';
        $workingKey = 'FDB55EDAA233C28D70ED0003196E9955'; // Working Key for Encryption

        // Form data
        $orderId = uniqid();
        $amount = 750.00; // Fixed amount for appointment booking
        $currency = "INR";

        $redirectUrl = route('appointment.ccavenue.response');
        $cancelUrl = route('appointment.ccavenue.response');

        // Create request data array
        $data = [
            'merchant_id' => $merchantId,
            'order_id' => $orderId,
            'currency' => $currency,
            'amount' => $amount,
            'redirect_url' => $redirectUrl,
            'cancel_url' => $cancelUrl,
            'language' => 'EN',
        ];
        // Convert array to query string
        $merchantData = http_build_query($data);
        
        // Encrypt request data
        $encryptedData = $this->encrypt($merchantData, $workingKey);
        // dd($encryptedData);

        // Return encrypted request data and CCAvenue details to AJAX
        return response()->json([
            'status' => 'success',
            'payment_url' => 'https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction',
            'encRequest' => $encryptedData,
            'access_code' => $accessCode,
        ]);
    }

    // Step 2: Handle CCAvenue Payment Response
    public function ccavenueResponse(Request $request)
    {
        $workingKey = 'FDB55EDAA233C28D70ED0003196E9955'; // Working Key for Decryption
        $encResponse = $request->input('encResp'); // Encrypted response

        // Decrypt response
        $decryptedResponse = $this->decrypt($encResponse, $workingKey);

        // Convert response string into array
        parse_str($decryptedResponse, $response);

        Log::info("CCAvenue Response: ", $response); // Log response for debugging

        // Check payment status
        if (isset($response['order_status']) && $response['order_status'] == "Success") {
            return view('payment-success', ['response' => $response]);
        } else {
            return view('payment-failure', ['response' => $response]);
        }
    }

    // Encryption Function
    private function encrypt($plainText, $key)
    {
        $key = md5($key);
        $key = pack('H*', $key);
        $iv = pack('H*', "00000000000000000000000000000000"); // 16 bytes IV

        $plainText = $this->pkcs5_pad($plainText, 16); // 👈 Yaha padding lagana zaroori hai

        $encryptedText = openssl_encrypt($plainText, 'AES-128-CBC', $key, OPENSSL_RAW_DATA | OPENSSL_ZERO_PADDING, $iv);

        return base64_encode($encryptedText);
    }

    private function pkcs5_pad($text, $blocksize)
    {
        $pad = $blocksize - (strlen($text) % $blocksize);
        return $text . str_repeat(chr($pad), $pad);
    }

    // Decryption Function
    private function decrypt($encryptedText, $key)
    {
        $encryptedText = base64_decode($encryptedText);
        $key = md5($key);
        $key = pack('H*', $key);
        $iv = pack('H*', "00000000000000000000000000000000");

        $decryptedText = openssl_decrypt($encryptedText, 'AES-128-CBC', $key, OPENSSL_RAW_DATA | OPENSSL_ZERO_PADDING, $iv);

        return $this->pkcs5_unpad($decryptedText);
    }

    private function pkcs5_unpad($text)
    {
        $pad = ord($text[strlen($text) - 1]);
        if ($pad > strlen($text)) return false;
        return substr($text, 0, -1 * $pad);
    }

    public function editLead($id){
        $leadData = Appointment::findOrFail($id);
        // dd($leadData);
        $typeProperties = ['Residential', 'Commercial', 'Industrial'];
        $requirementTypes = ['Installation', 'Maintenance', 'Repair', 'Inspection'];
        $leadSources = ['Google', 'Referral', 'Website', 'PhoneCall', 'Email', 'Walk-in', 'Social Media', 'Others'];
        $cityStateData = ZipCode::where('status', 'active') // 👈 Filter only active
        ->orderBy('state')
        ->orderBy('city')
        ->get();
        $groupedCityStateData = $cityStateData->groupBy('state')->map(function ($items) {
            return $items->pluck('city')->unique()->values();
        });
        return view('admin.leads.edit',compact('leadData','groupedCityStateData',
        'typeProperties',
        'requirementTypes',
        'leadSources'));
    }

    public function editUpdate(Request $request , $id){
        // dd($request->all());
        $request->validate([
            "name" => "required|string|max:255",
            "email" => "required|email",
            "mobile" => "required|digits_between:10,15",
            "address" => "required|string|max:255",
            "type_property" => "required",
            "requirement_type" => "required|string|max:100",
            "lead_source" => "required|string|max:100",
            "notes" => "required",
            "scope_work" => "required|string|max:100",
        ]);

        $lead = Appointment::findOrFail($id);
        $lead->name = $request->name;
        $lead->email = $request->email;
        $lead->address = $request->address;
        $lead->mobile = $request->mobile;
        $lead->type_property = $request->type_property;
        $lead->requirement_type = $request->requirement_type;
        $lead->lead_source = $request->lead_source;
        $lead->notes = $request->notes;
        $lead->scope_work = $request->scope_work;
        $lead->save();
        return response()->json(['success' => true, 'message' => 'Lead updated successfully.']);
    }

}
