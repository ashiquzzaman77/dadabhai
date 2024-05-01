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
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Product</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">

                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Add Product<span class="ms-2 badge bg-danger"></span></li>
                    <!--end::Item-->

                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">

                <!--begin::Primary button-->
                <a href="{{ route('all.product') }}" class="btn btn-sm btn-light-primary"><i
                        class="bi bi-backspace-fill"></i>Back</a>
                <!--end::Primary button-->

            </div>
            <!--end::Actions-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->

    <div class="row mt-0">

        <div class="col-3">

            <div class="card">
                <div class="card-body">

                    <ul class="nav nav-tabs nav-pills border-0 flex-row flex-md-column mb-3 mb-md-0 fs-6" role="tablist">
                        <li class="nav-item bg-light-primary w-md-290px me-0 my-1" role="presentation">
                            <a class="nav-link p-5 rounded-0 active tab-trigger" data-bs-toggle="tab" href="#kt_vtab_pane_1"
                                aria-selected="true" role="tab">Required Fields</a>
                        </li>
                        <li class="nav-item bg-light-primary w-md-290px me-0 my-1" role="presentation">
                            <a class="nav-link p-5 rounded-0 tab-trigger" data-bs-toggle="tab" href="#kt_vtab_pane_2"
                                aria-selected="false" role="tab">General Informations</a>
                        </li>
                        <li class="nav-item bg-light-primary w-md-290px me-0 my-1" role="presentation">
                            <a class="nav-link p-5 rounded-0 tab-trigger" data-bs-toggle="tab" href="#kt_vtab_pane_3"
                                aria-selected="false" role="tab" tabindex="-1">Descripton</a>
                        </li>
                        <li class="nav-item bg-light-primary w-md-290px me-0 my-1" role="presentation">
                            <a class="nav-link p-5 rounded-0 tab-trigger" data-bs-toggle="tab" href="#kt_vtab_pane_4"
                                aria-selected="false" role="tab" tabindex="-1">Source
                                Details</a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>

        <div class="col-9">
            <div class="card">
                <div class="card-body">

                    <form action="{{ route('store.product') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="tab-content" id="myTabContent">

                            {{-- Required Field  --}}
                            <div class="tab-pane fade active show" id="kt_vtab_pane_1" role="tabpanel">

                                <div class="w-100">

                                    <div class="pb-5 pb-lg-5">
                                        <h2 class="fw-bolder d-flex justify-content-center align-items-center text-dark">
                                            Required Informations
                                        </h2>
                                        <p class="text-center p-0 m-0"><small class="ms-4 text-danger fw-normal fs-sm-9">All
                                                The Red Star Mark Field Is Required.</small></p>
                                    </div>

                                    <div class="fv-row">

                                        <div class="row">

                                            {{-- product_name --}}
                                            <div class="col-6 mb-3">
                                                <div class="fv-row mb-3">

                                                    <label class="form-label required">Product
                                                        Name</label>

                                                    <input name="product_name"
                                                        class="form-control form-control-sm form-control-solid"
                                                        placeholder="Enter Product Name" type="text"
                                                        value="{{ old('product_name') }}" required />

                                                    <div class="invalid-feedback">
                                                        Please Enter Product
                                                        Name.
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- sku_code --}}
                                            <div class="col-3 mb-3">
                                                <div class="fv-row mb-3">
                                                    <label class="form-label required">SKU
                                                        Code</label>
                                                    <input name="sku_code"
                                                        class="form-control form-control-sm form-control-solid"
                                                        placeholder="Eg: NG-2647374" value="{{ old('sku_code') }}"
                                                        type="text" required />
                                                    <div class="invalid-feedback">
                                                        Please Enter SKU
                                                        Code.</div>
                                                </div>
                                            </div>

                                            {{-- mf_code --}}
                                            <div class="col-3 mb-3">
                                                <div class="fv-row mb-3">
                                                    <label class="form-label required">MF
                                                        Code</label>
                                                    <input name="mf_code"
                                                        class="form-control form-control-sm form-control-solid"
                                                        placeholder="Eg: MF-2647374" type="text"
                                                        value="{{ old('mf_code') }}" required />
                                                    <div class="invalid-feedback">
                                                        Please Enter MF
                                                        Code.</div>
                                                </div>
                                            </div>

                                            {{-- notification_days --}}
                                            <div class="col-4 mb-3">
                                                <div class="fv-row mb-3">
                                                    <label class="form-label required">Notification
                                                        Days</label>
                                                    <input name="notification_days"
                                                        class="form-control form-control-sm form-control-solid"
                                                        placeholder="Eg:15 days,30 days" type="text"
                                                        value="{{ old('notification_days') }}" required />
                                                    <div class="invalid-feedback">
                                                        Please Enter
                                                        Notification Days.
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- product_type --}}
                                            <div class="col-4 mb-3">
                                                <div class="fv-row mb-3">
                                                    <label class="form-label required">Product
                                                        Type</label>
                                                    <select class="form-select form-select-solid form-select-sm"
                                                        name="product_type" data-control="select2"
                                                        data-hide-search="true" data-placeholder="Select an Product Type"
                                                        data-allow-clear="true" required>
                                                        <option></option>
                                                        <option value="software">Software</option>
                                                        <option value="hardware">Hardware</option>
                                                        <option value="book">Book</option>
                                                        <option value="training">Training</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Please Enter Product
                                                        Type.</div>
                                                </div>

                                            </div>

                                            {{-- stock --}}
                                            <div class="col-4 mb-3">
                                                <div class="fv-row mb-3">
                                                    <label class="form-label required">Stock
                                                        Status</label>
                                                    <select
                                                        class="form-select form-select-solid form-select-sm stock_select"
                                                        name="stock" data-control="select2"
                                                        data-placeholder="Select Stock Status" data-allow-clear="true"
                                                        required>
                                                        <option></option>
                                                        <option class="form-select" value="available">
                                                            Available
                                                        </option>
                                                        <option class="form-select" value="limited">
                                                            Limited</option>
                                                        <option class="form-select" value="unlimited">
                                                            UnLimited</option>
                                                        <option class="form-select" value="stock_out">
                                                            Out of
                                                            Stock</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Please Enter Stock
                                                        Status.</div>
                                                </div>
                                            </div>


                                            {{-- brand_id --}}
                                            <div class="col-4 mb-3">
                                                <div class="fv-row mb-3">

                                                    <label class="form-label required">Brand Name</label>

                                                    <select class="form-select form-select-solid form-select-sm"
                                                        name="brand_id" data-control="select2"
                                                        data-placeholder="Select an Brand Name" data-allow-clear="true"
                                                        required>
                                                        <option></option>

                                                        @foreach ($brands as $brand)
                                                            <option value="{{ $brand->id }}">{{ $brand->brand_name }}
                                                            </option>
                                                        @endforeach

                                                    </select>

                                                    <div class="invalid-feedback"> Please Enter Brand Name.</div>

                                                </div>

                                            </div>

                                            {{-- price_status --}}
                                            <div class="col-4 mb-3">
                                                <div class="fv-row mb-3">
                                                    <label class="form-label required">Price
                                                        Status</label>
                                                    <select
                                                        class="form-select form-select-solid form-select-sm price_select"
                                                        data-control="select2" data-placeholder="Select Price Status"
                                                        name="price_status" data-hide-search="true"
                                                        data-allow-clear="true" required>
                                                        <option></option>
                                                        <option value="rfq">RFQ</option>
                                                        <option value="price">Price</option>
                                                        <option value="offer_price">Offer Price</option>

                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Please Enter Price
                                                        Status.</div>
                                                </div>
                                            </div>

                                            <div class="col-4 mb-3">
                                                <div class="fv-row mb-3">

                                                    <div class="rfq_price d-none">
                                                        <label class="ms-1" for="price_status">SAS Price <span
                                                                class="text-danger">*</span></label>
                                                        <input class="form-control form-control-sm" type="text"
                                                            name="sas_price" placeholder="RFQ Price for Sas">
                                                    </div>

                                                    <div class="price d-none">
                                                        <label class="ms-1" for="price_status">Price <span
                                                                class="text-danger">*</span></label>
                                                        <input class="form-control form-control-sm" type="text"
                                                            name="price" placeholder="Price">
                                                    </div>

                                                    <div class="offer_price d-none">
                                                        <label class="ms-1" for="price_status">Discount Price <span
                                                                class="text-danger">*</span></label>
                                                        <input class="form-control form-control-sm" type="text"
                                                            name="discount_price" placeholder="Discounted Price">
                                                    </div>

                                                </div>
                                            </div>

                                            {{-- category_id --}}
                                            <div class="col-4 mb-3">
                                                <div class="fv-row mb-3">
                                                    <label class="form-label required">Category
                                                        Name</label>

                                                    <select class="form-select form-select-solid form-select-sm"
                                                        name="category_id" data-control="select2"
                                                        data-placeholder="Category Name" data-allow-clear="true" required>
                                                        <option></option>
                                                        @if (count($categorys) > 0)
                                                            @foreach ($categorys as $category)
                                                                <option value="{{ $category->id }}">
                                                                    {{ $category->category_name }}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Please Enter
                                                        Category Name.
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- subcategory_id --}}
                                            <div class="col-4 mb-3">
                                                <div class="fv-row mb-3">
                                                    <label class="form-label required">SubCategory
                                                        Name</label>

                                                    <select class="form-select form-select-solid form-select-sm"
                                                        name="subcategory_id" data-control="select2"
                                                        data-placeholder="SubCategory Name" data-allow-clear="true"
                                                        required>
                                                        <option></option>

                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Please Enter
                                                        SubCategory Name.
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- childcategory_id --}}
                                            <div class="col-4 mb-3">
                                                <div class="fv-row mb-3">
                                                    <label class="form-label required">ChildCategory
                                                        Name</label>

                                                    <select class="form-select form-select-solid form-select-sm"
                                                        name="childcategory_id" data-control="select2"
                                                        data-placeholder="ChildCategory Name" data-allow-clear="true"
                                                        required>
                                                        <option></option>

                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Please Enter
                                                        ChildCategory Name.
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        {{-- product_image --}}
                                        <div class="row">
                                            <div class="col-4">
                                                <label class="form-label required">Product Image</label>
                                                <!--begin::Image input wrapper-->
                                                <div class="mt-1">
                                                    <!--begin::Image input-->
                                                    <div class="image-input image-input-outline"
                                                        data-kt-image-input="true"
                                                        style="background-image: url('assets/media/svg/avatars/blank.svg')">
                                                        <!--begin::Preview existing avatar-->
                                                        <div class="image-input-wrapper w-90px h-90px"
                                                            style="background-image: url({{ asset('backend/assets/media/avatars/no_image.jpg') }}">
                                                        </div>
                                                        <!--end::Preview existing avatar-->
                                                        <!--begin::Edit-->
                                                        <label
                                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                            data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                            title="Change avatar">
                                                            <i class="bi bi-pencil-fill fs-7"></i>
                                                            <!--begin::Inputs-->
                                                            <input type="file" name="product_image"
                                                                accept=".png, .jpg, .jpeg" />
                                                            <input type="hidden" name="product_image" />
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

                                            <div class="col-8">

                                                <label class="form-label required">Multi Image</label>

                                                <input type="file" autocomplete="off" class="form-control form-control-sm border-0 form-control-solid"
                                                    id="multiImg" name="multi_img[]" multiple="">

                                                <div class="row mt-3" id="preview_img"></div>


                                                {{-- <label class="form-label required">Multi Image</label>
                                                <div class="dropzone-field">
                                                    <label for="files" class="custom-file-upload">
                                                        <div class="d-flex align-items-center">
                                                            <p class="mb-0"><i
                                                                    class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                                            </p>
                                                            <h5 class="mb-0">Drop files here or click to upload.
                                                                <br>
                                                                <span class="text-muted" style="font-size: 10px">Upload 10
                                                                    File</span>
                                                            </h5>
                                                        </div>
                                                    </label>
                                                    <input type="file" id="files" name="multi_img[]" multiple
                                                        class="form-control" style="display: none;" />
                                                    <div class="row mt-3" id="preview_img"></div>
                                                </div> --}}

                                            </div>

                                        </div>


                                        <div class="row mt-2 justify-content-end">
                                            <div class="d-flex align-items-center justify-content-end">
                                                <a class="btn btn-lg btn-info rounded-0 tab-trigger-next"
                                                    data-bs-toggle="tab" data-bs-target="#kt_vtab_pane_2"
                                                    aria-selected="false" role="tab" tabindex="-1">
                                                    Continue
                                                    <span class="svg-icon svg-icon-4 ms-1 me-0">
                                                        <i class="bi bi-arrow-right-short fs-1"></i>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            {{-- General Information --}}
                            <div class="tab-pane fade" id="kt_vtab_pane_2" role="tabpanel">
                                <div class="w-100">
                                    <div class="pb-10 pb-lg-10">
                                        <h2 class="fw-bolder d-flex justify-content-center align-items-center text-dark">
                                            General Informations
                                        </h2>
                                    </div>

                                    <div class="fv-row">
                                        <div class="row">

                                            {{-- tags --}}
                                            <div class="col-lg-9">
                                                <label class="form-label">Tags</label>
                                                <input type="text" name="tags" value="{{ old('tags') }}"
                                                    class="form-control form-control-sm" data-role="tagsinput"
                                                    placeholder="Tags">
                                            </div>

                                            {{-- color_id --}}
                                            <div class="col-lg-3 mb-3">
                                                <div class="fv-row mb-3">
                                                    <label class="form-label required">Product
                                                        Colors</label>
                                                    <select class="form-select form-select-solid form-select-sm"
                                                        name="color_id[]" id="field2" multiple=""
                                                        multiselect-search="true" multiselect-select-all="true"
                                                        multiselect-max-items="2">

                                                        @if (count($colors) > 0)
                                                            @foreach ($colors as $color)
                                                                <option value="{{ $color->id }}">
                                                                    {{ $color->color_name }}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Please Enter Product
                                                        Colors.
                                                    </div>
                                                </div>

                                            </div>

                                            {{-- parent_id --}}
                                            <div class="col-lg-6 mb-3">
                                                <div class="fv-row mb-3">
                                                    <label class="form-label">Parent
                                                        Products</label>

                                                    <select
                                                        class="form-select form-select-solid form-select-sm stock_select"
                                                        name="parent_id" data-control="select2"
                                                        data-placeholder="Select Parent" data-allow-clear="true">

                                                        @if (count($products) > 0)
                                                            @foreach ($products as $parent_product)
                                                                <option value="{{ $parent_product->id }}">
                                                                    {{ $parent_product->product_name }}</option>
                                                            @endforeach
                                                        @endif

                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Please Enter Parent Product.
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- child_id --}}
                                            <div class="col-lg-6 mb-3">
                                                <div class="fv-row mb-3">
                                                    <label class="form-label">Child
                                                        Products</label>

                                                    <select
                                                        class="form-select form-select-solid form-select-sm stock_select"
                                                        name="child_id" data-control="select2"
                                                        data-placeholder="Select Child" data-allow-clear="true">

                                                        @if (count($products) > 0)
                                                            @foreach ($products as $child_product)
                                                                <option value="{{ $child_product->id }}">
                                                                    {{ $child_product->product_name }}</option>
                                                            @endforeach
                                                        @endif

                                                    </select>

                                                    <div class="invalid-feedback">
                                                        Please Enter Child Products.</div>
                                                </div>
                                            </div>

                                            {{-- Feature --}}
                                            <div class="col-lg-2 mb-3">
                                                <label class="form-label"></label>
                                                <div class="form-check form-check-custom form-check-solid mb-5">
                                                    <input class="form-check-input me-3" name="feature"
                                                        type="checkbox" value="1"
                                                        id="kt_docs_formvalidation_checkbox_option_1" />
                                                    <label class="form-check-label"
                                                        for="kt_docs_formvalidation_checkbox_option_1">
                                                        <div class="fw-bolder text-gray-800">Is
                                                            Feature</div>
                                                    </label>
                                                </div>
                                            </div>

                                            {{-- refurbished --}}
                                            <div class="col-lg-2 mb-3">
                                                <label class="form-label"></label>
                                                <div class="form-check form-check-custom form-check-solid mb-5">
                                                    <input class="form-check-input me-3" name="refurbished"
                                                        type="checkbox" value="1"
                                                        id="kt_docs_formvalidation_checkbox_option_1" />
                                                    <label class="form-check-label"
                                                        for="kt_docs_formvalidation_checkbox_option_1">
                                                        <div class="fw-bolder text-gray-800">Is
                                                            Refurbished</div>
                                                    </label>
                                                </div>
                                            </div>

                                            {{-- deal --}}
                                            <div class="col-lg-2 mb-3">
                                                <label class="form-label"></label>
                                                <div class="form-check form-check-custom form-check-solid mb-5">
                                                    <input class="form-check-input me-3" name="deal" type="checkbox"
                                                        value="1" id="dealCheckbox">
                                                    <label class="form-check-label">
                                                        <div class="fw-bolder text-gray-800">Is
                                                            Deal</div>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 mb-3" id="dealsInputContainer" style="display: none;">
                                                <label class="form-label">Deal
                                                    Price</label>
                                                <input type="text"
                                                    class="form-control form-select-sm form-control-solid" name="deal"
                                                    placeholder="Enter Deal" />
                                            </div>

                                        </div>

                                        <div class="row mt-2 justify-content-end">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <a class="btn btn-lg btn-info rounded-0 tab-trigger-previous"
                                                    data-bs-target="#kt_vtab_pane_1" aria-selected="false" role="tab"
                                                    tabindex="-1">

                                                    <span class="svg-icon svg-icon-4 ms-1 me-0">
                                                        <i class="bi bi-arrow-left-short fs-1"></i>
                                                    </span>
                                                    Previous
                                                </a>
                                                <a class="btn btn-lg btn-info rounded-0 tab-trigger-next"
                                                    data-bs-toggle="tab" data-bs-target="#kt_vtab_pane_3"
                                                    aria-selected="false" role="tab" tabindex="-1">
                                                    Continue
                                                    <span class="svg-icon svg-icon-4 ms-1 me-0">
                                                        <i class="bi bi-arrow-right-short fs-1"></i>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Description  --}}
                            <div class="tab-pane fade" id="kt_vtab_pane_3" role="tabpanel">
                                <div class="w-100">
                                    <div class="pb-10 pb-lg-10">
                                        <h2 class="fw-bolder d-flex justify-content-center align-items-center text-dark">
                                            Description
                                        </h2>
                                    </div>
                                    <div class="fv-row">
                                        <div class="row">

                                            <div class="col-lg-6 mb-2">
                                                <label class="form-label mb-0">Short Desc</label>
                                                <textarea name="short_desc" class="tinymce_metronic" placeholder="">
                                                    {{ old('short_desc') }}
                                                </textarea>
                                            </div>

                                            <div class="col-lg-6 mb-2">
                                                <label class="form-label mb-0">Overview</label>
                                                <textarea name="overview" placeholder="" class="form-control tinymce_metronic">{{ old('overview') }}</textarea>
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <label class="form-label mb-0">Specification</label>
                                                <textarea name="specification" placeholder="" class="form-control tinymce_metronic">{{ old('specification') }}</textarea>
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <label class="form-label mb-0">Accessories</label>
                                                <textarea name="accessories" placeholder="" class="form-control tinymce_metronic">{{ old('specification') }}</textarea>
                                            </div>
                                        </div>
                                        <div class="row mt-2 justify-content-end">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <a class="btn btn-lg btn-info rounded-0 tab-trigger-previous"
                                                    data-bs-target="#kt_vtab_pane_2" aria-selected="false" role="tab"
                                                    tabindex="-1">

                                                    <span class="svg-icon svg-icon-4 ms-1 me-0">
                                                        <i class="bi bi-arrow-left-short fs-1"></i>
                                                    </span>
                                                    Previous
                                                </a>
                                                <a class="btn btn-lg btn-info rounded-0 tab-trigger-next"
                                                    data-bs-toggle="tab" data-bs-target="#kt_vtab_pane_4"
                                                    aria-selected="false" role="tab" tabindex="-1">
                                                    Continue
                                                    <span class="svg-icon svg-icon-4 ms-1 me-0">
                                                        <i class="bi bi-arrow-right-short fs-1"></i>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Source Details  --}}
                            <div class="tab-pane fade" id="kt_vtab_pane_4" role="tabpanel">
                                <div class="w-100">
                                    <div class="pb-10 pb-lg-10">
                                        <h2 class="fw-bolder d-flex justify-content-center align-items-center text-dark">
                                            General Informations
                                        </h2>
                                    </div>
                                    <div class="fv-row">
                                        <div class="row">

                                            <div class="col-lg-12">
                                                <div class="table-responsive">
                                                    <table
                                                        class="table table-hover table-rounded table-striped border gy-7 gs-7">
                                                        <thead>
                                                            <tr
                                                                class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                                                                <th>Source
                                                                    Name</th>
                                                                <th>Source
                                                                    Link</th>
                                                                <th>Price</th>
                                                                <th>Estimate
                                                                    Time</th>
                                                                <th>Principal
                                                                    Time</th>
                                                                <th>Shipping
                                                                    Time</th>
                                                                <th>Location</th>
                                                                <th>Country</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div>
                                                                        <input name="source_one_name"
                                                                            value="{{ old('source_one_name') }}"
                                                                            class="form-control form-control-sm"
                                                                            placeholder="Enter source one Name"
                                                                            type="text" />
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div>
                                                                        <input name="source_one_link"
                                                                            value="{{ old('source_one_link') }}"
                                                                            class="form-control form-control-sm"
                                                                            placeholder="Enter source one link"
                                                                            type="text" />
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div>
                                                                        <input name="source_one_price"
                                                                            value="{{ old('source_one_price') }}"
                                                                            class="form-control form-control-sm"
                                                                            placeholder="Enter source one price"
                                                                            type="text" />
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div>
                                                                        <input name="source_one_estimate_time"
                                                                            value="{{ old('source_one_estimate_time') }}"
                                                                            class="form-control form-control-sm"
                                                                            placeholder="Enter source one estimate_time"
                                                                            type="text" />
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div>
                                                                        <input name="source_one_principal_time"
                                                                            value="{{ old('source_one_principal_time') }}"
                                                                            class="form-control form-control-sm"
                                                                            placeholder="Enter source one principal_time"
                                                                            type="text" />
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div>
                                                                        <input name="source_one_shipping_time"
                                                                            value="{{ old('source_one_shipping_time') }}"
                                                                            class="form-control form-control-sm"
                                                                            placeholder="Enter source one shipping_time"
                                                                            type="text" />
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div>
                                                                        <input name="source_one_location"
                                                                            value="{{ old('source_one_location') }}"
                                                                            class="form-control form-control-sm"
                                                                            placeholder="Enter source one location"
                                                                            type="text" />
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div>
                                                                        <input name="source_one_country"
                                                                            value="{{ old('source_one_country') }}"
                                                                            class="form-control form-control-sm"
                                                                            placeholder="Enter source one country"
                                                                            type="text" />
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div>
                                                                        <input name="source_two_name"
                                                                            value="{{ old('source_two_name') }}"
                                                                            class="form-control form-control-sm"
                                                                            placeholder="Enter source two name"
                                                                            type="text" />
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div>
                                                                        <input name="source_two_link"
                                                                            value="{{ old('source_two_link') }}"
                                                                            class="form-control form-control-sm"
                                                                            placeholder="Enter source two link"
                                                                            type="text" />
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div>
                                                                        <input name="source_two_price"
                                                                            value="{{ old('source_two_price') }}"
                                                                            class="form-control form-control-sm"
                                                                            placeholder="Enter source two price"
                                                                            type="text" />
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div>
                                                                        <input name="source_two_estimate_time"
                                                                            value="{{ old('source_two_estimate_time') }}"
                                                                            class="form-control form-control-sm"
                                                                            placeholder="Enter source two estimate_time"
                                                                            type="text" />
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div>
                                                                        <input name="source_two_principal_time"
                                                                            value="{{ old('source_two_principal_time') }}"
                                                                            class="form-control form-control-sm"
                                                                            placeholder="Enter source two principal_time"
                                                                            type="text" />
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div>
                                                                        <input name="source_two_shipping_time"
                                                                            value="{{ old('source_two_shipping_time') }}"
                                                                            class="form-control form-control-sm"
                                                                            placeholder="Enter source two shipping_time"
                                                                            type="text" />
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div>
                                                                        <input name="source_two_location"
                                                                            value="{{ old('source_two_location') }}"
                                                                            class="form-control form-control-sm"
                                                                            placeholder="Enter source two location"
                                                                            type="text" />
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div>
                                                                        <input name="source_two_country"
                                                                            value="{{ old('source_two_country') }}"
                                                                            class="form-control form-control-sm"
                                                                            placeholder="Enter source two country"
                                                                            type="text" />
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            {{-- source_contact --}}
                                            <div class="col-lg-12 mb-3">
                                                <label class="form-label mb-0">Source
                                                    Contact</label>
                                                <textarea rows="1" name="source_contact" value="{{ old('source_contact') }}"
                                                    class="form-control form-control-sm form-control-solid" placeholder="Enter Source Contact"></textarea>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="table-responsive">
                                                    <table
                                                        class="table table-hover table-rounded table-striped border gy-7 gs-7">
                                                        <thead>
                                                            <tr
                                                                class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                                                                <th>Competetor
                                                                    Name</th>
                                                                <th>Competetor
                                                                    Link</th>
                                                                <th>Price</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div>
                                                                        <input name="competitor_one_name"
                                                                            value="{{ old('competitor_one_name') }}"
                                                                            class="form-control form-control-sm"
                                                                            placeholder="Enter Product Name"
                                                                            type="text" />
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div>
                                                                        <input name="competitor_one_link"
                                                                            value="{{ old('competitor_one_link') }}"
                                                                            class="form-control form-control-sm"
                                                                            placeholder="Enter Product Name"
                                                                            type="text" />
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div>
                                                                        <input name="competitor_one_price"
                                                                            value="{{ old('competitor_one_price') }}"
                                                                            class="form-control form-control-sm"
                                                                            placeholder="Enter Product Name"
                                                                            type="text" />
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div>
                                                                        <input name="competitor_two_name"
                                                                            value="{{ old('competitor_two_name') }}"
                                                                            class="form-control form-control-sm"
                                                                            placeholder="Enter Product Name"
                                                                            type="text" />
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div>
                                                                        <input name="competitor_two_link"
                                                                            value="{{ old('competitor_two_link') }}"
                                                                            class="form-control form-control-sm"
                                                                            placeholder="Enter Product Name"
                                                                            type="text" />
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div>
                                                                        <input name="competitor_two_price"
                                                                            value="{{ old('competitor_two_price') }}"
                                                                            class="form-control form-control-sm"
                                                                            placeholder="Enter Product Name"
                                                                            type="text" />
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="table-responsive">
                                                    <table
                                                        class="table table-hover table-rounded table-striped border gy-7 gs-7">
                                                        <thead>
                                                            <tr
                                                                class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                                                                <th>Details</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div>
                                                                        Is
                                                                        this
                                                                        solid
                                                                        source?
                                                                        (
                                                                        Y/N
                                                                        )
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center fv-row">
                                                                        <div
                                                                            class="form-check form-check-custom form-check-solid mb-5 me-2">
                                                                            <input class="form-check-input me-2"
                                                                                name="solid_source" value="yes"
                                                                                type="radio"
                                                                                id="kt_docs_formvalidation_radio_option_1" />

                                                                            <label class="form-check-label"
                                                                                for="kt_docs_formvalidation_radio_option_1">
                                                                                <div class="fw-bolder text-gray-800">
                                                                                    Yes</div>
                                                                            </label>
                                                                        </div>

                                                                        <div
                                                                            class="form-check form-check-custom form-check-solid mb-5 me-2">
                                                                            <input class="form-check-input me-2"
                                                                                name="solid_source" value="no"
                                                                                type="radio"
                                                                                id="kt_docs_formvalidation_radio_option_2" />

                                                                            <label class="form-check-label"
                                                                                for="kt_docs_formvalidation_radio_option_2">
                                                                                <div class="fw-bolder text-gray-800">
                                                                                    No</div>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div>
                                                                        Is
                                                                        this
                                                                        direct
                                                                        Principal
                                                                        ? (
                                                                        Y/N
                                                                        )
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center fv-row">
                                                                        <div
                                                                            class="form-check form-check-custom form-check-solid mb-5 me-2">
                                                                            <input class="form-check-input me-2"
                                                                                name="direct_principal" value="yes"
                                                                                type="radio"
                                                                                id="kt_docs_formvalidation_radio_option_1" />

                                                                            <label class="form-check-label"
                                                                                for="kt_docs_formvalidation_radio_option_1">
                                                                                <div class="fw-bolder text-gray-800">
                                                                                    Yes</div>
                                                                            </label>
                                                                        </div>

                                                                        <div
                                                                            class="form-check form-check-custom form-check-solid mb-5 me-2">
                                                                            <input class="form-check-input me-2"
                                                                                name="direct_principal" value="no"
                                                                                type="radio"
                                                                                id="kt_docs_formvalidation_radio_option_2" />

                                                                            <label class="form-check-label"
                                                                                for="kt_docs_formvalidation_radio_option_2">
                                                                                <div class="fw-bolder text-gray-800">
                                                                                    No</div>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div>
                                                                        Does
                                                                        it
                                                                        have
                                                                        Agreement
                                                                        ? (
                                                                        Y/N
                                                                        )
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center fv-row">
                                                                        <div
                                                                            class="form-check form-check-custom form-check-solid mb-5 me-2">
                                                                            <input class="form-check-input me-2"
                                                                                name="agreement" value="yes"
                                                                                type="radio"
                                                                                id="kt_docs_formvalidation_radio_option_1" />

                                                                            <label class="form-check-label"
                                                                                for="kt_docs_formvalidation_radio_option_1">
                                                                                <div class="fw-bolder text-gray-800">
                                                                                    Yes</div>
                                                                            </label>
                                                                        </div>

                                                                        <div
                                                                            class="form-check form-check-custom form-check-solid mb-5 me-2">
                                                                            <input class="form-check-input me-2"
                                                                                name="agreement" value="no"
                                                                                type="radio"
                                                                                id="kt_docs_formvalidation_radio_option_2" />

                                                                            <label class="form-check-label"
                                                                                for="kt_docs_formvalidation_radio_option_2">
                                                                                <div class="fw-bolder text-gray-800">
                                                                                    No</div>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="66%">Source
                                                                    Type
                                                                    :</td>
                                                                <td width="34%" colspan="2">
                                                                    <select name="source_type"
                                                                        data-placeholder="Select Source Type.."
                                                                        class="form-control select">
                                                                        <option></option>
                                                                        <option class="form-control" value="principal">
                                                                            Principal</option>
                                                                        <option class="form-control" value="distributor">
                                                                            Distributor</option>
                                                                        <option class="form-control" value="supplier">
                                                                            Supplier</option>
                                                                        <option class="form-control" value="retailer">
                                                                            Retailer</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row mt-2 justify-content-end">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <a class="btn btn-lg btn-info rounded-0 tab-trigger-previous"
                                                    data-bs-target="#kt_vtab_pane_3" aria-selected="false" role="tab"
                                                    tabindex="-1">

                                                    <span class="svg-icon svg-icon-4 ms-1 me-0">
                                                        <i class="bi bi-arrow-left-short fs-1"></i>
                                                    </span>
                                                    Previous
                                                </a>
                                                <button class="btn btn-lg btn-info rounded-0" type="submit">
                                                    Submit
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>

    <script>
        $(document).ready(function() {
            $('.nav-tabs a').click(function() {
                $(this).tab('show');
            });
        });
    </script>

    <script>
        //---------Sidebar list Show Hide----------
        $(document).ready(function() {
            $('#dealId').click(function() {
                $("#dealExpand").toggle(this.checked);
            });
            $('#rfqId').click(function() {
                $("#rfqExpand").toggle('slow');
            });


            $('.price_select').on('change', function() {
                var price_value = $(this).find(":selected").val();
                if (price_value == 'rfq') {
                    // alert(price_value);
                    $(".rfq_price").removeClass("d-none");
                    $(".offer_price").addClass("d-none");
                    $(".price").addClass("d-none");
                } else if (price_value == 'offer_price') {
                    $(".offer_price").removeClass("d-none");
                    $(".rfq_price").addClass("d-none");
                    $(".price").addClass("d-none");
                } else if (price_value == 'price') {
                    $(".price").removeClass("d-none");
                    $(".offer_price").addClass("d-none");
                    $(".rfq_price").addClass("d-none");
                }

            });

        });
    </script>

    <script>
        $('.stock_select').on('change', function() {
            var stock_value = $(this).find(":selected").val();
            if (stock_value == 'available') {
                $(".qty_display").removeClass("d-none");
                $(".qty_required").prop('required', true);
            } else if (stock_value == 'limited') {
                $(".qty_display").removeClass("d-none");
                $(".qty_required").prop('required', true);
            } else {
                $(".qty_display").addClass("d-none");
                $(".qty_required").prop('required', false);
            }
        });
    </script>

    <script>
        // The DOM elements you wish to replace with Tagify
        var input1 = document.querySelector("#kt_tagify_1");
        var input2 = document.querySelector("#kt_tagify_2");

        // Initialize Tagify components on the above inputs
        new Tagify(input1);
        new Tagify(input2);
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get the checkbox and colors input container
            var checkbox = document.getElementById('dealCheckbox');
            var dealsInputContainer = document.getElementById('dealsInputContainer');

            // Add change event listener to the checkbox
            checkbox.addEventListener('change', function() {
                // Toggle the visibility of the colors input field based on checkbox state
                dealsInputContainer.style.display = checkbox.checked ? 'block' : 'none';
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            // Function to validate and switch tabs
            function validateAndSwitchTab(targetTabId) {
                let isValid = true;


                // Get the index of the tab to be shown
                const activeTabHref = $('.tab-trigger.active').attr('href');
                $(activeTabHref).find('input, textarea, select').each(function() {
                    var $field = $(this);


                    // Check if it's a Select2 element
                    var isSelect2 = $field.hasClass('select2-hidden-accessible');


                    if ($field.prop('required') && $field.val() === '') {
                        isValid = false;


                        if (isSelect2) {
                            // Apply CSS based on the element type
                            $field.next('.select2-container').addClass('is-invalid');
                        } else {
                            $field.addClass('is-invalid');
                        }
                    }
                });


                if (!isValid) {
                    // Fields are not valid, prevent the tab switch
                    return false;
                } else {
                    // Fields are valid, switch to the next tab
                    switchTab(targetTabId);
                    return true;
                }
            }


            // Function to switch tabs
            function switchTab(targetTabId) {
                $('.nav-link[href="' + targetTabId + '"]').tab('show');
            }


            // Event handler for tab switch
            $('.tab-trigger').on('show.bs.tab', function(event) {
                return validateAndSwitchTab($(this).data('bs-target'));
            });


            // Event handler for input change
            $('.tab-content').on('input change', 'input, textarea, select', function() {
                var $field = $(this);
                var isSelect2 = $field.hasClass('select2-hidden-accessible');


                // Remove red border when user interacts with the field
                if (isSelect2) {
                    $field.next('.select2-container').removeClass('is-invalid');
                } else {
                    $field.removeClass('is-invalid');
                }
            });


            // Event handler for multi-select change
            $('.multiple-select').on('change', function() {
                // Remove validation error only from the changed multi-select field
                var $multiSelect = $(this);
                $multiSelect.removeClass('is-invalid');
            });


            // Event handler for the "Continue" button
            $('.tab-trigger-next').on('click', function(event) {
                // Assuming the data-bs-target attribute contains the tab ID to switch to
                const targetTabId = $(this).data('bs-target');


                // Validate and switch to the next tab
                validateAndSwitchTab(targetTabId);
            });


            // Event handler for the "Previous" button
            $('.tab-trigger-previous').on('click', function(event) {
                // Assuming the data-bs-target attribute contains the tab ID to switch to
                const targetTabId = $(this).data('bs-target');


                // Validate and switch to the previous tab
                validateAndSwitchTab(targetTabId);
            });
        });
    </script>

    {{-- Category & Subcategory --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function() {
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "{{ url('/district-get/ajax') }}/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="childcategory_id"]').html('');
                            var d = $('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="subcategory_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .subcategory_name + '</option>');
                            });
                        },

                    });
                } else {
                    alert('danger');
                }
            });
        });


        // Show State Data

        $(document).ready(function() {
            $('select[name="subcategory_id"]').on('change', function() {
                var subcategory_id = $(this).val();
                if (subcategory_id) {
                    //function subcategory() {
                    $.ajax({
                        url: "{{ url('/state-get/ajax') }}/" + subcategory_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="childcategory_id"]').html('');
                            var d = $('select[name="childcategory_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="childcategory_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .childcategory_name + '</option>');
                            });
                        },

                    });
                    //}
                } else {
                    alert('danger');
                }
            });
        });
    </script>

    {{-- multi image  --}}
    <script>
        $(document).ready(function() {
            $('#multiImg').on('change', function() { //on file input change
                if (window.File && window.FileReader && window.FileList && window
                    .Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function(index, file) { //loop though each file
                        if (/(\.|\/)(gif|jpe?g|png|webp)$/i.test(file
                                .type)) { //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file) { //trigger function on successful read
                                return function(e) {
                                    var img = $('<img/>').addClass('thumb').attr('src',
                                            e.target.result).width(80)
                                        .height(60); //create image element
                                    $('#preview_img').append(
                                        img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                } else {
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });
    </script>




@endsection
