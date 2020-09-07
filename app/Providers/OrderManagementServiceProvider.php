<?php

namespace App\Providers;

use App\Services\OrderManagementService;
use Illuminate\Support\ServiceProvider;

class OrderManagementServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(OrderManagementService::class,function($app){
            return new OrderManagementService();
        });
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
