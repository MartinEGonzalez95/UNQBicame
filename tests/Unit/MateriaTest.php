<?php
/**
 * Created by PhpStorm.
 * User: gaston
 * Date: 09/06/18
 * Time: 18:24
 */

namespace Tests\Unit;


use App\Materia;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class MateriaTest extends TestCase
{

    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();

        Artisan::call('migrate');
    }

    public function testLaTablaSectorEstaVacia()
    {

        $this->assertCount(0, Materia::all());

    }


    public function testCrearSector()
    {

        $materia = new Materia();
        $materia->nombre = 'Objetos';

        $materia->save();

        $this->assertCount(1, Materia::all());

    }


}