@extends('admin.admin_dashboard')
@section('admin')
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
                    <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Account Overview
                    </h1>
                    <!--end::Title-->
                    <!--begin::Separator-->
                    <span class="h-20px border-gray-300 border-start mx-4"></span>
                    <!--end::Separator-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Account</li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-dark">Overview</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">

                    <!--begin::Primary button-->

                    {{-- <a href="../../demo1/dist/.html" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                        data-bs-target="#kt_modal_create_app">Create</a> --}}

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

                <!--begin::Navbar-->
                @include('admin.pages.profile.top_navbar')
                <!--end::Navbar-->


                <!--begin::Card body-->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <!--begin::Table-->

                                <table id="kt_datatable_example_5" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Sl No</th>
                                            <th>Mailer</th>
                                            <th>Host</th>
                                            <th>Port</th>
                                            <th>Username</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($smtps as $key => $smtp)
                                            <tr>

                                                <td>{{ $key + 1 }}</td>

                                                <td>{{ $smtp->mailer }}</td>
                                                <td>{{ $smtp->host }}</td>
                                                <td>{{ $smtp->port }}</td>
                                                <td>{{ $smtp->username }}</td>
                                                <td>{{ $smtp->address }}</td>
                                                <td>

                                                    <a href="" data-bs-toggle="modal"
                                                        data-bs-target="#editModal{{ $smtp->id }}" class="ms-1"
                                                        title="Edit"><i
                                                            class="bi bi-pencil-square fs-3 text-primary"></i></a>

                                                    {{-- Edit Modal --}}

                                                    <div class="modal fade" id="editModal{{ $smtp->id }}" tabindex="-1"
                                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                                            <div class="modal-content">

                                                                <div class="modal-header"
                                                                    style="background: #6196A6;height: 50px;">
                                                                    <h1 class="modal-title fs-5 text-white"
                                                                        id="exampleModalLabel">
                                                                        Update SMTP</h1>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>

                                                                <form action="{{ route('update.brand') }}" method="POST"
                                                                    enctype="multipart/form-data">

                                                                    @csrf

                                                                    <input type="hidden" name="id"
                                                                        value="{{ $smtp->id }}">

                                                                    <div class="modal-body">

                                                                        <div class="row">

                                                                            <div class="col-4">

                                                                                <div class="form-group mb-3">
                                                                                    <label for=""
                                                                                        class="mb-2">Mailer</label>
                                                                                    <input type="text" name="mailer"
                                                                                        class="form-control form-control-sm @error('mailer') is-invalid @enderror"
                                                                                        placeholder="Mailer"
                                                                                        value="{{ $smtp->mailer }}"
                                                                                        autocomplete="off">
                                                                                    @error('mailer')
                                                                                        <span class="text-danger">
                                                                                            {{ $message }}
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>

                                                                            </div>

                                                                            <div class="col-3">

                                                                                <div class="form-group mb-3">
                                                                                    <label for=""
                                                                                        class="mb-2">Host</label>
                                                                                    <input type="text" name="host"
                                                                                        class="form-control form-control-sm"
                                                                                        placeholder="Host"
                                                                                        value="{{ $smtp->host }}"
                                                                                        autocomplete="off">

                                                                                </div>

                                                                            </div>


                                                                            <div class="col-2">

                                                                                <div class="form-group mb-3">
                                                                                    <label for=""
                                                                                        class="mb-2">Port</label>
                                                                                    <input type="text" name="port"
                                                                                        class="form-control form-control-sm"
                                                                                        placeholder="Port"
                                                                                        value="{{ $smtp->port }}"
                                                                                        autocomplete="off">

                                                                                </div>

                                                                            </div>

                                                                            <div class="col-3">

                                                                                <div class="form-group mb-3">
                                                                                    <label for=""
                                                                                        class="mb-2">Username</label>
                                                                                    <input type="text" name="username"
                                                                                        class="form-control form-control-sm"
                                                                                        placeholder="Username"
                                                                                        value="{{ $smtp->username }}"
                                                                                        autocomplete="off">

                                                                                </div>

                                                                            </div>

                                                                            <div class="col-4">

                                                                                <div class="form-group mb-3">
                                                                                    <label for=""
                                                                                        class="mb-2">Password</label>
                                                                                    <input type="password" name="password"
                                                                                        class="form-control form-control-sm"
                                                                                        placeholder="Password"
                                                                                        value="{{ $smtp->password }}"
                                                                                        autocomplete="off">

                                                                                </div>

                                                                            </div>

                                                                            <div class="col-4">

                                                                                <div class="form-group mb-3">
                                                                                    <label for=""
                                                                                        class="mb-2">Encryption</label>
                                                                                    <input type="text" name="password"
                                                                                        class="form-control form-control-sm"
                                                                                        placeholder="Encryption"
                                                                                        value="{{ $smtp->encryption }}"
                                                                                        autocomplete="off">

                                                                                </div>

                                                                            </div>

                                                                            <div class="col-4">

                                                                                <div class="form-group mb-3">
                                                                                    <label for=""
                                                                                        class="mb-2">Address</label>
                                                                                    <input type="text" name="address"
                                                                                        class="form-control form-control-sm"
                                                                                        placeholder="Address"
                                                                                        value="{{ $smtp->address }}"
                                                                                        autocomplete="off">

                                                                                </div>

                                                                            </div>

                                                                        </div>

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit"
                                                                            class="btn btn-primary btn-sm">Update
                                                                            SMTP</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <a href="" class="ms-1" id="delete" title="Delete"><i
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
                <!--end::Card body-->


                <!--end::details View-->
                <!--begin::Row-->


            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->

    </div>

    <!-- Modal -->
    {{-- <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update Profile</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-body">

                        <div class="row">

                            <div class="col-4">
                                <div class="form-group mb-2">
                                    <label for="" class="mb-2">Name</label>
                                    <input type="text" placeholder="Name" name="name"
                                        value="{{ $profileData->name }}"
                                        class="form-control form-control-sm form-control-solid">
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group mb-2">
                                    <label for="" class="mb-2">UserName</label>
                                    <input type="text" placeholder="UserName" name="username"
                                        value="{{ $profileData->username }}"
                                        class="form-control form-control-sm form-control-solid">
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group mb-2">
                                    <label for="" class="mb-2">Designation</label>
                                    <input type="text" placeholder="Designation" name="designation"
                                        value="{{ $profileData->designation }}"
                                        class="form-control form-control-sm form-control-solid">
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group mb-2">
                                    <label for="" class="mb-2">Email</label>
                                    <input type="text" placeholder="Email" name="email"
                                        value="{{ $profileData->email }}"
                                        class="form-control form-control-sm form-control-solid">
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group mb-2">
                                    <label for="" class="mb-2">Phone</label>
                                    <input type="text" placeholder="Phone" name="phone"
                                        value="{{ $profileData->phone }}"
                                        class="form-control form-control-sm form-control-solid">
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group mb-2">
                                    <label for="" class="mb-2">Company Name</label>
                                    <input type="text" placeholder="Company Name" name="company_name"
                                        value="{{ $profileData->company_name }}"
                                        class="form-control form-control-sm form-control-solid">
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group mb-2">
                                    <label for="" class="mb-2">Address</label>
                                    <input type="text" placeholder="Address" name="address"
                                        value="{{ $profileData->address }}"
                                        class="form-control form-control-sm form-control-solid">
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group mb-2">
                                    <label for="" class="mb-2">Biometric Id</label>
                                    <input type="text" placeholder="Biometric Id" name="biometric_id"
                                        value="{{ $profileData->biometric_id }}"
                                        class="form-control form-control-sm form-control-solid">
                                </div>
                            </div>

                            <div class="col-4">
                                <!--begin::Input group-->
                                <div class="mb-7">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2">
                                        <span>Update Image</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                            title="Allowed file types: png, jpg, jpeg."></i>
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Image input wrapper-->
                                    <div class="mt-1">
                                        <!--begin::Image input-->
                                        <div class="image-input image-input-outline" data-kt-image-input="true"
                                            style="background-image: url('assets/media/svg/avatars/blank.svg')">
                                            <!--begin::Preview existing avatar-->
                                            <div class="image-input-wrapper w-125px h-125px"
                                                style="background-image: url(assets/media/avatars/300-6.jpg">
                                            </div>
                                            <!--end::Preview existing avatar-->
                                            <!--begin::Edit-->
                                            <label
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                title="Change avatar">
                                                <i class="bi bi-pencil-fill fs-7"></i>
                                                <!--begin::Inputs-->
                                                <input type="file" name="photo" accept=".png, .jpg, .jpeg" />
                                                <input type="hidden" name="avatar_remove" />
                                                <!--end::Inputs-->
                                            </label>
                                            <!--end::Edit-->
                                            <!--begin::Cancel-->
                                            <span
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                title="Cancel avatar">
                                                <i class="bi bi-x fs-2"></i>
                                            </span>
                                            <!--end::Cancel-->
                                            <!--begin::Remove-->
                                            <span
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                title="Remove avatar">
                                                <i class="bi bi-x fs-2"></i>
                                            </span>
                                            <!--end::Remove-->
                                        </div>
                                        <!--end::Image input-->
                                    </div>
                                    <!--end::Image input wrapper-->

                                </div>
                                <!--end::Input group-->
                            </div>

                        </div>

                    </div>

                    <div class="modal-footer">

                        <button type="submit" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>

                        <button type="submit" class="btn btn-primary btn-sm">Update Profile</button>
                    </div>

                </form>

            </div>
        </div>
    </div> --}}

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
