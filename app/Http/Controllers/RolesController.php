<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $roles = Role::pluck('name', 'name');
        return response()->json($roles, 200);
    }
}
