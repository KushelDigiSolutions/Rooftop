	<div class="container mb-3 p-0 pt-0 px-4 align-items-start rounded" style="gap: 24px;"> 
		<table style="width: 100%; margin-bottom: 20px;">
            <tr>
                <td style="width: 30%;">
                    {{-- <img src="https://kmiroofing.com/images/rooftop_logo.png" alt="KMI Logo" style="height: 160px;" /> --}}
                    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/rooftop_logo.png'))) }}" alt="KMI Logo" style="height: 160px;" />
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

