<?php

namespace App\Http\Services;
use Illuminate\Http\Request;

interface GenerateService
{
    public function __construct();

    public function generateIntInterview(Request $request);

    public function generateGuidAdmission(Request $request);
}