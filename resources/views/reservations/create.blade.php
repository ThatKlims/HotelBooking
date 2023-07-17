@extends('layouts.AuthLayout')

@section('content')
    <div class="wrap-login100 p-l-55 p-r-55 p-t-50 p-b-30">

            <span class="login100-form-title p-b-20">
                Make a reservation
            </span>

        <form action="{{route('reservations.store')}}" method="POST">
            @csrf
            {{-- Client Name --}}
            <div class="wrap-input100 validate-input m-b-10">
                <input class="input100" type="text" name="ClientName" placeholder="Name">
            </div>
            <input class="input100" type="hidden" name="room_id" value="{{$room->id}}">

            {{-- Client Surname --}}
            <div class="wrap-input100 validate-input m-b-10">
                <input class="input100" type="text" name="ClientSurname" placeholder="Surname">
            </div>

            {{-- Client Phone Number --}}
            <div class="wrap-input100 validate-input m-b-10">
                <input class="input100" type="text" name="ClientPhoneNumber" placeholder="Phone number">
            </div>

            {{-- reservation start date --}}
            <div class="wrap-input100 validate-input m-b-10">
                <span class="selections">reservation starts:</span>
                <input class="input100" type="date" name="reservation_starts">
            </div>

            {{-- reservation end date --}}
            <div class="wrap-input100 validate-input m-b-10">
                <span class="selections">reservation ends:</span>
                <input class="input100" type="date" name="reservation_ends">
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

