@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <!--begin::Content-->

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Toolbar-->
        <div class="toolbar" id="kt_toolbar">
            <!--begin::Container-->
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                    class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <!--begin::Title-->
                    <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Admin</h1>
                    <!--end::Title-->
                    <!--begin::Separator-->
                    <span class="h-20px border-gray-300 border-start mx-4"></span>
                    <!--end::Separator-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">

                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Edit Admin</span>
                        </li>
                        <!--end::Item-->

                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">

                    <!--begin::Primary button-->
                    <a href="{{ route('all.role') }}" class="btn btn-sm btn-light-primary">Role</a>
                    <a href="{{ route('all.permission') }}" class="btn btn-sm btn-light-info">Permission</a>
                    <a href="{{ route('all.roles.permission') }}" class="btn btn-sm btn-light-dark">Role In Permission</a>
                    <!--end::Primary button-->

                </div>
                <!--end::Actions-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Toolbar-->

        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Products-->
                <div class="card card-flush">

                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <form action="{{ route('update.admin', $users->id) }}" method="POST" id="myForm">

                            @csrf

                            <div class="modal-body">

                                <div class="row">

                                    <div class="col-4">
                                        <div class="form-group mb-3">
                                            <label for="">Name</label>
                                            <input type="text" name="name" value="{{ $users->name }}"
                                                autocomplete="off" placeholder="Name" required class="form-control form-control-sm">
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group mb-3">
                                            <label for="">UserName</label>
                                            <input type="text" value="{{ $users->username }}" name="username"
                                                autocomplete="off" placeholder="Username" required class="form-control form-control-sm">
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group mb-3">
                                            <label for="">Company Name</label>
                                            <input type="text" value="{{ $users->company_name }}" name="company_name"
                                                autocomplete="off" placeholder="Compnay Name" class="form-control form-control-sm">
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group mb-3">
                                            <label for="">Designation</label>
                                            <input type="text" value="{{ $users->designation }}" name="designation"
                                                autocomplete="off" placeholder="Designation" class="form-control form-control-sm">
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group mb-3">
                                            <label for="">Email</label>
                                            <input type="email" value="{{ $users->email }}" name="email"
                                                autocomplete="off" placeholder="Email" required class="form-control form-control-sm">
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group mb-3">
                                            <label for="">Phone</label>
                                            <input type="tel" value="{{ $users->phone }}" name="phone"
                                                autocomplete="off" placeholder="Phone" class="form-control form-control-sm">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group mb-3">
                                            <label for="">Address</label>
                                            <input type="text" value="{{ $users->address }}" name="address"
                                                autocomplete="off" placeholder="Address" class="form-control form-control-sm">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group mb-3">
                                            <label for="">Role</label>
        
                                            <select class="form-select form-select-sm" name="roles">
                                                <option selected disabled>Select Role</option>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}"
                                                        {{ $users->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}
                                                    </option>
                                                @endforeach
                                            </select>
        
                                        </div>
                                    </div>

                                </div>

                                

                            </div>

                            <div class="modal-footer">

                                <button type="submit" class="btn btn-primary btn-sm">Save changes</button>

                            </div>

                        </form>
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Products-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>

    <!--end::Content-->

    {{-- validate code  --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    email: {
                        required: true,
                    },
                    password: {
                        required: true,
                    },
                    roles: {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: 'Please Enter Name',
                    },
                    email: {
                        required: 'Please Enter Email',
                    },
                    password: {
                        required: 'Please Enter password',
                    },
                    roles: {
                        required: 'Please Enter Role Name',
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>
@endsection
