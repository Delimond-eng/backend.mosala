<?php

namespace App\Http\Controllers;

use App\Mail\FormationNotify;
use App\Models\Candidate;
use App\Models\FormationCandidate;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AppController extends Controller
{

    /**
     * Creation d'un nouveau candidat
     * @author Gaston delimond
     * @DateTime 05/03/2024
     * @param Request $request
     * @return JsonResponse
    */

    public function createCandidate(Request $request):JsonResponse
    {
        try {
            $data = $request->validate([
                'nom' => 'required|string',
                'postnom' => 'required|string',
                'prenom' => 'required|string',
                'email' => 'required|string|unique:candidat,email',
                'telephone' => 'required|string',
                'adresse' => 'required|string',
                'diplome' => 'required|string',
                'domaine' => 'required|string',
                'description' => 'required|string',
                'profile' => 'required|image|mimes:jpeg,png,jpg',
                'cv' => 'required|file|mimes:jpeg,jpg,png,pdf',
            ]);
            $protocol = $request->secure() ? 'https://' : 'http://';
            $domain = $request->getHttpHost();

            //Store file to directory
            if($request->hasFile('profile')){
                $image = $request->file('profile');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/profiles'), $imageName);
                $data["profile"]=$protocol .$domain.'/uploads/profiles/' . $imageName;
            }
            if($request->hasFile("cv")){
                $cv = $request->file('cv');
                $cvName = time(). '.'.$cv->getClientOriginalExtension();
                $cv->move(public_path('uploads/cv'), $cvName);
                if($cv->getClientOriginalExtension() == "pdf"){
                    $data['cv']= $protocol .$domain.'/uploads/cv/'.$cvName;
                }else{
                    $data['cv']= null;
                }

                if($cv->getClientOriginalExtension() != "pdf"){
                    $data['image'] = $protocol .$domain.'/uploads/cv/'. $cvName;
                }
                else{
                    $data['image'] = null;
                }
            }

            $result = Candidate::create([
                'nom' => $data['nom'],
                'postnom' => $data['postnom'],
                'prenom' => $data['prenom'],
                'email' => $data['email'],
                'telephone' => $data['telephone'],
                'adresse' => $data['adresse'],
                'diplome' => $data['diplome'],
                'domaine' => $data['domaine'],
                'description' => $data['description'],
                'profil' => $data['profile'],
                'cv' => $data['cv'],
                'image' => $data['image'],
            ]);

            return response()->json([
                "status"=>"success",
                "candidate"=>$result
            ]);
        }
        catch (\Illuminate\Validation\ValidationException $e){
            $errors = $e->validator->errors()->all();
            return response()->json(['errors' => $errors ]);
        }
        catch (\Illuminate\Database\QueryException $e){
            return response()->json(['errors' => $e->getMessage() ]);
        }
    }


    /**
     * Recuperation de la liste de tous les candidats
     * @author Gaston delimond
     * @DateTime 04/03/2024
     * @return JsonResponse
    */
    public function viewAllCandidates():JsonResponse
    {
        $candidates = Candidate::select("candidat_id", "nom", "postnom", "prenom", "email", "telephone", "adresse", "diplome", "description", "domaine")
            ->where("statut", "actif")
            ->orderByDesc('candidat_id')
            ->distinct('email')
            ->get();
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

    /**
     * *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createFormationCandidates(Request $request) : JsonResponse{
        try{
            $data = $request->validate([
                "nom"=>"required|string",
                "prenom"=>"required|string",
                "telephone"=>"required|string|min:10",
                "current_job"=>"nullable|string",
                "email"=>"nullable|email|unique:formation_candidates,email",
                "adresse"=>"nullable|string",
                "hobbie"=>"nullable|string",
                "ville"=>"required|string"
            ]);
            $currentCandidate = FormationCandidate::create($data);
            if(isset($currentCandidate)){
                try {
                    if ($currentCandidate->email) {
                        Mail::to($currentCandidate->email)->send(new FormationNotify($currentCandidate));
                    }
                } catch (\Symfony\Component\Mailer\Exception\TransportException $e) {
                }
                return response()->json([
                    "status"=>"success",
                    "formation_candidate"=>$currentCandidate
                ]);
            }
            else{
                return response()->json(['errors' => "Echec d'enregistrement de votre candidature !" ]);
            }
        }
        catch (\Illuminate\Validation\ValidationException $e){
            $errors = $e->validator->errors()->all();
            return response()->json(['errors' => $errors ]);
        }
        catch (\Illuminate\Database\QueryException $e){
            return response()->json(['errors' => $e->getMessage() ]);
        }
    }

    public function viewAllFormationCandidates() : JsonResponse{
        $datas = FormationCandidate::orderBy('id','desc')->get();
        return response()->json([
            'status'=> 'success',
            'formation_candidates'=> $datas
        ]);
    }
}