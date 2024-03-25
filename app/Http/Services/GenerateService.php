<?php

namespace App\Http\Services;
use Illuminate\Http\Request;

interface GenerateService
{
    public function __construct();

    public function generateIntInterview($id);

    public function generateGuidAdmission($id);

    public function generateReferralForm(Request $request);

    public function generateGuidCallSlip(Request $request);

    public function generateParentQuestionaire(Request $request);
}