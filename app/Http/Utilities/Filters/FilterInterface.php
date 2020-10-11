<?php


namespace App\Http\Utilities\Filters;


interface FilterInterface
{

    /**
     * @param $data
     * @param $value
     * @return mixed
     */
    public static function apply($data, $value);
}
