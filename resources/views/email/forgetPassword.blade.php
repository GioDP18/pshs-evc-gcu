<h1>Forget Password Email</h1>
   
You can reset password from bellow link:
<a href="{{ config('app.url') . '/password-reset?token=' . $token . '&email=' . $email }}">Reset Password</a>
