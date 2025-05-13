@extends('admin.layouts.app')

@section('title', 'Product List')

@section('content')
<style>
    .circular-img {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    object-fit: cover;
}
</style>
<div class="dataOverviewSection mt-3">
    <div class="section-title">
        <h6 class="fw-bold m-0">All Product <span class="fw-normal text-muted"></span></h6> 
        {{-- ({{ $totalProducts }}) --}}
        <a href="{{ route('products.create') }}" class="primary-btn addBtn">+ Add Product</a>
    </div>
    <div class="dataOverview mt-3">
        <div class="d-flex align-items-center justify-content-end mb-3">
            <a class="secondary-btn me-2 addBtn" href="{{ url('products/download/csv') }}">
                <i class="bi bi-cloud-arrow-down me-2"></i> Export Data
            </a>
            <a class="secondary-btn addBtn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                <i class="bi bi-filter me-2"></i> Filter
            </a>
        </div>
        <div class="table-responsive">
            <table class="table" id="projectsTable">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Image</th>
                        {{-- <th>Tally Code</th> --}}
                        <!-- <th>SKU</th> -->
                        <th>Price</th>
                        <th>Unit</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="w-10">
                            @if($product->image)
                                <a href="{{ url('images/products/' . $product->image) }}" data-fancybox data-caption="{{ $product->tally_code }}">
                                    <img class="tabelImage circular-img" src="{{ url('images/products/' . $product->image) }}" alt="{{ $product->image_alt }}"   width="50" height="50"/>
                                </a>
                            @else
                                <span>No Image</span>
                            @endif
                        </td>
                        {{-- <td>{{ $product->tally_code ?? '-' }}</td> --}}
                        <!-- <td>{{ $product->design_sku ?? '-' }}</td> -->
                        <td>{{ $product->mrp ?? '-' }}</td>
                        <td>{{ $product->unit ?? '-' }}</td>
                        <td>
                            <div class="dropdown">
                                <i class="bi bi-three-dots-vertical" type="button" data-bs-toggle="dropdown" aria-expanded="false"></i>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item small" href="{{ route('products.edit', $product->id) }}">Edit</a></li>
                                    <li>
                                        <a class="dropdown-item small viewProductLink" data-bs-toggle="offcanvas" href="#ProductView" role="button" 
                                           aria-controls="ProductView" data-product-id="{{ $product->id }}">View</a>
                                    </li>
                                    <li><a class="dropdown-item small" href="javascript:void(0)" onclick="openDeleteModal('{{ $product->id }}')">Delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">No products found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Product View Offcanvas -->
<div class="offcanvas ProductViewSidebar offcanvas-start" tabindex="-1" id="ProductView" aria-labelledby="ProductViewLabel">
    <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title fw-bold" id="ProductViewLabel">Product Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <tbody>
                    <tr><th>Type</th><td id="product-type">-</td></tr>
                    <tr><th>Code</th><td id="product-code">-</td></tr>
                    <tr><th>File Number</th><td id="file-number">-</td></tr>
                    {{-- <tr><th>Supplier Name</th><td id="supplier-name">-</td></tr>
                    <tr><th>Supplier Collection</th><td id="supplier-collection">-</td></tr>
                    <tr><th>Supplier Collection Design</th><td id="supplier-design">-</td></tr> --}}
                    <tr><th>Color Number</th><td id="design-sku">-</td></tr>
                    <tr><th>Width</th><td id="width">-</td></tr>
                    <tr><th>Rubs Martendale</th><td id="rubs-martendale">-</td></tr>
                    <tr><th>Usage</th><td id="usage">-</td></tr>
                    <tr><th>Type (Technical specs)</th><td id="type">-</td></tr>
                    <tr><th>Design Type</th><td id="design-type">-</td></tr>
                    <tr><th>Color</th><td id="colour">-</td></tr>
                    <tr><th>Composition</th><td id="composition">-</td></tr>
                    <tr><th>Note</th><td id="note">-</td></tr>
                    <tr><th>Image Gallery</th><td id="image-gallery">-</td></tr>
                    <tr><th>Created At</th><td id="created-at">-</td></tr>
                    <tr><th>Updated At</th><td id="updated-at">-</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Filter Sidebar -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header border-bottom">
        <h6 class="offcanvas-title" id="FilterSidebarLabel">Add Filters</h6>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <form id="filter_form" action="{{ url('products') }}" method="get">
        <div class="offcanvas-body">
            <div class="mb-2 w-100">
                <label class="form-label m-0 mb-1">Type</label>
                <select class="form-select w-100" id="type" name="type">
                    <option value="">Select</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->type }}" {{ request()->get('type') === $type->type ? 'selected' : '' }}>
                            {{ $type->type }}
                        </option>
                    @endforeach
                </select>
            </div>
            <!-- Similar structure for other filter fields -->
            <div class="mb-2 w-100">
                <label class="form-label m-0 mb-1">Supplier Name</label>
                <select name="supplier_name" id="supplier_name" class="form-select w-100">
                    <option value="">Select</option>
                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}" {{ request()->get('supplier_name') == $supplier->id ? 'selected' : '' }}>
                            {{ $supplier->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <!-- Add remaining filter fields similarly -->
        </div>
        <div class="offcanvas-footer">
            <div class="d-flex justify-content-start p-3 border-top">
                <button type="button" class="secondary-btn me-2 addBtn" onclick="clearForm()" data-bs-dismiss="offcanvas">Clear</button>
                <button type="submit" class="primary-btn addBtn">Apply</button>
            </div>
        </div>
    </form>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="deleteUserForm" method="POST" action="" autocomplete="off">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteUserModalLabel">Delete Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this product?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="secondary-btn" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="primary-btn">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    function clearForm() {
        document.getElementById("filter_form").reset();
        $('#supplier_collection').html('<option value="">Select</option>');
        $('#supplier_collection_design').html('<option value="">Select</option>');
    }

    document.getElementById("filter_form").addEventListener("submit", function(event) {
        event.preventDefault();
        const form = new FormData(this);
        const params = new URLSearchParams();
        form.forEach((value, key) => {
            if (value && value !== '') {
                params.append(key, value);
            }
        });
        window.location.href = `{{ url('products') }}?${params.toString()}`;
    });

    function openDeleteModal(productId) {
        const form = document.getElementById('deleteUserForm');
        form.action = "{{ route('products.destroy', ['product' => ':productId']) }}".replace(':productId', productId);
        new bootstrap.Modal(document.getElementById('deleteUserModal')).show();
    }

    $(document).ready(function() {
        // Use event delegation for .viewProductLink
        $(document).on('click', '.viewProductLink', function() {
            var productId = $(this).data('product-id');
            console.log(productId);
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: '{{ route("product.details", ":id") }}'.replace(':id', productId),
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (!response || !response.product) {
                        $('#ProductViewLabel').text('Product Not Found');
                        $('#image-gallery').html('<p>No product data available</p>');
                        alert('Product details not found in response.');
                        return;
                    }

                    var product = response.product;
                    console.log(product);
                    var p_composition, p_usage, p_type, p_design_type;
                    try {
                        p_composition = product.composition ? JSON.parse(product.composition).join(', ') : '-';
                        p_usage = product.usage ? JSON.parse(product.usage).join(', ') : '-';
                        p_type = product.type ? JSON.parse(product.type).join(', ') : '-';
                        p_design_type = product.design_type ? JSON.parse(product.design_type).join(', ') : '-';
                    } catch (e) {
                        console.error('JSON parsing error:', e);
                        p_composition = p_usage = p_type = p_design_type = 'Error parsing data';
                    }

                    var pcreatedAt = '-', pupdatedAt = '-';
                    if (product.created_at) {
                        try {
                            pcreatedAt = new Date(product.created_at).toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' });
                        } catch (e) {}
                    }
                    if (product.updated_at) {
                        try {
                            pupdatedAt = new Date(product.updated_at).toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' });
                        } catch (e) {}
                    }

                    $('#ProductViewLabel').text(product.tally_code || 'Product Details');
                    $('#product-type').text(product.product_type?.product_type || '-');
                    $('#product-code').text(product.tally_code || '-');
                    $('#file-number').text(product.file_number || '-');
                    $('#supplier-name').text(product.supplier?.name || '-');
                    $('#supplier-collection').text(product.supplier_collection?.collection_name || '-');
                    $('#supplier-design').text(product.supplier_collection_design?.design_name || '-');
                    $('#design-sku').text(product.design_sku || '-');
                    $('#width').text(product.width || '-').closest('tr')[product.width ? 'show' : 'hide']();
                    $('#rubs-martendale').text(product.rubs_martendale || '-').closest('tr')[product.rubs_martendale ? 'show' : 'hide']();
                    $('#usage').text(p_usage);
                    $('#type').text(p_type);
                    $('#design-type').text(p_design_type);
                    $('#colour').text(product.colour || '-');
                    $('#composition').text(p_composition);
                    $('#note').text(product.note || '-');
                    $('#created-at').text(pcreatedAt);
                    $('#updated-at').text(pupdatedAt);

                    if (product.image) {
                        $('#image-gallery').html(`
                            <a href="${'/images/products/' + product.image}" data-fancybox data-caption="${product.tally_code || 'Product Image'}">
                                <img class="tableImage" src="${'/images/products/' + product.image}" alt="${product.image_alt || 'Product Image'}" style="max-width: 150px; height: auto;">
                            </a>
                        `);
                    } else {
                        $('#image-gallery').html('<p>No image available</p>');
                    }
                },
                error: function(xhr) {
                    $('#ProductViewLabel').text('Error Loading Product');
                    $('#image-gallery').html('<p>Error loading product details</p>');
                    alert('Error loading product details: ' + (xhr.responseText || 'Unknown error'));
                }
            });
        });

        // Filter dropdown dependencies
        const supplierId = '{{ request()->get('supplier_name') }}';
        const collectionId = '{{ request()->get('supplier_collection') }}';
        const designId = '{{ request()->get('supplier_collection_design') }}';

        if (supplierId && supplierId !== 'Select') {
            $('#supplier_name').val(supplierId).trigger('change');
        }

        $('#supplier_name').change(function() {
            const supplierId = $(this).val();
            $('#supplier_collection').empty().append('<option value="">Select</option>');
            $('#supplier_collection_design').empty().append('<option value="">Select</option>');

            if (supplierId) {
                $.ajax({
                    url: `/supplier-collection/${supplierId}`,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        data.forEach(item => {
                            $('#supplier_collection').append(`<option value="${item.id}" ${item.id == collectionId ? 'selected' : ''}>${item.collection_name}</option>`);
                        });
                        if (collectionId) $('#supplier_collection').trigger('change');
                    }
                });
            }
        });

        $('#supplier_collection').change(function() {
            const collectionId = $(this).val();
            const supplierId = $('#supplier_name').val();
            $('#supplier_collection_design').empty().append('<option value="">Select</option>');

            if (collectionId && supplierId) {
                $.ajax({
                    url: `/supplier-collection-designs/${supplierId}/${collectionId}`,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        data.forEach(item => {
                            $('#supplier_collection_design').append(`<option value="${item.id}" ${item.id == designId ? 'selected' : ''}>${item.design_name}</option>`);
                        });
                    }
                });
            }
        });
    });
</script>
@endsection