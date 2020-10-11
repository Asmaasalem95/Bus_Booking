<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;


    public function final_station()
    {

        return $this->hasMany(BusStation::class,'id','final_station_id');
    }

  public function start_station()
    {
        return $this->hasMany(BusStation::class,'id','start_station_id');
    }

    public function available_seats()
    {
        return $this->belongsToMany(Seat::class,'seat_trip','trip_id','seat_id')->withPivot('status')
            ->where('status','0');;
    }

    public function booked_seats()
    {
        return $this->belongsToMany(Seat::class,'seat_trip','trip_id','seat_id')->withPivot('status')
            ->where('status','1');
    }




}
