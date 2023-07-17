<form action="{{route('hotels.store')}}" enctype="multipart/form-data" method="POST">
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

        <select name="cities" class="m-l-6 selections border-transparent">
            @if($selected_country == '')
            <option value="">select a city</option>
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

    <div class="wrap-input100 validate-input m-b-19">
        <input class="input100" type="text" placeholder="Hotel Name" name="hotel_name">
    </div>
    {{--hotel description--}}
    <div class="wrap-input100 validate-input m-b-22">
        <textarea class="textArea" cols="30" rows="8" name="hotel_description" placeholder="hotel description"></textarea>
    </div>


    {{--create button--}}
    <div class="container-login100-form-btn">
        <button class="login100-form-btn">
            create
        </button>
    </div>
</form>
</div>
