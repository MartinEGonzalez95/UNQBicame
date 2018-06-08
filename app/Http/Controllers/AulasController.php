<?php

namespace App\Http\Controllers;

use App\Aula;

class AulasController extends Controller
{
    public function index()
    {
        $aulas = Aula::all();
        
        return $aulas;
    }
}
