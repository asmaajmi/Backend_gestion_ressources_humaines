<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;

    protected $table = 'employes';
    protected $fillable = [
        'id',
        'cin_emp',
        'nom_emp',  
        'prenom_emp',
        'date_naissance_emp',
        'tel1_emp',
        'tel2_emp',
        'mob1_emp', 
        'mob2_emp', 
        'etat_civil_emp',
        'date_recrutement_emp',
        'salaire_base_emp',
        'role_emp',
        'seuil_conge_maladie',
        'seuil_conge_annuel',
        'seuil_conge_accidentel',
        'var_seuil_conge_maladie',
        'var_seuil_conge_annuel',
        'var_seuil_conge_accidentel',
        'salaire_journaliere',
        'niveau',
        'ecole',
        'dt_obtention',
        //'profile_image'
    ];
      

    public function heuresuppaeff()
    {
    return $this->belongsTo(HeureSuppAeffectuer::class,'id_emp','id');

    }

    public function heuresuppeff()
    {
    return $this->belongsTo(HeureSuppEff::class,'id_emp','id');

    }
 
    

}
