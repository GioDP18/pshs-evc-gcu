<?php

namespace App\Http\Services;
use Illuminate\Http\Request;

interface AuthService
{
    public function login(Request $request);

    public function register(Request $request);

    public function logout();

    public function refresh();

    public function userProfile();

    public function socialLogin($provider);
}
