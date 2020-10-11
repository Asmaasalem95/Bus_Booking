<?php


namespace App\Http\Services;


use App\Http\Repositories\Contracts\BusRepositoryInterface;
use App\Http\Services\Contracts\BusServiceInterface;

class BusService implements BusServiceInterface
{
    /**
     * @var BusRepositoryInterface
     */
    private $busRepository;

    /**
     * BusService constructor.
     * @param BusRepositoryInterface $busRepository
     */
    public function __construct(BusRepositoryInterface $busRepository)
    {
        $this->busRepository = $busRepository;
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        // TODO: Implement getAll() method.
        return $this->busRepository->getAllWithStation();
    }

}
