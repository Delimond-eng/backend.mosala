<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['cors'])->group(function (){

    /**
     * =================== ROUTE POST ==================
    */

    //Route pour créer un candidat de la formation
    Route::post('/formation.save.candidate', [\App\Http\Controllers\AppController::class, 'createFormationCandidates']);

    //Route pour supprimer un candidat de la liste
    Route::get('formation.candidate.delete/{id}', [\App\Http\Controllers\AppController::class,'deleteFormationCandidate']);

    //Route pour voir les candidats de la formation
    Route::get('/formation.candidates', [\App\Http\Controllers\AppController::class, 'viewAllFormationCandidates']);

    //Route pour sauvegarder le paiement
    Route::post('formation.save.paiement', [\App\Http\Controllers\AppController::class, 'savePaymentForFormationCandidate']);

    //Route pour créer un candidat
    Route::post('/candidate.create', [\App\Http\Controllers\AppController::class, 'createCandidate']);

    //Route pour recuperer la liste de tous les candidats
    Route::get('/candidates.all', [\App\Http\Controllers\AppController::class, 'viewAllCandidates']);

    //Route pour recuperer le candidat selectionné
    Route::get('/candidate.profile/{id}', [\App\Http\Controllers\AppController::class, 'viewCandidateProfil']);

});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});