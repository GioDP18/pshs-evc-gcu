<?php

namespace App\Http\Services;

use Illuminate\Http\Request;

interface EventService
{
    public function getEvents();

    public function addEvent(Request $request);
}
