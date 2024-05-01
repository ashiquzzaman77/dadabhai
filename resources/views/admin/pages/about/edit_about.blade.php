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
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">About</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">

                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Edit About</li>
                    <!--end::Item-->

                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->

            <!--begin::Actions-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">

                <a href="{{ route('all.about') }}" class="btn btn-light-primary btn-sm">Back</a>

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

                <div class="" style="background: #6196A6;height: 50px;">
                    <h6 class="float-end mt-4 text-white me-3 fw-bolder">About Us Edit From</h6>
                </div>

                <div class="card-body">

                    <form action="{{ route('update.about') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" value="{{ $about->id }}">

                        <div class="row mb-4">
                            <div class="col-4 shadow-sm bg-white p-3">

                                <label for="" class="mb-3">Status</label>
                                <select name="status" id="" class="form-select form-select-sm">
                                    <option selected disabled>Choose Tamplate</option>

                                    <option value="tamplate_one"
                                        {{ $about->status == 'tamplate_one' ? 'selected' : '' }}>Template One</option>

                                    <option value="tamplate_two"
                                        {{ $about->status == 'tamplate_two' ? 'selected' : '' }}>Template Two</option>

                                    <option value="tamplate_three"
                                        {{ $about->status == 'tamplate_three' ? 'selected' : '' }}>Template Three
                                    </option>

                                </select>
                            </div>
                        </div>

                        <div class="row">

                            {{-- Breadcrumb & Section --}}
                            <div class="col-6 shadow-sm bg-white border-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="fw-bolder">Breadcrumb & Section</h4>
                                        <hr>
                                        <div class="row">

                                            <div class="col-6 mb-2">
                                                <div class="form-group">
                                                    <label for="">Breadcrumb Title</label>
                                                    <input type="text" class="form-control form-control-sm mt-2"
                                                        name="breadcrumb_title" required value="{{ $about->breadcrumb_title }}">
                                                </div>
                                            </div>

                                            <div class="col-6 mb-2">
                                                <div class="form-group">
                                                    <label for="">Breadcrumb Sub Title</label>
                                                    <input type="text" required class="form-control form-control-sm mt-2"
                                                        name="breadcrumb_sub_title"
                                                        value="{{ $about->breadcrumb_sub_title }}">
                                                </div>
                                            </div>

                                            <div class="col-6 mb-2">
                                                <div class="form-group">
                                                    <label for="">Section One Badge</label>
                                                    <input type="text" required class="form-control form-control-sm mt-2"
                                                        name="section_one_badge" value="{{ $about->section_one_badge }}">
                                                </div>
                                            </div>

                                            {{-- <div class="col-6 mb-2">
                                                <div class="form-group">
                                                    <label for="">Section Two Badge</label>
                                                    <input type="text" class="form-control form-control-sm mt-2"
                                                        name="section_two_badge" value="{{ $about->section_two_badge }}">
                                                </div>
                                            </div> --}}

                                            <div class="col-6 mb-2">
                                                <div class="form-group">
                                                    <label for="">Section One Title</label>
                                                    <input type="text" required class="form-control form-control-sm mt-2"
                                                        name="section_one_title" value="{{ $about->section_one_title }}">
                                                </div>
                                            </div>

                                            <div class="col-6 mb-2">
                                                <div class="form-group">
                                                    <label for="">Section One Sub Title</label>
                                                    <input type="text" required class="form-control form-control-sm mt-2"
                                                        name="section_one_sub_title"
                                                        value="{{ $about->section_one_sub_title }}">
                                                </div>
                                            </div>

                                            {{-- <div class="col-6 mb-2">
                                                <div class="form-group">
                                                    <label for="">Section Two Title</label>
                                                    <input type="text" class="form-control form-control-sm mt-2"
                                                        name="section_two_title" value="{{ $about->section_two_title }}">
                                                </div>
                                            </div>

                                            <div class="col-6 mb-2">
                                                <div class="form-group">
                                                    <label for="">Section Two Sub Title</label>
                                                    <input type="text" class="form-control form-control-sm mt-2"
                                                        name="section_two_sub_title"
                                                        value="{{ $about->section_two_sub_title }}">
                                                </div>
                                            </div> --}}

                                            <div class="col-6 mb-2">
                                                <div class="form-group">
                                                    <label for="">Section One Image</label>
                                                    <input type="file" class="form-control form-control-sm mt-2"
                                                        name="section_one_image">

                                                    <img src="{{ asset('upload/about/' . $about->section_one_image) }}"
                                                        style="width: 50px;height:50px;" class="mt-2" alt="">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- CEO Section --}}
                            <div class="col-6 shadow-sm bg-white border-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="fw-bolder">CEO Section</h5>
                                            <hr>
                                            <div class="row">

                                                <div class="col-6 mb-2">
                                                    <div class="form-group">
                                                        <label for="">CEO Section Badge</label>
                                                        <input type="text" class="form-control form-control-sm mt-2"
                                                            name="ceo_section_badge"
                                                            value="{{ $about->ceo_section_badge }}">
                                                    </div>
                                                </div>

                                                <div class="col-6 mb-2">
                                                    <div class="form-group">
                                                        <label for="">CEO Section Title</label>
                                                        <input type="text" class="form-control form-control-sm mt-2"
                                                            name="ceo_section_title"
                                                            value="{{ $about->ceo_section_title }}">
                                                    </div>
                                                </div>

                                                <div class="col-4 mb-2">
                                                    <div class="form-group">
                                                        <label for="">CEO Sub Title</label>
                                                        <input type="text" class="form-control form-control-sm mt-2"
                                                            name="ceo_section_sub_title"
                                                            value="{{ $about->ceo_section_sub_title }}">
                                                    </div>
                                                </div>

                                                <div class="col-4 mb-2">
                                                    <div class="form-group">
                                                        <label for="">CEO Name</label>
                                                        <input type="text" class="form-control form-control-sm mt-2"
                                                            name="ceo_section_ceo_name"
                                                            value="{{ $about->ceo_section_ceo_name }}">
                                                    </div>
                                                </div>

                                                <div class="col-4 mb-2">
                                                    <div class="form-group">
                                                        <label for="">Designation</label>
                                                        <input type="text" class="form-control form-control-sm mt-2"
                                                            name="ceo_section_ceo_designation"
                                                            value="{{ $about->ceo_section_ceo_designation }}">
                                                    </div>
                                                </div>

                                                <div class="col-6 mb-2">
                                                    <div class="form-group">
                                                        <label for="">CEO Image</label>
                                                        <input type="file" class="form-control form-control-sm mt-2"
                                                            name="ceo_section_image">

                                                        <img src="{{ asset('upload/about/' . $about->ceo_section_image) }}"
                                                            style="width: 50px;height:50px;" class="mt-2"
                                                            alt="">
                                                    </div>
                                                </div>

                                                <div class="col-6 mb-2">
                                                    <div class="form-group">
                                                        <label for="">Signature Image</label>
                                                        <input type="file" class="form-control form-control-sm mt-2"
                                                            name="ceo_section_signature_image">
                                                        <img src="{{ asset('upload/about/' . $about->ceo_section_signature_image) }}"
                                                            style="width: 50px;height:50px;" class="mt-2"
                                                            alt="">
                                                    </div>
                                                </div>

                                            </div>
                                    </div>
                                </div>
                            </div>


                            {{-- Description --}}
                            <div class="col-12 shadow-sm bg-white border-3 mt-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">

                                            <div class="col-12 mb-2">
                                                <div class="form-group">
                                                    <label for="" class="mb-3">Section One Description</label>
                                                    <textarea name="section_one_description" class="tinymce_metronic" id="">{!! $about->section_one_description !!}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-12 mb-2">
                                                <div class="form-group">
                                                    <label for="" class="mb-3">Section Two Description</label>
                                                    <textarea name="section_two_description" class="tinymce_metronic" id="">{!! $about->section_two_description !!}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-12 mb-2">
                                                <div class="form-group">
                                                    <label for="" class="mb-3">CEO Description</label>
                                                    <textarea name="ceo_section_description" class="tinymce_metronic"> {!! $about->ceo_section_description !!} </textarea>
                                                </div>
                                            </div>



                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            {{-- Why Choose Us --}}
                            <div class="col-12 mt-4">
                                <h4 class="fw-bolder">Why Choose Us</h5>
                                    <hr>
                            </div>

                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="" class="mb-2">Choose Us Section Title</label>
                                                <input type="text" value="{{ $about->choose_us_section_title }}"
                                                    name="choose_us_section_title" class="form-control form-control-sm">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Card One --}}
                            <div class="col-6 shadow-sm bg-white border-3 mt-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="fw-bolder">Card One</h4>
                                        <hr>
                                        <div class="row">

                                            <div class="col-6 mb-2">
                                                <div class="form-group">
                                                    <label for="">Choose Us One Title</label>
                                                    <input type="text" class="form-control form-control-sm mt-2"
                                                        name="choose_us_one_title"
                                                        value="{{ $about->choose_us_one_title }}">
                                                </div>
                                            </div>

                                            <div class="col-6 mb-2">
                                                <div class="form-group">
                                                    <label for="">Choose Us One Image</label>
                                                    <input type="file" class="form-control form-control-sm mt-2"
                                                        name="choose_us_one_image">

                                                    <img src="{{ asset('upload/about/' . $about->choose_us_one_image) }}"
                                                        style="width: 50px;height:50px;" class="mt-2" alt="">
                                                </div>
                                            </div>

                                            <div class="col-12 mb-2">
                                                <div class="form-group">
                                                    <label for="">Choose Us One Description</label>
                                                    <textarea name="choose_us_one_description" class="form-control" id="" cols="3" rows="3">{!! $about->choose_us_one_description !!}</textarea>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Card Two --}}
                            <div class="col-6 shadow-sm bg-white border-3 mt-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="fw-bolder">Card Two</h4>
                                        <hr>
                                        <div class="row">

                                            <div class="col-6 mb-2">
                                                <div class="form-group">
                                                    <label for="">Choose Us Two Title</label>
                                                    <input type="text" class="form-control form-control-sm mt-2"
                                                        name="choose_us_two_title"
                                                        value="{{ $about->choose_us_two_title }}">
                                                </div>
                                            </div>

                                            <div class="col-6 mb-2">
                                                <div class="form-group">
                                                    <label for="">Choose Us Two Image</label>
                                                    <input type="file" class="form-control form-control-sm mt-2"
                                                        name="choose_us_two_image">

                                                    <img src="{{ asset('upload/about/' . $about->choose_us_two_image) }}"
                                                        style="width: 50px;height:50px;" class="mt-2" alt="">
                                                </div>
                                            </div>

                                            <div class="col-12 mb-2">
                                                <div class="form-group">
                                                    <label for="">Choose Us Two Description</label>
                                                    <textarea name="choose_us_two_description" class="form-control" id="" cols="3" rows="3">{!! $about->choose_us_two_description !!}</textarea>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Card Three --}}
                            <div class="col-6 shadow-sm bg-white border-3 mt-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="fw-bolder">Card Three</h4>
                                        <hr>
                                        <div class="row">

                                            <div class="col-6 mb-2">
                                                <div class="form-group">
                                                    <label for="">Choose Us Three Title</label>
                                                    <input type="text" class="form-control form-control-sm mt-2"
                                                        name="choose_us_three_title"
                                                        value="{{ $about->choose_us_three_title }}">
                                                </div>
                                            </div>

                                            <div class="col-6 mb-2">
                                                <div class="form-group">
                                                    <label for="">Choose Us Three Image</label>
                                                    <input type="file" class="form-control form-control-sm mt-2"
                                                        name="choose_us_three_image">

                                                    <img src="{{ asset('upload/about/' . $about->choose_us_three_image) }}"
                                                        style="width: 50px;height:50px;" class="mt-2" alt="">
                                                </div>
                                            </div>

                                            <div class="col-12 mb-2">
                                                <div class="form-group">
                                                    <label for="">Choose Us Three Description</label>
                                                    <textarea name="choose_us_three_description" class="form-control" id="" cols="3" rows="3">{!! $about->choose_us_three_description !!}</textarea>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            {{-- Contact Section --}}
                            <div class="col-12 mt-4">
                                <h4 class="fw-bolder">Contact Section</h5>
                                    <hr>
                            </div>

                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-12 mb-2">
                                            <div class="form-group">
                                                <label for="" class="mb-2">Contact Section Title</label>
                                                <input type="text" value="{{ $about->contact_section_title }}"
                                                    name="contact_section_title" class="form-control form-control-sm">
                                            </div>
                                        </div>

                                        <div class="col-3 mb-2">
                                            <div class="form-group">
                                                <label for="">Head Office Title</label>
                                                <input type="text" class="form-control form-control-sm mt-2"
                                                    name="head_office_title" value="{{ $about->head_office_title }}">
                                            </div>
                                        </div>

                                        <div class="col-3 mb-2">
                                            <div class="form-group">
                                                <label for="">Head Office Address</label>
                                                <input type="text" class="form-control form-control-sm mt-2"
                                                    name="head_office_address" value="{{ $about->head_office_address }}">
                                            </div>
                                        </div>

                                        <div class="col-3 mb-2">
                                            <div class="form-group">
                                                <label for="">Head Office Email</label>
                                                <input type="email" class="form-control form-control-sm mt-2"
                                                    name="head_office_email" value="{{ $about->head_office_email }}">
                                            </div>
                                        </div>

                                        <div class="col-3 mb-2">
                                            <div class="form-group">
                                                <label for="">Head Office Phone</label>
                                                <input type="tel" class="form-control form-control-sm mt-2"
                                                    name="head_office_phone" value="{{ $about->head_office_phone }}">
                                            </div>
                                        </div>

                                        <div class="col-3 mb-2">
                                            <div class="form-group">
                                                <label for="">Sub Office One Title</label>
                                                <input type="text" class="form-control form-control-sm mt-2"
                                                    name="sub_office_one_title"
                                                    value="{{ $about->sub_office_one_title }}">
                                            </div>
                                        </div>

                                        <div class="col-3 mb-2">
                                            <div class="form-group">
                                                <label for="">Sub Office One Address</label>
                                                <input type="text" class="form-control form-control-sm mt-2"
                                                    name="sub_office_one_address"
                                                    value="{{ $about->sub_office_one_address }}">
                                            </div>
                                        </div>

                                        <div class="col-3 mb-2">
                                            <div class="form-group">
                                                <label for="">Sub Office One Email</label>
                                                <input type="email" class="form-control form-control-sm mt-2"
                                                    name="sub_office_one_email"
                                                    value="{{ $about->sub_office_one_email }}">
                                            </div>
                                        </div>

                                        <div class="col-3 mb-2">
                                            <div class="form-group">
                                                <label for="">Sub Office One Phone</label>
                                                <input type="tel" class="form-control form-control-sm mt-2"
                                                    name="sub_office_one_phone"
                                                    value="{{ $about->sub_office_one_phone }}">
                                            </div>
                                        </div>

                                        <div class="col-3 mb-2">
                                            <div class="form-group">
                                                <label for="">Sub Office Two Title</label>
                                                <input type="text" class="form-control form-control-sm mt-2"
                                                    name="sub_office_two_title"
                                                    value="{{ $about->sub_office_two_title }}">
                                            </div>
                                        </div>

                                        <div class="col-3 mb-2">
                                            <div class="form-group">
                                                <label for="">Sub Office Two Address</label>
                                                <input type="text" class="form-control form-control-sm mt-2"
                                                    name="sub_office_two_address"
                                                    value="{{ $about->sub_office_two_address }}">
                                            </div>
                                        </div>

                                        <div class="col-3 mb-2">
                                            <div class="form-group">
                                                <label for="">Sub Office Two Email</label>
                                                <input type="email" class="form-control form-control-sm mt-2"
                                                    name="sub_office_two_email"
                                                    value="{{ $about->sub_office_two_email }}">
                                            </div>
                                        </div>

                                        <div class="col-3 mb-2">
                                            <div class="form-group">
                                                <label for="">Sub Office Two Phone</label>
                                                <input type="tel" class="form-control form-control-sm mt-2"
                                                    name="sub_office_two_phone"
                                                    value="{{ $about->sub_office_two_phone }}">
                                            </div>
                                        </div>


                                        <div class="col-3 mb-2">
                                            <div class="form-group">
                                                <label for="">Sub Office Three Title</label>
                                                <input type="text" class="form-control form-control-sm mt-2"
                                                    name="sub_office_three_title"
                                                    value="{{ $about->sub_office_three_title }}">
                                            </div>
                                        </div>

                                        <div class="col-3 mb-2">
                                            <div class="form-group">
                                                <label for="">Sub Office Three Address</label>
                                                <input type="text" class="form-control form-control-sm mt-2"
                                                    name="sub_office_three_address"
                                                    value="{{ $about->sub_office_three_address }}">
                                            </div>
                                        </div>

                                        <div class="col-3 mb-2">
                                            <div class="form-group">
                                                <label for="">Sub Office Three Email</label>
                                                <input type="email" class="form-control form-control-sm mt-2"
                                                    name="sub_office_three_email"
                                                    value="{{ $about->sub_office_three_email }}">
                                            </div>
                                        </div>

                                        <div class="col-3 mb-2">
                                            <div class="form-group">
                                                <label for="">Sub Office Three Phone</label>
                                                <input type="tel" class="form-control form-control-sm mt-2"
                                                    name="sub_office_three_phone"
                                                    value="{{ $about->sub_office_three_phone }}">
                                            </div>
                                        </div>

                                        <div class="col-3 mb-2">
                                            <div class="form-group">
                                                <label for="">Sub Office Four Title</label>
                                                <input type="text" class="form-control form-control-sm mt-2"
                                                    name="sub_office_four_title"
                                                    value="{{ $about->sub_office_four_title }}">
                                            </div>
                                        </div>

                                        <div class="col-3 mb-2">
                                            <div class="form-group">
                                                <label for="">Sub Office Four Address</label>
                                                <input type="text" class="form-control form-control-sm mt-2"
                                                    name="sub_office_four_address"
                                                    value="{{ $about->sub_office_four_address }}">
                                            </div>
                                        </div>

                                        <div class="col-3 mb-2">
                                            <div class="form-group">
                                                <label for="">Sub Office Four Email</label>
                                                <input type="email" class="form-control form-control-sm mt-2"
                                                    name="sub_office_four_email"
                                                    value="{{ $about->sub_office_four_email }}">
                                            </div>
                                        </div>

                                        <div class="col-3 mb-2">
                                            <div class="form-group">
                                                <label for="">Sub Office Four Phone</label>
                                                <input type="tel" class="form-control form-control-sm mt-2"
                                                    name="sub_office_four_phone"
                                                    value="{{ $about->sub_office_four_phone }}">
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>

                            <hr>

                            {{-- Counter --}}

                            <div class="col-12 mt-4">
                                <h4 class="fw-bolder">Counter Section</h5>
                                    <hr>
                            </div>

                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-3 mb-2">
                                            <div class="form-group">
                                                <label for="">Counter One Value</label>
                                                <input type="text" class="form-control form-control-sm mt-2"
                                                    name="counter_one_value" value="{{ $about->counter_one_value }}">
                                            </div>
                                        </div>

                                        <div class="col-3 mb-2">
                                            <div class="form-group">
                                                <label for="">Counter One Title</label>
                                                <input type="text" class="form-control form-control-sm mt-2"
                                                    name="counter_one_title" value="{{ $about->counter_one_title }}">
                                            </div>
                                        </div>

                                        <div class="col-3 mb-2">
                                            <div class="form-group">
                                                <label for="">Counter Two Value</label>
                                                <input type="text" class="form-control form-control-sm mt-2"
                                                    name="counter_two_value" value="{{ $about->counter_two_value }}">
                                            </div>
                                        </div>

                                        <div class="col-3 mb-2">
                                            <div class="form-group">
                                                <label for="">Counter Two Title</label>
                                                <input type="text" class="form-control form-control-sm mt-2"
                                                    name="counter_two_title" value="{{ $about->counter_two_title }}">
                                            </div>
                                        </div>

                                        <div class="col-3 mb-2">
                                            <div class="form-group">
                                                <label for="">Counter Three Value</label>
                                                <input type="text" class="form-control form-control-sm mt-2"
                                                    name="counter_three_value" value="{{ $about->counter_three_value }}">
                                            </div>
                                        </div>

                                        <div class="col-3 mb-2">
                                            <div class="form-group">
                                                <label for="">Counter Three Title</label>
                                                <input type="text" class="form-control form-control-sm mt-2"
                                                    name="counter_three_title" value="{{ $about->counter_three_title }}">
                                            </div>
                                        </div>

                                        <div class="col-3 mb-2">
                                            <div class="form-group">
                                                <label for="">Counter Four Value</label>
                                                <input type="text" class="form-control form-control-sm mt-2"
                                                    name="counter_four_value" value="{{ $about->counter_four_value }}">
                                            </div>
                                        </div>

                                        <div class="col-3 mb-2">
                                            <div class="form-group">
                                                <label for="">Counter Four Title</label>
                                                <input type="text" class="form-control form-control-sm mt-2"
                                                    name="counter_four_title" value="{{ $about->counter_four_title }}">
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="row mt-3">
                            <div class="col-12">
                                <button type="submit" class="btn btn-light-primary btn-sm float-end">Update
                                    About</button>
                            </div>
                        </div>

                    </form>

                </div>

            </div>
        </div>

    </div>


    <!--end::Post-->
@endsection
