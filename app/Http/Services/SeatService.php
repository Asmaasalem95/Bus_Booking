<?php


namespace App\Http\Services;


use App\Http\Repositories\Contracts\SeatRepositoryInterface;
use App\Http\Services\Contracts\SeatServiceInterface;

class SeatService implements SeatServiceInterface
{
    /**
     * @var SeatRepositoryInterface
     */
    private $seatRepository;

    /**
     * SeatService constructor.
     * @param SeatRepositoryInterface $seatRepository
     */
    public function __construct(SeatRepositoryInterface $seatRepository)
    {
        $this->seatRepository = $seatRepository;
    }

    /** get all available trip seats
     * @param $trips
     * @return mixed
     */
    public function getAvailableSeats($trips)
    {
        return $this->seatRepository->getSeatsByTrips($trips);
    }

}
