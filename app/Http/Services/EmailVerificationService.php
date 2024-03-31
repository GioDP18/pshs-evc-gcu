<?php

namespace App\Http\Services;

use App\Http\Requests\ResendEmailVerificationLinkRequest;
use Illuminate\Http\Request;

interface EmailVerificationService
{

    public function sendVerificationLink(object $user);

    public function verifyEmail($email, $token);

    public function resendLink(ResendEmailVerificationLinkRequest $request);
}
