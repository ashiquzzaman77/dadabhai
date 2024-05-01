<!DOCTYPE html>
<html lang="en">

<head>

    @include('frontend.partials.style_link')

</head>

<body>

    <div class="loader"></div>

    <!-- HEADER -->
    @include('frontend.partials.header')
    <!-- / HEADER -->

    <!-- Main CONTENT -->
    <div class="main-wrapper clearfix">

        @yield('frontend')

    </div>
    <!-- Main CONTENT -->

    <div class="clear"></div>

    <!-- FOOTER -->
    @include('frontend.partials.footer')
    <!-- / FOOTER -->

    <!-- Subscribe Popup 1 -->
    @include('frontend.partials.subscribe')
    <!-- / Subscribe Popup 1 -->

    <!-- Product Preview Popup -->
    <section class="modal fade" id="product-preview" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg product-modal">
            <button class="close close-btn popup-cls" aria-label="Close" data-dismiss="modal" type="button">
                <i class="fa-times fa"></i>
            </button>
            <div class="modal-content single-product">
                <div class="diblock">
                    <div class="col-lg-6 col-sm-12 col-xs-12">
                        <div id="gallery-1" class="royalSlider rsUni">
                            <a class="rsImg" data-rsbigimg="assets/img/products/single-1.jpg"
                                href="assets/img/products/single-1.jpg" data-rsw="500" data-rsh="500">
                                <img class="rsTmb" src="assets/img/products/single-thumb-1.jpg" alt="" />
                            </a>
                            <a class="rsImg" data-rsbigimg="assets/img/products/single-1.jpg"
                                href="assets/img/products/single-2.jpg" data-rsw="500" data-rsh="500">
                                <img class="rsTmb" src="assets/img/products/single-thumb-2.jpg" alt="" />
                            </a>
                            <a class="rsImg" data-rsbigimg="assets/img/products/single-1.jpg"
                                href="assets/img/products/single-3.jpg" data-rsw="500" data-rsh="500">
                                <img class="rsTmb" src="assets/img/products/single-thumb-3.jpg" alt="" />
                            </a>
                            <a class="rsImg" data-rsbigimg="assets/img/products/single-1.jpg"
                                href="assets/img/products/single-1.jpg" data-rsw="500" data-rsh="500">
                                <img class="rsTmb" src="assets/img/products/single-thumb-1.jpg" alt="" />
                            </a>
                            <a class="rsImg" data-rsbigimg="assets/img/products/single-1.jpg"
                                href="assets/img/products/single-2.jpg" data-rsw="500" data-rsh="500">
                                <img class="rsTmb" src="assets/img/products/single-thumb-2.jpg" alt="" />
                            </a>
                            <a class="rsImg" data-rsbigimg="assets/img/products/single-1.jpg"
                                href="assets/img/products/single-3.jpg" data-rsw="500" data-rsh="500">
                                <img class="rsTmb" src="assets/img/products/single-thumb-3.jpg" alt="" />
                            </a>
                        </div>
                    </div>
                    <div class="spc-15 hidden-lg clear"></div>
                    <div class="col-sm-12 col-lg-6 col-xs-12">
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
                                    <h3 class="funky-font-2 fsz-20">Women Collection</h3>
                                </div>
                            </div>
                            <div class="product_title_wrapper">
                                <div itemprop="name" class="product_title entry-title">
                                    Flusas Denim <span class="thm-clr">Dress</span>
                                    <p class="font-3 fsz-18 no-mrgn price">
                                        <b class="amount blk-clr">$175.00</b>
                                        <del>$299.00</del>
                                    </p>
                                </div>
                            </div>
                            <div itemprop="description" class="fsz-15">
                                <p>
                                    Qossi is an emerging company and dedicated to making high
                                    quality bags and fashions.Qossi designers are
                                    internationally renowned designers,having participated in
                                    many international fashion designing contests,and perform
                                    outstandingly
                                </p>
                            </div>
                            <ul class="stock-detail list-items fsz-12">
                                <li>
                                    <strong>
                                        MATERIAL : <span class="blk-clr"> COTTON </span>
                                    </strong>
                                </li>
                                <li>
                                    <strong>
                                        STOCK : <span class="blk-clr"> READY STOCK </span>
                                    </strong>
                                </li>
                            </ul>
                            <form class="variations_form cart" method="post">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group selectpicker-wrapper">
                                            <label class="fsz-15 title-3">
                                                <b> CHOOSE COLOR </b>
                                            </label>
                                            <div class="search-selectpicker selectpicker-wrapper">
                                                <select class="selectpicker input-price" data-live-search="true"
                                                    data-width="100%" data-toggle="tooltip" title="White">
                                                    <option>Pink</option>
                                                    <option>Blue</option>
                                                    <option>White</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
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
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group selectpicker-wrapper">
                                            <label class="fsz-15 title-3">
                                                <b> QUANTITY </b>
                                            </label>
                                            <div class="search-selectpicker selectpicker-wrapper">
                                                <select class="selectpicker input-price" data-live-search="true"
                                                    data-width="100%" data-toggle="tooltip" title="2 Pcs">
                                                    <option>1 Pcs</option>
                                                    <option>2 Pcs</option>
                                                    <option>3 Pcs</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <button type="submit"
                                                class="single_add_to_cart_button button alt fancy-button left">
                                                Add to cart
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- .summary -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Product Preview Popup -->

    <!-- Search Popup -->
    @include('frontend.partials.search')
    <!-- / Search Popup -->

    <!-- Top -->
    <div class="to-top" id="to-top">
        <i class="fa fa-long-arrow-up"></i>
    </div>

    @include('frontend.partials.js_link')

</body>

</html>
