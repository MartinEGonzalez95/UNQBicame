<?php
/**
 * Created by PhpStorm.
 * User: gaston
 * Date: 15/06/18
 * Time: 16:34
 */

namespace App\Http\Controllers;


use App\Materia;

class MateriasControllerAPI extends Controller
{
    public function index()
    {

        $materias =  Materia::all();

        return $materias;
    }
}