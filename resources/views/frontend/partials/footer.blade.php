<footer class="site-footer clearfix" itemscope itemtype="https://schema.org/WPFooter">
    <div class="site-main-footer container theme-container">
        <div class="row">
            <div class="col-md-3 col-sm-6 clearfix">
                <section class="widget footer-widget widget_text clearfix">
                    <div class="textwidget">
                        <p class="fsz-32">
                            <span class="bold-font-3 wht-clr">DADA</span>
                            <span class="thm-clr funky-font">BHAAI</span>
                        </p>
                        <p>Get Your Product Today</p>

                        @php
                            $sitting = App\Models\Sites::find(1);
                            $brands = App\Models\Brand::where('status', '1')->latest()->get();
                        @endphp

                        <div class="author-info-social">

                            <a class="goshop-share rcc-google" href="{{ $sitting->youtube_url }}" rel="nofollow"
                                target="_blank">
                                <i class="fa fa-youtube"></i>
                            </a>

                            <a class="goshop-share rcc-twitter" href="{{ $sitting->twitter_url }}" rel="nofollow"
                                target="_blank">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a class="goshop-share rcc-facebook" href="{{ $sitting->facebook_url }}" rel="nofollow"
                                target="_blank">
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a class="goshop-share rcc-linkedin" href="{{ $sitting->linkedin_url }}" rel="nofollow"
                                target="_blank">
                                <i class="fa fa-linkedin"></i>
                            </a>
                            <a class="goshop-share rcc-pinterest" href="{{ $sitting->github_url }}" rel="nofollow"
                                target="_blank">
                                <i class="fa fa-github"></i>
                            </a>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-3 col-sm-6 clearfix">
                <section class="widget footer-widget widget_nav_menu clearfix">
                    <h6 class="widget-title">My Account</h6>
                    <ul>
                        <li class="menu-item">
                            <a href="{{ route('login') }}">Sign In</a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('contact.user') }}">Contact</a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('faq') }}">F.A.Q</a>
                        </li>
                        <li class="menu-item">
                            <a href="#">Term & Policy</a>
                        </li>
                    </ul>
                </section>
            </div>
            <div class="col-md-3 col-sm-6 clearfix">
                <section id="nav_menu-3" class="widget footer-widget widget_nav_menu clearfix">
                    <h6 class="widget-title">Our Services</h6>
                    <ul>
                        <li class="menu-item">
                            <a href="#">Shipping Return</a>
                        </li>
                        <li class="menu-item">
                            <a href="#">International Shipping</a>
                        </li>
                        <li class="menu-item">
                            <a href="#">Secure Shopping</a>
                        </li>
                        <li class="menu-item">
                            <a href="#">Affiliates</a>
                        </li>
                        <li class="menu-item">
                            <a href="#">F.A.Q</a>
                        </li>
                    </ul>
                </section>
            </div>
            <div class="col-md-3 col-sm-6 clearfix">
                <section id="text-6" class="widget footer-widget widget_text clearfix">
                    <h6 class="widget-title">Newsletter</h6>
                    <div class="textwidget">
                        Lorem ipsum dolor sit amet conseret adipiscing elit sed diam
                        nonunem.
                        <form class="mc4wp-form">
                            <p>
                                <label>Email address: </label>
                                <input type="email" name="EMAIL" placeholder="Your email address" required />
                            </p>
                            <p>
                                <button class="submit">
                                    <i class="fa fa-envelope-o"></i>
                                </button>
                            </p>
                        </form>
                    </div>
                </section>
            </div>
        </div>


        {{-- <div class="post-footer">
            <div class="payment-systems text-center">

                @foreach ($brands as $brand)
                    <div class="item">
                        <a href="#">
                            <img src="{{ asset('storage/brand/'.$brand->brand_image) }}" style="width:40px;height:40px;" alt="" />
                        </a>
                    </div>
                @endforeach

            </div>
        </div> --}}

    </div>
    <div class="subfooter text-center">
        <div class="container theme-container">
            <p>
                Copyright &copy; <a href="#" class="thm-clr">DadaBhaai</a>.
                All Right Reserved 2024
            </p>
        </div>
    </div>
</footer>
