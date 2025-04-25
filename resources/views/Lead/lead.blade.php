@extends('admin.layouts.app')

@section('title', 'Lead List')

@section('content')

<div class="dataOverviewSection mt-3">
    <div class="section-title">
        <h6 class="fw-bold m-0">All Leads <span class="fw-normal text-muted">({{ $totalLeads }})</span></h6>
        <button class="btn text-white shadow-sm" id="createLeadBtn" data-bs-toggle="modal" data-bs-target="#createLeadModal" style="background-color: #052c65">
            <i class="fas fa-plus fa-sm text-white-50"></i> Create Lead
        </button>
    </div>
    <div class="dataOverview mt-3">
        <div class="table-responsive">
            <table class="table" id="projectsTable">
                <thead>
                    <tr>
                        <th>SR.</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Source</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($leads as $lead)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $lead->full_name }}</td>
                            <td>{{ $lead->email }}</td>
                            <td>{{ $lead->phone }}</td>
                            <td>
                                @if($lead->status == 'pending')
                                    <span class="badge badge-pending">Pending</span>
                                @elseif($lead->status == 'rejected')
                                    <span class="badge bg-danger">Rejected</span>
                                @elseif($lead->status == 'completed')
                                    <span class="badge bg-success">Completed</span>
                                @else
                                    <span class="badge bg-secondary">Unknown</span>
                                @endif
                            </td>
                            <td>{{ $lead->source }}</td>
                            <td class="text-center position-relative"> 
                                <div class="dropdown">
                                    <i class="bi bi-three-dots-vertical" type="button" data-bs-toggle="dropdown"
                                        aria-expanded="false"></i>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item small text-dark"
                                                href="{{ route('leadEdit', $lead->id) }}"><i class="fas fa-pen me-2 text-primary"></i> Edit</a></li>
                                        <li>
                                            <a href="javascript:void(0);" 
                                               class="dropdown-item small text-danger delete-lead" 
                                               data-id="{{ $lead->id }}">
                                                <i class="fas fa-trash me-2"></i> Delete 
                                            </a>
                                        </li>
                                        @if(!$lead->is_converted)
                                            <li>
                                                <form action="{{ route('leads.convert', $lead->id) }}" method="POST" class="d-block">
                                                    @csrf
                                                    <button type="submit" class="dropdown-item small ttext-success text-start">
                                                        <i class="fas fa-user-plus me-2 text-success"></i>   Add to Customer
                                                    </button>
                                                </form>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Create Lead Modal -->
<div class="modal fade" id="createLeadModal" tabindex="-1" aria-labelledby="createLeadModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create New Lead</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('leadcreate') }}" method="post" id="leadForm">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="full_name">Full Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="full_name" name="full_name">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="phone">Phone</label>
                            <input type="tel" class="form-control" id="phone" name="phone">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="source">Source</label>
                            <select class="form-control" id="source" name="source">
                                <option value="">Select Source</option>
                                <option value="Website">Website</option>
                                <option value="Referral">Referral</option>
                                <option value="Social Media">Social Media</option>
                                <option value="Advertisement">Advertisement</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="address">Address</label>
                            <textarea class="form-control" id="address" name="address" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end border-top pt-3">
                        <button type="reset" class="btn btn-secondary me-2">Reset</button>
                        <button type="submit" class="btn text-white" style="background-color: #052c65">Create Lead</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Form (Hidden) -->
<form id="deleteForm" method="POST" action="">
    @csrf
    @method('DELETE')
</form>

@endsection

@section('script')
<!-- SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function () {

        // DELETE Lead with SweetAlert
        $('.delete-lead').click(function (e) {
            e.preventDefault();
            var leadId = $(this).data('id');
            var deleteUrl = "{{ route('leadDelete', ':id') }}".replace(':id', leadId);

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: deleteUrl,
                        type: 'POST',
                        data: {
                            _token: "{{ csrf_token() }}",
                            _method: 'DELETE'
                        },
                        success: function (response) {
                            Swal.fire(
                                'Deleted!',
                                'The lead has been deleted.',
                                'success'
                            ).then(() => {
                                location.reload();
                            });
                        },
                        error: function (xhr) {
                            Swal.fire(
                                'Error!',
                                xhr.responseJSON?.message || 'Something went wrong while deleting.',
                                'error'
                            );
                        }
                    });
                }
            });
        });

        // CREATE Lead with AJAX
        $('#leadForm').on('submit', function (e) {
            e.preventDefault();

            $.ajax({
                url: $(this).attr('action'),
                method: 'POST',
                data: $(this).serialize(),
                success: function (response) {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message || 'Lead created successfully.',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        $('#createLeadModal').modal('hide');
                        location.reload();
                    });
                },
                error: function (xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        let errorMessages = '';
                        for (let field in errors) {
                            if (errors.hasOwnProperty(field)) {
                                errorMessages += `• ${errors[field][0]}\n`;
                            }
                        }

                        Swal.fire({
                            title: 'Validation Error!',
                            text: errorMessages,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });

                    } else {
                        Swal.fire(
                            'Error!',
                            xhr.responseJSON?.message || 'Something went wrong while creating lead.',
                            'error'
                        );
                    }
                }
            });
        });

        // SUCCESS flash session alert
        @if(session('success'))
            Swal.fire({
                title: 'Success!',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonText: 'OK'
            });
        @endif
    });
</script>


{{-- <script>
    $(document).ready(function() {
        $('.delete-lead').click(function(e) {
            e.preventDefault();

            var leadId = $(this).data('id');
            var deleteUrl = "{{ route('leadDelete', ':id') }}".replace(':id', leadId);

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        url: deleteUrl,
                        type: 'POST',
                        data: {
                            _token: "{{ csrf_token() }}",
                            _method: 'DELETE'
                        },
                        success: function(response) {
                            Swal.fire(
                                'Deleted!',
                                'The lead has been deleted.',
                                'success'
                            ).then(() => {
                                location.reload();
                            });
                        },
                        error: function(xhr) {
                            Swal.fire(
                                'Error!',
                                'Something went wrong while deleting.',
                                'error'
                            );
                        }
                    });
                }
            });
        });

        // Remove the double success message
        @if(session('success'))
            Swal.fire({
                title: 'Success!',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonText: 'OK'
            });
        @endif
    });
</script> --}}


@endsection