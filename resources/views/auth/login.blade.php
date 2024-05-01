@extends('frontend.frontend_dashboard')
@section('frontend')
    <!-- CONTENT + SIDEBAR -->
    <div class="main-wrapper clearfix">
        <div class="login-wrap text-center">
            <h2 class="fsz-35 spcbtm-15">
                <span class="bold-font-3 blk-clr">DADA</span>
                <span class="thm-clr funky-font">VAAI</span>
            </h2>
            <p class="fsz-20 title-3">WELCOME TO OUR SHOPPING ZONE</p>
            </p>

            <div class="login-form">
                <p class="bold-font-2 fsz-12 signup">SIGN IN</p>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form class="login" method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">
                        <input type="email" name="email" placeholder="user@gmail.com" value="{{ old('email') }}"
                            class="form-control" required />
                    </div>

                    <div class="form-group">
                        <input type="password" name="password" placeholder="********" class="form-control" required />
                    </div>

                    <!-- Remember Me -->
                    {{-- <div class="float-start">
                        <input id="remember_me" type="checkbox" name="remember">
                        <label for="remember_me" class="">Remember me</label>
                    </div> --}}

                    <div class="form-group">
                        <button class="alt fancy-button" type="submit">Login</button>
                    </div>

                    <div class="flex items-center justify-end">
                        @if (Route::has('password.request'))
                            <a class="" href="{{ route('password.request') }}">
                                Forgot your password?
                            </a>
                        @endif
                    </div>

                </form>

                <div>
                    <p>Do not have any account <a href="{{ route('register') }}">Register Here</a></p>
                </div>

                {{-- <a class="fb-btn btn spcbtm-15" href="#">
                    <i class="fa fa-facebook btn-icon" style="margin-right: 10px"></i>Register with Facebook
                </a>
                <a class="gogl-btn btn spcbtm-15" href="#">
                    <i class="fa fa-google btn-icon" style="margin-right: 10px"></i>Register with Google
                </a> --}}
            </div>
        </div>
    </div>
    <!-- CONTENT + SIDEBAR -->
@endsection


{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
