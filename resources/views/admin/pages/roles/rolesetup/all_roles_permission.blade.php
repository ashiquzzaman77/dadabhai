@extends('admin.admin_dashboard')
@section('admin')
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
                        <li class="breadcrumb-item text-muted">Total Role In Permission <span
                                class="ms-2 badge bg-danger">{{ count($roles) }}</span>
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
                            <a href="{{ route('add.roles.permission') }}" class="btn btn-light-primary btn-sm">Add
                                Role In Permission</a>
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
                                <tr class="text-start text-gray-400 fw-bolder">

                                    <th>Sl</th>
                                    <th>Role Name</th>
                                    <th>Permission Name</th>
                                    <th>Action</th>

                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->

                            <!--begin::Table body-->
                            <tbody class="fw-bold text-gray-600">

                                <!--begin::Table row-->
                                @foreach ($roles as $key => $item)
                                    <tr>
                                        <td style="width: 30px;">{{ $key + 1 }}</td>
                                        <td style="width: 100px;">{{ $item->name }}</td>
                                        <td>

                                            @foreach ($item->permissions as $prem)
                                                <span class="badge bg-danger">{{ $prem->name }}</span>
                                            @endforeach

                                        </td>
                                        <td style="width: 100px;">
                                            <a href="{{ route('admin.edit.roles', $item->id) }}"
                                                class="" title="Edit"><i
                                                    class="bi bi-pencil-square fs-3 text-primary"></i></a>

                                            <a href="{{ route('admin.delete.roles', $item->id) }}"
                                                class="" id="delete" title="Delete"><i
                                                    class="bi bi-trash fs-3 text-danger"></i></a>
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
    </div>

    <!--end::Content-->
@endsection
