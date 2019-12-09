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
        $grupos = Grupo::select('id as value', 'name as viewValue')
            ->orderBy('id', 'DESC')->get();
        return response()->json($grupos, 200);
    }

    /**
     * show function
     *
     * @param [type] $id
     * @return void
     */
    public function show($id)
    {
        $grupo = Grupo::findOrFail($id);
        return response()->json($grupo, 200);
    }

    /**
     * store function
     *
     * @param Request $request
     * @return void
     *
     * @post api/v1/grupos
     */
    public function store(Request $request)
    {
        $grupo = Grupo::create($request->all());
        return response()->json($grupo, 200);
    }

    /**
     * update function
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     *
     * @post api/v1/grupos/{id}
     */
    public function update(Request $request, $id)
    {
        $grupo = Grupo::findOrFail($id);
        $grupo->update($request->all());
        return response()->json($grupo, 200);
    }

}
