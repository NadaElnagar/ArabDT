<?php

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



Route::group(['prefix' => 'items'], function () {
    Route::get('/', [\App\Http\Controllers\ItemApiController::class, 'index']);
    Route::get('/{id}', [\App\Http\Controllers\ItemApiController::class, 'show']);
    Route::post('/', [\App\Http\Controllers\ItemApiController::class, 'store']);
});
Route::get('/items_statistics', [\App\Http\Controllers\ItemApiController::class, 'statistics']);
