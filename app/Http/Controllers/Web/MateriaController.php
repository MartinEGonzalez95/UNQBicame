<?php

namespace App\Http\Controllers\Web;

use App\Materia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MateriaController extends Controller
{


    public function index()
    {

        $materias =  Materia::all();

        return view('materias.view')->with(['materias' => $materias]);
    }
}
