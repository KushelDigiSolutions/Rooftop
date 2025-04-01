@extends('admin.layouts.app')

@section('title', 'Add before work ')

@section('content')
<div class="dataOverviewSection mt-3 mb-3">
    <form action="{{-- route('work_before.store') --}}" method="POST" enctype="multipart/form-data" class="mt-3" id="productForm">
        @csrf
        <div class="dataOverview mt-3">
            <h6 class="m-0">Add New Before work </h6>
            <hr class="m-0 mt-2 mb-2">
           
            <!-- Image Upload -->
            <div class="mb-2 w-100 d-flex justify-content-start">
                <img src="{{ asset('admin/images/image.jpg') }}" class="rounded" id="imagePreview" alt="" width="140"
                    height="140">
                <div class="w-100 ms-3">
                    <div>
                        <label for="image" class="form-label mb-1">Image <span class="text-danger">*</span></label>
                        <input type="file" class="form-control w-100" id="image" name="image" onchange="previewImage(event)"
                            required>
                    </div>
                    <div>
                        <label for="image_alt" class="form-label mb-1">Image Alt <span class="text-danger">*</span></label>
                        <input type="text" class="form-control w-100" id="image_alt" name="image_alt" required>
                    </div>
                </div>
            </div>
           

            
           
            <hr class="m-0 mt-4 mb-2">


        

            <div class="mt-3 d-flex gap-3 mb-4">
                <button type="submit" class="btn primary-btn">Create before work </button>
                <button type="reset" class="btn secondary-btn">Cancel</button>
            </div>
        </div>
    </form>
</div>

@endsection

@section('script')

<script>
    // Image Preview
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('imagePreview');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Handle dropdown filtering
        document.querySelectorAll('.search-input').forEach(input => {
            input.addEventListener('keyup', function() {
                const filter = this.value.toLowerCase();
                const options = this.closest('.dropdown-menu').querySelectorAll('.options-list .dropdown-item');

                options.forEach(option => {
                    const text = option.textContent || option.innerText;
                    option.style.display = text.toLowerCase().includes(filter) ? '' : 'none';
                });
            });
        });

        // Update dropdown button text
        document.querySelectorAll('.dropdown-menu .dropdown-item').forEach(item => {
            item.addEventListener('click', function() {
                const button = this.closest('.dropdown').querySelector('.dropdown-toggle');
                button.textContent = this.textContent;
            });
        });

        // jQuery Form Validation
        $(document).ready(function() {
            $('#product_name').change(function() {

                var selectedProductId = $(this).val();

                var selectedOption = $('#product_name option[value="' + selectedProductId + '"]');
                var productUnit = selectedOption.data('unit');

                if (typeof productUnit === 'string') {
                    productUnit = productUnit.split(',');
                } else {
                    productUnit = []; 
                }
                var unitSelect = $('#unit');
                unitSelect.empty();
                let options = '<option value="" selected>Select</option>';
                productUnit.forEach(function(unit) {
                    options += '<option value="' + unit + '">' + unit + '</option>';
                });

                unitSelect.append(options);
            });


            
            $('#productForm').validate({
                rules: {
                    type: {
                        required: true
                    },
                    file_number: {
                        required: true
                    },
                    supplier_name: {
                        required: true
                    },
                    image: {
                        required: true
                    },
                    image_alt: {
                        required: true
                    }
                },
                messages: {
                    type: {
                        required: "Please select a type."
                    },
                    file_number: {
                        required: "Please enter the file number."
                    },
                    supplier_name: {
                        required: "Please select a supplier."
                    },
                    image: {
                        required: "Please upload an image."
                    },
                    image_alt: {
                        required: "Please enter an image alt text."
                    }
                },
                errorElement: "div",
                errorPlacement: function(error, element) {
                    error.addClass("form-text text-danger xsmall");
                    error.insertAfter(element);
                },
                highlight: function(element) {
                    $(element).addClass("is-invalid").removeClass("is-valid");
                },
                unhighlight: function(element) {
                    $(element).removeClass("is-invalid").addClass("is-valid");
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });

        // Supplier Name Change Handler
        $('#supplier_name').change(function() {
            const supplierId = $(this).val();

            // Clear dependent dropdowns
            $('#supplier_collection').empty().append('<option value="">Select Supplier Collection</option>');
            $('#supplier_collection_design').empty().append('<option value="">Select Supplier Collection Design</option>');

            if (supplierId) {
                // Fetch Supplier Collections
                $.ajax({
                    url: `/supplier-collection/${supplierId}`,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        if (data.length === 0) {
                            $('#supplier_collection').append('<option value="" disabled>No Data Found</option>');
                        } else {
                            data.forEach(item => {
                                $('#supplier_collection').append(`<option value="${item.id}">${item.collection_name}</option>`);
                            });
                        }
                    },
                    error: function() {
                        alert('Error retrieving collections');
                    }
                });
            }
        });

        // Supplier Collection Change Handler
        $('#supplier_collection').change(function() {
            const collectionId = $(this).val();
            const supplierId = $('#supplier_name').val();

            // Clear dependent dropdown
            $('#supplier_collection_design').empty().append('<option value="">Select Supplier Collection Design</option>');

            if (collectionId && supplierId) {
                // Fetch Supplier Collection Designs
                $.ajax({
                    url: `/supplier-collection-designs/${supplierId}/${collectionId}`,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        if (data.length === 0) {
                            $('#supplier_collection_design').append('<option value="" disabled>No Data Found</option>');
                        } else {
                            data.forEach(item => {
                                $('#supplier_collection_design').append(`<option value="${item.id}">${item.design_name}</option>`);
                            });
                        }
                    },
                    error: function() {
                        alert('Error retrieving designs');
                    }
                });
            }
        });
    });

    // Function to calculate MRP dynamically
    function calculateMRP() {
        // Get the input values
        var supplierPrice = parseFloat(document.getElementById("supplierPriceInput").value) || 0;
        var freight = parseFloat(document.getElementById("freightInput").value) || 0;
        var profitPercentage = parseFloat(document.getElementById("profitInput").value) || 0;
        var gstPercentage = parseFloat(document.getElementById("gstInput").value) || 0;

        // Validate inputs
        if (supplierPrice <= 0 || freight < 0 || profitPercentage < 0 || gstPercentage < 0) {
            document.getElementById("mrpInput").value = "";
            return; // Return early if any value is invalid
        }
        // Calculate CPF (Cost Plus Freight)
        var cpf = supplierPrice + freight;
        var profit = cpf * (profitPercentage / 100);
        var mrpBeforeGST = cpf + profit;
        // var gstAmount = mrpBeforeGST * (gstPercentage / 100);
        // var finalMRP = mrpBeforeGST + gstAmount;
        finalMRP = Math.round(mrpBeforeGST);
        document.getElementById("mrpInput").value = finalMRP;
    }

    // Attach event listeners to inputs to trigger MRP calculation
    document.getElementById("supplierPriceInput").addEventListener("input", calculateMRP);
    document.getElementById("freightInput").addEventListener("input", calculateMRP);
    document.getElementById("profitInput").addEventListener("input", calculateMRP);
    document.getElementById("gstInput").addEventListener("input", calculateMRP);

    // Initialize the calculation on page load
    window.onload = calculateMRP;
</script>

@endsection