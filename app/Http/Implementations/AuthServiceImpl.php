<?php

namespace App\Http\Implementations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Validator;
use JWTAuth;
use App\Http\Services\AuthService;
use Laravel\Socialite\Facades\Socialite;

Class AuthServiceImpl implements AuthService
{
    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request){
    	$validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        if (! $token = auth()->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $this->createNewToken($token);
    }

    /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string|between:2,100',
            'lastname' => 'required|string|between:2,100',
            'middlename' => 'required|string|between:2,100',
            'sex' => 'required|string|in:Male,Female',
            'date_of_birth' => 'required|date',
            'role' => 'required|string|in:gcu_staff,parent,teacher,student',
            'contact_number' => 'required|string|min:11',
            'signature' => 'required|image|mimes:jpeg,png,jpg,gif',
            'id_number' => 'nullable|regex:/^\w{2}-\w{4}-\w{3}$/',
            'grade_level' => 'nullable|integer',
            'section' => 'nullable|string',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|confirmed|min:6',
        ]);
        $validator->sometimes('id_number', 'required', function ($input) {
            return !empty($input->id_number);
        });
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $signaturePath = $request->file('signature')->store('signatures', 'public');
        $user = User::create(array_merge(
                    $validator->validated(),
                    ['signature' => $signaturePath],
                    ['password' => bcrypt($request->password)]
                ));
        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user
        ], 201);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout() {
        auth()->logout();
        return response()->json(['message' => 'User successfully signed out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh() {
        return $this->createNewToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }

    public function socialLogin($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function authenticateSocialLogin($provider)
    {
        try {
            // Retrieve user information from the social provider.
            $socialUser = Socialite::driver($provider)->user();

            // Update or create a user record based on the email.
            $user = User::updateOrCreate(
                ['email' => $socialUser->email],
                [
                    "firstname" => $socialUser->firstname,
                    "lastname" => $socialUser->lastname,
                    "{$provider}_id" => $socialUser->id,
                    "{$provider}_token" => $socialUser->token,
                ]
            );

            // Attempt to authenticate the user with JWT.
            if (! $token = auth()->attempt(['email' => $socialUser->email])) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }

            // Return the JWT token or any other data indicating successful login.
            return $this->createNewToken($token);
        } catch (\Exception $e) {
            // Handle exceptions.
            dd($e->getMessage());
        }
    }

}
