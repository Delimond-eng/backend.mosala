<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['cors'])->group(function (){

    /**
     * =================== ROUTE POST ==================
    */

    //Route pour recuperer la liste de tous les candidats
    Route::get('/candidates.all', [\App\Http\Controllers\AppController::class, 'viewAllCandidates']);

    //Route pour recuperer le candidat selectionné
    Route::get('/candidate.profile/{id}', [\App\Http\Controllers\AppController::class, 'viewCandidateProfil']);

});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
