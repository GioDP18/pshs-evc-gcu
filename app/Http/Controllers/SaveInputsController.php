<?php

namespace App\Http\Controllers;

use App\Http\Services\SaveInputsService;
use Illuminate\Http\Request;

class SaveInputsController extends Controller
{
    public function __construct(public SaveInputsService $saveInputsService){

    }

    public function submitIntakeInterview(Request $request){
        return $this->saveInputsService->submitIntakeInterview($request);
    }

    public function submitGuidanceAdmissionSlip(Request $request){
        return $this->saveInputsService->submitGuidanceAdmissionSlip($request);
    }

    public function submitGuidanceCallSlip(Request $request){
        return $this->saveInputsService->submitGuidanceCallSlip($request);
    }

    // Parent Here

    public function submitReferralForm(Request $request){
        return $this->saveInputsService->submitReferralForm($request);
    }

    // Cumulative here

    public function submitClientMonitoringForm(Request $request){
        return $this->saveInputsService->submitClientMonitoringForm($request);
    }

    public function updateClientMonitoringForm(Request $request){
        return $this->saveInputsService->updateClientMonitoringForm($request);
    }
}
