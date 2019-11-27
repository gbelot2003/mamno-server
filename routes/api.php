<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/v1/user', function (Request $request) {
    $id = auth('api')->user()->getAuthIdentifier();
    $user = \App\User::where('id', $id)->with('roles')->first();
    return $user;
});

Route::post('v1/login', 'Auth\AuthController@login');
Route::post('v1/register', 'Auth\AuthController@register');
Route::middleware('auth:api')->get('v1/logout', 'Auth\AuthController@logout');

Route::middleware('auth:api')->get('/v1', function (){
   return response()->json(['nombre' => 'hola'], 200);
});

Route::middleware('auth:api')->resource('v1/users', 'UserController');
Route::middleware('auth:api')->post('v1/configuraciones/{id}', 'UserController@configuraciones');

Route::get('v1/departamentos', 'DepartamentosController@index');
Route::get('v1/municipios/{dep}', 'MunicipiosController@index');
Route::get('v1/roles', 'RolesController@index');
Route::get('v1/grupos', 'GrupoController@index');

Route::get('v1/configuraciones/nuevos', 'InitialConfigController@newUsers');
Route::get('v1/configuraciones/changeStatus/{id}', 'InitialConfigController@changeStatus');
