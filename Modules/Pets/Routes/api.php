<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Pets\Http\Controllers\PetsController;
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
Route::get('pets',              [PetsController::class,'index']);
Route::get('pets/{id}',         [PetsController::class,'show']);
Route::get('destroy/pets/{id}', [PetsController::class,'destroy']);
Route::post('pets',             [PetsController::class,'store']);
Route::post('put/pets',         [PetsController::class,'update']);
