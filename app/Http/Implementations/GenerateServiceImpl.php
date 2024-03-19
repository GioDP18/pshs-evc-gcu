<?php

namespace App\Http\Implementations;
use Illuminate\Http\Request;
use App\Http\Services\GenerateService;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\PhpWord;
use Barryvdh\DomPDF\Facade\Pdf;

Class GenerateServiceImpl implements GenerateService
{
    public function __construct(){
    }
    
    public function generateIntInterview(Request $request)
    {
        $templateProcessor = new TemplateProcessor(public_path('templates\PSHS-00-F-GCU-01-Ver02-Rev0-Intake-Interview-Form.docx'));
        $templateProcessor->setValue('name', 'John Vincent Ramada');
        $templateProcessor->setValue('nickName', 'Vincent');
        $templateProcessor->setValue('elementarySchool', 'trySchool');
        $templateProcessor->setValue('schoolAddress', 'trySchoolAddress');
        $templateProcessor->setValue('age', '22');
        $templateProcessor->setValue('sex', 'Male');
        $templateProcessor->setValue('dateOfInterview', 'tryDate');

        $newFilePath = public_path('intake_interview\\' . 'John Vincent Ramada' . '.docx');
        $templateProcessor->saveAs($newFilePath);

        return $newFilePath;
    }

    public function generateGuidAdmission(Request $request)
    {
        $templateProcessor = new TemplateProcessor(public_path('templates\PSHS-00-F-GCU-05-Ver02-Rev0-Guidance-Admission-Slip.docx'));
        $templateProcessor->setValue('name', 'John Vincent Ramada');
        $templateProcessor->setValue('grade-section', 'example grade and section');
        $templateProcessor->setValue('name-teacher', 'example teacher name');
        $templateProcessor->setValue('date', date('Y-m-d'));
        $templateProcessor->setValue('time-start', date('H:i:s'));
        $templateProcessor->setValue('time-end', date('H:i:s'));
        $templateProcessor->setValue('counselor', 'example counselor name');
        $templateProcessor->setValue('teacher', 'example teacher name');

        $newFilePath = public_path('guidance_admission_slip\\' . 'John Vincent Ramada' . '.docx');
        $templateProcessor->saveAs($newFilePath);

        return $newFilePath;
    }

    public function generateReferralForm(Request $request)
    {

        $data = [
            'title' => 'hello world',
            'date' => date('m/d/Y'),
        ];

        $pdf = PDF::loadView('templates.referral_form', $data);
        $newFilePath = public_path('referral_form\\' . 'John Vincent Ramada' . '.pdf');
        $pdf->save($newFilePath);
        
        return response()->json([
            'success' => true,
            'message' => 'Successfully generated referral form',
        ], 201);
    }
}
