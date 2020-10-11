<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class BusStation extends Model
{
    use HasFactory;

    protected $table = 'bus_station';


    public function station()
    {
        return $this->belongsTo(Station::class);
    }

    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }


}
