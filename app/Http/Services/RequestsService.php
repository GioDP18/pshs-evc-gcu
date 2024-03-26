<?php

namespace App\Http\Services;

use Illuminate\Http\Request;

interface RequestsService
{
    public function createRequest(Request $request);

    public function approveRequest(Request $request);
}
