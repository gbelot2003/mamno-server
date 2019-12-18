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

Route::post('v1/login', 'Auth\AuthController@login');
Route::post('v1/register', 'Auth\AuthController@register');
Route::middleware('auth:api')->get('v1/logout', 'Auth\AuthController@logout');

Route::middleware('auth:api')->get('/v1/user', function (Request $request) {
    $id = auth('api')->user()->getAuthIdentifier();
    $user = \App\User::where('id', $id)->with('roles')->first();
    return $user;
});

Route::get('v1/departamentos', 'DepartamentosController@index');
Route::get('v1/municipios/{dep}', 'MunicipiosController@index');
Route::get('v1/roles', 'RolesController@index');
Route::get('v1/grupos', 'GrupoController@index');

Route::middleware('auth:api')->resource('v1/users', 'UserController')->only(['index', 'show', 'update', 'destroy']);
Route::middleware('auth:api')->post('v1/configuraciones/{id}', 'UserController@configuraciones');

Route::middleware('auth:api')->get('v1/configuraciones/nuevos', 'InitialConfigController@newUsers');
Route::middleware('auth:api')->get('v1/configuraciones/changeStatus/{id}', 'InitialConfigController@changeStatus');
Route::middleware('auth:api')->get('v1/configuraciones/attempt/{id}', 'InitialConfigController@attempt');
Route::middleware('auth:api')->post('v1/configuraciones/password-confirmation/{id}', 'InitialConfigController@sePassword');
Route::middleware('auth:api')->get('v1/configuraciones/password-reset/{id}', 'InitialConfigController@resetPassword');

Route::middleware('auth:api')->get('v1/grupos/{id}', 'GrupoController@show');
Route::middleware('auth:api')->post('v1/grupos/{id}', 'GrupoController@update');
Route::middleware('auth:api')->post('v1/grupos', 'GrupoController@store');

Route::middleware('auth:api')->get('v1/configuraciones/cancel-access/{id}', 'InitialConfigController@cancelAccess');

Route::middleware('auth:api')->get('v1/auditoria', 'AuditController@index');

/* Product Classes */
Route::resource('productClasses', 'ProductClasses\ProductClassesController', ['except' => ['create','edit']]);

/* Product Types */
Route::resource('productTypes', 'ProductTypes\ProductTypesController', ['except' => ['create','edit']]);

/* Product Qualities */
Route::resource('productQualities', 'ProductQualities\ProductQualitiesController', ['except' => ['create','edit']]);

/* Product Prices */
Route::resource('productPrices', 'ProductPrices\ProductPricesController', ['except' => ['create','edit']]);

/** No estan estos controladores */
/* Product Mass Measurements */
//Route::resource('productMassMeasurements', 'ProductMassMeasurements\ProductMassMeasurementsController', ['except' => ['create','edit']]);
//Route::resource('conversionMassMeasurements', 'conversionMassMeasurements\conversionMassMeasurementsController', ['except' => ['create','edit']]);

/* Products */
//Route::resource('products', 'Products\ProductsController', ['except' => ['create','edit']]);
//Route::resource('productLots', 'productLots\productLotsController', ['except' => ['create','edit']]);

Route::get('errors', 'ErrorController@index');
Route::get('errors/{id}', 'ErrorController@show');
Route::post('errors', 'ErrorController@store');
Route::put('errors/{id}', 'ErrorController@update');
Route::delete('errors/{id}', 'ErrorController@destroy');

Route::get('logs', 'LogController@index');
Route::get('logs/{id}', 'LogController@show');
Route::post('logs', 'LogController@store');
Route::put('logs/{id}', 'LogController@update');
Route::delete('logs/{id}', 'LogController@destroy');

Route::get('contents', 'ContentController@index');
Route::get('contents/{id}', 'ContentController@show');
Route::post('contents', 'ContentController@store');
Route::post('contents/uploadFile', 'ContentController@storeFile');
Route::put('contents/{id}', 'ContentController@update');
Route::delete('contents/{id}', 'ContentController@destroy');

Route::get('supportTypes', 'SupportTypeController@index');
Route::get('supportTypes/{id}', 'SupportTypeController@show');
Route::post('supportTypes', 'SupportTypeController@store');
Route::put('supportTypes/{id}', 'SupportTypeController@update');
Route::delete('supportTypes/{id}', 'SupportTypeController@destroy');

Route::get('supports', 'SupportController@index');
Route::get('supports/{id}', 'SupportController@show');
Route::post('supports', 'SupportController@store');
Route::put('supports/{id}', 'SupportController@update');
Route::delete('supports/{id}', 'SupportController@destroy');
