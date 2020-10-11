<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Services\Contracts\BusServiceInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BusController extends Controller
{
    /**
     * @var BusServiceInterface
     */
    private $busService;

    /**
     * BusController constructor.
     * @param BusServiceInterface $busService
     */
    public function __construct(BusServiceInterface $busService)
    {
        $this->busService = $busService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function Index()
    {
        $buses = $this->busService->getAll();

        return view('dashboard.buses.index', compact('buses'));

    }


}
