<?php

namespace App\Http\Controllers;

use App\Aula;
use Illuminate\Http\Request;

class AulasController extends Controller
{
    public function index()
    {
        $aulas = Aula::all();
        
        return $aulas;
    }
}
