<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\Country;
use Livewire\Component;

class EditAssigment extends Component
{
    public $selected_country;
    public $cities;
    public $hotel;
    public function mount()
    {
        $this->cities = City::where('country_id', $this->hotel->city->country->id)->get();
    }
    public function render(){return view('livewire.edit-assigment', ["countries" => Country::orderby("country_name")->get(), 'hotel' => $this->hotel]);}
    public function updatedSelectedCountry($country_id)
    {
        $this->cities = City::where('country_id', $country_id)->get();
    }
}
