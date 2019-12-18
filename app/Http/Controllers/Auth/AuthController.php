<?php

namespace App\Http\Controllers\Auth;

use App\Acme\RegistrationMailer;
use App\Configuration;
use App\Events\BlockAttempsUsers;
use App\Http\Requests\UserRequest;
use App\Listeners\UserRegistration;
use App\Mail\UserRegistrationAdmin;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use \Laravel\Passport\Http\Controllers\AccessTokenController as AccessTokenController;
use Laravel\Passport\TokenRepository;
use Lcobucci\JWT\Parser as JwtParser;
use League\OAuth2\Server\AuthorizationServer;
use OwenIt\Auditing\Models\Audit;

class AuthController extends AccessTokenController
{
    use AuthenticatesUsers;

    /**
     * @var int
     */
    private $maxAttempts; // Default is 5


    public function __construct()
    {
        $this->setMaxAttempt(Configuration::find(6)->value);
    }

    /**
     * @param $num
     */
    private function setMaxAttempt($num)
    {
        $this->maxAttempts = $num;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|string
     */
    public function login(Request $request)
    {
        //verificamos credenciales de usuario
        $credentials = $request->only('email', 'password');
        //Si el usuarios a fallado varios intentos
        if ($this->hasTooManyLoginAttempts($request)) {
            // aqui cerramos al usuario permanentemente
            event(new BlockAttempsUsers($request));
        }

        // necesitamos que $checkStatus tenga valor
        $checkStatus = User::where('email', $request->email)->first();

        if ()

        if ($checkStatus->status == false) {
            return \response()->json('La Cuenta esta bloqueada, solicite procedimiento de desbloqueo al administrador del sistema', 401);
        }

        if (Auth::attempt($credentials)) {
            return $this->authAttemps($request);
        } else {
            //Contador de las veces que intenta login sin exito
            $this->incrementLoginAttempts($request);
            return "Fallo el Login...";
        }
    }

    /**
     * @param UserRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(UserRequest $request)
    {
        $register = new \App\Acme\UserRegistration($request);
        $user = $register->handler();
        $mail = new \App\Acme\RegistrationMailer($user);
        $mail->handler();
        return response()->json($user, 200);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth('api')->user()->tokens->each(function ($token, $key) {
            $token->delete();
        });

        $data = [
            'user_type' => "App\User",
            'auditable_id' => auth()->user()->id,
            'auditable_type' => "Logout",
            'event'      => "Logout",
            'url'        => request()->fullUrl(),
            'ip_address' => request()->getClientIp(),
            'user_agent' => request()->userAgent(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'user_id'    => auth()->user()->id,
        ];

        //create audit trail data
        $details = Audit::create($data);

        return response()->json('Logged out', 200);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadImagesRegister(Request $request)
    {
        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:150000',
        ]);

        $imageName = time() . '.' . request()->image->getClientOriginalExtension();

        request()->image->move(public_path('images/registro/'), $imageName);

        return \response()->json($imageName, 200);

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

        $data = [
            'user_type' => "App\User",
            'auditable_id' => auth()->user()->id,
            'auditable_type' => "Logged In",
            'event'      => "Logged In",
            'url'        => request()->fullUrl(),
            'ip_address' => request()->getClientIp(),
            'user_agent' => request()->userAgent(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'user_id'    => auth()->user()->id,
        ];

        //create audit trail data
        $details = Audit::create($data);

        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString()
        ]);
    }
}
