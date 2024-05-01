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
                                            <span class="grenadier-color">Shipping Info</span>
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

    <form action="{{ route('template.checkout.store') }}" id="myForm" method="POST">

        @csrf

        <div class="product shop-page pt-80 pb-80 fix">
            <div class="container">
                <div class="border-b">
                    <div class="row">
                        <div class="col-lg-12 col-md-4">
                            <div class="shop-bar d-flex align-items-center justify-content-between">
                                <h5 class="f-800 cod__black-color">
                                    <span class="grenadier-color">Information</span>
                                </h5>
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

                                        {{-- Billing Info --}}
                                        <div class="card border-0 shadow-none mb-0">

                                            <div class="card-header checkout-page-form">
                                                <a class="card-title"> Billing Info </a>
                                            </div>

                                            <div id="" class="show" data-parent=""
                                                style="background-color: #f5f5f5">
                                                <div class="card-body p-0">
                                                    <div class="mb-3 bg-light p-3">


                                                        <div class="row">

                                                            <div class="form-group col-sm-4">
                                                                <label for="user_id">User Name
                                                                </label>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Billing Name"
                                                                    value="{{ old('billing_name') }}" name="billing_name" />
                                                            </div>

                                                            <div class="form-group col-sm-4">
                                                                <label for="phone">Phone
                                                                </label>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Billing Phone"
                                                                    value="{{ old('billing_phone') }}"
                                                                    name="billing_phone" />
                                                            </div>

                                                            <div class="form-group col-sm-4">
                                                                <label for="email">Email
                                                                </label>
                                                                <input type="email" class="form-control"
                                                                    value="{{ old('billing_email') }}"
                                                                    placeholder="example@gmail.com" name="billing_email" />
                                                            </div>

                                                            <div class="form-group col-sm-4">
                                                                <label for="city">City
                                                                </label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ old('billing_city') }}" name="billing_city"
                                                                    placeholder="City Name" />
                                                            </div>

                                                            <div class="form-group col-sm-4">
                                                                <label for="state">State
                                                                </label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ old('billing_state') }}" name="billing_state"
                                                                    placeholder="State Name" />
                                                            </div>

                                                            <div class="form-group col-sm-4">
                                                                <label for="postal_code">Postal Code
                                                                </label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ old('billing_postal_code') }}"
                                                                    name="billing_postal_code" placeholder="Postal Code" />
                                                            </div>

                                                            <div class="form-group col-sm-4">
                                                                <label for="country">Country
                                                                </label>

                                                                <input type="text" class="form-control"
                                                                    value="{{ old('billing_country') }}"
                                                                    name="billing_country" placeholder="Country Name" />
                                                            </div>


                                                            <div class="form-group col-sm-4">
                                                                <label for="address_line1">Address 1
                                                                </label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ old('billing_address_line1') }}"
                                                                    name="billing_address_line1"
                                                                    placeholder="Address One" />
                                                            </div>

                                                            <div class="form-group col-sm-4">
                                                                <label for="address_line2">Address 2
                                                                </label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ old('billing_address_line2') }}"
                                                                    name="billing_address_line2"
                                                                    placeholder="Address Two" />
                                                            </div>

                                                            <div class="form-group col-sm-12">
                                                                <label for="address_line2">Note
                                                                </label>
                                                                <textarea class="form-control" placeholder="Write Something" name="notes" id="" cols="1"
                                                                    rows="1"></textarea>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        {{-- Billing Info --}}

                                        {{-- Payment Info  --}}
                                        <div class="card-header checkout-page-form">
                                            <a class="card-title"> Payment Info </a>
                                        </div>
                                        <div class="" style="background-color: #f5f5f5">
                                            <div class="card-body p-0">
                                                <div class="mb-3 bg-light p-3">

                                                    @php
                                                        $shippings = App\Models\User\Shipping::where('status', '1')
                                                            ->latest()
                                                            ->get();
                                                    @endphp
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="py-3">

                                                                @foreach ($shippings as $shipping)
                                                                    <div class="form-check">

                                                                        <div class="form-group">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="shipping_charge" autocomplete="off"
                                                                                value="{{ $shipping->value }}" />

                                                                            <label class="form-check-label"
                                                                                for="cashOnDelivery">
                                                                                {{ $shipping->title }}
                                                                            </label>
                                                                        </div>

                                                                    </div>
                                                                @endforeach


                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div id="cashOnDeliveryDetails">
                                                                Delivery Man Will Delivery Your Percel As
                                                                Soon As Possible. Then Pay The Amount.
                                                            </div>
                                                            <div id="onlinePaymentDetails" style="display: none">
                                                                Online Payment Open
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Payment Info  --}}

                                    </div>


                                    <!-- Check Out Content -->

                                    <div class="col-lg-4">
                                        <form action="">
                                            <div class="card rounded-0">
                                                <div class="card-header font-weight-bold">
                                                    ORDER SUMMERY
                                                </div>
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

                                                                @foreach ($carts as $item)
                                                                    <tr class="">
                                                                        <td>Sub Total:</td>
                                                                        <td class="text-right">Tk {{ $item->price }}</td>
                                                                    </tr>
                                                                @endforeach


                                                                <tr class="">
                                                                    <td>Delivery Charge :</td>
                                                                    <td class="text-right">Tk <b
                                                                            class="drk-gry shippingCharge">0.00</b></td>

                                                                </tr>

                                                                {{-- <tr class="">
                                                                    <td>Delivery Charge :</td>
                                                                    <td class="text-right">50 TK</td>
                                                                </tr> --}}

                                                                <tr>
                                                                    <th scope="col">ORDER TOTAL</th>

                                                                    <th class="text-right">
                                                                        <input class="" type="hidden"
                                                                            name="total_amount" value="0">
                                                                        Tk <b class="amount grandTotal">
                                                                            {{ $cartTotal }}</b>
                                                                    </th>

                                                                </tr>

                                                            </tbody>

                                                        </table>


                                                        {{-- Delivery System  --}}
                                                        <div class="mt-5">
                                                            <h5 class="cart-title-highlight title-3">Payment Method</h5>
                                                            <ul class="payment_methods methods list-unstyled mt-3 form-group">

                                                                <li class="payment_method_bacs">

                                                                    <div class="">
                                                                        <label class="radio-inline">
                                                                            <input type="radio" value="cod"
                                                                                name="payment_method" />
                                                                            <span>Cash On Delivery</span>
                                                                        </label>
                                                                    </div>

                                                                </li>

                                                                <li class="payment_method_cod">

                                                                    <div class="">
                                                                        <label class="radio-inline">
                                                                            <input type="radio" value="ssl"
                                                                                name="payment_method" />
                                                                            <span>SSl Commerez</span>
                                                                        </label>
                                                                    </div>

                                                                </li>
                                                            </ul>

                                                        </div>
                                                        {{-- Delivery System  --}}


                                                        <div class="d-flex justify-content-end mt-3">

                                                            <button type="submit" class="cart-button w-100">
                                                                Proceed to Checkout
                                                            </button>

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

    </form>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            var subTotal = {{ $cartTotal }};

            var shippingCharge = $('.shippingCharge');
            var grandTotal = $('.grandTotal');

            var hiddenTotalInput = $('input[name="total_amount"]');

            $('input:radio[name="shipping_charge"]').change(function() {

                var shippingMethod = parseFloat($(this).val());
                var total = shippingMethod + subTotal;
                shippingCharge.text(shippingMethod.toFixed(2));
                grandTotal.text(total.toFixed(2));
                hiddenTotalInput.val(total.toFixed(2));
            });
        });
    </script>


    {{-- validate code  --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    billing_name: {
                        required: true,
                    },

                    billing_phone: {
                        required: true,
                    },

                    billing_city: {
                        required: true,
                    },

                    billing_country: {
                        required: true,
                    },

                    billing_state: {
                        required: true,
                    },

                    billing_address_line1: {
                        required: true,
                    },

                    shipping_charge: {
                        required: true,
                    },

                    payment_method: {
                        required: true,
                    },
                },
                messages: {
                    billing_name: {
                        required: 'Please Enter Name',
                    },

                    billing_phone: {
                        required: 'Please Enter Phone Number',
                    },

                    billing_city: {
                        required: 'Please Enter City Name',
                    },

                    billing_country: {
                        required: 'Please Enter Country Name',
                    },

                    billing_state: {
                        required: 'Please Enter State Name',
                    },

                    billing_address_line1: {
                        required: 'Please Enter Address Name',
                    },
                    
                    shipping_charge: {
                        required: 'Please Select Shipping Charge',
                    },

                    payment_method: {
                        required: 'Please Select Payment Method',
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>
@endsection
