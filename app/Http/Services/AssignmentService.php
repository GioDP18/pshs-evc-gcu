<?php

namespace App\Http\Services;

use Illuminate\Http\Request;

interface AssignmentService
{
    public function assignForm(Request $request);

    public function bulkAssignFormByGradeLevel(Request $request);

    public function bulkAssignFormBySection(Request $request);

    public function getAssignedForms($id, $form_name);
}
