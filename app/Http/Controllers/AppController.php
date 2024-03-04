<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AppController extends Controller
{
    /**
     * Recuperation de la liste de tous les candidats
     * @author Gaston delimond
     * @DateTime 04/03/2024
     * @return JsonResponse
    */
    public function viewAllCandidates():JsonResponse
    {
        $candidates = Candidate::orderByDesc('candidat_id')->get();
        return response()->json([
            "status" => "success",
            "candidats"=>$candidates
        ]);
    }


    /**
     * Recuperation du profil du candidat (single)
     * @param int $id
     * @return JsonResponse
     * @author Gaston delimond
     * @DateTime 04/03/2024
     */

    public function viewCandidateProfil(int $id) :JsonResponse
    {
        $candidate = Candidate::where('candidat_id', $id)->first();
        return response()->json([
            "status" => "success",
            "candidat"=>$candidate
        ]);
    }
}
