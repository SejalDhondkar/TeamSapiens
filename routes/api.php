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
Route::prefix('auth')->group(function () {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::get('refresh', 'AuthController@refresh');

    Route::group(['middleware' => 'auth:api'], function(){
        Route::get('user', 'AuthController@user');
        Route::post('logout', 'AuthController@logout');
    });
});

Route::group(['middleware' => 'auth:api'], function(){
    // Users
    Route::get('users', 'UserController@index');
    Route::get('users/{id}', 'UserController@show');
    Route::get('roles',['uses'=>'RoleController@index','as'=>'roles.index']);
    Route::post('roles/store',['uses'=>'RoleController@store','as'=>'roles.store']);
    Route::get('roles/{id}/edit',['uses'=>'RoleController@edit','as'=>'roles.edit']);
    Route::put('roles/{id}/update',['uses'=>'RoleController@update','as'=>'roles.update']);
    
    Route::get('hospital/{id}/edit',['uses'=>'HospitalController@edit','as'=>'hospital.edit']);
    Route::post('hospital/{id}/update',['uses'=>'HospitalController@editdata','as'=>'roles.editdata']);
    Route::get('hospital/{id}/add',['uses'=>'HospitalController@add','as'=>'hospital.add']);
    Route::get('hospital/{id}/subtract',['uses'=>'HospitalController@subtract','as'=>'hospital.subtract']);

    Route::get('hospital/{id}/subtractvac',['uses'=>'HospitalController@subtract_vac','as'=>'hospital.subtract_vac']);

    
});

Route::group(['middleware' => 'guest'], function(){

    Route::get('/hospital/list',['uses'=>'HospitalController@list','as'=>'hospital.list']);
    Route::get('/doctor/list',['uses'=>'DoctorController@list','as'=>'doctor.list']);
});
