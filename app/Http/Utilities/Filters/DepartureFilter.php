<?php


namespace App\Http\Utilities\Filters;


use App\Http\Utilities\Filters\FilterInterface;

class DepartureFilter implements FilterInterface
{

    public static function apply($data, $value)
{
    // TODO: Implement apply() method.

   return $data->whereHas('start_station.station', function($q) use ($value)
    {
        $q->where('name',$value);
    });
   // return   $data->where('name',$value)->get()->first();
}

}
