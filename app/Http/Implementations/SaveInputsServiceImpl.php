<?php

namespace App\Http\Implementations;


use App\Http\Services\SaveInputsService;
use App\Models\BehaviorSpotted;
use App\Models\ClientMonitoringForm;
use App\Models\Concern;
use App\Models\GcsPk;
use App\Models\GuidanceAdmissionSlip;
use App\Models\GuidanceCallSlip;
use App\Models\IntakeInterviewForm;
use App\Models\ReferralForm;
use App\Models\Reservation;
use Illuminate\Http\Request;

Class SaveInputsServiceImpl implements SaveInputsService
{
    public function submitIntakeInterview(Request $request){
        $data  = IntakeInterviewForm::create([
            // 'user_id' => $request->user_id,
            'campus' => $request->campus,
            'name_of_student' => $request->name_of_student,
            'nickname' => $request->nickname,
            'elementary_school_graduated' => $request->elementary_school_graduated,
            'school_address' => $request->school_address,
            'age' => $request->age,
            'sex' => $request->sex,
            'date_of_interview' => $request->date_of_interview,
            'notes' => $request->notes,
            'interviewer' => $request->interviewer
        ]);

        if(!$data){
            return response()->json([
                "success" => false,
                "message" => "Internal Server Error.",
            ], 500);
        }

        return response()->json([
            "success" => true,
            "message" => "Intake Interview Form Submitted Successfully.",
            "data" => $data
        ], 200);
    }

    public function submitGuidanceAdmissionSlip(Request $request){
        $data = GuidanceAdmissionSlip::create([
            'user_id' => $request->user_id,
            'campus' => $request->campus,
            'name_of_student' => $request->name_of_student,
            'grade_and_section' => $request->grade_and_section,
            'dear' => $request->dear,
            'last_visited_date' => $request->last_visited_date,
            'last_visited_time_start' => $request->last_visited_time_start,
            'last_visited_time_end' => $request->last_visited_time_end,
            'guidance_counselor' => $request->guidance_counselor,
            'recieved_by' => $request->recieved_by
        ]);

        if(!$data){
            return response()->json([
                "success" => false,
                "message" => "Internal Server Error.",
            ], 500);
        }

        return response()->json([
            "success" => true,
            "message" => "Guidance Admission slip Submitted Successfully.",
            "data" => $data
        ], 200);
    }

    public function submitGuidanceCallSlip(Request $request){
        $result1 = GuidanceCallSlip::create([
            'campus' => $request->campus,
            'date' => $request->date,
            'time' => $request->time,
            'type_of_counseling' => $request->type_of_counseling,
            'counseling_time_start' => $request->counseling_time_start,
            'counseling_time_end' => $request->counseling_time_end,
            'guidance_counselor' => $request->guidance_counselor,
            'teacher_in_charge' => $request->teacher_in_charge,
        ]);

        if(!$result1){
            return response()->json([
                "success" => false,
                "message" => "Internal Server Error.",
            ], 500);
        }

        $result2 = GcsPk::create([
            'gcs_id' => $result1->id,
            's1' => $request->s1,
            's2' => $request->s2,
            's3' => $request->s3,
            's4' => $request->s4,
            's5' => $request->s5,
            'gs1' => $request->gs1,
            'gs2' => $request->gs2,
            'gs3' => $request->gs3,
            'gs4' => $request->gs4,
            'gs5' => $request->gs5,
        ]);

        return response()->json([
            "success" => true,
            "message" => "Guidance Admission slip Submitted Successfully.",
            "data1" => $result1,
            "data2" => $result2
        ], 200);
    }

    // Parent

    public function submitReferralForm(Request $request){
        $data1 = ReferralForm::create([
            'campus' => $request->campus,
            'user_id' => $request->user_id,
            'name_of_student' => $request->name_of_student,
            'grade_and_section' => $request->grade_and_section,
            'date' => $request->date,
            'concern' => serialize($request->concern),
            'brief_description' => $request->brief_description,
            'intervention_done' => $request->intervention_done,
            'follow_up' => $request->follow_up,
            'others' => $request->others,
        ]);

        Reservation::create([
            'time' => $request->selected_time,
            'date' => $request->date,
            'user_id' => $request->user_id,
        ]);

        if(!$data1){
            return response()->json([
                "success" => false,
                "message" => "Data 1: Internal Server Error.",
            ], 500);
        }

        $data2 = BehaviorSpotted::create([
            'referral_form_id' => $data1->id,
            'b_1'=> $request->b_1,
            'b_2' => $request->b_2,
            'b_3' => $request->b_3,
            'b_4' => $request->b_4,
            'b_5' => $request->b_5,
            'b_6' => $request->b_6,
            'b_7' => $request->b_7,
            'b_8' => $request->b_8,
            'b_9' => $request->b_9,
            'b_10' => $request->b_10,
            'b_11' => $request->b_11,
            'b_12' => $request->b_12,
            'b_13' => $request->b_13,
        ]);

        if(!$data2){
            return response()->json([
                "success" => false,
                "message" => "Data 2: Internal Server Error.",
            ], 500);
        }

        return response()->json([
            "success" => true,
            "message" => "Referral Form Submitted Successfully.",
            "data1" => $data1,
            "data2" => $data2
        ], 200);
    }

    //Cumulative

    public function submitClientMonitoringForm(Request $request){
        $data1 = ClientMonitoringForm::create([
            'user_id' => $request->user_id,
            'campus' => $request->campus,
            'adviser' => $request->adviser,
        ]);

        if(!$data1){
            return response()->json([
                "success" => false,
                "message" => "Data 1: Internal Server Error.",
            ], 500);
        }

        $data2 = Concern::create([
            'client_monitoring_form_id' => $data1->id,
            'date'=> $request->date,
            'area_of_concern' => $request->area_of_concern,
            'action_taken' => $request->action_taken,
            'recommendation' => $request->recommendation,
        ]);

        if(!$data2){
            return response()->json([
                "success" => false,
                "message" => "Data 2: Internal Server Error.",
            ], 500);
        }

        return response()->json([
            "success" => true,
            "message" => "Client Monitoring Form Submitted Successfully.",
            "data1" => $data1,
            "data2" => $data2
        ], 200);
    }

    public function updateClientMonitoringForm(Request $request){
        $data = Concern::create([
            'client_monitoring_form_id' => $request->cmf_id,
            'date'=> $request->date,
            'area_of_concern' => $request->area_of_concern,
            'action_taken' => $request->action_taken,
            'recommendation' => $request->recommendation,
        ]);

        if(!$data){
            return response()->json([
                "success" => false,
                "message" => "Data 2: Internal Server Error.",
            ], 500);
        }

        return response()->json([
            "success" => true,
            "message" => "Client Monitoring Form Updated Successfully.",
            "data" => $data
        ], 200);
    }


}