<div class="col-md-2 bg-light">
    <ul class="nav nav-pills flex-column bg-light pt-3" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link user-dashboard-menu active" id="dashboard-tab" data-toggle="tab" href="#dashboard"
                role="tab" aria-controls="dashboard" aria-selected="true"><i
                    class="fa fa-home pr-2"></i>Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link user-dashboard-menu" id="order-tab" data-toggle="tab" href="#order" role="tab"
                aria-controls="order" aria-selected="false"><i class="fa fa-shopping-cart pr-2"></i>Order Details</a>
        </li>
        <li class="nav-item">
            <a class="nav-link user-dashboard-menu" id="delivery-tab" data-toggle="tab" href="#delivery" role="tab"
                aria-controls="delivery" aria-selected="false"><i class="fa fa-truck pr-2"></i>Delivery Status</a>
        </li>
        <li class="nav-item">
            <a class="nav-link user-dashboard-menu" id="payment-tab" data-toggle="tab" href="#payment" role="tab"
                aria-controls="payment" aria-selected="false"><i class="fa fa-credit-card pr-2"></i>Payment Method</a>
        </li>
        <li class="nav-item">
            <a class="nav-link user-dashboard-menu" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                aria-controls="contact" aria-selected="false"><i class="fa fa-user pr-2"></i>Contact Details</a>
        </li>
        <li class="nav-item">
            <a class="nav-link user-dashboard-menu" id="security-tab" data-toggle="tab" href="#security" role="tab"
                aria-controls="security" aria-selected="false"><i class="fa fa-lock pr-2"></i>Security</a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link user-dashboard-menu" href="{{ route('template.one.user.logout') }}"><i class="fa fa-sign-out pr-1"></i> Log Out</a>
        </li> --}}
    </ul>
    <div>
        <a class="nav-link user-dashboard-menu" href="{{ route('template.one.user.logout') }}"><i
                class="fa fa-sign-out pr-1"></i> Log Out</a>
    </div>
</div>
