@extends('layouts.AuthLayout')

@section('content')
    <div class="wrap-login100 p-l-55 p-r-55 p-t-50 p-b-30">

            <span class="login100-form-title p-b-20">
                Edit Hotel
            </span>
        <form action="{{route('reservations.update', ['reservation' => $reservation])}}" method="POST">
            @csrf
            @method('PUT')
            {{-- Client Name --}}
            <div class="wrap-input100 validate-input m-b-10">
                <input class="input100" type="text" name="client_name" placeholder="Name" value="{{$reservation->ClientName}}">
            </div>

            {{-- Client Surname --}}
            <div class="wrap-input100 validate-input m-b-10">
                <input class="input100" type="text" name="client_surname" placeholder="Surname" value="{{$reservation->ClientSurname}}">
            </div>

            {{-- Client Phone Number --}}
            <div class="wrap-input100 validate-input m-b-10">
                <input class="input100" type="text" name="client_phone_number" placeholder="Phone number" value="{{$reservation->ClientPhoneNumber}}">
            </div>

            {{-- reservation start date --}}
            <div class="wrap-input100 validate-input m-b-10">
                <input class="input100" type="date" name="reservation_start" value="{{$reservation->reservation_starts}}">
            </div>

            {{-- reservation end date --}}
            <div class="wrap-input100 validate-input m-b-10">
                <input class="input100" type="date" name="reservation_end" value="{{$reservation->reservation_ends}}">
            </div>


            {{--create button--}}
            <div class="container-login100-form-btn">
                <button class="login100-form-btn">
                    update
                </button>
            </div>
        </form>
    </div>
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
