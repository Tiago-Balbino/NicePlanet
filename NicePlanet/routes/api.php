<?php

use App\Http\Controllers\ProdutorController;
use App\Http\Controllers\PropriedadeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/produtor', [ProdutorController::class, 'create'])->name('produtor');
    Route::get('/produtor/{id}', [ProdutorController::class, 'getId'])->name('getProdutor');

    Route::post('/propriedade', [PropriedadeController::class, 'create'])->name('propiedade');
    Route::get('/propriedade/{id}', [PropriedadeController::class, 'getId'])->name('getPropiedade');
});

