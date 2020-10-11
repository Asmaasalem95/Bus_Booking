<?php


namespace App\Http\Services\Contracts;


interface TicketServiceInterface
{
    /**
     * @param $seatId
     * @param $tripId
     * @param $userId
     * @return mixed
     */
    public function bookTicket($seatId,$tripId,$userId);

}
