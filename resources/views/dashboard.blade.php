@extends('frontend.frontend_dashboard')
@section('frontend')
    <!-- CONTENT + SIDEBAR -->
    <div class="main-wrapper clearfix">
        <div class="site-pagetitle jumbotron">
            <div class="container theme-container text-center">
                <h3>Dada<span class="thm-clr">Vaai</span></h3>

                <!-- Breadcrumbs -->
                <div class="breadcrumbs">
                    <div class="breadcrumbs text-center">
                        <i class="fa fa-home"></i>
                        <span><a href="{{ route('index') }}">Home</a></span>
                        <i class="fa fa-arrow-circle-right"></i>
                        <span class="current">user dashboard</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="theme-container container">
            <section class="main-container col1-layout">
                <div class="main container">
                    <div class="row">

                        @include('frontend.user.dashboard.dashboard_sidebar')
                        
                        <main class="col-md-9 col-sm-8 blog-wrap">
                            <div class="account-details-wrap">
                                <div class="heading-2">
                                    <h3 class="title-3 fsz-15">Change Your Personal Details</h3>
                                </div>
                                <div class="row">

                                    <form class="col-md-12" method="POST" action="{{ route('user.profile.update') }}">

                                        @csrf

                                        <div class="form-group col-sm-4">
                                            <label for="user_name">User Name <span class="red-clr">*</span></label>
                                            <input type="text" class="form-control" id="user_name"
                                                placeholder="Enter User Name" value="{{ $profileData->name }}" name="name" required />
                                            <div class="error-message" id="user_user_name-error"></div>
                                        </div>

                                        <div class="form-group col-sm-4">
                                            <label for="user_email">User Email <span class="red-clr">*</span></label>
                                            <input type="email" class="form-control" id="user_email"
                                                placeholder="Enter User Email" value="{{ $profileData->email }}" name="email" required />
                                            <div class="error-message" id="user_email-error"></div>
                                        </div>

                                        <div class="form-group col-sm-4">
                                            <label for="user_phone">Phone<span class="red-clr">*</span></label>
                                            <input type="tel" class="form-control" id="user_phone"
                                                placeholder="Enter Phone Number" value="{{ $profileData->phone }}" name="phone" required />
                                            <div class="error-message" id="user_phone-error"></div>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="country">Country</label>
                                            <input type="text" class="form-control"
                                                placeholder="Enter Country Name" value="{{ $profileData->country }}" name="country" />
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <label for="country">City</label>
                                            <input type="text" class="form-control"
                                                placeholder="Enter City Name" value="{{ $profileData->city }}" name="city" />
                                        </div>

                                        <div class="form-group col-sm-4">
                                            <label for="user_postal_code">Zip Code</label>
                                            <input type="text" class="form-control"
                                                placeholder="Enter Zip Code" value="{{ $profileData->postal_code }}" name="postal_code" />
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label for="user_address_line1">Address 1 <span
                                                    class="red-clr">*</span></label>
                                            <input type="text" class="form-control" id="user_address_line1"
                                                placeholder="Enter Address 1" value="{{ $profileData->address }}" name="address" required />
                                            <div class="error-message" id="user_address_line1-error"></div>
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label for="user_address_line2">Address 2</label>
                                            <input type="text" class="form-control"
                                                placeholder="Enter Address 2" value="{{ $profileData->address_two }}" name="address_two" />
                                        </div>

                                        <div class="col-md-12 col-sm-12 ">
                                            <button class="alt fancy-button" type="submit">
                                                Update Profile
                                            </button>
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>
                            <div class="woocommerce checkout mt-1">
                                <div class="col2-set clearfix" id="customer_details">
                                    <div class="col-1 col-lg-6 col-sm-6">
                                        <h4 class="cart-title-highlight title-3">Billing Details</h4>
                                        <div class="row gx-0">
                                            <form class="col-md-12" id="myForm-billing" novalidate>
                                                <div class="form-group pr-0 col-sm-6">
                                                    <label for="user_id">User Name <span class="red-clr">*</span></label>
                                                    <input type="text" class="form-control" id="user_id"
                                                        placeholder="Enter User Name" name="user_id" required />
                                                    <!-- <div class="error-message" id="user_id-error"></div> -->
                                                </div>
                                                <div class="form-group col-sm-6 pr-0">
                                                    <label for="email">User Email <span
                                                            class="red-clr">*</span></label>
                                                    <input type="email" class="form-control" id="email"
                                                        placeholder="Enter User Name" name="email" required />
                                                    <!-- <div class="error-message" id="email-error"></div> -->
                                                </div>
                                                <div class="form-group pr-0 col-sm-6">
                                                    <label for="phone">User Phone <span
                                                            class="red-clr">*</span></label>
                                                    <input type="email" class="form-control" id="phone"
                                                        placeholder="Enter User Name" name="phone" required />
                                                    <!-- <div class="error-message" id="phone-error"></div> -->
                                                </div>
                                                <div class="col-md-6 pr-0">
                                                    <div class="form-group  selectpicker-wrapper">
                                                        <div class="btn-group bootstrap-select" style="width: 100%;">
                                                            <label for="country">Country </label>
                                                            <select class="selectpicker" data-live-search="true"
                                                                data-width="100%" id="country" data-toggle="tooltip"
                                                                title="Country" name="country" tabindex="-98" required>
                                                                <option class="bs-title-option" value="">
                                                                    Country</option>
                                                                <option value="bangladesh" selected="">bangladesh
                                                                </option>
                                                            </select>
                                                            <!-- <div class="error-message" id="country-error"></div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 pr-0">
                                                    <div class="form-group selectpicker-wrapper">
                                                        <div class="btn-group bootstrap-select" style="width: 100%;">
                                                            <label for="city">City</label>
                                                            <select class="selectpicker" data-live-search="true"
                                                                data-width="100%" data-toggle="tooltip" name="city"
                                                                title="Division" id="clientDivision" name="division"
                                                                tabindex="-98">
                                                                <option class="bs-title-option" value="">
                                                                    Division</option>
                                                                <option value="dhaka" selected="">dhaka</option>
                                                                <option value="dhaka">Dhaka</option>
                                                                <option value="barisal">Barisal</option>
                                                                <option value="sylhet">Sylhet</option>
                                                                <option value="rajshahi">Rajshahi</option>
                                                                <option value="rangpur">Rangpur</option>
                                                                <option value="khulna">Khulna</option>
                                                                <option value="chattogram">Chattogram</option>
                                                                <option value="mymensingh">Mymensingh</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-6 pr-0">
                                                    <label for="postal_code">Zip Code <span
                                                            class="red-clr">*</span></label>
                                                    <input type="email" class="form-control" id="postal_code"
                                                        placeholder="Enter Zip Code" name="postal_code" required />
                                                    <!-- <div class="error-message" id="postal_code-error"></div> -->
                                                </div>
                                                <div class="form-group col-sm-6 pr-0">
                                                    <label for="address_line1">Address 1 <span
                                                            class="red-clr">*</span></label>
                                                    <input type="email" class="form-control" id="address_line1"
                                                        placeholder="Enter Address 1" name="address_line1" required />
                                                    <!-- <div class="error-message" id="address_line1-error"></div> -->
                                                </div>
                                                <div class="form-group col-sm-6 pr-0">
                                                    <label for="address_line2">Address 2<span
                                                            class="red-clr">*</span></label>
                                                    <input type="email" class="form-control" id="address_line2"
                                                        placeholder="Enter Address 2" name="address_line2" required />
                                                    <!-- <div class="error-message" id="address_line2-error"></div> -->
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <a href="">
                                                        <u>To use your address as a billing address click here</u>
                                                    </a>
                                                </div>
                                                <div class="col-md-12 col-sm-12 mt-1 ">
                                                    <button class="alt fancy-button" type="submit"
                                                        id="submit-btn-billing">
                                                        Update
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-2 col-lg-6 col-sm-6 border">
                                        <div class="woocommerce-shipping-fields">
                                            <h4 class="cart-title-highlight title-3">Ship to a different address?</h4>
                                            <form class="col-md-12" id="myForm-shipping" novalidate>
                                                <div class="form-group pr-0 col-sm-6">
                                                    <label for="user_id">User Name <span class="red-clr">*</span></label>
                                                    <input type="text" class="form-control" id="user_id"
                                                        placeholder="Enter User Name" name="user_id" required />
                                                    <!-- <div class="error-message" id="user_id-error"></div> -->
                                                </div>
                                                <div class="form-group col-sm-6 pr-0">
                                                    <label for="email">User Email <span
                                                            class="red-clr">*</span></label>
                                                    <input type="email" class="form-control" id="email"
                                                        placeholder="Enter User Name" name="email" required />
                                                    <!-- <div class="error-message" id="email-error"></div> -->
                                                </div>
                                                <div class="form-group pr-0 col-sm-6">
                                                    <label for="phone">User Phone <span
                                                            class="red-clr">*</span></label>
                                                    <input type="email" class="form-control" id="phone"
                                                        placeholder="Enter User Name" name="phone" required />
                                                    <!-- <div class="error-message" id="phone-error"></div> -->
                                                </div>
                                                <div class="col-md-6 pr-0">
                                                    <div class="form-group  selectpicker-wrapper">
                                                        <div class="btn-group bootstrap-select" style="width: 100%;">
                                                            <label for="country">Country </label>
                                                            <select class="selectpicker" data-live-search="true"
                                                                data-width="100%" id="country" data-toggle="tooltip"
                                                                title="Country" name="country" tabindex="-98" required>
                                                                <option class="bs-title-option" value="">
                                                                    Country</option>
                                                                <option value="bangladesh" selected="">bangladesh
                                                                </option>
                                                            </select>
                                                            <!-- <div class="error-message" id="country-error"></div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 pr-0">
                                                    <div class="form-group selectpicker-wrapper">
                                                        <div class="btn-group bootstrap-select" style="width: 100%;">
                                                            <label for="city">City</label>
                                                            <select class="selectpicker" data-live-search="true"
                                                                data-width="100%" data-toggle="tooltip" name="city"
                                                                title="Division" id="clientDivision" name="division"
                                                                tabindex="-98">
                                                                <option class="bs-title-option" value="">
                                                                    Division</option>
                                                                <option value="dhaka" selected="">dhaka</option>
                                                                <option value="dhaka">Dhaka</option>
                                                                <option value="barisal">Barisal</option>
                                                                <option value="sylhet">Sylhet</option>
                                                                <option value="rajshahi">Rajshahi</option>
                                                                <option value="rangpur">Rangpur</option>
                                                                <option value="khulna">Khulna</option>
                                                                <option value="chattogram">Chattogram</option>
                                                                <option value="mymensingh">Mymensingh</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-6 pr-0">
                                                    <label for="postal_code">Zip Code <span
                                                            class="red-clr">*</span></label>
                                                    <input type="email" class="form-control" id="postal_code"
                                                        placeholder="Enter Zip Code" name="postal_code" required />
                                                    <!-- <div class="error-message" id="postal_code-error"></div> -->
                                                </div>
                                                <div class="form-group col-sm-6 pr-0">
                                                    <label for="address_line1">Address 1 <span
                                                            class="red-clr">*</span></label>
                                                    <input type="email" class="form-control" id="address_line1"
                                                        placeholder="Enter Address 1" name="address_line1" required />
                                                    <!-- <div class="error-message" id="address_line1-error"></div> -->
                                                </div>
                                                <div class="form-group col-sm-6 pr-0">
                                                    <label for="address_line2">Address 2<span
                                                            class="red-clr">*</span></label>
                                                    <input type="email" class="form-control" id="address_line2"
                                                        placeholder="Enter Address 2" name="address_line2" required />
                                                    <!-- <div class="error-message" id="address_line2-error"></div> -->
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <a href="">
                                                        <u>To use your address as a billing address click here</u>
                                                    </a>
                                                </div>
                                                <div class="col-md-12 col-sm-12 mt-1 ">
                                                    <button class="alt fancy-button" type="submit"
                                                        id="submit-btn-shipping">
                                                        Update
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </main>
                        
                    </div>
            </section>
        </div>

        <div class="clear"></div>
    </div>
    <!-- / CONTENT + SIDEBAR -->
@endsection
