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

    public function getAllRegistrationApplicationsRejected(){
        return $this->registrationApplicationService->getAllRegistrationApplicationsRejected();
    }

    public function approve($id){
        return $this->registrationApplicationService->approve($id);
    }

    public function reject($id){
        return $this->registrationApplicationService->reject($id);
    }
}
