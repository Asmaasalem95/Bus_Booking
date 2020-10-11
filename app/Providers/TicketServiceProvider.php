<?php

namespace App\Providers;

use App\Http\Repositories\Contracts\TicketRepositoryInterface;
use App\Http\Repositories\TicketRepository;
use App\Http\Services\Contracts\TicketServiceInterface;
use App\Http\Services\TicketService;
use Illuminate\Support\ServiceProvider;

class TicketServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TicketRepositoryInterface::class,TicketRepository::class);
        $this->app->bind(TicketServiceInterface::class,TicketService::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
