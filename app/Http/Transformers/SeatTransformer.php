<?php


namespace App\Http\Transformers;


class SeatTransformer
{
    public function transform(array $seats)
    {
        $seatData = array();
        foreach ($seats as $seat) {
            if ($seat['status'] == '0') {
                $seat['status'] = 'available';
            } else $seat['status'] = 'booked';


            $seatData[] = [
                'seat_id' => $seat['id'],
                'seat_number' => $seat['seat_no'],
                'status' => $seat['status'],
                'departure' => $seat['trip']['start_station'][0]['station']['name'],
                'destination' => $seat['trip']['final_station'][0]['station']['name'],
                'departure_time' => $seat['trip']['departure_time'],
                'arrival_time' => $seat['trip']['arrival_time'],
                'bus_number' => $seat['bus']['bus_no'],
                'trip_number' => $seat['trip']['id'],
            ];

        }
        return $seatData;


    }

}
