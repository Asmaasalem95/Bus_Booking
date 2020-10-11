<?php


namespace App\Http\Repositories;


use App\Http\Repositories\Contracts\BusRepositoryInterface;
use App\Models\Bus;

class BusRepository implements  BusRepositoryInterface
{

    /**
     * @var Bus
     */
    private $busModel;

    /**
     * BusRepository constructor.
     * @param Bus $bus
     */
    public function __construct(Bus $bus)
    {
        $this->busModel = $bus;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|mixed
     */
    public function getAllWithStation()
    {
        // TODO: Implement getAllWithStation() method.

        return $this->busModel->with('stations')->get();
    }
}
