<?php


namespace App\Http\Repositories\Contracts;


interface TripRepositoryInterface
{

    public function filter($filters);

    public function getAllTripsWithStationsAndBuses();
}
