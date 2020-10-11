<?php

namespace App\Providers;

use App\Http\Repositories\Contracts\TripRepositoryInterface;
use App\Http\Repositories\TripRepository;
use App\Http\Services\Contracts\TripServiceInterface;
use App\Http\Services\TripService;
use Illuminate\Support\ServiceProvider;

class TripServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(TripRepositoryInterface::class,TripRepository::class);
        $this->app->bind(TripServiceInterface::class,TripService::class);
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
