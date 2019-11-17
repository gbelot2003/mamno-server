<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use Symfony\Bridge\PsrHttpMessage\Factory\DiactorosFactory;
use Illuminate\Http\Response;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Laravel\Passport\Http\Controllers\AccessTokenController as AccessTokenController;

class AuthController extends AccessTokenController
{
    use AuthenticatesUsers;

    protected $maxAttempts = 3; // Default is 5

    //custom login method
    public function login(Request $request)
    {
        //check if user has reached the max number of login attempts
        if ($this->hasTooManyLoginAttempts($request))
        {
            $this->fireLockoutEvent($request);
            // aqui cerramos al usuario permanentemente

            return "To many attempts...";
        }

        //verify user credentials
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials))
        {
            //Authentication passed...

            //reset failed login attemps
            $this->clearLoginAttempts($request);

            $user = $request->user();
            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult->token;
            if ($request->remember_me)
                $token->expires_at = Carbon::now()->addWeeks(1);

            $token->save();

            return response()->json([
                'access_token' => $tokenResult->accessToken,
                'token_type' => 'Bearer',
                'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString()
            ]);

        }
        else
        {
            //count user failed login attempts
            $this->incrementLoginAttempts($request);

            return "Login failed...";
        }
    }
}
