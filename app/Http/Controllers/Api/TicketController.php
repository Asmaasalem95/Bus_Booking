<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\book_seat_request;
use App\Http\Services\Contracts\TicketServiceInterface;
use App\Http\Services\TicketService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;

class TicketController extends Controller
{
    /**
     * @var TicketServiceInterface
     */
    private $service;

    /**
     * TicketController constructor.
     * @param TicketServiceInterface $ticketService
     */
    public function __construct(TicketServiceInterface $ticketService)
    {
        $this->service = $ticketService;
    }

    /**
     * @desc book the given seat to the given user
     * @param book_seat_request $request
     * @return mixed
     */
    public function bookTicket(book_seat_request $request)
    {
        $user = JWTAuth::parseToken()->authenticate();
        return $this->service->bookTicket($request->seat_id, $request->trip_id, $user->id);
    }

}
