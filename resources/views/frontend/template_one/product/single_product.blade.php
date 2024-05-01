@extends('frontend.template_one.frontend_dashboard_template_one')
@section('index_template_one')
    <!-- Main -->
    <main class="main--wrapper">
        <!-- Shop-details start -->
        <section class="shop-details-area pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="shop-bred pt-35 pb-35">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('index') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="javascript:;">{{ $product->category->category_name }}</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="javascript:;">{{ $product->subcategory->subcategory_name }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        <a href="javascript:;">{{ $product->childcategory->childcategory_name }}</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-lg-12 col-md-6 order-1 order-lg-1">
                                <div class="pro-img">



                                    <div class="tab-content" id="myTabContent">


                                        @forelse ($multiImages as $key => $multiImage)
                                            <div class="tab-pane fade show {{ $key == 0 ? 'active' : '' }}"
                                                id="multiImg{{ $multiImage->id }}" role="tabpanel"
                                                aria-labelledby="home-tab5">
                                                <img src="{{ asset($multiImage->multi_image) }}" class="img-fluid mb-2"
                                                    alt="" style="width:100%; height: 400px;" />
                                            </div>
                                        @empty

                                            <img src="{{ asset('upload/no_image.jpg') }}" class="img-fluid mb-2"
                                                alt="" style="width:100%; height: 400px;" />
                                        @endforelse



                                    </div>

                                    <ul class="nav" id="myTab1" role="tablist">

                                        @forelse ($multiImages as $key => $multiImage)
                                            <li class="nav-item">
                                                <a class="nav-link {{ $key == 0 ? 'active' : '' }}" id="home-tab5"
                                                    data-toggle="tab" href="#multiImg{{ $multiImage->id }}" role="tab"
                                                    aria-controls="home5" aria-selected="true">
                                                    <img src="{{ asset($multiImage->multi_image) }}" class="img-fluid"
                                                        alt=""
                                                        style="width: 75px;height: 75px; margin-bottom: 10px;" />
                                                </a>
                                            </li>
                                        @empty
                                            <img src="{{ asset('upload/no_image.jpg') }}" class="img-fluid" alt=""
                                                style="width: 75px;height: 75px; margin-bottom: 10px;" />
                                        @endforelse

                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="row gx-0">
                            <div class="col-lg-7 col-md-12 order-3 order-lg-2">
                                <div class="pro-content">
                                    <span>{{ $product->category->category_name }}</span>

                                    <h5 class="title" id="dpname">
                                        {{ $product->product_name }}
                                    </h5>

                                    <div class="pro-code">

                                        <p>{!! $product->short_desc !!}</p>

                                        <ul class="d-flex justify-content-between">
                                            <li>SKU: <span>{{ $product->sku_code }}</span></li>
                                            <li>MF Code: <span>{{ $product->mf_code }}</span></li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-5 col-md-6 order-2 order-lg-3">
                                <div class="cart-wrapper">
                                    <div class="cart-title">
                                        <h6>
                                            Availability: <span class="text-danger">Pre Order</span>
                                        </h6>
                                    </div>
                                    <div class="mb-20 row">
                                        <div class="col-lg-6">
                                            {{-- <del>$3,200.55</del> --}}
                                            <h5>Price</h5>

                                            @if ($product->price_status == 'rfq')
                                                <h5 class="grenadier-color f-600">
                                                    Tk {{ $product->sas_price }}
                                                </h5>
                                            @elseif ($product->price_status == 'offer_price')
                                                <h5 class="grenadier-color f-600">
                                                    Tk {{ $product->discount_price }}</h5>
                                            @else
                                                <h5 class="grenadier-color f-600">Tk {{ $product->price }}
                                                </h5>
                                            @endif

                                        </div>

                                        <div class="col-lg-6">
                                            <label class="mb-0">Quantity:</label>
                                            <div class="number d-flex align-items-center">

                                                <input type="number" class="mb-0  border-1" name="" value="1"
                                                    min="1" id="dqty" style="width: 50px" />

                                            </div>
                                        </div>

                                    </div>

                                    {{-- <div class="mb-4">
                                        <p class="mb-0">Accessories</p>
                                        <div>
                                            <ul style="list-style-type: circle !important;">
                                                <li class="d-flex mb-2 align-items-center">
                                                    <span class="pr-2">1.</span>
                                                    <input type="text" class="form-control form-control-sm w-100"
                                                        name="" id="" placeholder="Blue Color Headset" />
                                                    <input type="number" class="form-control form-control-sm w-25"
                                                        name="" id="" placeholder="1" />
                                                </li>
                                            </ul>
                                            <li class="d-flex mb-2 align-items-center">
                                                <span class="pr-2">2.</span>
                                                <input type="text" class="form-control form-control-sm w-100"
                                                    name="" id="" placeholder="Blue Color Headset" />
                                                <input type="number" class="form-control form-control-sm w-25"
                                                    name="" id="" placeholder="1" />
                                            </li>
                                            </ul>
                                        </div>
                                    </div> --}}

                                    <div class="d-flex align-items-center">

                                        <input type="hidden" id="oneproduct_id" value="{{ $product->id }}">


                                        <a type="submit" onclick="addToCartOne()" class="cart-button w-100 mt-0">Add
                                            Cart</a>

                                        <a type="submit" onclick="buyToCartOne()" class="cart-button w-100 ml-3 mt-0">Buy Now</a>

                                    </div>

                                    {{-- <div class="last pt-15 align-items-center d-flex justify-content-center">
                                        <a href="#">Add To Wishlist</a>
                                        <a href="#">Compare</a>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="row align-items-center">
                                <div class="col-xl-12 col-sm-12">
                                    <div class="product-section2 mt-40">
                                        <h6 class="product--section__title2 pb-30" id="releted-tab" data-toggle="tab"
                                            href="#releted" role="tab" aria-controls="releted" aria-selected="true">
                                            <span>Releted </span> Accessories Of This Product
                                        </h6>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 px-0">
                                <div class="releted_accessories">

                                    @forelse ($relativeChild as $product)
                                        <div class="card border-0 shadow-sm">

                                            <div class="card-header p-0 border-0">
                                                <img src="{{ asset($product->product_image) }}" class="border img-fluid"
                                                    style="width: 100%; height: 140px;" alt="" />
                                            </div>

                                            <div class="card-body p-0">
                                                <div class="container">
                                                    <div class="row align-items-center">
                                                        <div class="col-lg-12 p-1" style="background-color: #eee">
                                                            <small class="text-black">{{ $product->product_name }}</small>
                                                        </div>

                                                        <div class="col-lg-6 p-0">

                                                            <a href="{{ url('product' . '/' . $product->id . '/' . $product->product_slug) }}"
                                                                class="btn btn-primary btn-sm">+Add</a>

                                                        </div>

                                                        <div class="col-lg-6 ms-2 mt-3">
                                                            <div class="">
                                                                @if ($product->price_status == 'rfq')
                                                                    <p class="grenadier-color">
                                                                        Tk {{ $product->sas_price }}
                                                                    </p>
                                                                @elseif ($product->price_status == 'offer_price')
                                                                    <p class="grenadier-color">
                                                                        Tk {{ $product->discount_price }}</p>
                                                                @else
                                                                    <p class="grenadier-color">Tk
                                                                        {{ $product->price }}
                                                                    </p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <P>No Product Avaiable</P>
                                    @endforelse

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- Shop-details end -->

        <!-- Shop-details tab start -->
        <section class="shop-details-desc">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="desc-wrapper">
                            <ul class="nav custom-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" id="home-tab11" data-toggle="tab" href="#home11" role="tab"
                                        aria-controls="home11" aria-selected="true">Specification</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" id="profile-tab11" data-toggle="tab" href="#profile11"
                                        role="tab" aria-controls="profile11" aria-selected="false">Accessories
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab11" data-toggle="tab" href="#product-blogs"
                                        role="tab" aria-controls="product-blogs" aria-selected="false">Overview</a>
                                </li>
                            </ul>

                            <div class="tab-content" id="myTabContent1">
                                <div class="tab-pane fade" id="home11" role="tabpanel" aria-labelledby="home-tab11">
                                    <div class="desc-content mt-60">
                                        <div class="row">
                                            <div class="col-md-12 mb-30">
                                                <div class="spe-wrapper">
                                                    <p>{!! $product->specification !!}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade show active" id="profile11" role="tabpanel"
                                    aria-labelledby="profile-tab11">
                                    <div class="desc-content mt-60">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="single-content mb-40">
                                                    <p>{!! $product->accessories !!}</p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="product-blogs" role="tabpanel"
                                    aria-labelledby="contact-tab11">
                                    <div class="desc-content mt-60">
                                        <div class="row small-padding">

                                            <p>{!! $product->overview !!}</p>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Shop-details tab end -->

        <!-- Product  -->
        <div class="product pt-75 product-h-two">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-sm-12">
                        <div class="section-header">
                            <div class="row align-items-center">
                                <div class="col-xl-3 col-sm-6">
                                    <div class="product-section2">
                                        <h6 class="product--section__title2" id="releted-tab" data-toggle="tab"
                                            href="#releted" role="tab" aria-controls="releted" aria-selected="true">
                                            <span>Releted Category</span>
                                        </h6>
                                    </div>
                                </div>

                                {{-- <div class="col-xl-6 col-sm-6">
                                    <ul class="nav nav-tabs border-0 d-flex justify-content-center" id="myTab"
                                        role="tablist">
                                        <li class="nav-item mb-0 pb-0 border-0">
                                            <a class="nav-link border-0 active" id="releted_product-tab"
                                                data-toggle="tab" href="#releted_product" role="tab"
                                                aria-controls="releted_product" aria-selected="true">Relted
                                                Category</a>
                                        </li>
                                        <li class="nav-item mb-0 pb-0 border-0">
                                            <a class="nav-link border-0" id="apple-tab" data-toggle="tab" href="#apple"
                                                role="tab" aria-controls="apple" aria-selected="true">Apple</a>
                                        </li>
                                        <li class="nav-item mb-0 pb-0 border-0">
                                            <a class="nav-link border-0" id="mark-tab" data-toggle="tab" href="#mark"
                                                role="tab" aria-controls="mark" aria-selected="false">Oppo</a>
                                        </li>
                                        <li class="nav-item mb-0 pb-0 border-0">
                                            <a class="nav-link border-0" id="acronis-tab" data-toggle="tab"
                                                href="#acronis" role="tab" aria-controls="acronis"
                                                aria-selected="false">Nikon</a>
                                        </li>
                                        <li class="nav-item mb-0 pb-0 border-0">
                                            <a class="nav-link border-0" id="apple-tab" data-toggle="tab" href="#apple"
                                                role="tab" aria-controls="apple" aria-selected="true">Veloce</a>
                                        </li>
                                        <li class="nav-item mb-0 pb-0 border-0">
                                            <a class="nav-link border-0" id="mark-tab" data-toggle="tab" href="#mark"
                                                role="tab" aria-controls="mark" aria-selected="false">Motul</a>
                                        </li>
                                        <li class="nav-item mb-0 pb-0 border-0">
                                            <a class="nav-link border-0" id="acronis-tab" data-toggle="tab"
                                                href="#acronis" role="tab" aria-controls="acronis"
                                                aria-selected="false">Nokia</a>
                                        </li>
                                        <li class="nav-item mb-0 pb-0 border-0">
                                            <a class="nav-link border-0" id="acronis-tab" data-toggle="tab"
                                                href="#acronis" role="tab" aria-controls="acronis"
                                                aria-selected="false">Remarkable</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-xl-3 col-sm-6">
                                    <div class="all__product--link text-right">
                                        <a class="all-link" href="shop-collection.html">Discover All Products<span
                                                class="lnr lnr-arrow-right"></span></a>
                                    </div>
                                </div> --}}

                            </div>
                        </div>
                    </div>
                </div>

                <div class="">

                    <div class="tab-pane fade show active" id="nav-home-all" role="tabpanel"
                        aria-labelledby="nav-home-tab-all">
                        <div class="product__active owl-carousel">

                            @forelse ($relativeProduct as $product)
                                <div class="product__single">
                                    <div class="product__box">
                                        <div class="product__thumb">

                                            <a href="product-details.html" class="img-wrapper">
                                                <img class="img" src="{{ asset($product->product_image) }}"
                                                    alt="" style="height: 230px;" />

                                            </a>
                                        </div>

                                        <div class="product__content--top">
                                            <span class="cate-name">{{ $product['category']['category_name'] }}</span>
                                            <h6 class="product__title mine__shaft-color f-700 mb-0">
                                                <a
                                                    href="{{ url('product' . '/' . $product->id . '/' . $product->product_slug) }}">{{ $product->product_name }}</a>
                                            </h6>
                                        </div>

                                        <div
                                            class="product__content--rating d-flex justify-content-between align-items-center">

                                            <a href="{{ url('product' . '/' . $product->id . '/' . $product->product_slug) }}"
                                                class="btn btn-primary btn-sm">
                                                Add To Cart
                                            </a>

                                            <div class="price">
                                                @if ($product->price_status == 'rfq')
                                                    <h5 class="grenadier-color f-600">
                                                        Tk {{ $product->sas_price }}
                                                    </h5>
                                                @elseif ($product->price_status == 'offer_price')
                                                    <h5 class="grenadier-color f-600">
                                                        Tk {{ $product->discount_price }}</h5>
                                                @else
                                                    <h5 class="grenadier-color f-600">Tk {{ $product->price }}
                                                    </h5>
                                                @endif
                                            </div>

                                        </div>

                                    </div>
                                    <div class="product-action">
                                        <a href="#"><span class="lnr lnr-heart"></span></a>
                                        {{-- <a href="#"><span class="lnr lnr-eye"></span></a> --}}
                                        <a
                                            href="{{ url('product' . '/' . $product->id . '/' . $product->product_slug) }}"><span
                                                class="lnr lnr-cart"></span></a>
                                        <a href="#"><span class="lnr lnr-sync"></span></a>
                                    </div>
                                </div>

                            @empty
                                <span>No Product Avaiable</span>
                            @endforelse

                        </div>
                    </div>

                    {{-- <div class="tab-content" id="myTabContent">

                        <div class="tab-pane fade show active" id="releted_product" role="tabpanel"
                            aria-labelledby="releted_product-tab">

                            <div class="row">

                                <div class="col-xl-4 mb-4">

                                    @forelse ($relativeProduct as $product)
                                        <div class="product__single">
                                            <div class="product__box">
                                                <div class="product__thumb">
                                                    <a href="{{ url('product' . '/' . $product->id . '/' . $product->product_slug) }}"
                                                        class="img-wrapper">
                                                        <img class="img" src="{{ asset($product->product_image) }}"
                                                            alt="" style="height: 230px;" />
                                                        <img class="img secondary-img"
                                                        src="img/allproducts/products__thumb__02.jpg" alt="" />
                                                    </a>
                                                </div>
                                                <div class="product__content--top">
                                                    <span class="cate-name">{{ $product->category->category_name }}</span>
                                                    <h6 class="product__title mine__shaft-color f-700 mb-0">
                                                        <a
                                                            href="{{ url('product' . '/' . $product->id . '/' . $product->product_slug) }}">{{ $product->product_name }}</a>
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

                                                        @if ($product->price_status == 'rfq')
                                                            <h5 class="grenadier-color f-600">${{ $product->sas_price }}
                                                            </h5>
                                                        @elseif ($product->price_status == 'offer_price')
                                                            <h5 class="grenadier-color f-600">
                                                                ${{ $product->discount_price }}</h5>
                                                        @else
                                                            <h5 class="grenadier-color f-600">${{ $product->price }}</h5>
                                                        @endif

                                                    </div>

                                                </div>
                                            </div>
                                            <div class="product-action">
                                                <a href="#"><span class="lnr lnr-heart"></span></a>
                                                <a href="#"><span class="lnr lnr-eye"></span></a>
                                                <a href="#"><span class="lnr lnr-cart"></span></a>
                                                <a href="#"><span class="lnr lnr-sync"></span></a>
                                            </div>
                                        </div>
                                    @empty
                                        <span>No Product Avaiable</span>
                                    @endforelse

                                </div>

                            </div>

                        </div>

                        <div class="tab-pane fade" id="apple" role="tabpanel" aria-labelledby="apple-tab">
                            <div class="row">
                                <div class="col-xl-3 mb-4">
                                    <div class="product__single">
                                        <div class="product__box">
                                            <div class="product__content--top">
                                                <span class="cate-name">SAMSUNG</span>
                                                <h6 class="product__title mine__shaft-color f-700 mb-0">
                                                    <a href="product-details.html">Wireless Audioing Systems Purple
                                                        Degree</a>
                                                </h6>
                                            </div>
                                            <div class="product__thumb">
                                                <a href="product-details.html" class="img-wrapper">
                                                    <img class="img" src="img/allproducts/products__thumb__33.jpg"
                                                        alt="" />
                                                    <img class="img secondary-img"
                                                        src="img/allproducts/products__thumb__05.jpg" alt="" />
                                                </a>
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
                                        <div class="product-action">
                                            <a href="#"><span class="lnr lnr-heart"></span></a>
                                            <a href="#"><span class="lnr lnr-eye"></span></a>
                                            <a href="#"><span class="lnr lnr-cart"></span></a>
                                            <a href="#"><span class="lnr lnr-sync"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="mark" role="tabpanel" aria-labelledby="mark-tab">
                            <div class="row">
                                <div class="col-xl-3 mb-4">
                                    <div class="product__single">
                                        <div class="product__box">
                                            <div class="product__content--top">
                                                <span class="cate-name">SAMSUNG</span>
                                                <h6 class="product__title mine__shaft-color f-700 mb-0">
                                                    <a href="product-details.html">Wireless Audioing Systems Purple
                                                        Degree</a>
                                                </h6>
                                            </div>
                                            <div class="product__thumb">
                                                <a href="product-details.html" class="img-wrapper">
                                                    <img class="img" src="img/allproducts/products__thumb__33.jpg"
                                                        alt="" />
                                                    <img class="img secondary-img"
                                                        src="img/allproducts/products__thumb__05.jpg" alt="" />
                                                </a>
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
                                        <div class="product-action">
                                            <a href="#"><span class="lnr lnr-heart"></span></a>
                                            <a href="#"><span class="lnr lnr-eye"></span></a>
                                            <a href="#"><span class="lnr lnr-cart"></span></a>
                                            <a href="#"><span class="lnr lnr-sync"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="acronis" role="tabpanel" aria-labelledby="acronis-tab">
                            <div class="row">
                                <div class="col-xl-3 mb-4">
                                    <div class="product__single">
                                        <div class="product__box">
                                            <div class="product__content--top">
                                                <span class="cate-name">SAMSUNG</span>
                                                <h6 class="product__title mine__shaft-color f-700 mb-0">
                                                    <a href="product-details.html">Wireless Audioing Systems Purple
                                                        Degree</a>
                                                </h6>
                                            </div>
                                            <div class="product__thumb">
                                                <a href="product-details.html" class="img-wrapper">
                                                    <img class="img" src="img/allproducts/products__thumb__33.jpg"
                                                        alt="" />
                                                    <img class="img secondary-img"
                                                        src="img/allproducts/products__thumb__05.jpg" alt="" />
                                                </a>
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
                                        <div class="product-action">
                                            <a href="#"><span class="lnr lnr-heart"></span></a>
                                            <a href="#"><span class="lnr lnr-eye"></span></a>
                                            <a href="#"><span class="lnr lnr-cart"></span></a>
                                            <a href="#"><span class="lnr lnr-sync"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div> --}}

                </div>

            </div>
        </div>
        <!-- Product end -->

        <!-- Subscribe -->
        {{-- <div class="subscribe subscribe--area grenadier-bg">
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
        </div> --}}
        <!-- Subscribe End -->

    </main>
    <!-- Main End -->
@endsection
