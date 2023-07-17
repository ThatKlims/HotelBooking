@extends('layouts.AuthLayout')

@section('title', 'Login')

@section('content')
<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">

    <span class="login100-form-title p-b-37">
        Sign In
    </span>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('login') }}">
        @csrf
        {{-- email --}}
        <div class="wrap-input100 validate-input m-b-20" data-validate="Enter username or email">
            <x-input id="email" class="input100" type="email" placeholder="email" name="email" :value="old('email')" required autofocus />
        </div>
        {{-- password --}}
        <div class="wrap-input100 validate-input m-b-25">
            <x-input id="password" class="input100" type="password" name="password" placeholder="password" required autocomplete="current-password" />
        </div>
        {{-- rember me--}}
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 " name="remember">
                <span class="rember p-b-10 p-t-5">{{ __('Remember me') }}</span>
            </label>
        </div>
        {{-- login button --}}
        <div class="container-login100-form-btn">
            <button class="login100-form-btn">
                {{ __('Log in') }}
            </button>
        </div>
        {{-- forgot password link--}}
        <div class="Pass">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>
        {{-- text --}}
        <div class="text-center p-t-30 p-b-20">
                <span class="txt1">
                    Don't have an account yet?
                </span>
        </div>
        {{-- link to register --}}
        <div class="text-center">
            <a href="{{ route('register') }}" class="txt2 hov1">
                Sign Up
            </a>
        </div>
    </form>

</div>
@endsection
