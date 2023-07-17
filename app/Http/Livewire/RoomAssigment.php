<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\Country;
use App\Models\Hotel;
use App\Models\RoomServices;
use Livewire\Component;

class RoomAssigment extends Component
{
    public $selected_country;
    public $selected_city;
    public $cities;
    public $hotels;

    public function render()
    {
        return view('livewire.room-assigment', ["countries" => Country::orderby("country_name")->get(),
            "RoomServices" => RoomServices::orderby("RoomService_name")->get()]);
    }
    public function updatedSelectedCountry($country_id)
    {
        if ($country_id !=null)
        {
            $this->selected_city = null;
            $this->cities = City::where('country_id', $country_id)->orderby('city_name')->get();
        }
        else
        {
            $this->cities = null;
        }
    }
    public function updatedSelectedCity($city_id)
    {
        if ($city_id !=null)
        {
            $this->hotels = Hotel::where('city_id', $city_id)->orderby('hotel_name')->get();
        }
        else
        {
            $this->hotels = null;
        }
    }

}
