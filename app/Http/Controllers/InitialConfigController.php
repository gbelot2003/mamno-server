<?php

namespace App\Http\Controllers;

use App\Mail\InformacionLogin;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class InitialConfigController extends Controller
{

    public function __construct()
    {
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * Listado de usuarios nuevos
     *
     * api/v1/configuraciones/nuevos
     */
    public function newUsers()
    {
        $users = User::where('nuevo', true)->select('name', 'email', 'created_at')->get();
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
     * @param $id
     * configurar el nuevo password del nuevo usuario
     * @return \Illuminate\Http\JsonResponse
     *
     * v1/configuraciones/password-confirmation/{id}
     *
     */
    public function sePassword(Request $request, $id)
    {
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
}
