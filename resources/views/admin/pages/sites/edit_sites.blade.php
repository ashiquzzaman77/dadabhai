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
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Sites</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">

                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Edit Sites<span class="ms-2 badge bg-danger"></span></li>
                    <!--end::Item-->

                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">

                <a href="{{ route('all.sites') }}" class="btn btn-light-primary btn-sm">Back</a>

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

                    <form action="{{ route('update.site') }}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <input type="hidden" name="id" value="{{ $site->id }}">

                        <div class="modal-body">

                            <div class="row">

                                <div class="col-4">

                                    <div class="form-group mb-3">
                                        <label for="" class="mb-2">Site
                                            Name</label>
                                        <input type="text" name="site_name" class="form-control form-control-sm"
                                            placeholder="Site Name" value="{{ $site->site_name }}" autocomplete="off">
                                    </div>
                                </div>

                                <div class="col-4">

                                    <div class="form-group mb-3">
                                        <label for="" class="mb-2">Site
                                            Slogan</label>
                                        <input type="text" name="site_slogan" class="form-control form-control-sm"
                                            placeholder="Site Slogan" value="{{ $site->site_slogan }}" autocomplete="off">
                                    </div>
                                </div>

                                <div class="col-4">

                                    <div class="form-group mb-3">
                                        <label for="" class="mb-2">Company
                                            Name</label>
                                        <input type="text" name="company_name" class="form-control form-control-sm"
                                            placeholder="Company Name" value="{{ $site->company_name }}" autocomplete="off">

                                    </div>
                                </div>

                                <div class="col-4">

                                    <div class="form-group mb-3">
                                        <label for="" class="mb-2">Phone
                                            One</label>
                                        <input type="text" name="phone_one" class="form-control form-control-sm"
                                            placeholder="Phone One" value="{{ $site->phone_one }}" autocomplete="off">
                                    </div>

                                </div>

                                <div class="col-4">

                                    <div class="form-group mb-3">
                                        <label for="" class="mb-2">Phone
                                            Two</label>
                                        <input type="tel" name="phone_two" class="form-control form-control-sm"
                                            placeholder="Phone Two" value="{{ $site->phone_two }}" autocomplete="off">

                                    </div>

                                </div>

                                <div class="col-4">

                                    <div class="form-group mb-3">
                                        <label for="" class="mb-2">Whatsapp
                                            Number</label>
                                        <input type="tel" name="whatsapp_number" class="form-control form-control-sm"
                                            placeholder="Whatsapp Number" value="{{ $site->whatsapp_number }}"
                                            autocomplete="off">
                                    </div>

                                </div>

                                <div class="col-4">

                                    <div class="form-group mb-3">
                                        <label for="" class="mb-2">Address</label>
                                        <input type="text" name="address" class="form-control form-control-sm"
                                            placeholder="Address" value="{{ $site->address }}" autocomplete="off">
                                    </div>

                                </div>

                                <div class="col-3">

                                    <div class="form-group mb-3">
                                        <label for="" class="mb-2">Default
                                            Currency</label>
                                        <input type="text" name="default_currency"
                                            class="form-control form-control-sm" placeholder="Default Currency"
                                            value="{{ $site->default_currency }}" autocomplete="off">
                                    </div>

                                </div>


                                <div class="col-2">
                                    <div class="form-group mb-3">
                                        <label for="" class="mb-2">Conversion
                                            Rate</label>
                                        <input type="number" name="currency_conversion_rate"
                                            class="form-control form-control-sm" placeholder="Conversion Rate"
                                            value="{{ $site->currency_conversion_rate }}" autocomplete="off">
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="form-group mb-3">
                                        <label for="" class="mb-2">Default
                                            Language</label>
                                        <input type="text" name="default_language"
                                            class="form-control form-control-sm" placeholder="Default Language"
                                            value="{{ $site->default_language }}" autocomplete="off">
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="form-group mb-3">
                                        <label for="" class="mb-2">Contact
                                            Email</label>
                                        <input type="email" name="contact_email" class="form-control form-control-sm"
                                            placeholder="Contact Email" value="{{ $site->contact_email }}"
                                            autocomplete="off">
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="form-group mb-3">
                                        <label for="" class="mb-2">Info
                                            Email</label>
                                        <input type="email" name="info_email" class="form-control form-control-sm"
                                            placeholder="Info Email" value="{{ $site->info_email }}" autocomplete="off">
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="form-group mb-3">
                                        <label for="" class="mb-2">Support
                                            Email</label>
                                        <input type="email" name="support_email" class="form-control form-control-sm"
                                            placeholder="Support Email" value="{{ $site->support_email }}"
                                            autocomplete="off">
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="form-group mb-3">
                                        <label for="" class="mb-2">Sales
                                            Email</label>
                                        <input type="email" name="sales_email" class="form-control form-control-sm"
                                            placeholder="Sales Email" value="{{ $site->sales_email }}"
                                            autocomplete="off">
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group mb-3">
                                        <label for="" class="mb-2">Facebook
                                            Url</label>
                                        <input type="text" name="facebook_url" class="form-control form-control-sm"
                                            placeholder="Facebook Url" value="{{ $site->facebook_url }}"
                                            autocomplete="off">
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group mb-3">
                                        <label for="" class="mb-2">Skype
                                            Url</label>
                                        <input type="text" name="skype_url" class="form-control form-control-sm"
                                            placeholder="Skype Url" value="{{ $site->skype_url }}" autocomplete="off">
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group mb-3">
                                        <label for="" class="mb-2">Twitter
                                            Url</label>
                                        <input type="text" name="twitter_url" class="form-control form-control-sm"
                                            placeholder="Skype Url" value="{{ $site->twitter_url }}" autocomplete="off">
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="form-group mb-3">
                                        <label for="" class="mb-2">Instragram
                                            Url</label>
                                        <input type="text" name="instagram_url" class="form-control form-control-sm"
                                            placeholder="Instragram Url" value="{{ $site->instagram_url }}"
                                            autocomplete="off">
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="form-group mb-3">
                                        <label for="" class="mb-2">Linedin
                                            Url</label>
                                        <input type="text" name="linkedin_url" class="form-control form-control-sm"
                                            placeholder="Linedin Url" value="{{ $site->linkedin_url }}"
                                            autocomplete="off">
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="form-group mb-3">
                                        <label for="" class="mb-2">Youtube
                                            Url</label>
                                        <input type="text" name="youtube_url" class="form-control form-control-sm"
                                            placeholder="Youtube Url" value="{{ $site->youtube_url }}"
                                            autocomplete="off">
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="form-group mb-3">
                                        <label for="" class="mb-2">Github
                                            Url</label>
                                        <input type="text" name="github_url" class="form-control form-control-sm"
                                            placeholder="Github Url" value="{{ $site->github_url }}" autocomplete="off">
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="form-group mb-3">
                                        <label for="" class="mb-2">Portfolio
                                            Url</label>
                                        <input type="text" name="portfolio_url" class="form-control form-control-sm"
                                            placeholder="Portfolio Url" value="{{ $site->portfolio_url }}"
                                            autocomplete="off">
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="form-group mb-3">
                                        <label for="" class="mb-2">Fiver
                                            Url</label>
                                        <input type="text" name="fiver_url" class="form-control form-control-sm"
                                            placeholder="Fiver Url" value="{{ $site->fiver_url }}" autocomplete="off">
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="form-group mb-3">
                                        <label for="" class="mb-2">Upword
                                            Url</label>
                                        <input type="text" name="upwork_url" class="form-control form-control-sm"
                                            placeholder="Fiver Url" value="{{ $site->upwork_url }}" autocomplete="off">
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="form-group mb-3">
                                        <label for="" class="mb-2">Service Day
                                            Url</label>
                                        <input type="text" name="service_days" class="form-control form-control-sm"
                                            placeholder="Service Day" value="{{ $site->service_days }}"
                                            autocomplete="off">
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="form-group mb-3">
                                        <label for="" class="mb-2">Service Time
                                            Url</label>
                                        <input type="text" name="service_time" class="form-control form-control-sm"
                                            placeholder="Service Time" value="{{ $site->service_time }}"
                                            autocomplete="off">
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="form-group mb-3">
                                        <label for="" class="mb-2">White
                                            Logo</label>
                                        <input type="file" name="logo_white" class="form-control form-control-sm"
                                            autocomplete="off">
                                        <img src="{{ asset('upload/logo_white/' . $site->logo_white) }}" alt=""
                                            style="width: 73px;height:70px;" class="mt-2">
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="form-group mb-3">
                                        <label for="" class="mb-2">Black
                                            Logo</label>
                                        <input type="file" name="logo_black" class="form-control form-control-sm"
                                            autocomplete="off">
                                        <img src="{{ asset('upload/logo_black/' . $site->logo_black) }}" alt=""
                                            style="width: 73px;height:70px;" class="mt-2">
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="form-group mb-3">
                                        <label for="" class="mb-2">Favicon</label>
                                        <input type="file" name="favicon" class="form-control form-control-sm"
                                            autocomplete="off">
                                        <img src="{{ asset('upload/favicon/' . $site->favicon) }}" alt=""
                                            style="width: 73px;height:70px;" class="mt-2">
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm">Update
                                Site</button>
                        </div>
                    </form>

                    <!--end::Table-->
                </div>
            </div>
        </div>
    </div>
    <!--end::Post-->

    {{-- Modal --}}

    <!-- Button trigger modal -->
@endsection
