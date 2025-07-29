@extends('admin.layouts.app')

@section('title', 'Customert Bid List')
<style>
  .before-image-thumb {
    transition: transform 0.2s ease-in-out;
  }
  .before-image-thumb:hover {
    transform: scale(1.05);
    box-shadow: 0 0 10px rgba(0,0,0,0.3);
  }
</style>
@section('content')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<div class="dataOverviewSection mt-3">
    <div class="section-title">
        <h6 class="fw-bold m-0">All Jobs <span class="fw-normal text-muted"></span></h6>
        
    </div>

    <div class="dataOverview mt-3">
        <div>
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
				@if (Auth::user()->getRoleNames()[0] == 'Super Admin')
				<li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all" aria-selected="false">All <span class="fw-normal small"></span></button>
                </li>
				
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-pending-tab" data-bs-toggle="pill" data-bs-target="#pills-pending" type="button" role="tab" aria-controls="pills-pending" aria-selected="false">Pending <span class="fw-normal small"></span></button>
                </li>
				
				

               <!-- <li class="nav-item" role="presentation">
                    <button class="nav-link " id="pills-assign-tab" data-bs-toggle="pill" data-bs-target="#pills-assign" type="button" role="tab" aria-controls="pills-assign" aria-selected="false">Assign <span class="fw-normal small"></span></button>
                </li>-->
				
				<li class="nav-item" role="presentation">
                    <button class="nav-link " id="pills-prosessing-tab" data-bs-toggle="pill" data-bs-target="#pills-prosessing" type="button" role="tab" aria-controls="pills-prosessing" aria-selected="false">In Progress <span class="fw-normal small"></span></button>
                </li>
				<li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-hold-tab" data-bs-toggle="pill" data-bs-target="#pills-hold" type="button" role="tab" aria-controls="pills-hold" aria-selected="false">Hold <span class="fw-normal small"></span></button>
                </li>
				
				<li class="nav-item" role="presentation">
                    <button class="nav-link " id="pills-complete-tab" data-bs-toggle="pill" data-bs-target="#pills-complete" type="button" role="tab" aria-controls="pills-complete" aria-selected="false">Complete <span class="fw-normal small"></span></button>
                </li>
				@else
				<li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all" aria-selected="false">All <span class="fw-normal small"></span></button>
                </li>
				
			<!--	<li class="nav-item" role="presentation">
                    <button class="nav-link " id="pills-assign-tab" data-bs-toggle="pill" data-bs-target="#pills-assign" type="button" role="tab" aria-controls="pills-assign" aria-selected="false">Pending <span class="fw-normal small"></span></button>
                </li> -->
				
				<li class="nav-item" role="presentation">
                    <button class="nav-link " id="pills-prosessing-tab" data-bs-toggle="pill" data-bs-target="#pills-prosessing" type="button" role="tab" aria-controls="pills-prosessing" aria-selected="false">In Progress <span class="fw-normal small"></span></button>
                </li>
				
				<li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-hold-tab" data-bs-toggle="pill" data-bs-target="#pills-hold" type="button" role="tab" aria-controls="pills-hold" aria-selected="false">Hold <span class="fw-normal small"></span></button>
                </li>
				
				<li class="nav-item" role="presentation">
                    <button class="nav-link " id="pills-complete-tab" data-bs-toggle="pill" data-bs-target="#pills-complete" type="button" role="tab" aria-controls="pills-complete" aria-selected="false">Complete <span class="fw-normal small"></span></button>
                </li>
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
            <table class="table" id="quotation-table">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Job ID</th>
                        <th>Customer Name</th>
						
                        <th>Created Date</th>
                        {{-- <th>Franchise Assign</th> --}}
                        <th>City</th>
                        <th>Zipcode</th>
                        <th>Start Working</th>
						 <th>Re-Shedule</th>
						<th>Assigned To</th>
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
<div class="modal fade" id="rejectFranchiseModal" tabindex="-1" aria-labelledby="rejectFranchiseModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="rejectFranchiseForm" method="POST"
                action="{{ route('quotation.delete', ['id' => '__appointment_id__']) }}" autocomplete="off">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="rejectFranchiseModalLabel">Delete Bid</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this bid?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="secondary-btn" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="primary-btn">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add Franchise Modal Start -->
<div class="modal fade" id="addFranchiseModal1" tabindex="-1" aria-labelledby="addFranchiseModalLabel"
    aria-hidden="true">
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
                        <label for="UserEmailInput" class="form-label mb-1">Email ID<span
                                class="requried">*</span></label>
                        <input type="email" class="form-control w-100" id="email" name="email">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3 w-100">
                                <label for="contactNumberInput" class="form-label mb-1">Contact Number<span
                                        class="requried">*</span></label>
                                <input type="number" class="form-control w-100" id="mobile" name="mobile">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 w-100">
                                <label for="altcontactNumberInput" class="form-label mb-1">Alternate Contact
                                    Number</label>
                                <input type="number" class="form-control w-100" id="alt_mobile" name="alt_mobile">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3 w-100">
                                <label for="registerationType" class="form-label">Registration Type<span
                                        class="requried">*</span></label>
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
                                <label for="company_name" class="form-label">Company Name <span
                                        class="requried">*</span></label>
                                <input type="text" class="form-control w-100" id="company_name" name="company_name"
                                    placeholder="Enter Company Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 w-100">
                                <label for="employees" class="form-label">Number of Employees<span
                                        class="requried">*</span></label>
                                <input type="number" class="form-control w-100" id="employees" name="employees"
                                    placeholder="Enter Number of Employees">
                            </div>
                        </div>

                    </div>

                    <div class="mb-3 w-100">
                        <label for="franchiseAddress" class="form-label mb-1">Address<span
                                class="requried">*</span></label>
                        <textarea name="address" class="form-control w-100" id="address" name="address"
                            style="height: 70px;"></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3 w-100">
                                <label for="pincodeInput" class="form-label mb-1">Pincode<span
                                        class="requried">*</span></label>
                                <input type="number" class="form-control w-100" id="pincode" name="pincode">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 w-100">
                                <label for="countryInput" class="form-label mb-1"> Country<span
                                        class="requried">*</span></label>
                                <input type="text" class="form-control w-100" id="country" name="country">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3 w-100">
                                <label for="countryInput" class="form-label mb-1"> State<span
                                        class="requried">*</span></label>
                                <input type="text" class="form-control w-100" id="state" name="state">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 w-100">
                                <label for="countryInput" class="form-label mb-1"> City<span
                                        class="requried">*</span></label>
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

<!-- Approval Modal resheduleAppointmentModal -->


<!-- Add Franchise Modal End -->
 <div class="modal fade" id="assignAppointmentModal" tabindex="-1" aria-labelledby="approveFranchiseModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('appointments.assign') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="approveFranchiseModalLabel">Assign Sub Contract</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <input type="hidden" id="appointmentId" name="job_id">
                        <input type="hidden" id="leadId" name="lead_id">
                        <div class="mb-3">
                            <label for="franchise" class="form-label">Select Sub Contract <span class="requried">*</span></label>
                            <select id="approve_franchise" name="subContract_id" class="form-select w-100">
                            </select>
                            <div class="error" style="color: red;"></div>
                        </div>

                        <div class="mb-3">
                            <label for="date" class="form-label">Appointment Date<span class="requried">*</span></label>
                            @php
                                $now = \Carbon\Carbon::now()->addDay()->format('Y-m-d\TH:i');
                            @endphp
                            <input type="text" name="dateFilter" id="dateFilter" placeholder="MM-DD-YY" value="{{ request('dateFilter') }}" min="{{ $now }}" class="form-control me-3 w-100">
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
{{-- hold work --}}

<div class="modal fade" id="holdWorkModal" tabindex="-1" aria-labelledby="reapproveFranchiseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('hold.work') }}" method="POST" id="re_Assign">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="reapproveFranchiseModalLabel">Go To Hold</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="jobId" name="job_id">
                   

                    <div class="mb-3">
                        <label for="date" class="form-label">Date<span class="requried">*</span></label>
                        <input type="text" name="hold_date" id="dateFilter1" placeholder="MM-DD-YY"  class="form-control me-3 w-100" autocomplete="off">
                        <div class="error" style="color: red;"></div>
                    </div>

                    <div class="mb-3">
                        <label for="remarks" class="form-label">Hold Reason</label>
                        <textarea class="form-control me-3 w-100" name="hold_reason" id="re-remarks" rows="3" cols="50"></textarea>
                    </div> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="secondary-btn" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="primary-btn">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- end --}}

{{-- restartWorkModal --}}
<div class="modal fade" id="restartWorkModal" tabindex="-1" aria-labelledby="reapproveFranchiseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('restart.work') }}" method="POST" id="re_Assign">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="reapproveFranchiseModalLabel">Again Start</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="job_id" name="job_id">
                   

                    <div class="mb-3">
                        <label for="date" class="form-label">Re-Start Date<span class="requried">*</span></label>
                        <input type="text" name="re_start_date" id="re_start_date" placeholder="MM-DD-YY"  class="form-control me-3 w-100" autocomplete="off">
                        <div class="error" style="color: red;"></div>
                    </div>

                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="secondary-btn" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="primary-btn">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- end --}}

<div class="modal fade" id="resheduleAppointmentModal" tabindex="-1" aria-labelledby="reapproveFranchiseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('appointments.reassign') }}" method="POST" id="re_Assign">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="reapproveFranchiseModalLabel">Re-Shedule</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="appointmentId1" name="job_id">
                   

                    <div class="mb-3">
                        <label for="date" class="form-label">Shedule Date<span class="requried">*</span></label>
                        <input type="text" name="dateFilter1" id="dateFilter1" placeholder="MM-DD-YY"  class="form-control me-3 w-100">
                        <div class="error" style="color: red;"></div>
                    </div>

                   <!-- <div class="mb-3">
                        <label for="remarks" class="form-label">Remarks</label>
                        <textarea class="form-control me-3 w-100" name="remarks1" id="re-remarks" rows="3" cols="50"></textarea>
                    </div> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="secondary-btn" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="primary-btn">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="updateWorkModal" tabindex="-1" aria-labelledby="reapproveFranchiseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form  id="workUpdateForm" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="">Update Work</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="updatework_id" name="updatework_id">
                   

                    <div class="mb-3">
                        <label for="date" class="form-label">Image<span class="requried">*</span></label>
                        <input type="file" id="beforeImage" name="beforeImage[]"  class="form-control me-3 w-100" multiple>
                        <div class="error" style="color: red;"></div>
						<!-- PREVIEW CONTAINER -->
						<div id="image-preview" class="d-flex flex-wrap gap-2 mt-2"></div>
                    </div>

                    <div class="mb-3">
                        <label for="remarks" class="form-label">Remarks</label>
                        <textarea class="form-control me-3 w-100" name="beforeWorkRemark" id="re-remarks" rows="3" cols="50"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="secondary-btn" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="primary-btn">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="updateWorkModal2" tabindex="-1" aria-labelledby="reapproveFranchiseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form  id="workUpdateForm2" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="">Update (After Work)</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="updatework_id2" name="updatework_id2">
                   

                    <div class="mb-3">
                        <label for="date" class="form-label">After Work Image<span class="requried">*</span></label>
                        <input type="file" id="afterImage" name="afterImage[]"  class="form-control me-3 w-100" multiple>
                        <div class="error" style="color: red;"></div>
						<!-- PREVIEW CONTAINER -->
						<div id="image-preview2" class="d-flex flex-wrap gap-2 mt-2"></div>
                    </div>

                    <div class="mb-3">
                        <label for="remarks" class="form-label">Remarks</label>
                        <textarea class="form-control me-3 w-100" name="afterWorkRemark" id="" rows="3" cols="50"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="secondary-btn" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="primary-btn">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="viewWorkModal" tabindex="-1" aria-labelledby="viewWorkLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Work Images (After Work)</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label>Images:</label>
          <div id="afterImagesPreview" class="d-flex flex-wrap gap-2"></div>
        </div>
        <div class="mb-3">
          <label>Remarks:</label>
          <p id="afterWorkRemark"></p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="viewBeforeWorkModal" tabindex="-1" aria-labelledby="viewWorkLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Work Images (Before Work)</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label>Images:</label>
          <div id="beforeImagesPreview" class="d-flex flex-wrap gap-2"></div>
        </div>
        <div class="mb-3">
          <label>Remarks:</label>
          <p id="beforeWorkRemark"></p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="imageZoomModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content bg-dark">
      <div class="modal-body text-center p-2">
        <img id="zoomedImage" src="" class="img-fluid rounded" style="max-height: 80vh;">
      </div>
    </div>
  </div>
</div>

@endsection

@section('script')

<script> 
    $(document).on('click', '.assign-appointment-btn', function () {
    const appointmentId = $(this).data('appointment-id');
    const leadId = $(this).data('lead-id');

    console.log("Appointment ID:", appointmentId);
    console.log("Lead ID:", leadId);

    $('#assignAppointmentModal').modal('show');
    $('#appointmentId').val(appointmentId);
    $('#leadId').val(leadId);

    let selectId = "#approve_franchise";
    get_franchise_list(appointmentId, selectId);
});
    function confirmAssign222(appointmentId) {
        // Open modal and set appointment ID
        // alert('demo'); 2
        $('#assignAppointmentModal').modal('show');
        $('#appointmentId').val(appointmentId);
    }
	
	
	function holdWork(appointmentId1) {
        // Open modal and set appointment ID restart
        $('#holdWorkModal').modal('show');
        $('#jobId').val(appointmentId1);
    }

    function restart(appointmentId1) {
        // Open modal and set appointment ID 
        $('#restartWorkModal').modal('show');
        $('#job_id').val(appointmentId1);
    }

    function reshedule(appointmentId1) {
        // Open modal and set appointment ID
        $('#resheduleAppointmentModal').modal('show');
        $('#appointmentId1').val(appointmentId1);
    }
	
	function updateWork(updatework_id) {
        // Open modal and set appointment ID
        $('#updateWorkModal').modal('show');
        $('#updatework_id').val(updatework_id);
    }
	
	function updateWork2(updatework_id2) {
        // Open modal and set appointment ID
        $('#updateWorkModal2').modal('show');
        $('#updatework_id2').val(updatework_id2);
    }

    // function rejected(appointmentId) {
    //     // Open modal and set appointment ID
    //     $('#rejectFranchiseModal').modal('show');
    //     $('#appointmentId').val(appointmentId);
    // }

    $(document).ready(function() {
        // Initial load for the 'pending' tab data
        loadQuotationData('all');

        // Handle tab change event
        $('#pills-tab button').on('click', function() {
            var tabId = $(this).attr('id').split('-')[1]; // Extract tab ID (e.g., pending, assign, etc.)
			//alert(tabId);
            loadQuotationData(tabId); // Load data based on clicked tab
			
        });

        // Function to load appointment data based on the selected status
        function loadQuotationData(status) {
    // Show loading indicator
    $('#quotation-table tbody').html('<tr><td colspan="7" class="text-center">Loading...</td></tr>');

    // AJAX call to fetch data from the server
    $.ajax({
        url: '/jobs/data', // API endpoint to fetch the data
        method: 'GET',
        data: {
            status: status // Pass the selected tab status to the server
        },
        success: function(response) {
            // Destroy existing DataTable if it exists
            if ($.fn.DataTable.isDataTable('#quotation-table')) {
                $('#quotation-table').DataTable().clear().destroy();
            }

            // Clear the table body
            var $tbody = $('#quotation-table tbody');
            $tbody.empty();

            // Populate the table if data exists
            if (response.data && response.data.length > 0) {
                $.each(response.data, function(idx, appnt) {
					
                    let date = '';
                    let appointment_date = '';
                    if (appnt.created_at) {
                        let d = new Date(appnt.created_at);
                        let mm = String(d.getMonth() + 1).padStart(2, '0');
                        let dd = String(d.getDate()).padStart(2, '0');
                        let yyyy = d.getFullYear();
                        date = `${mm}-${dd}-${yyyy}`;
                    } else {
                        date = 'N/A';
                    }
					
					if (appnt.start_date) {
                        let d = new Date(appnt.start_date);
                        let mm = String(d.getMonth() + 1).padStart(2, '0');
                        let dd = String(d.getDate()).padStart(2, '0');
                        let yyyy = d.getFullYear();
                        appointment_date = `${mm}-${dd}-${yyyy}`;
                    } else {
                        appointment_date = 'N/A';
                    }

                    var row = `<tr>`;
                    row += `<td>${idx + 1}</td>`;
                    row += `<td>${appnt.job_code}</td>`;
                    row += `<td>${appnt.bid && appnt.bid.name ? appnt.bid.name : 'N/A'}</td>`;
                    row += `<td>${date || 'N/A'}</td>`;
                    // row += `<td>${appnt.franchise?.name || 'N/A'}</td>`;
                    row += `<td>${appnt.appointment && appnt.appointment.city ? appnt.appointment.city : 'N/A'}</td>`;
					row += `<td>${appnt.appointment && appnt.appointment.pincode ? appnt.appointment.pincode : 'N/A'}</td>`;
					row += `<td>${appointment_date || 'N/A'}</td>`;
					 row += `<td>${appnt.reshedule_date}</td>`;
					row += `<td>${appnt.subcontract && appnt.subcontract.contact_person ? appnt.subcontract.contact_person : 'N/A'}</td>`;

					let statusText = '';
					if (appnt.status == 0) {
						statusText = response.role === 'Super Admin' ? 'Pending' : 'Waiting';
					} else if (appnt.status == 1) {
						statusText = response.role === 'Super Admin' ? 'Assign' : 'Pending';
					} else if (appnt.status == 2) {
						statusText = 'Hold';
					} else if (appnt.status == 3) {
						statusText = 'Processing';
					}else if (appnt.status == 4) {
						statusText = 'Complete';
					} else {
						statusText = appnt.status;
					}

					row += `<td>${statusText}</td>`;
                    row += `<td>
                                <div>
                                    <i class="bi bi-three-dots-vertical" type="button" data-bs-toggle="dropdown" aria-expanded="false"></i>
                                    <ul class="dropdown-menu">
									${(response.role === 'Admin' || response.role === 'Super Admin') && appnt.status == 0 ? `
                                          <li><a href="javascript:" class="dropdown-item small assign-appointment-btn" data-lead-id="${appnt.lead_id}" data-appointment-id="${appnt.id}">Assign Sub Contract</a></li>
                                          
                                      ` : ''}
									  
									  ${(response.role === 'Sub Contractor' || response.role === 'Super Admin') && appnt.status == 3 ? `
                                          <li><a href="javascript:" class="dropdown-item small approve-appointment-btn" data-appointment-id="' + ${appnt.id} + '" onclick="viewWorkBefore(\'' + ${appnt.id} + '\')">View Status Before Work</a></li>
                                          
                                      ` : ''}

                                      ${(response.role === 'Sub Contractor') && appnt.status == 3 ? `
                                          <li><a href="javascript:" class="dropdown-item small approve-appointment-btn" data-appointment-id="' + ${appnt.id} + '" onclick="holdWork(\'' + ${appnt.id} + '\')">Hold Work</a></li>
                                          
                                      ` : ''}

                                      ${(response.role === 'Sub Contractor' || response.role === 'Super Admin') && appnt.status == 4 ? `
                                          <li><a href="javascript:" class="dropdown-item small approve-appointment-btn" data-appointment-id="' + ${appnt.id} + '" onclick="viewWorkBefore(\'' + ${appnt.id} + '\')">View Status Before Work</a></li>
                                          
                                      ` : ''}
									  
									  ${(response.role === 'Sub Contractor' || response.role === 'Super Admin') && appnt.status == 4 ? `
                                          <li><a href="javascript:" class="dropdown-item small approve-appointment-btn" data-appointment-id="' + ${appnt.id} + '" onclick="viewWorkArfter(\'' + ${appnt.id} + '\')">View Status After Work</a></li>
                                          
                                      ` : ''}
									  
									  ${(response.role === 'Sub Contractor') && appnt.status == 1 ? `
                                          <li><a href="javascript:" class="dropdown-item small approve-appointment-btn" data-appointment-id="' + ${appnt.id} + '" onclick="reshedule(\'' + ${appnt.id} + '\')">Re-Shedule</a></li>
                                          
                                      ` : ''}

                                      ${(response.role === 'Sub Contractor') && appnt.status == 2 ? `
                                          <li><a href="javascript:" class="dropdown-item small approve-appointment-btn" data-appointment-id="' + ${appnt.id} + '" onclick="restart(\'' + ${appnt.id} + '\')">Again Start</a></li>
                                          
                                      ` : ''}
									  
									  ${(response.role === 'Sub Contractor') && appnt.status == 1? `
                                          <li><a href="javascript:" class="dropdown-item small approve-appointment-btn" data-appointment-id="' + ${appnt.id} + '" onclick="updateWork(\'' + ${appnt.id} + '\')">Update Work</a></li>
                                          
                                      ` : ''}
									  
									  ${(response.role === 'Sub Contractor') && appnt.status == 3 ? `
                                          <li><a href="javascript:" class="dropdown-item small approve-appointment-btn" data-appointment-id="' + ${appnt.id} + '" onclick="updateWork2(\'' + ${appnt.id} + '\')">Update Work</a></li>
                                          
                                      ` : ''}
                                       
                                        
                                    </ul>
                                </div>
                            </td>`;
                    row += `</tr>`;

                    $tbody.append(row);
                });
            }

            // Initialize DataTable regardless of data
            $('#quotation-table').DataTable({
                pageLength: 10,
                responsive: true,
                language: {
                    emptyTable: "No data found" // Custom message for empty table
                }
            });
        },
        error: function() {
            // Handle AJAX request error
            if ($.fn.DataTable.isDataTable('#quotation-table')) {
                $('#quotation-table').DataTable().clear().destroy();
            }
            var $tbody = $('#quotation-table tbody');
            $tbody.empty();

            // Initialize DataTable with error message
            $('#quotation-table').DataTable({
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

    $(document).on('click', '.download_quotation_btn', function(e) {
        e.preventDefault(); // Prevents default action (optional)

        // Get the href attribute, which contains the URL
        var url = $(this).attr('href');

        // Navigate to the URL using window.location
        window.location.href = url;
    });
    function showApproveFranchiseModal(franchiseId) {
        var form = document.getElementById('approveFranchiseForm');
        var actionUrl = form.action.replace('__franchise_id__', franchiseId); // Replace the placeholder with the actual franchise ID
        form.action = actionUrl; // Update the form action URL

        $('#approveFranchiseModal').modal('show');
    }

    $(document).on('click', '.approve-quotation-btn', function(e) {
        e.preventDefault();
        var franchiseId = $(this).data('quotation-id'); // Get the franchise ID from the button's data attribute
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
        var franchiseId = $(this).data('quotation-id'); // Get the franchise ID from the button's data attribute
        showRejectAppointmenteModal(franchiseId); // Trigger the modal
    });

    $(document).ready(function() {
        $(document).on('click', '[id^="open-quotation-details-"]', function() {
            
            var quotationId = $(this).data('id'); // Get quotation ID dynamically
            var quotationType = $(this).data('checktype'); // Get quotation ID dynamically

            // Ajax request to get quotation details
            $.ajax({
                url: '/bids/details/' + quotationId + '/' + quotationType, // Make sure the URL is correct
                method: 'GET',
                success: function(response) {
                    if (response.status === 'success') {
                        var quotation = response.data.quotation;
                        var appointment = response.data.appointment;
                        console.log(quotation);
                        // Populate table data dynamically
                        $('#FranciseViewLabel').text(quotation.name);

                        $('#FranciseView .offcanvas-body table tbody').html(`
                                <tr><th>Name</th><td>${quotation.name || 'N/A'}</td></tr>
                                <tr><th>Email ID</th><td>${quotation.email || 'N/A'}</td></tr>
                                <tr><th>Contact Number</th><td>${quotation.number || 'N/A'}</td></tr>
                                 
                               
                                <tr><th>Address</th><td>${quotation.address || 'N/A'}</td></tr>
                                
                                
                            `);


                        // Show the off-canvas modal  <tr><th>Date</th><td>${quotation.date ? new Date(quotation.date).toLocaleDateString('en-GB').replace(/\//g, '-') : 'N/A'}</td></tr>
                        $('#FranciseView').offcanvas('show');
                    } else {
                        alert('Franchise details not found.');
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
                //alert('ddd');
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
<script>
	// function confirmAssign(appointmentId) {
	// 		// alert(appointmentId);  
    //         // data-lead-id
    //          const leadId = $(this).data('lead-id');
    //         //  alert(leadId);
    //         $('#assignAppointmentModal').modal('show');
    //         $('#appointmentId').val(appointmentId);
    //         let selectId = "#approve_franchise";
    //         get_franchise_list(appointmentId,selectId);
    //     }
	
	 function get_franchise_list(appointment_id,selectId) {
        // alert(appointment_id);
            $.ajax({
                type: "GET",
                url: "{{url('/jobs/getSubContract')}}/"+appointment_id,
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                success: function(result) {
                    $(selectId).empty();      
                    let htmlProductType = `<option disabled selected>Select Sub Contract</option>`;
                    result.local_franchise.forEach(function(item) {
                        htmlProductType += `<option value="${item.id}">${item.contact_person}</option>`;
                    });
                    $(selectId).append(htmlProductType);
                }
            });
        }
</script>

<script>
function initImagePreview(fileInputId, previewContainerId) {
	const fileInput = document.getElementById(fileInputId);
	const previewContainer = document.getElementById(previewContainerId);

	fileInput.addEventListener('change', function () {
		const files = Array.from(fileInput.files);
		previewContainer.innerHTML = ''; // Clear old previews

		files.forEach(file => {
			const reader = new FileReader();
			reader.onload = function (event) {
				const wrapper = document.createElement('div');
				wrapper.className = 'position-relative';
				wrapper.style.width = '100px';
				wrapper.style.height = '100px';

				const img = document.createElement('img');
				img.src = event.target.result;
				img.className = "rounded";
				img.style.width = '100%';
				img.style.height = '100%';
				img.style.objectFit = 'cover';
				img.style.border = '1px solid #ccc';

				const removeBtn = document.createElement('button');
				removeBtn.type = 'button';
				removeBtn.innerHTML = '&times;';
				removeBtn.className = 'btn btn-sm btn-danger position-absolute top-0 end-0 p-1 m-1 rounded-circle';
				removeBtn.style.fontSize = '12px';

				removeBtn.addEventListener('click', function () {
					fileInput.value = ''; // Reset input
					previewContainer.innerHTML = '';
				});

				wrapper.appendChild(img);
				wrapper.appendChild(removeBtn);
				previewContainer.appendChild(wrapper);
			};
			reader.readAsDataURL(file);
		});
	});
}

// Initialize both preview systems
initImagePreview('beforeImage', 'image-preview');
initImagePreview('afterImage', 'image-preview2');
</script>


<script>
    $(document).ready(function () {
        $('#workUpdateForm').on('submit', function (e) {
            e.preventDefault();

            let form = $(this)[0];
            let formData = new FormData(form);

            $.ajax({
                url: "{{ route('update.work') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function () {
                    // Optional: loader ya disable button
                },
                success: function (response) {
                    toastr.success("Work updated successfully!");
                    $('#updateWorkModal').modal('hide');
                    $('#workUpdateForm')[0].reset();
					setTimeout(function () {
						location.reload();
					}, 1500);
                    // Optional: refresh a portion of the page or data
                },
                error: function (xhr) {
                    // Reset errors
                    $(".error").html("");

                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function (key, value) {
                            // Show validation errors
                            $(`[name="${key}"]`).siblings(".error").text(value[0]);
                        });
                    } else {
                        toastr.error("Something went wrong!");
                    }
                }
            });
        });
    });
</script>


<script>
    const workImageRoute = "{{ route('work.images', ':id') }}";
</script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
    $(document).ready(function () {
        $('#workUpdateForm2').on('submit', function (e) {
            e.preventDefault();

            let form = $(this)[0];
            let formData = new FormData(form);

            $.ajax({
                url: "{{ route('complete.update.work') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function () {
                    // Optional: loader ya disable button
                },
                success: function (response) {
                    toastr.success("Work updated successfully!");
                    $('#updateWorkModal2').modal('hide');
                    $('#workUpdateForm2')[0].reset();
					setTimeout(function () {
						location.reload();
					}, 1500);
                    // Optional: refresh a portion of the page or data
                },
                error: function (xhr) {
                    // Reset errors
                    $(".error").html("");

                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function (key, value) {
                            // Show validation errors
                            $(`[name="${key}"]`).siblings(".error").text(value[0]);
                        });
                    } else {
                        toastr.error("Something went wrong!");
                    }
                }
            });
        });
    });
	
	
	function viewWorkArfter(id) {
		const finalUrl = workImageRoute.replace(':id', id);
    $.ajax({
         url: finalUrl,
        type: 'GET',
        success: function (res) {
            // Clear old data
            $('#afterImagesPreview').html('');
            $('#afterWorkRemark').text('');

            if (res.after_images && res.after_images.length > 0) {
                res.after_images.forEach(img => {
                    let imgTag = `<img src="/uploads/work/after/${img}" style="width: 100px; height: 100px; object-fit: cover; margin-right: 10px;" class="rounded border" />`;
                    $('#afterImagesPreview').append(imgTag);
                });
            } else {
                $('#afterImagesPreview').html('<p>No images found.</p>');
            }

            $('#afterWorkRemark').text(res.afterWorkRemark || 'No remark');
            $('#viewWorkModal').modal('show');
        },
        error: function () {
            toastr.error("Unable to fetch data.");
        }
    });
}
	
	
	function viewWorkBefore(id) {
		const finalUrl = workImageRoute.replace(':id', id);
    $.ajax({
         url: finalUrl,
        type: 'GET',
        success: function (res) {
            // Clear old data
            $('#beforeImagesPreview').html('');
            $('#beforeWorkRemark').text('');

            // if (res.before_images && res.before_images.length > 0) {
            //     res.before_images.forEach(img => {
            //         let imgTag = `<img src="/uploads/work/${img}" style="width: 100px; height: 100px; object-fit: cover; margin-right: 10px;" class="rounded border" />`;
            //         $('#beforeImagesPreview').append(imgTag);
            //     });
            // } else {
            //     $('#beforeImagesPreview').html('<p>No images found.</p>');
            // }

            if (res.before_images && res.before_images.length > 0) {
                res.before_images.forEach(img => {
                    let imgTag = `
                    <div class="position-relative">
                        <img src="/uploads/work/${img}" style="width: 100px; height: 100px; object-fit: cover; cursor: pointer;" 
                        class="rounded border before-image-thumb" data-image="/uploads/work/${img}" />
                    </div>`;
                    $('#beforeImagesPreview').append(imgTag);
                });
            } else {
                $('#beforeImagesPreview').html('<p>No images found.</p>');
            }

            $('#beforeWorkRemark').text(res.beforeWorkRemark || 'No remark');
            $('#viewBeforeWorkModal').modal('show');
        },
        error: function () {
            toastr.error("Unable to fetch data.");
        }
    });
}
	
	$('#dateFilter').datepicker({
    dateFormat: 'mm-dd-yy',
    minDate: 1 // disables past and current day
		
});
	
	
	$('#dateFilter1').datepicker({
    dateFormat: 'mm-dd-yy',
    minDate: 1 // disables past and current da		
});

$('#re_start_date').datepicker({
    dateFormat: 'mm-dd-yy',
    minDate: 1 // disables past and current da		
});

$(document).on('click', '.before-image-thumb', function () {
    const imageUrl = $(this).data('image');
    $('#zoomedImage').attr('src', imageUrl);
    $('#imageZoomModal').modal('show');
});
</script>
@endsection