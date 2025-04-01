@extends('admin.layouts.app')

@section('title', 'User List')

@section('content')
@php
    
@endphp

<div class="dataOverviewSection mt-3">
<div class="section-title">
        <h6 class="fw-bold m-0 custem">All Jobs<span class="fw-normal text-muted">({{-- count($users) --}})</span></h6>
        <a href="{{ route('Jobs.create') }}" class="primary-btn addBtn">+ Add Jobs</a>
    </div>

    <!-- Add User Modal Start -->
   
    <!-- Add User Modal End -->

   

    <!-- Change Password Modal Start -->
   {{--  <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="changePasswordForm" method="POST" action="{{ route('user.change-password', ['user' => '__user_id__']) }}" autocomplete="off">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="changePasswordModalLabel">Change Password</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-1 w-100">
                            <label for="current_password" class="form-label mb-1">Current Password</label>
                            <div class="input-group w-100">
                                <input type="password" class="form-control border-0" id="current_password" name="current_password" required>
                                <button class="btn bg-transparent border-0 toggle-password" type="button" data-target="current_password">
                                    <i class="bi bi-eye-slash"></i>
                                </button>
                            </div>
                            <div class="form-text text-danger" id="current_password_error"></div> <!-- Validation message -->
                        </div>
                        <div class="mb-1 w-100">
                            <label for="new_password" class="form-label mb-1">New Password</label>
                            <div class="input-group w-100">
                                <input type="password" class="form-control border-0" id="new_password" name="new_password" required>
                                <button class="btn bg-transparent border-0 toggle-password" type="button" data-target="new_password">
                                    <i class="bi bi-eye-slash"></i>
                                </button>
                            </div>
                            <div class="form-text text-danger" id="new_password_error"></div> <!-- Validation message -->
                        </div>
                        <div class="mb-1 w-100">
                            <label for="new_password_confirmation" class="form-label mb-1">Confirm New Password</label>
                            <div class="input-group w-100">
                                <input type="password" class="form-control border-0" id="new_password_confirmation" name="new_password_confirmation" required>
                                <button class="btn bg-transparent border-0 toggle-password" type="button" data-target="new_password_confirmation">
                                    <i class="bi bi-eye-slash"></i>
                                </button>
                            </div>
                            <div class="form-text text-danger" id="new_password_confirmation_error"></div> <!-- Validation message -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="secondary-btn addBtn" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="primary-btn addBtn">Change Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}
    <!-- Change Password Modal End -->


   {{--  <!-- Delete User Modal Start -->
    <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="deleteUserForm" method="POST" action="{{ route('user.delete', ['user' => '__user_id__']) }}" autocomplete="off">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="deleteUserModalLabel">Delete User</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this user?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="secondary-btn" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="primary-btn">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Delete User Modal End --> --}}

    <div class="dataOverview mt-3">
        <div class="table-responsive">
            <table class="table" id="projectsTable">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
             {{--   @foreach($customers as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    
                    
                </tr>
                @endforeach
--}}
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection

@section('script')
<!-- <script>
    $(document).ready(function () {
        // Edit User Modal
        $('#editUserModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); 
            var userId = button.data('id'); 
            var name = button.data('name'); 
            var email = button.data('email'); 
            var role = button.data('role'); 
            
            var modal = $(this);
            modal.find('#edit_name').val(name);
            modal.find('#edit_email').val(email);
            modal.find('#edit_role').val(role);

            var formAction = '{{ route('user.update', ['user' => '__user_id__']) }}'.replace('__user_id__', userId);
            modal.find('form').attr('action', formAction);
        });

        // Change Password Modal
        $('#changePasswordModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); 
            var userId = button.data('id'); 

            var modal = $(this);
            var formAction = '{{ route('user.change-password', ['user' => '__user_id__']) }}'.replace('__user_id__', userId);
            modal.find('form').attr('action', formAction);
        });

        // Delete User Modal
        $('#deleteUserModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); 
            var userId = button.data('id'); 

            var modal = $(this);
            var formAction = '{{ route('user.delete', ['user' => '__user_id__']) }}'.replace('__user_id__', userId);
            modal.find('form').attr('action', formAction);
        });

        // jQuery Validation for User Forms
        

        $("#changePasswordForm").validate({
            rules: {
                current_password: { required: true },
                new_password: { required: true, minlength: 6 },
                new_password_confirmation: { equalTo: "#new_password" }
            },
            messages: {
                current_password: "Please provide your current password",
                new_password: { required: "Please provide a new password", minlength: "Your password must be at least 6 characters long" },
                new_password_confirmation: { equalTo: "Please enter the same password again" }
            },
            errorElement: "div", // Use div to display errors
            errorPlacement: function (error, element) {
                error.addClass("form-text text-danger xsmall");
                error.insertAfter(element); // Place the error directly after the input element
            },
            highlight: function (element) {
                $(element).addClass("is-invalid").removeClass("is-valid");
            },
            unhighlight: function (element) {
                $(element).removeClass("is-invalid").addClass("is-valid");
            }
        });
    });
</script>
<script>
    $(document).ready(function () {
        // Add custom validation method for regex pattern
        $.validator.addMethod("pattern", function (value, element, param) {
            if (this.optional(element)) {
                return true;
            }
            return param.test(value);
        }, "Invalid format.");

        // Initialize form validation
        $("#formAuthentication").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 3
                },
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 8,
                    pattern: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&]).+$/
                },
                password_confirmation: {
                    required: true,
                    equalTo: "#password"
                },
                role: {
                    required: true
                }
            },
            messages: {
                name: {
                    required: "Please enter your name",
                    minlength: "Name must be at least 3 characters long"
                },
                email: {
                    required: "Please enter your email",
                    email: "Please enter a valid email address"
                },
                password: {
                    required: "Please enter your password",
                    minlength: "Password must be at least 8 characters long",
                    pattern: "Password must include uppercase, lowercase, number, and special character"
                },
                password_confirmation: {
                    required: "Please confirm your password",
                    equalTo: "The password and its confirmation do not match"
                },
                role: {
                    required: "Please select a role"
                }
            },
            errorElement: "div", // Use div to display errors
            errorPlacement: function (error, element) {
                error.addClass("form-text text-danger xsmall");
                error.insertAfter(element); // Place the error directly after the input element
            },
            highlight: function (element) {
                $(element).addClass("is-invalid").removeClass("is-valid");
            },
            unhighlight: function (element) {
                $(element).removeClass("is-invalid").addClass("is-valid");
            }
        });
    });
</script> -->
@endsection
