<?php

namespace App\Http\Controllers;

use App\Http\Services\CalendarService;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    /**
     * Injecting dependecies
     *
     * @param CalendarService $calendarService
     */
    public function __construct(public CalendarService $calendarService){

    }

    /**
     * Function to get schedule for specific date.
     *
     * @param [type] $date
     * @return void
     */
    public function getSchedule($date){
        return $this->calendarService->getSchedule($date);
    }

    /**
     * Function to update schedule for specific date.
     *
     * @param Request $request
     * @return void
     */
    public function updateSchedule(Request $request){
        return $this->calendarService->updateSchedule($request);
    }

    /**
     * Function to get available time for today.
     *
     * @return void
     */
    public function getAvailableTimeToday(){
        return $this->calendarService->getAvailableTimeToday();
    }

    /**
     * Function to reserve a consultation
     *
     * @param Request $request
     * @return void
     */
    public function reserveConsultation(Request $request){
        return $this->calendarService->reserveConsultation($request);
    }

}
