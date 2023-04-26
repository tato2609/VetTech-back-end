<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Clients\Http\ClientsController;
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

// Route::middleware('auth:api')->get('/clients', function (Request $request) {
//     return $request->user();
// });

Route::get('clients',             'ClientsController@index');
Route::get('clients/{id}',        'ClientsController@edit');
Route::get('delete/clients/{id}', 'ClientsController@destroy');
Route::post('put/clients',        'ClientsController@update');
Route::post('clients',            'ClientsController@store');
// Route::post('clients',[ClientsController::class,'index'])->name('clients');
// Route::post('clients',[ClientsController::class,'store'])->name('clients');

