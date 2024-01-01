<?php

use App\Http\Controllers\TempControler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

    Route::post('temp', [TempControler::class, 'temp']);

});


Route::group(['prefix' => 'temp'], function () {//ok
    Route::get('/', [TempControler::class, 'helloWorld']);
    Route::get('/micro', [TempControler::class, 'temp']);


});




