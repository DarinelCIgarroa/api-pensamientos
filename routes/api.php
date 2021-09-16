<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutenticarController;
use App\Http\Controllers\PensamientosController;

Route::post('register', [AutenticarController::class, 'register']);
Route::post('login', [AutenticarController::class, 'login']);


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::apiResource('pensamientos', PensamientosController::class);
    Route::post('logout', [AutenticarController::class, 'logout']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


