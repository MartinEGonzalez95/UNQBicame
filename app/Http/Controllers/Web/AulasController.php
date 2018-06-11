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

        $sectorID = $request->get('sector_id');
        $sector = Sector::find($sectorID);
        $nombre = $request->get('aulaNombre');

        $nuevaAula = new Aula(['nombre' => $nombre]);

        $nuevaAula->sector()->associate($sector);
        $nuevaAula->save();

        return redirect('/aulas');
    }




}