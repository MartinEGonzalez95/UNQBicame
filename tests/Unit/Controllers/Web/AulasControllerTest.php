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

    public function setUp()
    {
        parent::setUp();


        $this->sector = new Sector(['nombre'=> 'Ala Izquierda','piso'=>1]);
        $this->sector->save();

    }


    public function testStore()
    {

        $jsonPost = [
            '_token'=> csrf_token(),
            'sector_id'=> $this->sector->id,
            'aulaNombre' => '37B'
        ];


        # Route::post('/aulas/agregar', 'AulasController@store');
        $response = $this->post( '/aulas/agregar', $jsonPost);

        $aulas = Aula::all();

        $this->assertCount(1,$aulas);
        $this->assertEquals(302, $response->status());

    }
}