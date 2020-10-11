<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\filter_trips_request;
use App\Http\Services\Contracts\SeatServiceInterface;
use App\Http\Services\Contracts\TripServiceInterface;
use App\Http\Transformers\SeatTransformer;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class SeatController extends Controller
{
    /**
     * @var SeatServiceInterface
     */
    private $seatService;
    /**
     * @var TripServiceInterface
     */
    private $tripService;
    /**
     * @var SeatTransformer
     */
    private $transformer;

    /**
     * SeatController constructor.
     * @param SeatServiceInterface $seatService
     * @param TripServiceInterface $tripService
     * @param SeatTransformer $seatTransformer
     */
    public function __construct(SeatServiceInterface $seatService,
                                TripServiceInterface $tripService,
                                SeatTransformer $seatTransformer

    )
    {
        $this->seatService = $seatService;
        $this->tripService = $tripService;
        $this->transformer = $seatTransformer;
    }

    /**
     * @param filter_trips_request $request
     * @return \Illuminate\Http\JsonResponse|object
     */
    public function getAvailableSeats(filter_trips_request $request)
    {
        $filters['from'] = $request->from ;
        $filters['to'] =  $request->to;
        $trips = $this->tripService->getFilteredTrips($filters);
        if (!$trips) {
            return response()->json([
                'status' => 'Success',
                'response' => 'No Trips Available',
            ])->setStatusCode(Response::HTTP_OK);
        }

        $seats = $this->seatService->getAvailableSeats($trips);

        if (!$seats) {
            return response()->json([
                'status' => 'Success',
                'response' => 'No Seats Available',
            ])->setStatusCode(Response::HTTP_OK);
        } else {
            return response()->json([
                'status' => 'Success',
                'response' => $this->transformer->transform($seats),
            ])->setStatusCode(Response::HTTP_OK);


        }

    }
}
