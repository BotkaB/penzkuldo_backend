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


Route::get('szamla/felhasznaloszamlai/{id}', [SzamlaController::class, 'felhasznaloSzamlai']);
Route::get('szamla/szamlapenzmozgasai/{id}', [SzamlaController::class, 'szamlaPenzmozgasai']);


Route::get('penzmozgas', [PenzmozgasController::class, 'index']);
Route::get('penzmozgas/{id}/{date}', [PenzmozgasController::class, 'show']);
Route::post('penzmozgas', [PenzmozgasController::class, 'store']);
Route::put('penzmozgas/{id}/{date}', [PenzmozgasController::class, 'update']);


Route::middleware(['auth.basic'])->group(function(){
    Route::get('/bejelentkezettfelhasznalopenzmozgasai', [PenzmozgasController::class, 'bejelentkezettFelhasznaloPenzmozgasai']);
  
});