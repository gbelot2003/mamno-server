<?php

namespace App\Http\Controllers;

use App\Mail\InformacionLogin;
use App\Mail\ResetedPassword;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Configuration;

class InitialConfigController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:Administrador_Sistema'])->except(['attempt', 'sePassword']);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * Listado de usuarios nuevos
     *
     * api/v1/configuraciones/nuevos
     */
    public function newUsers()
    {
        $nuevos = User::where('nuevo', true)->select('name', 'email', 'created_at')->get();

        $user_mail = User::where('passwordAttempt', true)->select('name', 'email', 'created_at')->get();

        $active = User::where('status', true)->where('passwordAttempt', false)->get();

        $deactive = User::where('status', true)->where('status', false)->where('nuevo', false)->get();

        $users = array(
            'nuevos' => $nuevos,
            'espera' => $user_mail,
            'activos' => $active,
                'desactivos' => $deactive
        );

        return response()->json($users, 200);
    }

    /**
     * @param $id
     * @return bool
     * Cambio manual de estado de usuario
     *
     * v1/configuraciones/changeStatus/{id}
     */
    public function changeStatus($id)
    {
        $user = User::findOrFail($id);
        $user->nuevo = 0;
        $user->save();
        return 'true';
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     *
     *
     *  v1/configuraciones/attempt/{id}
     */
    public function attempt($id)
    {
        /** obtener usuario */
        $user = User::findOrFail($id);

        /** generar un nuevo password aleatorio */
        $password_string = str_random(40);
        $hashed_random_password = Hash::make($password_string);
        /** Guardamos el password */
        $user->password = $hashed_random_password;
        /** Cambiamos el estado del usuario */
        $user->passwordAttempt = true;
        $user->nuevo = false;
        $user->status = true;
        $user->save();

        Mail::to($user->email)
            ->send(new InformacionLogin($user, $password_string));

        // check for failures
        if (Mail::failures()) {
            $user->passwordAttempt = false;
            $user->nuevo = true;
            $user->status = false;
            $user->save();
            return response()->json("Error de envio", 500);
        }

        return response()->json($user, 200);
    }

    /**
     * @param Request $request
     * @param $id
     * configurar el nuevo password del nuevo usuario
     * @return \Illuminate\Http\JsonResponse
     *
     * v1/configuraciones/password-confirmation/{id}
     */
    public function sePassword(Request $request, $id)
    {
        $minimo = Configuration::find(5)->value;

        if (Configuration::find(1)->display == true){
            $mayusculas = Configuration::find(1)->value;
        }

        if (Configuration::find(1)->display == true){
            $minusculas = Configuration::find(2)->value;
        }

        if (Configuration::find(1)->display == true){
            $digitos = Configuration::find(3)->value;
        }

        if (Configuration::find(1)->display == true){
            $especiales = Configuration::find(4)->value;
        }

        $inputs = [
            'password' => $request->get('password'),
        ];


        $rules = [
            'password' => [
                'required',
                'string',
                "min:$minimo",
                $mayusculas,
                $minusculas,
                $digitos,
                $especiales,
            ],
        ];


        $validation = \Validator::make( $inputs, $rules );

        if ( $validation->fails() ) {
            print_r( $validation->errors()->all() );
        }

        /** obtener usuario y password */
        $user = User::findOrFail($id);

        /** Hashamos el nuevo passoword */
        $hashed_random_password = Hash::make($request->get('password'));

        /** Guardamos el password */
        $user->password = $hashed_random_password;

        /** Cambiamos el estado de password */
        $user->passwordAttempt = false;

        $user->save();

        return response()->json($user, 200);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     *
     * v1/configuraciones/cancel-access/{id}
     */
    public function cancelAccess($id)
    {
        /** obtener usuario y password */
        $user = User::findOrFail($id);
        $user->status = false;
        $user->save();

        return response()->json($user, 200);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     *
     * v1/configuraciones/password-reset/{id}
     */
    public function resetPassword($id)
    {
        /** obtener usuario y password */
        $user = User::findOrFail($id);

        /** generar un nuevo password aleatorio */
        $password_string = str_random(40);
        $hashed_random_password = Hash::make($password_string);
        /** Guardamos el password */
        $user->password = $hashed_random_password;
        $user->passwordAttempt = true;
        $user->save();

        Mail::to($user->email)
            ->send(new ResetedPassword($user, $password_string));

        return response()->json($user, 200);
    }


}
