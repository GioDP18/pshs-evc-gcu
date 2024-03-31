<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Http\Implementations\AssignmentServiceImpl;
use App\Http\Implementations\AuthServiceImpl;
use App\Http\Implementations\CalendarServiceImpl;
use App\Http\Implementations\EventServiceImpl;
use App\Http\Implementations\GenerateServiceImpl;
use App\Http\Implementations\GetFormsServiceImpl;
use App\Http\Implementations\RequestsServiceImpl;
use App\Http\Implementations\SaveInputsServiceImpl;
use App\Http\Implementations\EmailVerificationServiceImpl;
use App\Http\Services\AssignmentService;
use App\Http\Services\AuthService;
use App\Http\Services\CalendarService;
use App\Http\Services\EventService;
use App\Http\Services\GenerateService;
use App\Http\Services\GetFormsService;
use App\Http\Services\RequestsService;
use App\Http\Services\SaveInputsService;
use App\Http\Services\EmailVerificationService;

class AppServiceProvider extends ServiceProvider
{
    public $bindings = [
        AuthService::class => AuthServiceImpl::class,
        CalendarService::class => CalendarServiceImpl::class,
        GenerateService::class => GenerateServiceImpl::class,
        SaveInputsService::class => SaveInputsServiceImpl::class,
        RequestsService::class => RequestsServiceImpl::class,
        GetFormsService::class => GetFormsServiceImpl::class,
        AssignmentService::class => AssignmentServiceImpl::class,
        EventService::class => EventServiceImpl::class,
        EmailVerificationService::class => EmailVerificationServiceImpl::class,
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
