<?php

namespace App\Http\Controllers;

use App\Municipios;
use Illuminate\Http\Request;

class MunicipiosController extends Controller
{
    public function __construct()
    {
    }

    public function index($dep)
    {
        $muni = Municipios::where('departamento_id', $dep)->pluck('id', 'municipio');
        return response()->json($muni, 200);
    }
}
