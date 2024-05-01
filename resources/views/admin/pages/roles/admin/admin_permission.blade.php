@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <!--begin::Content-->

   
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
                        <li class="breadcrumb-item text-muted">Total Admin<span
                                class="badge bg-danger ms-2">{{ count($users) }}</span>
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
                    <!--begin::Card header-->
                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Search-->

                            <!--end::Search-->
                        </div>
                        <!--end::Card title-->

                        <!--begin::Card toolbar-->
                        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">



                            <!--begin::Add product-->
                            <a href="" class="btn btn-light-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#addModal">Add
                                Admin</a>
                            <!--end::Add product-->

                        </div>
                        <!--end::Card toolbar-->

                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_datatable_example_5">

                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-gray-400 fw-bolder fs-7 gs-0">

                                    <th style="width: 40px;">No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Designation</th>
                                    <th>Status</th>
                                    <th>Role</th>
                                    <th>Action</th>

                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->

                            <!--begin::Table body-->
                            <tbody class="fw-bold text-gray-600">

                                <!--begin::Table row-->
                                @foreach ($users as $key => $user)
                                    <tr>

                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->designation }}</td>
                                        <td>
                                            @if ($user->status == 1)
                                                <span class="badge badge-light-success">Active</span>
                                            @else
                                                <span class="badge badge-light-danger">inactive</span>
                                            @endif
                                        </td>

                                        <td>
                                            @foreach ($user->roles as $role)
                                                <span class="badge badge-pill bg-danger">{{ $role->name }}</span>
                                            @endforeach
                                        </td>

                                        <td>

                                            @if ($user->status == 1)
                                                <a href="{{ route('admin.inactive', $user->id) }}" title="Inactive"><i
                                                        class="bi bi-hand-thumbs-down text-warning fs-3"></i></a>
                                            @else
                                                <a href="{{ route('admin.active', $user->id) }}" title="Active"><i
                                                        class="bi bi-hand-thumbs-up text-dark fs-3"></i></a>
                                            @endif

                                            <a href="{{ route('edit.admin.permission', $user->id) }}" class="ms-1"
                                                title="Edit"><i class="bi bi-pencil-square fs-3 text-success"></i></a>

                                            <a href="{{ route('delete.admin', $user->id) }}" class="ms-1"
                                                title="Delete"><i class="bi bi-trash fs-3 text-danger"></i></a>
                                        </td>

                                    </tr>
                                @endforeach
                                <!--end::Table row-->


                            </tbody>
                            <!--end::Table body-->

                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Products-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    

    {{-- Add Permission --}}

    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">

                <div class="modal-header" style="background: #6196A6;height: 50px;">
                    <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Add Admin</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('store.admin.permission') }}" method="POST" id="myForm">

                    @csrf

                    <div class="modal-body">

                        <div class="row">

                            <div class="col-4">
                                <div class="form-group mb-3">
                                    <label for="">Name</label>
                                    <input type="text" name="name" autocomplete="off" placeholder="Name"
                                        class="form-control form-control-sm">
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group mb-3">
                                    <label for="">UserName</label>
                                    <input type="text" name="username" autocomplete="off" placeholder="Username"
                                        class="form-control form-control-sm">
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group mb-3">
                                    <label for="">Company Name</label>
                                    <input type="text" name="company_name" autocomplete="off" placeholder="Company Name"
                                        class="form-control form-control-sm">
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group mb-3">
                                    <label for="">Designation</label>
                                    <input type="text" name="designation" autocomplete="off"
                                        placeholder="Designation" class="form-control form-control-sm">
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group mb-3">
                                    <label for="">Email</label>
                                    <input type="email" name="email" autocomplete="off" placeholder="Email"
                                        class="form-control form-control-sm">
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group mb-3">
                                    <label for="">Phone</label>
                                    <input type="tel" name="phone" autocomplete="off" placeholder="Phone"
                                        class="form-control form-control-sm">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="">Address</label>
                                    <input type="text" name="address" autocomplete="off" placeholder="Address"
                                        class="form-control form-control-sm">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="">Password</label>
                                    <input type="password" name="password" autocomplete="off" placeholder="******"
                                        class="form-control form-control-sm">
                                </div>
                            </div>

                        </div>


                        <div class="row">

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Role</label>

                                    <select class="form-select form-select-sm" name="roles">
                                        <option selected disabled>Select Role</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                            <div class="col-6">
                                <label for="">Status</label>
                                <select name="status" id="" class="form-select form-select-sm">
                                    <option selected disabled>Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>

                        </div>

                    </div>

                    <div class="modal-footer">

                        <button type="submit" class="btn btn-primary btn-sm">Save changes</button>

                    </div>

                </form>

            </div>
        </div>
    </div>

    {{-- Add Permission --}}

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
