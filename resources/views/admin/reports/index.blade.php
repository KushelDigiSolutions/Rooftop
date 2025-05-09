@extends('admin.layouts.app')
@section('title', 'Reports List')
@section('content')


<div class="w-100">



    <div class="dataOverviewSection mt-3">
        <div class="section-title">
            <h6 class="fw-bold m-0">Reports</h6>
            <a href="#" class="secondary-btn me-2 addBtn"><i class="bi bi-cloud-arrow-down me-2"></i>Export
                CSV</a>
        </div>
        <!-- Filters -->
        <div class="section-title mt-3 justify-content-start align-items-end">
            <div class="w-25 me-2" bis_skin_checked="1">
                <!-- Please use select2 here for search and multiple selection feature -->
                <label for="role" class="form-label mb-1">Select State</label>
                <select class="form-select form-select-lg w-100" id="state" name="state" required="">
                    <option value="">Select State</option>
                    <option value="All" selected>All</option>
                    @foreach ($groupedCityStateData as $state => $cities)
                    <option value="{{ $state }}">{{ $state }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Please use select2 here for search and multiple selection feature -->
            <div class="w-25 me-2" bis_skin_checked="1">
                <label for="role" class="form-label mb-1">Select City</label>
                <select class="form-select form-select-lg w-100" id="city" name="city" required="">
                    <option value="">Select City</option>
                    <option value="" selected>All</option>
                </select>
            </div>
            <!--<div class="w-25" bis_skin_checked="1">-->
            <!--    <div class="dropdown">-->
            <!--        <button id="dropdown-btn" class="btn btn-secondary dropdown-toggle dropdown-btn"-->
            <!--            type="button" data-bs-toggle="dropdown" aria-expanded="false">-->
            <!--            Select Date-->
            <!--        </button>-->
            <!--        <ul class="dropdown-menu" id="dateSelect">-->
            <!--            <li><a class="dropdown-item" data-value="Today">Today</a></li>-->
            <!--            <li><a class="dropdown-item" data-value="This Week">This Week</a></li>-->
            <!--            <li><a class="dropdown-item" data-value="This Month">This Month</a></li>-->
            <!--            <li><a class="dropdown-item" data-value="This Quarter">This Quarter</a>-->
            <!--            </li>-->
            <!--            <li><a class="dropdown-item" data-value="This Year">This Year</a></li>-->
            <!--            <li>-->
            <!--                <a class="dropdown-item custom-date" href="#">Custom Date</a>-->
            <!--            </li>-->
            <!--        </ul>-->
            <!--    </div>-->

            <!--</div>-->
            <div class="d-flex align-items-center justify-content-end">
                <a href="javascript::void(0)" id="applyFilter" name="applyFilter" class="ms-2 primary-btn addBtn" style="height: 40px;"><i
                        class="bi bi-funnel me-2"></i>Apply Filter</a>
                <a href="{{url('/reports')}}" class="ms-3"></i>Reset</a>
            </div>
        </div>

        <div class="info-tabs px-0">
            <a href="javascript::void(0)" id="card-appointment" name="card-appointment">
                <div class="card info-card flex-row">
                    <img src="images/tab-icon.svg" class="me-3" alt="">
                    <div>
                        <h2 class="fw-bold m-0 mb-1">{{$totalAppointments}}</h2>
                        <p class="m-0 small">Total Appointments</p>
                    </div>
                </div>
            </a>
            <a href="javascript::void(0)" id="card-franchise" name="card-franchise">
                <div class="card info-card flex-row">
                    <img src="images/tab-icon.svg" class="me-3" alt="">
                    <div>
                        <h2 class="fw-bold m-0 mb-1">{{$totalFranchises}}</h2>
                        <p class="m-0 small">Total Franchises</p>
                    </div>
                </div>
            </a>
            <!-- <a href="javascript::void(0)" id="card-sales" name="card-sales">
                <div class="card info-card flex-row">
                    <img src="images/tab-icon.svg" class="me-3" alt="">
                    <div>
                        <h2 class="fw-bold m-0 mb-1">250</h2>
                        <p class="m-0 small">Total Sales (Without GST)</p>
                    </div>
                </div>
            </a> -->
            <!-- <a href="javascript::void(0)" id="card-product-sold" name="card-product-sold">
                <div class="card info-card flex-row">
                    <img src="images/tab-icon.svg" class="me-3" alt="">
                    <div>
                        <h2 class="fw-bold m-0 mb-1">250</h2>
                        <p class="m-0 small">Total Products Sold</p>
                    </div>
                </div>
            </a> -->
            <a href="javascript::void(0)" id="card-total-orders" name="card-total-orders">
                <div class="card info-card flex-row">
                    <img src="images/tab-icon.svg" class="me-3" alt="">
                    <div>
                        <h2 class="fw-bold m-0 mb-1">{{$totalOrders}}</h2>
                        <p class="m-0 small">Total Orders</p>
                    </div>
                </div>
            </a>
            <a href="javascript::void(0)" id="card-complete-orders" name="card-complete-orders">
                <div class="card info-card flex-row">
                    <img src="images/tab-icon.svg" class="me-3" alt="">
                    <div>
                        <h2 class="fw-bold m-0 mb-1">{{$totalOrdersComplete}}</h2>
                        <p class="m-0 small">Total Orders Completed</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="dataOverview mt-1">
            <div class="table-responsive">
                <table class="table reportTable" id="reportTable">
                    <thead>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

</div>

<!-- Offcanvas Component -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample">
    <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title" id="FranciseViewLabel">Order Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <!--We'll show the Appointment Details here-->
        <p class="fw-bold"><u>Appointment Details</u></p>
        <table class="table table-hover" id="reportTable1">

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
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $('#applyFilter').on('click', function() {
            let state = $('#state').val();
            let city = $('#city').val();
            let date = $('#state').val();

            let filterData = {
                state: state,
                city: city,
                date: date
            };

            fetchData('card-appointment', filterData);
        });

        var cityStateData = @json($groupedCityStateData);
        // Handle state change
        $('#state').on('change', function() {
            var selectedState = $(this).val();
            var cities = cityStateData[selectedState] || [];

            $('#city').empty();
            $('#city').append('<option value="" disabled selected>Select City</option>');

            cities.sort(function(a, b) {
                return a.city_name.localeCompare(b.city_name); // Sort in ascending order
            });
            $.each(cities, function(index, city) {
                $('#city').append('<option value="' + city.city_name + '">' + city.city_name + '</option>');
            });
        });


        fetchData('card-appointment', {});
        $('#card-appointment').on('click', function() {
            fetchData('card-appointment', {});
        });

        $('#card-franchise').on('click', function() {
            fetchData('card-franchise', {});
        });

        $('#card-sales').on('click', function() {
            fetchData('card-sales', {});
        });

        $('#card-product-sold').on('click', function() {
            fetchData('card-product-sold', {});
        });

        $('#card-total-orders').on('click', function() {
            fetchData('card-total-orders', {});
        });

        $('#card-complete-orders').on('click', function() {
            fetchData('card-complete-orders', {});
        });

        // Fetch data function
        function fetchData(cardId, filter) {
            $('#reportTable tbody').empty();
            $('#reportTable thead').empty();
            // $('#reportTable tbody').html('<tr><td colspan="10" class="text-center">Loading...</td></tr>');
            // Send AJAX request based on the card clicked
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{url("reports/fetch-data")}}',
                type: 'POST',
                data: {
                    card_id: cardId,
                    filterData: filter
                }, // Send the card id to the server
                success: function(response) {
                    console.log(response);
                    if (cardId === 'card-appointment') {
                        var thead = `<tr>
                                    <th style="border-top-left-radius: 6px; border-bottom-left-radius: 6px;"scope="col">S/N</th>
                                    <th style="border-top-left-radius: 6px; border-bottom-left-radius: 6px;"scope="col">Name</th>
                                    <th style="border-top-left-radius: 6px; border-bottom-left-radius: 6px;"scope="col">Mobile</th>
                                    <th style="border-top-left-radius: 6px; border-bottom-left-radius: 6px;"scope="col">Pincode</th>
                                    <th style="border-top-left-radius: 6px; border-bottom-left-radius: 6px;"scope="col">Assign Date</th>
                                    <th style="border-top-left-radius: 6px; border-bottom-left-radius: 6px;"scope="col">Remarks</th>
                               </tr> `;
                        $('#reportTable thead').append(thead);

                        if (response.length > 0) {
                            $.each(response, function(idx, appnt) {
                                var row = '<tr>';
                                row += '<td>' + (idx + 1) + '</td>';
                                row += '<td>' + appnt.name + '</td>';
                                row += '<td>' + appnt.mobile + '</td>';
                                row += '<td>' + appnt.pincode + '</td>';
                                row += '<td>' + (appnt.appointment_date ? customformatDate(appnt.appointment_date) : 'N/A') + '</td>';
                                row += '<td>' + (appnt.remarks == null ? 'N/A' : appnt.remarks) + '</td>';
                                row += '</tr>';

                                $('#reportTable tbody').append(row);
                            });
                        } else {
                            $('#reportTable tbody').html('<tr><td colspan="10" class="text-center">No data found</td></tr>');
                        }
                    } else if (cardId === 'card-franchise') {
                        var thead = `<tr>
                                    <th style="border-top-left-radius: 6px; border-bottom-left-radius: 6px;"scope="col">S/N</th>
                                    <th style="border-top-left-radius: 6px; border-bottom-left-radius: 6px;"scope="col">Name</th>
                                    <th style="border-top-left-radius: 6px; border-bottom-left-radius: 6px;"scope="col">Email</th>
                                    <th style="border-top-left-radius: 6px; border-bottom-left-radius: 6px;"scope="col">Mobile</th>
                                    <th style="border-top-left-radius: 6px; border-bottom-left-radius: 6px;"scope="col">City</th>
                                    <th style="border-top-left-radius: 6px; border-bottom-left-radius: 6px;"scope="col">Pincode</th>
                                    <th style="border-top-left-radius: 6px; border-bottom-left-radius: 6px;"scope="col">Registeration Type</th>
                                </tr>`;
                        $('#reportTable thead').append(thead);
                        if (response.length > 0) {
                            $.each(response, function(idx, franchise) {
                                var row = '<tr>';
                                row += '<td>' + (idx + 1) + '</td>';
                                row += '<td>' + franchise.name + '</td>';
                                row += '<td>' + franchise.email + '</td>';
                                row += '<td>' + franchise.mobile + '</td>';
                                row += '<td>' + franchise.city + '</td>';
                                row += '<td>' + franchise.pincode + '</td>';
                                row += '<td>' + (franchise.registerationType ? franchise.registerationType : 'N/A') + '</td>';
                                row += '</tr>';


                                $('#reportTable tbody').append(row);
                            });
                        } else {
                            $('#reportTable tbody').html('<tr><td colspan="10" class="text-center">No data found</td></tr>');
                        }
                    } else if (cardId === 'card-sales') {
                        var thead = `<tr>
                                    <th style="border-top-left-radius: 6px; border-bottom-left-radius: 6px;"scope="col">S/N</th>
                                    <th style="border-top-left-radius: 6px; border-bottom-left-radius: 6px;"scope="col">Name</th>
                                    <th style="border-top-left-radius: 6px; border-bottom-left-radius: 6px;"scope="col">Mobile</th>
                                    <th style="border-top-left-radius: 6px; border-bottom-left-radius: 6px;"scope="col">Pincode</th>
                                    <th style="border-top-left-radius: 6px; border-bottom-left-radius: 6px;"scope="col">Assign Date</th>
                                    <th style="border-top-left-radius: 6px; border-bottom-left-radius: 6px;"scope="col">Remarks</th>
                                </tr>`;
                        $('#reportTable thead').append(thead);
                        if (response.length > 0) {
                            $.each(response, function(idx, appnt) {
                                var row = '<tr>';
                                row += '<td>' + (idx + 1) + '</td>';
                                row += '<td>' + appnt.name + '</td>';
                                row += '<td>' + appnt.mobile + '</td>';
                                row += '<td>' + appnt.pincode + '</td>';
                                row += '<td>' + (appnt.appointment_date ? customformatDate(appnt.appointment_date) : 'N/A') + '</td>';
                                row += '<td>' + (appnt.remarks == null ? 'N/A' : appnt.remarks) + '</td>';
                                row += '</tr>';


                                $('#reportTable tbody').append(row);
                            });
                        } else {
                            $('#reportTable tbody').html('<tr><td colspan="10" class="text-center">No data found</td></tr>');
                        }
                    } else if (cardId === 'card-product-sold') {
                        var thead = `<tr>
                                    <th style="border-top-left-radius: 6px; border-bottom-left-radius: 6px;"scope="col">S/N</th>
                                    <th style="border-top-left-radius: 6px; border-bottom-left-radius: 6px;"scope="col">Name</th>
                                    <th style="border-top-left-radius: 6px; border-bottom-left-radius: 6px;"scope="col">Mobile</th>
                                    <th style="border-top-left-radius: 6px; border-bottom-left-radius: 6px;"scope="col">Pincode</th>
                                    <th style="border-top-left-radius: 6px; border-bottom-left-radius: 6px;"scope="col">Assign Date</th>
                                    <th style="border-top-left-radius: 6px; border-bottom-left-radius: 6px;"scope="col">Remarks</th>
                                </tr>`;
                        $('#reportTable thead').append(thead);
                        if (response.data.length > 0) {
                            $.each(response.data, function(idx, appnt) {
                                var row = '<tr>';
                                row += '<td>' + (idx + 1) + '</td>';
                                row += '<td>' + appnt.name + '</td>';
                                row += '<td>' + appnt.mobile + '</td>';
                                row += '<td>' + appnt.pincode + '</td>';
                                row += '<td>' + (appnt.appointment_date ? customformatDate(appnt.appointment_date) : 'N/A') + '</td>';
                                row += '<td>' + (appnt.remarks == null ? 'N/A' : appnt.remarks) + '</td>';
                                row += '</tr>';


                                $('#reportTable tbody').append(row);
                            });
                        } else {
                            $('#reportTable tbody').html('<tr><td colspan="10" class="text-center">No data found</td></tr>');
                        }
                    } else if (cardId === 'card-total-orders') {
                        var thead = `<tr>
                                    <th style="border-top-left-radius: 6px; border-bottom-left-radius: 6px;"scope="col">S/N</th>
                                    <th style="border-top-left-radius: 6px; border-bottom-left-radius: 6px;"scope="col">Appointment ID</th>
                                    <th style="border-top-left-radius: 6px; border-bottom-left-radius: 6px;"scope="col">Quotation ID</th>
                                    <th style="border-top-left-radius: 6px; border-bottom-left-radius: 6px;"scope="col">Name</th>
                                    <th style="border-top-left-radius: 6px; border-bottom-left-radius: 6px;"scope="col">Phone Number</th>
                                    <th style="border-top-left-radius: 6px; border-bottom-left-radius: 6px;"scope="col">Pincode</th>
                                    <th style="border-top-left-radius: 6px; border-bottom-left-radius: 6px;"scope="col">Franchise Assign</th>
                                </tr>`;
                        $('#reportTable thead').append(thead);
                        if (response.length > 0) {
                            $.each(response, function(idx, appnt) {
                                var row = '<tr>';
                                row += '<td>' + (idx + 1) + '</td>';
                                row += '<td>' + appnt.appointment_id + '</td>';
                                row += '<td>' + appnt.name + '</td>';
                                row += '<td>' + appnt.quotation_id + '</td>';
                                row += '<td>' + appnt.mobile + '</td>';
                                row += '<td>' + appnt.pincode + '</td>';
                                row += '<td>' + (appnt.franchise_id == null ? 'N/A' : appnt.franchise_id) + '</td>';
                                row += '</tr>';


                                $('#reportTable tbody').append(row);
                            });
                        } else {
                            $('#reportTable tbody').html('<tr><td colspan="10" class="text-center">No data found</td></tr>');
                        }
                    } else if (cardId === 'card-complete-orders') {
                        var thead = `<tr>
                                    <th style="border-top-left-radius: 6px; border-bottom-left-radius: 6px;"scope="col">S/N</th>
                                    <th style="border-top-left-radius: 6px; border-bottom-left-radius: 6px;"scope="col">Appointment ID</th>
                                    <th style="border-top-left-radius: 6px; border-bottom-left-radius: 6px;"scope="col">Quotation ID</th>
                                    <th style="border-top-left-radius: 6px; border-bottom-left-radius: 6px;"scope="col">Name</th>
                                    <th style="border-top-left-radius: 6px; border-bottom-left-radius: 6px;"scope="col">Phone Number</th>
                                    <th style="border-top-left-radius: 6px; border-bottom-left-radius: 6px;"scope="col">Pincode</th>
                                    <th style="border-top-left-radius: 6px; border-bottom-left-radius: 6px;"scope="col">Franchise Assign</th>
                                </tr>`;
                        $('#reportTable thead').append(thead);
                        if (response.length > 0) {
                            $.each(response, function(idx, appnt) {
                                var row = '<tr>';
                                row += '<td>' + (idx + 1) + '</td>';
                                row += '<td>' + appnt.appointment_id + '</td>';
                                row += '<td>' + appnt.name + '</td>';
                                row += '<td>' + appnt.quotation_id + '</td>';
                                row += '<td>' + appnt.mobile + '</td>';
                                row += '<td>' + appnt.pincode + '</td>';
                                row += '<td>' + (appnt.franchise_id == null ? 'N/A' : appnt.franchise_id) + '</td>';
                                row += '</tr>';


                                $('#reportTable tbody').append(row);
                            });
                        } else {
                            $('#reportTable tbody').html('<tr><td colspan="10" class="text-center">No data found</td></tr>');
                        }

                        // Add Pagination
                    } else {

                        $('.projectsTable tbody').html('<tr><td colspan="10" class="text-center">No data found</td></tr>');

                    }
                    // Add more conditions for other cards if necessary
                },
                error: function(xhr, status, error) {
                    // Handle AJAX errors
                    console.error("Error fetching data: ", status, error);
                }
            });
        }



        $(".dt-responsive").dataTable({

            responsive: true,

            columnDefs: [{

                    responsivePriority: 1,

                    targets: 0

                },

                {

                    responsivePriority: 2,

                    targets: -1

                }

            ]

        });

        $(".dt-responsive1").dataTable({

            responsive: true,

            columnDefs: [{

                    responsivePriority: 1,

                    targets: 0

                },

                {

                    responsivePriority: 2,

                    targets: -1

                }

            ]

        });





        let dropdownBtn = $("#dropdown-btn");

        // Set default value to the current date
        // dropdownBtn.text(moment().format("MMMM D, YYYY"));

        // Function to update dropdown button text
        $(".dropdown-item").click(function() {
            let selectedValue = $(this).data("value");

            if (selectedValue) {
                let dateText = getDateRange(selectedValue);
                dropdownBtn.text(dateText);
            } else if ($(this).hasClass("custom-date")) {
                openDateRangePicker();
            }
        });

        // Function to get date range based on selection
        function getDateRange(option) {
            let today = moment();
            switch (option) {
                case "Today":
                    return today.format("MMMM D, YYYY");
                case "This Week":
                    return today.startOf("isoWeek").format("MMM D") + " - " + today.endOf("isoWeek").format("MMM D, YYYY");
                case "This Month":
                    return today.startOf("month").format("MMM D") + " - " + today.endOf("month").format("MMM D, YYYY");
                case "This Quarter":
                    return today.startOf("quarter").format("MMM D") + " - " + today.endOf("quarter").format("MMM D, YYYY");
                case "This Year":
                    return today.startOf("year").format("MMM D") + " - " + today.endOf("year").format("MMM D, YYYY");
                default:
                    return today.format("MMMM D, YYYY");
            }
        }

        // Function to open date range picker
        function openDateRangePicker() {
            let start = moment().startOf("month");
            let end = moment().endOf("month");

            let $input = $("<input type='text' id='daterange-picker' style='position:absolute;opacity:0;'>")
                .appendTo("body")
                .daterangepicker({
                    startDate: start,
                    endDate: end,
                    opens: "center",
                    autoUpdateInput: false
                }, function(start, end) {
                    dropdownBtn.text(start.format("MMM D") + " - " + end.format("MMM D, YYYY"));
                })
                .trigger("click");

            // Close picker and remove input after Apply button is clicked
            $input.on("apply.daterangepicker", function(ev, picker) {
                picker.hide();
                $input.remove();
            });

            // Close picker and remove input if canceled
            $input.on("cancel.daterangepicker", function(ev, picker) {
                picker.hide();
                $input.remove();
            });


        }
    });
</script>

<script src="https://unpkg.com/@phosphor-icons/web"></script>

@endsection