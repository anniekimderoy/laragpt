<?php

use App\Http\Controllers\AccueilController;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\EnregistrementController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;

/*****************
 * ACCUEIL
 */
Route::get('/', [AccueilController::class, 'index'])
    ->name('accueil');

/******
 * CONNEXION ET ENREGISTREMENT
 */

 Route::get("/connexion", [ConnexionController::class, 'create'])
    ->name('connexion.create')
    ->middleware('guest');

Route::post("/connexion", [ConnexionController::class, 'authentifier'])
    ->name('connexion.authentifier')
    ->middleware('guest');

Route::post("/deconnexion", [ConnexionController::class, 'deconnecter'])
     ->name('deconnexion')
     ->middleware('auth');

Route::get("/enregistrement",[EnregistrementController::class, 'create'])
    ->name('enregistrement.create')
    ->middleware('guest');

Route::post("/enregistrement", [EnregistrementController::class, 'store'])
    ->name('enregistrement.store')
    ->middleware('guest');

/*****************
 * MESSAGES
 */
Route::get('/messages', [MessageController::class, 'index'])
    ->name('messages.index')
    ->middleware('auth');

// Affichage du formulaire d'ajout d'un message
Route::get('/messages/create', [MessageController::class, 'create'])
    ->name('messages.create')
    ->middleware('auth');

// Traitement du formulaire
Route::post('/messages', [MessageController::class, 'store'])
    ->name('messages.store')
    ->middleware('auth');
