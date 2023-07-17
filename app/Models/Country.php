<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $table = 'countries';
    protected $fillable = ['country_name'];
    public function cities(){return $this->hasMany(City::class);}
    public function hotels(){return $this->hasManyThrough(Hotel::class, City::class, 'country_id', 'city_id');}
    public function rooms(){return $this->hasManyThrough(Room::class, Hotel::class, 'city_id', 'hotel_id');}

}
