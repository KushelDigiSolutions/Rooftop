@extends('admin.layouts.app')
@section('title', 'Contract Preview')
@section('content')

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

    {{-- Payment Schedule --}}
	<br>
    @php
    $installments = $data['installments'] ?? [];
    // dd($installments);
    @endphp
    {{-- <strong style="margin-top: 20px; font-size: 20px;">Payment Schedule</strong><br> --}}
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
        {{-- <ul>
            @foreach($data as $key => $value)
                @if(str_starts_with($key, 'payment_schedule_') && str_ends_with($key, '_date'))
                    @php
                        $index = explode('_', $key)[2];
                        $amountKey = 'payment_schedule_' . $index . '_amount';
                    @endphp
                    <li>
                        <strong>Payment {{ $index }}:</strong> 
                        {{ $value }} — ${{ $data[$amountKey] ?? '0.00' }}
                    </li>
                @endif
            @endforeach
        </ul> --}}
  
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
    
    
    <form action="{{ route('contract.confirm') }}" method="POST" class="align-end">
    @csrf

    {{-- Loop over data --}}
    @foreach($data as $key => $value)
        @if(is_array($value))
            {{-- For nested array like installments --}}
            @foreach($value as $i => $item)
                @foreach($item as $subKey => $subValue)
                    <input type="hidden" name="{{ $key }}[{{ $i }}][{{ $subKey }}]" value="{{ $subValue }}">
                @endforeach
            @endforeach
        @else
            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
        @endif
    @endforeach

    <button type="submit" class="btn btn-success">Send to Customer</button>
</form>
</div>
@include('admin.contract.contract_tearm_condition');
@include('admin.bid.bid_pdf');
@endsection
