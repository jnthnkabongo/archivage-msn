<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\indexController;


Route::get('/', [indexController::class, 'index']);
Route::get('/dashboard', [indexController::class, 'dashboard'])->name('dashboard');
Route::get('/utilisateurs', [indexController::class, 'liste_utilisateurs'])->name('liste-utilisateurs');