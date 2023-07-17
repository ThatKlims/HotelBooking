@extends('layouts.CoreLayout')

@section('content')
    <section class = "rooms sec-width" id = "room">
        <div class = "title">
            <h2>rooms</h2>
        </div>
        <div class = "rooms-container">
            @forelse($rooms as $room)
                @if($room->hotel->city_id == $city)
                <article class = "room">
                    <div class = "room-image">
                        <img src = "{{asset('images/img1.jpg')}}" alt = "room image">
                    </div>
                    <div class = "room-text">
                        <h3>Hotel {{$room->hotel->hotel_name}}; Room {{$room->room_number}}</h3>
                        <h4>location: {{$room->hotel->city->city_name}}:{{$room->hotel->city->country->country_name}}</h4>
                        @if($room->isFree == 0)
                            <h5>Status: Rented</h5>
                        @else
                            <h5>Status: Free</h5>
                        @endif
                        <ul>
                            <li>
                                <i class = "fas fa-arrow-alt-circle-right"></i>
                                window straight to the ocean
                            </li>
                            <li>
                                <i class = "fas fa-arrow-alt-circle-right"></i>
                                king size bed
                            </li>
                            <li>
                                <i class = "fas fa-arrow-alt-circle-right"></i>
                                room service
                            </li>
                        </ul>
                        <p>{{$room->room_description}}</p>
                        <p class = "rate">
                            <span>{{$room->price_per_night}}$</span> Per Night
                        </p>
                        @if(\Illuminate\Support\Facades\Auth::user()->hasrole('admin'))
                            <a href="{{route('rooms.edit', ['room' => $room->id])}}"><button type = "button" class = "btn">edit</button></a>
                            <form class="text-center" action="{{route('rooms.destroy', ['room' => $room->id])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn">delete</button>
                            </form>
                        @endif
                        <button type = "button" class = "btn">book now</button>
                    </div>
                </article>
                @endif
            @empty
                <div class="text-red-500 text-center">No Rooms are available at this moment</div>
            @endforelse

        </div>
    </section>

@endsection
