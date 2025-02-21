<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('login', 'Api\\AuthController@login');
Route::post('register', 'Api\\AuthController@register');

Route::group(['middleware' => 'apiToken'], function ($router) {
    Route::post('logout', 'Api\\AuthController@logout');
    Route::get('me', 'Api\\AuthController@me');

    Route::get('dashboard', 'Api\\DashboardController@index');

    Route::get('applications', 'Api\\ApplicationsController@index');
});
