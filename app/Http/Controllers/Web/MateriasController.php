<?php

namespace App\Http\Controllers\Web;

use App\Materia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MateriasController extends Controller
{


    public function index()
    {

        $materias =  Materia::all();

        return view('materias.view')->with(['materias' => $materias]);
    }

    public function create()
    {


        return view('materias.create');

    }

    public function store(Request $request)
    {


        $materia = new Materia(
            ['nombre' => $request->get('materiaNombre')]
        );
        $materia->save();

        return redirect('/materias');

    }



    public function edit($id)
    {
        $materia = Materia::find($id);

        return view('materias.edit')
            ->with('materia', $materia);
    }


    public function update(Request $request)
    {
        dd($request);
       $materiaAModificar = Materia::find($request->get('id'));

        $materiaAModificar->nombre = $request->get('materiaNombre');

        $materiaAModificar->save();

        return redirect('/materias');
    }
}
