@extends('frontend.template_one.frontend_dashboard_template_one')
@section('index_template_one')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- shop area start -->
    <form action="{{ route('shop.filter') }}" method="POST">
        @csrf
        <div class="product shop-page pt-30 pb-80">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 order-2 order-lg-1">

                        <div class="common-sidebar shop-banner-sidebar">


                            {{-- Category --}}
                            <div class="common-cat">

                                <div class="side-title">
                                    <h6>Categories</h6>
                                </div>

                                <ul>
                                    @if (!empty($_GET['category']))
                                        @php
                                            $filterCat = explode(',', $_GET['category']);
                                        @endphp
                                    @endif

                                    @foreach ($categorys as $cat)
                                        @php
                                            $countProduct = App\Models\Admin\Product::where(
                                                'category_id',
                                                $cat->id,
                                            )->get();
                                        @endphp

                                        <li style="margin-left: 15px;">

                                            <label class="">
                                                <input type="checkbox" class="form-check-input" name="category[]"
                                                    id="" value="{{ $cat->category_slug }}"
                                                    @if (!empty($filterCat) && in_array($cat->category_slug, $filterCat)) checked @endif
                                                    onchange="this.form.submit();">

                                                {{ $cat->category_name }} ({{ count($countProduct) }})

                                            </label>

                                        </li>
                                    @endforeach
                                </ul>

                            </div>
                            {{-- Category --}}

                            {{-- Brand  --}}
                            <div class="common-cat mt-4">
                                <div class="side-title">
                                    <h6>Brands</h6>
                                </div>
                                <ul>

                                    @if (!empty($_GET['brand']))
                                        @php
                                            $filterBrand = explode(',', $_GET['brand']);
                                        @endphp
                                    @endif

                                    @foreach ($brands as $brand)
                                        @php
                                            $countBrand = App\Models\Admin\Product::where(
                                                'brand_id',
                                                $brand->id,
                                            )->get();
                                        @endphp

                                        <li style="margin-left: 15px;">
                                            <label class="">
                                                <input type="checkbox" class="form-check-input" name="brand[]"
                                                    id="" value="{{ $brand->brand_slug }}"
                                                    @if (!empty($filterBrand) && in_array($brand->brand_slug, $filterBrand)) checked @endif
                                                    onchange="this.form.submit();">

                                                {{ $brand->brand_name }} ({{ count($countBrand) }})

                                            </label>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            {{-- Brand  --}}

                            {{-- Price --}}
                            <div class="slider-range mt-50">

                                <div class="side-title mb-30">
                                    <h6>Filter By Price</h6>
                                </div>

                                <div id="slider-range"></div>

                                <p>
                                    <label for="amount">Price :</label>
                                    <input type="text" id="amount" readonly>
                                </p>

                            </div>
                            {{-- Price --}}

                            {{-- Color --}}
                            <div class="side-color mt-45">
                                <div class="side-title">
                                    <h6>Color</h6>
                                </div>
                                <ul class="mt-15">
                                    <li>
                                        <a href="#">Blue (2)</a>
                                    </li>
                                </ul>
                            </div>
                            {{-- Color --}}

                            {{-- <div class="side-size mt-50">
                            <div class="side-title">
                                <h6>Size</h6>
                            </div>
                            <ul class="mt-15">
                                <li>
                                    <a href="#">Small (2)</a>
                                    <a href="#">Large (53)</a>
                                </li>
                                <li>
                                    <a href="#">Extra Large (16)</a>
                                    <a href="#">Medium (20)</a>
                                </li>
                                <li><a href="#">Extra Small (2)</a></li>
                                <li><a href="#">Huge (53)</a></li>
                            </ul>
                        </div> --}}

                            {{-- Popular Tag --}}

                            {{-- <div class="common-tag mt-50">
                                <div class="side-title">
                                    <h6>Popular Tag</h6>
                                </div>

                                @php

                                    $tags = App\Models\Admin\Product::where('status', '1')
                                        ->orderBy('product_name', 'ASC')
                                        ->latest()
                                        ->limit(7)
                                        ->get();

                                @endphp

                                <ul class="mt-25 mb-15">
                                    @forelse ($tags as $tag)
                                        <li><a href="javascript:;">{{ $tag->tags }}</a></li>
                                    @empty
                                        <p>No Tags Avaiable</p>
                                    @endforelse
                                </ul>

                            </div> --}}

                            {{-- Popular Tag --}}

                        </div>
                    </div>

                    <div class="col-lg-9 order-1 order-lg-2">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="shop-banner-bg pt-60 pb-60 mb-50"
                                    data-background="{{ asset('frontend/template_one/assets/img/bg/shop-banner-bg.jpg') }}">
                                    <div class="collection-text">
                                        <h5 class="f-800"><a href="javascript:;">Product</a></h5>
                                        {{-- <span class="f-200 mb-40">{{ $brandwiseproduct->brand_name }}</span> --}}
                                        {{-- <div class="product-countdown-three">
                                        <div class="time-count-deal">
                                            <div class="countdown-list" data-countdown="2020/12/01"></div>
                                        </div>
                                    </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-b">
                            <div class="row">

                                <div class="col-lg-5 col-md-4">
                                    <div class="shop-bar d-flex align-items-center">
                                        <h4 class="f-800 cod__black-color">Product</h4>
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">
                                                    Product</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>

                                {{-- New Section  --}}
                                <div class="col-lg-4 col-md-2">
                                    {{-- <div class="text-center" style="margin-top: 10px;">
                                        <span>Showing {{ count($products) }} of {{ $products->total() }} Results</span>
                                    </div> --}}
                                </div>

                                <div class="col-lg-3 col-md-6">

                                    <select name="sortBy" onchange="this.form.submit();">

                                        <option selected disabled>Sort By Product</option>

                                        <option value="nameAtoZ" @if (!empty($_GET['sortBy']) && $_GET['sortBy'] == 'nameAtoZ') selected @endif>Product
                                            Name: A to Z
                                        </option>

                                        <option value="nameZtoA" @if (!empty($_GET['sortBy']) && $_GET['sortBy'] == 'nameZtoA') selected @endif>Product
                                            Name: Z to A
                                        </option>

                                    </select>

                                </div>

                                {{-- <div class="col-lg-7 col-md-8">
                                    <div class="bar-wrapper">

                                        <div class="select-text">
                                            <span>Showing {{ count($products) }} of {{ $products->total() }}
                                                Results</span>
                                        </div>

                                        <div class="shop-select">

                                            <select name="sortBy" onchange="this.form.submit();">

                                                <option selected disabled>Sort By Products</option>

                                                <option value="nameAtoZ" @if (!empty($_GET['sortBy']) && $_GET['sortBy'] == 'nameAtoZ') selected @endif>
                                                    Product
                                                    Name: A to Z
                                                </option>

                                                <option value="nameZtoA" @if (!empty($_GET['sortBy']) && $_GET['sortBy'] == 'nameZtoA') selected @endif>
                                                    Product
                                                    Name: Z to A
                                                </option>

                                            </select>
                                        </div>

                                    </div>
                                </div> --}}

                            </div>
                        </div>


                        <div class="row mt-30">

                            @forelse ($products as $product)
                                <div class="col-lg-4">

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

                                </div>
                            @empty
                                <p class="text-dander">No Product Avaiable</p>
                            @endforelse

                        </div>

                        {{-- Pagination Section  --}}

                        <div class="row mt-10">
                            <div class="col-sm-12">
                                <div class="common-pagination">

                                    {{ $products->appends($_GET)->links('vendor.pagination.template_one') }}

                                </div>
                            </div>
                        </div>

                        {{-- Pagination Section  --}}

                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- shop area end -->
@endsection
