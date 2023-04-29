<?php

namespace App\Http\Controllers;

use App\Models\Diplome;
use App\Models\Employe;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeController extends Controller
{
    public function getAllEmployes(){
        $employes = Employe::all();
        return $employes;
    }
    
    public function getAllService(){
        $services=Service::all();   
        return $services;
    }

    function createEmploye(Request $request){      
     
        $maladie=$request->input('seuil_conge_maladie');
        $annuel=$request->input('seuil_conge_annuel');
        $acciden=$request->input('var_seuil_conge_accidentel');
//        if ($request->hasFile('profile_image')) {
//            $file= $request->file('profile_image')->getClientOriginalName();
//            $filename  = pathinfo($file,PATHINFO_FILENAME);
//            $extension= $request->file('profile_image')->getClientOriginalExtension();
//            $complete_picture=str_replace(' ','_',$filename).'-'.rand().'_'.time().'.'.$extension;
//            $path=$request->file('profile_image')->storeAs('public/posts',$complete_picture) ;  
//        }
//        else
//        {
//            return response()->json(['message' => 'Missing file'], 422);
//
//        }
       
        $employe = Employe::create([
        'id'=>$request->input('id_emp'),
        'cin_emp'=>$request->input('cin_emp'),
        'nom_emp'=>$request->input('nom_emp'),
        'prenom_emp'=>$request->input('prenom_emp'),
        'date_naissance_emp'=>$request->input('date_naissance_emp'),
        'tel1_emp'=>$request->input('tel1_emp'),
        'tel2_emp'=>$request->input('tel2_emp'),
        'mob1_emp'=>$request->input('mob1_emp'),
        'mob2_emp'=>$request->input('mob2_emp'),
        'etat_civil_emp'=>$request->input('etat_civil_emp'),
        'date_recrutement_emp'=>$request->input('date_recrutement_emp'),
        'salaire_base_emp'=>$request->input('salaire_base_emp'),
        'seuil_conge_maladie'=>$maladie,
        'seuil_conge_annuel'=>$annuel,
        'seuil_conge_accidentel'=>$acciden,
        'var_seuil_conge_maladie'=>$maladie,
        'var_seuil_conge_annuel'=>$annuel,
        'var_seuil_conge_accidentel'=>$acciden,
        'salaire_journaliere'=>$request->input('salaire_emp')/30.5,
        'role_emp'=>$request->input('role_emp'),
        'niveau'=>$request->input('niveau'),
        'ecole'=>$request->input('ecole'),
        'dt_obtention'=>$request->input('dt_obtention')
        //'profile_image'=>$complete_picture
    ]);
        
    return response()->json($employe);

          
    }
 
    public function getEmployeById(int $id)
    {
       return Employe::find($id); 
       }


    public function deleteEmploye($id){
        return Employe::destroy($id);
    }


    public function updateEmploye(Request $request, Employe $employe){
      $employe->timestamps=false;
        $employe->update($request->all());
        return response()->json($employe);
    }
}
