<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;



    public function trips()
    {
        return $this->belongsToMany(Trip::class,'seat_trip','seat_id','trip_id')->withPivot('status');
    }

}
