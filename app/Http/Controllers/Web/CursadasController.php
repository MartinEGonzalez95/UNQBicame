<?php

namespace App\Http\Controllers\Web;

use App\Aula;
use App\Cursada;
use App\Materia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CursadasController extends Controller
{
    public function index()
    {

        $cursadas = Cursada::all();

        return view('cursadas.index')->with(['cursadas' => $cursadas]);

    }

    public function store(Request $request)
    {
        $params = $request->all();

        $cursada = new Cursada();

        $cursada->dia = $params['dia'];
        $cursada->hora_inicio = $params['hora_inicio'];
        $cursada->hora_fin = $params['hora_fin'];

        $aula = Aula::find($params['aula']);

        $materia = Materia::find($params['materia']);

        $cursada->aula()->associate($aula);
        $cursada->materia()->associate($materia);

        $cursada->save();

	return redirect('/cursadas');
    }

    public function create()
    {
        $aulas = Aula::all();
        $materias = Materia::all();

        return view('cursadas.create')->with(['aulas' => $aulas, 'materias' => $materias]);

    }
}
