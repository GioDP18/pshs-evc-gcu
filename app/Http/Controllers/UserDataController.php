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
}
