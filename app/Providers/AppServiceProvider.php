<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;

use App\Http\Implementations\AuthServiceImpl;
use App\Http\Implementations\CallendarServiceImpl;
use App\Http\Services\AuthService;
use App\Http\Services\CallendarService;

class AppServiceProvider extends ServiceProvider
{
    public $bindings = [
        AuthService::class => AuthServiceImpl::class,
        CallendarService::class => CallendarServiceImpl::class
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
