<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class AulasController extends Controller
{
    
    public function create()
    {
        
        $sectores = [
            
            'A' => [
                'Planta baja',
                '1er Piso',
                '2do Piso',
            ],
            'B' => [
                'Planta baja',
                '1er Piso',
                '2do Piso',
            ],
            'C' => [
                'Planta baja',
                '1er Piso',
            ],
            'D' => [
                '1er Piso'
            ],
            'E' => [
                'Planta baja'
            ],
            'F' => [
                'Planta baja',
                '1er Piso',
            ],
            'G' => [
                'Planta baja',
                '1er Piso',
                '2do Piso',
            ],
            
        ];
        
        return view('aulas.create')->with(['sectores' => $sectores]);
        
    }

    public function index(){
        return view('aulas.view');
    }
    
}