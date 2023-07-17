@extends('layouts.AuthLayout')

@section('content')
    <div class="wrap-login100 p-l-55 p-r-55 p-t-50 p-b-30">

            <span class="login100-form-title p-b-20">
                Create a Country
            </span>

        <form action="{{route('countries.store')}}" method="POST">
            @csrf
            {{-- Country --}}
            <div class="wrap-input100 validate-input m-b-10">
                <input class="input100" type="text" name="country_name" placeholder="Country">
            </div>

            {{-- create button--}}
            <div class="container-login100-form-btn">
                <button class="login100-form-btn">
                    create
                </button>
            </div>
        </form>

    @if($errors->any())
        <div class="w-3/4 m-auto text-center">
            @foreach($errors->all() as $error)
                <li class="text-red-600 list-none">
                    {{$error}}
                </li>
            @endforeach
        </div>
    @endif
    </div>

@endsection
