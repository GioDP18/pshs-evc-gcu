<?php

namespace App\Http\Controllers;

use App\Http\Services\GetFormsService;
use Illuminate\Http\Request;

class GetFormsController extends Controller
{
    public function __construct(public GetFormsService $getFormsService){

    }

    public function getAllIntakeInterviewForms(){
        return $this->getFormsService->getAllIntakeInterviewForms();
    }

    public function getAllGuidanceAdmissionSlips(){
        return $this->getFormsService->getAllGuidanceAdmissionSlips();
    }

    public function getAllGuidanceCallSlips(){
        return $this->getFormsService->getAllGuidanceCallSlips();
    }
}
