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

    public function getAllParentQuestionnaireForms(){
        return $this->getFormsService->getAllParentQuestionnaireForms();
    }

    public function getAllReferralForms(){
        return $this->getFormsService->getAllReferralForms();
    }

    public function getAllCumulativeRecordForms(){
        return $this->getFormsService->getAllCumulativeRecordForms();
    }

    public function getAllClientMonitoringForms(){
        return $this->getFormsService->getAllClientMonitoringForms();
    }


    public function getMyReferralForms($id){
        return $this->getFormsService->getMyReferralForms($id);
    }

    public function getMyClientMonitoringForms($id){
        return $this->getFormsService->getMyClientMonitoringForms($id);
    }
}
