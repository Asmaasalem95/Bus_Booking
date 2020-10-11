<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    public function stations()
    {
        return $this->belongsToMany(Station::class,'bus_station')
            ->withPivot('stop_no')->orderBy('stop_no')->withTimestamps();
    }
}
