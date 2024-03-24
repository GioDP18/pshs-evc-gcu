<?php

namespace App\Http\Implementations;


use App\Http\Services\RequestsService;
use App\Models\Requests;
use Illuminate\Http\Request;

Class RequestsServiceImpl implements RequestsService
{
    public function createRequest(Request $request){
        $result = Requests::create([
            // 'form_name' => str_replace(' ', '_', strtolower($request->form_name.'s')),
            'form_name' => $request->form_name,
            'user_id' => $request->user_id,
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
}
