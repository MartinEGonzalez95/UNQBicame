<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $fillable = ['nombre'];

    public function cursadas()
    {
        return $this->hasMany(Cursada::class);
    }
}
