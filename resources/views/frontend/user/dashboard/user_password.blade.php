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
                                    <h3 class="title-3 fsz-15">Change Your Password</h3>
                                </div>
                                <div class="row">

                                    <form class="col-md-12" method="POST" action="{{ route('user.password.update') }}">

                                        @csrf

                                        <div class="form-group col-lg-12">
                                            <label for="user_name">Old Password</label>
                                            <input type="password" class="form-control"
                                                @error('old_password') is-invalid @enderror placeholder="Old Password"
                                                name="old_password" />

                                            @error('old_password')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror

                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label>New Password</label>
                                            <input type="password" class="form-control"
                                                @error('new_password') is-invalid @enderror placeholder="New Password"
                                                name="new_password" />

                                            @error('new_password')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label>Confirm Password</label>
                                            <input type="password" class="form-control"
                                                @error('new_password_confirmation') is-invalid @enderror
                                                placeholder="Confirm Password" name="new_password_confirmation" />

                                            @error('new_password_confirmation')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>


                                        <div class="col-lg-12">
                                            <button class="alt fancy-button" type="submit">
                                                Update Password
                                            </button>
                                        </div>

                                    </form>
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
