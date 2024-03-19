<?php

namespace App\Http\Services;

use Illuminate\Http\Request;

interface CallendarService
{
    public function getSchedule($date);

    public function updateSchedule(Request $request);
}
