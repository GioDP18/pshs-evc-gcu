<?php

namespace App\Http\Controllers;

use App\Http\Services\RequestsService;
use Illuminate\Http\Request;

class RequestsController extends Controller
{
    public function __construct(public RequestsService $requestsService){

    }

    public function checkRequest(Request $request){
        return $this->requestsService->checkRequest($request);
    }

    public function createRequest(Request $request){
        return $this->requestsService->createRequest($request);
    }

    public function approveRequest($id){
        return $this->requestsService->approveRequest($id);
    }

    public function rejectRequest($id){
        return $this->requestsService->rejectRequest($id);
    }

    public function getIntakeInterviewFormRequest(){
        return $this->requestsService->getIntakeInterviewFormRequest();
    }
}
