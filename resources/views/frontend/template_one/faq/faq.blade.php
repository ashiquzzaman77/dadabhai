@extends('frontend.template_one.frontend_dashboard_template_one')
@section('index_template_one')
    <div class="container py-4">
        <h3 class="pure__black-color mb-30 mt-30 text-center">
            <span class="f-300">Discover Our</span> <br />
            <span class="f-800">FAQ</span>
        </h3>
        <div class="row py-5">
            <div class="col-lg-4">
                <p>About Your Questions ?</p>
                <h3>We Have Solution!</h3>
            </div>
            <div class="col-lg-8">
                <div id="accordion" class="accordion">

                    <div class="card mb-0">

                        @forelse ($faqs as $faq)
                            <div class="card-header collapsed" data-toggle="collapse" href="#faq{{ $faq->id }}">
                                <a class="card-title"> {{ $faq->question }} </a>
                            </div>

                            <div id="faq{{ $faq->id }}" class="card-body collapse" data-parent="#accordion">
                                <p>
                                    {{ $faq->answer }}
                                </p>
                            </div>
                        @empty
                            <p>No Question Avaiable</p>
                        @endforelse


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
