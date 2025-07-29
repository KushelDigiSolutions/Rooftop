

<style>
   
    .page-break {
        page-break-before: always;
        height: 100%;
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
        /* border: 1px solid #000; */
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
<div style="max-width: 900px; margin: auto; padding: 30px; border: 2px solid #000; background: #fff; font-family: Arial, sans-serif;" class="mt-5">
<div id="downloadagble_quote">
    @foreach($order_data['quotaiton_section'] as $sectionItem)
    <div class="page-break contract-container">

        {{-- 🧾 Header --}}
        	<div class="container mb-3 p-0 pt-0 px-4 align-items-start rounded" style="gap: 24px;"> 
		<table style="width: 100%; margin-bottom: 20px;">
            <tr>
                <td style="width: 30%;">
                    <img src="https://kmiroofing.com/images/rooftop_logo.png" alt="KMI Logo" style="height: 160px;" />
                </td>
                <td style="font-size: 14px;display: flex; justify-content: space-between;">
                    <div>
                        <strong>KMI Construction Industries, LLC</strong><br />
                        8800 St Charles Rock Rd<br />
                        St Louis, MO 63114<br />
                        314-739-3434<br /><br />
							<strong>Ed Miranda</strong><br />
							314-226-5228<br />
							<a href="mailto:ed@kmiconstructionllc.com" style="color: blue; text-decoration: underline;">
								ed@kmiconstructionllc.com
							</a><br /><br />
                    </div>
                    <div>
                       
                        <span style="font-style: italic;">Price good for 30 days<br />unless otherwise specified</span>
                    </div>
                </td>
            </tr>
        </table>
<table style="width: 100%; margin-bottom: 10px;">
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
    

    </div>
    @endforeach
</div>
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