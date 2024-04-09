<?php

namespace App\Http\Implementations;

use App\Http\Services\EmailVerificationService;
use App\Models\EmailVerificationToken;
use App\Models\User;
use App\Notifications\EmailVerificationNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;


Class EmailVerificationServiceImpl implements EmailVerificationService
{
    public function __construct()
    {
        
    }

    public function sendVerificationLink(object $user): void
    {
        Notification::send($user, new EmailVerificationNotification($this->generateVerificationLink($user->email)));
    }

    public function resendLink($email)
    {
        $user = User::where('email', $email)->first();
        if ($user) {
            $this->sendVerificationLink($user);
            return response()->json([
                'success' => true,
                'message' => 'successfully sent new verification link'
            ]);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'User not found',
            ]);
        }
    }

    public function checkIfEmailIsVerified($user)
    {
        if ($user->email_verified_at) {
            return response()->json([
                'success' => true,
                'message' => 'email already verified'
            ])->send() && exit;
        } 
    }

    public function verifyEmail($email, $token)
    {
        $user = User::where('email', $email)->first();
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not found'
            ])->send() && exit;
        }
        $this->checkIfEmailIsVerified($user);
        $verifiedToken = $this->verifyToken($email, $token);
        if ($user->markEmailAsVerified()) {
            $verifiedToken->delete();
            return response()->json([
                'success' => true,
                'message' => 'Email has been verified successfully'
            ]);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'Email verification failed, please try again later',
            ]);
        }
        
    }

    public function verifyToken($email, $token)
    {
        $token = EmailVerificationToken::where('email', $email)->where('token', $token)->first();
        if ($token) {
            if ($token->expired_at >= now()) {
                return $token;
            }else {
                $token->delete();
                return response()->json([
                    'successful' => false,
                    'message' => 'Verification link is already expired',
                ])->send() && exit;
            }
        }else{
            return response()->json([
                'successful' => false,
                'message' => 'Invalid verification token',
            ])->send() && exit;
        }   
    }
    
    public function generateVerificationLink(string $email): string
    {
        $checkIfTokenExists = EmailVerificationToken::where('email', $email)->first();
        if ($checkIfTokenExists) $checkIfTokenExists->delete();
        $token = Str::uuid();
        $url = config('app.url'). '/verify-email' . "?token=".$token . "&email=".$email;
        $saveToken = EmailVerificationToken::create([
            "email" => $email,
            "token" => $token,
            "expired_at" => now()->addMinutes(60)
        ]);
        if ($saveToken){
            return $url;
        }
    }
   
}