<?php
namespace App\Http\Controllers;

use App\Http\Services\GenerateService;
use Illuminate\Http\Request;
use Validator;

class GenerateController extends Controller
{
    public function __construct(public GenerateService $generateService)
    {

    }

    public function generateIntInterview(Request $request, $intakeId)
    {
        return $this->generateService->generateIntInterview($request, $intakeId);
    }   

    public function generateGuidAdmission(Request $request)
    {
        return $this->generateService->generateGuidAdmission($request);
    }

    public function generateReferralForm(Request $request)
    {
        return $this->generateService->generateReferralForm($request);
    }

    public function generateGuidCallSlip(Request $request)
    {
        return $this->generateService->generateGuidCallSlip($request);
    }

    public function generateParentQuestionaire(Request $request)
    {
        return $this->generateService->generateParentQuestionaire($request);
    }
}
