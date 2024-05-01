@extends('frontend.frontend_dashboard')
@section('frontend')
    <!-- CONTENT + SIDEBAR -->
    <div class="main-wrapper clearfix">
        {{-- <div class="site-pagetitle jumbotron">
            <div class="container text-center">
                <h3>Dada <span class="funky-font thm-clr">Bhaai</span>
                </h3>
                <!-- Breadcrumbs -->
                <div class="breadcrumbs">
                    <div class="breadcrumbs text-center">
                        <i class="fa fa-home"></i>
                        <span>
                            <a href="{{ route('index') }}">Home</a>
                        </span>
                        <i class="fa fa-arrow-circle-right"></i>
                        <span class="current">FAQ</span>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="theme-container container">
            <div class="gst-spc3">
                <div class="fancy-heading text-center">
                    <h3>Contact</h3>
                    <h5 class="funky-font-2"> All Person Contact Section </h5>
                </div>
                <div class="container-xxl">

                    <form action="{{ route('send.message') }}" method="POST">
                        @csrf

                        <div class="row">

                            <div class="col-lg-3">
    
                            </div>
    
                            <div class="col-lg-6 mx-auto">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" name="name" required placeholder="Your Name"
                                            class="form-control  form-control-sm form-control-solid">
                                    </div>
                                </div>
            
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" name="email" placeholder="Your Email"
                                            class="form-control form-control-sm form-control-solid">
                                    </div>
                                </div>
    
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Phone</label>
                                        <input type="tel" name="phone" required placeholder="Your Phone"
                                            class="form-control  form-control-sm form-control-solid">
                                    </div>
                                </div>
    
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Address</label>
                                        <input type="text" name="address" required placeholder="Your Address"
                                            class="form-control  form-control-sm form-control-solid">
                                    </div>
                                </div>
    
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Phone</label>
                                        <textarea name="message" class="form-control form-control-sm form-control-solid" id="" cols="5" rows="5" required placeholder="Write Something Here"></textarea>
                                    </div>
                                </div>
    
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-dark">Send Message</button>
                                </div>
                            </div>
    
                            <div class="col-lg-3">
    
                            </div>
        
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
    <!-- / CONTENT + SIDEBAR -->
@endsection
