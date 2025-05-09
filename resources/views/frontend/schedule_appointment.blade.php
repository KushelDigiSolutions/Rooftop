@extends('frontend.layouts.app')

@section('title', 'Schedule an appointment')
@section('header_img')
<img class="header-img wow animate__animated animate__fadeIn" src="{{ url('frontend/images/franchise-bg.jpg') }}"
    style="width: 100% !important;" alt="">
@endsection
@section('hero')
<div class="page-title-section m-auto wow animate__animated animate__fadeIn">
    <div class="breadcrumbs">
        <a class="text-white" href="/">Home </a>
        <i class="bi bi-arrow-right"></i>
        <a class="text-white" href="/appointments" class="active">Schedule Appointment</a>
    </div>
    <h1 class="text-white NewKansas-medium text-center">Schedule an appointment</h1>
</div>
@endsection
@section('content')
<section class="container wrapper" style="margin-top:124px;">
    <div class="registrationSection">
        <div class="row" id="form-title">
            <div class="col-md-12 wow animate__animated animate__fadeIn">
                <h4 class="NewKansas-medium">At CAB, we understand that when you're choosing, measuring or installing curtains and blinds, having access to a real person can make all the difference. Please write to us, and we will call you.</h4>
                
            </div>
        </div>


        <form action="javascript:" class="mt-4 border-top pt-4" id="contact-form1">
            <p>Fill this form to schedule an appointment</p>
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email ID <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile Number <span class="text-danger">*</span></label>
                        <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile Number" maxlength="10" required>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3 checkPincode">
                        <label for="pincode" class="form-label">Pincode <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="PincodeInput" name="pincode" placeholder="Enter Pincode" maxlength="6" required>
                        <div class="invalid-feedback">Please enter a valid 6 digit pincode</div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="mb-3">
                        <!-- <label for="state" class="form-label">State <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="state" name="state" placeholder="Enter State" required> -->
                        <label for="state" class="form-label">State<span class="requried">*</span></label>
                        <select name="state" id="state" class="form-control">
                            <option value="">Select State</option>
                            @foreach ($groupedCityStateData as $state => $cities)
                            <option value="{{ $state }}">{{ $state }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">Please enter a valid state name.</div>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="mb-3">
                        <label for="city" class="form-label">City<span class="requried">*</span></label>
                        <select name="city" id="city" class="form-control">
                            <option value="">Select City</option>
                            <!-- Cities will be populated dynamically based on the selected state -->
                        </select>
                        <div class="invalid-feedback">Please enter a valid city name.</div>
                    </div>
                </div>
               
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="country" class="form-label">Country <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="country" name="country" placeholder="Enter Country" value="India" required readonly>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3 roof">
                    <span for="agreeToPayment" class="form-label">I Agree to Pay ₹750 for the Appointment</span>
                    <input type="checkbox" id="agreeToPayment" name="agreeToPayment" >
                </div>
            </div>
            <!-- <button type="submit" id="submitBtnappoint" class="primary-btn mt-2">Submit</button> -->
            <!-- <button type="submit" id="submitBtnappoint" class="primary-btn mt-2">
                <span class="btn-text">Submit</span>
                <span class="spinner-border spinner-border-sm ms-2 d-none" role="status" aria-hidden="true"></span>
            </button> -->
            <button type="submit" id="submitBtnappoint" class="primary-btn mt-2" >
                <span class="btn-text">Pay & Submit</span>
                <span class="spinner-border spinner-border-sm ms-2 d-none" role="status" aria-hidden="true"></span>
            </button>
        </form>


        <div id="thankYouMessage1" class="wow animate__animated animate__fadeIn" style="margin-top: 20px; display: none;">
            <h3 class="NewKansas-medium">Thank you for registering with us!</h3>
            <p class="mb-2">We will get back to you shortly.</p>
            <a href="#" id="sendAnother" onclick="resetForm()"
                style="font-family: var(--secondary-font); text-decoration: underline;">Send another response</a>
        </div>
    </div>

</section>


<!--Modal-->
<div class="modal fade" id="books_query" tabindex="-1" aria-labelledby="BookQuery" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
          <div class="row">
            <div class="col-md-11">
                Oops! Seems we are not servicing your area. But wait! we will be coming to you soon
            </div>
            <div class="col-md-1">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    document.getElementById('PincodeInput').addEventListener('input', function(event) {
        // Allow only numeric values: Replace anything that's not a digit
        event.target.value = event.target.value.replace(/[^0-9]/g, '');
    });

    document.getElementById('mobile').addEventListener('input', function(event) {
        const errorMsg = document.getElementById('mobile-error'); // Reference to the error message element
        let input = event.target.value;

        // Allow only digits
        input = input.replace(/[^0-9]/g, '');

        // Limit to 10 digits
        if (input.length > 10) {
            input = input.slice(0, 10);
        }

        // Check if the number starts with 6, 7, 8, or 9
        if (input.length > 0 && !/^[6-9]/.test(input)) {
            errorMsg.textContent = "Mobile number must start with 6, 7, 8, or 9.";
            errorMsg.style.display = "block";
        } else {
            errorMsg.style.display = "none"; // Hide error message if valid
        }

        // Set the sanitized value back to the input
        event.target.value = input;
    });


    $(document).ready(function() {
        var cityStateData = @json($groupedCityStateData);

        // Handle state change
        $('#state').on('change', function() {
            var selectedState = $(this).val();
            var cities = cityStateData[selectedState] || [];

            $('#city').empty();
            $('#city').append('<option value="">Select City</option>');

            $.each(cities, function(index, city) {
                $('#city').append('<option value="' + city+ '">' + city+ '</option>');
            });
        });

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
                city: "required",
                state: "required",
                country: "required",
                agreeToPayment: {
                required: true // Make the checkbox required
            }
            },
            messages: {
                name: "Please enter your name",
                email: {
                    required: "Please enter your email",
                    email: "Please enter a valid email address"
                },
                mobile: {
                    required: "Please enter your mobile number",
                    digits: "Please enter a valid mobile number",
                },
                address: "Please enter your address",
                pincode: {
                    required: "Please enter your pincode",
                    digits: "Please enter a valid 6 digit pincode",
                    minlength: "Please enter a valid 6 digit pincode",
                    maxlength: "Please enter a valid 6 digit pincode"
                },
                city: "Please enter your city",
                state: "Please enter your state",
                country: "Please enter your country",
                agreeToPayment: {
                required: "You must agree to pay ₹750 before submitting." // Custom error message for the checkbox
            }
            },
            submitHandler: function(form) {
                saveData();
            }
        });
    });

    function saveData() {
        const $button = $("#submitBtnappoint");
        const $spinner = $button.find(".spinner-border");
        const $btnText = $button.find(".btn-text");

            // Disable button and show spinner + change text
            $button.prop("disabled", true);
            $btnText.text("Sending...");
            $spinner.removeClass("d-none");

        // $("#submitBtnappoint").prop("disabled", true);
        
        const formData = {
            name: $("#name").val(),
            email: $("#email").val(),
            mobile: $("#mobile").val(),
            address: $("#address").val(),
            pincode: $("#PincodeInput").val(),
            city: $("#city").val(),
            state: $("#state").val(),
            country: $("#country").val(),
            agreeToPayment: $("#agreeToPayment").prop("checked"),
            _token: $("input[name='_token']").val() // CSRF token
        };

        if (!formData.agreeToPayment) {
        $('#agreeToPaymentError').show();  // Show error message if checkbox is not checked
        $button.prop("disabled", false);
        $btnText.text("Pay & Submit");
        $spinner.addClass("d-none");
        return;
    }

    $.ajax({
        type: "POST",
        url: "{{ route('appointment.payment.order') }}",
        data: {
            order_value: 750, // Amount for the appointment
            payment_mode: "online",
            _token: $("input[name='_token']").val()
        },
        success: function(response) {
            if (response.order_id) {
                // Trigger Razorpay Payment Gateway
                var options = {
                    key: 'rzp_test_IX6EFCqGoyCt59', // Your Razorpay Key ID
                    amount: response.amount, // Total amount in paise (750 INR)
                    currency: 'INR',
                    name: 'Appointment Booking',
                    description: 'Appointment Payment',
                    image: 'https://example.com/your-logo.png', // Optional: Your company logo
                    order_id: response.order_id,
                    handler: function (response) {
                        // Payment successful, now store the appointment
                        storeAppointmentData(response);
                    },
                    prefill: {
                        name: formData.name,
                        email: formData.email,
                        contact: formData.mobile
                    },
                    notes: {
                        address: formData.address
                    }
                };

                var rzp1 = new Razorpay(options);
                rzp1.on('payment.failed', function (response) {
                    resetPayButton();
                    alert("Payment failed. Please try again.");
                });
                rzp1.open();
            } else {
                alert("Failed to create order. Please try again.");
                resetPayButton();
                $button.prop("disabled", false);
                $btnText.text("Pay & Submit");
                $spinner.addClass("d-none");
            }
        },
        error: function(xhr, status, error) {
            alert("An unexpected error occurred.");
            resetPayButton();
            $button.prop("disabled", false);
            $btnText.text("Pay & Submit");
            $spinner.addClass("d-none");
        }
    });

    function storeAppointmentData(paymentResponse) {
        $.ajax({
            type: "POST",
            url: "{{ route('appointments.store') }}",
            data: formData,
            success: function(response) {
                console.log(response);
                $("#form-title").hide();
                $("#contact-form1").hide();
                
                if(response.status_check == '0'){
                    $('#books_query').modal('show');
                }else{
                    $('#books_query').hide();
                }
                // Show the thank you message with fadeIn animation
                $("#thankYouMessage1").fadeIn();
                
                // Reset the form
                $("#contact-form1")[0].reset();
                resetPayButton();
            },
            error: function(xhr, status, error) {
                resetPayButton();
                $button.prop("disabled", false);
            $btnText.text("Submit");
            $spinner.addClass("d-none");
                $("#submitBtnappoint").prop("disabled", false).text("Submit");

                // Clear any old error messages
                $(".error-message").remove();
                $(".form-control").removeClass("is-invalid");

                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    let errors = xhr.responseJSON.errors;

                    $.each(errors, function(field, messages) {
                        let input = $('[name="' + field + '"]');

                        input.addClass('is-invalid');

                        // Show the first error message after the input
                        input.after('<div class="error-message text-danger">' + messages[0] + '</div>');
                    });
                } else if (xhr.responseJSON && xhr.responseJSON.message) {
                    // Optional: catch generic message if specific errors are not available
                    alert(xhr.responseJSON.message);
                } else {
                    alert("An unexpected error occurred: " + error);
                }
            }


        });
    }

    function resetPayButton() {
        $button.prop("disabled", false);
        $btnText.text("Pay & Submit");
        $spinner.addClass("d-none");
    }
    
    }
</script>
<!-- <script>
    $(document).ready(function() {
        $('#agreeToPayment').change(function() {
        if ($(this).prop('checked')) {
            $('#submitBtnappoint').prop('disabled', false);
            $('#agreeToPaymentError').hide();  // Hide error message when checkbox is checked
        } else {
            $('#submitBtnappoint').prop('disabled', true);
            $('#agreeToPaymentError').show();  // Show error message when checkbox is not checked
        }
    });
});
</script> -->

@endsection