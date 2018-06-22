<?php

namespace App\Http\Controllers;

use App\Cursada;
use Illuminate\Http\Request;

class CursadasController extends Controller
{
    public function index()
    {

        return Cursada::all();

    }
}
