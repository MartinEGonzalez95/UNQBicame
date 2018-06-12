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
        $materia->save();

    }
    public function testIndex()
    {

        $materias = Materia::all();

        $response  = $this->get('/materias');

        
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


}
