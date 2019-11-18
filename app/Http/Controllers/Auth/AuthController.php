<?php

namespace App\Http\Controllers\Auth;

use App\Events\BlockAttempsUsers;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use \Laravel\Passport\Http\Controllers\AccessTokenController as AccessTokenController;

class AuthController extends AccessTokenController
{
    use AuthenticatesUsers;

    protected $maxAttempts = 3; // Default is 5

    public function login(Request $request)
    {

        //verificamos credenciales de usuario
        $credentials = $request->only('email', 'password');

        //Si el usuarios a fallado varios intentos
        if ($this->hasTooManyLoginAttempts($request))
        {
            // aqui cerramos al usuario permanentemente
            event(new BlockAttempsUsers($request));
        }

        // Esto no deberia estar aquì pero lo dejamos por conveniencia
        $checkStatus = $this->checkUserStatus($request);

        if ($checkStatus->status === false){
            return \response()->json('La Cuenta esta bloqueada, solicite procedimiento de desbloqueo al administrador del sistema', 401);
        }

        if (Auth::attempt($credentials))
        {
            return $this->authAttemps($request);
        } else {
            //Contador de las veces que intenta login sin exito
            $this->incrementLoginAttempts($request);
            return "Fallo el Login...";
        }
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'role' => ['required', 'string'],
            'telefono' => ['required', 'string'],
            'departamento_id' => ['required', 'integer'],
            'municipio_id' => ['required', 'integer'],
            'calle' => ['required', 'string'],
            'casa' => ['required', 'string'],
            'lat' => ['string', 'nullable'],
            'long' => ['string', 'nullable'],
        ]);

        $repass = Hash::make($request->password);
        $request['password'] = $repass;
        $request['status'] = false;

        $user = User::create($request->all());

        $user->assignRole($request->role);

        return response()->json($user, 200);
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

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    private function authAttemps(Request $request): \Illuminate\Http\JsonResponse
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
}
