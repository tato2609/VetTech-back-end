<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Races\Http\Controllers\RacesController;
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
Route::get('races',             [RacesController::class,'index']);
Route::get('races/{id}',        [RacesController::class,'show']);
Route::get('destroy/races/{id}',[RacesController::class,'destroy']);
Route::post('races',            [RacesController::class,'store']);
Route::put('put/races',         [RacesController::class,'update']);
