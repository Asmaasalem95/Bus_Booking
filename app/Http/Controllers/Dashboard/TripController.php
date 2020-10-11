<?php

namespace App\Http\Controllers;

use App\Http\Services\Contracts\TripServiceInterface;
use Illuminate\Http\Request;

class TripController extends Controller
{

    /**
     * @var TripServiceInterface
     */
    private $tripService;

    public function __construct(TripServiceInterface $tripService)
    {
        $this->tripService = $tripService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
       $trips = $this->tripService->getAll();

        return view('dashboard.trips.index', compact('trips'));
    }
}
