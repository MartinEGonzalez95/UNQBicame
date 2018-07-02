<?php
/**
 * Created by PhpStorm.
 * User: gaston
 * Date: 02/07/18
 * Time: 15:27
 */

namespace Tests\Unit\Controllers\Web;

use App\Aula;
use App\Cursada;
use App\Http\Controllers\Web\CursadasController;
use App\Materia;
use App\Sector;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class CursadasControllerTest extends TestCase
{

    use  RefreshDatabase;
    use WithoutMiddleware;
    private $sector;
    private $aula37B;
    private $materiaIntro;

    public function setUp()
    {
        parent::setUp();


        $this->sector = new Sector(['nombre'=> 'Ala Izquierda','piso'=>1]);
        $this->sector->save();

        $this->aula37B = new Aula(['nombre'=> '37B']);
        $this->aula37B->sector()->associate($this->sector);
        $this->aula37B->id = 1;
        $this->aula37B->save();

        $this->materiaIntro =new Materia(['nombre'=> 'Introducción a la Programación']);
        $this->materiaIntro->id = 1;
        $this->materiaIntro->save();

    }

    public function testSeCreaUnaCursada()
    {


        $jsonPost = [
            '_token'=> csrf_token(),
            'aula'=> $this->aula37B->id,
            'materia'=>$this->materiaIntro->id,
            'dia'=> 'lunes',
            'hora_inicio' => '18:00',
            'hora_fin' => '22:00'
        ];


        # Route::post('/cursadas', 'CursadasController@store');
        $response = $this->post( '/cursadas', $jsonPost);

        $cursadas = Cursada::all();
        $cursadasNueva = $cursadas->first();

        $this->assertCount(1,$cursadas);
        $this->assertEquals(302, $response->status());



    }


    public function testSeBorraUnaCursada(){

        $cursada = new Cursada();

        $cursada->dia = 'lunes';
        $cursada->hora_inicio = '18:00';
        $cursada->hora_fin = '22:00';

        $cursada->aula()->associate($this->aula37B);
        $cursada->materia()->associate($this->materiaIntro);

        $cursada->save();

        $cursadas = Cursada::all();
        $idCursadaABorrar = $cursadas->first()->id;

        # Route::delete('/aulas/{id}', 'AulasController@destroy');
        $response = $this->get( '/cursadas/'.    $idCursadaABorrar . '/delete');

        $response->assertStatus(302);
        $this->assertCount(0,Cursada::all());

    }

}
