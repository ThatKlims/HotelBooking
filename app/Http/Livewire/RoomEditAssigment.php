<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\Country;
use App\Models\Hotel;
use Livewire\Component;

class RoomEditAssigment extends Component
{
    public $selected_country;
    public $selected_city;
    public $cities;
    public $room;
    public $hotels;
    public function mount()
    {
        $this->cities = City::where('country_id', $this->room->hotel->city->country->id)->get();
        $this->hotels = Hotel::where('city_id', $this->room->hotel->city->id)->get();
    }
    public function render(){return view('livewire.room-edit-assigment', ["countries" => Country::orderby("country_name")->get(), 'room' => $this->room]);}
    public function updatedSelectedCountry($country_id)
    {
        $this->selected_city = '';
        $this->cities = City::where('country_id', $country_id)->get();
    }
    public function updatedSelectedCity($city_id)
    {
        $this->hotels = Hotel::where('city_id', $city_id)->get();
    }
}
