<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Services\Interfaces;
use App\Services\Production;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register Services
     * @var array
     */
    protected $services = [
        Interfaces\TagServiceInterface::class => Production\TagService::class,
        Interfaces\CategoryServiceInterface::class => Production\CategoryService::class,
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->services as $inteface => $service) {
            $this->app->singleton($inteface, $service);
        }
    }
}
