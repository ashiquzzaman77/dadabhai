<li id="cartContent" class="cartContent">

    <a id="miniCartDropdown" href="javascript:;">
        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
        <span class="cart-item-num wht-clr" id="cartQty" style="background-color: #ef4416">0</span>
    </a>

    <div id="miniCartView" class="cartView">

        <span class="thm-clr">Your Cart Item</span>

        <div id="miniCart"></div>

        <div class="cartActions">
            <span class="pull-left">Subtotal</span>
            <span class="pull-right">

                <span class="text-dark">Tk</span> <span class="amount" id="cartSubTotal"></span>

            </span>
            <div class="clearfix"></div>
            <div class="minicart-buttons">
                <div class="col-lg-6">
                    <a href="{{ route('product.cart') }}">Your Cart</a>
                </div>
                <div class="col-lg-6">
                    <a href="checkout.html" class="minicart-checkout">Checkout</a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</li>
