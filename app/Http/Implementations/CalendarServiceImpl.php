<?php

namespace App\Http\Implementations;


use App\Http\Services\CalendarService;
use App\Models\Calendar;
use Illuminate\Http\Request;

Class CalendarServiceImpl implements CalendarService
{
    public function getSchedule($date){
        try{
            $schedule = Calendar::where('date', $date)->get();

            return response()->json([
                "success"=> true,
                "message"=> "Fetched available time for ".$date,
                "schedule" => $schedule
            ]);
        }
        catch (\Exception $error){
            return response()->json([
                "success"=> false,
                "message"=> $error->getMessage()
            ]);
        }
    }

    public function updateSchedule(Request $request){
        try {
            Calendar::where('date', $request->date)->delete();
            foreach ($request->available_time as $timeSlot) {
                $result = Calendar::create([
                    'available_time' => $timeSlot,
                    'date' => $request->date,
                ]);

                if(!$result){
                    return response()->json([
                        "success"=> false,
                        "message"=> "Failed to create schedule."
                    ]);
                }
            }

            return response()->json([
                "success"=> true,
                "message"=> "Schedule added successfully."
            ]);
        } catch (\Exception $error) {
            return response()->json([
                "success"=> false,
                "message"=> $error->getMessage()
            ]);
        }
    }
}
