@extends('layouts.AuthLayout')

@section('title', 'Reset-Password')

@section('content')
    <div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">


        <span class="login100-form-title p-b-37">
            Reset Password
        </span>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            {{-- email --}}
            <div class="wrap-input100 validate-input m-b-20">
                <x-input id="email" class="input100" type="email" placeholder="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            {{-- new password --}}
            <div class="wrap-input100 validate-input m-b-25">
                <x-input id="password" class="input100" type="password" name="password" placeholder="new password" required/>
            </div>

            <div class="wrap-input100 validate-input m-b-32">
                <x-input id="password_confirmation" class="input100" type="password" placeholder="repeat new password" name="password_confirmation" required />
            </div>

            <div class="container-login100-form-btn">
                <button class="login100-form-btn">
                    {{ __('Reset Password') }}
                </button>
            </div>
        </form>

    </div>
@endsection
