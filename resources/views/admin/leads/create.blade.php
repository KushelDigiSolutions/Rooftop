@extends('admin.layouts.app')

@section('title', 'Add Lead')
@section('css')
<style>
    .error {
        color: red;
        font-size: 0.875rem;
        margin-top: 0.25rem;
    }

    .is-invalid {
        border-color: red !important;
    }
</style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
@endsection
@section('content')
<div class="dataOverviewSection mt-3 mb-3">
    <form action="javascript:" method="POST" enctype="multipart/form-data" class="mt-3" id="contact-form1">
        @csrf
        <div class="dataOverview mt-3">
            <h6 class="m-0">Add New Lead</h6>
            <hr class="m-0 mt-2 mb-2">
            <div class="row mb-2">
            <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name"  required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email ID <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="email" name="email" >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile Number <span class="text-danger">*</span></label>
                        <input type="tel" class="form-control" id="mobile" name="mobile"  maxlength="10" required>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
                        {{-- <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" required> --}}
                        <textarea name="address" class="form-control" id="address" cols="30" rows="30"></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3 checkPincode">
                        <label for="pincode" class="form-label">Type of Property <span class="text-danger">*</span></label>
                        <select name="type_property" id="type_property" class="form-control">
                            <option value="">Select One</option>
                            <option value="Residential">Residential</option>
                            <option value="Commercial">Commercial</option>
                            <option value="Industrial">Industrial</option>
                        </select>
                        <div class="invalid-feedback">Please enter a valid 6 digit pincode</div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <!-- <label for="state" class="form-label">State <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="state" name="state" placeholder="Enter State" required> -->
                        <label for="state" class="form-label">Requirement Type<span class="requried">*</span></label>
                        <select name="requirement_type" id="requirement_type" class="form-control">
                            <option value="">Select One</option>
                            <option value="Installation">Installation</option>
                            <option value="Maintenance">Maintenance</option>
                            <option value="Repair">Repair</option>
                            <option value="Inspection">Inspection</option>
                        </select>
                        <div class="invalid-feedback">Please enter a valid state name.</div>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="mb-3">
                        <label for="city" class="form-label">How Did You Hear About Us/ Lead Source?<span class="requried">*</span></label>
                        <select name="lead_source" id="lead_source" class="form-control">
                            <option value="">Select One</option>
                            <option value="Google">Google</option>
                            <option value="Referral">Referral</option>
                            <option value="Website">Website</option>
                            <option value="PhoneCall">PhoneCall</option>
                            <option value="Email">Email</option>
                            <option value="Walk-in">Walk-in</option>
                            <option value="Social Media">Social Media</option>
                            <option value="Others">Others</option>
                        </select>
                        <div class="invalid-feedback">Please enter a valid city name.</div>
                    </div>
                </div>
               
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="country" class="form-label">Internal Notes <span class="text-danger">*</span></label>
                        <textarea name="notes" class="form-control" id="notes" cols="30" rows="10"></textarea>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="country" class="form-label">Scope of work requested <span class="text-danger">*</span></label>
                        <input type="text"  id="scope_work" class="form-control" name="scope_work"   required >
                    </div>
                </div>
            </div>

            
            

            <div class="mt-3 d-flex gap-3 mb-4">
                <!-- <button type="submit" class="btn primary-btn">Create Lead</button> -->
                <button type="submit" id="submitBtnappoint" class="primary-btn" > Create
                <span class="spinner-border spinner-border-sm ms-2 d-none" role="status" aria-hidden="true"></span>
            </button>
                <button type="reset" class="btn secondary-btn" onclick="window.location.href='/products'">Cancel</button>
            </div>
        </div>
    </form>
</div>

@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    $(document).ready(function () {
        // Allow only numbers in pincode and mobile fields
        $('#PincodeInput, #mobile').on('input', function () {
            this.value = this.value.replace(/[^0-9]/g, '');
        });

        // jQuery Validation
        $("#contact-form1").validate({
            rules: {
                name: "required",
                email: {
                    required: true,
                    email: true
                },
                mobile: {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 10
                },
                address: "required",
                pincode: {
                    required: true,
                    digits: true,
                    minlength: 6,
                    maxlength: 6
                },
                type_property: "required",
                requirement_type: "required",
                lead_source: "required"
            },
            messages: {
                name: "Please enter your name",
                email: {
                    required: "Please enter your email",
                    email: "Enter a valid email"
                },
                mobile: {
                    required: "Please enter mobile number",
                    digits: "Only numbers allowed",
                    minlength: "Enter 10 digit number",
                    maxlength: "Enter 10 digit number"
                },
                address: "Please enter address",
                pincode: {
                    required: "Please enter pincode",
                    digits: "Only digits allowed",
                    minlength: "Enter 6 digit pincode",
                    maxlength: "Enter 6 digit pincode"
                },
                city: "Please select city",
                state: "Please select state",
                country: "Please enter country"
            },
            submitHandler: function (form) {
                saveLead();
            }
        });

        // Populate cities based on selected state
        var cityStateData = @json($groupedCityStateData);
        $('#state').on('change', function () {
            var selectedState = $(this).val();
            var cities = cityStateData[selectedState] || [];

            $('#city').empty().append('<option value="">Select City</option>');
            $.each(cities, function (index, city) {
                $('#city').append('<option value="' + city + '">' + city + '</option>');
            });
        });

        // Submit lead using Ajax
        function saveLead() {
            let formData = {
                name: $("#name").val(),
                email: $("#email").val(),
                mobile: $("#mobile").val(),
                address: $("#address").val(),
                type_property: $("#type_property").val(),
                requirement_type: $("#requirement_type").val(),
                lead_source: $("#lead_source").val(),
                notes: $("#notes").val(),
                scope_work: $("#scope_work").val(),
                _token: $("input[name='_token']").val()
            };

            $.ajax({
                type: "POST",
                url: "{{ route('leads.store') }}",
                data: formData,
                success: function (response) {
                    toastr.success("Lead saved successfully!");
                    $("#contact-form1")[0].reset();
                },
                error: function (xhr) {
                    $(".error-message").remove();
                    $(".form-control").removeClass("is-invalid");

                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function (field, messages) {
                            let input = $('[name="' + field + '"]');
                            input.addClass('is-invalid');
                            input.after('<div class="error-message text-danger">' + messages[0] + '</div>');
                        });
                    } else {
                        // alert("Something went wrong. Please try again.");
                        toastr.error("Something went wrong. Please try again.");
                    }
                }
            });
        }
    });
</script>
@endsection