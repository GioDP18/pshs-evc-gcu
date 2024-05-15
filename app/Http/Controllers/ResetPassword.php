<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResetPasswordLinkRequest;
use App\Http\Services\ResetPasswordService;
use Illuminate\Http\Request;

class ResetPassword extends Controller
{
    public function __construct(public ResetPasswordService $resetPasswordService){

    }

    public function submitForgetPasswordForm(ResetPasswordLinkRequest $request){
        return $this->resetPasswordService->submitForgetPasswordForm($request->validated());
    }

    public function submitResetPasswordForm(Request $request){
        return $this->resetPasswordService->submitResetPasswordForm($request);
    }
}
