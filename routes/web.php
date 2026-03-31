<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\indexController;
use App\Http\Controllers\authController;

//Route::get('/', [indexController::class, 'index']);
Route::get('/', [authController::class, 'index'])->name('login');
Route::post('/login', [authController::class, 'soimission_login'])->name('soimission_login');
Route::get('/dashboard', [indexController::class, 'dashboard'])->name('dashboard');
Route::get('/archives', [indexController::class, 'liste_archives'])->name('liste-archives');
Route::get('/documents', [indexController::class, 'liste_documents'])->name('liste-documents');
Route::get('/documents/{document}/view', [indexController::class, 'view_document'])->name('view.document');
Route::get('/sous-categories/{categorie_id}', [indexController::class, 'get_sous_categories'])->name('get.sous-categories');
Route::post('/documents-save', [indexController::class, 'enregistrer_fichier'])->name('enregistrer.document');
Route::get('/utilisateurs', [indexController::class, 'liste_utilisateurs'])->name('liste-utilisateurs');
Route::get('/services', [indexController::class, 'liste_services'])->name('liste-services');
Route::get('/roles', [indexController::class, 'liste_roles'])->name('liste-roles');
Route::get('/categories', [indexController::class, 'liste_categories'])->name('liste-categories');
Route::get('/parametres', [indexController::class, 'parametres'])->name('parametres');
Route::get('/statistiques', [indexController::class, 'statistiques'])->name('statistiques');
Route::get('/historique', [indexController::class, 'historique'])->name('historique');
Route::post('/categories', [indexController::class, 'create_category'])->name('create-category');
Route::post('/sous-categories', [indexController::class, 'create_sous_category'])->name('create-sous-category');
Route::post('/logout', [authController::class, 'logout'])->name('logout');
