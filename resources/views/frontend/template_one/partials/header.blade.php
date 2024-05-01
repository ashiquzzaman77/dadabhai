<header class="header">
    <div class="middle header__middle bg--header__middle pt-35 pb-35">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="content--header__middle d-flex align-items-center justify-content-between">
                        <div class="logo--header__middle">
                            <div class="logo">
                                <a class="logo__link" href="{{ route('index') }}"><img class="" width="250px"
                                        src="https://www.dadabhaai.com/storage/main/jaragroups404413.png"
                                        alt="" /></a>
                            </div>
                        </div>
                        <div class="search--header__middle h1search--header__middle">

                            <form class="search--header__form position-relative" action="{{ route('product.search') }}"
                                method="POST">

                                @csrf

                                <div class="header--search__box">

                                    <input class="header--search__query" type="text"
                                        placeholder="Search For Products..." required autocomplete="off" id="search"
                                        name="search" />
                                    <button class="header--search__btn">
                                        <i class="icofont-search-2"></i>
                                    </button>

                                    {{-- <div id="searchProducts"></div> --}}
                                </div>



                                {{-- <div class="header--search__cate">
                                    <select name="header-search" id="header--search__main">
                                        <option selected >All Categories</option>
                                    </select>
                                </div> --}}

                            </form>

                            <div id="searchProducts"></div>
                        </div>

                        <div class="cart--header__middle d-none d-md-block">

                            <div class="cart--header__list">
                                <ul class="list-inline">

                                    @auth
                                        <li>
                                            <div class="dropdown">
                                                <a href="" class="border-0 bg-none text-muted" type="button"
                                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="fal fa-user-plus text-black font-weight-bold"></i>
                                                </a>
                                                <div class="dropdown-menu p-3 user-panel-login"
                                                    aria-labelledby="dropdownMenuButton" style="">

                                                    <a href="{{ route('template.one.user.logout') }}"
                                                        class="btn btn-primary w-100">Logout</a>

                                                    <hr class="mb-2 mt-3">

                                                    <a class="dropdown-item" href="#"><i class="fal fa-user pr-2"></i>
                                                        My Profile</a>
                                                    <a class="dropdown-item" href="#"><i class="fal fa-star pr-2"
                                                            aria-hidden="true"></i> My Favorites</a>
                                                    <a class="dropdown-item" href="#"><i class="fal fa-list pr-2"
                                                            aria-hidden="true"></i> My Booked</a>

                                                </div>
                                            </div>
                                        </li>
                                    @else
                                        <li>
                                            <div class="dropdown">
                                                <a href="" class="border-0 bg-none text-muted" type="button"
                                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="fal fa-user-plus text-black font-weight-bold"></i>
                                                </a>
                                                <div class="dropdown-menu p-2 user-panel-login"
                                                    aria-labelledby="dropdownMenuButton" style="">

                                                    <a href="{{ route('template.one.login') }}"
                                                        class="btn btn-primary w-100">Login</a>

                                                    <hr class="mb-2 mt-1">
                                                    <p>First time here? <a href="{{ route('template.one.login') }}"
                                                            class="text-danger">Sign Up</a>
                                                    </p>



                                                </div>
                                            </div>
                                        </li>
                                    @endauth

                                    @auth
                                        <li class="">
                                            <a href="{{ route('wishlist') }}"><i class="fal fa-heart"><span
                                                        class="cart__count" id="wishQty">0</span></i></a>
                                        </li>
                                    @endauth


                                    <li class="">
                                        <a class="mini__cart--link" href="jaxascript:;"><i
                                                class="fal fa-bags-shopping font-weight-bold text-muted">
                                                <span class="cart__count" id="cartQty">0</span>
                                            </i>
                                        </a>
                                    </li>

                                    <li class="d-none">
                                        <a href="#"><i class="fal fa-sync"></i></a>
                                    </li>
                                </ul>
                            </div>

                            <div class="mini__cart--box">


                                <div id="miniCart">
                                </div>

                                <ul>
                                    <li>
                                        <div class="total-text d-flex justify-content-between">
                                            <span class="f-800 cod__black-color">Total Bag</span>
                                            <span class="f-800 cod__black-color">Tk <span
                                                    id="cartSubTotal"></span></span>

                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex justify-content-between">
                                            <a href="#" class="checkout">Checkout</a>
                                            <a href="{{ route('template.one.view.cart') }}" class="viewcart">View
                                                Cart</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bottom header__bottom header__bottom--border custom-header-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-5 col-10">
                    <!-- Extra shopping cart for mobile device start -->
                    <div class="cart--header__middle d-block d-md-none dept__menu-box">
                        <div class="cart--header__list">
                            <ul class="list-inline">
                                <li>
                                    <a href="registration.html"><i class="fal fa-user-plus"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fal fa-heart"></i></a>
                                </li>


                                <li>
                                    <a class="mini__cart--link" href="#"><i class="fal fa-bags-shopping"><span
                                                class="cart__count">3</span></i>
                                    </a>
                                </li>

                            </ul>
                        </div>
                        <div class="mini__cart--box">
                            <ul>
                                <li class="mb-20">
                                    <div class="cart-image">
                                        <a href="#"><img src="img/allproducts/cart__thumb__1.jpg"
                                                alt="" /></a>
                                    </div>
                                    <div class="cart-text">
                                        <a href="#" class="title f-400 cod__black-color">Pink Jacket</a>
                                        <span class="cart-price f-400 dusty__gray-color">2 x
                                            <span class="price f-800 cod__black-color">$ 78.00</span></span>
                                    </div>
                                    <div class="del-button">
                                        <a href="#"><i class="icofont-close-line"></i></a>
                                    </div>
                                </li>
                                <li class="mb-20">
                                    <div class="cart-image">
                                        <a href="#"><img src="img/allproducts/cart__thumb__2.jpg"
                                                alt="" /></a>
                                    </div>
                                    <div class="cart-text">
                                        <a href="#" class="title f-400 cod__black-color">Silk Glows</a>
                                        <span class="cart-price f-400 dusty__gray-color">2 x
                                            <span class="price f-800 cod__black-color">$ 78.00</span></span>
                                    </div>
                                    <div class="del-button">
                                        <a href="#"><i class="icofont-close-line"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="total-text d-flex justify-content-between">
                                        <span class="f-800 cod__black-color">Total Bag </span>
                                        <span class="f-800 cod__black-color">$ 99.00</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex justify-content-between">
                                        <a href="#" class="checkout">Checkout</a>
                                        <a href="#" class="viewcart">View Cart</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    @php
                        $categorys = App\Models\Admin\Category::where('status', '1')
                            ->orderBy('category_name', 'ASC')
                            ->limit(9)
                            ->latest()
                            ->get();
                    @endphp

                    <!-- Extra shopping cart for mobile device end -->
                    <div class="dept__menu position-relative d-none d-md-block extra_main_cat">
                        <nav>
                            <ul class="dept__menu--list">
                                <li>

                                    <a class="dept__menu-mlink f-900 cod__gray-color" href="#"
                                        id="categoryLink">
                                        <i class="fa fa-th pr-2" aria-hidden="true"></i>Category
                                    </a>

                                    <ul class="dept__menu--dropdown custom_main_menu_dropdown py-0"
                                        id="categoryDropdown">
                                        <div class="row bg-white" style="border-top: 1px solid #eee">
                                            <div class="col-lg-2 px-0" style="background-color: #eee">
                                                <ul class="nav nav-tabs flex-column px-0" id="myTab"
                                                    role="tablist">

                                                    @foreach ($categorys as $key => $category)
                                                        <li class="nav-item">
                                                            <a class="nav-link main_cat_triger {{ $key == 0 ? 'active' : '' }}"
                                                                id="Cosmetics-tab" data-toggle="tab"
                                                                href="#category{{ $category->id }}" role="tab"
                                                                aria-controls="Cosmetics"
                                                                aria-selected="true">{{ $category->category_name }}</a>
                                                        </li>
                                                    @endforeach

                                                    {{-- <li class="nav-item">
                                                        <a class="nav-link main_cat_triger active" id="Cosmetics-tab"
                                                            data-toggle="tab" href="#Cosmetics" role="tab"
                                                            aria-controls="Cosmetics"
                                                            aria-selected="true">Cosmetics</a>
                                                    </li>


                                                    <li class="nav-item">
                                                        <a class="nav-link main_cat_triger" id="Lifestyle-tab"
                                                            data-toggle="tab" href="#Lifestyle" role="tab"
                                                            aria-controls="Lifestyle"
                                                            aria-selected="false">Electronics Devices</a>
                                                    </li> --}}

                                                    {{-- <div>
                                                        <a href="{{ route('home.all.category.page') }}" class="category_btn">All Category</a>
                                                    </div> --}}

                                                </ul>
                                            </div>
                                            <div class="col-lg-10">
                                                <div class="tab-content" id="myTabContent">


                                                    @foreach ($categorys as $key => $category)
                                                        <div class="tab-pane fade show {{ $key == 0 ? 'active' : '' }}"
                                                            id="category{{ $category->id }}" role="tabpanel"
                                                            aria-labelledby="Cosmetics-tab">

                                                            @php
                                                                $catwissubcat = App\Models\Admin\SubCategory::where(
                                                                    'status',
                                                                    '1',
                                                                )
                                                                    ->where('category_id', $category->id)
                                                                    ->orderBy('subcategory_name', 'ASC')
                                                                    ->latest()
                                                                    ->get();
                                                            @endphp

                                                            <div class="row main-cat-height">

                                                                @forelse ($catwissubcat as $subcat)
                                                                    <div class="col-lg-3">
                                                                        <p
                                                                            class="font-weight-bold pt-3 header-menu-border">
                                                                            {{ $subcat->subcategory_name }}
                                                                        </p>

                                                                        @php
                                                                            $childcats = App\Models\Admin\ChildCategory::where(
                                                                                'status',
                                                                                '1',
                                                                            )
                                                                                ->where('subcategory_id', $subcat->id)
                                                                                ->orderBy('childcategory_name', 'ASC')
                                                                                ->limit(7)
                                                                                ->latest()
                                                                                ->get();
                                                                        @endphp

                                                                        <ul>

                                                                            @forelse ($childcats as $childcat)
                                                                                <li>

                                                                                    <a href="{{ url('product/childcategory/' . $childcat->id . '/' . $childcat->childcategory_slug) }}"
                                                                                        class="text-muted px-0 py-1">{{ $childcat->childcategory_name }}</a>
                                                                                </li>
                                                                            @empty
                                                                                <p>No ChildCategory Avaiable</p>
                                                                            @endforelse

                                                                        </ul>
                                                                    </div>
                                                                @empty
                                                                    <p>No Subcategory Avaiable</p>
                                                                @endforelse


                                                            </div>

                                                            {{-- <div class="row py-2 mt-5" style="background-color: #cd3301">
                                                            <div class="col-lg-3">
                                                                <a href=""
                                                                    class="grenadier-color font-weight-bold text-white">View
                                                                    All</a>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <a href=""
                                                                    class="grenadier-color font-weight-bold text-white">View
                                                                    All</a>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <a href=""
                                                                    class="grenadier-color font-weight-bold text-white">View
                                                                    All</a>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <a href=""
                                                                    class="grenadier-color font-weight-bold text-white">View
                                                                    All</a>
                                                            </div>
                                                        </div> --}}

                                                        </div>
                                                    @endforeach


                                                </div>
                                            </div>
                                        </div>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8 col-md-7 col-2">
                    <div class="main-menu">
                        <nav id="mobile-menu">
                            <ul>
                                <li>
                                    <a href="{{ route('index') }}">Home</a>
                                </li>

                                {{-- Brand List  --}}

                                <li class="mega-menu static dropdown-icon">
                                    <a href="javascript:void(0)">Brand</a>

                                    @php
                                        $categorys = App\Models\Admin\Category::where('status', '1')
                                            ->orderBy('id', 'ASC')
                                            ->limit(4)
                                            ->latest()
                                            ->get();
                                    @endphp

                                    <ul class="submenu mega-full">

                                        @foreach ($categorys as $category)
                                            <li>
                                                <a href="javascript:;">{{ $category->category_name }}</a>

                                                {{-- @php
                                                    $brands = App\Models\Brand::with('brandProducts')
                                                        ->whereHas('brandProducts')
                                                        ->where('status', '1')
                                                        ->limit(4)
                                                        ->latest()
                                                        ->get();
                                                @endphp --}}

                                                <ul class="submenu level-1">

                                                    {{-- @foreach ($brands as $brand)
                                                        <li> <a href="">{{ $brand->brand_name }}</a></li>
                                                    @endforeach --}}

                                                </ul>

                                            </li>
                                        @endforeach

                                    </ul>
                                </li>

                                {{-- Brand List  --}}

                                <li class="mega-menu static dropdown-icon">
                                    <a href="javascript:void(0)"
                                        onclick="window.location.href='shop-page.html'">Offers</a>
                                    <ul class="submenu mega-full">
                                        <li>
                                            <a href="">Offers 01</a>
                                            <ul class="submenu level-1">
                                                <li>
                                                    <a href="">Furniture</a>
                                                </li>
                                                <li>
                                                    <a href="">Fasion</a>
                                                </li>
                                                <li>
                                                    <a href="">Bags</a>
                                                </li>
                                                <li>
                                                    <a href="">Lather</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="">Offers 02</a>
                                            <ul class="submenu level-1">
                                                <li>
                                                    <a href="">Electronics</a>
                                                </li>
                                                <li>
                                                    <a href="">Chair</a>
                                                </li>
                                                <li>
                                                    <a href="">Table</a>
                                                </li>
                                                <li>
                                                    <a href="">Book</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="">Offers 03</a>
                                            <ul class="submenu">
                                                <li>
                                                    <a href="">Clock</a>
                                                </li>
                                                <li>
                                                    <a href="">Watch</a>
                                                </li>
                                                <li>
                                                    <a href="">Mobile</a>
                                                </li>
                                                <li>
                                                    <a href="">sunglass</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="">Offers 04</a>
                                            <ul class="submenu">
                                                <li>
                                                    <a href="">Chair</a>
                                                </li>
                                                <li>
                                                    <a href="">Lather</a>
                                                </li>
                                                <li>
                                                    <a href="">Table</a>
                                                </li>
                                                <li>
                                                    <a href="">Clock</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>

                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mobile-menu"></div>
                </div>
            </div>
        </div>
    </div>
</header>
