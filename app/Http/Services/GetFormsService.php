<?php

namespace App\Http\Services;

use Illuminate\Http\Request;

interface GetFormsService
{
    public function getAllIntakeInterviewForms();

    public function getAllGuidanceAdmissionSlips();

    public function getAllGuidanceCallSlips();
}
