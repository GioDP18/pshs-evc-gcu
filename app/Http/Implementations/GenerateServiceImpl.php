<?php

namespace App\Http\Implementations;
use Illuminate\Http\Request;
use App\Http\Services\GenerateService;
use App\Models\ClientMonitoringForm;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\Element\Table;
use PhpOffice\PhpWord\Shared\Converter;
use \ConvertApi\ConvertApi;
use App\Models\IntakeInterviewForm;
use App\Models\GuidanceAdmissionSlip;
use App\Models\ReferralForm;
use App\Models\User;
use App\Models\GuidanceCallSlip;

use Illuminate\Support\Facades\Response;


Class GenerateServiceImpl implements GenerateService
{
    public function __construct(){
    }

    public function generateIntInterview($id)
    {
            $intake = IntakeInterviewForm::findOrFail($id);
            $interviewer = User::findOrFail($intake->interviewer);
            $templateProcessor = new TemplateProcessor(public_path('templates\PSHS-00-F-GCU-01-Ver02-Rev0-Intake-Interview-Form.docx'));
            $templateProcessor->setValue('campus', $intake->campus);
            $templateProcessor->setValue('name', $intake->name_of_student);
            $templateProcessor->setValue('nickName', $intake->nickname);
            $templateProcessor->setValue('elementarySchool', $intake->elementary_school_graduated);
            $templateProcessor->setValue('schoolAddress', $intake->school_address);
            $templateProcessor->setValue('age', $intake->age);
            $templateProcessor->setValue('sex', $intake->sex);
            $templateProcessor->setValue('dateOfInterview', date('Y-m-d'));
            $templateProcessor->setValue('interviewed', $interviewer->firstname .' '. $interviewer->lastname);

            $newFilePath = public_path('intake_interview\\' . 'John Vincent Ramada' . '.docx');
            $templateProcessor->saveAs($newFilePath);

            // $docxFilePath = public_path('example.docx');
            $convert = $this->wordToPdf($newFilePath);
            $convert->saveFiles(public_path('intake_interview\\'. 'John Vincent Ramada' . '.pdf'));

            return response()->download(public_path('intake_interview\\' . 'John Vincent Ramada' . '.pdf'));
            
    }

    public function generateGuidAdmission($id)
    {
        $admission = GuidanceAdmissionSlip::findOrFail($id);
        $templateProcessor = new TemplateProcessor(public_path('templates\PSHS-00-F-GCU-05-Ver02-Rev0-Guidance-Admission-Slip.docx'));
        $templateProcessor->setValue('campus', $admission->campus);
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

        $convert = $this->wordToPdf($newFilePath);
        $convert->saveFiles(public_path('guidance_admission_slip\\'. 'John Vincent Ramada' . '.pdf'));

        return response()->download(public_path('guidance_admission_slip\\' . 'John Vincent Ramada' . '.pdf'));
    }

    public function generateReferralForm($id)
    {
        $referral = ReferralForm::with('behavior_spotted')->findOrFail($id);
        $user = User::find($referral->user_id);

        $templateProcessor = new TemplateProcessor(public_path('templates\PSHS-00-F-GCU-03-Ver02-Rev0-Referral-Form.docx'));
        $templateProcessor->setValue('campus', $referral->campus);
        $templateProcessor->setValue('name', $referral->name_of_student);
        $templateProcessor->setValue('grade-section', $referral->grade_and_section);
        $templateProcessor->setValue('date', $referral->date);

        $concernArray = unserialize($referral->concern);

        if (!is_array($concernArray)) {
            return response()->json([
                'success' => false,
                'message' => 'the concern data is not array'
            ]);
        }

        $concerns = ['Academic', 'Behavior', 'Personal'];

        foreach ($concerns as $concern) {
            if (in_array($concern, $concernArray)) {
                $templateProcessor->setValue('concern-' . strtolower($concern), '✖️');
            } else {
                $templateProcessor->setValue('concern-' . strtolower($concern), '');
            }
        }

        $templateProcessor->setValue('brief-description', $referral->brief_description);
        $templateProcessor->setValue('intervention', $referral->intervention_done);
        
        if($referral->follow_up == 1)
        {
            $templateProcessor->setValue('follow-up-yes', '✔️');
        }else
        {
            $templateProcessor->setValue('follow-up-yes', '');
        }
        if($referral->follow_up == 0)
        {
            $templateProcessor->setValue('follow-up-no', '✔️');
        }else
        {
            $templateProcessor->setValue('follow-up-no', '');
        }

        $signaturePath = storage_path('app\\public\\'. $user->signature);
        $templateProcessor->setImageValue('reffered-signature', array('path' => $signaturePath, 'width' => 70, 'height' => 70));
        $templateProcessor->setValue('reffered-name', $user->firstname. ' ' .$user->lastname);

        if($referral->behavior_spotted->b_1 == 1)
        {
            $templateProcessor->setValue('behavior1', '✖️');
        }else
        {
            $templateProcessor->setValue('behavior1', '');
        }
        if($referral->behavior_spotted->b_2 == 1)
        {
            $templateProcessor->setValue('behavior2', '✖️');
        }else
        {
            $templateProcessor->setValue('behavior2', '');
        }
        if($referral->behavior_spotted->b_2 == 1)
        {
            $templateProcessor->setValue('behavior2.1', '✖️');
        }else
        {
            $templateProcessor->setValue('behavior2.1', '');
        }
        if($referral->behavior_spotted->b_3 == 1)
        {
            $templateProcessor->setValue('behavior3', '✖️');
        }else
        {
            $templateProcessor->setValue('behavior3', '');
        }
        if($referral->behavior_spotted->b_4 == 1)
        {
            $templateProcessor->setValue('behavior4', '✖️');
        }else
        {
            $templateProcessor->setValue('behavior4', '');
        }
        if($referral->behavior_spotted->b_5 == 1)
        {
            $templateProcessor->setValue('behavior5', '✖️');
        }else
        {
            $templateProcessor->setValue('behavior5', '');
        }
        if($referral->behavior_spotted->b_6 == 1)
        {
            $templateProcessor->setValue('behavior6', '✖️');
        }else
        {
            $templateProcessor->setValue('behavior6', '');
        }
        if($referral->behavior_spotted->b_7 == 1)
        {
            $templateProcessor->setValue('behavior7', '✖️');
        }else
        {
            $templateProcessor->setValue('behavior7', '');
        }
        if($referral->behavior_spotted->b_8 == 1)
        {
            $templateProcessor->setValue('behavior8', '✖️');
        }else
        {
            $templateProcessor->setValue('behavior8', '');
        }
        if($referral->behavior_spotted->b_9 == 1)
        {
            $templateProcessor->setValue('behavior9', '✖️');
        }else
        {
            $templateProcessor->setValue('behavior9', '');
        }
        if($referral->behavior_spotted->b_10 == 1)
        {
            $templateProcessor->setValue('behavior10', '✖️');
        }else
        {
            $templateProcessor->setValue('behavior10', '');
        }
        if($referral->behavior_spotted->b_11 == 1)
        {
            $templateProcessor->setValue('behavior11', '✖️');
        }else
        {
            $templateProcessor->setValue('behavior11', '');
        }
        if($referral->behavior_spotted->b_12 == 1)
        {
            $templateProcessor->setValue('behavior12', '✖️');
        }else
        {
            $templateProcessor->setValue('behavior12', '');
        }
        if($referral->behavior_spotted->b_13 == 1)
        {
            $templateProcessor->setValue('behavior13', '✖️');
        }else
        {
            $templateProcessor->setValue('behavior13', '');
        }
        $templateProcessor->setValue('behavior13.1', 'example others');
        

        $newFilePath = public_path('referral_form\\' . 'John Vincent Ramada' . '.docx');
        $templateProcessor->saveAs($newFilePath);

        $convert = $this->wordToPdf($newFilePath);
        $convert->saveFiles(public_path('referral_form\\'. 'John Vincent Ramada' . '.pdf'));
        
        return response()->download(public_path('referral_form\\' . 'John Vincent Ramada' . '.pdf'));
    }

    public function generateGuidCallSlip($id)
    {

        $guid_call = GuidanceCallSlip::with('gcspk')->findOrFail($id);
        $templateProcessor = new TemplateProcessor(public_path('templates\PSHS-00-F-GCU-04-Ver02-Rev0-Guidance-Call-Slip-1.docx'));
        $templateProcessor->setValue('campus', ($guid_call->campus != null) ? $guid_call->campus : '');
        $templateProcessor->setValue('date', ($guid_call->date != null) ? $guid_call->date : '');
        $templateProcessor->setValue('time', ($guid_call->time != null) ? $guid_call->time : '');

        if($guid_call->type_of_counseling == 'Routine')
        {
            $templateProcessor->setValue('counseling-routine', '✖️');
        }else
        {
            $templateProcessor->setValue('counseling-routine', '');
        }
        if($guid_call->type_of_counseling == 'Referral')
        {
            $templateProcessor->setValue('counseling-referral', '✖️');
        }else
        {
            $templateProcessor->setValue('counseling-referral', '');
        }
        if($guid_call->type_of_counseling == 'Individual')
        {
            $templateProcessor->setValue('counseling-individual', '✖️');
        }else
        {
            $templateProcessor->setValue('counseling-individual', '');
        }
        if($guid_call->type_of_counseling == 'Group')
        {
            $templateProcessor->setValue('counseling-group', '✖️');
        }else
        {
            $templateProcessor->setValue('counseling-group', '');
        }

        $templateProcessor->setValue('student1-name', ($guid_call->gcspk->s1 != null) ? $guid_call->gcspk->s1 : '');
        $templateProcessor->setValue('student2-name', ($guid_call->gcspk->s2 != null) ? $guid_call->gcspk->s2 : '');
        $templateProcessor->setValue('student3-name', ($guid_call->gcspk->s3 != null) ? $guid_call->gcspk->s3 : '');
        $templateProcessor->setValue('student4-name', ($guid_call->gcspk->s4 != null) ? $guid_call->gcspk->s4 : '');
        $templateProcessor->setValue('student5-name', ($guid_call->gcspk->s5 != null) ? $guid_call->gcspk->s5 : '');
        $templateProcessor->setValue('student1-grade-section', ($guid_call->gcspk->gs1 != null) ? $guid_call->gcspk->gs1 : '');
        $templateProcessor->setValue('student2-grade-section', ($guid_call->gcspk->gs2 != null) ? $guid_call->gcspk->gs2 : '');
        $templateProcessor->setValue('student3-grade-section', ($guid_call->gcspk->gs3 != null) ? $guid_call->gcspk->gs3 : '');
        $templateProcessor->setValue('student4-grade-section', ($guid_call->gcspk->gs4 != null) ? $guid_call->gcspk->gs4 : '');
        $templateProcessor->setValue('student5-grade-section', ($guid_call->gcspk->gs5 != null) ? $guid_call->gcspk->gs5 : '');

        $templateProcessor->setValue('counsel-start', $guid_call->counseling_time_start);
        $templateProcessor->setValue('counsel-end', $guid_call->counseling_time_end);

        $templateProcessor->setValue('counselor-name', $guid_call->guidance_counselor);
        $templateProcessor->setValue('teacher-name', $guid_call->teacher_in_charge);

        $newFilePath = public_path('guidance_call_slip\\' . 'John Vincent Ramada' . '.docx');
        $templateProcessor->saveAs($newFilePath);

        $convert = $this->wordToPdf($newFilePath);
        $convert->saveFiles(public_path('guidance_call_slip\\'. 'John Vincent Ramada' . '.pdf'));

        return response()->download(public_path('guidance_call_slip\\' . 'John Vincent Ramada' . '.pdf'));
    }

    public function generateParentQuestionaire(Request $request)
    {
        $templateProcessor = new TemplateProcessor(public_path('templates\PSHS-00-F-GCU-02-Ver02-Rev0-Parent-Questionnaire-Form.docx'));
        
        $Q1 = 'Yes';
        $Q1_parent = 'Mother';
        $Q2 = 'No';
        $Q5 = 'Yes';
        $Q6_father = 'Yes';
        $Q6_mother = 'No';
        $Q7 = 'Yes';
        $Q8 = 'Normal';
        $Q9 = 'Premature';
        $Q10 = 'Yes';
        $Q11 = 'No';
        $Q12 = 'Yes';
        $Q13 = 'Yes';
        $Q14 = 'No';
        $Q15 = 'Performing at full capacity';
        $Q16 = 'Average Popularity';
        $Q17 = 'Yes';
        $Q18 = 'Yes';
        $Q19 = 'Family Residence';
        $Q20 = 'No';
        $Q21 = 'Public Transportation';
        $Q22 = 'Monthly';
        $Q23 = 'Yes';

        $templateProcessor->setValue('child-name', 'John Vincent Ramada');

        // question 1.1
        $templateProcessor->setValue('1.1yes', ($Q1 == 'Yes') ? '✔️' : '');
        $templateProcessor->setValue('1.1no', ($Q1 == 'No') ? '✔️' : '');
        $templateProcessor->setValue('1.1mother-only', ($Q1_parent == 'Mother') ? '✔️' : '');
        $templateProcessor->setValue('1.1father-only', ($Q1_parent == 'Father') ? '✔️' : '');
        
        $templateProcessor->setValue('guardian-name', 'example guardian name');
        $templateProcessor->setValue('guardian-relation', 'example guardian relation');
        $templateProcessor->setValue('stayed-year', 13);

        // question 1.2
        $templateProcessor->setValue('1.2yes', ($Q2 == 'Yes') ? '✔️' : '');
        $templateProcessor->setValue('1.2no', ($Q2 == 'No') ? '✔️' : '');
    
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
        $templateProcessor->setValue('1.5yes', ($Q5 == 'Yes') ? '✔️' : '');
        $templateProcessor->setValue('1.5no', ($Q5 == 'No') ? '✔️' : '');
        $templateProcessor->setValue('1.5often', 'example often');

        // question 2.1
        $templateProcessor->setValue('2.1yes-father', ($Q6_father == 'Yes') ? '✔️' : '');
        $templateProcessor->setValue('2.1no-father', ($Q6_father == 'No') ? '✔️' : '');
        $templateProcessor->setValue('2.1yes-mother', ($Q6_mother == 'Yes') ? '✔️' : '');
        $templateProcessor->setValue('2.1no-mother', ($Q6_mother == 'No') ? '✔️' : '');

        // question 2.2
        $templateProcessor->setValue('2.2yes', ($Q7 == 'Yes') ? '✔️' : '');
        $templateProcessor->setValue('2.2no', ($Q7 == 'No') ? '✔️' : '');
        $templateProcessor->setValue('family-member-disease', 'example family member disease');

        // question 2.3
        $templateProcessor->setValue('2.3normal', ($Q8 == 'Normal') ? '✔️': '');
        $templateProcessor->setValue('2.difficult', ($Q8 == 'Difficult') ? '✔️': '');

        // question 2.4
        $templateProcessor->setValue('2.4premature', ($Q9 == 'Premature') ? '✔️': '');
        $templateProcessor->setValue('2.4caesarian', ($Q9 == 'Caesarian') ? '✔️': '');
        $templateProcessor->setValue('2.4overdue', ($Q9 == 'Overdue') ? '✔️': '');
        $templateProcessor->setValue('2.4induced', ($Q9 == 'Induced') ? '✔️': '');
        $templateProcessor->setValue('2.4normal', ($Q9 == 'Normal') ? '✔️': '');

        // question 2.5
        $templateProcessor->setValue('2.5yes', ($Q10 == 'Yes') ? '✔️': '');
        $templateProcessor->setValue('2.5no', ($Q10 == 'No') ? '✔️': '');

        // question 2.6
        $templateProcessor->setValue('2.6yes', ($Q11 == 'Yes') ? '✔️': '');
        $templateProcessor->setValue('2.6no', ($Q11 == 'No') ? '✔️': '');

        // question 2.7
        $templateProcessor->setValue('2.7yes', ($Q12 == 'Yes') ? '✔️': '');
        $templateProcessor->setValue('2.7no', ($Q12 == 'No') ? '✔️': '');

        // question 2.8
        $templateProcessor->setValue('child-sleeping-hrs', ' example child sleeping hours');
        
        // question 2.9
        $templateProcessor->setValue('2.9yes', ($Q13 == 'Yes') ? '✔️': '');
        $templateProcessor->setValue('2.9no', ($Q13 == 'No') ? '✔️': '');

        // table impaired
        $templateProcessor->setValue('physical-specific', 'example physical');
        $templateProcessor->setValue('physical-diagnose-undiagnosed', 'example physical diagnostic');
        $templateProcessor->setValue('learning-specific', 'example learning');
        $templateProcessor->setValue('learning-diagnose-undiagnosed', 'example learning diagnostic');
        $templateProcessor->setValue('mental-specific', 'example mental');
        $templateProcessor->setValue('mental-diagnose-undiagnosed', 'example mental diagnostic');
        $templateProcessor->setValue('autism-specific', 'example autism');
        $templateProcessor->setValue('autism-diagnose-undiagnosed', 'example autism diagnostic');
        $templateProcessor->setValue('other-specific', 'example other');
        $templateProcessor->setValue('other-diagnose-undiagnosed', 'example other diagnostic');

        // question 3.1
        $templateProcessor->setValue('3.1yes', ($Q14 == 'Yes') ? '✔️': '');
        $templateProcessor->setValue('3.1no', ($Q14 == 'No') ? '✔️': '');

        // question 3.2
        $templateProcessor->setValue('3.2year', 'example year');
        $templateProcessor->setValue('3.2month', 'example month');

        // question 3.3
        $templateProcessor->setValue('3.3', 'example answer');

        // question 3.4
        $templateProcessor->setValue('3.4', 'example answer');
        
        // question 3.5
        $templateProcessor->setValue('3.5', 'example answer');

        // question 3.6
        $templateProcessor->setValue('3.6', 'example answer');

        // question 3.7
        $templateProcessor->setValue('3.7', 'example answer');

        // question 3.8
        $templateProcessor->setValue('3.8overachieving', ($Q15 == 'Overachieving') ? '✔️': '');
        $templateProcessor->setValue('3.8satisfactory', ($Q15 == 'Satisfactory') ? '✔️': '');
        $templateProcessor->setValue('3.8per-full-capacity', ($Q15 == 'Performing at full capacity') ? '✔️': '');
        $templateProcessor->setValue('3.8underachieving', ($Q15 == 'Underachieving') ? '✔️': '');

        // question 3.9
        $templateProcessor->setValue('3.9very-popular', ($Q16 == 'Very Popular') ? '✔️': '');
        $templateProcessor->setValue('3.9average-popularity', ($Q16 == 'Average Popularity') ? '✔️': '');
        $templateProcessor->setValue('3.9likes-be-popular', ($Q16 == 'Likes to be popular') ? '✔️': '');
        $templateProcessor->setValue('3.9hardly-noticed', ($Q16 == 'Hardly Noticed') ? '✔️': '');
        $templateProcessor->setValue('3.9aloof', ($Q16 == 'Aloof') ? '✔️': '');

        // question 3.10
        $templateProcessor->setValue('3.10yes', ($Q17 == 'Yes') ? '✔️': '');
        $templateProcessor->setValue('3.10no', ($Q17 == 'No') ? '✔️': '');
        $templateProcessor->setValue('3.10specify', 'example specified');

        // question 3.11
        $templateProcessor->setValue('3.11yes', ($Q18 == 'Yes') ? '✔️': '');
        $templateProcessor->setValue('3.11no', ($Q18 == 'No') ? '✔️': '');
        $templateProcessor->setValue('3.11specify', 'example specified');

        // question 4.1
        $templateProcessor->setValue('4.1family-residence', ($Q19 == 'Family Residence') ? '✔️': '');
        $templateProcessor->setValue('4.1guardian-home', ($Q19 == 'Guardian’s Home') ? '✔️': '');
        $templateProcessor->setValue('4.1school-dormitory', ($Q19 == 'School Dormitory') ? '✔️': '');
        $templateProcessor->setValue('4.1other', ($Q19 == 'Others') ? '✔️': '');
        $templateProcessor->setValue('4.1other-input', 'example other input');

        //question 4.2
        $templateProcessor->setValue('4.2.1yes', ($Q20 == 'Yes') ? '✔️': '');
        $templateProcessor->setValue('4.2.1no', ($Q20 == 'No') ? '✔️': '');
        $templateProcessor->setValue('name-PSHS', 'example name PSHS');
        $templateProcessor->setValue('address-PSHS', 'example address PSHS');
        $templateProcessor->setValue('contact-no', 'example contact number');
        $templateProcessor->setValue('4.2.2often', 'example often');

        //question 4.3
        $templateProcessor->setValue('4.3public-transportation', ($Q21 == 'Public Transportation') ? '✔️': '');
        $templateProcessor->setValue('4.3carpool', ($Q21 == ' Carpool') ? '✔️': '');
        $templateProcessor->setValue('4.3owned-vehicle', ($Q21 == 'Family-Owned Vehicle') ? '✔️': '');

        //question 5.1
        $templateProcessor->setValue('5.1allowance', 'example allowance');

        //question 5.2
        $templateProcessor->setValue('5.2daily', ($Q22 == 'Daily') ? '✔️': '');
        $templateProcessor->setValue('5.2weekly', ($Q22 == ' Weekly') ? '✔️': '');
        $templateProcessor->setValue('5.2monthly', ($Q22 == 'Monthly') ? '✔️': '');
        $templateProcessor->setValue('5.2stipend', ($Q22 == 'Through the Stipend') ? '✔️': '');

        //question 5.3
        $templateProcessor->setValue('5.3yes', ($Q23 == 'Yes') ? '✔️': '');
        $templateProcessor->setValue('5.3no', ($Q23 == 'No') ? '✔️': '');

        //question 5.4 
        $templateProcessor->setValue('5.4', 'example answer');

        //question 5.5
        $templateProcessor->setValue('5.5', 'example answer');

        //parents info
        $templateProcessor->setValue('name-father', 'example answer');
        $templateProcessor->setValue('contact-father', 'example answer');
        $templateProcessor->setValue('email-father', 'example answer');
        $templateProcessor->setValue('signature-father', 'example answer');
        $templateProcessor->setValue('name-mother', 'example answer');
        $templateProcessor->setValue('contact-mother', 'example answer');
        $templateProcessor->setValue('email-mother', 'example answer');
        $templateProcessor->setValue('signature-mother', 'example answer');

        //guardian ifno
        $templateProcessor->setValue('name-guardian', 'example answer');
        $templateProcessor->setValue('contact-guardian', 'example answer');
        $templateProcessor->setValue('email-guardian', 'example answer');
        $templateProcessor->setValue('home-guardian', 'example answer');
        $templateProcessor->setValue('relationship-guardian', 'example answer');

        // file path save
        $newFilePath = public_path('parents_questionaire\\' . 'John Vincent Ramada' . '.docx');
        $templateProcessor->saveAs($newFilePath);
        
        $convert = $this->wordToPdf($newFilePath);
        $convert->saveFiles(public_path('parents_questionaire\\'. 'John Vincent Ramada' . '.pdf'));

        return response()->json([
            'success' => true,
            'message' => 'Successfully generated parents questionaire form',
        ], 201);
    }

    public function generateClientMonitoring($id)
    {
        $user = ClientMonitoringForm::with(['user','concern'])->findOrFail($id);
        
        $templateProcessor = new TemplateProcessor(public_path('templates\PSHS-00-F-GCU-07-Ver02-Rev1-Client-Monitoring-Form.docx'));
        $templateProcessor->setValue('name', $user->user->firstname .' '. $user->lastname);
        $templateProcessor->setValue('grade-section', $user->user->grade_level .'-'. $user->user->section);
        $templateProcessor->setValue('adviser', $user->adviser);
        $templateProcessor->setValue('campus', $user->campus);
        
        $headerData = [
            ['date', 'Areas of Concern', 'Signature', 'Action Taken', 'Recommendation'],
        ];
        $tableData = [];
        foreach ($user->concern as $concern) {
            $tableData[] = [
                $concern->date,
                $concern->area_of_concern,
                $user->user->signature,
                $concern->action_taken,
                $concern->recommendation,
            ];
        }

        $this->tableClientMonitoring($templateProcessor, $headerData, $tableData);

        $newFilePath = public_path('client_monitoring\\' . 'John Vincent Ramada' . '.docx');
        $templateProcessor->saveAs($newFilePath);

        $convert = $this->wordToPdf($newFilePath);
        $convert->saveFiles(public_path('client_monitoring\\'. 'John Vincent Ramada' . '.pdf'));

        return response()->download(public_path('client_monitoring\\' . 'John Vincent Ramada' . '.pdf'));
    }

    private function tableClientMonitoring(TemplateProcessor $templateProcessor, array $headerData, array $data)
    {
        $table = new Table();
        
        $columnWidths = [
            Converter::cmToTwip(2), 
            Converter::cmToTwip(7), 
            Converter::cmToTwip(3),
            Converter::cmToTwip(3), 
            Converter::cmToTwip(4) 
        ];
        // Add header row
        $headerRow = $table->addRow();
        foreach ($headerData[0] as $headerCellData) {
            $cell = $headerRow->addCell();
            $cell->getStyle()->setBorderTopSize(8);
            $cell->getStyle()->setBorderLeftSize(8);
            $cell->getStyle()->setBorderRightSize(8);
            $cell->getStyle()->setBorderBottomSize(8);
            $cell->addText(
                $headerCellData,
                ['bold' => true],
                [
                    'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER,
                    'spaceAfter' => 0,
                ]
            );
        }

        $maxRows = 30;
        $numRows = count($data);

        for ($i = 1; $i <= $maxRows; $i++) {
            $rowData = ($i <= $numRows) ? $data[$i - 1] : array_fill(0, count($columnWidths), '');
            $dataRow = $table->addRow();
            
            foreach ($rowData as $cellIndex => $cellData) {
                $cell = $dataRow->addCell($columnWidths[$cellIndex], ['align' => 'center']);
                $cell->getStyle()->setBorderTopSize(8);
                $cell->getStyle()->setBorderLeftSize(8);
                $cell->getStyle()->setBorderRightSize(8);
                $cell->getStyle()->setBorderBottomSize(8);
                
                $cell->addText(
                    $cellData,
                    ['size' => 9],
                    [
                        'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER,
                        'spaceAfter' => 0,
                    ]
                );
            }
        }

        $templateProcessor->setComplexBlock('table', $table);
    }

    private function wordToPdf($newFilePath)
    {
        ConvertApi::setApiSecret('1MDrmpYzrCkI1g04');
        $result = ConvertApi::convert('pdf', [
                'File' => $newFilePath,
            ], 'doc'
        );

        return $result;
    }
}
