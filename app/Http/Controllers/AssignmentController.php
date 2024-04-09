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

    public function bulkAssignFormByGradeLevel(Request $request){
        return $this->assignmentService->bulkAssignFormByGradeLevel($request);
    }

    public function bulkAssignFormBySection(Request $request){
        return $this->assignmentService->bulkAssignFormBySection($request);
    }

    public function getAssignedForms($id, $form_name){
        return $this->assignmentService->getAssignedForms($id, $form_name);
    }
}
