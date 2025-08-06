<style>
    body {
        font-family: Arial, sans-serif;
        font-size: 12px;
        color: #000;
    }

    .contract-container {
        width: 100%;
        padding: 20px;
        border: 1px solid #ddd;
        background: #fff;
        margin-bottom: 20px;
    }

    .section-header {
        background-color: #f8f8f8;
        padding: 10px;
        font-weight: bold;
        text-align: center;
        border: 1px solid #000;
        border-bottom: none;
    }

    .section-description {
        border: 1px solid #000;
        border-top: none;
        padding: 10px;
        margin-bottom: 10px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
        margin-bottom: 10px;
    }

    th, td {
        border: 1px solid #000;
        padding: 5px;
        text-align: left;
        vertical-align: top;
    }

    .total-row td {
        font-weight: bold;
    }

    .page-break {
        page-break-before: always;
    }

    .align-right {
        text-align: right;
    }
</style>
@foreach($order_data['quotaiton_section'] as $sectionItem)
<div class="{{ !$loop->first ? 'page-break' : '' }}">
    <div class="contract-container">

        {{-- 🧾 Header --}}
        <table>
            <tr>
                <td style="width: 30%;">
                    <img src="https://kmiroofing.com/images/rooftop_logo.png" alt="KMI Logo" style="height: 120px;" />
                </td>
                <td style="font-size: 12px;">
                    <strong>KMI Construction Industries, LLC</strong><br />
                    8800 St Charles Rock Rd<br />
                    St Louis, MO 63114<br />
                    314-739-3434<br /><br />
                    <strong>Ed Miranda</strong><br />
                    314-226-5228<br />
                    ed@kmiconstructionllc.com<br /><br />
                    <em>Price good for 30 days unless otherwise specified</em>
                </td>
            </tr>
        </table>

        {{-- 🧑 Customer Info --}}
        <table>
            <tr>
                <td><strong>Customer:</strong> {{ $order_data['appointment']['name'] ?? $order_data['appointment']['company_name'] }}</td>
                <td><strong>Phone:</strong> {{ $order_data['appointment']['mobile'] }}</td>
            </tr>
            <tr>
                <td><strong>Address:</strong> {{ $order_data['appointment']['address'] ?? '' }}</td>
                <td><strong>Email:</strong> {{ $order_data['appointment']['email'] ?? '' }}</td>
            </tr>
        </table>

        {{-- 📘 Section Name --}}
        <div class="section-header">{{ $sectionItem['section_name'] }}</div>

        {{-- 📝 Section Description --}}
        <div class="section-description">{{ $sectionItem['description'] }}</div>

        {{-- 📋 Item Table --}}
        <table>
            <thead>
                <tr>
                    <th>Items</th>
                    <th>Quantity</th>
                    <th>Unit</th>
                    <th>Price/Unit</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @php $sectionSubtotal = 0; @endphp
                @foreach ($sectionItem['items'] as $item)
                    @php
                        $itemTotal = ($item['price'] * $item['qty']) - ($item['price'] * $item['qty'] * $item['discount'] / 100);
                        $sectionSubtotal += $itemTotal;
                    @endphp
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['qty'] }}</td>
                        <td>{{ $item['unit'] }}</td>
                        <td>${{ number_format($item['price'], 2) }}</td>
                        <td>${{ number_format($itemTotal, 2) }}</td>
                    </tr>
                @endforeach
                <tr class="total-row">
                    <td colspan="4" class="align-right">Subtotal</td>
                    <td>${{ number_format($sectionSubtotal, 2) }}</td>
                </tr>
            </tbody>
        </table>

    </div>
</div>
@endforeach
