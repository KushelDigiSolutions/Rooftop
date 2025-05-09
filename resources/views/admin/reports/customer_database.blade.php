@extends('admin.layouts.app')
@section('title', 'Reports List')
@section('content')
@php
    // Unique states, cities, and status values
    // $uniqueStates = $appointments->pluck('state')->unique()->sort();
    // $uniqueCities = $appointments->pluck('city')->unique()->sort();
    $uniqueStates = $states;
    $uniqueCities = $cities;
    
    $statusMap = [
        1 => 'Pending',
        2 => 'Processing',
        3 => 'Hold',
        4 => 'Completed',
    ];

    // $uniqueStatus = $appointments->pluck('status')->unique()->sort()->values();
    $uniqueStatus = array_keys($statusMap);

    $statusBadgeClass = [
        1 => 'badge-pending',
        2 => 'badge-assigned',
        3 => 'badge-inactive',
        4 => 'badge-active',
    ];
@endphp
                <div class="dataOverviewSection mt-3">
                    <div class="section-title">
                        <h6 class="fw-bold m-0">Customer Database</h6>
                        <a href="{{ route('reports.customerDatabase.export', request()->query()) }}" class="secondary-btn me-2 addBtn"><i class="bi bi-cloud-arrow-down me-2"></i>Export
                            CSV</a>
                    </div>
                    <!-- Filters -->
                    <form id="filterForm" method="GET" action="{{ route('reports.customerDatabase') }}">
                        <div class="section-title mt-3 justify-content-start align-items-end">
                            
                            <div class="w-25 me-2" bis_skin_checked="1">
                                <!-- Please use select2 here for search and multiple selection feature -->
                                <label for="state" class="form-label mb-1">Select State</label>
                                <select class="form-select form-select-lg w-100 select2" id="state" name="state">
                                    <option value="All" {{ request('state', 'All') == 'All' ? 'selected' : '' }}>All</option>
                                     @foreach ($uniqueStates as $state)
                                        <option value="{{ $state }}" {{ request('state') == $state ? 'selected' : '' }}>{{ $state }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- City Filter -->
                            <div class="w-25 me-2" bis_skin_checked="1">
                                <label for="city" class="form-label mb-1">Select City</label>
                                <select class="form-select form-select-lg w-100 select2" id="city" name="city">
                                    <option value="All" {{ request('city', 'All') == 'All' ? 'selected' : '' }}>All</option>
                                    @foreach ($uniqueCities as $city)
                                        <option value="{{ $city }}" {{ request('city') == $city ? 'selected' : '' }} class="city-option" data-state="{{ $city }}">
                                            {{ $city }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Date Range Filter -->
                            <div class="w-25 me-2" bis_skin_checked="1">
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
                            <div class="w-25 me-2 custom-date-fields" style="display: {{ request('date_range') == 'Custom' ? 'block' : 'none' }};" bis_skin_checked="1">
                                <label for="start_date" class="form-label mb-1">Start Date</label>
                                <input type="date" class="form-control" id="start_date" name="start_date" value="{{ request('start_date') }}">
                            </div>
                            <div class="w-25 me-2 custom-date-fields" style="display: {{ request('date_range') == 'Custom' ? 'block' : 'none' }};" bis_skin_checked="1">
                                <label for="end_date" class="form-label mb-1">End Date</label>
                                <input type="date" class="form-control" id="end_date" name="end_date" value="{{ request('end_date') }}">
                            </div>

                            <!-- Filter Actions -->
                            <div class="d-flex align-items-center justify-content-end">
                                <button type="submit" class="ms-2 primary-btn addBtn" style="height: 40px;">
                                    <i class="bi bi-funnel me-2"></i>Apply Filter
                                </button>
                                <a href="{{ route('reports.customerDatabase') }}" class="ms-3">Reset</a>
                            </div>
                        </div>
                    </form>

                    <div class="info-tabs px-0">
                        <a href="#">
                            <div class="card info-card flex-row">
                                <img src="images/tab-icon.svg" class="me-3" alt="">
                                <div>
                                    <h2 class="fw-bold m-0 mb-1">{{$totalStates}}</h2>
                                    <p class="m-0 small">Total States</p>
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="card info-card flex-row">
                                <img src="images/tab-icon.svg" class="me-3" alt="">
                                <div>
                                    <h2 class="fw-bold m-0 mb-1">15</h2>
                                    <p class="m-0 small">Total Cities</p>
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="card info-card flex-row">
                                <img src="images/tab-icon.svg" class="me-3" alt="">
                                <div>
                                    <h2 class="fw-bold m-0 mb-1">{{$totalAppointments}}</h2>
                                    <p class="m-0 small">Total Customers</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="dataOverview mt-1">
                        <div class="table-responsive">
                            <table class="table" id="customerdatabaseTable">
                                <thead>
                                    <tr>
                                        <th style="border-top-left-radius: 6px; border-bottom-left-radius: 6px;">S/N</th>
                                        <th>Appointment ID</th>
                                        <th>Name</th>
                                        <th>Mobile</th>
                                        <th>State</th>
                                        <th>City</th>
                                        <th>Pincode</th>
                                        <th>Status</th>
                                        <th style="border-top-right-radius: 6px; border-bottom-right-radius: 6px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($appointments as $index => $appointment)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $appointment->uniqueid ?? '#N/A' }}</td>
                                            <td>{{ $appointment->name }}</td>
                                            <td>{{ $appointment->mobile }}</td>
                                            <td>{{ $appointment->state }}</td>
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
                                                            <a href="#" class="dropdown-item" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample">View</a>
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
            <!--We'll show Customer Details Refer Registration Form -->
            <p class="fw-bold"><u>Customer Details</u></p>
            <table class="table table-hover">

                <tbody>

                    <tr>
                        <th>Name</th>
                        <td>Vivek Kumar</td>
                    </tr>

                    <tr>
                        <th>Email</th>
                        <td>test@gmail.com</td>
                    </tr>

                    <tr>
                        <th>Mobile Number</th>
                        <td>+91 9876543211</td>
                    </tr>

                    <tr>
                        <th>Address</th>
                        <td>D-132 street 16, New Delhi</td>
                    </tr>

                    <tr>
                        <th>Pincode</th>
                        <td>110059</td>
                    </tr>

                    <tr>
                        <th>Franchise</th>
                        <td class="text-capitalize">Raj Tiwari</td>
                    </tr>

                    <tr>
                        <th>City</th>
                        <td class="text-capitalize">New Delhi</td>
                    </tr>

                    <tr>
                        <th>State</th>
                        <td class="text-capitalize">online</td>
                    </tr>
                    <tr>
                        <th>Country</th>
                        <td>India</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@section('script')
<script>
    $(document).ready(function() {
        // Filter cities based on selected state
        $('#state').change(function() {
            var selectedState = $(this).val();

            // Show all cities or filter by selected state
            if (selectedState === 'All') {
                $('#city .city-option').show();
            } else {
                $('#city .city-option').each(function() {
                    if ($(this).data('state') === selectedState) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            }
        });

        // Filter statuses based on selected state
        $('#state').change(function() {
            var selectedState = $(this).val();

            // You can apply status filtering logic here, if necessary
            // For now, just showing all options based on status map
        });

        $('.select2').select2();

        // Show/hide custom date fields based on date range selection
        $('#date_range').on('change', function() {
            if ($(this).val() === 'Custom') {
                $('.custom-date-fields').show();
            } else {
                $('.custom-date-fields').hide();
            }
        });

        $('#customerdatabaseTable').DataTable({
                responsive: true,
                language: {
                    emptyTable: "No data found"
                }
        });
    });
</script>
@endsection