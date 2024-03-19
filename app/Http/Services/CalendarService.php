<?php

namespace App\Http\Services;

use Illuminate\Http\Request;

interface CalendarService
{
    public function getSchedule($date);

    public function updateSchedule(Request $request);
}
