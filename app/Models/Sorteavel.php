<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sorteavel extends Model
{
    protected $fillable = [
        'nome',
        'matricula',
        'sorteado',
        'secretaria',
        'local',
    ];
}
