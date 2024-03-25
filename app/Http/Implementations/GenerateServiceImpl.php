<?php

namespace App\Http\Implementations;
use Illuminate\Http\Request;
use App\Http\Services\GenerateService;
use PhpOffice\PhpWord\TemplateProcessor;
use \ConvertApi\ConvertApi;
use App\Models\IntakeInterviewForm;
use App\Models\GuidanceAdmissionSlip;
use Illuminate\Support\Facades\Response;


Class GenerateServiceImpl implements GenerateService
{
    public function __construct(){
    }

    public function generateIntInterview($id)
    {
            $intake = IntakeInterviewForm::findOrFail($id);
            $templateProcessor = new TemplateProcessor(public_path('templates\PSHS-00-F-GCU-01-Ver02-Rev0-Intake-Interview-Form.docx'));
            $templateProcessor->setValue('name', $intake->name_of_student);
            $templateProcessor->setValue('nickName', $intake->nickname);
            $templateProcessor->setValue('elementarySchool', $intake->elementary_school_graduated);
            $templateProcessor->setValue('schoolAddress', $intake->school_address);
            $templateProcessor->setValue('age', $intake->age);
            $templateProcessor->setValue('sex', $intake->sex);
            $templateProcessor->setValue('dateOfInterview', date('Y-m-d'));

            $newFilePath = public_path('intake_interview\\' . 'John Vincent Ramada' . '.docx');
            $templateProcessor->saveAs($newFilePath);

            // $docxFilePath = public_path('example.docx');
            ConvertApi::setApiSecret('1MDrmpYzrCkI1g04');
            $result = ConvertApi::convert('pdf', [
                    'File' => $newFilePath,
                ], 'doc'
            );
            $result->saveFiles(public_path('intake_interview\\'. 'John Vincent Ramada' . '.pdf'));

            $headers = [
                'Content-Type' => 'application/pdf',
            ];
            return response()->download(public_path('intake_interview\\' . 'John Vincent Ramada' . '.pdf'));
            
    }

    public function generateGuidAdmission($id)
    {
        $admission = GuidanceAdmissionSlip::findOrFail($id);
        $templateProcessor = new TemplateProcessor(public_path('templates\PSHS-00-F-GCU-05-Ver02-Rev0-Guidance-Admission-Slip.docx'));
        $templateProcessor->setValue('name', $admission->name_of_student);
        $templateProcessor->setValue('grade-section', $admission->grade_and_section);
        $templateProcessor->setValue('name-teacher', $admission->dear);
        $templateProcessor->setValue('date', $admission->last_visited_date);
        $templateProcessor->setValue('time-start', $admission->last_visited_time_start);
        $templateProcessor->setValue('time-end', $admission->last_visited_time_end);
        $templateProcessor->setValue('counselor', $admission->guidance_counselor);
        $templateProcessor->setValue('teacher', $admission->dear);

        $newFilePath = public_path('guidance_admission_slip\\' . 'John Vincent Ramada' . '.docx');
        $templateProcessor->saveAs($newFilePath);

        ConvertApi::setApiSecret('1MDrmpYzrCkI1g04');
        $result = ConvertApi::convert('pdf', [
                'File' => $newFilePath,
            ], 'doc'
        );
        $result->saveFiles(public_path('guidance_admission_slip\\'. 'John Vincent Ramada' . '.pdf'));

        return response()->download(public_path('guidance_admission_slip\\' . 'John Vincent Ramada' . '.pdf'));
    }

    public function generateReferralForm(Request $request)
    {
        $concern = 'Academic';
        $follow_up = 'Yes';
        $behavior1 = 'Check';
        $behavior2 = Null;
        $behavior2_1 = 'Check';
        $behavior3 = 'Check';
        $behavior4 = 'Check';
        $behavior5 = 'Check';
        $behavior6 = 'Check';
        $behavior7 = 'Check';
        $behavior8 = 'Check';
        $behavior9 = 'Check';
        $behavior10 = 'Check';
        $behavior11 = 'Check';
        $behavior12 = 'Check';
        $behavior12_1 = 'example others';

        $templateProcessor = new TemplateProcessor(public_path('templates\PSHS-00-F-GCU-03-Ver02-Rev0-Referral-Form.docx'));
        $templateProcessor->setValue('name', 'John Vincent Ramada');
        $templateProcessor->setValue('grade-section', 'example grade and section');
        $templateProcessor->setValue('date', date('Y-m-d'));

        if($concern == 'Academic')
        {
            $templateProcessor->setValue('concern-academic', '✖️');
        }else
        {
            $templateProcessor->setValue('concern-academic', '');
        }
        if($concern == 'Behavior')
        {
            $templateProcessor->setValue('concern-behavior', '✖️');
        }else
        {
            $templateProcessor->setValue('concern-behavior', '');
        }
        if($concern == 'Personal')
        {
            $templateProcessor->setValue('concern-personal', '✖️');
        }else
        {
            $templateProcessor->setValue('concern-personal', '');
        }

        $templateProcessor->setValue('brief-description', 'example description');
        $templateProcessor->setValue('intervention', 'example intervention');
        
        if($follow_up == 'Yes')
        {
            $templateProcessor->setValue('follow-up-yes', '✔️');
        }else
        {
            $templateProcessor->setValue('follow-up-yes', '');
        }
        if($follow_up == 'No')
        {
            $templateProcessor->setValue('follow-up-no', '✔️');
        }else
        {
            $templateProcessor->setValue('follow-up-no', '');
        }

        $templateProcessor->setValue('reffered-signature', 'example reffered signature');
        $templateProcessor->setValue('reffered-name', 'example reffered name');

        if($behavior1 == 'Check')
        {
            $templateProcessor->setValue('behavior1', '✖️');
        }else
        {
            $templateProcessor->setValue('behavior1', '');
        }
        if($behavior2 == 'Check')
        {
            $templateProcessor->setValue('behavior2', '✖️');
        }else
        {
            $templateProcessor->setValue('behavior2', '');
        }
        if($behavior2_1 == 'Check')
        {
            $templateProcessor->setValue('behavior2.1', '✖️');
        }else
        {
            $templateProcessor->setValue('behavior2.1', '');
        }
        if($behavior3 == 'Check')
        {
            $templateProcessor->setValue('behavior3', '✖️');
        }else
        {
            $templateProcessor->setValue('behavior3', '');
        }
        if($behavior4 == 'Check')
        {
            $templateProcessor->setValue('behavior4', '✖️');
        }else
        {
            $templateProcessor->setValue('behavior4', '');
        }
        if($behavior5 == 'Check')
        {
            $templateProcessor->setValue('behavior5', '✖️');
        }else
        {
            $templateProcessor->setValue('behavior5', '');
        }
        if($behavior6 == 'Check')
        {
            $templateProcessor->setValue('behavior6', '✖️');
        }else
        {
            $templateProcessor->setValue('behavior6', '');
        }
        if($behavior7 == 'Check')
        {
            $templateProcessor->setValue('behavior7', '✖️');
        }else
        {
            $templateProcessor->setValue('behavior7', '');
        }
        if($behavior8 == 'Check')
        {
            $templateProcessor->setValue('behavior8', '✖️');
        }else
        {
            $templateProcessor->setValue('behavior8', '');
        }
        if($behavior9 == 'Check')
        {
            $templateProcessor->setValue('behavior9', '✖️');
        }else
        {
            $templateProcessor->setValue('behavior9', '');
        }
        if($behavior10 == 'Check')
        {
            $templateProcessor->setValue('behavior10', '✖️');
        }else
        {
            $templateProcessor->setValue('behavior10', '');
        }
        if($behavior11 == 'Check')
        {
            $templateProcessor->setValue('behavior11', '✖️');
        }else
        {
            $templateProcessor->setValue('behavior11', '');
        }
        if($behavior12 == 'Check')
        {
            $templateProcessor->setValue('behavior12', '✖️');
        }else
        {
            $templateProcessor->setValue('behavior12', '');
        }
        if($behavior12_1 != null)
        {
            $templateProcessor->setValue('behavior12.1', $behavior12_1);
        }else
        {
            $templateProcessor->setValue('behavior12.1', '');
        }

        $newFilePath = public_path('referral_form\\' . 'John Vincent Ramada' . '.docx');
        $templateProcessor->saveAs($newFilePath);

        ConvertApi::setApiSecret('1MDrmpYzrCkI1g04');
        $result = ConvertApi::convert('pdf', [
                'File' => $newFilePath,
            ], 'doc'
        );
        $result->saveFiles(public_path('referral_form\\'. 'John Vincent Ramada' . '.pdf'));
        
        return response()->json([
            'success' => true,
            'message' => 'Successfully generated referral form',
        ], 201);
    }

    public function generateGuidCallSlip(Request $request)
    {
        $counseling = 'Referral';
        $templateProcessor = new TemplateProcessor(public_path('templates\PSHS-00-F-GCU-04-Ver02-Rev0-Guidance-Call-Slip-1.docx'));
        $templateProcessor->setValue('date', date('Y-m-d'));
        $templateProcessor->setValue('time', date('H:i:s'));

        if($counseling == 'Routine')
        {
            $templateProcessor->setValue('counseling-routine', '✖️');
        }else
        {
            $templateProcessor->setValue('counseling-routine', '');
        }
        if($counseling == 'Referral')
        {
            $templateProcessor->setValue('counseling-referral', '✖️');
        }else
        {
            $templateProcessor->setValue('counseling-referral', '');
        }
        if($counseling == 'Individual')
        {
            $templateProcessor->setValue('counseling-individual', '✖️');
        }else
        {
            $templateProcessor->setValue('counseling-individual', '');
        }
        if($counseling == 'Group')
        {
            $templateProcessor->setValue('counseling-group', '✖️');
        }else
        {
            $templateProcessor->setValue('counseling-group', '');
        }

        $templateProcessor->setValue('student1-name', 'example student 1 name');
        $templateProcessor->setValue('student2-name', 'example student 2 name');
        $templateProcessor->setValue('student3-name', 'example student 3 name');
        $templateProcessor->setValue('student4-name', 'example student 4 name');
        $templateProcessor->setValue('student5-name', 'example student 5 name');
        $templateProcessor->setValue('student1-grade-section', 'example student 1 grade and section');
        $templateProcessor->setValue('student2-grade-section', 'example student 2 grade and section');
        $templateProcessor->setValue('student3-grade-section', 'example student 3 grade and section');
        $templateProcessor->setValue('student4-grade-section', 'example student 4 grade and section');
        $templateProcessor->setValue('student5-grade-section', 'example student 5 grade and section');

        $templateProcessor->setValue('counsel-start', date('H:i:s'));
        $templateProcessor->setValue('counsel-end', date('H:i:s'));

        $templateProcessor->setValue('counselor-name', 'example counselor name');
        $templateProcessor->setValue('teacher-name', 'example teacher name');

        $newFilePath = public_path('guidance_call_slip\\' . 'John Vincent Ramada' . '.docx');
        $templateProcessor->saveAs($newFilePath);

        ConvertApi::setApiSecret('1MDrmpYzrCkI1g04');
        $result = ConvertApi::convert('pdf', [
                'File' => $newFilePath,
            ], 'doc'
        );
        $result->saveFiles(public_path('guidance_call_slip\\'. 'John Vincent Ramada' . '.pdf'));

        return response()->json([
            'success' => true,
            'message' => 'Successfully generated guidance call slip form',
        ], 201);
    }

    public function generateParentQuestionaire(Request $request)
    {
        $templateProcessor = new TemplateProcessor(public_path('templates\PSHS-00-F-GCU-02-Ver02-Rev0-Parent-Questionnaire-Form.docx'));
        
        $Q1 = 'Yes';
        $Q1_parent = 'Mother';
        $Q2 = 'No';
        $Q5 = 'Yes';

        $templateProcessor->setValue('child-name', 'John Vincent Ramada');

        // question 1.1
        if($Q1 == 'Yes')
        {
            $templateProcessor->setValue('1.1yes', '✔️');
        }else
        {
            $templateProcessor->setValue('1.1yes', '');
        }
        if($Q1 == 'No')
        {
            $templateProcessor->setValue('1.1no', '✔️');
        }else
        {
            $templateProcessor->setValue('1.1no', '');
        }
        if($Q1_parent == 'Mother')
        {
            $templateProcessor->setValue('1.1mother-only', '✔️');
        }else
        {
            $templateProcessor->setValue('1.1mother-only', '');
        }
        if($Q1_parent == 'Father')
        {
            $templateProcessor->setValue('1.1father-only', '✔️');
        }else
        {
            $templateProcessor->setValue('1.1father-only', '');
        }
        $templateProcessor->setValue('guardian-name', 'example guardian name');
        $templateProcessor->setValue('guardian-relation', 'example guardian relation');
        $templateProcessor->setValue('stayed-year', 13);

        // question 1.2
        if($Q2 == 'Yes')
        {
            $templateProcessor->setValue('1.2yes', '✔️');
        }else
        {
            $templateProcessor->setValue('1.2yes', '');
        }
        if($Q2 == 'No')
        {
            $templateProcessor->setValue('1.2no', '✔️');
        }else
        {
            $templateProcessor->setValue('1.2no', '');
        }
        $templateProcessor->setValue('duty1', 'example duty 1');
        $templateProcessor->setValue('duty2', 'example duty 2');
        $templateProcessor->setValue('duty3', 'example duty 3');
        $templateProcessor->setValue('duty1-often', 'sometimes');
        $templateProcessor->setValue('duty2-often', 'always');
        $templateProcessor->setValue('duty3-often', 'never');

        // question 1.3
        $templateProcessor->setValue('1.3', 'example answer');

        // question 1.4
        $templateProcessor->setValue('1.4', 'example answer');

        // question 1.5
        if($Q5 == 'Yes')
        {
            $templateProcessor->setValue('1.5yes', '✔️');
        }else
        {
            $templateProcessor->setValue('1.5yes', '');
        }
        if($Q5 == 'No')
        {
            $templateProcessor->setValue('1.5no', '✔️');
        }else
        {
            $templateProcessor->setValue('1.5no', '');
        }
        $templateProcessor->setValue('1.5often', 'example often');

        // file path save
        $newFilePath = public_path('parents_questionaire\\' . 'John Vincent Ramada' . '.docx');
        $templateProcessor->saveAs($newFilePath);
        
        ConvertApi::setApiSecret('1MDrmpYzrCkI1g04');
        $result = ConvertApi::convert('pdf', [
                'File' => $newFilePath,
            ], 'doc'
        );
        $result->saveFiles(public_path('parents_questionaire\\'. 'John Vincent Ramada' . '.pdf'));

        return response()->json([
            'success' => true,
            'message' => 'Successfully generated parents questionaire form',
        ], 201);
    }
}
