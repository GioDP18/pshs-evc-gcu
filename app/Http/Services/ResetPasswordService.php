<?php

namespace App\Http\Services;

use Illuminate\Http\Request;

interface ResetPasswordService
{
    public function submitForgetPasswordForm($data);

    public function submitResetPasswordForm(Request $request);
}
