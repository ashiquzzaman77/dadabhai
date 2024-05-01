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
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Employee Category</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">

                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Total Employee Category <span
                            class="ms-2 badge bg-danger">{{ count($employcats) }}</span></li>
                    <!--end::Item-->

                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">

                <a data-bs-toggle="modal" data-bs-target="#addModal" class="btn btn-light-primary btn-sm">Add
                    Employee Category</a>

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
                                <th>Employee Catgory Name</th>
                                <th>Evaluation Period</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employcats as $key => $employcat)
                                <tr>

                                    <td>{{ $key + 1 }}</td>

                                    <td>{{ $employcat->name }}</td>
                                    <td>{{ $employcat->evaluation_period }}</td>

                                    <td>



                                        <a href="" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $employcat->id }}" class="ms-1" title="Edit"><i
                                                class="bi bi-pencil-square fs-3 text-primary"></i></a>

                                        {{-- Edit Modal --}}

                                        <div class="modal fade" id="editModal{{ $employcat->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">

                                                    <div class="modal-header" style="background: #6196A6;height: 50px;">
                                                        <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">
                                                            Update Employee Category</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>

                                                    <form action="{{ route('update.employcat') }}" method="POST"
                                                        enctype="multipart/form-data">

                                                        @csrf

                                                        <input type="hidden" name="id" value="{{ $employcat->id }}">

                                                        <div class="modal-body">

                                                            <div class="row">

                                                                <div class="col-4">

                                                                    <div class="form-group mb-3">
                                                                        <label for="" class="mb-2">Name</label>
                                                                        <input type="text" name="name"
                                                                            value="{{ $employcat->name }}"
                                                                            class="form-control form-control-sm @error('name') is-invalid @enderror"
                                                                            placeholder="Employee Category Name"
                                                                            autocomplete="off">
                                                                        @error('name')
                                                                            <span class="text-danger"> {{ $message }}
                                                                            </span>
                                                                        @enderror
                                                                    </div>

                                                                </div>

                                                                <div class="col-3">

                                                                    <div class="form-group mb-3">
                                                                        <label for="" class="mb-2">Evaluaton
                                                                            Period</label>
                                                                        <input type="number" name="evaluation_period"
                                                                            value="{{ $employcat->evaluation_period }}"
                                                                            class="form-control form-control-sm @error('evaluation_period') is-invalid @enderror"
                                                                            placeholder="Evaluaton Period"
                                                                            autocomplete="off">
                                                                        @error('evaluation_period')
                                                                            <span class="text-danger"> {{ $message }}
                                                                            </span>
                                                                        @enderror
                                                                    </div>

                                                                </div>

                                                                <div class="col-2">

                                                                    <div class="form-group mb-3">
                                                                        <label for="" class="mb-2">Total
                                                                            Leave</label>
                                                                        <input type="number" name="total_leave"
                                                                            value="{{ $employcat->total_leave }}"
                                                                            class="form-control form-control-sm @error('total_leave') is-invalid @enderror"
                                                                            placeholder="Total Leave" autocomplete="off">
                                                                        @error('total_leave')
                                                                            <span class="text-danger"> {{ $message }}
                                                                            </span>
                                                                        @enderror
                                                                    </div>

                                                                </div>

                                                                <div class="col-3">

                                                                    <div class="form-group mb-3">
                                                                        <label for="" class="mb-2">Monthly Earned
                                                                            Leave</label>
                                                                        <input type="number" name="monthly_earned_leave"
                                                                            value="{{ $employcat->monthly_earned_leave }}"
                                                                            class="form-control form-control-sm"
                                                                            placeholder="Total Leave" autocomplete="off">
                                                                    </div>

                                                                </div>

                                                                <div class="col-4">

                                                                    <div class="form-group mb-3">
                                                                        <label for="" class="mb-2">Monthly Earned
                                                                            Leave Duration</label>
                                                                        <input type="number"
                                                                            name="monthly_earned_leave_availability_duration"
                                                                            value="{{ $employcat->monthly_earned_leave_availability_duration }}"
                                                                            class="form-control form-control-sm"
                                                                            placeholder="Monthly Earned Leave Duration"
                                                                            autocomplete="off">
                                                                    </div>

                                                                </div>

                                                                <div class="col-4">

                                                                    <div class="form-group mb-3">
                                                                        <label for="" class="mb-2">Monthly
                                                                            Casual Leave</label>
                                                                        <input type="number" name="monthly_casual_leave"
                                                                            value="{{ $employcat->monthly_casual_leave }}"
                                                                            class="form-control form-control-sm"
                                                                            placeholder="Monthly Casual Leave<"
                                                                            autocomplete="off">
                                                                    </div>

                                                                </div>

                                                                <div class="col-4">

                                                                    <div class="form-group mb-3">
                                                                        <label for="" class="mb-2">Monthly
                                                                            Casual Leave Duration</label>
                                                                        <input type="number"
                                                                            name="monthly_casual_leave_availability_duration"
                                                                            value="{{ $employcat->monthly_casual_leave_availability_duration }}"
                                                                            class="form-control form-control-sm"
                                                                            placeholder="Monthly Casual Leave Duration"
                                                                            autocomplete="off">
                                                                    </div>

                                                                </div>

                                                                <div class="col-4">

                                                                    <div class="form-group mb-3">
                                                                        <label for="" class="mb-2">Monthly
                                                                            Medical Leave</label>
                                                                        <input type="number" name="monthly_medical_leave"
                                                                            value="{{ $employcat->monthly_medical_leave }}"
                                                                            class="form-control form-control-sm"
                                                                            placeholder="Monthly Medical Leave"
                                                                            autocomplete="off">
                                                                    </div>

                                                                </div>

                                                                <div class="col-4">

                                                                    <div class="form-group mb-3">
                                                                        <label for="" class="mb-2">Monthly
                                                                            Medical Leave Duration</label>
                                                                        <input type="number"
                                                                            name="monthly_medical_leave_availability_duration"
                                                                            value="{{ $employcat->monthly_medical_leave_availability_duration }}"
                                                                            class="form-control form-control-sm"
                                                                            placeholder="Monthly Medical Leave Duration"
                                                                            autocomplete="off">
                                                                    </div>

                                                                </div>

                                                                <div class="col-4">
                                                                    <div class="form-group mb-3">
                                                                        <label for="" class="mb-2">Yarly Earned
                                                                            Leave</label>
                                                                        <input type="number" name="yearly_earned_leave"
                                                                            value="{{ $employcat->yearly_earned_leave }}"
                                                                            class="form-control form-control-sm"
                                                                            placeholder="Yarly Earned Leave"
                                                                            autocomplete="off">
                                                                    </div>
                                                                </div>

                                                                <div class="col-4">
                                                                    <div class="form-group mb-3">
                                                                        <label for="" class="mb-2">Yarly Causal
                                                                            Leave</label>
                                                                        <input type="number" name="yearly_casual_leave"
                                                                            value="{{ $employcat->yearly_casual_leave }}"
                                                                            class="form-control form-control-sm"
                                                                            placeholder="Yarly Causal Leave"
                                                                            autocomplete="off">
                                                                    </div>
                                                                </div>

                                                                <div class="col-4">
                                                                    <div class="form-group mb-3">
                                                                        <label for="" class="mb-2">Yarly Medical
                                                                            Leave</label>
                                                                        <input type="number" name="yearly_medical_leave"
                                                                            value="{{ $employcat->yearly_medical_leave }}"
                                                                            class="form-control form-control-sm"
                                                                            placeholder="Yarly Medical Leave"
                                                                            autocomplete="off">
                                                                    </div>
                                                                </div>


                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary btn-sm">Save
                                                                Change</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Delete --}}
                                        <a href="{{ route('delete.employcat',$employcat->id) }}" class="ms-1" id="delete" title="Delete"><i
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header" style="background: #6196A6;height: 50px;">
                    <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Add Employee Category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('store.employcat') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="modal-body">

                        <div class="row">

                            <div class="col-4">

                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">Name</label>
                                    <input type="text" name="name"
                                        class="form-control form-control-sm @error('name') is-invalid @enderror"
                                        placeholder="Employee Category Name" autocomplete="off">
                                    @error('name')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="col-3">

                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">Evaluaton Period</label>
                                    <input type="number" name="evaluation_period"
                                        class="form-control form-control-sm @error('evaluation_period') is-invalid @enderror"
                                        placeholder="Evaluaton Period" autocomplete="off">
                                    @error('evaluation_period')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="col-2">

                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">Total Leave</label>
                                    <input type="number" name="total_leave"
                                        class="form-control form-control-sm @error('total_leave') is-invalid @enderror"
                                        placeholder="Total Leave" autocomplete="off">
                                    @error('total_leave')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="col-3">

                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">Monthly Earned Leave</label>
                                    <input type="number" name="monthly_earned_leave"
                                        class="form-control form-control-sm" placeholder="Total Leave"
                                        autocomplete="off">
                                </div>

                            </div>

                            <div class="col-4">

                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">Monthly Earned Leave Duration</label>
                                    <input type="number" name="monthly_earned_leave_availability_duration"
                                        class="form-control form-control-sm" placeholder="Monthly Earned Leave Duration"
                                        autocomplete="off">
                                </div>

                            </div>

                            <div class="col-4">

                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">Monthly Casual Leave</label>
                                    <input type="number" name="monthly_casual_leave"
                                        class="form-control form-control-sm" placeholder="Monthly Casual Leave<"
                                        autocomplete="off">
                                </div>

                            </div>

                            <div class="col-4">

                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">Monthly Casual Leave Duration</label>
                                    <input type="number" name="monthly_casual_leave_availability_duration"
                                        class="form-control form-control-sm" placeholder="Monthly Casual Leave Duration"
                                        autocomplete="off">
                                </div>

                            </div>

                            <div class="col-4">

                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">Monthly Medical Leave</label>
                                    <input type="number" name="monthly_medical_leave"
                                        class="form-control form-control-sm" placeholder="Monthly Medical Leave"
                                        autocomplete="off">
                                </div>

                            </div>

                            <div class="col-4">

                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">Monthly Medical Leave Duration</label>
                                    <input type="number" name="monthly_medical_leave_availability_duration"
                                        class="form-control form-control-sm" placeholder="Monthly Medical Leave Duration"
                                        autocomplete="off">
                                </div>

                            </div>

                            <div class="col-4">
                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">Yarly Earned Leave</label>
                                    <input type="number" name="yearly_earned_leave" class="form-control form-control-sm"
                                        placeholder="Yarly Earned Leave" autocomplete="off">
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">Yarly Causal Leave</label>
                                    <input type="number" name="yearly_casual_leave" class="form-control form-control-sm"
                                        placeholder="Yarly Causal Leave" autocomplete="off">
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">Yarly Medical Leave</label>
                                    <input type="number" name="yearly_medical_leave"
                                        class="form-control form-control-sm" placeholder="Yarly Medical Leave"
                                        autocomplete="off">
                                </div>
                            </div>


                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm">Save Change</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->

    {{-- Image Show  --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
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
