<?php

namespace App\Http\Implementations;


use App\Http\Services\EventService;
use App\Models\Event;
use Illuminate\Http\Request;

Class EventServiceImpl implements EventService
{
    public function getEvents(){
        try{
            $data = Event::all();

            if(!$data){
                return response()->json([
                    "success"=> false,
                    "message"=> "Internal Server Error.",
                ], 500);
            }

            return response()->json([
                "success"=> true,
                "message"=> "Fetched upcoming events.",
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

    public function addEvent(Request $request){
        try{
            $result = Event::create([
                'event_name' => $request->event_name,
                'event_date' => $request->event_date,
                'event_time' => $request->event_time,
            ]);

            if(!$result){
                return response()->json([
                    "success"=> false,
                    "message"=> "Internal Server Error.",
                ], 500);
            }

            return response()->json([
                "success"=> true,
                "message"=> "New event was added.",
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
}
