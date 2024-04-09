<?php

namespace App\Http\Implementations;


use App\Http\Services\CalendarService;
use App\Models\Calendar;
use App\Models\NotAvailableTime;
use App\Models\Reservation;
use Illuminate\Http\Request;

Class CalendarServiceImpl implements CalendarService
{
    public function __construct(){
        date_default_timezone_set('Asia/Manila');
    }

    public function getSchedule($date){
        try{
            $schedule = NotAvailableTime::where('date', $date)->get();

            if(!$schedule){
                return response()->json([
                    "success"=> false,
                    "message"=> "Internal Server Error.",
                ], 500);
            }

            return response()->json([
                "success"=> true,
                "message"=> "Fetched not available time for ".$date,
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

    public function getNotAvailableTime($date){
        try{
            $schedule = NotAvailableTime::where('date', $date)->get();

            if(!$schedule){
                return response()->json([
                    "success"=> false,
                    "message"=> "Internal Server Error.",
                ], 500);
            }

            return response()->json([
                "success"=> true,
                "message"=> "Fetched not available time for ".$date,
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

    public function getReservedTime($date){
        try{
            $schedule = Reservation::where('date', $date)->get();

            if(!$schedule){
                return response()->json([
                    "success"=> false,
                    "message"=> "Internal Server Error.",
                ], 500);
            }

            return response()->json([
                "success"=> true,
                "message"=> "Fetched not available time for ".$date,
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
            NotAvailableTime::where('date', $request->date)->delete();
            foreach ($request->time as $timeSlot) {
                $result = NotAvailableTime::create([
                    'time' => $timeSlot,
                    'date' => $request->date,
                    // 'user_id_reserved' => $request->user_id_reserved
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

    public function getNotAvailableTimeToday(){
        try{
            $data1 = NotAvailableTime::where('date', date('Y-m-d'))->get();
            if(!$data1){
                return response()->json([
                    "success"=> false,
                    "message"=> "Internal Server Error."
                ], 500);
            }

            $data2 = Reservation::where('date', date('Y-m-d'))->get();
            if(!$data2){
                return response()->json([
                    "success"=> false,
                    "message"=> "Internal Server Error."
                ], 500);
            }

            $schedule = $data1->merge($data2)->toArray();

            return response()->json([
                "success"=> true,
                "message"=> date('Y-m-d'),
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
            $result = Reservation::create([
                'time' => $request->time,
                'date' => $request->date,
                'user_id' => $request->user_id
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

    public function getAppointmentsToday(Request $request){
        try{
            $result = Reservation::with('reserved_user')->where('date', date('Y-m-d'))->get();

            if(!$result){
                return response()->json([
                    "success"=> false,
                    "message"=> "Internal Server Error."
                ], 500);
            }

            return response()->json([
                "success"=> true,
                "message"=> "Fetched all appointments for today.",
                "appointments" => $result
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
