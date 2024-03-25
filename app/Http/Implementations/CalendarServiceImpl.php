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

            if(!$schedule){
                return response()->json([
                    "success"=> false,
                    "message"=> "Internal Server Error.",
                ], 500);
            }

            return response()->json([
                "success"=> true,
                "message"=> "Fetched available time for ".$date,
                "schedule" => $schedule
            ], 200);
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
                        "message"=> "Internal Server Error."
                    ], 500);
                }
            }

            return response()->json([
                "success"=> true,
                "message"=> "Schedule updated successfully."
            ], 200);
        } catch (\Exception $error) {
            return response()->json([
                "success"=> false,
                "message"=> $error->getMessage()
            ]);
        }
    }

    public function getAvailableTimeToday(){
        try{
            $schedule = Calendar::where('date', date('Y-m-d'))->get();

            if(!$schedule){
                return response()->json([
                    "success"=> false,
                    "message"=> "Internal Server Error."
                ], 500);
            }

            return response()->json([
                "success"=> true,
                "message"=> "Fetched available time for today",
                "schedule" => $schedule
            ], 200);
        }
        catch (\Exception $error){
            return response()->json([
                "success"=> false,
                "message"=> $error->getMessage()
            ]);
        }
    }

    public function reserveConsultation(Request $request){
        try{
            $result = Calendar::where('id', $request->calendar_id)->update([
                'user_id_reserved' => $request->user_id_reserved
            ]);

            if(!$result){
                return response()->json([
                    "success"=> false,
                    "message"=> "Internal Server Error."
                ], 500);
            }

            return response()->json([
                "success"=> true,
                "message"=> "Consultation reserved.",
                "schedule" => $result
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
