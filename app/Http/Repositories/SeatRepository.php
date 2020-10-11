<?php


namespace App\Http\Repositories;


use App\Http\Repositories\Contracts\SeatRepositoryInterface;
use App\Models\Seat;
use App\Models\Trip;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class SeatRepository implements SeatRepositoryInterface
{

    private $seatModel;

    private $tripModel;

    public function __construct(Seat $seat,
    Trip $trip
    )
    {
        $this->seatModel = $seat;
        $this->tripModel = $trip;
    }

    public function getSeatsByTrips($trips)
    {
      $tripsIds = $trips->pluck('id');

      $seats = DB::table('seat_trip')->join('seats','seat_trip.seat_id','seats.id')
          ->whereIn('seat_trip.trip_id',$tripsIds)->where('status','0')->get();

      foreach($seats as $seat)
            {
                $seat->trip = $this->getSeatTrip($seat);
                $seat->bus = $this->getSeatBus($seat);
            }
        return json_decode($seats,true);

}

     public function getSeatBus($seat)
     {
         return $this->tripModel->join('bus_station','bus_station.id','start_station_id')->join('buses','bus_station.id','buses.id')->first();

     }

     public function getSeatTrip($seat)
     {
         return  $this->tripModel->where('id',$seat->trip_id)->with(['final_station.station','start_station.station'])->first();
     }
}
