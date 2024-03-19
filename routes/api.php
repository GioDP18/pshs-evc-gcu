<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CallendarController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group([
    'middleware' => 'api',
    'prefix' => 'v1'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);

    // Social login
    Route::get('/auth/{provider}/callback', [AuthController::class, 'socialLoginCallback'])->name('auth.callback');
    Route::get('/auth/{provider}', [AuthController::class, 'socialLogin']);

    // Callendar Schedule
    Route::get('/get-schedule/{date}', [CallendarController::class, 'getSchedule']);
    Route::post('/update-schedule', [CallendarController::class, 'updateSchedule']);

});
