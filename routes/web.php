<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\indexController;
use App\Http\Controllers\authController;
use Faker\Guesser\Name;

//Route::get('/', [indexController::class, 'index']);
Route::get('/', [authController::class, 'index'])->name('login');
Route::post('/login', [authController::class, 'soimission_login'])->name('soimission_login');

Route::middleware(['auth'])->group(function (){
    Route::get('/dashboard', [indexController::class, 'dashboard'])->name('dashboard');
    Route::get('/archives', [indexController::class, 'liste_archives'])->name('liste-archives');
    Route::get('/documents', [indexController::class, 'liste_documents'])->name('liste-documents');
    Route::get('/rechercher-documents', [indexController::class, 'rechercher_documents'])->name('rechercher-documents');
    Route::get('/documents/{document}/view', [indexController::class, 'view_document'])->name('view.document');
    Route::delete('/documents/{document}', [indexController::class, 'supprimer_document'])->name('supprimer-document');
    Route::get('/sous-categories/{categorie_id}', [indexController::class, 'get_sous_categories'])->name('get.sous-categories');
    Route::post('/documents-save', [indexController::class, 'enregistrer_fichier'])->name('enregistrer.document');
    Route::get('/utilisateurs', [indexController::class, 'liste_utilisateurs'])->name('liste-utilisateurs');
    Route::post('/utilisateurs-save', [indexController::class, 'enregistrer_utilisateur'])->name('enregistrer-utilisateur');
    Route::get('/services', [indexController::class, 'liste_services'])->name('liste-services');
    Route::get('/roles', [indexController::class, 'liste_roles'])->name('liste-roles');
    Route::get('/categories', [indexController::class, 'liste_categories'])->name('liste-categories');
    Route::get('/parametres', [indexController::class, 'parametres'])->name('parametres');
    Route::get('/statistiques', [indexController::class, 'statistiques'])->name('statistiques');
    Route::get('/historique', [indexController::class, 'historique'])->name('historique');
    Route::post('/categories', [indexController::class, 'create_category'])->name('create-category');
    Route::post('/sous-categories', [indexController::class, 'create_sous_category'])->name('create-sous-category');

    /////////////////// PARTIE UTILISATEUR
    Route::get('dashboard-user', [indexController::class, 'dashboard_user'])->name('dashboard-user');
    Route::get('liste-archives-user', [indexController::class, 'liste_archives_user'])->name('liste-archives-user');
    Route::get('liste-documents-user', [indexController::class, 'liste_documents_user'])->name('liste-documents-user');
    Route::get('rechercher-documents-user', [indexController::class, 'rechercher_documents_user'])->name('rechercher-documents-user');
    Route::get('telecharger-document/{id}', [indexController::class, 'telecharger_document'])->name('telecharger-document');
    Route::get('voir-document/{id}', [indexController::class, 'voir_document'])->name('voir-document');
    Route::get('liste-services-user', [indexController::class, 'liste_services_user'])->name('liste-services-user');
    Route::get('liste-categories-user', [indexController::class, 'liste_categories_user'])->name('liste-categories-user');
    Route::get('modifier-categorie/{id}', [indexController::class, 'modifier_categorie'])->name('modifier-categorie');
    Route::put('update-categorie/{id}', [indexController::class, 'update_categorie'])->name('update-categorie');
    Route::get('parametre-user', [indexController::class, 'parametre_user'])->name('parametre-user');
    Route::post('enregistrer-document-user', [indexController::class, 'enregistrer_fichier_user'])->name('enregistrer-document-user');
    Route::post('create-category-user', [indexController::class, 'create_category_user'])->name('create-category-user');
    Route::post('create-sous-category-user', [indexController::class, 'create_sous_category_user'])->name('create-sous-category-user');
    Route::post('/logout', [authController::class, 'logout'])->name('logout');
});

