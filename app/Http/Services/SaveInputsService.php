<?php

namespace App\Http\Services;

use Illuminate\Http\Request;

interface SaveInputsService
{
    public function submitIntakeInterview(Request $request);

    public function submitGuidanceAdmissionSlip(Request $request);

    public function submitGuidanceCallSlip(Request $request);

    public function submitReferralForm(Request $request);
}
