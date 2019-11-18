<?php

use Illuminate\Http\Request;

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
    $id = $request->user()->id;
    $user = \App\User::where('id', $id)->with('roles')->first();
    return $user;

});

Route::post('v1/login', 'Auth\AuthController@login');
Route::post('/v1/register', 'Auth\AuthController@register');

Route::middleware('auth:api')->get('/v1', function (){
   return response()->json(['nombre' => 'hola'], 200);
});

Route::resource('v1/users', 'UserController');
