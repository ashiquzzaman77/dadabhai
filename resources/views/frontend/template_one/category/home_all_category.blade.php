@extends('frontend.template_one.frontend_dashboard_template_one')
@section('index_template_one')
    <!-- page banner area start -->
    <section class="page-banner-area blog-page"
        data-background="{{ asset('frontend/template_one/assets/img/bg/blog-page-banner.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div>
                        <div class="banner-text text-center pt-80 pb-80">
                            <h2 class="f-800 cod__black-color">Shop Category</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb pt-3">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('index') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Category.
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- page banner area end -->

    <!-- shop cat area start -->
    <div class="top__featured--area pt-30 pb-50">
        <div class="container">


            <div class="row mt-3">

                @forelse ($categorys as $category)
                    <div class="col-lg-2 col-md-2 col-sm-6">
                        <div class="single-categories cat-box mb-30">
                            <div class="categories-box brands-box-cate position-relative">
                                <div class="categories-thumb">
                                    <a
                                        href="{{ url('product/category/' . $category->id . '/' . $category->category_slug) }}"><img
                                            class="img"
                                            src="{{ asset('storage/category/' . $category->category_image) }}"
                                            alt="" /></a>
                                    <h6 class="mt-3">{{ $category->category_name }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-danger">No Category Avaiable</p>
                @endforelse

            </div>
        </div>
    </div>
    <!-- shop cat area end -->

    <!-- Subscribe -->
    {{-- <div class="subscribe subscribe--area grenadier-bg">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="newsletter newsletter--box d-flex justify-content-between align-items-center pos-rel">
            <div class="left d-flex justify-content-between align-items-center">
              <div class="newsletter__title">
                <span class="notification--icon"><img src="img/icon/notification-icon.png"
                    alt="" /></span>
                <span class="notification__title--heading f-800 white-color">Subscribe for Join Us!</span>
              </div>
              <div class="newsletter--message d-none d-xl-block">
                <p class="newsletter__message__title mb-0">
                  .... & receive $20 coupne for first Shopping & free
                  delivery.
                </p>
              </div>
            </div>
            <form class="right newsletter--form pos-rel">
              <input class="newsletter--input" type="text" placeholder="Enter Your Email Address ..." />
              <button class="btn newsletter--button" type="button">
                <img src="img/icon/plan-icon.png" alt="" />
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div> --}}
    <!-- Subscribe End -->
@endsection
