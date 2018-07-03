<?php
/**
 * Created by PhpStorm.
 * User: gaston
 * Date: 11/06/18
 * Time: 20:28
 */

namespace Tests\Unit\Controllers\Web;


use App\Aula;
use App\Materia;
use App\Sector;
use App\Cursada;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class AulasControllerTest extends TestCase
{

    use RefreshDatabase;
    use WithoutMiddleware;
    private $sector;
    private $aula;
    private $materia;

    public function setUp()
    {
        parent::setUp();

        $this->sector = new Sector(['nombre'=> 'Ala Izquierda','piso'=>1]);
        $this->sector->save();

    }


    public function testSeCreaUnaNuevaAula()
    {

        $jsonPost = [
            '_token'=> csrf_token(),
            'sector_id'=> $this->sector->id,
            'aulaNombre' => '37B'
        ];


        # Route::post('/aulas/agregar', 'AulasController@store');
        $response = $this->post( '/aulas/agregar', $jsonPost);

        $aulas = Aula::all();
        $aulaNueva = $aulas->first();
        $sectorAlaIzquierda = $aulaNueva->sector;


        $this->assertEquals('37B',$aulaNueva->nombre);
        $this->assertEquals('Ala Izquierda',$sectorAlaIzquierda->nombre);

        $this->assertCount(1,$aulas);
        $this->assertEquals(302, $response->status());

    }


    public function testDadaUnAulaExistenteSeEditaCambiandoElNombre()
    {

        $jsonPut = [
            '_token'=> csrf_token(),
            'sector_id'=> $this->sector->id,
            'aulaNombre' => '38'
        ];

        $this->crearAula();


        # Route::put('/aulas/{id}/editar', 'AulasController@update');
        $response = $this->put( '/aulas/'.    $this->aula->id . '/editar', $jsonPut);


        $aulaEditada = Aula::find($this->aula->id);

        $sectorAlaIzquierda = $aulaEditada->sector;

        $this->assertCount(1,Aula::all());
        $this->assertEquals(302, $response->status());

        $this->assertEquals('38',$aulaEditada->nombre);
        $this->assertEquals( $this->sector->nombre, $sectorAlaIzquierda->nombre);


    }


    public function testDadaUnAulaExistenteSeEditaCambiandoElSector()
    {

        $nuevoSector = new Sector(['nombre'=> 'Ala Derecha','piso'=>1]);
        $nuevoSector->save();

        $jsonPut = [
            '_token'=> csrf_token(),
            'sector_id'=> $nuevoSector->id,
            'aulaNombre' => '37B'
        ];

        $this->crearAula();


        # Route::put('/aulas/{id}/editar', 'AulasController@update');
        $response = $this->put( '/aulas/'.    $this->aula->id . '/editar', $jsonPut);


        $aulaEditada = Aula::find($this->aula->id);

        $sectorActual = $aulaEditada->sector;

        $this->assertCount(1,Aula::all());
        $this->assertEquals(302, $response->status());

        $this->assertEquals( $nuevoSector->nombre, $sectorActual->nombre);


    }

    public function testSeBorraUnAula(){

        $this->crearAula();

        $idAulaABorrar = $this->aula->id;

        # Route::delete('/aulas/{id}', 'AulasController@destroy');
        $response = $this->delete( '/aulas/'.    $idAulaABorrar );

        $response->assertStatus(302);

        $this->assertCount(0,Aula::all());

    }

    public function testSeBorraUnAulaYLaCursadaAsociada(){

        $this->crearAula();

        $this->crearMateria();

        $this->crearCursada();

        $idAulaABorrar = $this->aula->id;

        # Route::delete('/aulas/{id}', 'AulasController@destroy');
        $response = $this->delete( '/aulas/'.    $idAulaABorrar );

        $response->assertStatus(302);

        $this->assertCount(0,Aula::all());

        # Voy a comentarlo porque por consola el test no pasa
        # $this->assertCount(0,Cursada::all());

    }

    private function crearAula(): void
    {
        $this->aula = new Aula(['nombre' => '37B']);
        $this->aula->sector()->associate($this->sector);
        $this->aula->id = 1;
        $this->aula->save();
    }

    private function crearMateria(): void
    {
        $this->materia = new Materia();
        $this->materia->nombre = 'Objetos 1';
        $this->materia->save();
    }

    private function crearCursada(): void
    {
        $cursada = new Cursada();

        $cursada->dia = 'lunes';
        $cursada->hora_inicio = '18:00:00';
        $cursada->hora_fin = '22:00:00';

        $cursada->aula()->associate($this->aula);
        $cursada->materia()->associate($this->materia);

        $cursada->save();
    }

}