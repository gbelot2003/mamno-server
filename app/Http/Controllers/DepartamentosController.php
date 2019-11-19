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
        $departamentos = Departamentos::pluck('id as value', 'departamento as viewValue');
        return response()->json($departamentos, 200);
    }
}
