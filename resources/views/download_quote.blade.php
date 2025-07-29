
<style>
    .info-tabs {
        padding: 16px;
        display: flex;
        row-gap: 16px;
        column-gap: 16px;
    }

    .info-tabs a {
        width: 100%;
    }

    .info-card {
        height: auto;
        width: 100%;
        padding: 16px;
        border-radius: 6px;
        background-color: var(--white);
        border: 1px solid var(--dark-light);
        transition: all ease-in 0.3s;
    }

    .info-card:hover {
        box-shadow: var(--shadow);
    }


    .info-card img {
        max-width: 50px;
        margin-bottom: 12px;
    }

    body {
        font-family: Arial, sans-serif;
        font-size: 14px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background:#ffffff;
    }

    td p {
        margin: 4px 0px !important;
    }

    th,
    td {
        border: 1px solid black;
        padding: 4px;
        text-align: left;
        vertical-align: top;
    }

    .no-border td {
        border: none;
    }

    .table-heading {
        background-color: #E0E0E0;
    }

    .align-right {
        text-align: right !important;
    }
</style>
<style>
    body {
        font-family: Arial, sans-serif;
        font-size: 13px;
        color: #000;
    }

    .page-break {
        page-break-before: always;
    }

    .contract-container {
        width: 800px;
        margin: auto;
        background: #fff;
        padding: 20px;
        border: 1px solid #ddd;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    th, td {
        border: 1px solid #000;
        padding: 5px;
        text-align: left;
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
    }

    .total-row td {
        font-weight: bold;
    }

</style>
<?php //dd($order_data); 
?>


    <!-- Contract Agreement Section -->
    <?php $total = 0; $gst_amount=0; $total_gst_per=0;$per_item_discount=0; $per_item_total_discount=0;   ?>

    @foreach($order_data['quotaiton_section'] as $sectionItem)
    <div class="page-break ">

        {{-- 🧾 Header --}}
        @include('admin.quotation.partials.header', ['order_data' => $order_data])

        {{-- 📘 Section Name --}}
        <div class="section-header">{{ $sectionItem['section_name'] }}</div>

        {{-- 📝 Description description --}}
        <div class="section-description">{{ $sectionItem['description'] }} </div>

        {{-- 📋 Items --}}
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
				@php
					$sectionSubtotal = 0;
				@endphp
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
                    <td>${{ number_format(($item['price'] * $item['qty']) - ($item['price'] * $item['qty'] * $item['discount'] / 100), 2) }}</td>
                </tr>
                @endforeach
				<tr>
					<td colspan="4" class="align-right"><strong>Subtotal</strong></td>
					<td><strong>${{ number_format($sectionSubtotal, 2) }}</strong></td>
				</tr>
            </tbody>
        </table>

        {{-- ✅ Footer --}}
        @include('admin.quotation.partials.footer')

    </div>
    @endforeach


