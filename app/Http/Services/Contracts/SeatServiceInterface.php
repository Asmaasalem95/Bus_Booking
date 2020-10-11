<?php


namespace App\Http\Services\Contracts;


interface SeatServiceInterface
{

    /**
     * @param $trips
     * @return mixed
     */
    public function getAvailableSeats($trips);
}
