<?php

namespace App\Http\Services;

use Illuminate\Http\Request;

interface GetFormsService
{
    public function getAllIntakeInterviewForms();

    public function getAllGuidanceAdmissionSlips();

    public function getAllGuidanceCallSlips();

    public function getAllParentQuestionnaireForms();

    public function getAllReferralForms();

    public function getAllCumulativeRecordForms();

    public function getAllClientMonitoringForms();

    public function getMyReferralForms($id);

    public function getMyClientMonitoringForms($id);
}
