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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('auth')->group(function () {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::get('refresh', 'AuthController@refresh');
    Route::group(['middleware' => 'auth:api'], function(){
        Route::get('user', 'AuthController@user');
        Route::post('logout', 'AuthController@logout');
    });
});

Route::group(['middleware' => 'auth:api', 'cors'], function(){
    // Users
    Route::get('users', 'UserController@index')->middleware('isAdmin');
    Route::delete('users/{id}', 'UserController@delete')->middleware('isAdmin');
    Route::get('users/{id}', 'UserController@show')->middleware('isAdminOrSelf');
    // Companies
    Route::post('registerCompany', 'CompanyController@create');
    Route::get('companies', 'CompanyController@index')->middleware('isAdminOrSelf');
    Route::delete('companies/{id}', 'CompanyController@delete')->middleware('isAdmin');
    Route::get('companies/{id}', 'CompanyController@show')->middleware('isAdminOrSelf');
    // Surveys
    //Route::get('surveys/{company_id}', 'SurveyController@index');
    Route::get('surveys/{id}/', 'SurveyController@index');
    Route::post('surveys', 'SurveyController@store');
    Route::delete('surveys/{id}/', 'SurveyController@delete');
    // Services Listing
    Route::post('servico/list/', 'ServicoListasController@store');
    Route::get('servico/list/', 'ServicoListasController@index');

    Route::post('servico', 'ServicoController@store');
    //Route::put('servico', 'ServicoController@update');
    // Client
    Route::get('users/find/{email}', 'UserController@find');
});
Route::get('servico/{id}/', 'ServicoController@index');
Route::get('servico/periods/{id}/', 'ServicoController@periods');