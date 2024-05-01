@extends('frontend.frontend_dashboard')
@section('frontend')
    <!-- CONTENT + SIDEBAR -->
    <div class="main-wrapper clearfix">
        <div class="site-pagetitle jumbotron">
            <div class="container text-center">
                <h3>Dada <span class="funky-font thm-clr">Bhaai</span>
                </h3>
                <!-- Breadcrumbs -->
                <div class="breadcrumbs">
                    <div class="breadcrumbs text-center">
                        <i class="fa fa-home"></i>
                        <span>
                            <a href="{{ route('index') }}">Home</a>
                        </span>
                        <i class="fa fa-arrow-circle-right"></i>
                        <span class="current">{{ $brandname->brand_name }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="theme-container container">
            <div class="main-container row">

                <!-- Tab Trigger Area -->
                <aside class="col-md-3 col-sm-4">
                    <div class="main-sidebar">
                        <h3 class="sec-title fsz-25 no-mrgn blk-clr">FILTER BY</h3>
                        <!-- Search Container Start -->
                        <div id="search-2" class="widget sidebar-widget widget_search clearfix">
                            <form method="get" id="searchform" class="form-search" action="#">
                                <input id="brand-search" class="form-control search-query" type="text"
                                    placeholder="Type Keyword" name="brand-search">
                                <button class="btn btn-default search-button" type="submit" name="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </form>
                        </div>
                        <!-- Search Container End -->

                        <div class="widget sidebar-widget widget_categories clearfix" style="margin-top: 0px;">
                            <h6 class="widget-title">Brand All</h6>
                            <div class="panel-group">

                                @php
                                    $brands = App\Models\Brand::where('status', '1')
                                        ->orderBy('brand_name', 'ASC')
                                        ->latest()
                                        ->limit(6)
                                        ->get();
                                @endphp

                                <div class="panel panel-cate">
                                    <div class="cate-heading">
                                        @foreach ($brands as $brand)
                                            <div class="cat-item">
                                                @php
                                                    $product = App\Models\Admin\Product::where('status', '1')
                                                        ->where('brand_id', $brand->id)
                                                        ->get();
                                                @endphp
                                                <a href="{{ route('brand.wise.product', $brand->id) }}"
                                                    class="collapsed">{{ $brand->brand_name }}
                                                    <span>({{ count($product) }})</span>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>



                            </div>
                        </div>



                    </div>
                </aside>
                <!-- Tab Content Area-->

                <main class="col-md-9 col-sm-8 shop-wrap">

                    <div class="tab-content">
                        <!-- =======All Product Tab Content Start======= -->
                        <!--All Product Tab Content Start-->
                        <div id="all-product" class="tab-pane fade in active">
                            <!-- Tab Content 2 Start-->
                            <div class="content_area">

                                <div class="row spcbt-30">

                                    <div class="col-lg-4 col-sm-6 sorter">
                                        <ul class="nav-tabs tabination view-tabs">
                                            <li class="active">
                                                <a href="#grid-view" data-toggle="tab">
                                                    <i class="fa fa-th" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                        </ul>
                                        <form action="#" class="sorting-form">
                                            <div class="search-selectpicker selectpicker-wrapper">
                                                <select class="selectpicker input-price" data-live-search="true"
                                                    data-width="100%" data-toggle="tooltip" title="Sort By">
                                                    <option value="popularity">Sort by popularity</option>
                                                    <option value="rating">Sort by average rating</option>
                                                    <option value="date">Sort by newness</option>
                                                    <option value="price">Sort by price: low to high</option>
                                                    <option value="price-desc"> Sort by price: high to low </option>
                                                </select>
                                            </div>
                                        </form>
                                    </div>

                                </div>

                                <div class="tab-content">
                                    <!-- Product Grid View -->
                                    <div id="grid-view" class="tab-pane fade active in" role="tabpanel">

                                        <div class="row text-center hvr2 clearfix">


                                            @if (count($products) > 0)
                                                @foreach ($products as $product)
                                                    <div class="col-lg-4 col-sm-2">
                                                        <div class="portfolio-wrapper">
                                                            <div class="portfolio-thumb">
                                                                <img src="{{ asset($product->product_image) }}"
                                                                    style="width:270px; height: 270px;" alt="" />
                                                                <div class="portfolio-content">
                                                                    <div class="rating">
                                                                        <span class="star active"></span>
                                                                        <span class="star active"></span>
                                                                        <span class="star active"></span>
                                                                        <span class="star"></span>
                                                                        <span class="star"></span>
                                                                    </div>
                                                                    <div class="pop-up-icon">
                                                                        <a class="left-link">
                                                                            <i class="fa fa-heart"
                                                                                style="margin-left: -25px"></i>
                                                                        </a>
                                                                        <a data-toggle="modal" href="#product-preview"
                                                                            class="center-link">
                                                                            <i class="fa fa-search"
                                                                                style="margin-right: 5px"></i>
                                                                        </a>
                                                                        <a href="#" class="center-link">
                                                                            <i class="cart-icn"
                                                                                style="margin-right: -5px"></i>
                                                                        </a>
                                                                        <a data-toggle="modal" href="#rfq"
                                                                            class="right-link">
                                                                            <i class="cart-icn"
                                                                                style="margin-right: -30px"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="product-content">
                                                                <h3>
                                                                    <a class="title-3 fsz-16"
                                                                        href="{{ route('single.product', $product->id) }}">
                                                                        {{ $product->product_name }}
                                                                    </a>
                                                                </h3>
                                                                <p class="font-3">
                                                                    Price: <span class="thm-clr">

                                                                        @if ($product->price_status == 'rfq')
                                                                            {{ $product->sas_price }}
                                                                        @elseif ($product->price_status == 'offer_price')
                                                                            {{ $product->discount_price }}
                                                                        @else
                                                                            {{ $product->price }}
                                                                        @endif

                                                                    </span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <p>No Product Avaiable</p>
                                            @endif


                                        </div>



                                        <nav class="woocommerce-pagination">

                                            {{ $products->links('vendor.pagination.custom') }}

                                            {{-- <ul class="page-numbers">
                                                <li>
                                                    <a class="next page-numbers" href="#">
                                                        <i class="fa fa-angle-left"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <span class="page-numbers current">1</span>
                                                </li>
                                                <li>
                                                    <a class="page-numbers" href="#">2</a>
                                                </li>
                                                <li>
                                                    <a class="next page-numbers" href="#">
                                                        <i class="fa fa-angle-right"></i>
                                                    </a>
                                                </li>
                                            </ul> --}}

                                        </nav>
                                    </div>
                                    <!-- / Product Grid View -->
                                </div>

                            </div>
                        </div>



                    </div>
                </main>
            </div>
        </div>
    </div>
    <div class="clear"></div>
    <!-- / CONTENT + SIDEBAR -->
@endsection
