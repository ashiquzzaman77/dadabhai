@extends('frontend.frontend_dashboard')
@section('frontend')
    <!-- CONTENT + SIDEBAR -->
    <div class="main-wrapper clearfix">

        <div class="site-pagetitle jumbotron">
            <div class="container theme-container text-center">
                <h3>{{ $product->product_name }}</h3>

                <!-- Breadcrumbs -->
                <div class="breadcrumbs">
                    <div class="breadcrumbs text-center">
                        <i class="fa fa-home"></i>
                        <span><a href="{{ route('index') }}">Home</a></span>
                        <i class="fa fa-arrow-circle-right"></i>
                        <span class="current">Shop</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="theme-container container">
            <main id="main-content" class="main-content">

                <div itemscope itemtype="http://schema.org/Product"
                    class="product has-post-thumbnail product-type-variable">

                    <div class="row">

                        <div class="col-lg-6 col-md-8 col-sm-10 col-xs-12">
                            <div id="gallery-2" class="royalSlider rsUni">

                                @foreach ($multiImages as $multiImage)
                                    <a class="rsImg" data-rsbigimg="{{ asset($multiImage->multi_image) }}"
                                        href="{{ asset($multiImage->multi_image) }}" data-rsw="500" data-rsh="500">

                                        <img class="rsTmb" src="{{ asset($multiImage->multi_image) }}"
                                            alt="" /></a>
                                @endforeach

                                {{-- <a class="rsImg" data-rsbigimg="assets/img/products/single-1.jpg"
                                    href="assets/img/products/single-2.jpg" data-rsw="500" data-rsh="500">
                                    <img class="rsTmb" src="assets/img/products/single-thumb-2.jpg" alt="" /></a>

                                <a class="rsImg" data-rsbigimg="assets/img/products/single-1.jpg"
                                    href="assets/img/products/single-3.jpg" data-rsw="500" data-rsh="500">
                                    <img class="rsTmb" src="assets/img/products/single-thumb-3.jpg" alt="" /></a>

                                <a class="rsImg" data-rsbigimg="assets/img/products/single-1.jpg"
                                    href="assets/img/products/single-1.jpg" data-rsw="500" data-rsh="500">
                                    <img class="rsTmb" src="assets/img/products/single-thumb-1.jpg" alt="" /></a>

                                <a class="rsImg" data-rsbigimg="assets/img/products/single-1.jpg"
                                    href="assets/img/products/single-2.jpg" data-rsw="500" data-rsh="500">
                                    <img class="rsTmb" src="assets/img/products/single-thumb-2.jpg" alt="" /></a>

                                <a class="rsImg" data-rsbigimg="assets/img/products/single-1.jpg"
                                    href="assets/img/products/single-3.jpg" data-rsw="500" data-rsh="500">
                                    <img class="rsTmb" src="assets/img/products/single-thumb-3.jpg" alt="" /></a> --}}


                            </div>
                        </div>

                        <div class="spc-15 hidden-lg clear"></div>
                        <div class="col-lg-6 col-sm-12 col-md-12 col-xs-12">
                            <div class="summary entry-summary">
                                <div class="woocommerce-product-rating" itemprop="aggregateRating" itemscope
                                    itemtype="http://schema.org/AggregateRating">
                                    <div class="rating">
                                        <span class="star active"></span>
                                        <span class="star active"></span>
                                        <span class="star active"></span>
                                        <span class="star active"></span>
                                        <span class="star half"></span>
                                    </div>

                                    <div class="posted_in">
                                        <h3 class="funky-font-2 fsz-20">{{ $product->category->category_name }}</h3>
                                    </div>

                                    <div class="posted_in" style="display: flex; justify-content: space-between">

                                        <div>
                                            <span class="thm-clr"><i class="fa fa-check-circle" aria-hidden="true"></i>
                                                {{ $product->stock }}</span>
                                        </div>

                                        <div>
                                            <a class="thm-clr" data-toggle="modal" data-target="#myModal"
                                                style="cursor: pointer"><i class="fa fa-check-circle"
                                                    aria-hidden="true"></i>
                                                Review</a>
                                        </div>

                                    </div>

                                </div>

                                <div class="product_title_wrapper">

                                    <div itemprop="name" class="product_title entry-title">

                                        <span id="dname" name="dname"> {{ $product->product_name }}</span>

                                        <p class="font-3 fsz-18 no-mrgn price">

                                            @if ($product->price_status == 'rfq')
                                                <b class="amount blk-clr">Tk {{ $product->sas_price }}</b>
                                            @elseif ($product->price_status == 'offer_price')
                                                <del>Tk {{ $product->discount_price }}</del>
                                            @else
                                                <b class="amount blk-clr">Tk {{ $product->price }}</b>
                                            @endif



                                        </p>
                                    </div>
                                </div>

                                <div itemprop="description" class="fsz-15">
                                    <p>
                                        {!! $product->short_desc !!}
                                    </p>
                                </div>

                                <ul class="stock-detail list-items fsz-12">
                                    <li>
                                        <strong>
                                            SKU CODE : <span class="blk-clr"> {{ $product->sku_code }} </span>
                                        </strong>
                                    </li>

                                    {{-- <li>
                                        <strong>
                                            STOCK : <span class="blk-clr"> READY STOCK </span>
                                        </strong>
                                    </li> --}}

                                </ul>


                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group selectpicker-wrapper">
                                            <label class="fsz-15 title-3">
                                                <b> CHOOSE COLOR </b>
                                            </label>
                                            <div class="search-selectpicker selectpicker-wrapper">

                                                <select class="selectpicker input-price" data-live-search="true"
                                                    data-width="100%" id="dcolor" data-toggle="tooltip"
                                                    title="Choose Color">

                                                    @foreach ($product_colors as $product_color)
                                                        <option value="{{ $product_color }}">
                                                            {{ ucwords($product_color) }}</option>
                                                    @endforeach

                                                </select>

                                            </div>
                                        </div>
                                    </div>

                                    {{-- <div class="col-sm-4">
                                            <div class="form-group selectpicker-wrapper">
                                                <label class="fsz-15 title-3">
                                                    <b> CHOOSE SIZE </b>
                                                </label>
                                                <div class="search-selectpicker selectpicker-wrapper">
                                                    <select class="selectpicker input-price" data-live-search="true"
                                                        data-width="100%" data-toggle="tooltip" title="Large">
                                                        <option>Small</option>
                                                        <option>Medium</option>
                                                        <option>Large</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div> --}}

                                    <div class="col-sm-4">
                                        <div class="form-group selectpicker-wrapper">
                                            <label class="fsz-15 title-3">
                                                <b> QUANTITY </b>
                                            </label>
                                            <div class="search-selectpicker selectpicker-wrapper">

                                                <select class="selectpicker input-price" data-live-search="true"
                                                    data-width="100%" data-toggle="tooltip" id="dqty"
                                                    title="Select Quantity">
                                                    <option value="1">1 Pcs</option>
                                                    <option value="2">2 Pcs</option>
                                                    <option value="3">3 Pcs</option>
                                                    <option value="4">4 Pcs</option>
                                                    <option value="5">5 Pcs</option>
                                                    <option value="6">6 Pcs</option>

                                                </select>

                                                {{-- <input type="button" onclick="decrementValue()" value="-" />

                                                    <input type="text" name="quantity" value="1" maxlength="2"
                                                        max="10" size="1" min="1" class="number" id="qty" />

                                                    <input type="button" onclick="incrementValue()" value="+" /> --}}

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">


                                            <input type="hidden" id="dproduct_id" value="{{ $product->id }}">

                                            <button type="submit"
                                                class="single_add_to_cart_button button alt fancy-button left"
                                                onclick="addToCartDetails()"> Add to
                                                cart</button>

                                        </div>
                                    </div>

                                </div>

                            </div>
                            <!-- .summary -->
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="woocommerce-tabs wc-tabs-wrapper row">
                        <ul class="tabs wc-tabs">
                            <li class="description_tab">
                                <a href="#tab-description">Description</a>
                            </li>
                            <li class="additional_information_tab">
                                <a href="#tab-additional_information">Additional Information</a>
                            </li>
                            <li class="reviews_tab">
                                <a href="#tab-reviews">Reviews (3)</a>
                            </li>
                        </ul>

                        <div class="entry-content wc-tab col-lg-4 col-sm-6 col-xs-12" id="tab-description">
                            <h2 class="title-3">Description</h2>
                            <hr class="heading-seperator" />
                            <div class="scroll-div">
                                <div class="nano-content">

                                    <p>{!! $product->overview !!}</p>

                                </div>
                            </div>
                        </div>

                        {{-- Product Review  --}}
                        <div class="entry-content wc-tab col-lg-4 col-sm-6 col-xs-12" id="tab-reviews">
                            <h2 class="title-3">Product Review</h2>
                            <hr class="heading-seperator" />
                            <div class="scroll-div">
                                <div class="nano-content">
                                    <div id="reviews">
                                        <div id="comments">
                                            <ol class="commentlist">
                                                <li itemprop="review" itemscope itemtype="http://schema.org/Review"
                                                    class="comment even thread-even depth-1">
                                                    <div class="comment_container diblock">
                                                        <img alt="" src="assets/img/extra/review-1.jpg"
                                                            itemprop="image" class="avatar" height="60"
                                                            width="60" />
                                                        <div class="comment-text">
                                                            <strong class="name">JOHN LENNON</strong>
                                                            <div class="rating">
                                                                <span class="star active"></span>
                                                                <span class="star active"></span>
                                                                <span class="star active"></span>
                                                                <span class="star active"></span>
                                                                <span class="star half"></span>
                                                            </div>
                                                            <p class="meta">
                                                                <time itemprop="datePublished"
                                                                    datetime="2013-06-07T13:03:29+00:00">
                                                                    2 June, 2016</time>:
                                                            </p>
                                                            <div itemprop="description" class="description">
                                                                <p>
                                                                    cute reversitile hand bag shoulder bag that
                                                                    comes with straps inside it if you choose to
                                                                    wear
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <!-- #comment-## -->

                                                <li itemprop="review" itemscope itemtype="http://schema.org/Review"
                                                    class="comment even thread-even depth-1">
                                                    <div class="comment_container diblock">
                                                        <img alt="" src="assets/img/extra/review-1.jpg"
                                                            itemprop="image" class="avatar" height="60"
                                                            width="60" />
                                                        <div class="comment-text">
                                                            <strong class="name">JOHN LENNON</strong>
                                                            <div class="rating">
                                                                <span class="star active"></span>
                                                                <span class="star active"></span>
                                                                <span class="star active"></span>
                                                                <span class="star active"></span>
                                                                <span class="star half"></span>
                                                            </div>
                                                            <p class="meta">
                                                                <time itemprop="datePublished"
                                                                    datetime="2013-06-07T13:03:29+00:00">
                                                                    2 June, 2016</time>:
                                                            </p>
                                                            <div itemprop="description" class="description">
                                                                <p>
                                                                    cute reversitile hand bag shoulder bag that
                                                                    comes with straps inside it if you choose to
                                                                    wear
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <!-- #comment-## -->

                                                <li itemprop="review" itemscope itemtype="http://schema.org/Review"
                                                    class="comment even thread-even depth-1">
                                                    <div class="comment_container diblock">
                                                        <img alt="" src="assets/img/extra/review-1.jpg"
                                                            itemprop="image" class="avatar" height="60"
                                                            width="60" />
                                                        <div class="comment-text">
                                                            <strong class="name">JOHN LENNON</strong>
                                                            <div class="rating">
                                                                <span class="star active"></span>
                                                                <span class="star active"></span>
                                                                <span class="star active"></span>
                                                                <span class="star active"></span>
                                                                <span class="star half"></span>
                                                            </div>
                                                            <p class="meta">
                                                                <time itemprop="datePublished"
                                                                    datetime="2013-06-07T13:03:29+00:00">
                                                                    2 June, 2016</time>:
                                                            </p>
                                                            <div itemprop="description" class="description">
                                                                <p>
                                                                    cute reversitile hand bag shoulder bag that
                                                                    comes with straps inside it if you choose to
                                                                    wear
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <!-- #comment-## -->
                                            </ol>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Product Review  --}}

                        <div class="entry-content wc-tab col-lg-4 col-sm-6 col-xs-12" id="tab-additional_information">
                            <h2 class="title-3">Additional Information</h2>
                            <hr class="heading-seperator" />
                            <div class="scroll-div">
                                <div class="nano-content">

                                    {{-- <h2 class="title-3 fsz-14 no-mrgn spcbt-30">
                                        ASIN: <span class="thm-clr"> B00IL3TMFW </span>
                                    </h2> --}}

                                    <p>{!! $product->specification !!}</p>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

        {{-- Smiliar Product  --}}

        {{-- <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="compare-list">
                        <div class="heading-2" style="padding-bottom: unset">
                            <h3 class="title-3 fsz-15">Similar products</h3>
                        </div>
                        <div class="table-responsive fsz-12">
                            <table class="table table-responsive table-bordered table-compare">
                                <tbody>
                                    <tr>
                                        <th class="compare-label blk-clr"
                                            style="
                          vertical-align: middle !important;
                          background: #edebeb;
                          padding: 25px;
                        ">
                                            Image
                                        </th>
                                        <td class="text-center" style="vertical-align: middle !important">
                                            <a href="#">
                                                <img src="https://www.jaragroups.com/storage/images/product/Untitled design (24)1608973944.png"
                                                    alt="Product" height="130px" width="130px" />
                                            </a>
                                        </td>
                                        <!-- /.product -->
                                        <td class="text-center" style="vertical-align: middle !important">
                                            <a href="#">
                                                <img src="https://www.jaragroups.com/storage/images/product/Untitled design (20)1608967818.png"
                                                    alt="Product" height="130px" width="130px" />
                                            </a>
                                        </td>
                                        <!-- /.product -->
                                        <td class="text-center" style="vertical-align: middle !important">
                                            <a href="#">
                                                <img src="https://www.jaragroups.com/storage/images/product/Untitled design (19)1608802749.png"
                                                    alt="Product" height="130px" width="130px" />
                                            </a>
                                        </td>
                                        <!-- /.product -->
                                        <td class="text-center" style="vertical-align: middle !important">
                                            <a href="#">
                                                <img src="https://www.jaragroups.com/storage/images/product/Untitled design (18)1608798180.png"
                                                    alt="Product" height="130px" width="130px" />
                                            </a>
                                        </td>
                                        <!-- /.product -->
                                        <td class="text-center" style="vertical-align: middle !important">
                                            <a href="#">
                                                <img src="https://www.jaragroups.com/storage/images/product/Untitled design (17)1608793558.png"
                                                    alt="Product" height="130px" width="130px" />
                                            </a>
                                        </td>
                                        <!-- /.product -->
                                    </tr>
                                    <tr class="text-center">
                                        <th class="compare-label blk-clr"
                                            style="
                          vertical-align: middle !important;
                          background: #edebeb;
                          padding: 25px;
                        ">
                                            Name
                                        </th>
                                        <td class="blklt-clr" style="vertical-align: middle !important">
                                            <a href="">Electric Instant Hot Water</a>
                                        </td>
                                        <!-- /.product -->
                                        <td class="blklt-clr" style="vertical-align: middle !important">
                                            <a href=" ">Water Heater Geyser 45L</a>
                                        </td>
                                        <!-- /.product -->
                                        <td class="blklt-clr" style="vertical-align: middle !important">
                                            <a href=" ">Electric Instant Hot Water</a>
                                        </td>
                                        <!-- /.product -->
                                        <td class="blklt-clr" style="vertical-align: middle !important">
                                            <a href=" ">Instant Digital Electric H</a>
                                        </td>
                                        <!-- /.product -->
                                        <td class="blklt-clr" style="vertical-align: middle !important">
                                            <a href=" ">Instant Electric Hot Water</a>
                                        </td>
                                        <!-- /.product -->
                                    </tr>
                                    <tr class="text-center">
                                        <th class="compare-label blk-clr"
                                            style="
                          vertical-align: middle !important;
                          background: #edebeb;
                          padding: 25px;
                        ">
                                            Price
                                        </th>
                                        <td class="price blklt-clr" style="vertical-align: middle !important">
                                            <span class="thm-clr"> Tk 300</span>
                                        </td>
                                        <td class="price blklt-clr" style="vertical-align: middle !important">
                                            <span class="thm-clr"> Tk 4750</span>
                                        </td>
                                        <td class="price blklt-clr" style="vertical-align: middle !important">
                                            <span class="thm-clr"> Tk 2280</span>
                                        </td>
                                        <td class="price blklt-clr" style="vertical-align: middle !important">
                                            <span class="thm-clr"> Tk 2030</span>
                                        </td>
                                        <td class="price blklt-clr" style="vertical-align: middle !important">
                                            <span class="thm-clr"> Tk 1750</span>
                                        </td>
                                    </tr>
                                    <tr class="text-center">
                                        <th class="compare-label blk-clr"
                                            style="
                          vertical-align: middle !important;
                          background: #edebeb;
                          padding: 25px;
                        ">
                                            Brand
                                        </th>
                                        <td class="blklt-clr" style="vertical-align: middle !important">
                                            Others
                                        </td>
                                        <td class="blklt-clr" style="vertical-align: middle !important">
                                            Others
                                        </td>
                                        <td class="blklt-clr" style="vertical-align: middle !important">
                                            Others
                                        </td>
                                        <td class="blklt-clr" style="vertical-align: middle !important">
                                            Others
                                        </td>
                                        <td class="blklt-clr" style="vertical-align: middle !important">
                                            Others
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="compare-label blk-clr"
                                            style="
                          vertical-align: middle !important;
                          background: #edebeb;
                          padding: 25px;
                        ">
                                            Spec
                                        </th>
                                        <td style="vertical-align: middle !important">
                                            <p class="text-justify blklt-clr">
                                                ...
                                                <a href=" ">
                                                    <span class="" style="color: red;!important">more</span>
                                                </a>
                                            </p>
                                        </td>
                                        <td style="vertical-align: middle !important">
                                            <p class="text-justify blklt-clr">
                                                ...
                                                <a href=" ">
                                                    <span class="" style="color: red;!important">more</span>
                                                </a>
                                            </p>
                                        </td>
                                        <td style="vertical-align: middle !important">
                                            <p class="text-justify blklt-clr">
                                                Material: Stainless Steel + ABS (Acrylonitrile
                                                Butadiene Styrene) Plastic Surface ...
                                                <a href=" ">
                                                    <span class="" style="color: red;!important">more</span>
                                                </a>
                                            </p>
                                        </td>
                                        <td style="vertical-align: middle !important">
                                            <p class="text-justify blklt-clr">
                                                ...
                                                <a href=" ">
                                                    <span class="" style="color: red;!important">more</span>
                                                </a>
                                            </p>
                                        </td>
                                        <td style="vertical-align: middle !important">
                                            <p class="text-justify blklt-clr">
                                                5 seconds instantaneous heating Power savings tab
                                                Fully-automatic control Se...
                                                <a href=" ">
                                                    <span class="" style="color: red;!important">more</span>
                                                </a>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr class="text-center">
                                        <th class="compare-label blk-clr"
                                            style="
                          vertical-align: middle !important;
                          background: #edebeb;
                          padding: 25px;
                        ">
                                            Size
                                        </th>
                                        <td class="blklt-clr" style="vertical-align: middle !important">
                                            <p></p>
                                        </td>
                                        <!-- /.size -->
                                        <td class="blklt-clr" style="vertical-align: middle !important">
                                            <p></p>
                                        </td>
                                        <!-- /.size -->
                                        <td class="blklt-clr" style="vertical-align: middle !important">
                                            <p></p>
                                        </td>
                                        <!-- /.size -->
                                        <td class="blklt-clr" style="vertical-align: middle !important">
                                            <p></p>
                                        </td>
                                        <!-- /.size -->
                                        <td class="blklt-clr" style="vertical-align: middle !important">
                                            <p></p>
                                        </td>
                                        <!-- /.size -->
                                    </tr>
                                    <tr class="text-center">
                                        <th class="compare-label blk-clr"
                                            style="
                          vertical-align: middle !important;
                          background: #edebeb;
                          padding: 25px;
                        ">
                                            Color
                                        </th>
                                        <td class="blklt-clr" style="vertical-align: middle !important">
                                            <p></p>
                                        </td>
                                        <!-- /.color -->
                                        <td class="blklt-clr" style="vertical-align: middle !important">
                                            <p></p>
                                        </td>
                                        <!-- /.color -->
                                        <td class="blklt-clr" style="vertical-align: middle !important">
                                            <p></p>
                                        </td>
                                        <!-- /.color -->
                                        <td class="blklt-clr" style="vertical-align: middle !important">
                                            <p></p>
                                        </td>
                                        <!-- /.color -->
                                        <td class="blklt-clr" style="vertical-align: middle !important">
                                            <p></p>
                                        </td>
                                        <!-- /.color -->
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        {{-- Smiliar Product  --}}

        <div class="light-bg gst-row">

            <div class="fancy-heading text-center">
                <h3>RELATED PRODUCTS</h3>
                <h5 class="funky-font-2">
                    Customers who viewed this item also viewed
                </h5>
            </div>

            <!-- Portfolio items -->
            <div class="related-product nav-2 text-center">

                @foreach ($relativeProduct as $product)
                    <div class="product">
                        <div class="mx-3">
                            <img src="{{ asset($product->product_image) }}" style="width: 300px;height:300px;"
                                alt="" />
                        </div>
                        <div class="product-content">
                            <h3><a href="{{ route('single.product', $product->id) }}" class="title-3 fsz-16">
                                    {{ $product->product_name }} </a></h3>
                            <p class="font-3">

                                @if ($product->price_status == 'rfq')
                                    Tk {{ $product->sas_price }}
                                @elseif ($product->price_status == 'offer_price')
                                    Tk {{ $product->discount_price }}
                                @else
                                    Tk {{ $product->price }}
                                @endif

                            </p>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>

        <div class="clear"></div>

    </div>

    <!-- Subscribe News -->

    {{-- <section class="gst-row gst-color-white row-newsletter ovh">
        <div class="gst-wrapper">
            <div class="gst-column col-lg-12 no-padding text-center">
                <div class="fancy-heading text-center">
                    <h3 class="wht-clr">Subscribe Newsletter</h3>
                    <h5 class="funky-font-2 wht-clr">
                        Sign up for <span class="thm-clr">Special Promotion</span>
                    </h5>
                </div>

                <p>
                    <strong>Lorem ipsum dolor sit amet</strong>, consectetuer adipiscing
                    elit, sed diam nonummy nibh euismod tincidunt ut<br />
                    laoreet dolore magna aliquam erat volutpat.
                </p>

                <div class="gst-empty-space clearfix"></div>

                <form>
                    <div class="col-md-2">
                        <h4>
                            <strong class="fsz-20">
                                <span class="thm-clr">Subscribe</span> to us
                            </strong>
                        </h4>
                    </div>
                    <div class="gst-empty-space visible-sm clearfix"></div>
                    <div class="col-md-4 col-sm-4">
                        <input type="text" class="dblock" placeholder="Enter your name" />
                    </div>

                    <div class="col-md-4 col-sm-4">
                        <input type="text" class="dblock" placeholder="Enter your email address" />
                    </div>

                    <div class="col-md-2 col-sm-4">
                        <input type="submit" class="dblock fancy-button" value="Submit" />
                    </div>
                </form>
            </div>
        </div>
    </section> --}}

    <!-- / Subscribe News -->


    {{-- <script type="text/javascript">
        function incrementValue() {
            var value = parseInt(document.getElementByclass('number').value, 10);
            value = isNaN(value) ? 0 : value;
            if (value < 10) {
                value++;
                document.getElementByclass('number').value = value;
            }
        }

        function decrementValue() {
            var value = parseInt(document.getElementByclass('number').value, 10);
            value = isNaN(value) ? 0 : value;
            if (value > 1) {
                value--;
                document.getElementByclass('number').value = value;
            }

        }
    </script> --}}
@endsection
