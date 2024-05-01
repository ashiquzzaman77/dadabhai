@php
    $categorys = App\Models\Admin\Category::where('status', '1')->limit(4)->latest()->get();
    $products = App\Models\Admin\Product::where('status', '1')->limit(8)->latest()->get();
@endphp

<section class="gst-row row-arrivals woocommerce ovh">
    <div class="container theme-container">
        <div class="gst-column col-lg-12 no-padding text-center">
            <div class="fancy-heading text-center">
                <h3><span class="thm-clr">New</span> Arrivals</h3>
                <h5 class="funky-font-2">Trending Products</h5>
            </div>
            <div class="tabbable-panel">
                <div class="tabbable-line">

                    <ul class="nav nav-tabs" style="margin: 14px; display: flex; justify-content: center;">

                        <li class="active">
                            <a href="#all-new-arival" data-toggle="tab"> All </a>
                        </li>

                        @if (count($categorys) > 0)
                            @foreach ($categorys as $category)
                                <li>
                                    <a href="#category{{ $category->id }}" data-toggle="tab">
                                        {{ $category->category_name }}
                                    </a>
                                </li>
                            @endforeach
                        @else
                        @endif

                    </ul>

                    <div class="tab-content">

                        <div class="tab-pane active" id="all-new-arival">

                            @if (count($products) > 0)
                                @foreach ($products as $product)
                                    <div class="col-md-3 col-sm-6">
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
                                                            <i class="fa fa-heart" style="margin-left: -25px"></i>
                                                        </a>
                                                        <a data-toggle="modal" href="#product-preview"
                                                            class="center-link">
                                                            <i class="fa fa-search" style="margin-right: 5px"></i>
                                                        </a>
                                                        <a href="#" class="center-link">
                                                            <i class="cart-icn" style="margin-right: -5px"></i>
                                                        </a>
                                                        <a data-toggle="modal" href="#rfq" class="right-link">
                                                            <i class="cart-icn" style="margin-right: -30px"></i>
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
                            @endif

                        </div>

                        @foreach ($categorys as $category)
                            <div class="tab-pane" id="category{{ $category->id }}">

                                @php
                                    $catwiseProduct = App\Models\Admin\Product::where('status', '1')
                                        ->where('category_id', $category->id)
                                        ->limit(4)
                                        ->latest()
                                        ->get();
                                @endphp


                                @forelse ($catwiseProduct as $product)
                                    <div class="col-md-3 col-sm-6">
                                        <div class="portfolio-wrapper">
                                            <div class="portfolio-thumb">
                                                <img src="{{ asset($product->product_image ) }}"
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
                                                            <i class="fa fa-heart" style="margin-left: -25px"></i>
                                                        </a>
                                                        <a data-toggle="modal" href="#product-preview"
                                                            class="center-link">
                                                            <i class="fa fa-search" style="margin-right: 5px"></i>
                                                        </a>
                                                        <a href="#" class="center-link">
                                                            <i class="cart-icn" style="margin-right: -5px"></i>
                                                        </a>
                                                        <a data-toggle="modal" href="#rfq" class="right-link">
                                                            <i class="cart-icn" style="margin-right: -30px"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h3>
                                                    <a class="title-3 fsz-16" href="#">
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

                                @empty
                                    <p class="text-danger">No Product Avaiable</p>
                                @endforelse


                            </div>
                        @endforeach


                        {{-- <div class="tab-pane" id="tab_default_3">
                            <p>Howdy, I'm in Tab 3.</p>
                            <p>
                                Duis autem vel eum iriure dolor in hendrerit in vulputate.
                                Ut wisi enim ad minim veniam, quis nostrud exerci tation
                                ullamcorper suscipit lobortis nisl ut aliquip ex ea
                                commodo consequat. Duis autem vel eum iriure dolor in
                                hendrerit in vulputate velit esse molestie consequat
                            </p>
                            <p>
                                <a class="btn btn-info" href="http://j.mp/metronictheme" target="_blank">
                                    Learn more...
                                </a>
                            </p>
                        </div> --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
