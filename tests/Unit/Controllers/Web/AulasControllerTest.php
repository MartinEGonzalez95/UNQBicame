<?php
/**
 * Created by PhpStorm.
 * User: gaston
 * Date: 11/06/18
 * Time: 20:28
 */

namespace Tests\Unit\Controllers\Web;


use App\Aula;
use App\Sector;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class AulasControllerTest extends TestCase
{

    use  RefreshDatabase;
    use WithoutMiddleware;
    private $sector;
    private $aula37B;

    public function setUp()
    {
        parent::setUp();


        $this->sector = new Sector(['nombre'=> 'Ala Izquierda','piso'=>1]);
        $this->sector->save();

        $this->aula37B = new Aula(['nombre'=> '37B']);
        $this->aula37B->sector()->associate($this->sector);
        $this->aula37B->id = 1;
        $this->aula37B->save();
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

        $this->assertCount(2,$aulas);
        $this->assertEquals(302, $response->status());

    }


    public function testDadaUnAulaExistenteSeEditaCambiandoElNombre()
    {

        $jsonPut = [
            '_token'=> csrf_token(),
            'sector_id'=> $this->sector->id,
            'aulaNombre' => '38'
        ];


        # Route::put('/aulas/{id}/editar', 'AulasController@update');
        $response = $this->put( '/aulas/'.    $this->aula37B->id . '/editar', $jsonPut);


        $aulaEditada = Aula::find($this->aula37B->id);

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


        # Route::put('/aulas/{id}/editar', 'AulasController@update');
        $response = $this->put( '/aulas/'.    $this->aula37B->id . '/editar', $jsonPut);


        $aulaEditada = Aula::find($this->aula37B->id);

        $sectorActual = $aulaEditada->sector;

        $this->assertCount(1,Aula::all());
        $this->assertEquals(302, $response->status());

        $this->assertEquals( $nuevoSector->nombre, $sectorActual->nombre);


    }


}