@extends('frontend.frontend_dashboard')
@section('frontend')
    <!-- CONTENT + SIDEBAR -->
    <div class="main-wrapper clearfix">
        <div class="site-pagetitle jumbotron">
            <div class="container text-center">
                <h3>Dada <span class="thm-clr">Vaai</span>
                </h3>
                <!-- Breadcrumbs -->
                <div class="breadcrumbs">
                    <div class="breadcrumbs text-center">
                        <i class="fa fa-home"></i>
                        <span>
                            <a href="{{ route('index') }}">Home</a>
                        </span>
                        <i class="fa fa-arrow-circle-right"></i>
                        <span class="current">Brand All</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="theme-container container">

            <div class="main-container row">

                @forelse ($brands as $brand)
                    <div class="col-lg-2">
                        {{-- <div class="card">
                            <div class="card-body" style="">
                                <img src="{{ asset('storage/brand/' . $brand->brand_image) }}"
                                    style="width:70px;height:70px;" alt="">
                                    <p>{{ $brand->brand_name }}</p>
                            </div>
                        </div> --}}

                        <div class="text-box" style="margin-bottom: 10px;">
                            <h2 class="title-3 fsz-14 blklt-clr">
                                <a href="{{ route('brand.wise.product',$brand->id) }}"><img src="{{ asset('storage/brand/' . $brand->brand_image) }}"
                                        style="width:350px;height: 40px;" alt=""></a>
                            </h2>
                            <p>{{ $brand->brand_name }}</p>
                        </div>
                    </div>
                @empty
                    <p>No Brand Avaiable</p>
                @endforelse

            </div>
        </div>
    </div>
    <div class="clear"></div>
    <!-- / CONTENT + SIDEBAR -->
@endsection
