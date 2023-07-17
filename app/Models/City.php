<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $table = 'cities';
    protected $fillable = ['country_id', 'city_name', 'postal_code'];

    public function country(){return $this->belongsTo(Country::class);}
    public function hotels(){return $this->hasMany(Hotel::class);}
}
