<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GenerateController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\GetFormsController;
use App\Http\Controllers\RequestsController;
use App\Http\Controllers\SaveInputsController;

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
    Route::get('/oauth/{provider}', [AuthController::class, 'socialLogin']);
    Route::get('/auth/{provider}/callback', [AuthController::class, 'socialLoginCallback'])->name('auth.callback');
    // Route::get('/auth/{provider}', [AuthController::class, 'socialLogin']);

    // Generate File
    Route::get('/generate-intake-interview/{id}', [GenerateController::class, 'generateIntInterview']);
    Route::get('/generate-guidance-admission/{id}', [GenerateController::class, 'generateGuidAdmission']);
    Route::get('/generate-referral-form', [GenerateController::class, 'generateReferralForm']);
    Route::get('/generate-guidance-call', [GenerateController::class, 'generateGuidCallSlip']);
    Route::get('/generate-parent-questionaire', [GenerateController::class, 'generateParentQuestionaire']);
    Route::get('/auth/{provider}/callback', [AuthController::class, 'socialLoginCallback'])->name('auth.callback');
    Route::get('/auth/{provider}', [AuthController::class, 'socialLogin']);

    // Callendar Schedule
    Route::get('/get-schedule/{date}', [CalendarController::class, 'getSchedule']);
    Route::post('/update-schedule', [CalendarController::class, 'updateSchedule']);
    Route::get('/get-available-time-today', [CalendarController::class, 'getAvailableTimeToday']);
    Route::post('/reserve-consultation', [CalendarController::class, 'reserveConsultation']);
    Route::get('/get-appointments-today', [CalendarController::class, 'getAppointmentsToday']);

    // Request Forms
    Route::post('/request-form', [RequestsController::class, 'createRequest']);

    // Get All Forms
    Route::get('/get-all-intake-interview-forms', [GetFormsController::class, 'getAllIntakeInterviewForms']);
    Route::get('/get-all-guidance-admission-slips', [GetFormsController::class, 'getAllGuidanceAdmissionSlips']);

    // Submit Forms
    Route::post('/submit-intake-interview', [SaveInputsController::class, 'submitIntakeInterview']);
    Route::post('/submit-guidance-admission-slip', [SaveInputsController::class, 'submitGuidanceAdmissionSlip']);
    Route::post('/submit-referral-form', [SaveInputsController::class, 'submitReferralForm']);


});


