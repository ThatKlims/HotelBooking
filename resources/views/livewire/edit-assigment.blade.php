<form action="{{route('hotels.update', ['hotel' => $hotel])}}" enctype="multipart/form-data" method="POST">
    @csrf
    @method('PUT')
    {{-- Country select --}}
    <div class="wrap-input100 validate-input m-b-10">
        <label for="countries" class="rember">Country where the hotel is</label>
{{-- A few notes for myself. if a value is replaced or deleted anywhere in the list at any time the value that the wire:model is using will be set to the first entry--}}
        <select name="country" class="m-l-6 selections border-transparent" wire:model="selected_country">
            <option value="{{$hotel->city->country->id}}">{{$hotel->city->country->country_name}}</option>
            @foreach($countries as $country)
                @if($country->id != $hotel->city->country->id)
                    <option value="{{$country->id}}">{{$country->country_name}}</option>
                @endif
            @endforeach
        </select>
    </div>
    {{--city_name --}}
        <div class="wrap-input100 validate-input m-b-13">
            <label for="cities" class="rember">City where the hotel is</label>

            <select name="cities" class="m-l-6 selections border-transparent">
                <option value="{{$hotel->city_id}}" selected>current: {{$hotel->city->city_name}}</option>

                @if(!is_null($cities))
                @foreach($cities as $city)
                    @if($city->id != $hotel->city_id)
                        <option value="{{$city->id}}">{{$city->city_name}}</option>
                    @endif
                @endforeach
                @else
                    <option value="">select a country first</option>
                @endif
            </select>
        </div>

    <div class="wrap-input100 validate-input m-b-19">
        <input class="input100" type="text" placeholder="Hotel Name" name="hotel_name" value="{{$hotel->hotel_name}}">
    </div>

    {{--hotel description--}}
    <div class="wrap-input100 validate-input m-b-22">
        <textarea class="textArea" cols="30" rows="8" name="hotel_description" placeholder="hotel description">{{$hotel->hotel_description}}</textarea>
    </div>

    {{-- is the hotel open --}}
    <div class="block mt-4">
        <label for="isOpen"  class="inline-flex items-center">
            <input name="isOpen" type="hidden" value="0">
            <input checked name="isOpen" type="checkbox" value="1" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 ">
            <span class="rember p-b-10 p-t-5">Is Open</span>
        </label>
    </div>


    {{--create button--}}
    <div class="container-login100-form-btn">
        <button class="login100-form-btn">
            update
        </button>
    </div>
</form>
</div>
