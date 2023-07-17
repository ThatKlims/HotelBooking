<form action="{{route('rooms.store')}}" method="POST">
    @csrf
    {{-- Country select --}}
    <div class="wrap-input100 validate-input m-b-10">
        <label for="country" class="rember">Country where the hotel is</label>
        <select wire:model="selected_country" name="country" class="m-l-6 selections border-transparent" >
            <option value="">select a country</option>
            @foreach($countries as $country)
                <option value="{{$country->id}}">{{$country->country_name}}</option>
            @endforeach
        </select>
    </div>

    {{-- City select --}}
    <div class="wrap-input100 validate-input m-b-13">
        <label for="cities" class="rember">City where the hotel is</label>

        <select name="cities" class="m-l-6 selections border-transparent" wire:model="selected_city">
            @if($selected_country == null )
                <option value="" selected></option>
            @endif
            @if(!is_null($cities))
                @foreach($cities as $city)
                    <option value="{{$city->id}}" label="{{$city->city_name}}"></option>
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
            @if($selected_city == null || $selected_country == null)
                <option value="" selected></option>
            @endif
            @if(!is_null($hotels))
                @foreach($hotels as $hotel)
                    <option value="{{$hotel->id}}" label="{{$hotel->hotel_name}}"></option>
                @endforeach
            @else
                <option value="">select a city first</option>
            @endif
        </select>
    </div>


    {{-- room number --}}
    <div class="wrap-input100 validate-input m-b-25 m-t-4">
        <input class="input100" type="text" placeholder="Room number" name="room_number">
    </div>

    {{-- room description --}}
    <div class="wrap-input100 validate-input m-b-22">
        <textarea class="textArea" cols="30" rows="8" name="room_description" placeholder="room description"></textarea>
    </div>

    {{-- price per night for room --}}
    <div class="wrap-input100 validate-input m-b-25 m-t-4">
        <input class="input100" type="number" placeholder="price per night" name="price_per_night">
    </div>

    {{-- Room Services Select --}}
    <div class="wrap-input100 validate-input m-b-25 m-t-4">
        <label for="RoomServices" class="block text-left" style="max-width: 300px">
            <span class="text-gray-700">Select Room Services for this room</span>
            <select class="form-multiselect block w-full mt-1" name="RoomServices[]" multiple>
                @foreach($RoomServices as $RoomService)
                    <option value="{{$RoomService->id}}" label="{{$RoomService->RoomService_name}}"></option>
                @endforeach
            </select>
        </label>
    </div>

    {{-- create button--}}
    <div class="container-login100-form-btn">
        <button class="login100-form-btn">
            create
        </button>
    </div>
</form>
