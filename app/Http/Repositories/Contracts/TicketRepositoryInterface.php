<?php


namespace App\Http\Repositories\Contracts;


interface TicketRepositoryInterface
{

    /**
     * @param $seatId
     * @param $tripId
     * @param $userId
     * @return mixed
     */
    public function book($seatId, $tripId, $userId);

    /**
     * @param $seatId
     * @param $tripId
     * @return mixed
     */
    public function getAllTripsRelatedToSeatAndSpecificTrip($seatId, $tripId);
}
