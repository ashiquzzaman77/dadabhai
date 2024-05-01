@php
    $categorys = App\Models\Admin\Category::where('status', '1')->orderBy('id','DESC')->limit(4)->get();
@endphp


<section class="all__product pt-80 pb-20">
    <div class="all__product--nav">
        <div class="container">
            <div class="row all__product--row align-items-center justify-content-between">
                <div class="col-xl-12 col-md-12">
                    <div class="all__product--menu mb-30">
                        <nav>
                            <hr class="m-0 p-0" style="margin-bottom: -25px !important" />
                            <div class="nav nav-tabs d-flex justify-content-center" id="nav-tab" role="tablist">

                                @forelse ($categorys as $key=>$category)
                                    <a class="nav-item nav-link {{ $key == 0 ? 'active' : '' }} btn orange-bg-btn pure__black-color"
                                        data-toggle="tab" href="#categorys{{ $category->id }}" role="tab"
                                        aria-controls="nav-home" aria-selected="true">{{ $category->category_name }}</a>
                                @empty
                                    <p>No Category Avaiable</p>
                                @endforelse

                                {{-- <a class="nav-item nav-link active btn orange-bg-btn pure__black-color"
                                    id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                                    aria-controls="nav-home" aria-selected="true">Electronics Devices</a>

                                <a class="nav-item nav-link btn gray-bg-btn pure__black-color" id="nav-profile-tab"
                                    data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile"
                                    aria-selected="false">TV & Home Appliances</a>

                                <a class="nav-item nav-link btn gray-bg-btn pure__black-color" id="nav-contact-tab"
                                    data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact"
                                    aria-selected="false">Electronic Accessories</a> --}}
                            </div>
                        </nav>
                    </div>
                </div>

                <div class="col-xl-12">
                    <div class="all__product--link text-center mb-30">
                        <a class="all-link" href="{{ route('template.one.all_product') }}">Discover All Products<span
                                class="lnr lnr-arrow-right"></span></a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="all__product--body">
        <div class="container">
            <div class="row">

                <div class="col-sm-12">

                    <div class="tab-content" id="nav-tabContent">

                        @foreach ($categorys as $key => $category)
                            <div class="tab-pane fade show {{ $key == 0 ? 'active' : '' }}"
                                id="categorys{{ $category->id }}" role="tabpanel" aria-labelledby="nav-home-tab">

                                @php

                                    $catwiseProduct = App\Models\Admin\Product::where('status', '1')
                                        ->where('category_id', $category->id)
                                        ->orderBy('product_name', 'ASC')
                                        ->limit(8)
                                        ->latest()
                                        ->get();

                                @endphp

                                <div class="product__active owl-carousel">

                                    @forelse ($catwiseProduct as $product)
                                        <div class="product__single">
                                            <div class="product__box">
                                                <div class="product__thumb">

                                                    <a href="product-details.html" class="img-wrapper">
                                                        <img class="img" src="{{ asset($product->product_image) }}"
                                                            alt="" style="height: 230px;" />

                                                    </a>
                                                </div>

                                                <div class="product__content--top">
                                                    <span
                                                        class="cate-name">{{ $product['category']['category_name'] }}</span>
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

                                                <a style="cursor: pointer;" id="{{$product->id}}" onclick="addToWishList(this.id)"><span class="lnr lnr-heart"></span></a>

                                                {{-- <a href="#"><span class="lnr lnr-eye"></span></a> --}}
                                                <a href="{{ url('product' . '/' . $product->id . '/' . $product->product_slug) }}"><span
                                                        class="lnr lnr-cart"></span></a>

                                                <a href="#"><span class="lnr lnr-sync"></span></a>

                                            </div>
                                        </div>
                                    @empty
                                        <p>No Product Avaiable</p>
                                    @endforelse

                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
