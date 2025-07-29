<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Contract PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #fff;
            font-size: 14px;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 900px;
            margin: auto;
            border: 2px solid #000;
            padding: 30px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .company-info {
            width: 60%;
        }

        .company-logo {
            width: 35%;
            text-align: right;
        }

        h2 {
            margin: 0;
            font-size: 20px;
        }

        .section-title {
            text-align: center;
            font-weight: bold;
            margin-top: 30px;
            margin-bottom: 10px;
            text-decoration: underline;
        }

        .info-table {
            width: 100%;
            margin-bottom: 20px;
        }

        .info-table td {
            padding: 5px 0;
        }

        .content-box {
            padding: 10px;
            margin-bottom: 10px;
        }

        .price {
            font-size: 20px;
            margin: 20px 0;
        }

        .signature-table {
            width: 100%;
            margin-top: 40px;
        }

        .signature-table td {
            vertical-align: top;
        }

        .legal-notice {
            font-size: 13px;
            line-height: 1.6;
            margin-top: 30px;
        }

        .bold {
            font-weight: bold;
        }

        .green {
            color: green;
        }
    </style>
</head>
<body>
    <div style="max-width: 900px; margin: auto; padding: 30px; border: 2px solid #000; background: #fff; font-family: Arial, sans-serif;" class="mt-5">

    {{-- Header --}}
    <div style="display: flex; justify-content: space-between; align-items: flex-start;">
        <div style="width: 60%;">
            <h2 style="margin: 0; font-size: 20px;">KMI CONSTRUCTION INDUSTRIES, LLC</h2>
            <p style="margin: 4px 0; font-size: 14px;">
                8800 St Charles Rock Rd<br>
                St Louis, MO 63114<br>
                Bus: (314) 739-3434<br>
                KMI@kmiconstructionllc.com
            </p>
        </div>
        <div style="width: 35%; text-align: right;">
            <img src="https://kmiroofing.com/images/rooftop_logo.png" style="max-height: 100px;">
        </div>
    </div>

    <hr style="margin: 20px 0;">

    {{-- Title --}}
    <h2 style="text-align: center; text-decoration: underline; margin-bottom: 10px;">CONTRACT</h2>
    <p style="text-align: center; font-weight: bold; margin-bottom: 30px;">Customer Information and Project Location</p>

    {{-- Customer Info Table --}}
    <table style="width: 100%; font-size: 14px; margin-bottom: 20px;">
        <tr>
            <td><strong>Name:</strong> {{ $data['customer_name'] }}</td>
            <td style="text-align: right;"><strong>Email:</strong> {{ $data['email'] }}</td>
        </tr>
        <tr >
            <td style="padding-top: 30px;"><strong>Mobile:</strong> {{ $data['mobile'] }}</td>
            <td style="text-align: right; padding-top: 30px;"><strong>City, State, Zip:</strong> {{ $data['city_state_zip'] }}</td>
        </tr>
    </table>

    {{-- Scope of Work --}}
    <p style="text-align: center;"><strong>Scope of Work:</strong></p>
    

    <div style=" padding: 10px; margin-bottom: 10px; font-size: 14px;">
       {!! $data['scope_of_work'] !!}
    </div>

    {{-- Notes --}}
   

    {{-- Schedule --}}
     <table style="width: 100%; font-size: 14px; margin-bottom: 20px;">
        <tr>
            <td style="text-align: right;"><strong>Estimated Start:</strong> {{ $data['est_start'] }}</td>
            <td style="text-align: right;"><strong>Estimated Completion:</strong> {{ $data['est_end'] }}</td>
        </tr>
     </table>
   
    {{-- Price --}}
    <strong style="margin-top: 20px; font-size: 20px;">Contract Price: <span style="color: green;">${{ number_format($data['price'], 2) }}</span></strong>

    {{-- Payment Schedule --}}
	<br>
    {{-- <strong style="margin-top: 20px; font-size: 20px;">Payment Schedule</strong><br> --}}
    @php
    $installments = $data['installments'] ?? [];
    @endphp
	<h5 class="mt-4">Payment Schedule</h5>
        @if(!empty($installments))
        <ul>
            @foreach($installments as $index => $installment)
                <li>
                    <strong>Payment {{ $index + 1 }}:</strong> 
                    {{ $installment['due_date'] ?? '-' }} — ${{ number_format($installment['amount'] ?? 0, 2) }}
                </li>
            @endforeach
        </ul>
    @else
        <p>No payment schedule provided.</p>
    @endif
  
    {{-- Signature Section --}}
    <table style="width: 100%; margin-top: 40px; font-size: 14px;">
        <tr>
            <td style="width: 50%;">
                <strong>Owner Signature:</strong><br><br>
                {{ $data['customer_name'] }}<br>
                {{-- Date: {{ $data['contract_date'] }} --}}
            </td>
            <td style="width: 50%; text-align: right;">
                <strong>KMI Representative:</strong><br><br>
                Ed Miranda<br>
                {{-- Date: {{ $data['contract_date'] }} --}}
            </td>
        </tr>
    </table>

    <hr style="margin: 30px 0;">

    {{-- Legal Notice --}}
    <p style="font-size: 13px; line-height: 1.6;">
		
        <strong>NOTICE TO OWNER:</strong><br>
        {!!$data['notes'] !!}
    </p>

    <hr>
    
   
</div>
@include('admin.contract.contract_tearm_condition');
@include('admin.bid.bid_pdf');
</body>
</html>
