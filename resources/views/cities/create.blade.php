@extends('layouts.AuthLayout')

@section('content')
    <div class="wrap-login100 p-l-55 p-r-55 p-t-50 p-b-30">

            <span class="login100-form-title p-b-20">
                Create a City
            </span>

        <form action="{{route('cities.store')}}" method="POST">
            @csrf
            {{-- Country select--}}
            <div class="wrap-input100 validate-input m-b-10">
                <label for="countries" class="rember">Country where the hotel is</label>
                <select name="countries" class="m-l-6 selections border-transparent">
                    @foreach($countries as $country)
                        <option value="{{$country->id}}">{{$country->country_name}}</option>
                    @endforeach
                </select>
            </div>

            {{-- city_name --}}
            <div class="wrap-input100 validate-input m-b-13">
                <input class="input100" type="text" placeholder="City Name" name="city_name">
            </div>

            {{-- postal code--}}
            <div class="wrap-input100 validate-input m-b-16">
                <input class="input100" type="text" name="postal_code" placeholder="Postal Code">
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
