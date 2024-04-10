<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\SzamlaController;
use App\Http\Controllers\PenzmozgasController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('users', [UserController::class, 'index']);
Route::get('users/{id}', [UserController::class, 'show']);
Route::post('users', [UserController::class, 'store']);
Route::put('users/{id}', [UserController::class, 'update']);

Route::get('szamla', [SzamlaController::class, 'index']);
Route::get('szamla/{id}', [SzamlaController::class, 'show']);
Route::post('szamla', [SzamlaController::class, 'store']);
Route::put('szamla/{id}', [SzamlaController::class, 'update']);



Route::get('penzmozgas', [PenzmozgasController::class, 'index']);
Route::get('penzmozgas/{id}/{date}', [PenzmozgasController::class, 'show']);
Route::post('penzmozgas', [PenzmozgasController::class, 'store']);
Route::put('penzmozgas/{id}/{date}', [PenzmozgasController::class, 'update']);
