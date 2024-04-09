<?php

namespace App\Http\Services;

use Illuminate\Http\Request;

interface SaveInputsService
{
    public function submitIntakeInterview(Request $request);

    public function submitGuidanceAdmissionSlip(Request $request);

    public function submitGuidanceCallSlip(Request $request);

    // Parent

    public function submitReferralForm(Request $request);

    // Cumulative

    public function submitClientMonitoringForm(Request $request);

    public function updateClientMonitoringForm(Request $request);
}
