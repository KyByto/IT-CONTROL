<?php

namespace App\Providers;

use App\Repositories\Contracts\HotelRepositoryInterface;
use App\Repositories\Contracts\ReservationRepositoryInterface;
use App\Repositories;
use App\Repositories\Eloquent\HotelRepository;
use App\Repositories\Eloquent\ReservationRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(HotelRepositoryInterface::class, HotelRepository::class);
        $this->app->bind(ReservationRepositoryInterface::class, ReservationRepository::class);
    }
}
