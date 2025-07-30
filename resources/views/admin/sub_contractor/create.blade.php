@extends('admin.layouts.app')

@section('title', 'Add New Sub Contractor')

@section('content')
<div class="dataOverviewSection mt-3 mb-3">
    <form method="POST" enctype="multipart/form-data"
    class="mt-4 wow animate__animated animate__fadeIn" id="contact-form1">
    @csrf
    <input type="hidden" name="status" value="pending">
    <div class="dataOverview mt-3">
        <h6 class="m-0">Add New Sub Contractor</h6>
        <hr class="m-0 mt-2 mb-3">

        <!-- Row 1 -->
<div class="row">
    <div class="col-md-4 mb-3">
        <label for="company_name" class="form-label">Subcontractor Company Name<span class="requried">*</span></label>
        <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Enter Company or Person Name">
        <span class="text-danger error-company_name"></span>
    </div>

    <div class="col-md-4 mb-3">
        <label for="contact_person" class="form-label">Contact Person Name<span class="requried">*</span></label>
        <input type="text" class="form-control" name="contact_person" id="contact_person" placeholder="Enter Contact Person Name">
        <span class="text-danger error-contact_person"></span>
    </div>

    <div class="col-md-4 mb-3">
        <label for="phone" class="form-label">Phone Number<span class="requried">*</span></label>
        <input type="tel" class="form-control" name="phone" id="phone" placeholder="Enter Phone Number" pattern="^[6-9]\d{9}$" maxlength="10">
        <span class="text-danger error-phone"></span>
    </div>
</div>

<!-- Row 2 -->
<div class="row">
    <div class="col-md-4 mb-3">
        <label for="email" class="form-label">Email Address<span class="requried">*</span></label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email">
        <span class="text-danger error-email"></span>
    </div>

    <div class="col-md-4 mb-3">
        <label for="city" class="form-label">City<span class="requried">*</span></label>
        <input type="text" class="form-control" name="city" id="city" placeholder="Enter City">
        <span class="text-danger error-city"></span>
    </div>

    <div class="col-md-4 mb-3">
        <label for="state" class="form-label">State<span class="requried">*</span></label>
        <input type="text" class="form-control" name="state" id="state" placeholder="Enter State">
        <span class="text-danger error-state"></span>
    </div>
</div>

<!-- Row 3 -->
<div class="row">
    <div class="col-md-4 mb-3">
        <label for="zip_code" class="form-label">Zip Code<span class="requried">*</span></label>
        <input type="text" class="form-control" name="zip_code" id="zip_code" placeholder="Enter Zip Code" maxlength="6">
        <span class="text-danger error-zip_code"></span>
    </div>

    <div class="col-md-4 mb-3">
        <label for="specialization" class="form-label">Trade/Specialization<span class="requried">*</span></label>
        <select class="form-control" name="specialization" id="specialization">
            <option value="">Select Trade</option>
            <option value="Roofing">Roofing</option>
            <option value="Gutter">Gutter</option>
            <option value="Waterproofing">Waterproofing</option>
            <option value="Electrical">Electrical</option>
            <option value="Plumbing">Plumbing</option>
            <option value="Other">Other</option>
        </select>
        <span class="text-danger error-specialization"></span>
    </div>

    <div class="col-md-4 mb-3">
        <label for="license_number" class="form-label">License Number (Optional)</label>
        <input type="text" class="form-control" name="license_number" id="license_number" placeholder="Enter License Number">
        <span class="text-danger error-license_number"></span>
    </div>
</div>

<!-- Row 4 -->
<div class="row">
    <div class="col-md-4 mb-3">
        <label for="insurance_certificate" class="form-label">Insurance Certificate (Optional)</label>
        <input type="file" class="form-control" name="insurance_certificate" id="insurance_certificate">
        <span class="text-danger error-insurance_certificate"></span>
    </div>

    <div class="col-md-4 mb-3">
        <label for="experience_years" class="form-label">Years of Experience<span class="requried">*</span></label>
        <input type="number" class="form-control" name="experience_years" id="experience_years" min="0" placeholder="Enter Years of Experience">
        <span class="text-danger error-experience_years"></span>
    </div>

    <div class="col-md-4 mb-3">
        <label for="availability_status" class="form-label">Availability Status<span class="requried">*</span></label>
        <select class="form-control" name="availability_status" id="availability_status">
            <option value="">Select Status</option>
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>
        </select>
        <span class="text-danger error-availability_status"></span>
    </div>
</div>

<!-- Row 5 -->
<div class="row">
    <div class="col-md-4 mb-3">
        <label for="payment_method" class="form-label">Preferred Payment Method<span class="requried">*</span></label>
        <select class="form-control" name="payment_method" id="payment_method">
            <option value="">Select Payment Method</option>
            <option value="Bank Transfer">Bank Transfer</option>
            <option value="Check">Check</option>
            <option value="Online Payment">Online Payment</option>
        </select>
        <span class="text-danger error-payment_method"></span>
    </div>

    <div class="col-md-4 mb-3">
        <label class="form-label d-block">Agreement / Contract Signed?<span class="requried">*</span></label>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="contract_signed" id="contract_yes" value="Yes">
            <label class="form-check-label" for="contract_yes">Yes</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="contract_signed" id="contract_no" value="No">
            <label class="form-check-label" for="contract_no">No</label>
        </div>
        <span class="text-danger error-contract_signed d-block mt-1"></span>
    </div>
</div>

<!-- Address and Services Row -->
<div class="row">
    <div class="col-md-12 mb-3">
        <label for="office_address" class="form-label">Office Address<span class="requried">*</span></label>
        <input type="text" class="form-control" name="office_address" id="office_address" placeholder="Enter Business Location">
        <span class="text-danger error-office_address"></span>
    </div>

    <div class="col-md-12 mb-3">
        <label for="service_areas" class="form-label">Service Areas Covered</label>
        <input type="text" class="form-control" name="service_areas" id="service_areas" placeholder="Enter Cities, States or Areas">
        <span class="text-danger error-service_areas"></span>
    </div>

    <div class="col-md-12 mb-3 d-none">
        <label for="bank_details" class="form-label">Bank Details (Optional)</label>
        <textarea class="form-control" name="bank_details" id="bank_details" placeholder="Enter Bank Details"></textarea>
        <span class="text-danger error-bank_details"></span>
    </div>
</div>


        <!-- Buttons -->
        <div class="mt-3 d-flex gap-3 mb-4">
            <button type="submit" class="btn btn-primary" id="submitBtn">
                Create
                <span class="spinner-border spinner-border-sm ms-2 d-none" role="status" aria-hidden="true"></span>
            </button>
            <button type="button" class="btn btn-secondary" onclick="window.location.href='/sub_contractor'">Cancel</button>
        </div>
    </div>
</form>


</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('input, select, textarea').on('input change', function () {
            let name = $(this).attr('name');
            if (name) {
                $(`.error-${name}`).text('');
            }
        });
        
        $('#contact-form1').on('submit', function (e) {
            e.preventDefault();
    
            $('#submitBtn .spinner-border').removeClass('d-none');
            $('.text-danger').text(''); // Clear previous error messages
    
            let formData = new FormData(this);
    
            $.ajax({
                url: "{{ route('subcontractors.store') }}", // controller route
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    $('#submitBtn .spinner-border').addClass('d-none');
                    toastr.success('Sub Contractor added successfully!');
                    $('#contact-form1')[0].reset();

                    setTimeout(() => {
                        window.location.href = "/sub_contractor";
                    }, 1500);
                    // Optionally redirect:
                    // window.location.href = "/subcontractors";
                },
                error: function (xhr) {
                    $('#submitBtn .spinner-border').addClass('d-none');
    
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function (key, value) {
                            $(`.error-${key}`).text(value[0]);
                        });
                    } else {
                        toastr.error('Something went wrong.');
                    }
                }
            });
        });
    });
    </script>
    

@endsection