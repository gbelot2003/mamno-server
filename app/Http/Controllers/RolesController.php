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
        $roles = Role::select('name as value', 'name as viewValue')->get();
        return response()->json($roles, 200);
    }
}
