@extends('frontend.frontend_dashboard')
@section('frontend')
    <!-- CONTENT + SIDEBAR -->
    <div class="main-wrapper clearfix">
        <div class="site-pagetitle jumbotron">
            <div class="container theme-container text-center">
                <h3>Dada <span class=" thm-clr">Vaai</span>
                </h3>
                <!-- Breadcrumbs -->
                <div class="breadcrumbs">
                    <div class="breadcrumbs text-center">
                        <i class="fa fa-arrow-circle-right"></i>
                        <a href="{{ route('index') }}">Home</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="theme-container container">
            <!-- About Starts -->
            <div class="gst-spc3">
                <div class="about-box" style="margin-bottom: 2rem; margin-top: 2rem;">
                    <div class="col-sm-6 about-info space-bottom-50 section-title-area ltn__section-title-2">

                        <h6 class="thm-clr">About Our Mission & Vission</h6>

                        <h1 class="section-title thm-clr fw600">{{ $about->breadcrumb_title }}</h1>

                        <p class="ceo_title" style="text-align: justify;">{{ $about->breadcrumb_sub_title }}</p>

                        <p>
                            <span class="thm-clr">{{ $about->section_one_badge }}</span>

                            {!! $about->section_one_description !!}


                            <span class="thm-clr">{{ $about->section_two_badge }}</span>

                            {!! $about->section_two_description !!}

                        </p>

                    </div>
                    <div class="col-sm-6 spcbt-30">
                        <img src="{{ asset('upload/about/' . $about->section_one_image) }}" alt="">
                    </div>
                </div>
            </div>
            <!-- / About Ends -->
        </div>

        <div class="theme-container container-fluid" style="background-color: #f4f4f4;">
            <!-- About Starts -->
            <div class="gst-spc3 container-fluid" style="background-color: antiquewhite;">
                <div class="about-box" style="margin-bottom: 2rem; margin-top: 2rem;">

                    <div class="col-sm-6 spcbt-30">
                        <img src="{{ asset('upload/about/' . $about->ceo_section_image) }}" alt="">
                    </div>

                    <div class="col-sm-6 about-info space-bottom-50 section-title-area ltn__section-title-2">

                        <h6 class="thm-clr">{{ $about->ceo_section_badge }}</h6>

                        <h1 class="section-title thm-clr fw600">Meet Our <br
                                class="d-none d-md-block">{{ $about->ceo_section_title }} </h1>

                        <p class="ceo_title">{{ $about->ceo_section_sub_title }}</p>

                        <p>{!! $about->ceo_section_description !!}</p>

                        <div class="about-author-info">

                            <div class="author-name-designation  align-self-center">
                                <h4 class="mb-0 fw600 thm-clr">{{ $about->ceo_section_ceo_name }}</h4>
                                <small>{{ $about->ceo_section_ceo_designation }}</small>
                            </div>

                            <div class="author-sign">
                                <img src="{{ asset('upload/about/' . $about->ceo_section_signature_image) }}"
                                    alt="author-sign">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- / About Ends -->
        </div>

        <div class="theme-container container-fluid" style="background-color: #f4f4f4;">
            <!-- About Starts -->
            <div class="gst-spc3 container">
                <div class="about-box row">

                    <h3 class="why_choose_us thm-clr fw600" style="">WHY CHOOSE US</h3>

                    <div class="col-sm-4 spcbt-30">

                        <div class="choose_us" style="padding: 20px; background-color: white;">

                            <img src="{{ asset('upload/about/' . $about->choose_us_one_image) }}" alt="delivery-truck"
                                width="40px" height="40px">

                            <h4 class="fw600 blk-clr">{{ $about->choose_us_one_title }}</h4>

                            <p>{{ $about->choose_us_one_description }}</p>

                        </div>
                    </div>


                    <div class="col-sm-4 spcbt-30">
                        <div class="choose_us" style="padding: 20px; background-color: white;">
                            <img src="{{ asset('upload/about/' . $about->choose_us_two_image) }}" alt="delivery-truck"
                                width="40px" height="40px">

                            <h4 class="fw600 blk-clr">{{ $about->choose_us_two_title }}</h4>

                            <p>{{ $about->choose_us_two_description }}</p>
                        </div>
                    </div>
                    <div class="col-sm-4 spcbt-30">
                        <div class="choose_us" style="padding: 20px; background-color: white;">
                            <img src="{{ asset('upload/about/' . $about->choose_us_three_image) }}" alt="delivery-truck"
                                width="40px" height="40px">
                            <h4 class="fw600 blk-clr">{{ $about->choose_us_three_title }}</h4>
                            <p>{{ $about->choose_us_three_description }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- / About Ends -->
        </div>

        <div class="theme-container container">
            <!-- About Starts -->
            <div class="gst-spc3">
                <div class="about-box" style="margin-bottom: 2rem; margin-top: 2rem;">
                    <h3 class="why_choose_us thm-clr fw600" style="position: relative; bottom: 1rem;">Contact Details</h3>

                    <div class="col-sm-4 about-info space-bottom-50 section-title-area ltn__section-title-2">

                        <p class="thm-clr fw600">{{ $about->head_office_title }}</p>
                        <ul class="about-contact">
                            <li>
                                <i class="fa fa-map-marker fsz-20"></i>
                                <span class="desc"> {{ $about->head_office_address }} </span>
                            </li>
                            <li>
                                <i class="fa fa-envelope-o fsz-20"></i>
                                <span class="desc"> {{ $about->head_office_email }} </span>
                            </li>
                            <li>
                                <i class="fa fa-phone fsz-20"></i>
                                <span class="desc"> {{ $about->head_office_phone }} </span>
                            </li>
                        </ul>
                    </div>

                    <div class="col-sm-2" style="border-right: 2px solid #ef4416;">
                        <p class="thm-clr fw600">{{ $about->sub_office_one_title }}</p>
                        <ul class="about-contact">
                            <li>
                                <span class="desc">{{ $about->sub_office_one_address }}</span>
                            </li>
                            <li>
                                <span class="desc">{{ $about->sub_office_one_email }}</span>
                            </li>
                            <li>
                                <span class="desc">{{ $about->sub_office_one_phone }}</span>
                            </li>
                        </ul>
                    </div>

                    <div class="col-sm-2" style="border-right: 2px solid #ef4416;">
                        <p class="thm-clr fw600">{{ $about->sub_office_two_title }}</p>
                        <ul class="about-contact">
                            <li>
                                <span class="desc">{{ $about->sub_office_two_address }}</span>
                            </li>
                            <li>
                                <span class="desc">{{ $about->sub_office_two_email }}</span>
                            </li>
                            <li>
                                <span class="desc">{{ $about->sub_office_two_phone }}</span>
                            </li>
                        </ul>
                    </div>

                    <div class="col-sm-2" style="border-right: 2px solid #ef4416;">
                        <p class="thm-clr fw600">{{ $about->sub_office_three_title }}</p>
                        <ul class="about-contact">
                            <li>
                                <span class="desc">{{ $about->sub_office_three_address }}</span>
                            </li>
                            <li>
                                <span class="desc">{{ $about->sub_office_three_email }}</span>
                            </li>
                            <li>
                                <span class="desc">{{ $about->sub_office_three_phone }}</span>
                            </li>
                        </ul>
                    </div>

                    <div class="col-sm-2" style="border-right: 2px solid #ef4416;">
                        <p class="thm-clr fw600">{{ $about->sub_office_four_title }}</p>
                        <ul class="about-contact">
                            <li>
                                <span class="desc">{{ $about->sub_office_four_address }}</span>
                            </li>
                            <li>
                                <span class="desc">{{ $about->sub_office_four_email }}</span>
                            </li>
                            <li>
                                <span class="desc">{{ $about->sub_office_four_phone }}</span>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
        <div class="theme-container container-fluid" style="background-color: #f4f4f4; padding: 40px;">
            <div class="container theme-container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="counter">
                            <p>
                                <span class="counter-value"
                                    style="color: #ef4416;font-size: 25px;font-weight: 700">{{ $about->counter_one_value }}</span>
                            </p>
                            <h4>{{ $about->counter_one_title }}</h4>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="counter purple">
                            <p>
                                <span class="counter-value"
                                    style="color: #ef4416;font-size: 25px;font-weight: 700">{{ $about->counter_two_value }}</span>
                            </p>
                            <h4>{{ $about->counter_two_title }}</h4>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="counter purple">
                            <p>
                                <span class="counter-value"
                                    style="color: #ef4416;font-size: 25px;font-weight: 700">{{ $about->counter_three_value }}</span>
                            </p>
                            <h4>{{ $about->counter_three_title }}</h4>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="counter purple">
                            <p>
                                <span class="counter-value"
                                    style="color: #ef4416;font-size: 25px;font-weight: 700">{{ $about->counter_four_value }}</span>
                            </p>
                            <h4>{{ $about->counter_four_title }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / About Ends -->
    </div>
    <div class="clear"></div>
    </div>
@endsection
