<?php

namespace App\Http\Implementations;

use Illuminate\Http\Request; 
use DB; 
use App\Models\User;  
use Hash;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Services\ResetPasswordService;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\Mail;

Class ResetPasswordServiceImpl implements ResetPasswordService
{
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitForgetPasswordForm($data)
    {
        $email = PasswordReset::where('email', $data['email']);
        if (!empty($email)) {
            $email->delete();
        }

        $token = Str::random(64);

        PasswordReset::create([
            'email' => $data['email'], 
            'token' => $token, 
        ]);

        Mail::send('email.forgetPassword', ['token' => $token, 'email' => $data['email']], function($message) use($data){
            $message->to($data['email']);
            $message->subject('Reset Password');
        });

        return response()->json([
            'success' => true,
            'message' => 'successfully reset password link send to your email'
        ]);
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = PasswordReset::
                            where([
                            'email' => $request->email, 
                            'token' => $request->token
                            ])
                            ->first();

        if(!$updatePassword){
            return response()->json([
                'success' => false,
                'message' => 'invalid token'
            ]);
        }

        $user = User::where('email', $request->email)
                    ->update(['password' => bcrypt($request->password)]);

        PasswordReset::where(['email'=> $request->email])->delete();

        return response()->json([
            'success' => true,
            'message' => 'successfully changed password'
        ]);;
    }
}
