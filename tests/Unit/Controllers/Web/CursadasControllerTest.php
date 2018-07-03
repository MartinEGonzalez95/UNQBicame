<?php
/**
 * Created by PhpStorm.
 * User: gaston
 * Date: 11/06/18
 * Time: 20:28
 */

namespace Tests\Unit\Controllers\Web;


use App\Aula;
use App\Cursada;
use App\Materia;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class CursadasControllerTest extends TestCase
{

    use  RefreshDatabase;
    use WithoutMiddleware;
    public $materia;
    public $aula;

    public function setUp()
    {
        parent::setUp();

        $this->aula = new Aula();
        $this->aula->nombre = '37b';
        $this->aula->save();

        $this->materia = new Materia();
        $this->materia->nombre = 'Objetos 1';
        $this->materia->save();

    }


    public function testSeBorraUnaCursada(){

        $cursada = new Cursada();

        $cursada->dia = 'lunes';
        $cursada->hora_inicio = '18:00';
        $cursada->hora_fin = '22:00';

        $cursada->aula()->associate($this->aula);
        $cursada->materia()->associate($this->materia);

        $cursada->save();

        $idCursadaABorrar = $cursada->id;

        # Route::delete('/cursadas/{id}', 'CursadasController@destroy');
        $response = $this->delete( '/cursadas/'.    $idCursadaABorrar );

        $response->assertStatus(302);
        $this->assertCount(0,Cursada::all());

    }


}