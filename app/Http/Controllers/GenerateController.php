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

    public function generateIntInterview($id)
    {
        return $this->generateService->generateIntInterview($id);
    }   

    public function generateGuidAdmission($id)
    {
        return $this->generateService->generateGuidAdmission($id);
    }

    public function generateReferralForm($id)
    {
        return $this->generateService->generateReferralForm($id);
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
