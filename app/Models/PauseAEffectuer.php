<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PauseAEffectuer extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'designation_pause',
        'heure_deb_pause',
        'heure_fin_pause',
        'num_seq_j'
    ];
    public function jour()
    {
        return $this->belongsTo(JourAEffectuer::class);

    }
}
