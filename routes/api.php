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

Route::get('/employer', 'EmployerController@index');
Route::post('/employer', 'EmployerController@store');

Route::get('/departement', 'DepartementController@index');
Route::get('/office', 'OfficeController@index');
Route::get('/position', 'PositionController@index');
