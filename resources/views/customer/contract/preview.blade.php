
<!DOCTYPE html>
<html>
<head>
    <title>Contract Preview</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; margin: 20px; }
        .header { text-align: center; margin-bottom: 20px; }
        .logo img { height: 80px; }
        .section-title { font-weight: bold; margin-top: 20px; border-bottom: 1px solid #ccc; }
        .row { display: flex; justify-content: space-between; margin: 5px 0; }
        .box { border: 1px solid #ccc; padding: 10px; margin-bottom: 20px; }
    </style>
</head>
<body>
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
            <img src="{{ asset('images/rooftop_logo.png') }}" style="max-height: 100px;">
        </div>
    </div>

    <hr style="margin: 20px 0;">

    {{-- Title --}}
    <h2 style="text-align: center; text-decoration: underline; margin-bottom: 10px;">CONTRACT</h2>
    <p style="text-align: center; font-weight: bold; margin-bottom: 30px;">Customer Information and Project Location</p>

    {{-- Customer Info Table --}}
    <table style="width: 100%; font-size: 14px; margin-bottom: 20px;">
        <tr>
            <td><strong>Name:</strong> {{ $data->customer['name'] }}</td>
            <td style="text-align: right;"><strong>Email:</strong> {{ $data->customer['email'] }}</td>
        </tr>
        <tr >
            <td style="padding-top: 30px;"><strong>Date:</strong> {{ \Carbon\Carbon::parse($data->created_at)->format('M, d Y') }}</td>
            <td style="text-align: right; padding-top: 30px;"><strong>City, State, Zip:</strong> {{ $data->customer['city'].',',$data->customer['state'].','.$data->customer['pincode'] }}</td>
        </tr>
    </table>

    {{-- Scope of Work --}}
    <p style="text-align: center;"><strong>Scope of Work:</strong></p>
    
    <p>Roof Type: <strong>{{$data['roof_type']}}</strong></p>
    <p>Roof Color: <strong>{{$data['roof_color']}}</strong></p>
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

    <h5 class="mt-4">Payment Schedule</h5>
   
        <ul>
            @foreach($data->installments as $index => $installment)
                <li>
                    <strong>Payment {{ $index + 1 }}:</strong> 
                    {{ \Carbon\Carbon::parse($installment->due_date)->format('m-d-Y') }} — ${{ $installment->amount }}
                </li>
            @endforeach
        </ul>

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

   <a href="{{ route('contract.download', $data->id) }}" class="btn btn-primary" target="_blank">Download PDF</a>
   </body>
</html>