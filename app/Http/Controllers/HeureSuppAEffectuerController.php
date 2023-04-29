<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\HeureSuppAEffectuer;

class HeureSuppAEffectuerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AllHeuresSupp()
    {
        $heureaeffs=HeureSuppAeffectuer::all();
        return $heureaeffs;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function CreateHeuresSupp(Request $request)
    {   

        $heureaeff = HeureSuppAeffectuer::create([
            'id_emp'=>$request->id_emp,
            'dt_heure_supp'=>$request->dt_heure_supp,
            'hr_debut'=>$request->hr_debut,
            'hr_fin'=>$request->hr_fin,
            'prix'=>$request->prix,
            'validation'=>'En Attente',
            ]);
            return response()->json($heureaeff);
    }

    public function getEmployeFromHeureSupplementaire($id_heure_supplementaire)
    {
        $employe = DB::table('employes')
            ->join('heure_supp_a_effectuers', 'employes.id', '=', 'heure_supp_a_effectuers.id_emp')
            ->select('employes.nom_emp', 'employes.prenom_emp')
            ->where('heure_supp_a_effectuers.id', '=', $id_heure_supplementaire)
            ->first();
        return response()->json($employe);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HeureSuppAEffectuer  $heureSuppAEffectuer
     * @return \Illuminate\Http\Response
     */
    public function show(HeureSuppAEffectuer $heureSuppAEffectuer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HeureSuppAEffectuer  $heureSuppAEffectuer
     * @return \Illuminate\Http\Response
     */
    public function editValidation(Request $request,$id)
    {
        $heureSupplementaire = HeureSuppAeffectuer::find($id);
        $heureSupplementaire->validation = $request->input('validation');
        $heureSupplementaire->save();
        return  $heureSupplementaire;
    }


    public function getHeureSuppById(int $id)
    {
       return HeureSuppAEffectuer::find($id); 
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HeureSuppAEffectuer  $heureSuppAEffectuer
     * @return \Illuminate\Http\Response
     */
    public function updateHeureSupp(Request $request, HeureSuppAEffectuer $heureSuppAEffectuer)
    {
        $id=$heureSuppAEffectuer->id;
        $id_emp = $request->input('id_emp');
        $dt_heure_supp = $request->input('dt_heure_a_eff');
        $hr_debut = $request->input('heuredebut');
        $hr_fin = $request->input('heurefin');
        $prix = $request->input('prix');

        return HeureSuppAeffectuer::where(['id'=>$id])->update(['id_emp' => $id_emp,'dt_heure_supp'=>$dt_heure_supp,
        'hr_debut'=>$hr_debut,'hr_fin'=>$hr_fin,'prix'=>$prix]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HeureSuppAEffectuer  $heureSuppAEffectuer
     * @return \Illuminate\Http\Response
     */
    public function destroyHeureSupp(HeureSuppAEffectuer $heureSuppAEffectuer)
    {
        $heureSuppAEffectuer->delete();
        return $heureSuppAEffectuer;
    
    }
}
