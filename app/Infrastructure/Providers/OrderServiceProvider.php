<?php

namespace App\Infrastructure\Providers;

use App\Domain\Contracts\OrderRepositoryInterface;
use App\Infrastructure\Persistence\Eloquent\Order\EloquentOrderRepository;
use Illuminate\Support\ServiceProvider;

class OrderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(OrderRepositoryInterface::class, EloquentOrderRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
