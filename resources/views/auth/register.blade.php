@extends('layouts.AuthLayout')

@section('title', 'Register')

@section('content')
    <div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">

            <span class="login100-form-title p-b-37">
                Register
            </span>

        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form method="POST" action="{{ route('register') }}">
            @csrf
            {{-- full name--}}
            <div class="wrap-input100 validate-input m-b-20">
                <x-input id="name" class="input100" type="text" name="name" placeholder="Full Name" :value="old('name')" required autofocus />
            </div>

            {{-- email --}}
            <div class="wrap-input100 validate-input m-b-24">
                <x-input id="email" class="input100" type="email" placeholder="email" name="email" :value="old('email')" required />
            </div>

            {{-- password--}}
            <div class="wrap-input100 validate-input m-b-28">
                <x-input id="password" class="input100"
                         type="password"
                         name="password"
                         placeholder="password"
                         required autocomplete="new-password" />
            </div>
            {{-- repeat password --}}
            <div class="wrap-input100 validate-input m-b-32">
                <x-input id="password_confirmation" class="input100"
                         type="password"
                         placeholder="repeat password"
                         name="password_confirmation" required />
            </div>
            {{-- register button--}}
            <div class="container-login100-form-btn">
                <button class="login100-form-btn">
                    {{ __('Register') }}
                </button>
            </div>
            {{-- link to login for already registered users --}}
            <div class="text-center p-6">
                <a href="{{ route('login') }}" class="txt2 hov1">
                    {{ __('Already registered?') }}
                </a>
            </div>

        </form>

    </div>
@endsection
