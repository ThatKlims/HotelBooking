<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $table = 'hotels';
    protected $fillable = ['city_id', 'hotel_name', 'hotel_description', 'isOpen'];
    public function city(){return $this->belongsTo(City::class);}
    public function rooms(){return $this->hasMany(Room::class);}
}
