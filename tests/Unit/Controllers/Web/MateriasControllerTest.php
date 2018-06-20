<?php
/**
 * Created by PhpStorm.
 * User: gaston
 * Date: 10/06/18
 * Time: 21:33
 */

namespace Tests\Unit\Controllers\Web;

use App\Materia;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class MateriasControllerTest extends TestCase
{
    use WithoutMiddleware;
    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();

        $materia = new Materia(['nombre'=>'Intro']);
        $materia->id = 1;
        $materia->save();

    }

    public function testStore()
    {

        $jsonPost = [
            '_token'=> csrf_token(),
            'materiaNombre' => 'Objetos 1'
        ];


        # Route::post('/materias/agregar', 'MateriasController@store');
        $response = $this->post( '/materias', $jsonPost);

        $materias = Materia::all();
        $this->assertCount(2,$materias);
        $this->assertEquals(302, $response->status());

    }

    public function testModificarUnaMateria()
    {

        $jsonPut = [
            '_token'=> csrf_token(),
            'id'=> 1,
            'materiaNombre' => 'Objetos 2'
        ];


        # Route::put('/materias/{materia}/editar', 'MateriasController@update');
        $response = $this->put( '/materias/'. 1 .'/editar' , $jsonPut);

        $materias = Materia::all();
        $objetos1 = $materias->first();

        $this->assertEquals('Objetos 2' , $objetos1->nombre);

        $this->assertCount(1,$materias);
        $this->assertEquals(302, $response->status());

    }


}
