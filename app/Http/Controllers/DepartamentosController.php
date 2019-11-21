<?php

namespace App\Http\Controllers;

use App\Departamentos;
use Illuminate\Http\Request;

class DepartamentosController extends Controller
{

    public function __construct()
    {
    }

    public function index()
    {
        $departamentos = Departamentos::select('id as value', 'departamento as viewValue')->get();
        return response()->json($departamentos, 200);
    }
}
