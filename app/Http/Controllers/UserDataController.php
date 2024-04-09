<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserDataController extends Controller
{
    public function getUserData($id){
        $data = User::find($id);

        if(!$data){
            return response()->json([
                "success"=> false,
                "message"=> "Internal Server Error."
            ], 500);
        }

        return response()->json([
            "success"=> true,
            "message"=> "Fetched User data.",
            "data" => $data
        ], 200);
    }

    public function getAllUsers(){
        $data = User::where('role', 'student')->get();

        if(!$data){
            return response()->json([
                "success"=> false,
                "message"=> "Internal Server Error."
            ], 500);
        }

        return response()->json([
            "success"=> true,
            "message"=> "Fetched All Students.",
            "data" => $data
        ], 200);
    }

    public function getStaffs(){
        $data = User::where('role', 'gcu_staff')->get();

        if(!$data){
            return response()->json([
                "success"=> false,
                "message"=> "Internal Server Error."
            ], 500);
        }

        return response()->json([
            "success"=> true,
            "message"=> "Fetched All Staffs.",
            "data" => $data
        ], 200);
    }

    public function checkAuth(){
        if (auth()->check()) {
            return response()->json([
                'success' => true,
                'message' => 'You are authenticated.'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'You are unauthenticated.'
            ], 200);
        }
    }
}
