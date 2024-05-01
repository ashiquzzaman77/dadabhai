@extends('frontend.template_one.frontend_dashboard_template_one')
@section('index_template_one')
    <!-- hero  -->
    @include('frontend.template_one.partials.home_page.hero')
    <!-- Hero end -->

    <!-- Top Category Area  -->
    @include('frontend.template_one.partials.home_page.home_category')
    <!-- Top Category Area end -->

    <!-- Discover All Product  -->
    @include('frontend.template_one.partials.home_page.home_product')
    <!-- Discover All Product end -->

    <!-- Weekly Deals -->
    @include('frontend.template_one.partials.home_page.home_weekly_offer')
    <!-- Weekly Deals end -->

    <!-- Featured  -->
    @include('frontend.template_one.partials.home_page.home_feature')
    <!-- Featured end -->

    <!-- Featured Items   -->
    {{-- <div class="product pt-50 feature-h-one">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-9 col-sm-6">
                    <div class="product-section mb-30">
                        <h6 class="product--section__title f-800 white-color grenadier-bg">
                            Featured Items
                        </h6>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                  <div class="all__product--link text-right mb-30">
                      <a class="all-link" href="shop-collection.html">Discover All Products<span
                              class="lnr lnr-arrow-right"></span></a>
                  </div>
              </div>

            </div>
            <div class="row">

                <div class="col-lg-4 col-md-6">
                    <div class="product__single mb-30">
                        <div class="product__box featured__box--item">
                            <div class="product__thumb">
                                <a href="product-details.html"><img class="img"
                                        src="{{ asset('frontend/template_one/assets/img/allproducts/products__thumb__11.jpg') }}"
                                        alt="" /></a>
                            </div>

                            <div class="product--flex__right">

                                <div class="product__content--top">
                                    <span class="cate-name">SAMSUNG</span>
                                    <h6 class="product__title mine__shaft-color f-700 mb-30">
                                        <a href="product-details.html">Wireless Audioing Systems Purple Degree</a>
                                    </h6>
                                </div>

                                <div class="product__content--rating d-flex justify-content-between">
                                    <div class="rating">
                                        <ul class="list-inline">
                                            <li class="rating-active">
                                                <i class="fas fa-star"></i>
                                            </li>
                                            <li class="rating-active">
                                                <i class="fas fa-star"></i>
                                            </li>
                                            <li class="rating-active">
                                                <i class="fas fa-star"></i>
                                            </li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                        </ul>
                                    </div>
                                    <div class="price">
                                        <h5 class="grenadier-color f-600">$2,299.00</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="product__single mb-30">
                        <div class="product__box featured__box--item">
                            <div class="product__thumb">
                                <a href="product-details.html"><img class="img"
                                        src="{{ asset('frontend/template_one/assets/img/allproducts/products__thumb__11.jpg') }}"
                                        alt="" /></a>
                            </div>

                            <div class="product--flex__right">

                                <div class="product__content--top">
                                    <span class="cate-name">SAMSUNG</span>
                                    <h6 class="product__title mine__shaft-color f-700 mb-30">
                                        <a href="product-details.html">Wireless Audioing Systems Purple Degree</a>
                                    </h6>
                                </div>

                                <div class="product__content--rating d-flex justify-content-between">
                                    <div class="rating">
                                        <ul class="list-inline">
                                            <li class="rating-active">
                                                <i class="fas fa-star"></i>
                                            </li>
                                            <li class="rating-active">
                                                <i class="fas fa-star"></i>
                                            </li>
                                            <li class="rating-active">
                                                <i class="fas fa-star"></i>
                                            </li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                        </ul>
                                    </div>
                                    <div class="price">
                                        <h5 class="grenadier-color f-600">$2,299.00</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="product__single mb-30">
                        <div class="product__box featured__box--item">
                            <div class="product__thumb">
                                <a href="product-details.html"><img class="img"
                                        src="{{ asset('frontend/template_one/assets/img/allproducts/products__thumb__11.jpg') }}"
                                        alt="" /></a>
                            </div>

                            <div class="product--flex__right">

                                <div class="product__content--top">
                                    <span class="cate-name">SAMSUNG</span>
                                    <h6 class="product__title mine__shaft-color f-700 mb-30">
                                        <a href="product-details.html">Wireless Audioing Systems Purple Degree</a>
                                    </h6>
                                </div>

                                <div class="product__content--rating d-flex justify-content-between">
                                    <div class="rating">
                                        <ul class="list-inline">
                                            <li class="rating-active">
                                                <i class="fas fa-star"></i>
                                            </li>
                                            <li class="rating-active">
                                                <i class="fas fa-star"></i>
                                            </li>
                                            <li class="rating-active">
                                                <i class="fas fa-star"></i>
                                            </li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                        </ul>
                                    </div>
                                    <div class="price">
                                        <h5 class="grenadier-color f-600">$2,299.00</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="product__single mb-30">
                        <div class="product__box featured__box--item">
                            <div class="product__thumb">
                                <a href="product-details.html"><img class="img"
                                        src="{{ asset('frontend/template_one/assets/img/allproducts/products__thumb__11.jpg') }}"
                                        alt="" /></a>
                            </div>

                            <div class="product--flex__right">

                                <div class="product__content--top">
                                    <span class="cate-name">SAMSUNG</span>
                                    <h6 class="product__title mine__shaft-color f-700 mb-30">
                                        <a href="product-details.html">Wireless Audioing Systems Purple Degree</a>
                                    </h6>
                                </div>

                                <div class="product__content--rating d-flex justify-content-between">
                                    <div class="rating">
                                        <ul class="list-inline">
                                            <li class="rating-active">
                                                <i class="fas fa-star"></i>
                                            </li>
                                            <li class="rating-active">
                                                <i class="fas fa-star"></i>
                                            </li>
                                            <li class="rating-active">
                                                <i class="fas fa-star"></i>
                                            </li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                        </ul>
                                    </div>
                                    <div class="price">
                                        <h5 class="grenadier-color f-600">$2,299.00</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div> --}}
    <!-- Featured Items  end -->



    <!-- Brand -->
    <div class="brand">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="brand-active">
                        <div class="single-brand">
                            <img src="img/brand/brand-logo1.png" alt="" />
                        </div>
                        <div class="single-brand">
                            <img src="img/brand/brand-logo2.png" alt="" />
                        </div>
                        <div class="single-brand">
                            <img src="img/brand/brand-logo3.png" alt="" />
                        </div>
                        <div class="single-brand">
                            <img src="img/brand/brand-logo4.png" alt="" />
                        </div>
                        <div class="single-brand">
                            <img src="img/brand/brand-logo5.png" alt="" />
                        </div>
                        <div class="single-brand">
                            <img src="img/brand/brand-logo2.png" alt="" />
                        </div>
                        <div class="single-brand">
                            <img src="img/brand/brand-logo1.png" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Brand End -->

    <!-- Subscribe -->
    <div class="subscribe subscribe--area grenadier-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="newsletter newsletter--box d-flex justify-content-between align-items-center pos-rel">
                        <div class="left d-flex justify-content-between align-items-center">
                            <div class="newsletter__title">
                                <span class="notification--icon"><img src="img/icon/notification-icon.png"
                                        alt="notification" /></span>
                                <span class="notification__title--heading f-800 white-color">Subscribe for Join
                                    Us!</span>
                            </div>
                            <div class="newsletter--message d-none d-xl-block">
                                <p class="newsletter__message__title mb-0">
                                    .... & receive $20 coupne for first Shopping & free
                                    delivery.
                                </p>
                            </div>
                        </div>
                        <form class="right newsletter--form pos-rel">
                            <input class="newsletter--input" type="text"
                                placeholder="Enter Your Email Address ..." />
                            <button class="btn newsletter--button" type="button">
                                <img src="img/icon/plan-icon.png" alt="" />
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Subscribe End -->

    <!-- modal area start --
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
          Launch demo modal
      </button>

      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                     <div class="modal-wrapper">
                         <div class="pro-img">
                             <img src="img/allproducts/modal-img.jpg" data-zoom-image="img/allproducts/demo.jpg" class="zoom-e-img" alt="">
                         </div>
                         <div class="pro-text">
                             <h4>-30% on Subscribe</h4>
                             <p>Five things you only know if you were at Chanel
                                 Hamburg Show Kering Reinforces Luxury Status
                                 By Distributing Puma.</p>
                              <form action="#">
                                  <input type="email" placeholder="Enter your Email">
                                  <button type="submit">Submit</button>
                                  <span>
                                      <input type="checkbox">
                                      Prevent this pop-up
                                  </span>
                              </form>
                         </div>
                     </div>
                  </div>
              </div>
          </div>
      </div>
      -- modal area end -->
@endsection
