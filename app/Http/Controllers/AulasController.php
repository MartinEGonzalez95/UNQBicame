<?php

namespace App\Http\Controllers;

use App\Aula;

class AulasController extends Controller
{
    public function index()
    {
        return Aula::with(['sector', 'cursadas'])->get();
    }
}
