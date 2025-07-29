
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

    <div class="container mb-3 p-0 pt-0 px-4 align-items-start rounded" style="gap: 24px;">

        <body>

            <table>
                <tr>
                    <td colspan="2">
                        <h3 style="text-align: center; margin: 10px 0px;">Contract Agreement</h3>
                        <p><strong>This Contract Agreement</strong> is made and entered into by and between <strong>KMI Roofing</strong>, having its registered office at the address mentioned above (hereinafter referred to as the "Contractor"), and <strong>{{ $order_data['appointment']['name'] ?? $order_data['appointment']['company_name'] }}</strong>, located at {{ $order_data['appointment']['address'] ?? '' }}, {{ $order_data['appointment']['city'] ?? '' }}, {{ $order_data['appointment']['state'] ?? '' }} (hereinafter referred to as the "Client").</p>
            
                        <p><strong>Project:</strong> {{ $order_data['project_name'] ?? 'N/A' }}<br>
                        <strong>Description:</strong> {{ $order_data['project_description'] ?? 'N/A' }}<br>
                        <strong>Scope of Work:</strong> {{ $order_data['scope_work'] ?? 'N/A' }}</p>
            
                        <p><strong>Contract Value:</strong><span id="bidAmount"></span></p>
            
                        <p><strong>Duration:</strong> The Contractor agrees to commence work upon receipt of payment and deliver the services/products within 15 days or as mutually agreed.</p>
            
                        <p><strong>Payment Terms:</strong> Payment once made is non-refundable. Payment methods accepted: Bank Transfer, Google Pay, PhonePe.</p>
            
                        <p><strong>Amendments:</strong> Any changes or additions to this agreement shall be made in writing and signed by both parties. Additional charges may apply.</p>
            
                        <p><strong>Termination:</strong> Either party may terminate this agreement with written notice in case of breach or mutual consent. Payment for work already done shall be due immediately.</p>
            
                        <p><strong>Jurisdiction:</strong> This agreement shall be governed by the laws of India. Any dispute shall be subject to the jurisdiction of the courts in {{ $order_data['appointment']['state'] ?? 'the concerned state' }}.</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p><strong>Client Signature:</strong></p>
                        <p>Name: {{ $order_data['appointment']['name'] ?? $order_data['appointment']['company_name'] }}</p>
                        <p>Date: ___________________</p>
                    </td>
                    <td style="text-align: right;">
                        <p><strong>Contractor Signature:</strong></p>
                        <img src="https://upload.wikimedia.org/wikipedia/commons/3/3a/Jon_Kirsch%27s_Signature.png" alt="Signature" width="150">
                        <p style="font-size: 12px;">Authorized Signatory</p>
                        <p>Date: ___________________</p>
                    </td>
                </tr>
            </table>
            
            
            <table>
                <tr>
                    <td colspan="4">
                        <h2 style="text-align: center; margin: 4px 0px !important; font-size: 18px;">Contract Order</h2>
                    </td>
                </tr>
                <tr>
                    <td colspan="1">
                        <p><strong>KMI Roofing</strong></p>
                        <p>KMI Address </p>
                        {{-- <p><b>GSTIN/UIN</b>: --</p> --}}
                        <p><b>E-Mail: </b>example.kmiroofing@gmail.com</p>
                    </td>
                    <td>
                        <?php //dd($order_data); 
                        ?>
                        <table class="no-border">
                            <tr>
                               <td><strong>Project Name:</strong> {{$order_data['project_name'] ?? 'N/A'}}</td>
                           </tr>
                         <tr>
                               <td><strong>Project Description:</strong> {{$order_data['project_description'] ?? 'N/A'}}</td>
                           </tr>
                           <tr>
                               <td><strong>Scope of Work:</strong> {{$order_data['scope_work'] ?? 'N/A'}}</td>
                           </tr>
                             {{-- <tr>
                               <td><strong>Destination:</strong> {{$order_data['destination'] ?? 'N/A'}}</td>
                           </tr> --}}
                          {{-- <tr>
                               <td><strong>City/Port of Loading:</strong> {{$order_data['destination'] ?? 'N/A'}}</td>
                           </tr>
                           <tr>
                               <td><strong>City/Port of Discharge:</strong> {{ $order_data['appointment']['state'] ?? '' }}</td>
                           </tr>
                           <tr>
                               <td><strong>Terms of Delivery:</strong> {{$order_data['terms_delivery'] ?? 'N/A'}}</td>
                           </tr> --}}
                       </table>
                    </td>
                    <td>
                        <table class="no-border">
                            {{-- <tr>
                                <td><strong>Other References:</strong> {{$order_data['other_ref'] ?? 'N/A'}}</td>
                            </tr> --}}
                            <!-- <tr>
                                <td><strong>Dispatched through:</strong> {{$order_data['dispatch'] ?? 'N/A'}}</td>
                            </tr> -->
                            {{-- <tr>
                                <td><strong>Destination:</strong> {{$order_data['destination'] ?? 'N/A'}}</td>
                            </tr> --}}
                            <!-- <tr>
                                <td><strong>City/Port of Loading:</strong> {{$order_data['destination'] ?? 'N/A'}}</td>
                            </tr> -->
                            <!-- <tr>
                                <td><strong>City/Port of Discharge:</strong> {{ $order_data['appointment']['state'] ?? '' }}</td>
                            </tr> -->
                            <!-- <tr>
                                <td><strong>Terms of Delivery:</strong> {{$order_data['terms_delivery'] ?? 'N/A'}}</td>
                            </tr> -->
                        </table>
                    </td>
                </tr>
                
                <tr>
                    <td colspan="4">
                        <p><strong>Customer</strong></p>
                        <p>{{ $order_data['appointment']['name'] ?? $order_data['appointment']['company_name'] }}</p>
                        <p>{{ $order_data['appointment']['mobile'] }}</p>
                        <p>{{ $order_data['appointment']['address'] ?? '' }}, {{ $order_data['appointment']['city'] ?? '' }}, {{ $order_data['appointment']['state'] ?? '' }}, {{ $order_data['appointment']['pincode'] ?? '' }} {{ $order_data['appointment']['country'] ?? '' }}</p>
                        {{-- <p><strong>GSTIN/UIN</strong>: {{ $order_data['gst_no'] ?? 'N/A' }}</p> --}}
                    </td>
                </tr>
            </table>

            <table style="display: none;">
                <tr>
                    <th class="table-heading">Description of Goods and Services</th>
                    <!-- <th class="table-heading">GST Rate</th> -->
                    <th class="table-heading">Quantity</th>
                    <th class="table-heading">Unit</th>
                    <th class="table-heading">Price</th>
					{{-- <th class="table-heading">Tax %</th> --}}
                    {{-- <th class="table-heading">Discount %</th> --}}
                    <th class="table-heading">Bid Amount</th>
                </tr>
                <?php $total = 0; $gst_amount=0; $total_gst_per=0;$per_item_discount=0; $per_item_total_discount=0;   ?>
                @foreach($order_data['quotaiton_section'] as $sectionItem)
                <tr>
                    <th class="fs-6"><u>{{$sectionItem['section_name']}}</u></th>
                </tr>
                @foreach ($sectionItem['items'] as $item)
                <?php $total = $total + $item['price']*$item['qty']; ?>
				<?php $per_item_gst_amount=($item['price']*$item['qty']*$item['gst_percentage']/100)?>
				<?php $total_gst_per=$total_gst_per + $item['gst_percentage'];?>
				<?php if(!empty($item['discount'])){
				$per_item_discount=($item['price']*$item['qty']*$item['discount']/100); } ?>
				<?php $per_item_total_discount= $per_item_total_discount + $per_item_discount ?>
				<?php $gst_amount =$gst_amount+(((($item['price']*$item['qty']) - $per_item_discount) *$item['gst_percentage']/100) ) ?>
                <tr>
                    <!-- <?php // echo'<pre>';print_r($order_data['appointment']['state']); exit; 
                            ?> -->
                    <td>{{$item['name']}} / {{$item['tally_code']}} / {{$item['file_number']}}</td>
                    <!-- <td>{{$item['qty']}}</td> -->
                    <td>{{$item['qty']}}</td>
                    <td>{{$item['unit']}}</td>
                    <td>${{$item['price']}}</td>
					{{-- <td>{{round($item['gst_percentage'])}}</td>  
                    <td>{{round($item['discount'])}}</td> --}}
                    <td>${{((round(($item['price']*$item['qty'])- $per_item_discount)))}}</td>
                </tr>
                <?php  $per_item_discount=0; ?>
                @endforeach    
                
                @endforeach

            </table>
            <table>
                @if($order_data['appointment']['state'] == 'delhi' || $order_data['appointment']['state'] == 'Delhi')
                <tr>
                    <td style="text-align: right; width: 35.20%;">Tax </td>
                    <td class="align-right">{{ $gst_amount/2 }}</td>
                </tr>
                <tr>
                    <td style="text-align: right; width: 35.20%;">CGST-OUTPUT </td>
                    <td class="align-right">{{ $gst_amount/2 }}</td>
                </tr>
                @else
                {{-- <tr>
                    <td style="text-align: right; width: 35.20%;">Total </td>
                    <td class="align-right">{{ round($gst_amount) }}</td>
                </tr> --}}
                
                @endif

               <!-- <tr>
                    <td style="text-align: right; width: 35.20%;"><span style="float: left; font-style: italic; font-weight: 200;">Less: </span>Round Off</td>
                    <td class="align-right">-0.38</td>
                </tr> -->
            </table>
            <table>
                <tr class="table-heading">
                    <td style="text-align: right; width: 35.20%;">Total</td>
                    <!-- <td style="text-align: right; width: 36%;"><strong>75.5 <span>MTRS</span></strong></td> -->
                    <td class="align-right"><strong>$ {{ round(($total+$gst_amount)-$per_item_total_discount) }}</strong></td>     
                </tr>
            </table>

            <table>
                <tr>
                    <td style="width: 62%;">Amount Chargeable (in words):</td>
                    {{-- <td class="align-right">E. & O.E</td> --}}
                </tr>
                <tr>
				<?php use NumberToWords\NumberToWords;
						$numberToWords = new NumberToWords();
						$numberTransformer = $numberToWords->getNumberTransformer('en'); // 'en' for English

						 ?>
                    <td style="width: 62%;"><strong><?php echo ucwords($numberTransformer->toWords(round(($total+$gst_amount)-$per_item_total_discount))) . " Only"?></strong></td>
                    <td><strong>For KMI Roofing</strong></td>
                </tr>
            </table>

            <table>
                <tr>
                    <td style="width: 62%;"><strong>Declaration:</strong><br>The above mentioned prices are valid for 7 days from
                        the date of issue.
                        We declare that this invoice shows the actual price of the goods described and that all particulars are
                        true and correct.</td>
                    <td colspan="2">
                        <img style="margin: 12px 0px;"
                            src="https://upload.wikimedia.org/wikipedia/commons/3/3a/Jon_Kirsch%27s_Signature.png"
                            alt="Signature" width="150">
                        <br>
                        <p style="font-size: 12px;">Authorised Signatory</p>
                    </td>
                </tr>
            </table>

            <table>
                <tr>
                    <td>
                        <p><strong>Terms and Conditions</strong></p>
                        {{-- <ul style="padding-left: 25px;">
                            <li>Payment non-refundable.</li>
                            <li>Delivery of goods within 15 days
                                of payment received.</li>
                            <li>Payment can be done
                                via Bank account, Google Pay, or Phone Pay.</li>
                            <li>Any changes in order will be charged extra.</li>
                        </ul> --}}
                        <p>Satelitte realignments are the resonsibility of homeowner. We will resintall
                            dishes on the roof if requested or dispose for free, but do not guarantee signal.
                            If you have a dish, please let us know.</p>
                    </td>
                </tr>
            </table>
        </body>
    </div>



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


