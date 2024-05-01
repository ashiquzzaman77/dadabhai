<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8" />
    <meta name="description" content="The most advanced " />
    <meta name="keywords" content="Metronic" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Metronic" />
    <meta property="og:url" content="https://keenthemes.com/metronic" />
    <meta property="og:site_name" content="Keenthemes | Metronic" />

    <!-- Title -->
    <title>Forgot Password</title>

    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="{{ asset('backend/assets/media/logos/favicon.ico') }}" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />

    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('backend/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />


</head>

<body id="kt_body" class="bg-dark">

    <div class="d-flex flex-column flex-root">

        <div
            class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed">

            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">

                <a href="javascript:;" class="mb-12">
                    <img alt="Logo" src="{{ asset('backend/assets/media/logos/logo-2.svg') }}" class="h-40px" />
                </a>


                <div class="w-lg-450px bg-body rounded shadow-sm p-10 p-lg-10 mx-auto">

                    <form class="form w-100" action="{{ route('password.email') }}" method="POST">

                        @csrf

                        <div class="text-center mb-10">

                            <h1 class="text-dark mb-3">Forgot Password</h1>

                        </div>

                        <div class="fv-row mb-10">
                            <label class="form-label fs-6 fw-bolder text-dark">Email</label>
                            <input class="form-control form-control-lg form-control-solid"
                                placeholder="example@gmail.com" type="email" name="email" autocomplete="off" />

                                <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                                    
                            {{-- @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror --}}

                            
                        </div>


                        {{-- <div class="fv-row mb-2">

                            <div class="d-flex flex-stack mb-2">
                                <label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
                                <a href="{{ route('admin.forgot.password') }}" class="link-primary fs-6 fw-bolder">Forgot Password ?</a>
                            </div>

                            <input
                                class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror"
                                type="password" placeholder="********" name="password" autocomplete="off" />

                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                        </div> --}}

                        <!-- Remember Me -->
                        {{-- <div class="block mb-5 float-end">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox"
                                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                    name="remember">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div> --}}

                        <div class="text-center">

                            <button type="submit" class="btn btn-lg btn-primary w-100 mb-5">
                                <span class="indicator-label">Password Reset</span>
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

    <script src="{{ asset('backend/assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('backend/assets/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('backend/assets/js/custom/authentication/sign-in/general.js') }}"></script>
</body>

</html>
