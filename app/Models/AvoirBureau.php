<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvoirBureau extends Model
{
    use HasFactory;
    protected $table='avoir_bureau';
    protected $fillable = [
        'id_serv',
        'id_bureau',  
        ];
}
