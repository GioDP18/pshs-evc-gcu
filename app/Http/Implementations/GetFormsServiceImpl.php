<?php

namespace App\Http\Implementations;


use App\Http\Services\GetFormsService;
use App\Models\ClientMonitoringForm;
use App\Models\CumulativeRecordForm;
use App\Models\GuidanceAdmissionSlip;
use App\Models\GuidanceCallSlip;
use App\Models\IntakeInterviewForm;
use App\Models\ParentQuestionnaireForm;
use App\Models\ReferralForm;
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

    public function getAllGuidanceCallSlips(){
        try{
            $data = GuidanceCallSlip::all();

            if(!$data){
                return response()->json([
                    "success" => false,
                    "message" => "Internal Server Error.",
                ], 500);
            }

            return response()->json([
                "success" => true,
                "message" => "Fetched All Guidance Call Slips.",
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

    public function getAllParentQuestionnaireForms(){
        try{
            // $data = ParentQuestionnaireForm::all();
            $data = GuidanceAdmissionSlip::all();

            if(!$data){
                return response()->json([
                    "success" => false,
                    "message" => "Internal Server Error.",
                ], 500);
            }

            return response()->json([
                "success" => true,
                "message" => "Fetched All Parent Questionnaire Forms.",
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

    public function getAllReferralForms(){
        try{
            $data = ReferralForm::with('referrer_info')->get();
            // $data = GuidanceAdmissionSlip::all();

            if(!$data){
                return response()->json([
                    "success" => false,
                    "message" => "Internal Server Error.",
                ], 500);
            }

            return response()->json([
                "success" => true,
                "message" => "Fetched All Referral Forms.",
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

    public function getAllCumulativeRecordForms(){
        try{
            // $data = CumulativeRecordForm::all();
            $data = GuidanceAdmissionSlip::all();

            if(!$data){
                return response()->json([
                    "success" => false,
                    "message" => "Internal Server Error.",
                ], 500);
            }

            return response()->json([
                "success" => true,
                "message" => "Fetched All Cumulative Record Forms.",
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

    public function getAllClientMonitoringForms(){
        try{
            // $data = ClientMonitoringForm::all();
            $data = GuidanceAdmissionSlip::all();

            if(!$data){
                return response()->json([
                    "success" => false,
                    "message" => "Internal Server Error.",
                ], 500);
            }

            return response()->json([
                "success" => true,
                "message" => "Fetched All Client Monitoring Forms.",
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


    public function getMyReferralForms($id){
        try{
            $data = ReferralForm::with('referrer_info')->where('user_id', $id)->get();
            // $data = GuidanceAdmissionSlip::all();

            if(!$data){
                return response()->json([
                    "success" => false,
                    "message" => "Internal Server Error.",
                ], 500);
            }

            return response()->json([
                "success" => true,
                "message" => "Fetched All Referral Forms.",
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

    public function getMyClientMonitoringForms($id){
        try{
            $data = ClientMonitoringForm::with('user')->where('user_id', $id)->get();
            // $data = GuidanceAdmissionSlip::all();

            if(!$data){
                return response()->json([
                    "success" => false,
                    "message" => "Internal Server Error.",
                ], 500);
            }

            return response()->json([
                "success" => true,
                "message" => "Fetched All Client Monitoring Forms.",
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
