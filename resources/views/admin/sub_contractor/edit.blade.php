@extends('admin.layouts.app')
@section('title', 'Edit Sub Contractor')

@section('content')
<div class="dataOverviewSection mt-3 mb-3">
    <form method="POST" enctype="multipart/form-data" class="mt-4" id="edit-form">
        @csrf
        <input type="hidden" name="id" value="{{ $subcontractor->id }}">

        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="company_name" class="form-label">Company Name<span class="requried">*</span></label>
                <input type="text" class="form-control" name="company_name" value="{{ $subcontractor->company_name }}">
                <span class="text-danger error-company_name"></span>
            </div>
            <div class="col-md-4 mb-3">
                <label for="contact_person" class="form-label">Contact Person<span class="requried">*</span></label>
                <input type="text" class="form-control" name="contact_person" value="{{ $subcontractor->contact_person }}">
                <span class="text-danger error-contact_person"></span>
            </div>
            <div class="col-md-4 mb-3">
                <label for="phone" class="form-label">Phone<span class="requried">*</span></label>
                <input type="text" class="form-control" name="phone" value="{{ $subcontractor->phone }}">
                <span class="text-danger error-phone"></span>
            </div>
            <div class="col-md-4 mb-3">
                <label for="email" class="form-label">Email<span class="requried">*</span></label>
                <input type="email" class="form-control" name="email" value="{{ $subcontractor->email }}">
                <span class="text-danger error-email"></span>
            </div>
            <div class="col-md-4 mb-3">
                <label for="office_address" class="form-label">Office Address<span class="requried">*</span></label>
                <textarea class="form-control" name="office_address">{{ $subcontractor->office_address }}</textarea>
                <span class="text-danger error-office_address"></span>
            </div>
            <div class="col-md-4 mb-3">
                <label for="city" class="form-label">City<span class="requried">*</span></label>
                <input type="text" class="form-control" name="city" value="{{ $subcontractor->city }}">
                <span class="text-danger error-city"></span>
            </div>
            <div class="col-md-4 mb-3">
                <label for="state" class="form-label">State<span class="requried">*</span></label>
                <input type="text" class="form-control" name="state" value="{{ $subcontractor->state }}">
                <span class="text-danger error-state"></span>
            </div>
            <div class="col-md-4 mb-3">
                <label for="zip_code" class="form-label">Zip Code<span class="requried">*</span></label>
                <input type="text" class="form-control" name="zip_code" maxlength="6" value="{{ $subcontractor->zip_code }}">
                <span class="text-danger error-zip_code"></span>
            </div>
            <div class="col-md-4 mb-3">
                <label for="specialization" class="form-label">Specialization<span class="requried">*</span></label>
                <input type="text" class="form-control" name="specialization" value="{{ $subcontractor->specialization }}">
                <span class="text-danger error-specialization"></span>
            </div>
            <div class="col-md-4 mb-3">
                <label for="license_number" class="form-label">License Number</label>
                <input type="text" class="form-control" name="license_number" value="{{ $subcontractor->license_number }}">
                <span class="text-danger error-license_number"></span>
            </div>
            <div class="col-md-4 mb-3">
                <label for="insurance_certificate" class="form-label">Insurance Certificate</label>
                <input type="file" class="form-control" name="insurance_certificate">
                @if($subcontractor->insurance_certificate)
                    <a href="{{ asset('uploads/insurance/' . $subcontractor->insurance_certificate) }}" target="_blank">View Current File</a>
                @endif
                <span class="text-danger error-insurance_certificate"></span>
            </div>
            <div class="col-md-4 mb-3">
                <label for="experience_years" class="form-label">Years of Experience<span class="requried">*</span></label>
                <input type="number" class="form-control" name="experience_years" min="0" value="{{ $subcontractor->experience_years }}">
                <span class="text-danger error-experience_years"></span>
            </div>
            <div class="col-md-4 mb-3">
                <label for="service_area" class="form-label">Service Area</label>
                <input type="text" class="form-control" name="service_area" value="{{ $subcontractor->service_area }}">
                <span class="text-danger error-service_area"></span>
            </div>
            <div class="col-md-4 mb-3">
                <label for="availability_status" class="form-label">Availability<span class="requried">*</span></label>
                <select class="form-select" name="availability_status">
                    <option value="">-- Select --</option>
                    <option value="Active" {{ $subcontractor->availability_status == 'Active' ? 'selected' : '' }}>Active</option>
                    <option value="Inactive" {{ $subcontractor->availability_status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
                <span class="text-danger error-availability_status"></span>
            </div>
            <div class="col-md-4 mb-3">
                <label for="payment_method" class="form-label">Payment Method<span class="requried">*</span></label>
                <select class="form-select" name="payment_method">
                    <option value="">-- Select --</option>
                    <option value="Bank Transfer" {{ $subcontractor->payment_method == 'Bank Transfer' ? 'selected' : '' }}>Bank Transfer</option>
                    <option value="Cheque" {{ $subcontractor->payment_method == 'Check' ? 'selected' : '' }}>Cheque</option>
                    <option value="Online Payment" {{ $subcontractor->payment_method == 'Online Payment' ? 'selected' : '' }}>Online Payment</option>
                </select>
                <span class="text-danger error-payment_method"></span>
            </div>
            <div class="col-md-4 mb-3">
                <label for="contract_signed" class="form-label">Contract Signed?<span class="requried">*</span></label>
                <select class="form-select" name="contract_signed">
                    <option value="">-- Select --</option>
                    <option value="Yes" {{ $subcontractor->contract_signed == 'Yes' ? 'selected' : '' }}>Yes</option>
                    <option value="No" {{ $subcontractor->contract_signed == 'No' ? 'selected' : '' }}>No</option>
                </select>
                <span class="text-danger error-contract_signed"></span>
            </div>
        </div>

        <div class="mt-3 d-flex gap-3 mb-4">
            <button type="submit" class="btn btn-primary" id="submitBtn">
                Update
                <span class="spinner-border spinner-border-sm ms-2 d-none" role="status"></span>
            </button>
            <button type="button" class="btn btn-secondary" onclick="window.location.href='/sub_contractor'">Cancel</button>
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

        $('#edit-form').on('submit', function (e) {
            e.preventDefault();
            $('#submitBtn .spinner-border').removeClass('d-none');

            let id = $('input[name=id]').val();
            let formData = new FormData(this);

            $.ajax({
                url: `/subcontractors/${id}/update`,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function () {
                    $('#submitBtn .spinner-border').addClass('d-none');
                    toastr.success('Sub Contractor updated successfully!');
                    setTimeout(function () {
                        window.location.href = "/sub_contractor";
                    }, 1500);
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
