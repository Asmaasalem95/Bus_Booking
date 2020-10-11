<?php


namespace App\Http\Utilities\Filters;


class DestinationFilter implements FilterInterface

{
    public static function apply($data, $value)
    {
        // TODO: Implement apply() method.

        return $data->whereHas('final_station.station', function($q) use ($value)
        {
            $q->where('name',$value);
        });
    }

}
