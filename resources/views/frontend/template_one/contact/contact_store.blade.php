@extends('frontend.template_one.frontend_dashboard_template_one')
@section('index_template_one')
    <!-- contact area start -->
    <section class="contact-area pt-80">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-7">

                    <div class="">
                        <h4 class="title mb-3">Send A Message</h4>

                        <form action="{{ route('template_one.contact.store') }}" method="POST">

                            @csrf

                            @if (session('status'))
                                <div class="text-success" role="alert">
                                    {{ session('status') }}

                                </div>
                            @elseif (session('error'))
                                <div class="text-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <div class="row">

                                <div class="col-6 mb-4">
                                    <input type="text" name="name"
                                        class="form-control form-control-sm @error('name') is-invalid @enderror"
                                        placeholder="Enter Name">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-6 mb-4">
                                    <input type="email" name="email"
                                        class="form-control form-control-sm @error('email') is-invalid @enderror"
                                        placeholder="Email Address">
                                    @error('email')
                                        <div class="text-danger" style="padding-top: -10px;">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12 mb-4">
                                    <input type="text" name="subject"
                                        class="form-control form-control-sm @error('subject') is-invalid @enderror"
                                        placeholder="Name Of Subject">

                                    @error('subject')
                                        <div class="text-danger" style="padding-top: -10px;">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12 mb-4">
                                    <textarea name="message" class="form-control form-control-sm @error('message') is-invalid @enderror"
                                        placeholder="Desciption" cols="3" rows="3"></textarea>
                                    @error('message')
                                        <div class="text-danger" style="padding-top: -10px;">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>

                        </form>

                    </div>
                </div>

                <div class="col-xl-4 offset-xl-1 col-lg-5">
                    <div class="contact-text">
                        <div class="single-text mb-30">
                            <i class="icofont-telephone"></i>
                            <h5>Contact customer service</h5>
                            <p>Need assistance? Our customer service is here to
                                assist you Monday through Friday from
                                9 am EST to 10 pm EST.</p>
                            <h5>{{ $sites->phone_two }}</h5>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- contact area end -->
@endsection
