<?php

namespace App\Http\Controllers;

use App\Http\Services\CallendarService;
use Illuminate\Http\Request;

class CallendarController extends Controller
{
    public function __construct(public CallendarService $callendarService){

    }
    public function getSchedule($date){
        return $this->callendarService->getSchedule($date);
    }

    public function updateSchedule(Request $request){
        return $this->callendarService->updateSchedule($request);
    }

}
