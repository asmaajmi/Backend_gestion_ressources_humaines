<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PointageEffectue extends Model
{
    use HasFactory;
    protected $table = "pointage_effectues";
   protected $fillable = [
       'id',
       'datepe',
       'heure_entree',
       'heure_sortie',
       'num_j',
       'mois',
       'annee',
       'id_emp',
       'des_j'
   ];

   public function employe()
    {
        return $this->belongsTo(Employe::class, 'id_emp');

    }
}
