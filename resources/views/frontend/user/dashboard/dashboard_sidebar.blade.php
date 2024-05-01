<aside class="col-md-3 col-sm-4">
    <div class="main-sidebar">
        <div class="widget sidebar-widget widget_categories clearfix">
            <h6 class="widget-title">My Account</h6>
            <ul>

                <li class="accout-item accout-item user_dashboard_active">
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                </li>

                <li class="accout-item">
                    <a href="order-details.html">Order Details</a>
                </li>
                <li class="accout-item ">
                    <a href="delivery-status.html">Delivery Status</a>
                </li>
                <li class="accout-item">
                    <a href="payment-details.html">Payment Method</a>
                </li>
                <li class="accout-item ">
                    <a href="promo-offers.html">Promo &amp; Offers</a>
                </li>
                <li class="accout-item">
                    <a href="{{ route('user.password') }}">Security</a>
                </li>
                <li class="accout-item">
                    <a href="{{ route('user.logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i> Log
                        Out</a>
                </li>
            </ul>
        </div>
    </div>
</aside>