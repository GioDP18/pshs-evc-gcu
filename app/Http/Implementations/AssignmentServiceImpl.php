<?php

namespace App\Http\Implementations;


use App\Http\Services\AssignmentService;
use App\Models\Assignment;
use App\Models\User;
use Illuminate\Http\Request;

Class AssignmentServiceImpl implements AssignmentService
{
    public function assignForm(Request $request){
        try{
            $result = Assignment::create([
                'assignee' => $request->assignee,
                'form_name' => $request->form_name,
                'due_date' => $request->due_date
            ]);

            if(!$result){
                return response()->json([
                    "success" => false,
                    "message" => "Internal Server Error.",
                ], 500);
            }

            return response()->json([
                "success" => true,
                "message" => "Assignment was sent to the assignee.",
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

    public function bulkAssignFormByGradeLevel(Request $request){
        try{
            $get_all_assignee = User::where('grade_level', $request->grade_level)->get();

            foreach ($get_all_assignee as $assignee){
                $result = Assignment::create([
                    'assignee' => $assignee->id,
                    'form_name' => $request->form_name,
                    'due_date' => $request->due_date
                ]);

                if(!$result){
                    return response()->json([
                        "success" => false,
                        "message" => "Internal Server Error.",
                    ], 500);
                }
            }

            return response()->json([
                "success" => true,
                "message" => "Assignment was sent to the assignee.",
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

    public function bulkAssignFormBySection(Request $request){
        try{
            $get_all_assignee = User::where('section', $request->section)->get();

            foreach ($get_all_assignee as $assignee){
                $result = Assignment::create([
                    'assignee' => $assignee->id,
                    'form_name' => $request->form_name,
                    'due_date' => $request->due_date
                ]);

                if(!$result){
                    return response()->json([
                        "success" => false,
                        "message" => "Internal Server Error.",
                    ], 500);
                }
            }

            return response()->json([
                "success" => true,
                "message" => "Assignment was sent to the assignee.",
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

    public function getAssignedForms($id){
        try{
            $data = Assignment::where('assignee', $id)->get();

            if(!$data){
                return response()->json([
                    "success" => false,
                    "message" => "Internal Server Error.",
                ], 500);
            }

            return response()->json([
                "success" => true,
                "message" => "Fetched all assigned forms to this assignee.",
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
