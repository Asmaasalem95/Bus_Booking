<?php


namespace App\Http\Repositories\Contracts;


interface SeatRepositoryInterface
{

    public function getSeatsByTrips(array $trips);
}
