<?php

namespace App\Http\Services;

use Illuminate\Http\Request;

interface AssignmentService
{
    public function assignForm(Request $request);

    public function getAssignedForms($id);
}
