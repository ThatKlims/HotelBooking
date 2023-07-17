<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomServices extends Model
{
    use HasFactory;
    protected $fillable = ['RoomService_name'];
    public function Rooms(){return $this->belongsToMany(Room::class);}
}
