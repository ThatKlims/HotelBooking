<form action="{{route('search')}}" method="POST" class = "book-form">
    @csrf
    {{-- Country select --}}
    <div class="form-item" >
        <label for="country" class="text-white">Country where the hotel is</label>
        <select wire:model="selected_country" name="country" class="rounded" >
            <option value="">select a country</option>
            @foreach($countries as $country)
                <option value="{{$country->id}}">{{$country->country_name}}</option>
            @endforeach
        </select>
    </div>

    {{-- City select --}}
    <div class="form-item">
        <label for="cities" class="text-white">City where the hotel is</label>

        <select name="cities" class="rounded" wire:model="selected_city">
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
    <div class="form-item">
        <label for="hotels" class="text-white">Hotel:</label>
        <select name="hotels" class="rounded">
            <option value="" selected></option>
            @if(!is_null($hotels))
                @foreach($hotels as $hotel)
                    <option value="{{$hotel->id}}" label="{{$hotel->hotel_name}}"></option>
                @endforeach
            @else
                <option value="">select a city first</option>
            @endif
        </select>
    </div>


    {{-- price per night for room --}}
    <div class="form-item">
        <label for="price_per_night" class="text-white">Max Price per night:</label>
        <input class="input100 rounded" type="number" name="price_per_night">
    </div>

    {{-- create button--}}
    <div class = "form-item">
        <input type = "submit" class = "btn" value = "Book Now">
    </div>
</form>
