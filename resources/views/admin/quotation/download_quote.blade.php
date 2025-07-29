@extends('admin.layouts.app')
@section('title', 'Download Bid')
@section('content')

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

<div class="container-fluid p-0">
    <nav class="navbar py-3 px-2 mb-4">
        <div class="container">
            <button class="primary-btn addBtn" data-quotation-name="{{ $order_data['name'] }}" type="button">
                <i class="bi bi-cloud-arrow-down-fill fs-6 me-2"></i> Download Bid
            </button>
        </div>
    </nav>
</div>

<div id="downloadagble_quote">
    @foreach($order_data['quotaiton_section'] as $sectionItem)
    <div class="page-break contract-container">

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
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>

<script>
    document.querySelector('.primary-btn.addBtn').addEventListener('click', function () {
        const element = document.getElementById('downloadagble_quote');
        const name = this.dataset.quotationName || 'quotation';
        const opt = {
            margin: 0,
            filename: `${name}_Bid.pdf`,
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: {
                scale: 2, // higher for better quality
                useCORS: true,
            },
            jsPDF: {
                unit: 'pt',
                format: 'a4',
                orientation: 'portrait'
            }
        };
        html2pdf().set(opt).from(element).save();
    });
</script>

@endsection
