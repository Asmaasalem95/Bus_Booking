<?php

namespace App\Providers;

use App\Http\Repositories\Contracts\SeatRepositoryInterface;
use App\Http\Repositories\SeatRepository;
use App\Http\Services\Contracts\SeatServiceInterface;
use App\Http\Services\SeatService;
use Illuminate\Support\ServiceProvider;

class SeatServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SeatServiceInterface::class,SeatService::class);
        $this->app->bind(SeatRepositoryInterface::class,SeatRepository::class);
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
