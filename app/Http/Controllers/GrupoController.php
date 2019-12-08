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
        $this->middleware(['role:Administrador_Sistema'])->except(['index']);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     *
     * api/v1/grupos
     */
    public function index()
    {
        $grupos = Grupo::select('id as value', 'name as viewValue')->get();
        return response()->json($grupos, 200);
    }


    public function show($id)
    {

    }


    public function store(Request $request)
    {

    }


    public function update(Request $request, $id)
    {

    }


    public function destroy($id)
    {

    }



}
