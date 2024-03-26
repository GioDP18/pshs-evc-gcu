<?php

namespace App\Http\Controllers;

use App\Http\Services\RequestsService;
use Illuminate\Http\Request;

class RequestsController extends Controller
{
    public function __construct(public RequestsService $requestsService){

    }

    public function createRequest(Request $request){
        return $this->requestsService->createRequest($request);
    }

    public function approveRequest(Request $request){
        return $this->requestsService->approveRequest($request);
    }
}
