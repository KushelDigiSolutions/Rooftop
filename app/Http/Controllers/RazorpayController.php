<?php

namespace App\Http\Controllers;

use App\Mail\InvoiceGeneratedMail;
use App\Models\Appointment;
use App\Models\Order;
use App\Models\Quotation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Validator;

class RazorpayController extends Controller
{
    private function generateNextCode($lastCode, $prefix)
    {
        if (!$lastCode) {
            return $prefix . "000001";
        }
        $numberPart = (int) substr($lastCode, strlen($prefix));
        $nextNumber = str_pad($numberPart + 1, 6, "0", STR_PAD_LEFT);
        return $prefix . $nextNumber;
    }

    public function createOrder(Request $request)
    {
        $api = new Api("rzp_test_IX6EFCqGoyCt59", "DlyvBZWmJuigIHM81VpCwKvw");

        $rules = [
            "payment_mode" => "required",
        ];

        $validator = Validator::make($request->all(), $rules, [
            "payment_mode.required" => "Please Select Payment Mode",
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $amountInPaise = round($request->order_value * 100);

        $orderData = [
            'amount' => (int) $amountInPaise,
            'currency' => 'INR',
            'receipt' => 'rcptid_' . rand(1000, 10000),
            'payment_capture' => 1,
        ];

        try {
            $order = $api->order->create($orderData);

            // Save temporary session (optional)
            session([
                'pending_payment_data' => $request->all(),
                'generated_order_id' => $order->id
            ]);

            return response()->json(['order_id' => $order->id, 'amount' => $amountInPaise]);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create Razorpay order: ' . $e->getMessage()]);
        }
    }

    public function paymentSuccess(Request $request)
    {
        $api = new Api("rzp_test_IX6EFCqGoyCt59", "DlyvBZWmJuigIHM81VpCwKvw");

        $attributes = [
            'razorpay_order_id' => $request->razorpay_order_id,
            'razorpay_payment_id' => $request->razorpay_payment_id,
            'razorpay_signature' => $request->razorpay_signature,
        ];

        try {
            $api->utility->verifyPaymentSignature($attributes);

            $requestData = session('pending_payment_data');
            if (!$requestData || session('generated_order_id') !== $request->razorpay_order_id) {
                return response()->json(['error' => 'Session expired or mismatched order.']);
            }

            $lastTxnId = Order::max("txn_id");
            $nextTxnId = $this->generateNextCode($lastTxnId, "TXN");

            $requestData["txn_id"] = $nextTxnId;
            $order = Order::create($requestData);

            if ($order) {
                // Update appointment and quotation status
                $appointment = Appointment::findOrFail($requestData['appointment_id']);
                $appointment->update(['status' => "4"]);

                Quotation::where('appointment_id', $requestData['appointment_id'])
                    ->where('id', $requestData['quotation_id'])
                    ->update(['status' => '1']);

                // Send email
                // Mail::to($appointment->email)->send(
                //     new InvoiceGeneratedMail($appointment, $requestData['quotation_id'])
                // );
            }

            // Clear session
            session()->forget(['pending_payment_data', 'generated_order_id']);

            return response()->json(['success' => true]);

        } catch (\Razorpay\Api\Errors\SignatureVerificationError $e) {
            return response()->json(['error' => 'Payment verification failed!']);
        }
    }

    public function paymentFail()
    {
        return response()->json(['status' => 'Payment failed']);
    }
}
