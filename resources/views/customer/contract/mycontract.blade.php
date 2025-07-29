@extends('admin.layouts.app')

@section('title', 'Customert Contract List')

@section('content')
<div class="dataOverviewSection mt-3">
    <div class="section-title">
        <h6 class="fw-bold m-0">All Contract <span class="fw-normal text-muted"></span></h6>
        
    </div>

    <div class="dataOverview mt-3">
        <div>
            {{-- <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-pending-tab" data-bs-toggle="pill" data-bs-target="#pills-pending" type="button" role="tab" aria-controls="pills-pending" aria-selected="false">Hold <span class="fw-normal small"></span></button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link " id="pills-complete-tab" data-bs-toggle="pill" data-bs-target="#pills-complete" type="button" role="tab" aria-controls="pills-complete" aria-selected="false">Approved <span class="fw-normal small"></span></button>
                </li>
            </ul> --}}
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
                        <th>Customer Name</th>
                        <th>Email</th>
                        <th>Created Date</th>
                        {{-- <th>Franchise Assign</th> --}}
                        {{-- <th>Status</th> --}}
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($contracts as $key => $contract)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $contract->customer->name ?? 'N/A' }}</td>
            <td>{{ $contract->customer->email ?? 'N/A' }}</td>
            <td>{{ $contract->created_at->format('M d, Y') }}</td>
            <td>
                <button class="btn btn-sm btn-primary viewContractBtn"
                            data-id="{{ $contract->id }}"
                            data-url="{{ route('contract.view', $contract->id) }}">
                        View
                    </button>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="5">No contracts found.</td>
        </tr>
    @endforelse
                </tbody>
            </table>
        </div>

        <!-- end all data view -->



    </div>
</div>


<div class="modal fade" id="contractViewModal" tabindex="-1">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Contract Preview</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body" id="contractViewBody">
        <div class="text-center">Loading...</div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('script')

<script>
$(document).ready(function(){
  $('#appointmentTable').DataTable();

  $(document).on('click', '.viewContractBtn', function(){
    const url = $(this).data('url');
    $('#contractViewBody').html('<div class="text-center">Loading...</div>');
    $('#contractViewModal').modal('show');

    $.get(url, function(html){
      $('#contractViewBody').html(html);
    });
  });
});
</script>

<script>
    $(document).ready(function () {
        if (!$.fn.DataTable.isDataTable('#appointmentTable')) {
            $('#appointmentTable').DataTable({
                "ordering": true,
                "searching": true,
                "paging": true,
                "info": true,
                "responsive": true,
                "language": {
                    "search": "Search:",
                    "zeroRecords": "No matching contracts found",
                    "lengthMenu": "Show _MENU_ contracts per page",
                    "info": "Showing _START_ to _END_ of _TOTAL_ contracts",
                    "infoEmpty": "No contracts available",
                    "paginate": {
                        "previous": "Previous",
                        "next": "Next"
                    }
                }
            });
        }
    });
</script>


@endsection