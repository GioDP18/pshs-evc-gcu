<?php

namespace App\Http\Implementations;


use App\Http\Services\GetFormsService;
use App\Models\GuidanceAdmissionSlip;
use App\Models\IntakeInterviewForm;
use Illuminate\Http\Request;

Class GetFormsServiceImpl implements GetFormsService
{

    public function getAllIntakeInterviewForms(){
        try{
            $data = IntakeInterviewForm::with('interviewer_info')->get();

            if(!$data){
                return response()->json([
                    "success" => false,
                    "message" => "Internal Server Error.",
                ], 500);
            }

            return response()->json([
                "success" => true,
                "message" => "Fetched All Intake Interview Forms.",
                "data" => $data
            ], 200);
        }
        catch (\Exception $error){
            return response()->json([
                "success"=> false,
                "message"=> $error->getMessage()
            ]);
        }
    }

    public function getAllGuidanceAdmissionSlips(){
        try{
            $data = GuidanceAdmissionSlip::all();

            if(!$data){
                return response()->json([
                    "success" => false,
                    "message" => "Internal Server Error.",
                ], 500);
            }

            return response()->json([
                "success" => true,
                "message" => "Fetched All Guidance Admission Slips.",
                "data" => $data
            ], 200);
        }
        catch (\Exception $error){
            return response()->json([
                "success"=> false,
                "message"=> $error->getMessage()
            ]);
        }
    }
}
