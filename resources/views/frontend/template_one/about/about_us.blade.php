@extends('frontend.template_one.frontend_dashboard_template_one')
@section('index_template_one')
    <!-- page banner area start -->
    <section class="page-banner-area" data-background="{{ asset('frontend/template_one/assets/img/bg/page-banner.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-sm-12">
                    <div class="banner-text text-center pt-90 pb-25">
                        <h2 class="f-800 cod__black-color">{{ $about->breadcrumb_title }}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('index') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    {{ $about->breadcrumb_sub_title }}
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- page banner area end -->

    <!-- about area start -->
    <section class="about-area pt-80 pb-45">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="pb-30">
                        <p>{{ $about->section_one_badge }}</p>
                        <h1 class="font-weight-bold grenadier-color">
                            {{ $about->section_one_title }}
                        </h1>
                        <p>{{ $about->section_one_sub_title }}</p>
                    </div>

                    <p>{!! $about->section_one_description !!}</p>


                </div>
                <div class="col-lg-4">
                    <img class="img-fluid rounded" src="{{ asset('upload/about/' . $about->section_one_image) }}"
                        alt="" />
                </div>
            </div>
        </div>
    </section>
    <!-- about area end -->


    <!-- about area start -->
    <section class="about-area pt-80 pb-45">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <img class="img-fluid rounded" src="{{ asset('upload/about/' . $about->ceo_section_image) }}"
                        alt="" />
                </div>
                <div class="col-lg-8">
                    <div class="pb-30">
                        <p>{{ $about->ceo_section_badge }}</p>
                        <h1 class="font-weight-bold grenadier-color">
                            {{ $about->ceo_section_title }}
                        </h1>
                        <p>{{ $about->ceo_section_sub_title }}</p>
                    </div>
                    <p>{!! $about->ceo_section_description !!}</p>
                    <h6 class="font-weight-bold grenadier-color">{{ $about->ceo_section_ceo_name }}</h6>
                    <p>{{ $about->ceo_section_ceo_designation }}</p>
                    <div>
                        <img class="" width="150px"
                            src="{{ asset('upload/about/' . $about->ceo_section_signature_image) }}" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about area end -->
@endsection
