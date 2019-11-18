<?php

namespace App\Http\Controllers\Auth;

use App\Events\BlockAttempsUsers;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Laravel\Passport\Http\Controllers\AccessTokenController as AccessTokenController;

class AuthController extends AccessTokenController
{
    use AuthenticatesUsers;

    protected $maxAttempts = 3; // Default is 5

    public function login(Request $request)
    {

        //Si el usuarios a fallado varios intentos
        if ($this->hasTooManyLoginAttempts($request))
        {
            // aqui cerramos al usuario permanentemente
            event(new BlockAttempsUsers($request));
        }

        //verificamos credenciales de usuario
        $credentials = $request->only('email', 'password');

        // Esto no deberia estar aquì pero lo dejamos por conveniencia
        $checkStatus = $this->checkUserStatus($request);

        if ($checkStatus->status === false){
            return \response()->json('La Cuenta esta bloqueada, solicite procedimiento de desbloqueo al administrador del sistema', 401);
        }

        if (Auth::attempt($credentials))
        {

            //Pasa la autenticaciòn...

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

            return "Fallo el Login...";
        }
    }

    /**
     * @param Request $request
     * @return mixed
     */
    private function checkUserStatus(Request $request)
    {
        $checkStatus = User::where('email', $request->email)->first();
        return $checkStatus;
    }
}
