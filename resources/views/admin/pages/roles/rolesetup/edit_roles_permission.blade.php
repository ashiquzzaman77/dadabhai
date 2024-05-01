@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <style>
        .form-check-label {
            text-transform: capitalize;
        }
    </style>
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
                    <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Role In Permission</h1>
                    <!--end::Title-->
                    <!--begin::Separator-->
                    <span class="h-20px border-gray-300 border-start mx-4"></span>
                    <!--end::Separator-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">

                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Edit Role Permission
                        </li>
                        <!--end::Item-->

                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">

                    <!--begin::Primary button-->
                    <a href="{{ route('all.roles.permission') }}" class="btn btn-sm btn-light-primary">Back</a>
                    <!--end::Primary button-->

                </div>
                <!--end::Actions-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Toolbar-->

        <!--begin::Post-->
        <div class="">
            <!--begin::Container-->

            <div class="row">
                <div class="col-8">

                    <div class="card">
                        <div class="card-body">

                            <form action="{{ route('admin.roles.update', $role->id) }}" method="POST" id="myForm">

                                @csrf

                                <div class="form-group mb-5">
                                    <label class="form-label">Role Name</label>
                                    <input type="text" class="form-control form-control-sm text-danger" disabled name="name"
                                        value="{{ $role->name }}">
                                </div>

                                <div class="">
                                    <input type="checkbox" class="" id="checkDefaultmain">

                                    <label class="form-check-label" for="checkDefaultmain">
                                        All Permission
                                    </label>

                                </div>

                                <hr>


                                {{-- Role In Permission Group --}}

                                @foreach ($permission_groups as $group)
                                    <div class="row">
                                        <div class="col-3">

                                            @php
                                                $permissions = App\Models\Admin::getpermissionByGroupName(
                                                    $group->group_name,
                                                );
                                            @endphp

                                            <div class="">
                                                <input class="" type="checkbox" value="" id="flexCheckDefault"
                                                    {{ App\Models\Admin::roleHasPermissions($role, $permissions) ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="flexCheckDefault">{{ $group->group_name }}</label>
                                            </div>
                                        </div>

                                        <div class="col-9">

                                            @foreach ($permissions as $permission)
                                                <div class="">
                                                    <input class="" name="permission[]"
                                                        {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}
                                                        type="checkbox" value="{{ $permission->id }}"
                                                        id="flexCheckDefault{{ $permission->id }}">
                                                    <label class="form-check-label"
                                                        for="flexCheckDefault{{ $permission->id }}">{{ $permission->name }}</label>
                                                </div>
                                                <div class="mb-3"></div>
                                            @endforeach
                                            <br>
                                        </div>

                                    </div>
                                @endforeach

                                {{-- Role In Permission Group --}}

                                <div class="col-12 mt-5">
                                    <button type="submit" class="btn btn-primary btn-sm me-2 px-3 float-end">Update Role
                                        Permission</button>
                                </div>
                            </form>

                        </div>
                    </div>



                </div>
            </div>

            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>

    <!--end::Content-->

    <script type="text/javascript">
        $('#checkDefaultmain').click(function() {

            if ($(this).is(':checked')) {
                $('input[ type= checkbox]').prop('checked', true);
            } else {
                $('input[ type= checkbox]').prop('checked', false);
            }

        });
    </script>

    {{-- validate code  --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    role_id: {
                        required: true,
                    },
                },
                messages: {
                    role_id: {
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
