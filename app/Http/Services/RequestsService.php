<?php

namespace App\Http\Services;

use Illuminate\Http\Request;

interface RequestsService
{

    public function checkRequest(Request $request);

    public function createRequest(Request $request);

    public function approveRequest($id);

    public function rejectRequest($id);

    public function getIntakeInterviewFormRequest();

    public function getGuidanceAdmissionSlipRequest();

    public function getGuidanceCallSlipRequest();

    public function getParentQuestionnaireFormRequest();

    public function getReferralFormRequest();

    public function getCumulativeRecordFormRequest();

    public function getClientMonitoringFormRequest();
}
