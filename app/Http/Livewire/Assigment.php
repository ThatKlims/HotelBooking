<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\Country;
use Livewire\Component;

class Assigment extends Component
{
    public $selected_country;
    public $cities;

    public function render(){return view('livewire.assigment', ["countries" => Country::orderby("country_name")->get()]);}
    public function updatedSelectedCountry($country_id)
    {
        if ($country_id !=null)
        {
            $this->cities = City::where('country_id', $country_id)->orderby('city_name')->get();
        }
        else
        {
            $this->cities = null;
        }
    }

}
