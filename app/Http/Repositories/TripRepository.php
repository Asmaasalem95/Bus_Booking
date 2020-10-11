<?php


namespace App\Http\Repositories;


use App\Http\Repositories\Contracts\TripRepositoryInterface;
use App\Http\Utilities\Filters\DepartureFilter;
use App\Http\Utilities\Filters\DestinationFilter;
use App\Models\Trip;

class TripRepository implements TripRepositoryInterface
{

    private  $tripModel;

    public function __construct(Trip $trip)
    {
        $this->tripModel = $trip;
    }

    public function filter($filters)
    {

      $data = $this->tripModel;

        if (isset($filters['from'])) {

            $data = DepartureFilter::apply($data,$filters['from']);
        }
        if (isset($filters['to'])) {

           $data = DestinationFilter::apply($data,$filters['to']);
        }

        return $data->get();
    }

    public function getAllTripsWithStationsAndBuses()
    {
        // TODO: Implement getAllTripsWithStationsAndBuses() method.

        return $this->tripModel->with(['start_station.station','final_station.station','start_station.bus','available_seats','booked_seats'])->get();

    }
}
