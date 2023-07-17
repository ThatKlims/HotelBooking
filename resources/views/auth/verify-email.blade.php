@extends('layouts.AuthLayout')

@section('title', 'Forgot-password')

@section('content')
    <div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">

        <div class="text-center p-t-30 p-b-20">
                <span class="txt1">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                </span>
        </div>
        <!-- Session Status -->
        @if (session('status') == 'verification-link-sent')
            <div class="text-center p-t-30 p-b-24 text-green-600">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            {{-- reset email --}}
            <div class="container-login100-form-btn">
                <button class="login100-form-btn">
                    {{ __('Resend Verification Email') }}
                </button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
@endsection
