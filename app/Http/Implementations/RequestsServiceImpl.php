<?php

namespace App\Http\Implementations;


use App\Http\Services\RequestsService;
use App\Models\IntakeInterviewForm;
use App\Models\Requests;
use Illuminate\Http\Request;

Class RequestsServiceImpl implements RequestsService
{

    public function checkRequest(Request $request){
        try{
            $result = Requests::where('form_name', $request->form_name)->where('user_id', $request->user_id)->first();

            if(!$result){
                return response()->json([
                    "success" => true,
                    "message" => "No Request found.",
                ], 201);
            }

            return response()->json([
                "success" => true,
                "message" => $request->form_name." request sent.",
                "data" => $result
            ], 200);
        }
        catch (\Exception $error){
            return response()->json([
                "success"=> false,
                "message"=> $error->getMessage()
            ]);
        }
    }

    public function createRequest(Request $request){
        try{
            $result = Requests::create([
                // 'form_name' => str_replace(' ', '_', strtolower($request->form_name.'s')),
                'form_name' => $request->form_name,
                'user_id' => $request->user_id,
                'status' => 'pending'
            ]);

            if(!$result){
                return response()->json([
                    "success" => false,
                    "message" => "Internal Server Error.",
                ], 500);
            }

            return response()->json([
                "success" => true,
                "message" => $request->form_name." request sent.",
                "data" => $result
            ], 200);
        }
        catch (\Exception $error){
            return response()->json([
                "success"=> false,
                "message"=> $error->getMessage()
            ]);
        }
    }

    public function approveRequest($id){
        try{
            $data = Requests::find($id)->update([
                'status' => 'approved',
            ]);

            if(!$data){
                return response()->json([
                    "success" => false,
                    "message" => "Internal Server Error.",
                ], 500);
            }

            return response()->json([
                "success" => true,
                "message" => "Request approved!",
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

    public function rejectRequest($id){
        try{
            $data = Requests::find($id)->update([
                'status' => 'rejected',
            ]);

            if(!$data){
                return response()->json([
                    "success" => false,
                    "message" => "Internal Server Error.",
                ], 500);
            }

            return response()->json([
                "success" => true,
                "message" => "Request approved!",
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

    public function getIntakeInterviewFormRequest(){
        try{
            $data = Requests::with('user')->where('status', 'pending')->where('form_name', 'Intake Interview Form')->get();

            if(!$data){
                return response()->json([
                    "success" => false,
                    "message" => "Internal Server Error.",
                ], 500);
            }

            return response()->json([
                "success" => true,
                "message" => "Success",
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

    public function getGuidanceAdmissionSlipRequest(){
        try{
            $data = Requests::with('user')->where('status', 'pending')->where('form_name', 'Guidance Admission Slip')->get();

            if(!$data){
                return response()->json([
                    "success" => false,
                    "message" => "Internal Server Error.",
                ], 500);
            }

            return response()->json([
                "success" => true,
                "message" => "Success",
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

    public function getGuidanceCallSlipRequest(){
        try{
            $data = Requests::with('user')->where('status', 'pending')->where('form_name', 'Guidance Call Slip')->get();

            if(!$data){
                return response()->json([
                    "success" => false,
                    "message" => "Internal Server Error.",
                ], 500);
            }

            return response()->json([
                "success" => true,
                "message" => "Success",
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

    public function getParentQuestionnaireFormRequest(){
        try{
            $data = Requests::with('user')->where('status', 'pending')->where('form_name', 'Parent Questionnaire Form')->get();

            if(!$data){
                return response()->json([
                    "success" => false,
                    "message" => "Internal Server Error.",
                ], 500);
            }

            return response()->json([
                "success" => true,
                "message" => "Success",
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

    public function getReferralFormRequest(){
        try{
            $data = Requests::with('user')->where('status', 'pending')->where('form_name', 'Referral Form')->get();

            if(!$data){
                return response()->json([
                    "success" => false,
                    "message" => "Internal Server Error.",
                ], 500);
            }

            return response()->json([
                "success" => true,
                "message" => "Success",
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

    public function getCumulativeRecordFormRequest(){
        try{
            $data = Requests::with('user')->where('status', 'pending')->where('form_name', 'Cumulative Record Form')->get();

            if(!$data){
                return response()->json([
                    "success" => false,
                    "message" => "Internal Server Error.",
                ], 500);
            }

            return response()->json([
                "success" => true,
                "message" => "Success",
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

    public function getClientMonitoringFormRequest(){
        try{
            $data = Requests::with('user')->where('status', 'pending')->where('form_name', 'Client Monitoring Form')->get();

            if(!$data){
                return response()->json([
                    "success" => false,
                    "message" => "Internal Server Error.",
                ], 500);
            }

            return response()->json([
                "success" => true,
                "message" => "Success",
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
