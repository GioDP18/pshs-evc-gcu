<?php

namespace App\Http\Controllers;

use App\Http\Services\EventService;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function __construct(public EventService $eventService){

    }

    public function getEvents(){
        return $this->eventService->getEvents();
    }

    public function addEvent(Request $request){
        return $this->eventService->addEvent($request);
    }
}
