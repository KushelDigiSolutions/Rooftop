@extends('admin.layouts.app')
@section('title', 'Reports List')
@section('content')
@php
$statusMap = [
    1 => 'Pending',
    2 => 'Processing',
    3 => 'Hold',
    4 => 'Completed',
];
$distinctStatusCodes = array_keys($statusMap);

$statusBadgeClass = [
        1 => 'badge-pending',
        2 => 'badge-assigned',
        3 => 'badge-inactive',
        4 => 'badge-active',
    ];
@endphp
        <div class="dataOverviewSection mt-3">
    <div class="section-title">
        <h6 class="fw-bold m-0">Franchise-wise Sales</h6>
        <a href="{{ route('reports.franchiseWiseSales.export', request()->query()) }}" class="secondary-btn me-2 addBtn"><i class="bi bi-cloud-arrow-down me-2"></i>Export CSV</a>
    </div>

    <!-- Filters -->
    <form id="filterForm" method="GET" action="{{ route('reports.franchiseWiseSales') }}">
        <div class="section-title mt-3 justify-content-start align-items-end">
            <!-- Franchise Filter -->
            <div class="w-25 me-2">
                <label for="franchise" class="form-label mb-1">Select Franchise</label>
                <select class="form-select form-select-lg w-100 select2" id="franchise" name="franchise">
                    <option value="All" {{ request('franchise', 'All') == 'All' ? 'selected' : '' }}>All</option>
                    @foreach ($franchises as $franchise)
                        <option value="{{ $franchise->id }}" {{ request('franchise') == $franchise->id ? 'selected' : '' }}>
                            {{ $franchise->user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Report Type Filter -->
            <div class="w-25 me-2">
                <label for="report_type" class="form-label mb-1">Select Report Type</label>
                <!-- <select class="form-select form-select-lg w-100 select2" id="report_type" name="report_type">
                    <option value="All" {{ request('report_type', 'All') == 'All' ? 'selected' : '' }}>All</option>
                    @foreach ($distinctStatusCodes as $statusCode)
                        <option value="{{ $statusCode }}" {{ request('report_type') == $statusCode ? 'selected' : '' }}>
                            {{ $statusMap[$statusCode] ?? 'Unknown' }}
                        </option>
                    @endforeach
                </select> -->

                <select class="form-select form-select-lg w-100 select2" id="report_type" name="report_type">
                    <option value="All" {{ request('report_type', 'All') == 'All' ? 'selected' : '' }}>All</option>
                    @foreach ($distinctStatusCodes as $statusCode)
                        <option value="{{ $statusCode }}" {{ request('report_type') == $statusCode ? 'selected' : '' }}>
                            {{ $statusMap[$statusCode] ?? 'Unknown' }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Date Range Filter -->
            <div class="w-25 me-2">
                <label for="date_range" class="form-label mb-1">Select Date</label>
                <select class="form-select form-select-lg w-100" id="date_range" name="date_range">
                    <option value="All" {{ request('date_range', 'All') == 'All' ? 'selected' : '' }}>All</option>
                    <option value="Today" {{ request('date_range') == 'Today' ? 'selected' : '' }}>Today</option>
                    <option value="This Week" {{ request('date_range') == 'This Week' ? 'selected' : '' }}>This Week</option>
                    <option value="This Month" {{ request('date_range') == 'This Month' ? 'selected' : '' }}>This Month</option>
                    <option value="This Quarter" {{ request('date_range') == 'This Quarter' ? 'selected' : '' }}>This Quarter</option>
                    <option value="This Year" {{ request('date_range') == 'This Year' ? 'selected' : '' }}>This Year</option>
                    <option value="Custom" {{ request('date_range') == 'Custom' ? 'selected' : '' }}>Custom Date</option>
                </select>
            </div>

            <!-- Custom Date Inputs (Hidden by Default) -->
            <div class="w-25 me-2 custom-date-fields" style="display: {{ request('date_range') == 'Custom' ? 'block' : 'none' }};">
                <label for="start_date" class="form-label mb-1">Start Date</label>
                <input type="date" class="form-control" id="start_date" name="start_date" value="{{ request('start_date') }}">
            </div>
            <div class="w-25 me-2 custom-date-fields" style="display: {{ request('date_range') == 'Custom' ? 'block' : 'none' }};">
                <label for="end_date" class="form-label mb-1">End Date</label>
                <input type="date" class="form-control" id="end_date" name="end_date" value="{{ request('end_date') }}">
            </div>

            <!-- Filter Actions -->
            <div class="d-flex align-items-center justify-content-end">
                <button type="submit" class="ms-2 primary-btn addBtn" style="height: 40px;">
                    <i class="bi bi-funnel me-2"></i>Apply Filter
                </button>
                <a href="{{ route('reports.franchiseWiseSales') }}" class="ms-3">Reset</a>
            </div>
        </div>
    </form>

            <div class="info-tabs px-0">
                <a href="#">
                    <div class="card info-card flex-row">
                        <img src="images/tab-icon.svg" class="me-3" alt="">
                        <div>
                            <h2 class="fw-bold m-0 mb-1">{{$totalAppointments}}</h2>
                            <p class="m-0 small">Total Appointments</p>
                        </div>
                    </div>
                </a>
                <a href="#">
                    <div class="card info-card flex-row">
                        <img src="images/tab-icon.svg" class="me-3" alt="">
                        <div>
                            <h2 class="fw-bold m-0 mb-1">{{$totalSales}}</h2>
                            <p class="m-0 small">Total Sales (With GST)</p>
                        </div>
                    </div>
                </a>
                <a href="#">
                    <div class="card info-card flex-row">
                        <img src="images/tab-icon.svg" class="me-3" alt="">
                        <div>
                            <h2 class="fw-bold m-0 mb-1">{{$totalProductsSold}}</h2>
                            <p class="m-0 small">Total Products Sold</p>
                        </div>
                    </div>
                </a>
                <a href="#">
                    <div class="card info-card flex-row">
                        <img src="images/tab-icon.svg" class="me-3" alt="">
                        <div>
                            <h2 class="fw-bold m-0 mb-1">{{$totalOrders}}</h2>
                            <p class="m-0 small">Total Orders</p>
                        </div>
                    </div>
                </a>
                <a href="#">
                    <div class="card info-card flex-row">
                        <img src="images/tab-icon.svg" class="me-3" alt="">
                        <div>
                            <h2 class="fw-bold m-0 mb-1">{{$totalCompletedOrders}}</h2>
                            <p class="m-0 small">Total Orders Completed</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="dataOverview mt-1">
                <div class="table-responsive">
                    <table class="table" id="franchiseReportTable">
                        <thead>
                            <tr>
                                <th style="border-top-left-radius: 6px; border-bottom-left-radius: 6px;" scope="col">S/N</th>
                                <th scope="col">Appointment ID</th>
                                <th scope="col">Franchise Assigned</th>
                                <th scope="col">Mobile</th>
                                <th scope="col">City</th>
                                <th scope="col">Pincode</th>
                                <th scope="col">Status</th>
                                <th style="border-top-right-radius: 6px; border-bottom-right-radius: 6px;" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($appointments as $index => $appointment)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>#{{ $appointment->uniqueid }}</td>
                                    <td>{{ $appointment->franchise->name ?? 'N/A' }}</td>
                                    <td>{{ $appointment->mobile }}</td>
                                    <td>{{ $appointment->city }}</td>
                                    <td>{{ $appointment->pincode }}</td>
                                    <td>
                                        <span class="badge {{ $statusBadgeClass[$appointment->status] ?? 'badge-light' }}">
                                            {{ $statusMap[$appointment->status] ?? 'Unknown' }}
                                        </span>
                                    </td>
                                    <td>
                                        <div>
                                            <i class="bi bi-three-dots-vertical" type="button" data-bs-toggle="dropdown" aria-expanded="false"></i>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="#" class="dropdown-item" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample">View</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="dropdown-item small download_invoice_btn">Download Invoice</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="dropdown-item small download_quotation_btn">Download Quotation</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                                
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

<!-- Offcanvas Component -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample">
<div class="offcanvas-header border-bottom">
    <h5 class="offcanvas-title" id="FranciseViewLabel">Order Details</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
</div>
<div class="offcanvas-body">
    <!--We'll show the Appointment Details here-->
    <p class="fw-bold"><u>Appointment Details</u></p>
    <table class="table table-hover">

        <tbody>

            <tr>
                <th>Transaction Id</th>
                <td>TXN000002</td>
            </tr>

            <tr>
                <th>Appointment Id</th>
                <td>7</td>
            </tr>

            <tr>
                <th>Appointment Name</th>
                <td>Reyansh</td>
            </tr>

            <tr>
                <th>Appointment Pincode</th>
                <td>122002</td>
            </tr>

            <tr>
                <th>Quotation Id</th>
                <td>19</td>
            </tr>

            <tr>
                <th>Franchise</th>
                <td class="text-capitalize">Raj Tiwari</td>
            </tr>

            <tr>
                <th>Paid Type</th>
                <td class="text-capitalize">N/A</td>
            </tr>

            <tr>
                <th>Payment Mode</th>
                <td class="text-capitalize">online</td>
            </tr>
            <tr>
                <th>Total Paid Amount</th>
                <td>N/A</td>
            </tr>

            <tr>
                <th>Total Amount</th>
                <td>61660</td>
            </tr>

            <tr>
                <th>Pending Amount</th>
                <td>61660</td>
            </tr>

        </tbody>

    </table>

    <!--We'll show Customer Details Refer Registration Form -->
    <p class="fw-bold"><u>Customer Details</u></p>
    <table class="table table-hover">

        <tbody>

            <tr>
                <th>Transaction Id</th>
                <td>TXN000002</td>
            </tr>

            <tr>
                <th>Appointment Id</th>
                <td>7</td>
            </tr>

            <tr>
                <th>Appointment Name</th>
                <td>Reyansh</td>
            </tr>

            <tr>
                <th>Appointment Pincode</th>
                <td>122002</td>
            </tr>

            <tr>
                <th>Quotation Id</th>
                <td>19</td>
            </tr>

            <tr>
                <th>Franchise</th>
                <td class="text-capitalize">Raj Tiwari</td>
            </tr>

            <tr>
                <th>Paid Type</th>
                <td class="text-capitalize">N/A</td>
            </tr>

            <tr>
                <th>Payment Mode</th>
                <td class="text-capitalize">online</td>
            </tr>
            <tr>
                <th>Total Paid Amount</th>
                <td>N/A</td>
            </tr>

            <tr>
                <th>Total Amount</th>
                <td>61660</td>
            </tr>

            <tr>
                <th>Pending Amount</th>
                <td>61660</td>
            </tr>

        </tbody>
    </table>

    <!--We'll show Franchise Details Refer Franchise Form -->
    <p class="fw-bold"><u>Franchise Details</u></p>
    <table class="table table-hover">
        <tbody>

            <tr>
                <th>Transaction Id</th>
                <td>TXN000002</td>
            </tr>

            <tr>
                <th>Appointment Id</th>
                <td>7</td>
            </tr>

            <tr>
                <th>Appointment Name</th>
                <td>Reyansh</td>
            </tr>

            <tr>
                <th>Appointment Pincode</th>
                <td>122002</td>
            </tr>

            <tr>
                <th>Quotation Id</th>
                <td>19</td>
            </tr>

            <tr>
                <th>Franchise</th>
                <td class="text-capitalize">Raj Tiwari</td>
            </tr>

            <tr>
                <th>Paid Type</th>
                <td class="text-capitalize">N/A</td>
            </tr>

            <tr>
                <th>Payment Mode</th>
                <td class="text-capitalize">online</td>
            </tr>
            <tr>
                <th>Total Paid Amount</th>
                <td>N/A</td>
            </tr>

            <tr>
                <th>Total Amount</th>
                <td>61660</td>
            </tr>

            <tr>
                <th>Pending Amount</th>
                <td>61660</td>
            </tr>

        </tbody>

    </table>
</div>
</div>



@section('script')
<script>
$(document).ready(function() {
    
    $('.select2').select2();

    // Show/hide custom date fields based on date range selection
    $('#date_range').on('change', function() {
        if ($(this).val() === 'Custom') {
            $('.custom-date-fields').show();
        } else {
            $('.custom-date-fields').hide();
        }
    });

    // Reset filters
    function resetFilters(event) {
        event.preventDefault();
        window.location.href = "{{ route('reports.franchiseWiseSales') }}";
    }

    $('#franchiseReportTable').DataTable({
            responsive: true,
            language: {
                emptyTable: "No data found"
            }
    });
});
</script>
@endsection