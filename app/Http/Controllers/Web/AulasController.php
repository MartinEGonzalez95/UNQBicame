<?php

namespace App\Http\Controllers\Web;

use App\Aula;
use App\Http\Controllers\Controller;
use App\Sector;
use Illuminate\Http\Request;

class AulasController extends Controller
{
    
    public function create()
    {
        
        $sectores = Sector::all();

        return view('aulas.create')->with(['sectores' => $sectores]);
        
    }

    public function index(){
        
        $aulas = Aula::with('Sector')->get();
        
        return view('aulas.view')->with(['aulas' => $aulas]);
    }

    public function store(Request $request)
    {

        $value = $request->get('sector_id');
        $sector = Sector::find($value);

        $nuevaAula=new Aula();

        $nuevaAula->sector()->associate($sector);

        $nuevaAula->save();

        return redirect('/aulas');
    }




}