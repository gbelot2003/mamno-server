<?php

namespace App\Http\Controllers;

use App\Grupo;
use Illuminate\Http\Request;

class GrupoController extends Controller
{
    /**
     * GrupoController constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $grupos = Grupo::select('id as value', 'name as viewValue')->get();
        return response()->json($grupos, 200);
    }

}
