@extends('frontend.frontend_dashboard')
@section('frontend')
    <!-- CONTENT + SIDEBAR -->
    <div class="main-wrapper clearfix">
        <div class="site-pagetitle jumbotron">
            <div class="container theme-container text-center">
                <h3>Total Cart</h3>

                <!-- Breadcrumbs -->
                <div class="breadcrumbs">
                    <div class="breadcrumbs text-center">
                        <i class="fa fa-home"></i>
                        <span><a href="{{ route('index') }}">Home</a></span>
                        <i class="fa fa-arrow-circle-right"></i>
                        <span class="current">Cart</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="container theme-container">
            <main id="main-content" class="main-container" itemprop="mainContentOfPage" itemscope="itemscope"
                itemtype="http://schema.org/Blog">
                <article itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
                    <header class="entry-header diblock spc-15">
                        <!-- Post Title -->
                        <h2 class="fsz-18 title-3 pull-left" itemprop="headline">
                            Your Cart
                        </h2>
                        <h2 class="fsz-15 title-3 drk-gry pull-right">
                            <a href="{{ route('index') }}">CONTINUE SHOPPING</a>
                        </h2>
                    </header>

                    <!-- Main Content of the Post -->
                    <div class="cart-wrap">
                        <div class="woocommerce">

                            <table class="shop_table cart">
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">&nbsp;</th>
                                        <th class="product-name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">Total</th>
                                        <th class="product-remove">Remove</th>
                                    </tr>
                                </thead>

                                <tbody id="cartPage"></tbody>

                            </table>


                            <div class="">

                                <div class="col-lg-4 col-sm-4 cart-shipping-calculator">

                                    {{-- <h4 class="cart-title-highlight title-3">
                                        Calculate Shipping
                                    </h4>
                                    <form class="woocommerce-shipping-calculator" action="#">
                                        <section class="shipping-calculator-form">
                                            <div class="form-group selectpicker-wrapper">
                                                <select class="selectpicker input-price" data-live-search="true"
                                                    data-width="100%" data-toggle="tooltip" title="Country">
                                                    <option>Åland Islands</option>
                                                    <option>Afghanistan</option>
                                                    <option>Albania</option>
                                                </select>
                                            </div>
                                            <div class="form-group selectpicker-wrapper">
                                                <select class="selectpicker input-price" data-live-search="true"
                                                    data-width="100%" data-toggle="tooltip" title="State / Province">
                                                    <option>Tirana</option>
                                                    <option>Durres</option>
                                                    <option>Vlore</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" type="text"
                                                    placeholder="ZIP / Portal Code" />
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" value="Update" class="button" />
                                            </div>
                                        </section>
                                    </form> --}}
                                </div>

                                <div class="col-lg-4 col-sm-4">

                                    {{-- <h4 class="cart-title-highlight title-3">
                                        Apply Coupon Code
                                    </h4>
                                    <p class="title-3 fsz-15 no-mrgn">
                                        ASIN: <span class="thm-clr"> B00IL3TMFW </span>
                                    </p>
                                    <p class="font-4 fsz-15">Shipping Weight: 1.8 pounds</p>
                                    <form>
                                        <div class="form-group">
                                            <input type="text" placeholder="ENTER CODE" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="button" value="Apply" />
                                        </div>
                                    </form> --}}

                                </div>

                                {{-- <div class="col-lg-4 col-sm-4 cart-collaterals">
                                    <div class="cart_totals font-2">
                                        <h4 class="cart-title-highlight title-3">Cart Total</h4>

                                        <table id="cartPage1">
                                        </table>
                                    </div>
                                </div> --}}

                            </div>

                            <div class="wc-proceed-to-checkout" style="text-align: end;margin-top:20px">
                                <a href="{{ route('checkout') }}" class="checkout-button button alt wc-forward">
                                    <i class="fa fa-check-circle"></i>Proceed to Checkout
                                </a>
                            </div>

                        </div>
                    </div>

                </article>
            </main>
        </div>

        {{-- <div class="light-bg gst-row">
            <div class="fancy-heading text-center">
                <h3>RELATED PRODUCTS</h3>
                <h5 class="funky-font-2">
                    Customers who viewed this item also viewed
                </h5>
            </div>

            <!-- Portfolio items -->
            <div class="related-product nav-2 text-center">
                <div class="product">
                    <div class="rel-prod-media">
                        <img src="assets/img/products/rel-prod-1.png" alt="" />
                    </div>
                    <div class="product-content">
                        <h3><a href="#" class="title-3 fsz-16"> CICLYSMO JACKET </a></h3>
                        <p class="font-3">
                            Price: <span class="thm-clr"> $299.00 </span>
                        </p>
                    </div>
                </div>

                <div class="product">
                    <div class="rel-prod-media">
                        <img src="assets/img/products/rel-prod-2.png" alt="" />
                    </div>
                    <div class="product-content">
                        <h3>
                            <a href="#" class="title-3 fsz-16"> LYCRA BITZ MEN CLOTHING </a>
                        </h3>
                        <p class="font-3">
                            Price: <span class="thm-clr"> $299.00 </span>
                        </p>
                    </div>
                </div>

                <div class="product">
                    <div class="rel-prod-media">
                        <img src="assets/img/products/rel-prod-3.png" alt="" />
                    </div>
                    <div class="product-content">
                        <h3><a href="#" class="title-3 fsz-16"> CICLYSMO JACKET </a></h3>
                        <p class="font-3">
                            Price: <span class="thm-clr"> $299.00 </span>
                        </p>
                    </div>
                </div>

                <div class="product">
                    <div class="rel-prod-media">
                        <img src="assets/img/products/rel-prod-4.png" alt="" />
                    </div>
                    <div class="product-content">
                        <h3>
                            <a href="#" class="title-3 fsz-16"> LYCRA BITZ MEN CLOTHING </a>
                        </h3>
                        <p class="font-3">
                            Price: <span class="thm-clr"> $299.00 </span>
                        </p>
                    </div>
                </div>

                <div class="product">
                    <div class="rel-prod-media">
                        <img src="assets/img/products/rel-prod-5.png" alt="" />
                    </div>
                    <div class="product-content">
                        <h3><a href="#" class="title-3 fsz-16"> CICLYSMO JACKET </a></h3>
                        <p class="font-3">
                            Price: <span class="thm-clr"> $299.00 </span>
                        </p>
                    </div>
                </div>

                <div class="product">
                    <div class="rel-prod-media">
                        <img src="assets/img/products/rel-prod-6.png" alt="" />
                    </div>
                    <div class="product-content">
                        <h3>
                            <a href="#" class="title-3 fsz-16"> LYCRA BITZ MEN CLOTHING </a>
                        </h3>
                        <p class="font-3">
                            Price: <span class="thm-clr"> $299.00 </span>
                        </p>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="clear"></div>
    </div>

    <script type="text/javascript">
        function incrementValue() {
            var value = parseInt(document.getElementById('number').value, 10);
            value = isNaN(value) ? 0 : value;
            if (value < 10) {
                value++;
                document.getElementById('number').value = value;
            }
        }

        function decrementValue() {
            var value = parseInt(document.getElementById('number').value, 10);
            value = isNaN(value) ? 0 : value;
            if (value > 1) {
                value--;
                document.getElementById('number').value = value;
            }

        }
    </script>
@endsection
