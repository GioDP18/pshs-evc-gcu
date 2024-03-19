<?php

namespace App\Providers;

use App\Http\Implementations\AuthServiceImpl;
use App\Http\Implementations\GenerateServiceImpl;
use App\Http\Services\AuthService;
use App\Http\Services\GenerateService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public $bindings = [
        AuthService::class => AuthServiceImpl::class,
        GenerateService::class => GenerateServiceImpl::class,
    ];
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
