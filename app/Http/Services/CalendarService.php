<?php

namespace App\Http\Services;

use Illuminate\Http\Request;

interface CalendarService
{
    public function getSchedule($date);

    public function getNotAvailableTime($date);

    public function getReservedTime($date);

    public function updateSchedule(Request $request);

    public function getNotAvailableTimeToday();

    public function reserveConsultation(Request $request);

    public function getAppointmentsToday(Request $request);
}
