<?php


namespace App\Http\Services;


use App\Http\Repositories\Contracts\TripRepositoryInterface;
use App\Http\Services\Contracts\TripServiceInterface;

class TripService implements TripServiceInterface
{

    /**
     * @var TripRepositoryInterface
     */
    private $tripRepository;

    /**
     * TripService constructor.
     * @param TripRepositoryInterface $tripRepository
     */
    public function __construct(TripRepositoryInterface $tripRepository)
    {
        $this->tripRepository = $tripRepository;
    }

    /** get trips data using the given filters
     * @param $filters
     * @return mixed
     */
    public function getFilteredTrips($filters)
    {
        return $this->tripRepository->filter($filters);
    }

    /**
     * get all trips data
     * @return mixed
     */
    public function getAll()
    {
        // TODO: Implement getAll() method.
        return $this->tripRepository->getAllTripsWithStationsAndBuses();
    }

}
