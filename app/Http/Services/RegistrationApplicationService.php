<?php

namespace App\Http\Services;

use Illuminate\Http\Request;

interface RegistrationApplicationService
{
    public function getAllRegistrationApplications();

    public function getAllRegistrationApplicationsRejected();

    public function approve($id);
    
    public function reject($id);
}
