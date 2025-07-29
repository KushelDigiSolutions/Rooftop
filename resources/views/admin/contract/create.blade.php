@extends('admin.layouts.app')
@section('title', 'Contract Create')
@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<div class="container mt-4" style="max-width: 1000px;">
    <div class="card shadow rounded-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Create Contract</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('contract.preview') }}" method="POST">
                @csrf
                <input type="hidden" name="appointment_id" value="{{ $appointment->id }}">
                <input type="hidden" name="qoutationId" value="{{ $qoutationId }}">

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="customer_name" class="form-label">Customer Name</label>
                        <input type="text" class="form-control rounded-3" name="customer_name" value="{{ $appointment->name ?? '' }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="street" class="form-label">Phone</label>
                        <input type="text" class="form-control rounded-3" name="mobile" value="{{ $appointment->mobile ?? '' }}">
                     </div>
                </div>

                <div class="row mb-3">
                      <div class="col-md-6">
                        <label for="email" class="form-label">Emial</label>
                        <input type="text" class="form-control rounded-3" name="email" value="{{ $appointment->email ?? '' }}">
                    </div>
                      <div class="col-md-6">
                        <label for="city_state_zip" class="form-label">City, State, Zip</label>
                       <input type="text" class="form-control rounded-3" name="city_state_zip"
                        value="{{ ($appointment->city ?? '') . ', ' . ($appointment->state ?? '') . ', ' . ($appointment->pincode ?? '') }}">
                    </div>
                </div>

                <div class="row mb-3">
                     
                     
                </div>

               <div class="row mb-3">
                     <div class="col-md-6">
                        <label for="street" class="form-label">Roof Type</label>
                        <input type="text" class="form-control rounded-3" name="roof_type" value="">
                     </div>
                      <div class="col-md-6">
                        <label for="email" class="form-label">Roof Color</label>
                        <input type="text" class="form-control rounded-3" name="roof_color" value="">
                    </div>
                </div>

                <div class="row mb-3">
                     <div class="col-md-6">
                        <label for="street" class="form-label">Estimated Start Date</label>
                        <input type="text" class="form-control rounded-3" name="est_start" value="">
                     </div>
                      <div class="col-md-6">
                        <label for="email" class="form-label">Estimated Completion Time</label>
                        <input type="text" class="form-control rounded-3" name="est_end" value="">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="scope_of_work" class="form-label">Scope of Work</label>
                    <textarea class="form-control rounded-3" name="scope_of_work" id="scope_of_work" rows="5" >{{ old('scope_of_work') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="notes" class="form-label">Notes</label>
                    <textarea class="form-control rounded-3" id="notes" name="notes" rows="3">{{ old('notes') }}</textarea>
                </div>

                <div class="row mb-3">
                    {{-- <div class="col-md-4">
                        <label for="est_start" class="form-label">Est Start</label>
                        <input type="text" class="form-control rounded-3" name="est_start" >
                    </div>
                    <div class="col-md-4">
                        <label for="est_end" class="form-label">Est End</label>
                        <input type="text" class="form-control rounded-3" name="est_end">
                    </div> --}}
                   <div class="col-md-4">
                    <label for="price" class="form-label">Contract Price ($)</label>
                    <input type="number" step="0.01" class="form-control rounded-3" name="price">
                </div>
                </div>

                

                <h5 class="mt-4">Payment Schedule</h5>
                <div id="paymentScheduleContainer"></div>
                <button type="button" class="btn btn-primary mt-2" onclick="addPaymentSchedule()">Add More</button>
				

                <div class="text-end">
                    <button type="submit" class="btn btn-info rounded-3 px-4">Preview Contract</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr("#contract_date", {
        dateFormat: "m-d-Y"
    });
    flatpickr("#payment_schedule_1_date", {
        dateFormat: "m-d-Y"
    });
    flatpickr("#payment_schedule_2_date", {
        dateFormat: "m-d-Y"
    });

    flatpickr(".payment-date", {
        dateFormat: "m-d-y", // MM-DD-YY
    });
</script>

<!-- Include CKEditor for Scope of Work -->
<script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>

<script>
        ClassicEditor
            .create(document.querySelector('#scope_of_work'),{
            removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption', 'ImageStyle', 'ImageToolbar', 'ImageUpload', 'MediaEmbed'],
        })
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>

<script>
        ClassicEditor
            .create(document.querySelector('#notes'),{
            removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption', 'ImageStyle', 'ImageToolbar', 'ImageUpload', 'MediaEmbed'],
        })
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>

<script>
    const canvas = document.getElementById("signatureCanvas");
    const signaturePad = new SignaturePad(canvas);

    function clearSignature() {
        signaturePad.clear();
    }

    // Before form submit, save the base64 signature to the hidden field
    document.querySelector("form").addEventListener("submit", function (e) {
        if (!signaturePad.isEmpty()) {
            document.getElementById("signatureData").value = signaturePad.toDataURL();
        } else {
            alert("Please provide a signature.");
            e.preventDefault();
        }
    });
</script>
<script>
let paymentIndex = 0;

function getOrdinalSuffix(i) {
    const j = i % 10,
          k = i % 100;
    if (j === 1 && k !== 11) return i + "st";
    if (j === 2 && k !== 12) return i + "nd";
    if (j === 3 && k !== 13) return i + "rd";
    return i + "th";
}

function renderPaymentSchedules() {
    const container = document.getElementById('paymentScheduleContainer');
    container.innerHTML = '';

    paymentSchedules.forEach((schedule, index) => {
        const count = getOrdinalSuffix(index + 1);
        // container.innerHTML += `
        //     <div class="row mb-3 paymentRow" data-index="${index}">
        //         <div class="col-md-6">
        //             <label class="form-label">${count} Payment Date</label>
        //             <input type="text" class="form-control rounded-3 payment-date" name="payment_schedule_${index + 1}_date">
        //         </div>
        //         <div class="col-md-5">
        //             <label class="form-label">${count} Payment Amount ($)</label>
        //             <input type="text" class="form-control rounded-3" name="payment_schedule_${index + 1}_amount">
        //         </div>
        //         <div class="col-md-1 d-flex align-items-end">
        //             ${paymentSchedules.length > 1 ? `<button type="button" class="btn btn-danger btn-sm" onclick="removePaymentSchedule(${index})">Remove</button>` : ''}
        //         </div>
        //     </div>
        // `;
        container.innerHTML += `
            <div class="row mb-3 paymentRow" data-index="${index}">
                <div class="col-md-6">
                    <label class="form-label">${count} Payment Date</label>
                    <input type="text" class="form-control rounded-3 payment-date" name="installments[${index}][due_date]" value="${schedule.due_date || ''}">
                </div>
                <div class="col-md-5">
                    <label class="form-label">${count} Payment Amount ($)</label>
                    <input type="text" class="form-control rounded-3" name="installments[${index}][amount]" value="${schedule.amount || ''}">
                </div>
                <div class="col-md-1 d-flex align-items-end">
                    ${paymentSchedules.length > 1 ? `<button type="button" class="btn btn-danger btn-sm" onclick="removePaymentSchedule(${index})">Remove</button>` : ''}
                </div>
            </div>
        `;
    });

    // ✅ Re-initialize flatpickr for all new .payment-date fields
    flatpickr(".payment-date", {
        dateFormat: "m-d-y" // MM-DD-YY
    });
}


let paymentSchedules = [{}]; // start with one

function addPaymentSchedule() {
    paymentSchedules.push({});
    renderPaymentSchedules();
}

function removePaymentSchedule(index) {
    paymentSchedules.splice(index, 1);
    renderPaymentSchedules();
}

// Initial render
renderPaymentSchedules();
</script>
@endsection
