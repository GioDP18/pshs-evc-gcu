<?php

namespace App\Http\Controllers;

use App\Http\Services\CalendarService;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function __construct(public CalendarService $calendarService){

    }
    public function getSchedule($date){
        return $this->calendarService->getSchedule($date);
    }

    public function updateSchedule(Request $request){
        return $this->calendarService->updateSchedule($request);
    }

}
