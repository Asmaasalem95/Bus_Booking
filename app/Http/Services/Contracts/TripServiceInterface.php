<?php


namespace App\Http\Services\Contracts;


interface TripServiceInterface
{

    /**
     * @param $filters
     * @return mixed
     */
    public function getFilteredTrips($filters);

    /**
     * @return mixed
     */
    public function getAll();
}
