@extends('admin.admin_dashboard')
@section('admin')
    <!--begin::Toolbar-->
    <div class="toolbar mb-0">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">

            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Employee
                </h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="javascript:;" class="text-muted text-hover-primary">Add Employee Details</a>
                    </li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->

            <!--begin::Actions-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <!--begin::Filter menu-->
                <div class="m-0">


                </div>

                <!--begin::Primary button-->
                <a href="{{ route('all.employee.details') }}" class="btn btn-light-primary btn-sm">Back</a>
                <!--end::Primary button-->

            </div>
            <!--end::Actions-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->

    <!--begin::Layout-->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">


                    <!--begin::Stepper-->
                    <div class="stepper stepper-pills" id="kt_stepper_example_basic">

                        <div class="row">

                            {{-- Left SideBar  --}}
                            <div class="col-12">
                                <!--begin::Nav-->
                                <div class="stepper-nav">
                                    <!--begin::Step 1-->
                                    <div class="stepper-item mx-2 my-4 current" data-kt-stepper-element="nav">
                                        <!--begin::Line-->
                                        <div class="stepper-line"></div>
                                        <!--end::Line-->

                                        <!--begin::Icon-->
                                        <div class="stepper-icon w-40px h-40px">
                                            <i class="stepper-check fas fa-check"></i>
                                            <span class="stepper-number">1</span>
                                        </div>
                                        <!--end::Icon-->

                                        <!--begin::Label-->
                                        <div class="stepper-label">
                                            <h3 class="stepper-title">
                                                Step 1
                                            </h3>

                                            <div class="stepper-desc">
                                                Personal Information
                                            </div>
                                        </div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Step 1-->

                                    <!--begin::Step 2-->
                                    <div class="stepper-item mx-2 my-4" data-kt-stepper-element="nav">
                                        <!--begin::Line-->
                                        <div class="stepper-line w-40px"></div>
                                        <!--end::Line-->

                                        <!--begin::Icon-->
                                        <div class="stepper-icon w-40px h-40px">
                                            <i class="stepper-check fas fa-check"></i>
                                            <span class="stepper-number">2</span>
                                        </div>
                                        <!--begin::Icon-->

                                        <!--begin::Label-->
                                        <div class="stepper-label">
                                            <h3 class="stepper-title">
                                                Step 2
                                            </h3>

                                            <div class="stepper-desc">
                                                Job & Academic Info
                                            </div>
                                        </div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Step 2-->

                                    <!--begin::Step 3-->
                                    <div class="stepper-item mx-2 my-4" data-kt-stepper-element="nav">
                                        <!--begin::Line-->
                                        <div class="stepper-line w-40px"></div>
                                        <!--end::Line-->

                                        <!--begin::Icon-->
                                        <div class="stepper-icon w-40px h-40px">
                                            <i class="stepper-check fas fa-check"></i>
                                            <span class="stepper-number">3</span>
                                        </div>
                                        <!--begin::Icon-->

                                        <!--begin::Label-->
                                        <div class="stepper-label">
                                            <h3 class="stepper-title">
                                                Step 3
                                            </h3>

                                            <div class="stepper-desc">
                                                Emergency Contact
                                            </div>
                                        </div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Step 3-->

                                    <!--begin::Step 4-->
                                    <div class="stepper-item mx-2 my-4" data-kt-stepper-element="nav">
                                        <!--begin::Line-->
                                        <div class="stepper-line w-40px"></div>
                                        <!--end::Line-->

                                        <!--begin::Icon-->
                                        <div class="stepper-icon w-40px h-40px">
                                            <i class="stepper-check fas fa-check"></i>
                                            <span class="stepper-number">4</span>
                                        </div>
                                        <!--begin::Icon-->

                                        <!--begin::Label-->
                                        <div class="stepper-label">
                                            <h3 class="stepper-title">
                                                Step 4
                                            </h3>

                                            <div class="stepper-desc">
                                                Acknowledge/Sign
                                            </div>
                                        </div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Step 4-->
                                </div>
                                <!--end::Nav-->
                            </div>

                            {{-- Right SideBar --}}
                            <div class="col-12 mt-5 shadow-sm p-5">
                                <!--begin::Form-->
                                <form class="form" novalidate="novalidate" action="{{ route('store.employee.details') }}" method="POST" id="kt_stepper_example_basic_form" enctype="multipart/form-data">

                                    @csrf

                                    <!--begin::Group-->
                                    <div class="mb-5">

                                        <!--Personal Information-->
                                        <div class="flex-column current" data-kt-stepper-element="content">

                                            <h3 class="text-danger">Personal Information</h3>
                                            <hr>

                                            <div class="row">

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Name</label>
                                                        <input type="text" placeholder="Name"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="name">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Alternate Email</label>
                                                        <input type="email" placeholder="Alternate Email"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="alternate_email">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">DOB</label>
                                                        <input type="date"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="birth_date">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Nid Card</label>
                                                        <input type="text"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="nid_bri_ppn" placeholder="Nid Number">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Address</label>
                                                        <input type="text" placeholder="Address"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="address">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">City</label>
                                                        <input type="text" placeholder="City"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="city">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Postal</label>
                                                        <input type="text" placeholder="Postal"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="postal">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Role</label>
                                                        <select name="role"
                                                            class="form-select form-select-sm form-select-solid"
                                                            data-control="select2" data-placeholder="Select an Role"
                                                            data-allow-clear="true">
                                                            <option></option>
                                                            <option value="admin">Admin</option>
                                                            <option value="manager">Manager</option>
                                                            <option value="other">Other</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                {{-- <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Department</label>
                                                        <input type="text" placeholder="Department"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="department">
                                                    </div>
                                                </div> --}}

                                                <div class="col-6">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Department Name</label>
                                                        <select name="employee_department_id"
                                                            class="form-select form-select-sm form-select-solid"
                                                            data-control="select2" data-placeholder="Select an Department"
                                                            data-allow-clear="true">
                                                            <option></option>
                                                            <!-- Blank option for placeholder -->
                                                            @foreach ($employeeDepartments as $employeeDepartment)
                                                                <option value="{{ $employeeDepartment->id }}">
                                                                    {{ $employeeDepartment->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Employee Category</label>
                                                        <select name="employee_category_id"
                                                            class="form-select form-select-sm form-select-solid"
                                                            data-control="select2" data-placeholder="Select an Category"
                                                            data-allow-clear="true">
                                                            <option></option>
                                                            <!-- Blank option for placeholder -->
                                                            @foreach ($employeeCategories as $employeeCategory)
                                                                <option value="{{ $employeeCategory->id }}">
                                                                    {{ $employeeCategory->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Father Name</label>
                                                        <input type="text" placeholder="Father Name"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="father_name">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Father Service</label>
                                                        <input type="text" placeholder="Father Service"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="father_service">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Mother Name</label>
                                                        <input type="text" placeholder="Mother Name"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="mother_name">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Mother Service</label>
                                                        <input type="text" placeholder="Mother Service"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="mother_service">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Brothers Total</label>
                                                        <input type="text" placeholder="Brothers Total"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="brothers_total">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Sisters Total</label>
                                                        <input type="text" placeholder="Sisters Total"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="sisters_total">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Sibling Contact One</label>
                                                        <input type="text" placeholder="Sibling Info One"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="siblings_contact_info_one">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Sibling Contact Two</label>
                                                        <input type="text" placeholder="Sibling Info Two"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="siblings_contact_info_two">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Married Status</label>
                                                        <select name="marital_status"
                                                            class="form-select form-select-sm form-select-solid"
                                                            data-control="select2"
                                                            data-placeholder="Select an Married Status"
                                                            data-allow-clear="true">
                                                            <option></option>
                                                            <!-- Blank option for placeholder -->
                                                            <option value="single">Single</option>
                                                            <option value="married">Married</option>
                                                            <option value="divorced">Divorced</option>
                                                            <option value="widowed">Widowed</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Spouse Name</label>
                                                        <input type="text" placeholder="Spouse Name"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="spouse_name">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Spouse Employer</label>
                                                        <input type="text" placeholder="Spouse Employer"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="spouse_employer">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Spouse Phone</label>
                                                        <input type="text" placeholder="Spouse Phone"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="spouse_work_phone">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Permanent Address</label>
                                                        <input type="text" placeholder="Permanent Address"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="permanent_address">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Permanent Address
                                                            City</label>
                                                        <input type="text" placeholder="Permanent Address City"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="permanent_address_city">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Permanent Address
                                                            State</label>
                                                        <input type="text" placeholder="Permanent Address State"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="permanent_address_state">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Permanent Address Zip
                                                            Code</label>
                                                        <input type="text" placeholder="Permanent Address Zip Code"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="permanent_address_zip_code">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Current Address</label>
                                                        <input type="text" placeholder="Current Address"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="current_address">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Current Address
                                                            City</label>
                                                        <input type="text" placeholder="Current Address City"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="current_address_city">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Current Address
                                                            State</label>
                                                        <input type="text" placeholder="Current Address State"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="current_address_state">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Current Address Zip
                                                            Code</label>
                                                        <input type="text" placeholder="Current Address Zip Code"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="current_address_zip_code">
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        <!--Personal Information-->

                                        <!-- Job & Academic Info -->
                                        <div class="flex-column" data-kt-stepper-element="content">

                                            <h3 class="text-danger">Job & Academic Info</h3>
                                            <hr>

                                            <div class="row">

                                                <div class="col-4">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">University</label>
                                                        <input type="text" placeholder="University"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="university">
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Major Subjects</label>
                                                        <input type="email" placeholder="Major Subjects"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="major_subjects">
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Passing Year</label>
                                                        <input type="text" placeholder="Passing Year"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="passing_year">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Academic Achievements</label>
                                                        <input type="text" placeholder="Academic Achievements"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="academic_achievements">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Professional
                                                            Achievements</label>
                                                        <input type="text" placeholder="Professional Achievements"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="professional_achievements">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Social Achievements</label>
                                                        <input type="text" placeholder="Social Achievements"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="social_achievements">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Personal Achievements</label>
                                                        <input type="text" placeholder="Personal Achievements"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="personal_achievements">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Training Information</label>
                                                        <input type="text" placeholder="Training Information"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="other_training_information_technical_training">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Training Duration
                                                            Month</label>
                                                        <input type="text" placeholder="Training Duration Month"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="technical_training_duration_date">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Other Training
                                                            Information</label>
                                                        <input type="text" placeholder="Orther Training Information"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="other_training_information_certificate_course">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Other Training Duration
                                                            Month</label>
                                                        <input type="text" placeholder="Orther Training Duration Month"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="certificate_course_duration_date">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Total Year Experience</label>
                                                        <input type="text" placeholder="Total Year Experience"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="total_years_of_job_experience">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Related Experience</label>
                                                        <input type="text" placeholder="Related Experience"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="total_years_of_related_experience">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Lowest Job Duration</label>
                                                        <input type="text" placeholder="Lowest Job Duration"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="lowest_job_duration_in_past">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Highest Job Duration</label>
                                                        <input type="text" placeholder="Highest Job Duration"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="highest_job_duration_in_past">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Negative Situation</label>
                                                        <input type="text" placeholder="Negative Situation"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="action_in_negative_situation">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Recent Job Info
                                                            Company</label>
                                                        <input type="text" placeholder="Recent Job Info Company"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="recent_job_info_one_company_name">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Recent Job Company
                                                            Address</label>
                                                        <input type="text" placeholder="Recent Job Company Address"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="recent_job_info_one_address">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Recent Job
                                                            Designation</label>
                                                        <input type="text" placeholder="Recent Job Designation"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="recent_job_info_one_designation">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Recent Job Contact</label>
                                                        <input type="text" placeholder="Recent Job Contact"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="recent_job_info_one_contact_no">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Recent Job Duration</label>
                                                        <input type="text" placeholder="Recent Job Duration"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="recent_job_info_one_duration">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Job Other Company</label>
                                                        <input type="text" placeholder="Job Other Company"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="recent_job_info_two_company_name">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Job Other Company
                                                            Address</label>
                                                        <input type="text" placeholder="Job Other Company Address"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="recent_job_info_two_address">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Job Other Company
                                                            Designation</label>
                                                        <input type="text" placeholder="Job Other Company Designation"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="recent_job_info_two_designation">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Job Other Company
                                                            Contact</label>
                                                        <input type="text" placeholder="Job Other Company Contact"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="recent_job_info_two_contact_no">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Job Other Company
                                                            Duration</label>
                                                        <input type="text" placeholder="Job Other Company Duration"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="recent_job_info_two_duration">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Professional Reference
                                                            Name</label>
                                                        <input type="text" placeholder="Professional Reference Name"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="professional_reference_name">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Professional Reference
                                                            Address</label>
                                                        <input type="text" placeholder="Professional Reference Address"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="professional_reference_address">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Professional Reference
                                                            Contact</label>
                                                        <input type="text" placeholder="Professional Reference Contact"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="professional_reference_contact_no_one">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Professional Reference Cont.
                                                            Two</label>
                                                        <input type="text"
                                                            placeholder="Professional Reference Contact Two"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="professional_reference_contact_no_two">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Professional Reference
                                                            Relation</label>
                                                        <input type="text"
                                                            placeholder="Professional Reference Relation"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="professional_reference_contact_relation">
                                                    </div>
                                                </div>


                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Relative Reference
                                                            Name</label>
                                                        <input type="text" placeholder="Relative Reference Name"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="relative_reference_name">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Relative Reference
                                                            Address</label>
                                                        <input type="text" placeholder="Relative Reference Address"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="relative_reference_address">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Relative Reference Contact
                                                            One</label>
                                                        <input type="text" placeholder="Relative Reference Contact One"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="relative_reference_contact_no_one">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Relative Reference Cont.
                                                            Two</label>
                                                        <input type="text" placeholder="Relative Reference Cont. Two"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="relative_reference_contact_no_two">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Relative Reference
                                                            Relation</label>
                                                        <input type="text" placeholder="Relative Reference Relation"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="relative_reference_contact_relation">
                                                    </div>
                                                </div>



                                            </div>

                                        </div>
                                        <!-- Job & Academic Info -->

                                        <!-- Emergency Contact -->
                                        <div class="flex-column" data-kt-stepper-element="content">

                                            <h3 class="text-danger">Emergency Contact</h3>
                                            <hr>

                                            <div class="row">

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Home Phone</label>
                                                        <input type="tel" placeholder="Home Phone"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="home_phone">
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Emergency Number</label>
                                                        <input type="tel" placeholder="Emergency Number"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="emergency_number">
                                                    </div>
                                                </div>

                                                <div class="col-5">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Emergency Contact Persion
                                                            Name</label>
                                                        <input type="text" placeholder="Emergency Contact Persion Name"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="emergency_contact_information_name">
                                                    </div>
                                                </div>


                                                <div class="col-4">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Emergency Contact Persion
                                                            Address</label>
                                                        <input type="text"
                                                            placeholder="Emergency Contact Persion Address"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="emergency_contact_information_address">
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Emergency Contact Persion
                                                            City</label>
                                                        <input type="text" placeholder="Emergency Contact Persion City"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="emergency_contact_information_city">
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Emergency Contact Persion Zip
                                                            Code</label>
                                                        <input type="text"
                                                            placeholder="Emergency Contact Persion Zip Code"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="emergency_contact_information_zip_code">
                                                    </div>
                                                </div>


                                                <div class="col-4">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Emergency Contact Persion
                                                            Phone</label>
                                                        <input type="tel"
                                                            placeholder="Emergency Contact Persion Phone"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="emergency_contact_information_phone">
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Emergency Contact Persion
                                                            Relationship</label>
                                                        <input type="text"
                                                            placeholder="Emergency Contact Persion Relationship"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="emergency_contact_information_relationsip">
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Social Work</label>
                                                        <input type="text"
                                                            placeholder="Social Work"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="concern_with_social_work">
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Social Work</label>
                                                        <input type="text"
                                                            placeholder="Social Work"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="concern_with_social_work">
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Turns Your On Off</label>
                                                        <input type="text"
                                                            placeholder="Turns Your On Off"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="what_turns_you_on_off">
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-2">Perference Professional Life</label>
                                                        <input type="text"
                                                            placeholder="Perference Professional Life"
                                                            class="form-control form-control-sm form-control-solid"
                                                            name="preference_in_professional_life">
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        <!-- Emergency Contact -->

                                        <!-- Acknowledge/Sign -->
                                        <div class="flex-column" data-kt-stepper-element="content">

                                            <h3 class="text-danger">Acknowledge/Sign</h3>
                                            <hr>

                                            <div class="row">

                                                <div class="col-12">

                                                    <p class="mb-4">
                                                        I hereby affirm the accuracy of all the information provided
                                                        above. I am cognizant that any inaccuracies in the details
                                                        shared may lead to appropriate actions by the relevant
                                                        authorities. Additionally, I acknowledge my responsibility to
                                                        promptly disclose any pertinent information required for
                                                        security purposes by the company. This commitment extends to
                                                        being at the disposal of the company for any such disclosures
                                                        deemed necessary.</p>

                                                    <p class="mb-5">Your Sincearly,</p>
                                                </div>


                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label class="p-0 text-start text-black">Sign</label>
                                                        <input type="file" name="sign"
                                                            class="form-control form-control-sm form-control-solid"
                                                            placeholder="Enter Sign">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label class="p-0 text-start text-black">Ceo Sign
                                                        </label>
                                                        <input type="file" name="ceo_sign"
                                                            class="form-control form-control-sm form-control-solid"
                                                            placeholder="Enter Ceo Sign ">
                                                    </div>
                                                </div>


                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label class="p-0 text-start text-black">Operation
                                                            Director Sign
                                                        </label>
                                                        <input type="file" name="operation_director_sign"
                                                            class="form-control form-control-sm form-control-solid"
                                                            placeholder="Enter Operation Director Sign ">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label class="p-0 text-start text-black">Managing
                                                            Director Sign
                                                        </label>
                                                        <input type="file" name="managing_director_sign"
                                                            class="form-control form-control-sm form-control-solid">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label class="p-0 text-start text-black">Sign
                                                            Date</label>
                                                        <input type="date" name="sign_date"
                                                            class="form-control form-control-sm form-control-solid"
                                                            placeholder="Enter Sign Date">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label class="p-0 text-start text-black">Evaluation
                                                            Date</label>
                                                        <input type="date" name="evaluation_date"
                                                            class="form-control form-control-sm form-control-solid"
                                                            placeholder="Enter Evaluation Date">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label class="p-0 text-start text-black">Police
                                                            Verification</label>
                                                        <select name="police_verification"
                                                            class="form-select form-select-sm form-select-solid"
                                                            data-control="select2" data-placeholder="Select an option"
                                                            data-allow-clear="true">
                                                            <option></option>
                                                            <option value="verified">Verified</option>
                                                            <option value="unverified">Unverified</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <label class="p-0 text-start text-black">Acknowledgement</label>
                                                        <select name="acknowledgement"
                                                            class="form-select form-select-sm form-select-solid"
                                                            data-control="select2" data-placeholder="Select an option"
                                                            data-allow-clear="true">
                                                            <option></option>
                                                            <option value="acknowledged">Acknowledged</option>
                                                            <option value="unacknowledged">Unacknowledged
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        <!-- Acknowledge/Sign -->
                                    </div>
                                    <!--end::Group-->

                                    <!--begin::Actions-->
                                    <div class="d-flex flex-stack">
                                        <!--begin::Wrapper-->
                                        <div class="me-2">
                                            <button type="button" class="btn btn-info btn-sm btn-active-light-primary"
                                                data-kt-stepper-action="previous">
                                                Back
                                            </button>
                                        </div>
                                        <!--end::Wrapper-->

                                        <!--begin::Wrapper-->
                                        <div>
                                            <button type="submit" class="btn btn-primary btn-sm"
                                                data-kt-stepper-action="submit">
                                                <span class="indicator-label">
                                                    Submit
                                                </span>
                                                <span class="indicator-progress">
                                                    Please wait... <span
                                                        class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                </span>
                                            </button>

                                            <button type="button" class="btn btn-primary btn-sm"
                                                data-kt-stepper-action="next">
                                                Continue
                                            </button>
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Actions-->
                                </form>
                                <!--end::Form-->
                            </div>

                        </div>

                    </div>
                    <!--end::Stepper-->
                </div>
            </div>
        </div>
    </div>
    <!--end::Layout-->

    <script>
        // Stepper lement
        var element = document.querySelector("#kt_stepper_example_basic");

        // Initialize Stepper
        var stepper = new KTStepper(element);

        // Handle next step
        stepper.on("kt.stepper.next", function(stepper) {
            stepper.goNext(); // go next step
        });

        // Handle previous step
        stepper.on("kt.stepper.previous", function(stepper) {
            stepper.goPrevious(); // go previous step
        });
    </script>

@endsection
