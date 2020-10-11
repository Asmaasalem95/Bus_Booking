<?php

namespace App\Providers;

use App\Http\Repositories\BusRepository;
use App\Http\Repositories\Contracts\BusRepositoryInterface;
use App\Http\Services\BusService;
use App\Http\Services\Contracts\BusServiceInterface;
use Illuminate\Support\ServiceProvider;

class BusServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BusRepositoryInterface::class,BusRepository::class);
        $this->app->bind(BusServiceInterface::class,BusService::class);
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
