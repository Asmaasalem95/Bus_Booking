<?php


namespace App\Http\Repositories;


use App\Http\Repositories\Contracts\TicketRepositoryInterface;
use App\Models\Seat;
use App\Models\Ticket;
use App\Models\Trip;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class TicketRepository implements TicketRepositoryInterface
{

    /**
     * @var Seat
     */
    private $seatModel;
    /**
     * @var Trip
     */
    private $tripModel;
    /**
     * @var Ticket
     */
    private $ticketModel;

    /**
     * TicketRepository constructor.
     * @param Seat $seat
     * @param Trip $trip
     * @param Ticket $ticket
     */
    public function __construct(Seat $seat,
                                Trip $trip,
                                Ticket $ticket
    )
    {
        $this->seatModel = $seat;
        $this->tripModel = $trip;
        $this->ticketModel = $ticket;
    }

    /**
     * @desc update all trips between from and to stops to be booked with the given seat to the given user
     * @param $seatId
     * @param $tripId
     * @param $userId
     * @return mixed
     */
    public function book($seatId, $tripId, $userId)
    {
        $tripToBooked = $this->getAllTripsRelatedToSeatAndSpecificTrip($seatId, $tripId);
        $tripIds = array_unique($tripToBooked->pluck('trip_id')->toArray());

        //book the buses to the given seat
        DB::table('seat_trip')->where('seat_id', $seatId)->whereIn('trip_id', $tripIds)->update(['status' => '1']);

        //create ticket for the given seat
        return $this->ticketModel->create(['seat_id' => $seatId, 'user_id'=> $userId]);

    }

    /** @desc get all trips between from and to stops with the given seat
     * @param $seatId
     * @param $tripId
     * @return mixed
     */
    public function getAllTripsRelatedToSeatAndSpecificTrip($seatId, $tripId)
    {
        $trip = $this->tripModel->with('start_station')->
        with('final_station')
            ->where('id', $tripId)->first();

        $startStopNo = $trip->start_station[0]->stop_no;
        $finalStopNo = $trip->final_station[0]->stop_no;


        $trips = $this->seatModel->join('seat_trip', 'seat_trip.seat_id', 'seats.id')
            ->join('trips', 'trips.id', 'trip_id')
            ->join('bus_station', 'bus_station.id', 'trips.start_station_id')
            ->where('seat_id', $seatId)
            ->where('stop_no', $startStopNo)
            ->get();

        $subTrips = $this->seatModel->join('seat_trip', 'seat_trip.seat_id', 'seats.id')
            ->join('trips', 'trips.id', 'trip_id')
            ->join('bus_station', 'bus_station.id', 'trips.final_station_id')
            ->where('seat_id', $seatId)
            ->whereBetween('stop_no', [$startStopNo, $finalStopNo])
            ->get();

        return $finalTrips = $trips->merge($subTrips);
    }

}
