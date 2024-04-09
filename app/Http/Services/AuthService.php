<?php

namespace App\Http\Services;

use App\Http\Requests\EmailVerificationRequest;
use App\Http\Requests\ResendEmailVerificationLinkRequest;
use Illuminate\Http\Request;
use Laravel\Socialite\Contracts\User;

interface AuthService
{
    public function login(Request $request);

    public function checkAuth();

    public function register(Request $request);

    public function logout();

    public function refresh();

    public function socialLogin($provider);

    public function authenticateSocialLogin($provider);

    public function verifyUserEmail(EmailVerificationRequest $request);

    public function resendEmailVerificationLink(ResendEmailVerificationLinkRequest $request);
}
