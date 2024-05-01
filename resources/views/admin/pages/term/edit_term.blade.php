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
                    <li class="breadcrumb-item text-muted">Edit Term & Policies<span class="ms-2 badge bg-danger"></span>
                    </li>
                    <!--end::Item-->

                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">

                <a href="{{ route('all.term') }}" class="btn btn-light-primary btn-sm">Edit
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

                    <form action="{{ route('update.term') }}" method="POST">

                        @csrf

                        <input type="hidden" name="id" value="{{ $term->id }}">

                        <div class="modal-body">

                            <div class="row">

                                <div class="col-12">

                                    <div class="form-group mb-3">
                                        <label for="" class="mb-2">Name</label>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror" placeholder="Name"
                                            autocomplete="off" value="{{ $term->name }}">
                                        @error('name')
                                            <span class="text-danger"> {{ $message }}
                                            </span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="col-12">

                                    <div class="form-group mb-3">
                                        <label for="" class="mb-2">Content</label>

                                        <textarea name="content" rows="3" cols="3"
                                            class="tinymce_metronic form-control @error('content') is-invalid @enderror">{!! $term->content !!}</textarea>

                                        @error('content')
                                            <span class="text-danger"> {{ $message }}
                                            </span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="col-4">
                                    <div class="form-group mb-3">
                                        <label for="" class="mb-2">Effective
                                            Date</label>
                                        <input type="date" name="effective_date"
                                            class="form-control @error('effective_date') is-invalid @enderror"
                                            value="{{ $term->effective_date }}"
                                            min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">

                                        @error('effective_date')
                                            <span class="text-danger"> {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group mb-3">
                                        <label for="" class="mb-2">Expiration
                                            Date</label>
                                        <input type="date" name="expiration_date"
                                            class="form-control @error('expiration_date') is-invalid @enderror"
                                            value="{{ $term->expiration_date }}"
                                            min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">

                                        @error('expiration_date')
                                            <span class="text-danger"> {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group mb-3">
                                        <label for="" class="mb-2">Version</label>
                                        <input type="type" name="version"
                                            class="form-control @error('version') is-invalid @enderror"
                                            placeholder="Version" value="{{ $term->version }}">

                                        @error('version')
                                            <span class="text-danger"> {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary btn-sm">Update
                                Term</button>
                        </div>
                    </form>

                    <!--end::Table-->
                </div>
            </div>
        </div>
    </div>
    <!--end::Post-->
@endsection
