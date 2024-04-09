<?php

namespace App\Http\Controllers;

use App\Http\Services\RegistrationApplicationService;
use Illuminate\Http\Request;

class RegistrationApplicationController extends Controller
{
    public function __construct(public RegistrationApplicationService $registrationApplicationService){

    }

    public function getAllRegistrationApplications(){
        return $this->registrationApplicationService->getAllRegistrationApplications();
    }

    public function approve($id){
        return $this->registrationApplicationService->approve($id);
    }
}
