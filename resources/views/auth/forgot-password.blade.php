@extends('layouts.AuthLayout')

@section('title', 'Forgot-password')

@section('content')
    <div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">

        <div class="text-center p-t-30 p-b-20">
                <span class="txt1">
                    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                </span>
        </div>


        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            {{-- reset email --}}
            <div class="wrap-input100 validate-input m-b-20" data-validate="Enter username or email">
                <x-input id="email" class="input100" type="email" placeholder="email" name="email" :value="old('email')" required autofocus />
            </div>

            {{-- reset link button --}}
            <div class="container-login100-form-btn">
                <button class="login100-form-btn">
                    {{ __('Email Password Reset Link') }}
                </button>
            </div>
        </form>

    </div>
@endsection
