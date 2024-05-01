@extends('frontend.frontend_dashboard')
@section('frontend')

    <!-- Main Banner -->
    @include('frontend.home.slider')
    <!-- / Main Banner -->

    <!-- Banner -->
    {{-- @include('frontend.home.banner') --}}
    <!-- / Banner -->

    <!-- Product Slider -->
    @include('frontend.home.product_slider')
    <!-- / Product Slider -->

    <!-- Product Compare -->
    {{-- <section class="gst-compare">
        <div class="gst-column col-lg-6 col-md-6 col-sm-12 col-xs-12 gst-compare-men">
            <div class="col-lg-6 right">
                <h5 class="title-1">Waterproof Jacket</h5>
                <h3>
                    <span class="sec-title fsz-45"> Men </span>
                    <span class="thin-font-3 fsz-40 thm-clr"> $350 </span>
                </h3>
                <ul>
                    <li>Integrated i-Lume LED rear light</li>
                    <li>Optional hood available separately</li>
                    <li>Breathability rating 15,000</li>
                </ul>
                <p class="gst-compare-actions">
                    <a href="shop.html">Detail</a>
                    <a class="compare-add-to-cart" href="cart.html">Add to Cart</a>
                </p>
            </div>
        </div>
        <div class="gst-column col-lg-6 col-md-6 col-sm-12 col-xs-12 gst-compare-women">
            <div class="col-lg-7">
                <h5 class="title-1">Waterproof Jacket</h5>
                <h3>
                    <span class="sec-title fsz-45"> Women </span>
                    <span class="thin-font-3 fsz-40 thm-clr"> $250 </span>
                </h3>
                <ul>
                    <li>Integrated i-Lume LED rear light</li>
                    <li>Optional hood available separately</li>
                    <li>Breathability rating 15,000</li>
                </ul>
                <p class="gst-compare-actions">
                    <a href="shop.html">Detail</a>
                    <a class="compare-add-to-cart" href="cart.html">Add to Cart</a>
                </p>
            </div>
        </div>
        <div class="descount bold-font-2">
            <div class="rel-div">
                <p>DISCOUNT UP TO 75%</p>
            </div>
        </div>
    </section> --}}
    <!-- / Product Compare -->

    <!-- Product -->
    @include('frontend.home.product')
    <!-- Product -->

    <!-- Featured Products -->
    {{-- @include('frontend.home.featured') --}}
    <!-- / Featured Products -->

    <!-- Booking area Start -->

    {{-- <section>
        <div class="gst-row wht-clr gst-cta row-cta ovh">
            <div class="fancy-heading text-center">
                <h3>PRE <span class="thm-clr"> BOOKING & ORDER</span></h3>
                <h5 class="funky-font-2">News For Upcoming Product</h5>
            </div>
            <div class="container theme-container">
                <div class="row">
                    <div class="col-md-7 col-sm-12 col-xs-12">
                        <h2>
                            Found your
                            <span class="thm-clr extbold-font-4">Dream Bike</span>? Why
                            wait
                        </h2>
                        <p class="gry-clr fsz-16">
                            Get it now with a 0% finance deal from GoShop Fashion..
                        </p>
                    </div>
                    <div class="col-md-5 col-sm-12 col-xs-12 text-right gst-cta-buttons">
                        <a href="#" class="fancy-btn-alt fancy-btn-small" data-toggle="modal"
                            data-target="#pre-booking">Pre
                            Booking</a>
                        <a href="#" class="fancy-btn fancy-btn-small" data-toggle="modal"
                            data-target="#pre-order">Pre Order</a>
                    </div>
                </div>
            </div>
        </div>
        <!--pre-booking Modal -->
        <div id="pre-booking" class="modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <button type="button" class="close close-btn popup-cls" data-dismiss="modal" aria-label="Close">
                        <i class="fa-times fa"></i>
                    </button>
                    <div class="">
                        <div class="login-wrap">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="fancy-heading text-center">
                                        <h3>PRE <span class="thm-clr">Booking</span></h3>
                                        <h5 class="funky-font-2">News For Upcoming Product</h5>
                                    </div>
                                    <form action="" method="post">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="order_date">Product Name <span class="red-clr">*</span>
                                                    </label>
                                                    <input type="text" class="form-control" id="product_name"
                                                        placeholder="Enter Product Name" name="product_name" required />
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group selectpicker-wrapper">
                                                    <div class="btn-group bootstrap-select" style="width: 100%">
                                                        <label for="user_id">User Id</label>
                                                        <select class="selectpicker" data-live-search="true"
                                                            data-width="100%" id="user_id" data-toggle="tooltip"
                                                            title="user_id" name="user_id" tabindex="-98" required>
                                                            <option class="bs-title-option" value="">
                                                                user 1
                                                            </option>
                                                            <option value="bangladesh" selected="">
                                                                user 2
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group selectpicker-wrapper">
                                                    <div class="btn-group bootstrap-select" style="width: 100%">
                                                        <label for="product_id">Product Id</label>
                                                        <select class="selectpicker" data-live-search="true"
                                                            data-width="100%" id="product_id" data-toggle="tooltip"
                                                            title="product_id" name="product_id" tabindex="-98" required>
                                                            <option class="bs-title-option" value="">
                                                                Product 1
                                                            </option>
                                                            <option value="bangladesh" value="">
                                                                Product 2
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group selectpicker-wrapper">
                                                    <div class="btn-group bootstrap-select" style="width: 100%">
                                                        <label for="vendor_id">Vendor Id</label>
                                                        <select class="selectpicker" data-live-search="true"
                                                            data-width="100%" id="vendor_id" data-toggle="tooltip"
                                                            title="vendor_id" name="vendor_id" tabindex="-98" required>
                                                            <option class="bs-title-option" value="">
                                                                vendor_id 1
                                                            </option>
                                                            <option value="bangladesh" value="">
                                                                vendor_id 2
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group selectpicker-wrapper">
                                                    <div class="btn-group bootstrap-select" style="width: 100%">
                                                        <label for="vendor_id">Payment Method Id</label>
                                                        <select class="selectpicker" data-live-search="true"
                                                            data-width="100%" id="payment_method_id"
                                                            data-toggle="tooltip" title="payment_method_id"
                                                            name="payment_method_id" tabindex="-98" required>
                                                            <option class="bs-title-option" value="">
                                                                payment_method_id 1
                                                            </option>
                                                            <option value="bangladesh" value="">
                                                                payment_method_id 2
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Second Row -->
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="order_date">Order Date <span class="red-clr">*</span>
                                                    </label>
                                                    <input type="date" class="form-control" id="order_date"
                                                        placeholder="Enter Order Date" name="order_date" required />
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="order_time">Order Time <span class="red-clr">*</span>
                                                    </label>
                                                    <input type="time" class="form-control" id="order_time"
                                                        placeholder="Enter Order Time" name="order_time" required />
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="quantity">Quantity <span class="red-clr">*</span>
                                                    </label>
                                                    <input type="number" class="form-control" id="quantity"
                                                        placeholder="Enter Quantity" name="quantity" required />
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group selectpicker-wrapper">
                                                    <div class="btn-group bootstrap-select" style="width: 100%">
                                                        <label for="status">Status</label>
                                                        <select class="selectpicker" data-width="100%" id="status"
                                                            name="status" tabindex="-98" required>
                                                            <option class="bs-title-option" value="" selected
                                                                disable>
                                                                Select Status
                                                            </option>
                                                            <option value="Active" value="">Active
                                                            </option>
                                                            <option value="Pending" value="">
                                                                Pending
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--  -->
                                            <div class="col-lg-3">
                                                <label for="total_amount">Paid Or Unpaid <span
                                                        class="red-clr">*</span></label>
                                                <div style="padding-top: 1rem;">
                                                    <div style="display: flex;">
                                                        <div class="radio-inline">
                                                            <label>
                                                                <input type="radio" name="paid" id="paid"
                                                                    onclick="handleRadioChange(this)">Paid
                                                            </label>
                                                        </div>
                                                        <div class="radio-inline">
                                                            <label>
                                                                <input type="radio" name="unpaid" id="unpaid"
                                                                    onclick="handleRadioChange(this)">Unpaid
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="total_amount">Total Ammount <span class="red-clr">*</span>
                                                    </label>
                                                    <input type="number" class="form-control" id="total_amount"
                                                        placeholder="Enter Total Ammount" name="total_amount" required />
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <label for="notes">Confirmed <span class="red-clr">*</span>
                                                </label>
                                                <div class="checkbox" style="margin-top: 5px">
                                                    <input data-toggle="toggle" type="checkbox" name="confirmed" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="notes">Notes <span class="red-clr">*</span>
                                                    </label>
                                                    <textarea class="form-control" placeholder="Enter Notes" id="exampleTextarea" name="notes" rows="5"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12">
                                                <button class="alt fancy-button" type="submit" id="submit-btn">
                                                    Submit
                                                </button>
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
        <!--pre-booking Modal End-->
        <!--pre-order Modal -->
        <div id="pre-order" class="modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <button type="button" class="close close-btn popup-cls" data-dismiss="modal" aria-label="Close">
                        <i class="fa-times fa"></i>
                    </button>
                    <div class="">
                        <div class="login-wrap">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="fancy-heading text-center">
                                        <h3>PRE <span class="thm-clr">ORDER</span></h3>
                                        <h5 class="funky-font-2">News For Upcoming Product</h5>
                                    </div>
                                    <form action="" method="post">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group selectpicker-wrapper">
                                                    <div class="btn-group bootstrap-select" style="width: 100%">
                                                        <label for="user_id">User Id</label>
                                                        <select class="selectpicker" data-live-search="true"
                                                            data-width="100%" id="user_id" data-toggle="tooltip"
                                                            title="user_id" name="user_id" tabindex="-98" required>
                                                            <option class="bs-title-option" value="">
                                                                user_id
                                                            </option>
                                                            <option value="bangladesh" value="">
                                                                user_id 2
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group selectpicker-wrapper">
                                                    <div class="btn-group bootstrap-select" style="width: 100%">
                                                        <label for="product_id">Product Id</label>
                                                        <select class="selectpicker" data-live-search="true"
                                                            data-width="100%" id="product_id" data-toggle="tooltip"
                                                            title="product_id" name="product_id" tabindex="-98" required>
                                                            <option class="bs-title-option" value="">
                                                                Country
                                                            </option>
                                                            <option value="bangladesh" value="">
                                                                product_id 1
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group selectpicker-wrapper">
                                                    <div class="btn-group bootstrap-select" style="width: 100%">
                                                        <label for="vendor_id">Vendor Id</label>
                                                        <select class="selectpicker" data-live-search="true"
                                                            data-width="100%" id="vendor_id" data-toggle="tooltip"
                                                            title="vendor_id" name="vendor_id" tabindex="-98" required>
                                                            <option class="bs-title-option" value="">
                                                                vendor_id
                                                            </option>
                                                            <option value="bangladesh" value="">
                                                                vendor_id 1
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group selectpicker-wrapper">
                                                    <div class="btn-group bootstrap-select" style="width: 100%">
                                                        <label for="payment_method_id">Payment Method Id</label>
                                                        <select class="selectpicker" data-live-search="true"
                                                            data-width="100%" id="payment_method_id"
                                                            data-toggle="tooltip" title="payment_method_id"
                                                            name="payment_method_id" tabindex="-98" required>
                                                            <option class="bs-title-option" value="">
                                                                payment_method_id
                                                            </option>
                                                            <option value="bangladesh" value="">
                                                                payment_method_id 1
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Second Row -->
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="order_date">Date <span class="red-clr">*</span>
                                                    </label>
                                                    <input type="date" class="form-control" id="order_date"
                                                        placeholder="Enter Order Date" name="order_date" required />
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="order_time">Time <span class="red-clr">*</span>
                                                    </label>
                                                    <input type="time" class="form-control" id="order_time"
                                                        placeholder="Enter Order Time" name="order_time" required />
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="quantity">Quantity <span class="red-clr">*</span>
                                                    </label>
                                                    <input type="number" class="form-control" id="quantity"
                                                        placeholder="Enter Quantity" name="quantity" required />
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group selectpicker-wrapper">
                                                    <div class="btn-group bootstrap-select" style="width: 100%">
                                                        <label for="status">Status</label>
                                                        <select class="selectpicker" data-width="100%" id="status"
                                                            name="status" tabindex="-98" required>
                                                            <option class="bs-title-option" disable>
                                                                Select Status
                                                            </option>
                                                            <option value="Active" value="">Active
                                                            </option>
                                                            <option value="Pending" value="">
                                                                Pending
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--  -->
                                            <div class="col-lg-3">
                                                <label for="total_amount">Paid Or Unpaid <span
                                                        class="red-clr">*</span></label>
                                                <div style="padding-top: 1rem;">
                                                    <div style="display: flex;">
                                                        <div class="radio-inline">
                                                            <label>
                                                                <input type="radio" name="paid" id="paid"
                                                                    onclick="handleRadioChange(this)">Paid
                                                            </label>
                                                        </div>
                                                        <div class="radio-inline">
                                                            <label>
                                                                <input type="radio" name="unpaid" id="unpaid"
                                                                    onclick="handleRadioChange(this)">Unpaid
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="total_amount">Total Ammount <span
                                                            class="red-clr">*</span>
                                                    </label>
                                                    <input type="number" class="form-control" id="total_amount"
                                                        placeholder="Enter Total Ammount" name="total_amount"
                                                        required />
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <label for="notes">Confirmed <span class="red-clr">*</span>
                                                </label>
                                                <div class="checkbox" style="margin-top: 5px">
                                                    <input data-toggle="toggle" type="checkbox" name="confirmed" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="notes">Notes <span class="red-clr">*</span>
                                                    </label>
                                                    <textarea class="form-control" placeholder="Enter Notes" id="exampleTextarea" name="notes" rows="5"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12">
                                                <button class="alt fancy-button" type="submit" id="submit-btn">
                                                    Submit
                                                </button>
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
        <!--pre-order Modal End -->
    </section> --}}

    <!-- / Booking area End -->

    <!-- Product Slider -->

    {{-- <section class="gst-row row-carbon-fiber ovh">
        <div class="container theme-container">
            <div class="gst-column col-lg-12 no-padding text-center">
                <div class="fancy-heading text-center">
                    <h3>Carbon Fiber <span class="thm-clr">Cervelo</span></h3>
                    <h5 class="funky-font-2">Limited time offer only on GoShop</h5>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-sm-8">
                        <div class="" style="display: flex; justify-content: center">
                            <div class="counter_container">
                                <h1 class="blk-clr fw600">00</h1>
                                <p class="thm-clr counter-texts">Day</p>
                                <h1 class="left_side_border">|</h1>
                            </div>
                            <div class="counter_container">
                                <h1 class="blk-clr fw600">00</h1>
                                <p class="thm-clr counter-texts">HOURS</p>
                                <h1 class="left_side_border">|</h1>
                            </div>
                            <div class="counter_container">
                                <h1 class="blk-clr fw600">00</h1>
                                <p class="thm-clr counter-texts">MINS</p>
                                <h1 class="left_side_border">|</h1>
                            </div>
                            <div class="counter_container">
                                <h1 class="blk-clr fw600">00</h1>
                                <p class="thm-clr counter-texts">SECS</p>
                                <h1 class="left_side_border">|</h1>
                            </div>
                        </div>
                        <img class="right" src="assets/img/products/bike-1.png" alt="" />
                    </div>
                    <div class="col-lg-4 col-sm-4">
                        <img src="assets/img/extra/person.png" alt="" />
                    </div>
                </div>
                <div class="price-tag">
                    <span>
                        <b class="fsz-25 blk-clr"> PRICE: </b>
                    </span>
                    <span class="thm-clr fsz-40 light-font-3"> $ <b>1150</b> </span>
                    <span class="discnt fsz-40 light-font-3"> $ <b>1850</b> </span>
                </div>
                <div class="gst-empty-space clearfix"></div>
                <a href="cart.html" class="fancy-btn fancy-btn-small">Add to Cart</a>
            </div>
        </div>
    </section> --}}

    <!-- / Product Slider -->

    <!-- Special Offers -->
    <section class="container theme-container">
        <div class="gst-row">
            <div class="fancy-heading text-center spcbtm-15">
                <h3>Special Offers</h3>
                <h5 class="funky-font-2">Special price only this month</h5>
            </div>
            <div class="special-offers row">
                <div class="col-sm-6 col-lg-4">
                    <div class="product">
                        <div class="image">
                            <a href="#">
                                <img src="assets/img/products/cat-1.png" alt="Product" />
                            </a>
                        </div>
                        <div class="right">
                            <p class="funky-font-2">Mountain bike</p>
                            <div class="name">
                                <a href="#">GT SENSOR COMP 27.5</a>
                            </div>
                            <div class="price font-2">
                                Price: <span class="price-new">$299.00</span>
                                <span class="price-old">$599.00</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="product">
                        <div class="image">
                            <a href="#">
                                <img src="assets/img/products/cat-2.png" alt="Product" />
                            </a>
                        </div>
                        <div class="right">
                            <p class="funky-font-2">Mountain bike</p>
                            <div class="name">
                                <a href="#">BREEZER SQUALL 1.0</a>
                            </div>
                            <div class="price font-2">
                                Price: <span class="price-new">$299.00</span>
                                <span class="price-old">$599.00</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="product">
                        <div class="image">
                            <a href="#">
                                <img src="assets/img/products/cat-3.png" alt="Product" />
                            </a>
                        </div>
                        <div class="right">
                            <p class="funky-font-2">Mountain bike</p>
                            <div class="name">
                                <a href="#">GT SENSOR COMP 27.5</a>
                            </div>
                            <div class="price font-2">
                                Price: <span class="price-new">$299.00</span>
                                <span class="price-old">$599.00</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="product">
                        <div class="image">
                            <a href="#">
                                <img src="assets/img/products/cat-4.png" alt="Product" />
                            </a>
                        </div>
                        <div class="right">
                            <p class="funky-font-2">Mountain bike</p>
                            <div class="name">
                                <a href="#">BREEZER SQUALL 1.0</a>
                            </div>
                            <div class="price font-2">
                                Price: <span class="price-new">$299.00</span>
                                <span class="price-old">$599.00</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="product">
                        <div class="image">
                            <a href="#">
                                <img src="assets/img/products/cat-5.png" alt="Product" />
                            </a>
                        </div>
                        <div class="right">
                            <p class="funky-font-2">Mountain bike</p>
                            <div class="name">
                                <a href="#">GT SENSOR COMP 27.5</a>
                            </div>
                            <div class="price font-2">
                                Price: <span class="price-new">$299.00</span>
                                <span class="price-old">$599.00</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="product">
                        <div class="image">
                            <a href="#">
                                <img src="assets/img/products/cat-6.png" alt="Product" />
                            </a>
                        </div>
                        <div class="right">
                            <p class="funky-font-2">Mountain bike</p>
                            <div class="name">
                                <a href="#">GT SENSOR COMP 27.5</a>
                            </div>
                            <div class="price font-2">
                                Price: <span class="price-new">$299.00</span>
                                <span class="price-old">$599.00</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Special Offers -->

    

@endsection
