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
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Single Page</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">

                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Add Single Page</li>
                    <!--end::Item-->

                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->

            <!--begin::Actions-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">

                <a href="{{ route('all.single.page') }}" class="btn btn-light-primary btn-sm">Back</a>

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

                {{-- <div class="" style="background: #6196A6;height: 50px;">
                    <h6 class="float-end mt-4 text-white me-3 fw-bolder">S</h6>
                </div> --}}

                <div class="card-body">

                    <form action="{{ route('store.single.page') }}" method="POST" id="myForm"
                        enctype="multipart/form-data">

                        @csrf

                        <!-- Product Info -->

                        {{-- Status  --}}
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">Select Status</label>
                                    <select class="form-select form-select-sm" name="status">
                                        <option selected disabled>Select Status</option>
                                        <option value="active">Active </option>
                                        <option value="inactive">Inactive </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        {{-- Status  --}}

                        {{-- Product Name --}}
                        <div class="mt-1 mb-2">
                            <p class="text-white bg-info text-center shadow-sm"
                                style="position: relative;  top: 20px; width: 13%">Product Area Info</p>
                            <div class="row border border-secondary pt-3">
                                <div class="mb-2">
                                    <div class="form-group">
                                        <label class="form-label">Product Name</label>
                                        <select name="product_id" class="form-control form-control-sm select">
                                            <option selected disabled>Choose Product Name</option>
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Row Two -->
                        <div class="mt-1 mb-2">
                            <p class="text-white bg-info text-center shadow-sm"
                                style="position: relative;  top: 20px; width: 13%">Row Two Area</p>
                            <div class="row border border-secondary pt-3">
                                <div class="col-lg-3">
                                    <div class="mb-2">
                                        <label class="col-form-label pt-0">Row Two Image One</label>
                                        <input type="file" accept="image/*"
                                            class="imageUpload form-control form-control-sm" name="row_two_image_one">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-2">
                                        <label class="col-form-label pt-0">Row Two Image Two</label>
                                        <input type="file" accept="image/*"
                                            class="imageUpload form-control form-control-sm" name="row_two_image_two">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-2">
                                        <label class="col-form-label pt-0">Row Two Image Three</label>
                                        <input type="file" accept="image/*"
                                            class="imageUpload form-control form-control-sm" name="row_two_image_three">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-2">
                                        <label class="col-form-label pt-0">Row Two Image Four</label>
                                        <input type="file" accept="image/*"
                                            class="imageUpload form-control form-control-sm" name="row_two_image_four">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Row Two End-->

                        <!-- Row Three -->
                        <div class="mt-1 mb-2">
                            <p class="text-white bg-info text-center shadow-sm"
                                style="position: relative;  top: 20px; width: 13%">Row Three Area</p>
                            <div class="row border border-secondary pt-3">
                                <div class="col-lg-6">
                                    <div class="mb-2">
                                        <label class="form-label">Row Three Title</label>
                                        <input type="text" id="row_three_title" name="row_three_title"
                                            class="form-control form-control-sm maxlength-options" maxlength="255"
                                            placeholder="Enter Row Three Title">
                                    </div>
                                </div>
                                <div class="mb-3 col-lg-6">
                                    <label class="form-label">Row Three Description</label>
                                    <textarea name="row_three_description" rows="0" cols="0" class="form-control"
                                        placeholder="Enter Row Three Description"></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- Row Three End-->

                        <!-- Row Five -->
                        <div class="mt-1 mb-2">
                            <p class="text-white bg-info text-center shadow-sm"
                                style="position: relative;  top: 20px; width: 13%">Row Five Area</p>
                            <div class="row border border-secondary pt-3">
                                <div class="col-lg-4">
                                    <div class="mb-2">
                                        <label class="form-label">Row Five Title</label>
                                        <input type="text" id="row_five_title" name="row_five_title"
                                            class="form-control form-control-sm maxlength-options" maxlength="255"
                                            placeholder="Enter Row Five Title">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-2">
                                        <label class="col-form-label pt-0">Row Five Image</label>
                                        <input type="file" accept="image/*"
                                            class="imageUpload form-control form-control-sm" name="row_five_image">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-2">
                                        <label class="form-label">Row Five Description</label>
                                        <textarea name="row_five_description" rows="0" cols="0" class="form-control"
                                            placeholder="Enter Row Five Description"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Row Five End-->

                        <!-- Row Six -->
                        <div class="mt-1 mb-2">
                            <p class="text-white bg-info text-center shadow-sm"
                                style="position: relative;  top: 20px; width: 13%">Row Six Area</p>
                            <div class="row border border-secondary pt-3">
                                <div class="col-lg-4">
                                    <div class="mb-2">
                                        <label class="form-label">Row Six Title</label>
                                        <input type="text" id="row_six_title" name="row_six_title"
                                            class="form-control form-control-sm maxlength-options" maxlength="255"
                                            placeholder="Enter Row Six Title">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-2">
                                        <label class="form-label">Row Six Sub Title</label>
                                        <input type="text" id="row_six_sub_title" name="row_six_sub_title"
                                            class="form-control form-control-sm maxlength-options" maxlength="255"
                                            placeholder="Enter Row Six Sub Title">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label class="col-form-label pt-0">Row Six Background Image</label>
                                    <input type="file" accept="image/*"
                                        class="imageUpload form-control form-control-sm" name="row_six_background_image">
                                </div>
                                <div class="mb-3 col-lg-5">
                                    <label class="form-label">Row Six Short Description</label>
                                    <textarea name="row_six_short_description" rows="0" cols="0" class="form-control"
                                        placeholder="Enter Row Six Short Description"></textarea>
                                </div>
                                <div class="mb-3 col-lg-7">
                                    <label class="form-label">Row Six Description</label>
                                    <textarea name="row_six_description" rows="0" cols="0" class="form-control"
                                        placeholder="Enter Row Six Description"></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- Row Six End-->

                        <!-- Row Seven -->
                        <div class="mt-1 mb-2">
                            <p class="text-white bg-info text-center shadow-sm"
                                style="position: relative;  top: 20px; width: 13%">Row Seven Area</p>
                            <div class="row border border-secondary pt-3">
                                <div class="col-lg-6">
                                    <label class="col-form-label pt-0">Row Seven Background Image</label>
                                    <input type="file" accept="image/*"
                                        class="imageUpload form-control form-control-sm"
                                        name="row_seven_background_image">
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-2">
                                        <label class="form-label">Row Seven Title</label>
                                        <input type="text" id="row_seven_title" name="row_seven_title"
                                            class="form-control form-control-sm maxlength-options" maxlength="255"
                                            placeholder="Enter Row Seven Title">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Row Seven End-->

                        <!-- Row Eight -->
                        <div class="mt-1 mb-2">
                            <p class="text-white bg-info text-center shadow-sm"
                                style="position: relative;  top: 20px; width: 13%">Row Eight Area</p>
                            <div class="row border border-secondary pt-3">
                                <div class="col-lg-12">
                                    <div class="mb-2">
                                        <label class="col-form-label pt-0">Row Eight Image</label>
                                        <input type="file" accept="image/*"
                                            class="imageUpload form-control form-control-sm" name="row_eight_image">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Row Eight End-->

                        <!-- Row Nine -->
                        <div class="mt-1 mb-2">
                            <p class="text-white bg-info text-center shadow-sm"
                                style="position: relative;  top: 20px; width: 13%">Row Nine Area</p>
                            <div class="row border border-secondary pt-3">
                                <div class="col-lg-3">
                                    <div class="mb-2">
                                        <label class="form-label">Row Nine Title</label>
                                        <input type="text" id="row_nine_title" name="row_nine_title"
                                            class="form-control form-control-sm maxlength-options" maxlength="255"
                                            placeholder="Enter Row Nine Title">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-2">
                                        <label class="form-label">Row Nine Sub Title</label>
                                        <input type="text" id="row_nine_sub_title" name="row_nine_sub_title"
                                            class="form-control form-control-sm maxlength-options" maxlength="255"
                                            placeholder="Enter Row Nine Sub Title">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <label class="col-form-label pt-0">Row Nine Background Image</label>
                                    <input type="file" accept="image/*"
                                        class="imageUpload form-control form-control-sm" name="row_nine_background_image">
                                </div>
                                <div class="col-lg-3">
                                    <label class="col-form-label pt-0">Row Nine Image</label>
                                    <input type="file" accept="image/*"
                                        class="imageUpload form-control form-control-sm" name="row_nine_image">
                                </div>
                            </div>
                        </div>
                        <!-- Row Nine End-->

                        <!-- Row Ten -->
                        <div class="mt-1 mb-2">
                            <p class="text-white bg-info text-center shadow-sm"
                                style="position: relative;  top: 20px; width: 13%">Row Ten Area</p>
                            <div class="row border border-secondary pt-3">
                                <div class="col-lg-3">
                                    <div class="mb-2">
                                        <label class="form-label">Row Ten Title</label>
                                        <input type="text" id="row_ten_title" name="row_ten_title"
                                            class="form-control form-control-sm maxlength-options" maxlength="255"
                                            placeholder="Enter Row Ten Title">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <label class="col-form-label pt-0">Row Ten Image One</label>
                                    <input type="file" accept="image/*"
                                        class="imageUpload form-control form-control-sm" name="row_ten_image_one"
                                        placeholder="Row Ten Image One">
                                </div>
                                <div class="col-lg-3">
                                    <label class="col-form-label pt-0">Row Ten Image Two </label>
                                    <input type="file" accept="image/*"
                                        class="imageUpload form-control form-control-sm" name="row_ten_image_two"
                                        placeholder="Row Ten Image Two">
                                </div>
                                <div class="mb-3 col-lg-3">
                                    <label class="form-label">Row Ten Description</label>
                                    <textarea name="row_ten_description" rows="0" cols="0" class="form-control"
                                        placeholder="Enter Row Ten Description"></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- Row Ten End-->

                        <!-- Row Eleven -->
                        <div class="mt-1 mb-2">
                            <p class="text-white bg-info text-center shadow-sm"
                                style="position: relative;  top: 20px; width: 13%">Row Eleven Area</p>
                            <div class="row border border-secondary pt-3">
                                <div class="col-lg-4">
                                    <div class="mb-2">
                                        <label class="form-label">Row Eleven Title</label>
                                        <input type="text" id="row_eleven_title" name="row_eleven_title"
                                            class="form-control form-control-sm maxlength-options" maxlength="255"
                                            placeholder="Enter Row Eleven Title">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label class="col-form-label pt-0">Row Eleven Image </label>
                                    <input type="file" accept="image/*"
                                        class="imageUpload form-control form-control-sm" name="row_eleven_image">
                                </div>
                                <div class="mb-3 col-lg-4">
                                    <label class="form-label">Row Eleven Description</label>
                                    <textarea name="row_eleven_description" rows="0" cols="0" class="form-control"
                                        placeholder="Enter Row Eleven Description"></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- Row Eleven End-->

                        <!-- Row Twelve -->
                        <div class="mt-1 mb-2">
                            <p class="text-white bg-info text-center shadow-sm"
                                style="position: relative;  top: 20px; width: 13%">Row Twelve Area</p>
                            <div class="row border border-secondary pt-3">
                                <div class="mb-2">
                                    <label class="form-label">Row Twelve Description</label>
                                    <textarea class="form-control form-control-sm tinymce_metronic" id="" name="row_twelve_description"
                                        placeholder="Enter Row Twelve Description"></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- Row Twelve End-->

                        <!-- Thirteen -->
                        <div class="mt-1 mb-2">

                            <p class="text-white bg-info text-center shadow-sm"
                                style="position: relative;  top: 20px; width: 13%">Thirteen Area</p>

                            <div class="row border border-secondary pt-3 pb-3">

                                <div class="col-lg-4 mb-3">
                                    <label class="col-form-label pt-0">Row Thirteen Image One Title </label>
                                    <input type="text" class=" form-control form-control-sm"
                                        placeholder="Row Thirteen Image One Title" name="row_thirteen_image_one_title">
                                </div>

                                <div class="col-lg-4 mb-3">
                                    <label class="col-form-label pt-0">Row Thirteen Image Two Title </label>
                                    <input type="text" class=" form-control form-control-sm"
                                        placeholder="Row Thirteen Image Two Title" name="row_thirteen_image_two_title">
                                </div>

                                <div class="col-lg-4 mb-3">
                                    <label class="col-form-label pt-0">Row Thirteen Background Image </label>
                                    <input type="file" accept="image/*"
                                        class="imageUpload form-control form-control-sm"
                                        placeholder="Row Thirteen Background Image" name="row_thirteen_background_image">
                                </div>

                                <div class="col-lg-4">
                                    <label class="col-form-label pt-0">Row Thirteen Image One </label>
                                    <input type="file" accept="image/*"
                                        class="imageUpload form-control form-control-sm" name="row_thirteen_image_one"
                                        placeholder="Row Thirteen Image One">
                                </div>
                                <div class="col-lg-4">
                                    <label class="col-form-label pt-0">Row Thirteen Image Two </label>
                                    <input type="file" accept="image/*"
                                        class="imageUpload form-control form-control-sm" name="row_thirteen_image_two"
                                        placeholder="Row Thirteen Image Two">
                                </div>
                            </div>
                        </div>
                        <!-- Thirteen End-->

                        <!-- Fourteen -->
                        <div class="mt-1 mb-2">
                            <p class="text-white bg-info text-center shadow-sm"
                                style="position: relative;  top: 20px; width: 13%">Fourteen Area</p>
                            <div class="row border border-secondary pt-3">
                                <div class="col-lg-6">
                                    <div class="mb-2">
                                        <label class="form-label">Row Fourteen Title</label>
                                        <input type="text" id="row_fourteen_title" name="row_fourteen_title"
                                            class="form-control form-control-sm maxlength-options" maxlength="255"
                                            placeholder="Enter Row Fourteen Title">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-form-label pt-0">Row Fourteen Background Image </label>
                                    <input type="file" accept="image/*"
                                        class="imageUpload form-control form-control-sm"
                                        placeholder="Enter Row Fourteen Background Image"
                                        name="row_fourteen_background_image">
                                </div>
                            </div>
                        </div>
                        <!-- Fourteen End-->

                        <!-- Fifteen -->
                        <div class="mt-1 mb-2">
                            <p class="text-white bg-info text-center shadow-sm"
                                style="position: relative;  top: 20px; width: 13%">Fifteen Area</p>
                            <div class="row border border-secondary pt-3">

                                <div class="col-lg-4">
                                    <div class="mb-2">
                                        <label class="form-label">Row Fifteen Title</label>
                                        <input type="text" id="row_fifteen_title" name="row_fifteen_title"
                                            class="form-control form-control-sm maxlength-options" maxlength="255"
                                            placeholder="Enter Row Fifteen Title">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="mb-2">
                                        <label class="form-label">Row Fifteen Sub Title</label>
                                        <input type="text" id="row_fifteen_sub_title" name="row_fifteen_sub_title"
                                            class="form-control form-control-sm maxlength-options" maxlength="255"
                                            placeholder="Enter Row Fifteen Sub Title">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label class="col-form-label pt-0">Row Fifteen Image </label>
                                    <input type="file" accept="image/*"
                                        class="imageUpload form-control form-control-sm" name="row_fifteen_image">
                                </div>
                                <div class="mb-3 col-lg-12">
                                    <label class="form-label">Row Fifteen Description</label>
                                    <textarea name="row_fifteen_description" rows="0" cols="0" class="form-control"
                                        placeholder="Enter Row Fifteen Description"></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- Fifteen End-->

                        <!-- Sixteen   -->
                        <div class="mt-1 mb-2">
                            <p class="text-white bg-info text-center shadow-sm"
                                style="position: relative;  top: 20px; width: 13%">Sixteen Area</p>
                            <div class="row border border-secondary pt-3">

                                <div class="col-lg-4">
                                    <label class="col-form-label pt-0">row sixteen background image </label>
                                    <input type="file" accept="image/*"
                                        class="imageUpload form-control form-control-sm"
                                        name="row_sixteen_background_image" placeholder="row sixteen background image">
                                </div>

                                <div class="col-lg-4">
                                    <label class="col-form-label pt-0">Row Sixteen Image </label>
                                    <input type="file" accept="image/*"
                                        class="imageUpload form-control form-control-sm" name="row_sixteen_image"
                                        placeholder="Row Sixteen Image">
                                </div>

                                <div class="col-lg-4">
                                    <div class="mb-2">
                                        <label class="form-label">Row Sixteen Title</label>
                                        <input type="text" id="row_sixteen_title" name="row_sixteen_title"
                                            class="form-control form-control-sm maxlength-options" maxlength="255"
                                            placeholder="Enter Row Sixteen Title">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="mb-2">
                                        <label class="form-label">Row Sixteen Sub Title</label>
                                        <input type="text" id="row_sixteen_sub_title" name="row_sixteen_sub_title"
                                            class="form-control form-control-sm maxlength-options" maxlength="255"
                                            placeholder="Enter Row Sixteen Sub Title">
                                    </div>
                                </div>

                                <div class="mb-3 col-lg-8">
                                    <label class="form-label">Row Sixteen Description</label>
                                    <textarea name="row_sixteen_description" rows="0" cols="0" class="form-control"
                                        placeholder="Enter Row Sixteen Description"></textarea>
                                </div>




                            </div>
                        </div>
                        <!-- Sixteen  End-->

                        <!-- Seventeen  -->
                        <div class="mt-1 mb-2">
                            <p class="text-white bg-info text-center shadow-sm"
                                style="position: relative;  top: 20px; width: 13%">Seventeen Area</p>
                            <div class="row border border-secondary pt-3">
                                <div class="col-lg-6">
                                    <label class="col-form-label pt-0">Row Seventeen Image </label>
                                    <input type="file" accept="image/*"
                                        class="imageUpload form-control form-control-sm" name="row_seventeen_image"
                                        placeholder="Row Seventeen Image">
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-2">
                                        <label class="form-label">Row Seventeen Title</label>
                                        <input type="text" id="row_seventeen_title" name="row_seventeen_title"
                                            class="form-control form-control-sm maxlength-options" maxlength="255"
                                            placeholder="Enter Row Seventeen Title">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Seventeen  -->

                        <!-- row_eighteen  -->
                        <div class="mt-1 mb-2">
                            <p class="text-white bg-info text-center shadow-sm"
                                style="position: relative;  top: 20px; width: 13%">Eighteen Area</p>
                            <div class="row border border-secondary pt-3">

                                <div class="col-lg-6">
                                    <div class="mb-2">
                                        <label class="form-label">Row Eighteen Title</label>
                                        <input type="text" id="row_eighteen_title" name="row_eighteen_title"
                                            class="form-control form-control-sm maxlength-options" maxlength="255"
                                            placeholder="Enter Row Eight Title">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-2">
                                        <label class="form-label">Row Eighteen Sub Title</label>
                                        <input type="text" id="row_eighteen_sub_title" name="row_eighteen_sub_title"
                                            class="form-control form-control-sm maxlength-options" maxlength="255"
                                            placeholder="Enter Row Eighteen Sub Title">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <label class="form-label">Row Eighteen Description</label>
                                    <textarea name="row_eighteen_description" rows="0" cols="0" class="form-control"
                                        placeholder="Enter Row Eighteen Description"></textarea>
                                </div>

                                <div class="col-lg-3">
                                    <label class="col-form-label pt-0">Row Eighteen Background Image </label>
                                    <input type="file" accept="image/*"
                                        class="imageUpload form-control form-control-sm"
                                        name="row_eighteen_background_image">
                                </div>

                                <div class="col-lg-3">
                                    <label class="col-form-label pt-0">Row Eighteen Image </label>
                                    <input type="file" accept="image/*"
                                        class="imageUpload form-control form-control-sm" name="row_eighteen_image">
                                </div>


                            </div>

                        </div>
                        <!-- row_eighteen End-->

                        <!-- Nineteen  -->
                        <div class="mt-1 mb-2">
                            <p class="text-white bg-info text-center shadow-sm"
                                style="position: relative;  top: 20px; width: 13%">Nineteen Area</p>
                            <div class="row border border-secondary pt-3">
                                <div class="mb-3 col-lg-3">
                                    <label class="form-label">Row Nineteen Description</label>
                                    <textarea name="row_nineteen_description" rows="1" cols="1" class="form-control"
                                        placeholder="Enter Nineteen Description"></textarea>
                                </div>

                                <div class="col-lg-3">
                                    <label class="col-form-label pt-0">Row Nineteen Image One </label>
                                    <input type="file" accept="image/*"
                                        class="imageUpload form-control form-control-sm" name="row_nineteen_image_one">
                                </div>
                                <div class="col-lg-3">
                                    <label class="col-form-label pt-0">Row Nineteen Image One Title </label>
                                    <input type="text" class="imageUpload form-control form-control-sm"
                                        name="row_nineteen_image_one_title" placeholder="Row Nineteen Image One Title">
                                </div>
                                <div class="col-lg-3">
                                    <label class="col-form-label pt-0">Row Nineteen Image Two </label>
                                    <input type="file" accept="image/*"
                                        class="imageUpload form-control form-control-sm" name="row_nineteen_image_two">
                                </div>
                                <div class="col-lg-3">
                                    <label class="col-form-label pt-0">Row Nineteen Image Two Title </label>
                                    <input type="text" class="imageUpload form-control form-control-sm"
                                        placeholder="Row Nineteen Image Two Title" name="row_nineteen_image_two_title">
                                </div>
                                <div class="col-lg-3">
                                    <label class="col-form-label pt-0">Row Nineteen Image Three </label>
                                    <input type="file" accept="image/*"
                                        class="imageUpload form-control form-control-sm" name="row_nineteen_image_three">
                                </div>
                                <div class="col-lg-3">
                                    <label class="col-form-label pt-0">Row Nineteen Image Three Title </label>
                                    <input type="text" class="imageUpload form-control form-control-sm"
                                        placeholder="Row Nineteen Image Three Title"
                                        name="row_nineteen_image_three_title">
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-2">
                                        <label class="form-label">Row Nineteen Title</label>
                                        <input type="text" id="row_nineteen_title" name="row_nineteen_title"
                                            class="form-control form-control-sm maxlength-options" maxlength="255"
                                            placeholder="Enter Row Nineteen Title">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Nineteen End-->

                        <!-- Design Area  -->
                        <div class="mt-1 mb-2">
                            <p class="text-white bg-info text-center shadow-sm"
                                style="position: relative;  top: 20px; width: 13%">Design Area</p>
                            <div class="row border border-secondary pt-3 pb-3">
                                <div class="col-lg-12">
                                    <div class="mb-2">
                                        <label class="form-label">Design Section Title</label>
                                        <input type="text" id="design_section_title" name="design_section_title"
                                            class="form-control form-control-sm maxlength-options" maxlength="255"
                                            placeholder="Enter Design Section Title">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <label class="col-form-label pt-0">Design Section Image One</label>
                                    <input type="file" accept="image/*"
                                        class="imageUpload form-control form-control-sm" name="design_section_image_one"
                                        placeholder="Design Section Image One">
                                </div>
                                <div class="col-lg-3">
                                    <label class="col-form-label pt-0">Design Section Image Two</label>
                                    <input type="file" accept="image/*"
                                        class="imageUpload form-control form-control-sm" name="design_section_image_two"
                                        placeholder="Design Section Image Two">
                                </div>
                                <div class="col-lg-3">
                                    <label class="col-form-label pt-0">Design Section Image Three</label>
                                    <input type="file" accept="image/*"
                                        class="imageUpload form-control form-control-sm" name="design_section_image_three"
                                        placeholder="Design Section Image Three">
                                </div>
                                <div class="col-lg-3">
                                    <label class="col-form-label pt-0">Design Section Image Four</label>
                                    <input type="file" accept="image/*"
                                        class="imageUpload form-control form-control-sm" name="design_section_image_four"
                                        placeholder="Design Section Image Four">
                                </div>

                                <div class="mt-3 col-lg-12">
                                    <label class="form-label">Design Section Description</label>
                                    <textarea name="design_section_description" rows="0" cols="0" class="form-control"
                                        placeholder="Enter Design Section Description"></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- Design End-->


                        <!-- Feature -->
                        <div class="mt-1 mb-2">

                            <p class="text-white bg-info text-center shadow-sm"
                                style="position: relative;  top: 20px; width: 13%">Feature Area</p>

                            <div class="row border border-secondary pt-3 pb-3">

                                <div class="col-lg-3">
                                    <div class="mb-2">
                                        <label class="form-label">Feature One Title</label>
                                        <input type="text" id="feature_one_title" name="feature_one_title"
                                            class="form-control form-control-sm maxlength-options" maxlength="255"
                                            placeholder="Enter Feature One Title">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="mb-2">
                                        <label class="form-label">Feature Two Title</label>
                                        <input type="text" id="feature_two_title" name="feature_two_title"
                                            class="form-control form-control-sm maxlength-options" maxlength="255"
                                            placeholder="Enter Feature Two Title">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="mb-2">
                                        <label class="form-label">Feature Three Title</label>
                                        <input type="text" id="feature_three_title" name="feature_three_title"
                                            class="form-control form-control-sm maxlength-options" maxlength="255"
                                            placeholder="Enter Feature Three Title">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="mb-2">
                                        <label class="form-label">Feature Four Title</label>
                                        <input type="text" id="feature_four_title" name="feature_four_title"
                                            class="form-control form-control-sm maxlength-options" maxlength="255"
                                            placeholder="Enter Feature Four Title">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-2">
                                        <label class="form-label">Feature Five Title</label>
                                        <input type="text" id="feature_five_title" name="feature_five_title"
                                            class="form-control form-control-sm maxlength-options" maxlength="255"
                                            placeholder="Enter Feature Five Title">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-2">
                                        <label class="form-label">Feature Six Title</label>
                                        <input type="text" id="feature_six_title" name="feature_six_title"
                                            class="form-control form-control-sm maxlength-options" maxlength="255"
                                            placeholder="Enter Feature Six Title">
                                    </div>
                                </div>

                                <div class="mb-3 col-lg-4">
                                    <label class="form-label">Feature One Description</label>
                                    <textarea name="feature_one_description" rows="0" cols="0" class="form-control"
                                        placeholder="Enter Feature One Description"></textarea>
                                </div>

                                <div class="mb-3 col-lg-4">
                                    <label class="form-label">Feature Two Description</label>
                                    <textarea name="feature_two_description" rows="0" cols="0" class="form-control"
                                        placeholder="Enter Feature Two Description"></textarea>
                                </div>

                                <div class="mb-3 col-lg-4">
                                    <label class="form-label">Feature Three Description</label>
                                    <textarea name="feature_three_description" rows="0" cols="0" class="form-control"
                                        placeholder="Enter Three Description"></textarea>
                                </div>

                                <div class="mb-3 col-lg-4">
                                    <label class="form-label">Feature Four Description</label>
                                    <textarea name="feature_four_description" rows="0" cols="0" class="form-control"
                                        placeholder="Enter Feature Four Description"></textarea>
                                </div>

                                <div class="mb-3 col-lg-4">
                                    <label class="form-label">Feature Five Description</label>
                                    <textarea name="feature_five_description" rows="0" cols="0" class="form-control"
                                        placeholder="Enter Feature Five Description"></textarea>
                                </div>

                                <div class="mb-3 col-lg-4">
                                    <label class="form-label">Feature Six Description</label>
                                    <textarea name="feature_six_description" rows="0" cols="0" class="form-control"
                                        placeholder="Enter Feature Six Description"></textarea>
                                </div>

                                <div class="col-lg-4 mb-3">
                                    <label class="col-form-label pt-0">Feature Section Background Image </label>
                                    <input type="file" accept="image/*"
                                        class="imageUpload form-control form-control-sm"
                                        name="feature_section_background_image">
                                </div>

                                <div class="col-lg-4 mb-3">
                                    <label class="col-form-label pt-0">Feature One Image </label>
                                    <input type="file" accept="image/*"
                                        class="imageUpload form-control form-control-sm" name="feature_one_image">
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="col-form-label pt-0">Feature Two Image </label>
                                    <input type="file" accept="image/*"
                                        class="imageUpload form-control form-control-sm" name="feature_two_image">
                                </div>

                                <div class="col-lg-3">
                                    <label class="col-form-label pt-0">Feature Three Image</label>
                                    <input type="file" accept="image/*"
                                        class="imageUpload form-control form-control-sm" name="feature_three_image">
                                </div>

                                <div class="col-lg-3">
                                    <label class="col-form-label pt-0">Feature Four Image</label>
                                    <input type="file" accept="image/*"
                                        class="imageUpload form-control form-control-sm" name="feature_four_image">
                                </div>

                                <div class="col-lg-3">
                                    <label class="col-form-label pt-0">Feature Five Image</label>
                                    <input type="file" accept="image/*"
                                        class="imageUpload form-control form-control-sm" name="feature_five_image">
                                </div>

                                <div class="col-lg-3">
                                    <label class="col-form-label pt-0">Feature Six Image</label>
                                    <input type="file" accept="image/*"
                                        class="imageUpload form-control form-control-sm" name="feature_six_image">
                                </div>
                            </div>
                        </div>
                        <!-- Feature End-->


                        <div class="row mt-5">
                            <div class="col-12 text-end" style="padding-right: 0;">
                                <button type="submit" class="btn btn-primary rounded-0">Save changes</button>
                            </div>
                        </div>


                    </form>

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
                    product_id: {
                        required: true,
                    },

                    status: {
                        required: true,
                    },
                },
                messages: {
                    product_id: {
                        required: 'Please Enter Product Name',
                    },
                    status: {
                        required: 'Select Status Field',
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
@endsection
