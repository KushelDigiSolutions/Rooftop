    <?php use Razorpay\Api\Api; ?>
    @extends('admin.layouts.app')
    @section('title', 'Customer List')
    @section('content')
    <div class="dataOverviewSection mt-3">
        <div class="section-title">
            <h6 class="fw-bold m-0">All Customers <span class="fw-normal text-muted"></span></h6>
            {{-- <a href="{{ route('leads.create') }}" class="primary-btn addBtn">+ Add Leads</a>({{ $appointments->where('status', 7)->count() }}) --}}
        </div>

        <div class="dataOverview mt-3">
            <div>

                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    @if (Auth::user()->getRoleNames()[0] == 'Franchise')

                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-pending-tab" data-bs-toggle="pill" data-bs-target="#pills-pending" type="button" role="tab" aria-controls="pills-pending" aria-selected="true">Pending <span class="fw-normal small">({{ $pendingCount }})</span></button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-hold-tab" data-bs-toggle="pill" data-bs-target="#pills-hold" type="button" role="tab" aria-controls="pills-hold" aria-selected="false">Hold <span class="fw-normal small">({{ $holdCount }})</span></button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-complete-tab" data-bs-toggle="pill" data-bs-target="#pills-complete" type="button" role="tab" aria-controls="pills-complete" aria-selected="false">Completed <span class="fw-normal small">({{ $completedCount }})</span></button>
                    </li>
                    @else
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-prospect-tab" data-bs-toggle="pill" data-bs-target="#pills-prospect" type="button" role="tab" aria-controls="pills-prospect" aria-selected="false">Prospect <span class="fw-normal small"></span></button>
                    </li>



                    {{-- <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-assign-tab" data-bs-toggle="pill" data-bs-target="#pills-assign" type="button" role="tab" aria-controls="pills-assign" aria-selected="true">Assigned <span class="fw-normal small">({{ $assignedCount }})</span></button>
                    </li> --}}


                    {{-- <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-hold-tab" data-bs-toggle="pill" data-bs-target="#pills-hold" type="button" role="tab" aria-controls="pills-hold" aria-selected="false">Hold <span class="fw-normal small">({{ $holdCount }})</span></button>
                    </li> --}}

                    {{-- <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-complete-tab" data-bs-toggle="pill" data-bs-target="#pills-complete" type="button" role="tab" aria-controls="pills-complete" aria-selected="false">Completed <span class="fw-normal small">({{ $completedCount }})</span></button>
                    </li> --}}

                    {{-- <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-rejected-tab" data-bs-toggle="pill" data-bs-target="#pills-rejected" type="button" role="tab" aria-controls="pills-rejected" aria-selected="false">Reject <span class="fw-normal small">({{ $rejectCount }})</span></button>
                    </li> --}}

                
                    @endif
                </ul>
            </div>
            <!-- all data view -->

            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-pending" role="tabpanel" aria-labelledby="pills-pending-tab" tabindex="0">
                    <!-- This content will be dynamically populated -->
                </div>

                <div class="tab-pane fade" id="pills-assign" role="tabpanel" aria-labelledby="pills-assign-tab" tabindex="0">
                    <!-- This content will be dynamically populated -->
                </div>

                <div class="tab-pane fade" id="pills-complete" role="tabpanel" aria-labelledby="pills-complete-tab" tabindex="0">
                    <!-- This content will be dynamically populated -->
                </div>
                
                <div class="tab-pane fade" id="pills-rejected" role="tabpanel" aria-labelledby="pills-rejected-tab" tabindex="0">
                    <!-- This content will be dynamically populated -->
                </div>
                <!-- View franchise details Offcanvas -->
            <div class="offcanvas FranciseViewSidebar offcanvas-start" tabindex="-1" id="FranciseView" aria-labelledby="FranciseViewLabel">
                    <div class="offcanvas-header border-bottom">
                        <h5 class="offcanvas-title fw-bold" id="FranciseViewLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <table class="table table-hover">
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table" id="appointmentTable">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            {{-- <th>Pincode</th> --}}
                            <th>Assigned Date</th>
                            <th>Assigned To</th>
                            <th>Remarks</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data will be loaded here dynamically based on the active tab -->
                    </tbody>
                </table>
            </div>
            <!-- end all data view -->
        </div>
    </div>

    <!-- Reject Modal -->
    <div class="modal fade" id="rejectFranchiseModal" tabindex="-1" aria-labelledby="rejectFranchiseModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="rejectFranchiseForm" method="POST"
                    action="{{ route('appointment.reject', ['id' => '__appointment_id__']) }}" autocomplete="off">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="rejectFranchiseModalLabel">Reject Appointment</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to approve this franchise?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="secondary-btn" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="primary-btn">Reject</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add Franchise Modal Start -->
    <div class="modal fade" id="addFranchiseModal1" tabindex="-1" aria-labelledby="addFranchiseModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Add Franchise</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('franchise_temp.store_admin') }}" method="POST" id="contact-form1">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3 w-100">
                            <label for="NameInput" class="form-label mb-1">Name<span class="requried">*</span></label>
                            <input type="text" class="form-control w-100" id="name" name="name">
                        </div>

                        <div class="mb-3 w-100">
                            <label for="UserEmailInput" class="form-label mb-1">Email ID<span class="requried">*</span></label>
                            <input type="email" class="form-control w-100" id="email" name="email">
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3 w-100">
                                    <label for="contactNumberInput" class="form-label mb-1">Contact Number<span  class="requried">*</span></label>
                                    <input type="number" class="form-control w-100" id="mobile" name="mobile">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3 w-100">
                                    <label for="altcontactNumberInput" class="form-label mb-1">Alternate Contact Number</label>
                                    <input type="number" class="form-control w-100" id="alt_mobile" name="alt_mobile">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3 w-100">
                                    <label for="registerationType" class="form-label">Registration Type<span class="requried">*</span></label>
                                    <select name="registerationType" class="form-control form-select w-100" id="registerationType">
                                        <option value="">Select Registration Type</option>
                                        <option value="Individual">Individual</option>
                                        <option value="Company">Company</option>
                                        <option value="proprietor">Proprietor</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3 w-100">
                                    <label for="company_name" class="form-label">Company Name <span class="requried">*</span></label>
                                    <input type="text" class="form-control w-100" id="company_name" name="company_name"  placeholder="Enter Company Name">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3 w-100">
                                    <label for="employees" class="form-label">Number of Employees<span class="requried">*</span></label>
                                    <input type="number" class="form-control w-100" id="employees" name="employees" placeholder="Enter Number of Employees">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 w-100">
                            <label for="franchiseAddress" class="form-label mb-1">Address<span class="requried">*</span></label>
                            <textarea name="address" class="form-control w-100" id="address" name="address" style="height: 70px;"></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3 w-100">
                                    <label for="pincodeInput" class="form-label mb-1">Pincode<span class="requried">*</span></label>
                                    <input type="number" class="form-control w-100" id="pincode" name="pincode">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3 w-100">
                                    <label for="countryInput" class="form-label mb-1"> Country<span class="requried">*</span></label>
                                    <input type="text" class="form-control w-100" id="country" name="country">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3 w-100">
                                    <label for="countryInput" class="form-label mb-1"> State<span class="requried">*</span></label>
                                    <input type="text" class="form-control w-100" id="state" name="state">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3 w-100">
                                    <label for="countryInput" class="form-label mb-1"> City<span  class="requried">*</span></label>
                                    <input type="text" class="form-control w-100" id="city" name="city">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="secondary-btn addBtn" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="primary-btn addBtn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Add Franchise Modal End -->

    <!-- Approval Modal -->
    <div class="modal fade" id="assignAppointmentModal" tabindex="-1" aria-labelledby="approveFranchiseModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('appointments.assign') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="approveFranchiseModalLabel">Assign Lead</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <input type="hidden" id="appointmentId" name="appointment_id">
                        <div class="mb-3">
                            <label for="franchise" class="form-label">Select Contractor <span class="requried">*</span></label>
                            <select id="approve_franchise" name="franchise_id" class="form-select w-100">
                            </select>
                            <div class="error" style="color: red;"></div>
                        </div>

                        <div class="mb-3">
                            <label for="date" class="form-label">Appointment Date<span class="requried">*</span></label>
                            @php
                                $now = \Carbon\Carbon::now()->addDay()->format('Y-m-d\TH:i');
                            @endphp
                            <input type="datetime-local" name="dateFilter" id="dateFilter" placeholder="Filter by date" value="{{ request('dateFilter') }}" min="{{ $now }}" class="form-control me-3 w-100">
                            <div class="error" style="color: red;"></div>
                        </div>

                        <div class="mb-3">
                            <label for="remarks" class="form-label">Remarks</label>
                            <textarea class="form-control me-3 w-100" name="remarks" id="remarks" rows="3" cols="50"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="secondary-btn" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="primary-btn">Assign</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Add Franchise Modal End -->
    <!-- Slot Book Modal -->
    <div class="modal fade" id="startBidModal" tabindex="-1" aria-labelledby="approveFranchiseModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('bids.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="approveFranchiseModalLabel">Start Bid</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <input type="hidden" class="appointmentId" id="appointmentId" name="lead_id">
                        
                        <div class="mb-3">
                            <label for="date" class="form-label">Price<span class="requried">*</span></label>
    
                            <input type="text" name="price" id="price" placeholder="Enter bid price"  class="form-control me-3 w-100">
                            <div class="error" style="color: red;"></div>
                        </div>

                        <div class="mb-3">
                            <label for="date" class="form-label">Scope<span class="requried">*</span></label>
                            <input type="text" name="scope" id="scope" placeholder="Enter work scope" class="form-control me-3 w-100">
                            <div class="error" style="color: red;"></div>
                        </div>

                        <div class="mb-3">
                            <label for="date" class="form-label">Timeline<span class="requried">*</span></label>
                            <input type="text" name="timeline" id="timeline" placeholder="Enter timeline (e.g., 2 weeks)" class="form-control me-3 w-100">
                            <div class="error" style="color: red;"></div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="secondary-btn" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="primary-btn">Submit Bid</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Add Franchise Modal End -->
    <!-- Reject Confirmation Modal -->
    <div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="rejectModalLabel">Reject Appointment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to reject this appointment?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmRejectBtn">
                        <span class="spinner-border spinner-border-sm d-none me-1" role="status" aria-hidden="true" id="rejectSpinner"></span>
                        <span id="rejectBtnText">Yes, Reject</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Re Assign Franchise -->
    <div class="modal fade" id="reassignAppointmentModal" tabindex="-1" aria-labelledby="reapproveFranchiseModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('appointments.reassign') }}" method="POST" id="re_Assign">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="reapproveFranchiseModalLabel">Re-Assign Lead</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <input type="hidden" id="appointmentId1" name="appointment_id1">
                        <div class="mb-3">
                            <label for="franchise" class="form-label">Select Franchise<span class="requried">*</span></label>
                            <select id="re_approve_franchise" name="franchise_id1" class="form-select w-100">
                            </select>
                            <div class="error" style="color: red;"></div>
                        </div>

                        <div class="mb-3">
                            <label for="date" class="form-label">Appointment Date<span class="requried">*</span></label>
                            <input type="datetime-local" name="dateFilter1" id="re-dateFilter" placeholder="Filter by date" value="{{ request('dateFilter') }}" min="{{ $now }}" class="form-control me-3 w-100">
                            <div class="error" style="color: red;"></div>
                        </div>

                        <div class="mb-3">
                            <label for="remarks" class="form-label">Remarks</label>
                            <textarea class="form-control me-3 w-100" name="remarks1" id="re-remarks" rows="3" cols="50"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="secondary-btn" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="primary-btn">Re-Assign</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Re Assign Franchise -->


    <!-- Re Shedule Franchise -->
    <div class="modal fade" id="reassignSheduleModal" tabindex="-1" aria-labelledby="reapproveFranchiseModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('appointments.reassign') }}" method="POST" id="re_Assign">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="reapproveFranchiseModalLabel">Re-Shedule Lead</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <input type="hidden" class="appointmentId1" name="appointment_id1">
                        <div class="mb-3">
                            <!-- <label for="franchise" class="form-label">Select Franchise<span class="requried">*</span></label> -->
                            <select id="re_shedule_franchise" name="franchise_id1" class="form-select w-100">
                            </select>
                            <div class="error" style="color: red;"></div>
                        </div>

                        <div class="mb-3">
                            <label for="date" class="form-label">Appointment Date<span class="requried">*</span></label>
                            <input type="datetime-local" name="dateFilter1" class="form-control me-3 w-100 appointment_date" id="re-dateFilter" placeholder="Filter by date" value="{{ request('dateFilter') }}" min="{{ $now }}" class="form-control me-3 w-100">
                            <div class="error" style="color: red;"></div>
                        </div>

                        <div class="mb-3">
                            <label for="remarks" class="form-label">Remarks</label>
                            <textarea class="form-control me-3 w-100 remarks" name="remarks1" id="re-remarks" rows="3" cols="50"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="secondary-btn" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="primary-btn">Re-Assign</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Re Shedule Franchise -->

    <!-- updatepaymentModal start -->
    <div class="modal fade" id="updatepaymentModal" tabindex="-1" aria-labelledby="updatepaymentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('razorpay.order') }}" method="POST" id="updatepayment">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="updatepaymentModalLabel">Update Payment</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <input type="hidden" id="orderappointmentId" name="appointment_id">
                        <input type="hidden" id="orderfranchisetId" name="franchise_id">
                        <input type="hidden" id="orderquotationId" name="quotation_id">
                        <input type="hidden" id="orderfinalvalue" name="order_value">

                        <div class="mb-3">
                            <label for="ordervalue" class="form-label">Amount with GST<span class="requried">*</span></label>
                            <input type="text"  id="ordervalue" placeholder="Enter Order Value"  class="form-control me-3 w-100" disabled>
                            <div class="error" id="ordervalue_error" style="color: red;"></div>
                        </div>

                        <div class="mb-3">
                            <label for="CustumerName" class="form-label">Custumer Name<span class="requried">*</span></label>
                            <input type="text" name="CustumerName" id="CustumerName"  class="form-control me-3 w-100" readonly>
                            <div class="error" style="color: red;"></div>
                        </div>
                        <div class="mb-3">
                            <label for="ContactNumber" class="form-label">Contact Number<span class="requried">*</span></label>
                            <input type="text" name="ContactNumber" id="ContactNumber"  class="form-control me-3 w-100" readonly>
                            <div class="error" style="color: red;"></div>
                        </div>

                        <div class="mb-3">
                            <label for="modeofpayment" class="form-label">Mode Of Payment<span class="requried">*</span></label>
                            <select class="form-control me-3 w-100" name="payment_mode" id="payment_mode">
                                <option value="online" selected>Online</option>
                            </select>
                            <div class="error" id="payment_mode_error" style="color: red;"></div>
                        </div>

                        <div class="mb-3">
                            <label for="ordervalue" class="form-label">Adjestment Amount<span class="requried">*</span></label>
                            <input type="text"  placeholder="Enter Order Value"  class="form-control me-3 w-100" name="adjestment_amount" value="750" disabled>
                            <div class="error" id="ordervalue_error" style="color: red;"></div>
                        </div>

                        <div class="mb-3">
                            <label for="ordervalue" class="form-label">Sub Total<span class="requried">*</span></label>
                            <input type="text" name="ordervalue"  placeholder="Enter Order Value"  class="form-control me-3 w-100 orderfinalvalue" disabled>
                            <div class="error" id="ordervalue_error" style="color: red;"></div>
                        </div>

                        <div class="mb-3">
                            <label for="Note" class="form-label">Note</label>
                            <textarea class="form-control me-3 w-100" name="remarks" id="paymentnote" rows="3" cols="50"></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="secondary-btn" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="primary-btn" id="order-create-btn">Order Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- updatepaymentModal end -->
    @endsection

    @section('script')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script type="text/javascript">
        document.getElementById('updatepayment').addEventListener('submit', function (e) {
            e.preventDefault();

            const orderValue = document.getElementById('orderfinalvalue').value;
            const payment_mode = document.getElementById('payment_mode').value;
            const payment_note = document.getElementById('paymentnote').value;
            const appointment_id = document.getElementById('orderappointmentId').value;
            const franchise_id = document.getElementById('orderfranchisetId').value;
            const quotation_id = document.getElementById('orderquotationId').value;

            fetch('/razorpay-order', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    order_value: orderValue,
                    payment_mode: payment_mode,
                    remarks: payment_note,
                    appointment_id,
                    franchise_id,
                    quotation_id
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data && data.order_id) {
                    var options = {
                        key: 'rzp_test_IX6EFCqGoyCt59',
                        amount: data.amount,
                        currency: 'INR',
                        name: 'Your Company',
                        description: 'Payment for your order',
                        image: 'https://curtainsandblinds.in/public/images/logo.svg',
                        order_id: data.order_id,
                        handler: function (response) {
                            fetch('/razorpay-success', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: JSON.stringify(response)
                            })
                            .then(res => res.json())
                            .then(data => {
                                if (data.success) {
                                    
                                    $('#updatepaymentModal').modal('hide');
                                    showSuccess('Payment successful!');

                                    setTimeout(() => {
                                        window.location.href = 'https://staging.curtainsandblinds.in/orders';
                                    }, 3000); // 3000ms = 3 seconds
                                } else {
                                    showError(data.error || 'Payment verification failed. Please try again.');
                                }
                            })
                            .catch(err => {
                                showError('Something went wrong during verification.');
                            });
                        },
                        prefill: {
                            name: document.getElementById('CustumerName').value,
                            email: 'customer@example.com',
                            contact: document.getElementById('ContactNumber').value
                        },
                        theme: { color: '#3399cc' },
                        modal: {
                            ondismiss: function () {
                                showError('Payment was cancelled or failed.');
                            }
                        }
                    };

                    var rzp = new Razorpay(options);
                    rzp.on('payment.failed', function (response) {
                        showError('Payment failed: ' + response.error.description);
                    });
                    rzp.open();
                } else {
                    showError(data.error || 'Order creation failed. Please try again.');
                }
            })
            .catch(err => {
                console.error(err);
                showError('Something went wrong.');
            });

            // ✅ Toastify functions
            function showError(msg) {
                Toastify({
                    text: msg,
                    duration: 4000,
                    gravity: "top",
                    position: "right",
                    backgroundColor: "#dc3545", // red
                    stopOnFocus: true
                }).showToast();
            }

            function showSuccess(msg) {
                Toastify({
                    text: msg,
                    duration: 8000,
                    gravity: "top",
                    position: "right",
                    backgroundColor: "#28a745", // green
                    stopOnFocus: true
                }).showToast();
            }
        });
    </script>


    <script>
        function confirmAssign(appointmentId) {
            $('#assignAppointmentModal').modal('show');
            $('#appointmentId').val(appointmentId);
            let selectId = "#approve_franchise";
            get_franchise_list(appointmentId,selectId);
        }

        function startBid(appointmentId) {
            $('#startBidModal').modal('show');
            $('.appointmentId').val(appointmentId);
            // alert(appointmentId);
            let selectId = "#approve_franchise";
            get_franchise_list(appointmentId,selectId);
        }

        let appointmentToReject = null;
        function reject(id) {
            appointmentToReject = id;
            $('#rejectModal').modal('show');
        }
        $('#confirmRejectBtn').on('click', function () {
            if (appointmentToReject) {
                $('#rejectSpinner').removeClass('d-none');
                $('#rejectBtnText').text('Rejecting...');
                $('#confirmRejectBtn').prop('disabled', true);
                var url = "{{ route('appointment.reject', ':id') }}".replace(':id', appointmentToReject);
                $.ajax({
                    url: url,
                    method: 'PUT',
                    data: {
                        _token: '{{ csrf_token() }}',
                        appointment_id: appointmentToReject,
                        status: 5
                    },
                    success: function (response) {
                        $('#rejectModal').modal('hide');
                        toastr.success(response.message);
                        setTimeout(function () {
                            location.reload();
                        }, 2000);
                    },
                    error: function () {
                        $('#rejectModal').modal('hide');
                        toastr.error('Something went wrong!');
                    },
                    complete: function () {
                        // Hide spinner and reset button after request
                        $('#rejectSpinner').addClass('d-none');
                        $('#rejectBtnText').text('Yes, Reject');
                        $('#confirmRejectBtn').prop('disabled', false);
                    }
                });
            }
        });

        function reconfirmAssign(appointmentId1) {
            $('#reassignAppointmentModal').modal('show');
            $('#appointmentId1').val(appointmentId1);
            let selectId = "#re_approve_franchise";
            get_franchise_list(appointmentId1,selectId);
        }

        function reShedule(appointmentId1) {
            $('#reassignSheduleModal').modal('show');
            $('.appointmentId1').val(appointmentId1);
            let selectId = "#re_shedule_franchise";
            get_franchise_name(appointmentId1,selectId);
        }

        
        function updatepayment(orderappointmentId) {
            $('#updatepaymentModal').modal('show');
            $.ajax({
                type: "GET",
                url: "{{url('quotations/get_quotation_data')}}/"+orderappointmentId,
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                success: function(result) {
                    if(result){
                        const order_value = result.total_order_value;
                        const final_amount = Math.max(0, Math.round(order_value - 750));
                        $('.orderfinalvalue').val(final_amount);
                        $('#orderfinalvalue').val(final_amount);
                        $('#ordervalue').val(Math.round(order_value));
                        $('#orderappointmentId').val(orderappointmentId);
                        $('#orderfranchisetId').val(result.franchise_id);
                        $('#orderquotationId').val(result.quotation_id);
                        $('#CustumerName').val(result.appointment_name);
                        $('#ContactNumber').val(result.appointment_mobile);
                        $('#payment_mode').change(function() {
                            var selectedPaymentMode = $(this).val();
                            let html = '';

                        });

                    }
                }
            });

        }



        function get_franchise_list(appointment_id,selectId) {
            $.ajax({
                type: "GET",
                url: "{{url('getFranchiseList')}}/"+appointment_id,
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                success: function(result) {
                    $('#nameField').val(result.name);
                    $('#emailField').val(result.email);
                    $('#mobileField').val(result.mobile);
                    $(selectId).empty();      
                    let htmlProductType = `<option disabled selected>Select Franchise</option>`;
                    result.local_franchise.forEach(function(item) {
                        htmlProductType += `<option value="${item.id}">${item.name}</option>`;
                    });
                    $(selectId).append(htmlProductType);
                }
            });
        }


        function get_franchise_name(appointment_id,selectId) {
            $.ajax({
                type: "GET",
                url: "{{url('getFranchiseName')}}/"+appointment_id,
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                success: function(result) {
                    
                    $(selectId).empty();      
                    let htmlProductType = ``;
                    result.local_franchise.forEach(function(item) {
                        htmlProductType += `<option  selected value="${item.id}">${item.name}</option>`;
                    });
                    $(selectId).append(htmlProductType);
                    $('.appointment_date').val(result.appointment_date);
                    $('.remarks').val(result.remarks);
                }
            });
        }

        $(document).ready(function() {
            loadAppointmentData(1);
            $('#re_Assign').on('submit', function(event) {
                event.preventDefault();
                $('.error').remove();
                let valid = true;
                const franchise = $('#re_approve_franchise').val();
                if (!franchise) {
                    valid = false;
                    $('#re_approve_franchise').after('<div class="error" style="color: red;">Franchise is required.</div>');
                }

                // Validate Appointment Date
                const date = $('#re-dateFilter').val();
                if (!date) {
                    valid = false;
                    $('#re-dateFilter').after('<div class="error" style="color: red;">Appointment date is required.</div>');
                }

                // If all validations pass, submit the form
                if (valid) { 
                    this.submit();
                }
            });



            // Handle tab change event
            $('#pills-tab button').on('click', function() {
                var tabId = $(this).attr('id').split('-')[1]; // Extract tab ID (e.g., pending, assign, etc.)
                // alert(tabId)
                loadAppointmentData(tabId); // Load data based on clicked tab
            });


            // Function to load appointment data based on the selected status
            function loadAppointmentData(status) {
        // Show loading indicator
                // alert(status);
        $('#appointmentTable tbody').html('<tr><td colspan="10" class="text-center">Loading...</td></tr>');

        // AJAX call to fetch data from the server
        $.ajax({
            url: '/customer/data', // API endpoint to fetch the data
            method: 'GET',
            data: {
                status: status // Pass the selected tab status to the server
            },
            success: function(response) {
                // Destroy existing DataTable if it exists
                if ($.fn.DataTable.isDataTable('#appointmentTable')) {
                    $('#appointmentTable').DataTable().clear().destroy();
                }

                // Clear the table body
                var $tbody = $('#appointmentTable tbody');
                $tbody.empty();

                // Populate the table if data exists
                if (response.data && response.data.length > 0) {
                    $.each(response.data, function(idx, appnt) {
                        var row = '<tr>';
                        row += '<td>' + (idx + 1) + '</td>';
                        row += '<td>' + appnt.name + '</td>';
                        row += '<td>' + appnt.mobile + '</td>';
                        // row += '<td>' + appnt.pincode + '</td>';
                        row += '<td>' + (appnt.appointment_date ? customformatDate(appnt.appointment_date) : 'N/A') + '</td>';
                        row += '<td>' + (appnt.franchise?.name || 'N/A') + '</td>';
                        row += '<td>' + (appnt.remarks == null ? 'N/A' : appnt.remarks) + '</td>';

                        var statusBadge = '';
                        var viewType = '';
                        var actions = '';
                        // alert(appnt.status);    
                        const baseUrl = "{{ url('quotations/create') }}";
                        switch (appnt.status) {
                            
                            case '7':
                                viewType = 'prospect';
                                statusBadge = '<span class="badge badge-pending">Pending</span>';
                                // actions = '<li><a href="javascript:" id="open-appointment-details-' + appnt.id + '" class="dropdown-item" data-id="' + appnt.id + '" data-checkType="' + viewType + '">View</a></li>';
                                actions += '<li><a href="#" class="dropdown-item small approve-appointment-btn" data-id="' + appnt.id + '" onclick="startBid(this)">Start Bid</a></li>';
                                actions += '<li><a href="javascript:" class="dropdown-item small approve-appointment-btn" data-appointment-id="' + appnt.id + '" onclick="confirmAssign(\'' + appnt.id + '\')">Assign Lead</a></li>';
                                // actions += '<li><a href="javascript:" class="dropdown-item small approve-appointment-btn" data-appointment-id="' + appnt.id + '" onclick="reject(\'' + appnt.id + '\')">Reject</a></li>';
                                break;
                            
                            case '2':
                                viewType = 'assign';
                                if (response.role === 'Franchise') {
                                    statusBadge = '<span class="badge badge-pending">Pending</span>';
                                    actions += '<li><a href="javascript:" class="dropdown-item small approve-appointment-btn" data-appointment-id="' + appnt.id + '" onclick="reShedule(\'' + appnt.id + '\')">Re-Shedule</a></li>';
                                } else {
                                    statusBadge = '<span class="badge badge-assigned">Assigned</span>';
                                }
                                actions += '<li><a href="javascript:" id="open-appointment-details-' + appnt.id + '" class="dropdown-item" data-id="' + appnt.id + '" data-checkType="' + viewType + '">View</a></li>';
                                const blockedRoles = ['Franchise', 'Fulfillment Desk'];
                                if (!blockedRoles.includes(response.role)) {
                                    actions += '<li><a href="javascript:" class="dropdown-item small approve-appointment-btn" data-appointment-id="' + appnt.id + '" onclick="reconfirmAssign(\'' + appnt.id + '\')">Re-Assign</a></li>';
                                }
                                if (response.role === 'Franchise') {
                                    actions += '<li><a href="{{url("quotations/create/")}}/' + appnt.id + '" class="dropdown-item small">Create Quote</a></li>';
                                }
                                break;
                            case '4':
                                viewType = 'complete';
                                statusBadge = '<span class="badge badge-active">Completed</span>';
                                actions = '<li><a href="javascript:" id="open-appointment-details-' + appnt.id + '" class="dropdown-item" data-id="' + appnt.id + '" data-checkType="' + viewType + '">View</a></li>';
                                break;
                            case '3':
                                viewType = 'hold';
                                statusBadge = '<span class="badge badge-inactive">Hold</span>';
                                actions = '<li><a href="javascript:" id="open-appointment-details-' + appnt.id + '" class="dropdown-item" data-id="' + appnt.id + '" data-checkType="' + viewType + '">View</a></li>';
                                const blockedRoles1 = ['Help Desk', 'Fulfillment Desk'];
                                if (!blockedRoles1.includes(response.role)) {
                                    actions += '<li><a href="javascript:" class="dropdown-item" data-id="' + appnt.id + '" data-checkType="' + viewType + '" onclick="updatepayment(' + appnt.id + ')">Update Payment</a></li>';
                                }
                                break;
                            case '5':
                                viewType = 'rejected';
                                statusBadge = '<span class="badge badge-pending">Rejected</span>';
                                // actions = '<li><a href="javascript:" id="open-appointment-details-' + appnt.id + '" class="dropdown-item" data-id="' + appnt.id + '" data-checkType="' + viewType + '">View</a></li>';
                            
                                break; 
                            default:
                                viewType = 'pending';
                                statusBadge = '<span class="badge badge-unknown">Unknown</span>';
                                actions = '';
                                break;
                        }

                        row += '<td>' + statusBadge + '</td>';
                        row += '<td><div><i class="bi bi-three-dots-vertical" type="button" data-bs-toggle="dropdown" aria-expanded="false"></i>';
                        row += '<ul class="dropdown-menu">';
                        if (actions) {
                            row += actions;
                        }
                        row += '</ul></div></td>';
                        row += '</tr>';
                        $tbody.append(row);
                    });
                }

                // Initialize DataTable regardless of data
                $('#appointmentTable').DataTable({
                    pageLength: 10,
                    responsive: true,
                    language: {
                        emptyTable: "No data found" // Custom message for empty table
                    }
                });
            },
            error: function() {
                // Handle AJAX request error
                if ($.fn.DataTable.isDataTable('#appointmentTable')) {
                    $('#appointmentTable').DataTable().clear().destroy();
                }
                $('#appointmentTable tbody').html('<tr><td colspan="10" class="text-center">Failed to load data</td></tr>');
                // Initialize DataTable with error message
                $('#appointmentTable').DataTable({
                    pageLength: 10,
                    responsive: true,
                    language: {
                        emptyTable: "Failed to load data"
                    }
                });
            }
        });
    }
        });


        function startBid(element) {
            const id = element.getAttribute('data-id');
            window.location.href = "{{ url('bids/create') }}/" + id;
        }
        function showApproveFranchiseModal(franchiseId) {
            var form = document.getElementById('approveFranchiseForm');
            var actionUrl = form.action.replace('__franchise_id__', franchiseId); // Replace the placeholder with the actual franchise ID
            form.action = actionUrl; // Update the form action URL
            $('#approveFranchiseModal').modal('show');
        }



        $(document).on('click', '.approve-appointment-btn', function(e) {
            e.preventDefault();
            var franchiseId = $(this).data('appointment-id'); // Get the franchise ID from the button's data attribute
            showApproveFranchiseModal(franchiseId); // Trigger the modal
        });



        function showRejectAppointmenteModal(franchiseId) {
            var form = document.getElementById('rejectFranchiseForm');
            var actionUrl = form.action.replace('__appointment_id__', franchiseId); // Replace the placeholder with the actual franchise ID
            form.action = actionUrl; // Update the form action URL
            $('#rejectFranchiseModal').modal('show');
        }



        $(document).on('click', '.reject-franchise-btn', function(e) {
            e.preventDefault();
            var franchiseId = $(this).data('appointment-id'); // Get the franchise ID from the button's data attribute
            showRejectAppointmenteModal(franchiseId); // Trigger the modal
        });



        $(document).ready(function() {
            $(document).on('click', '[id^="open-appointment-details-"]', function() {
                var franchiseId = $(this).data('id'); // Get franchise ID dynamically
                var franchiseType = $(this).data('checktype'); // Get franchise ID dynamically
                $.ajax({
                    url: '/appointment/details/' + franchiseId + '/' + franchiseType, // Make sure the URL is correct
                    method: 'GET',
                    success: function(response) {
                        if (response.status === 'success') {
                            var franchise = response.data;
                            // Populate table data dynamically
                            $('#FranciseViewLabel').text(franchise.name);
                            $('#FranciseView .offcanvas-body table tbody').html(`
                                    <tr><th>Status</th><td>${ franchise.status === "1" ? 'Pending' : franchise.status === "2" ? 'Assigned' : franchise.status === "3" ? 'Hold' 

                                    : franchise.status === "4" ? 'Complete' : 'N/A' }</td></tr>

                                    <tr><th>Appointment Date</th><td>${franchise.appointment_date ? customformatDate(franchise.appointment_date) : 'N/A'}</td></tr>

                                    <tr><th>Email Id</th><td>${franchise.email ? franchise.email : 'N/A'}</td></tr>
                                    <tr><th>Mobile Number</th><td>${franchise.mobile || 'N/A'}</td></tr>
                                    <tr><th>Address</th><td>${franchise.address || 'N/A'}</td></tr>
                                    <tr><th>Pincode</th><td>${franchise.pincode || 'N/A'}</td></tr>
                                    <tr><th>City</th><td>${franchise.city || 'N/A'}</td></tr>
                                    <tr><th>State</th><td>${franchise.state || 'N/A'}</td></tr>
                                    <tr><th>Country</th><td>${franchise.country || 'N/A'}</td></tr>
                                `);

                            // Show the off-canvas modal
                            $('#FranciseView').offcanvas('show');
                        } else {

                        }

                    },
                    error: function() {
                        alert('An error occurred while fetching the data.');
                    }
                });
            });



            $(".dt-responsive").dataTable({
                responsive: true,
                columnDefs: [{
                        responsivePriority: 1,
                        targets: 0
                    },
                    {   responsivePriority: 2,
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
        });



        $('#addFranchiseModal1').on('shown.bs.modal', function() {
            $("#contact-form1").validate({
                rules: {
                    company_name: "required",
                    name: "required",
                    email: {
                        required: true,
                        email: true
                    },

                    mobile: {
                        required: true,
                        digits: true,
                        minlength: 10,
                        maxlength: 15
                    },

                    alt_mobile: {
                        digits: true,
                        minlength: 10,
                        maxlength: 15
                    },

                    employees: {
                        required: true,
                        digits: true
                    },

                    address: "required",
                    pincode: {
                        required: true,
                        digits: true,
                        minlength: 6,
                        maxlength: 6
                    },

                    city: "required",
                    state: "required",
                    country: "required"
                },

                messages: {

                    company_name: "Please enter your company name",
                    name: "Please enter your name",
                    email: {
                        required: "Please enter your email",
                        email: "Please enter a valid email address"
                    },

                    mobile: {
                        required: "Please enter your mobile number",
                        digits: "Please enter a valid mobile number"
                    },

                    employees: "Please enter the number of employees",
                    address: "Please enter your address",
                    pincode: {
                        required: "Please enter your pincode",
                        digits: "Please enter a valid pincode"
                    },

                    city: "Please enter your city",
                    state: "Please enter your state",
                    country: "Please enter your country"
                },

                errorElement: "div", // Use div to display errors
                errorPlacement: function(error, element) {
                    error.addClass("form-text text-danger xsmall");
                    error.insertAfter(element); // Place the error directly after the input element
                },

                highlight: function(element) {
                    $(element).addClass("is-invalid").removeClass("is-valid");
                },

                unhighlight: function(element) {
                    $(element).removeClass("is-invalid").addClass("is-valid");
                }
            });
        });



        var input = document.querySelector("#mobile");
        var iti = "";
        // store the instance variable so we can access it in the console e.g. window.iti.getNumber()
        window.iti = iti;

        function saveData() {
            const formData = {
                company_name: $("#company_name").val(), // Match the name attribute in the input
                name: $("#name").val(),
                email: $("#email").val(),
                mobile: $("#mobile").val(),
                alt_mobile: $("#alt_mobile").val(),
                employees: $("#employees").val(),
                address: $("#address").val(),
                pincode: $("#pincode").val(),
                city: $("#city").val(),
                state: $("#state").val(),
                country: $("#country").val(),
                _token: $("input[name='_token']").val(), // CSRF token
            };



            $.ajax({
                type: "POST",
                url: "{{ route('franchise_temp.store_admin') }}", // Your server-side script to save data
                data: formData,
                success: function(response) {
                    document.getElementById('contact-form1').style.display = 'none'; // Hide all form fields
                    document.getElementById('form-title1').style.display = 'none';
                    document.getElementById('thankYouMessage1').style.display = 'block'; // Show the thank you message
                    $("#contact-form")[0].reset(); // Reset the form after successful submission
                },

                error: function(xhr, status, error) {
                    alert("An error occurred while saving data: " + error);
                }
            });
        }


        document.addEventListener("DOMContentLoaded", function() {
            const registrationType = document.getElementById("registerationType");
            const companyNameField = document.getElementById("company_name").parentElement;
            const employeesField = document.getElementById("employees").parentElement;

            // Initially hide the fields
            companyNameField.style.display = "none";
            employeesField.style.display = "none";

            // Add event listener for change on Registration Type field
            registrationType.addEventListener("change", function() {
                const selectedValue = registrationType.value;
                if (selectedValue === "Company" || selectedValue === "proprietor") {
                    companyNameField.style.display = "block";
                    employeesField.style.display = "block";
                } else {
                    companyNameField.style.display = "none";
                    employeesField.style.display = "none";
                }
            });
        });
    </script>
    @endsection