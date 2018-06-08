<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $table = 'sectores';

    protected $fillable = ['nombre','piso'];

    public function aulas()
    {
            return $this->hasMany(Aula::class);
    }

}
