<?php

namespace App\Http\Controllers;

use App\Http\Services\AssignmentService;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    public function __construct(public AssignmentService $assignmentService){

    }

    public function assignForm(Request $request){
        return $this->assignmentService->assignForm($request);
    }
}
