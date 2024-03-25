<?php

namespace App\Http\Services;
use Illuminate\Http\Request;

interface GenerateService
{
    public function __construct();

    public function generateIntInterview(Request $request, $intakeId);

    public function generateGuidAdmission(Request $request);

    public function generateReferralForm(Request $request);

    public function generateGuidCallSlip(Request $request);

    public function generateParentQuestionaire(Request $request);
}