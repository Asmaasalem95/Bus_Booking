<?php


namespace App\Http\Services;


use App\Http\Repositories\Contracts\TicketRepositoryInterface;
use App\Http\Services\Contracts\TicketServiceInterface;

class TicketService implements TicketServiceInterface
{

    /**
     * @var TicketRepositoryInterface
     */
    private $repository;

    /**
     * TicketService constructor.
     * @param TicketRepositoryInterface $ticketRepository
     */
    public function __construct(TicketRepositoryInterface $ticketRepository)
    {
        $this->repository = $ticketRepository;
    }

    /**
     * @param $seatId
     * @param $tripId
     * @param $userId
     * @return mixed
     */
    public function bookTicket($seatId, $tripId, $userId)
    {
        return $this->repository->book($seatId, $tripId, $userId);
    }
}
