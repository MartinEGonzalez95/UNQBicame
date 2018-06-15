<?php
/**
 * Created by PhpStorm.
 * User: gaston
 * Date: 15/06/18
 * Time: 16:35
 */

namespace Tests\Unit\Controllers\API;


use App\Materia;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MateriasControllerAPITest extends TestCase
{


    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();

        $materia  = new Materia(['nombre'=> 'Intro']);

        $materia->save();
    }



    public function testIndex()
    {
        $materias = Materia::all();

        # Route::get('/aulas', 'AulasController@index');
        $response = $this->call('GET', '/api/materias');

        $this->assertEquals(200, $response->status());
        $this->assertEquals($materias, $response->getContent());

    }
}