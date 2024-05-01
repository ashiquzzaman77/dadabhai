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
                            <h2 class="f-800 cod__black-color">
                                WishList <span class="grenadier-color">PRODUCT</span>
                            </h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb pt-3">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('index') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item grenadier-color active" aria-current="page">
                                        <a href="">
                                            <span class="grenadier-color">WishList</span>
                                        </a>
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

    <!-- shop area start -->
    <div class="product shop-page pt-80 pb-80 fix">
        <div class="container">
            <div class="border-b">
                <div class="row">
                    <div class="col-lg-12 col-md-4">
                        <div class="shop-bar d-flex align-items-center justify-content-between">
                            <h5 class="f-800 cod__black-color">
                                <span class="grenadier-color">WishList</span>
                            </h5>
                            <a href="{{ route('index') }}" class="f-800 cod__black-color">
                                <span class="grenadier-color">CONTINUE SHOPPING <i
                                        class="fa fa-long-arrow-right"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-12">
                    <div class="card border-0 shadow-lg">
                        <div class="card-body">
                            <div class="row">

                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <!-- Cart Header -->
                                            <thead class="bg-light border-none">
                                                <tr>
                                                    <th style="width: 10%">Image</th>
                                                    <th style="width: 35%">Product Name</th>
                                                    <th style="width: 10%">Price</th>
                                                    <th style="width: 13%">Remove</th>
                                                </tr>
                                            </thead>
                                            <!-- Cart Content -->

                                            <tbody id="wishlist"> </tbody>

                                        </table>
                                    </div>
                                </div>
                                <!-- Check Out Content -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
