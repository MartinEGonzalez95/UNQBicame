<?php
/**
 * Created by PhpStorm.
 * User: german
 * Date: 22/6/18
 * Time: 10:51 AM
 */

namespace Tests\Unit;


use App\Aula;
use App\Cursada;
use App\Materia;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CursadaTest extends TestCase
{

    use RefreshDatabase;

    public $materia;
    public $aula;

    public function setUp()
    {
        parent::setUp();
        Artisan::call('migrate');

        $this->aula = new Aula();
        $this->aula->nombre = '37b';
        $this->aula->save();

        $this->materia = new Materia();
        $this->materia->nombre = 'Objetos 1';
        $this->materia->save();

    }

    public function testTablaCursadasEstaVacia()
    {

        $this->assertEmpty(Cursada::all());

    }

    public function testCrearCursada()
    {

        $cursada = new Cursada();

        $cursada->dia = 'lunes';
        $cursada->hora_inicio = '18:00';
        $cursada->hora_fin = '22:00';

        $cursada->aula()->associate($this->aula);
        $cursada->materia()->associate($this->materia);

        $cursada->save();

        $cursada = new Cursada();

        $cursadas = Cursada::all();

        $cursadaPersistida = $cursadas->first();

        $this->assertCount(1, $cursadas);
        $this->assertEquals('lunes', $cursadaPersistida->dia);
        $this->assertEquals('18:00', $cursadaPersistida->hora_inicio);
        $this->assertEquals('22:00', $cursadaPersistida->hora_fin);
        $this->assertEquals('Objetos 1', $cursadaPersistida->materia->nombre);
        $this->assertEquals('37b', $cursadaPersistida->aula->nombre);


    }


}