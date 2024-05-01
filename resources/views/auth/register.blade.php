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
                <p class="bold-font-2 fsz-12 signup">Register Here</p>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form class="login" method="POST" action="{{ route('register') }}">
                    @csrf


                    <div class="form-group">
                        <input type="text" id="name" name="name" placeholder="Enter Name"
                            value="{{ old('name') }}" class="form-control" />

                        @error('name')
                            <div class="text-danger" style="text-align: start">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="email" id="email" name="email" placeholder="user@gmail.com"
                            value="{{ old('email') }}" class="form-control" />

                        @error('email')
                            <div class="text-danger" style="text-align: start">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="form-group">
                        <input type="password" id="password" name="password" placeholder="New Password"
                            class="form-control" />

                        @error('password')
                            <div class="text-danger" style="text-align: start">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            placeholder="Confirm Password" class="form-control" />

                        @error('password_confirmation')
                            <div class="text-danger" style="text-align: start">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    {{-- <div class="float-start">
                        <input id="remember_me" type="checkbox" name="remember">
                        <label for="remember_me" class="">Remember me</label>
                    </div> --}}

                    <div class="form-group">
                        <button class="alt fancy-button" type="submit">Register Here</button>
                    </div>

                </form>

                <div>
                    <p>Do have any account <a href="{{ route('login') }}">Login</a></p>
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
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
