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
                    <h3>FAQ</h3>
                    <h5 class="funky-font-2"> All Question & Answer Are Here For This Website. </h5>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="container">
                            <div class="accordion" id="accordionExample">

                                @if (count($faqs) > 0)
                                    @foreach ($faqs as $faq)
                                        <div class="item">

                                            <div class="item-header" id="headingTwo">
                                                <h2 class="mb-0">
                                                    <button class="btn btn-link collapsed" type="button"
                                                        data-toggle="collapse" data-target="#collapseTwo{{ $faq->id }}"
                                                        aria-expanded="false" aria-controls="collapseTwo">
                                                        <span class="thm-clr">Q:</span> {{ $faq->question }} <i
                                                            class="fa fa-angle-down thm-clr"></i>
                                                    </button>
                                                </h2>
                                            </div>

                                            <div id="collapseTwo{{ $faq->id }}" class="collapse"
                                                aria-labelledby="headingTwo" data-parent="#accordionExample">
                                                <div class="t-p"> {{ $faq->answer }} </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <h4>No Faq Avaiable</h4>
                                @endif

                            </div>
                        </div>
                    </div>
                    <!-- end of wrap -->
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
    <!-- / CONTENT + SIDEBAR -->
@endsection
