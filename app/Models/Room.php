<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $table = 'rooms';
    protected $fillable = ['hotel_id', 'room_number', 'room_description', 'price_per_night', 'isFree'];
    public function hotel(){return $this->belongsTo(Hotel::class);}
    public function RoomServices(){return $this->belongsToMany(RoomServices::class, 'rooms__room_services' , 'Room_id' , 'RoomService_id');}
}
