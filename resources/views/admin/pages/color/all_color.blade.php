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
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Color</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">

                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Total Color <span
                            class="ms-2 badge bg-danger">{{ count($colors) }}</span></li>
                    <!--end::Item-->

                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">

                <!--begin::Primary button-->

                {{-- <a href="{{ route('all.category') }}" class="btn btn-sm btn-light-primary">Category</a>
                <a href="{{ route('all.subcategory') }}" class="btn btn-sm btn-light-info">Sub Category</a>
                <a href="{{ route('all.childcategory') }}" class="btn btn-sm btn-light-dark">Child Category</a> --}}

                <!--end::Primary button-->

            </div>
            <!--end::Actions-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->

    <!--begin::Post-->

    <div class="row">

        <div class="col-8">

            <div class="card">
                <div class="card-body">
                    <table id="kt_datatable_example_5" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Color Name</th>
                                <th>Color Code</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($colors as $key => $color)
                                <tr>

                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $color->color_name }}</td>
                                    <td>{{ $color->color_code }}</td>
                                    <td>



                                        {{-- Edit Category Modal --}}
                                        <a href="" class="ms-1" title="Edit" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $color->id }}" class="btn btn-primary btn-sm"><i
                                                class="bi bi-pencil-square fs-3 text-primary"></i>
                                        </a>

                                        <!-- EditModal -->
                                        <div class="modal fade" id="editModal{{ $color->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content">
                                                    <div class="modal-header" style="background: #6196A6;height: 50px;">
                                                        <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Edit
                                                            Color
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>

                                                    <form action="{{ route('update.color') }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf

                                                        <input type="hidden" name="id" value="{{ $color->id }}">

                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-5">
                                                                    <div class="form-group mb-3">
                                                                        <label for="" class="mb-2">Color
                                                                            Name</label>
                                                                        <input type="text" required
                                                                            value="{{ $color->color_name }}"
                                                                            name="color_name" placeholder="Color Name"
                                                                            autocomplete="off"
                                                                            class="form-control form-control-sm">
                                                                    </div>
                                                                </div>

                                                                <div class="col-7">
                                                                    <div class="form-group">
                                                                        <label for="" class="mb-2">Color
                                                                            Code</label><br>
                                                                        <div class="row">
                                                                            <div class="col-4">
                                                                                <div class="col-5">
                                                                                    <input type="color"
                                                                                        pattern="#[0-9a-fA-F]{6}"
                                                                                        class="colorCode"
                                                                                        value="{{ $color->color_code }}"
                                                                                        name="color_code" id="colorCode"
                                                                                        placeholder="Enter Color Code"
                                                                                        required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-7">
                                                                                <div class="input-group-append">
                                                                                    <span
                                                                                        class="input-group-text rounded-0 colorCodePreview"
                                                                                        id="colorCodePreview">#000000</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>


                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary btn-sm"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary btn-sm">Update
                                                                Color</button>
                                                        </div>

                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                        {{-- Edit Category Modal --}}

                                        <a href="{{ route('delete.color', $color->id) }}" class="ms-1" id="delete"
                                            title="Delete"><i class="bi bi-trash3-fill fs-3 text-danger"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <div class="col-4">

            <div class="card">
                <div class="card-body">

                    <form action="{{ route('store.color') }}" method="POST">
                        @csrf

                        <h4>Add Color</h4>

                        <div class="form-group mb-3 mt-3">
                            <label for="">Color Name</label>
                            <input type="text" required name="color_name" placeholder="Color Name" autocomplete="off"
                                class="form-control form-control-sm">
                        </div>

                        <div class="form-group">
                            <label for="">Color Code</label><br>
                            <div class="row mt-2">
                                <div class="col-4">
                                    <div class="col-4">
                                        <input type="color" pattern="#[0-9a-fA-F]{6}" class="colorCode"
                                            name="color_code" id="colorCode" placeholder="Enter Color Code" required>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="input-group-append">
                                        <span class="input-group-text rounded-0 colorCodePreview"
                                            id="colorCodePreview">#000000</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-sm mt-3 float-end">Submit</button>
                    </form>
                </div>
            </div>

        </div>

    </div>


    <!--end::Post-->

    {{-- Color Code  --}}
    <script>
        $(document).ready(function() {
            // Attach an input event listener to the color input
            $('.colorCode').on('input', function() {
                // Get the entered color code
                var colorCode = $(this).val();

                // Update the content of the preview element
                $('.colorCodePreview').text(colorCode);
            });
        });
    </script>

    {{-- DataTable  --}}
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
