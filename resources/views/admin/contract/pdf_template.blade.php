<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Contract PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #fff;
            font-size: 13px;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 900px;
            margin: auto;
            /* border: 1px solid #000; */
            padding: 20px;
            page-break-inside: avoid;
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
            font-size: 18px;
        }

        .section-title {
            text-align: center;
            font-weight: bold;
            margin-top: 20px;
            margin-bottom: 10px;
            text-decoration: underline;
        }

        .info-table, .signature-table {
            width: 100%;
            font-size: 13px;
            margin-bottom: 15px;
        }

        .info-table td, .signature-table td {
            padding: 4px 0;
        }

        .content-box {
            padding: 5px;
            margin-bottom: 10px;
        }

        .price {
            font-size: 16px;
            margin: 15px 0;
        }

        .legal-notice {
            font-size: 12px;
            line-height: 1.4;
            margin-top: 20px;
        }

        ul {
            padding-left: 20px;
        }

        hr {
            margin: 15px 0;
        }

        .green {
            color: green;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="company-info">
                <h2>KMI CONSTRUCTION INDUSTRIES, LLC</h2>
                <p>
                    8800 St Charles Rock Rd<br>
                    St Louis, MO 63114<br>
                    Bus: (314) 739-3434<br>
                    KMI@kmiconstructionllc.com
                </p>
            </div>
           <div style="text-align: right;">
                <img src="https://kmiroofing.com/images/rooftop_logo.png" style="max-height: 80px;">
            </div>
        </div>

        <hr>

        <h2 class="section-title">CONTRACT</h2>
        <p style="text-align: center; font-weight: bold;">Customer Information and Project Location</p>

        <table class="info-table">
            <tr>
                <td><strong>Name:</strong> {{ $data['customer_name'] }}</td>
                <td style="text-align: right;"><strong>Email:</strong> {{ $data['email'] }}</td>
            </tr>
            <tr>
                <td><strong>Mobile:</strong> {{ $data['mobile'] }}</td>
                <td style="text-align: right;"><strong>City, State, Zip:</strong> {{ $data['city_state_zip'] }}</td>
            </tr>
        </table>

        <p style="text-align: center;"><strong>Scope of Work:</strong></p>
        <div class="content-box">
            {!! $data['scope_of_work'] !!}
        </div>

        <table class="info-table">
            <tr>
                <td style="text-align: right;"><strong>Estimated Start:</strong> {{ $data['est_start'] }}</td>
                <td style="text-align: right;"><strong>Estimated Completion:</strong> {{ $data['est_end'] }}</td>
            </tr>
        </table>

        <p class="price"><strong>Contract Price:</strong> <span class="green">${{ number_format($data['price'], 2) }}</span></p>

        <h5>Payment Schedule</h5>
        @php
        $installments = $data['installments'] ?? [];
        @endphp
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

        <table class="signature-table">
            <tr>
                <td style="width: 50%;">
                    <strong>Owner Signature:</strong><br><br>
                    {{ $data['customer_name'] }}<br>
                </td>
                <td style="width: 50%; text-align: right;">
                    <strong>KMI Representative:</strong><br><br>
                    Ed Miranda<br>
                </td>
            </tr>
        </table>

        <hr>

        <p class="legal-notice">
            <strong>NOTICE TO OWNER:</strong><br>
            {!! $data['notes'] !!}
        </p>

        <hr>
    </div>

    @include('admin.contract.pdf_tearm_condition')
    @include('admin.bid.email_bid_pdf')
</body>
</html>
