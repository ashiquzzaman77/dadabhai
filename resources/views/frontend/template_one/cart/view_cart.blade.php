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
                                DADA VAI <span class="grenadier-color">PRODUCT</span>
                            </h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb pt-3">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('index') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item grenadier-color active" aria-current="page">
                                        <a href="">
                                            <span class="grenadier-color">Check Out</span>
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
                            <h6 class="f-800 cod__black-color">
                                <span class="grenadier-color">YOUR CART</span>
                            </h6>
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
                                <div class="col-lg-8">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <!-- Cart Header -->
                                            <thead class="bg-light border-none">
                                                <tr>
                                                    <th style="width: 5%">SL</th>
                                                    <th style="width: 10%">Image</th>
                                                    <th style="width: 35%">Product Name</th>
                                                    <th style="width: 10%">Price</th>
                                                    <th style="width: 15%">Quantity</th>
                                                    <th style="width: 12%">Total</th>
                                                    <th style="width: 13%">Empty Cart</th>
                                                </tr>
                                            </thead>
                                            <!-- Cart Content -->
                                            <tbody id="cartPage">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- Check Out Content -->
                                <div class="col-lg-4">
                                    <form action="">
                                        <div class="card rounded-0">
                                            <div class="card-header">CART TOTAL</div>
                                            <div class="card-body border-0">
                                                <div class="table-responsive border-0">
                                                    <table class="table border-0">

                                                        <thead style="background: #dfdddd">
                                                            <tr>
                                                                <th scope="col">Details</th>
                                                                <th class="text-right">Price Info</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <tr class="">
                                                                <td>Sub Total:</td>
                                                                <td class="text-right">Tk <span id="cartSubTotal"></span></td>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <th scope="col">ORDER TOTAL</th>
                                                                <th class="text-right">Tk <span id="cartTotal"></span></th>
                                                            </tr>
                                                        </tbody>
                                                        
                                                    </table>
                                                    <div>
                                                        <div class="d-flex justify-content-end">
                                                            
                                                            <a href="{{ route('template.one.checkout') }}" class="cart-button w-100">
                                                                Check Out
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Releted Product -->

    {{-- <div class="product pt-60 fix">
        <div class="container">
            <div class="border-bottom mb-3">
                <div class="row mt-3">
                    <div class="col-lg-12 col-md-4">
                        <div class="shop-bar d-flex align-items-center justify-content-between">
                            <h4 class="f-800 cod__black-color">
                                <span class="grenadier-color">Releted Product</span>
                            </h4>
                            <a href="#" class="f-800 cod__black-color">
                                <span class="grenadier-color">CONTINUE SHOPPING <i
                                        class="fa fa-long-arrow-right"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="product__active owl-carousel mb-20">
                        <div class="product__single">
                            <div class="product__box">
                                <div class="product__thumb">
                                    <a href="product-details.html" class="img-wrapper">
                                        <img class="img" src="img/allproducts/products__thumb__06.jpg"
                                            alt="" />
                                        <img class="img secondary-img" src="img/allproducts/products__thumb__08.jpg"
                                            alt="" />
                                    </a>
                                </div>
                                <div class="product__content--top">
                                    <span class="cate-name">SAMSUNG</span>
                                    <h6 class="product__title mine__shaft-color f-700 mb-0">
                                        <a href="product-details.html">Wireless Audioing Systems Purple</a>
                                    </h6>
                                </div>
                                <div class="product__content--rating d-flex justify-content-between align-items-center">
                                    <div>
                                        <button class="btn btn-primary btn-sm">
                                            Add To Cart
                                        </button>
                                    </div>
                                    <div class="price">
                                        <p class="mb-0 grenadier-color f-600">$2,299.00</p>
                                        <small class="text-success">In Stock</small>
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
                        <div class="product__single">
                            <div class="product__box">
                                <div class="product__thumb">
                                    <a href="product-details.html" class="img-wrapper">
                                        <img class="img" src="img/allproducts/products__thumb__07.jpg"
                                            alt="" />
                                        <img class="img secondary-img" src="img/allproducts/products__thumb__09.jpg"
                                            alt="" />
                                    </a>
                                </div>
                                <div class="product__content--top">
                                    <span class="cate-name">SAMSUNG</span>
                                    <h6 class="product__title mine__shaft-color f-700 mb-0">
                                        <a href="product-details.html">Wireless Audioing Systems Purple</a>
                                    </h6>
                                </div>
                                <div class="product__content--rating d-flex justify-content-between align-items-center">
                                    <div>
                                        <button class="btn btn-primary btn-sm">
                                            Add To Cart
                                        </button>
                                    </div>
                                    <div class="price">
                                        <p class="mb-0 grenadier-color f-600">$2,299.00</p>
                                        <small class="text-success">In Stock</small>
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
                        <div class="product__single">
                            <div class="product__box">
                                <div class="product__thumb">
                                    <a href="product-details.html" class="img-wrapper">
                                        <img class="img" src="img/allproducts/products__thumb__08.jpg"
                                            alt="" />
                                        <img class="img secondary-img" src="img/allproducts/products__thumb__05.jpg"
                                            alt="" />
                                    </a>
                                </div>
                                <div class="product__content--top">
                                    <span class="cate-name">SAMSUNG</span>
                                    <h6 class="product__title mine__shaft-color f-700 mb-0">
                                        <a href="product-details.html">Wireless Audioing Systems Purple</a>
                                    </h6>
                                </div>
                                <div class="product__content--rating d-flex justify-content-between align-items-center">
                                    <div>
                                        <button class="btn btn-primary btn-sm">
                                            Add To Cart
                                        </button>
                                    </div>
                                    <div class="price">
                                        <p class="mb-0 grenadier-color f-600">$2,299.00</p>
                                        <small class="text-success">In Stock</small>
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
                        <div class="product__single">
                            <div class="product__box">
                                <div class="product__thumb">
                                    <a href="product-details.html" class="img-wrapper">
                                        <img class="img" src="img/allproducts/products__thumb__09.jpg"
                                            alt="" />
                                        <img class="img secondary-img" src="img/allproducts/products__thumb__03.jpg"
                                            alt="" />
                                    </a>
                                </div>
                                <div class="product__content--top">
                                    <span class="cate-name">SAMSUNG</span>
                                    <h6 class="product__title mine__shaft-color f-700 mb-0">
                                        <a href="product-details.html">Wireless Audioing Systems Purple</a>
                                    </h6>
                                </div>
                                <div class="product__content--rating d-flex justify-content-between align-items-center">
                                    <div>
                                        <button class="btn btn-primary btn-sm">
                                            Add To Cart
                                        </button>
                                    </div>
                                    <div class="price">
                                        <p class="mb-0 grenadier-color f-600">$2,299.00</p>
                                        <small class="text-success">In Stock</small>
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
                        <div class="product__single">
                            <div class="product__box">
                                <div class="product__thumb">
                                    <a href="product-details.html" class="img-wrapper">
                                        <img class="img" src="img/allproducts/products__thumb__10.jpg"
                                            alt="" />
                                        <img class="img secondary-img" src="img/allproducts/products__thumb__02.jpg"
                                            alt="" />
                                    </a>
                                </div>
                                <div class="product__content--top">
                                    <span class="cate-name">SAMSUNG</span>
                                    <h6 class="product__title mine__shaft-color f-700 mb-0">
                                        <a href="product-details.html">Wireless Audioing Systems Purple</a>
                                    </h6>
                                </div>
                                <div class="product__content--rating d-flex justify-content-between align-items-center">
                                    <div>
                                        <button class="btn btn-primary btn-sm">
                                            Add To Cart
                                        </button>
                                    </div>
                                    <div class="price">
                                        <p class="mb-0 grenadier-color f-600">$2,299.00</p>
                                        <small class="text-success">In Stock</small>
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
                        <div class="product__single">
                            <div class="product__box">
                                <div class="product__thumb">
                                    <a href="product-details.html" class="img-wrapper">
                                        <img class="img" src="img/allproducts/products__thumb__11.jpg"
                                            alt="" />
                                        <img class="img secondary-img" src="img/allproducts/products__thumb__06.jpg"
                                            alt="" />
                                    </a>
                                </div>
                                <div class="product__content--top">
                                    <span class="cate-name">SAMSUNG</span>
                                    <h6 class="product__title mine__shaft-color f-700 mb-0">
                                        <a href="product-details.html">Wireless Audioing Systems Purple</a>
                                    </h6>
                                </div>
                                <div class="product__content--rating d-flex justify-content-between align-items-center">
                                    <div>
                                        <button class="btn btn-primary btn-sm">
                                            Add To Cart
                                        </button>
                                    </div>
                                    <div class="price">
                                        <p class="mb-0 grenadier-color f-600">$2,299.00</p>
                                        <small class="text-success">In Stock</small>
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
                        <div class="product__single">
                            <div class="product__box">
                                <div class="product__thumb">
                                    <a href="product-details.html" class="img-wrapper">
                                        <img class="img" src="img/allproducts/products__thumb__08.jpg"
                                            alt="" />
                                        <img class="img secondary-img" src="img/allproducts/products__thumb__04.jpg"
                                            alt="" />
                                    </a>
                                </div>
                                <div class="product__content--top">
                                    <span class="cate-name">SAMSUNG</span>
                                    <h6 class="product__title mine__shaft-color f-700 mb-0">
                                        <a href="product-details.html">Wireless Audioing Systems Purple</a>
                                    </h6>
                                </div>
                                <div class="product__content--rating d-flex justify-content-between align-items-center">
                                    <div>
                                        <button class="btn btn-primary btn-sm">
                                            Add To Cart
                                        </button>
                                    </div>
                                    <div class="price">
                                        <p class="mb-0 grenadier-color f-600">$2,299.00</p>
                                        <small class="text-success">In Stock</small>
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
        </div>
    </div> --}}

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
                                <span class="notification__title--heading f-800 white-color">Subscribe for Join Us!</span>
                            </div>
                            <div class="newsletter--message d-none d-xl-block">
                                <p class="newsletter__message__title mb-0">
                                    .... & receive $20 coupne for first Shopping & free
                                    delivery.
                                </p>
                            </div>
                        </div>
                        <form class="right newsletter--form pos-rel">
                            <input class="newsletter--input" type="text" placeholder="Enter Your Email Address ..." />
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

    <script>
        // Get the necessary elements
        const incrementBtn = document.getElementByClassName("incrementBtn");
        const decrementBtn = document.getElementByClassName("decrementBtn");
        const amountInput = document.getElementByClassName("amountInput");

        // Function to handle increment button click
        incrementBtn.addEventListener("click", () => {
            // Get the current value of the input
            let currentValue = parseInt(amountInput.value);
            // Increment the value
            currentValue++;
            // Update the input value
            amountInput.value = currentValue;
        });

        // Function to handle decrement button click
        decrementBtn.addEventListener("click", () => {
            // Get the current value of the input
            let currentValue = parseInt(amountInput.value);
            // Decrement the value if greater than 0
            if (currentValue > 0) {
                currentValue--;
            }
            // Update the input value
            amountInput.value = currentValue;
        });
    </script>
@endsection
