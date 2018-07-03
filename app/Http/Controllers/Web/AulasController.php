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

    public function show(Aula $aula)
    {

        return view('aulas.show')->with(['aula' => $aula]);

    }

    public function store(Request $request)
    {

        $request->validate([
            'aulaNombre' => 'required',
            'sector_id' => 'required|exists:sectores,id',
        ]);

        $sectorID = $request->get('sector_id');
        $sector = Sector::find($sectorID);
        $nombre = $request->get('aulaNombre');

        $nuevaAula = new Aula(['nombre' => $nombre]);

        $nuevaAula->sector()->associate($sector);
        $nuevaAula->save();

        return redirect('/aulas');
    }

    public function edit($id){

        $aula = Aula::find($id);
        $sectores = Sector::all();

        return view('aulas.edit')->with(["sectores"=> $sectores ,'aula' => $aula]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'aulaNombre' => 'required',
            'sector_id' => 'required|exists:sectores,id',
        ]);

        $aula = Aula::find($id);

        $aula->nombre = $request->get('aulaNombre');


        $sectorID = $request->get('sector_id');
        $sector = Sector::find($sectorID);
        $aula->sector()->associate($sector);



        $aula->save();

        return redirect('/aulas');
    }


}