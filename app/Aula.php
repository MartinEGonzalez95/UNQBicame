<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }
}
