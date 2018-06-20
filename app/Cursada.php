<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cursada extends Model
{

    protected $fillable = ['dia', 'hora_inicio', 'hora_fin', 'materia_id', 'aula_id'];

//    protected $dateFormat = 'H:i';

    function materia()
    {
        return $this->belongsTo(Materia::class);
    }

    function aula()
    {
        return $this->belongsTo(Aula::class);
    }
}
