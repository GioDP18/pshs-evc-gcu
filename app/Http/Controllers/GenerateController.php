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

    public function generateGuidCallSlip($id)
    {
        return $this->generateService->generateGuidCallSlip($id);
    }

    public function generateParentQuestionaire(Request $request)
    {
        return $this->generateService->generateParentQuestionaire($request);
    }

    public function generateClientMonitoring($id)
    {
        return $this->generateService->generateClientMonitoring($id);
    }
}
