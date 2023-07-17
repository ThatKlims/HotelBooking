<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'Room_id', 'ClientName', 'ClientSurname', 'ClientPhoneNumber', 'TotalPrice', 'reservation_starts', 'reservation_ends', 'IsCompleted'];
    public function user(){return $this->belongsTo(User::class);}
}
