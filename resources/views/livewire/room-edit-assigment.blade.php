<form action="{{route('rooms.update', ['room' => $room])}}" method="POST">
    @csrf
    @method('PUT')

    {{-- Country select --}}
    <div class="wrap-input100 validate-input m-b-10">
        <label for="countries" class="rember">Country where the hotel is</label>
        {{-- A few notes for myself. if a value is replaced or deleted anywhere in the list at any time the value that the wire:model is using will be set to the first entry--}}
        <select name="countries" class="m-l-6 selections border-transparent" wire:model="selected_country">
            <option value="{{$room->hotel->city->country->id}}">current: {{$room->hotel->city->country->country_name}}</option>
            @foreach($countries as $country)
                @if($country->id != $room->hotel->city->country->id)
                    <option value="{{$country->id}}">{{$country->country_name}}</option>
                @endif
            @endforeach
        </select>
    </div>
    {{--city_name --}}
    <div class="wrap-input100 validate-input m-b-13">
        <label for="cities" class="rember">City where the hotel is</label>

        <select name="cities" class="m-l-6 selections border-transparent" wire:model="selected_city">
            <option value="{{$room->hotel->city->id}}" selected> current: {{$room->hotel->city->city_name}}</option>

            @if(!is_null($cities))
                @foreach($cities as $city)
                    @if($city->id != $room->hotel->city->id)
                        <option value="{{$city->id}}">{{$city->city_name}}</option>
                    @endif
                @endforeach
            @else
                <option value="">select a country first</option>
            @endif
        </select>
    </div>

    {{-- Hotel select --}}
    <div class="wrap-input100 validate-input m-b-13">
        <label for="hotels" class="rember">hotel where the room is</label>
        <select name="hotels" class="m-l-6 selections border-transparent">
            <option value="{{$room->hotel->id}}" selected>current: {{$room->hotel->hotel_name}}</option>
            @if(!is_null($hotels))
                @foreach($hotels as $hotel)
                    @if($hotel->id != $room->hotel->id)
                    <option value="{{$hotel->id}}" label="{{$hotel->hotel_name}}"></option>
                    @endif
                @endforeach
            @else
                <option value="">select a city first</option>
            @endif
        </select>
    </div>

    {{-- room number --}}
    <div class="wrap-input100 validate-input m-b-25 m-t-4">
        <input class="input100" type="text" placeholder="Room number" name="room_number" value="{{$room->room_number}}">
    </div>

    {{-- room description --}}
    <div class="wrap-input100 validate-input m-b-22">
        <textarea class="textArea" cols="30" rows="8" name="room_description" placeholder="room description">{{$room->room_description}}</textarea>
    </div>

    {{-- price per night for room --}}
    <div class="wrap-input100 validate-input m-b-25 m-t-4">
        <input class="input100" type="text" placeholder="price per night" name="price_per_night" value="{{$room->price_per_night}}">
    </div>

    {{-- is the room taken or not --}}
    <div class="block mt-4">
        <label for="isFree"  class="inline-flex items-center">
            <input name="isFree" type="hidden" value="0">
            <input checked name="isFree" type="checkbox" value="1" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 ">
            <span class="rember p-b-10 p-t-5">Is Free</span>
        </label>
    </div>

    {{-- create button--}}
    <div class="container-login100-form-btn">
        <button class="login100-form-btn">
            update
        </button>
    </div>
</form>
</div>
