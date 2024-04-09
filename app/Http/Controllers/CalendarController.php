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

    public function getNotAvailableTime($date){
        return $this->calendarService->getNotAvailableTime($date);
    }

    public function getReservedTime($date){
        return $this->calendarService->getReservedTime($date);
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
    public function getNotAvailableTimeToday(){
        return $this->calendarService->getNotAvailableTimeToday();
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

    public function getAppointmentsToday(Request $request){
        return $this->calendarService->getAppointmentsToday($request);
    }

}
