<?php

namespace App\Http\Implementations;


use App\Http\Services\SaveInputsService;
use App\Models\GuidanceAdmissionSlip;
use App\Models\GuidanceCallSlip;
use App\Models\IntakeInterviewForm;
use App\Models\ReferralForm;
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
        $data = GuidanceCallSlip::create([
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

    public function submitReferralForm(Request $request){
        $data = ReferralForm::create([
            'user_id' => $request->user_id,
            'name_of_student' => $request->name_of_student,
            'grade_and_section' => $request->grade_and_section,
            'date' => $request->date,
            'concern' => $request->concern,
            'brief_description' => $request->brief_description,
            'intervention_done' => $request->intervention_done,
            'follow_up' => $request->follow_up,
            'behaviors_spotted' => $request->behaviors_spotted,
            'others' => $request->others
        ]);

        if(!$data){
            return response()->json([
                "success" => false,
                "message" => "Internal Server Error.",
            ], 500);
        }

        return response()->json([
            "success" => true,
            "message" => "Referral Form Submitted Successfully.",
            "data" => $data
        ], 200);
    }
}
