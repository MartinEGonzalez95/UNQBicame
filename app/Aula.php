<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    protected $fillable = ['nombre'];

    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }

    public function cursadas()
    {
        return $this->hasMany(Cursada::class);
    }

}
