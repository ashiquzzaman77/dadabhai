@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Template</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">

                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Total Temaplete <span
                            class="ms-2 badge bg-danger">{{ count($templates) }}</span></li>
                    <!--end::Item-->

                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            {{-- <div class="d-flex align-items-center gap-2 gap-lg-3">

                <a data-bs-toggle="modal" data-bs-target="#addModal" class="btn btn-light-primary btn-sm">Add
                    Brand</a>

            </div> --}}
            <!--end::Actions-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->

    <!--begin::Post-->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!--begin::Table-->

                    <table id="kt_datatable_example_5" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Name</th>
                                <th>Active Time</th>
                                <th>Next Template</th>
                                <th>Next Activition Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($templates as $key => $template)
                                <tr>

                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $template->name }}</td>
                                    <td class="text-danger">{{ Carbon\Carbon::parse($template->active_at)->diffForHumans() }}</td>
                                    <td>{{ $template->next_template }}</td>
                                    <td>{{ $template->next_activition_date }}</td>

                                    <td>
                                        @if ($template->status == 1)
                                            <span class="badge badge-light-success">Is_active</span>
                                        @else
                                            <span class="badge badge-light-danger">Is_inactive</span>
                                        @endif
                                    </td>
                                    <td>

                                        <a href="" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $template->id }}" class="ms-1" title="Edit"><i
                                                class="bi bi-pencil-square fs-3 text-primary"></i></a>

                                        {{-- Edit Modal --}}

                                        <div class="modal fade" id="editModal{{ $template->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">

                                                    <div class="modal-header" style="background: #6196A6;height: 50px;">
                                                        <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">
                                                            Update Template</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>

                                                    <form action="{{ route('update.template') }}" method="POST"
                                                        enctype="multipart/form-data" id="myForm">

                                                        @csrf

                                                        <input type="hidden" name="id" value="{{ $template->id }}">

                                                        <div class="modal-body">

                                                            <div class="row">

                                                                <div class="col-6">

                                                                    <div class="form-group mb-3">
                                                                        <label for="" class="mb-2">Template
                                                                            Name</label>
                                                                        <select name="name" id=""
                                                                            class="form-select form-select-sm form-select-solid">
                                                                            <option selected disabled>Choose Template
                                                                            </option>

                                                                            <option value="template_one"
                                                                                {{ $template->name == 'template_one' ? 'selected' : '' }}>
                                                                                Template One</option>

                                                                            <option value="template_two"
                                                                                {{ $template->name == 'template_two' ? 'selected' : '' }}>
                                                                                Template Two</option>

                                                                            <option value="template_three"
                                                                                {{ $template->name == 'template_three' ? 'selected' : '' }}>
                                                                                Template Three</option>

                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-6">

                                                                    <div class="form-group mb-3">
                                                                        <label for="" class="mb-2">Next
                                                                            Template</label>
                                                                        <select name="next_template" id=""
                                                                            class="form-select form-select-solid form-select-sm">
                                                                            <option selected disabled>Choose Next Template
                                                                            </option>

                                                                            <option value="template_one"
                                                                                {{ $template->next_template == 'template_one' ? 'selected' : '' }}>
                                                                                Template One</option>

                                                                            <option value="template_two"
                                                                                {{ $template->next_template == 'template_two' ? 'selected' : '' }}>
                                                                                Template Two</option>

                                                                            <option value="template_three"
                                                                                {{ $template->next_template == 'template_three' ? 'selected' : '' }}>
                                                                                Template Three</option>

                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                {{-- <div class="col-4">
                                                                    <div class="form-group mb-3">
                                                                        <label for="" class="mb-2">Active
                                                                            Time</label>
                                                                        <input type="date" name="active_at"
                                                                            class="form-control form-control-sm form-control-solid"
                                                                            value="{{ $template->active_at }}">

                                                                    </div>
                                                                </div> --}}

                                                                <div class="col-6">
                                                                    <div class="form-group mb-3">
                                                                        <label for="" class="mb-2">Next Activition
                                                                            Date</label>
                                                                        <input type="date" name="next_activition_date"
                                                                            class="form-control form-control-sm form-control-solid"
                                                                            min="{{ Carbon\Carbon::now()->format('Y-m-d') }}"
                                                                            value="{{ $template->next_activition_date }}">

                                                                    </div>
                                                                </div>

                                                                <div class="col-6">

                                                                    <div class="form-group mb-3">
                                                                        <label for="" class="mb-2">Status</label>
                                                                        <select name="status" id=""
                                                                            class="form-select form-select-sm form-select-solid">
                                                                            <option selected>Choose Status</option>

                                                                            <option value="1"
                                                                                {{ $template->status == '1' ? 'selected' : '' }}>
                                                                                Active</option>

                                                                            <option value="0"
                                                                                {{ $template->name == '0' ? 'selected' : '' }}>
                                                                                Inactive</option>

                                                                        </select>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary btn-sm">Update
                                                                Template</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- <a href="{{ route('delete.brand', $brand->id) }}" class="ms-1" id="delete"
                                            title="Delete"><i class="bi bi-trash3-fill fs-3 text-danger"></i></a> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!--end::Table-->
                </div>
            </div>
        </div>
    </div>
    <!--end::Post-->


    {{-- validate code  --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    status: {
                        required: true,
                    },
                    active_at: {
                        required: true,
                    },
                    next_template: {
                        required: true,
                    },
                    next_activition_date: {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: 'Please Enter Name',
                    },
                    status: {
                        required: 'Please Enter Status Field',
                    },
                    active_at: {
                        required: 'Please Enter Active Time',
                    },
                    next_template: {
                        required: 'Please Enter Next Template Name',
                    },
                    next_activition_date: {
                        required: 'Please Enter Next Template Activition Date',
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


    {{-- Data Table  --}}
    <script>
        $("#kt_datatable_example_5").DataTable({
            "language": {
                "lengthMenu": "Show _MENU_",
            },
            "dom": "<'row'" +
                "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
                "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
                ">" +

                "<'table-responsive'tr>" +

                "<'row'" +
                "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                ">"
        });
    </script>
@endsection
