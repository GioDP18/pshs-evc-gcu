<?php

namespace App\Http\Services;
use Illuminate\Http\Request;

interface GenerateService
{
    public function __construct();

    public function generateIntInterview($id);

    public function generateGuidAdmission($id);

    public function generateReferralForm($id);

    public function generateGuidCallSlip($id);

    public function generateParentQuestionaire(Request $request);

    public function generateClientMonitoring($id);
}