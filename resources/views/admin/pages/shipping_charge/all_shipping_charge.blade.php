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
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Shipping Charge</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">

                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Total Shipping Charge <span
                            class="ms-2 badge bg-danger">{{ count($charges) }}</span></li>
                    <!--end::Item-->

                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">

                <a data-bs-toggle="modal" data-bs-target="#addModal" class="btn btn-light-primary btn-sm">Add
                    Shipping Charge</a>

            </div>
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
                                <th>Title</th>
                                <th>Shapping Value</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($charges as $key => $charge)
                                <tr>

                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $charge->title }}</td>
                                    <td>{{ $charge->value }} Tk</td>
                                    <td>
                                        @if ($charge->status == 1)
                                            <span class="badge badge-light-success">Is_active</span>
                                        @else
                                            <span class="badge badge-light-danger">Is_inactive</span>
                                        @endif
                                    </td>
                                    <td>

                                        @if ($charge->status == 1)
                                            <a href="{{ route('shipping.charge.inactive', $charge->id) }}"
                                                title="Inactive"><i class="bi bi-hand-thumbs-down text-danger fs-3"></i></a>
                                        @else
                                            <a href="{{ route('shipping.charge.active', $charge->id) }}" title="Active"><i
                                                    class="bi bi-hand-thumbs-up text-success fs-3"></i></a>
                                        @endif

                                        <a href="" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $charge->id }}" class="ms-1" title="Edit"><i
                                                class="bi bi-pencil-square fs-3 text-primary"></i></a>

                                        {{-- Edit Modal --}}

                                        <div class="modal fade" id="editModal{{ $charge->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <div class="modal-header" style="background: #6196A6;height: 50px;">
                                                        <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">
                                                            Update Shipping Charge</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>

                                                    <form action="{{ route('update.shipping.charge') }}" method="POST"
                                                        enctype="multipart/form-data" class="myForm">

                                                        @csrf

                                                        <input type="hidden" name="id" value="{{ $charge->id }}">

                                                        <div class="modal-body">

                                                            <div class="row">

                                                                <div class="col-6">

                                                                    <div class="form-group mb-3">
                                                                        <label for="" class="mb-2">Shipping
                                                                            Title</label>
                                                                        <input type="text" name="title"
                                                                            class="form-control form-control-sm"
                                                                            placeholder="Shipping Title" autocomplete="off"
                                                                            value="{{ $charge->title }}" required>
                                                                    </div>

                                                                </div>

                                                                <div class="col-6">

                                                                    <div class="form-group mb-3">
                                                                        <label for="" class="mb-2">Shipping
                                                                            Value</label>
                                                                        <input type="number" value="{{ $charge->value }}"
                                                                            name="value"
                                                                            class="form-control form-control-sm"
                                                                            placeholder="Shipping Value" autocomplete="off"
                                                                            required>
                                                                    </div>

                                                                </div>

                                                                <div class="col-12">
                                                                    <div class="mb-3">
                                                                        <label for="" class="mb-2">Comment</label>
                                                                        <textarea class="form-control form-control-sm" placeholder="Write Something In Comment" name="comment"
                                                                            value="{{ $charge->comment }}"></textarea>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit"
                                                                class="btn btn-primary btn-sm">Update</button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>

                                        <a href="{{ route('delete.shipping.charge', $charge->id) }}" class="ms-1"
                                            id="delete" title="Delete"><i
                                                class="bi bi-trash3-fill fs-3 text-danger"></i></a>
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

    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-centered">
            <div class="modal-content">

                <div class="modal-header" style="background: #6196A6;height: 50px;">
                    <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Add Shipping Charge</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('store.shipping.charge') }}" method="POST" id="myForm"
                    enctype="multipart/form-data">

                    @csrf

                    <div class="modal-body">

                        <div class="row">

                            <div class="col-6">

                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">Shipping Title</label>
                                    <input type="text" name="title" class="form-control form-control-sm"
                                        placeholder="Shipping Title" autocomplete="off">
                                </div>

                            </div>

                            <div class="col-6">

                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">Shipping Value</label>
                                    <input type="number" name="value" class="form-control form-control-sm"
                                        placeholder="Shipping Value" autocomplete="off">
                                </div>

                            </div>

                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">Comment</label>
                                    <textarea class="form-control form-control-sm" placeholder="Write Something In Comment" name="comment"></textarea>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Button trigger modal -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    {{-- validate code  --}}
    <script type="text/javascript">
        $(document).ready(function() {

            $('#myForm').validate({
                rules: {
                    title: {
                        required: true,
                    },
                    value: {
                        required: true,
                    },
                },
                messages: {
                    title: {
                        required: 'Please Enter Shipping Title',
                    },
                    value: {
                        required: 'Please Enter Shipping Value',
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
