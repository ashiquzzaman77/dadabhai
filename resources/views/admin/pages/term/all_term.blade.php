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
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Term & Policies</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">

                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Total Term & Policies <span
                            class="ms-2 badge bg-danger">{{ count($terms) }}</span></li>
                    <!--end::Item-->

                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">

                <a href="{{ route('add.term') }}" class="btn btn-light-primary btn-sm">Add
                    Term</a>

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
                                <th style="width: 30px;">#</th>
                                <th>Name</th>
                                <th>Version</th>
                                <th>Effective Date</th>
                                <th>Expiration Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($terms as $key => $term)
                                <tr>

                                    <td>{{ $key + 1 }}</td>

                                    <td>{{ $term->name }}</td>
                                    <td>{{ $term->version }}</td>
                                    <td>{{ Carbon\Carbon::parse($term->effective_date)->format('D,d M Y') }}</td>
                                    <td>{{ Carbon\Carbon::parse($term->expiration_date)->format('D,d M Y') }}</td>
                                    <td>
                                        @if ($term->status == 1)
                                            <span class="badge badge-light-success">Is_active</span>
                                        @else
                                            <span class="badge badge-light-danger">Is_inactive</span>
                                        @endif
                                    </td>
                                    <td>

                                        @if ($term->status == 1)
                                            <a href="{{ route('term.inactive', $term->id) }}" title="Inactive"><i
                                                    class="bi bi-hand-thumbs-down text-danger fs-3"></i></a>
                                        @else
                                            <a href="{{ route('term.active', $term->id) }}" title="Active"><i
                                                    class="bi bi-hand-thumbs-up text-success fs-3"></i></a>
                                        @endif

                                        <a href="{{ route('edit.term', $term->id) }}" class="ms-1" title="Edit"><i
                                                class="bi bi-pencil-square fs-3 text-primary"></i></a>



                                        <a href="{{ route('delete.term', $term->id) }}" class="ms-1" id="delete"
                                            title="Delete"><i class="bi bi-trash3-fill fs-3 text-danger"></i></a>
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

    {{-- Modal --}}

    <!-- Button trigger modal -->


    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background: #547b92;height:50px;">
                    <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Add Term</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('store.term') }}" method="POST">

                    @csrf

                    <div class="modal-body">

                        <div class="row">

                            <div class="col-12">

                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">Name</label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror" placeholder="Name"
                                        autocomplete="off">
                                    @error('name')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="col-12">

                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">Content</label>
                                    <textarea name="content" rows="3" cols="3"
                                        class="tinymce_metronic form-control @error('content') is-invalid @enderror"></textarea>
                                    @error('content')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="col-4">
                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">Effective Date</label>
                                    <input type="date" name="effective_date"
                                        class="form-control @error('effective_date') is-invalid @enderror"
                                        placeholder="Question" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">

                                    @error('effective_date')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">Expiration Date</label>
                                    <input type="date" name="expiration_date"
                                        class="form-control @error('expiration_date') is-invalid @enderror"
                                        min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">

                                    @error('expiration_date')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">Version</label>
                                    <input type="type" name="version"
                                        class="form-control @error('version') is-invalid @enderror" placeholder="Version">

                                    @error('version')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm">Add Term</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->



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
