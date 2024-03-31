<?php
namespace App\Http\Controllers;

use App\Http\Requests\EmailVerificationRequest;
use App\Http\Requests\ResendEmailVerificationLinkRequest;
use App\Http\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Validator;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct(public AuthService $authService) {
        $this->middleware('auth:api', ['except' => ['login', 'register', 'verifyUserEmail', 'resendEmailVerificationLink']]);
    }
    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request){
    	return $this->authService->login($request);
    }

    public function checkAuth(){
        return $this->authService->checkAuth();
    }

    /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request) {
        return $this->authService->register($request);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout() {
        return $this->authService->logout();
    }
    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh() {
        return $this->authService->refresh();
    }

    public function socialLogin($provider)
    {
        return $this->authService->socialLogin($provider);
    }

    public function socialLoginCallback($provider)
    {
        return $this->authService->authenticateSocialLogin($provider);
    }

    public function verifyUserEmail(EmailVerificationRequest $request)
    {
        return $this->authService->verifyUserEmail($request);
    }

    public function resendEmailVerificationLink(ResendEmailVerificationLinkRequest $request)
    {
        return $this->authService->resendEmailVerificationLink($request);
    }
}
