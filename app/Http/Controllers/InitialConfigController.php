<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class InitialConfigController extends Controller
{

    public function __construct()
    {
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * api/v1/configuraciones/nuevos
     */
    public function newUsers()
    {
        $users = User::where('nuevo', true)->get();
        return response()->json($users, 200);
    }
}
