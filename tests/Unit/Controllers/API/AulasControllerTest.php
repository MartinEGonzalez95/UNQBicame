<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 08/06/18
 * Time: 00:54
 */

namespace Tests\Unit\Controllers\API;

use App\Aula;
use App\Http\Controllers\Web\AulasController;
use App\Sector;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class AulasControllerTest extends TestCase
{

    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();

        $aula  = new Aula();
        $sector = new Sector(['nombre'=> 'Ala Izquierda','piso'=>1]);
        $sector->save();

        $aula->sector()->associate($sector);
        $aula->save();
    }

    public function testIndex()
    {
        $aulas = Aula::all();

        # Route::get('/aulas', 'AulasController@index');
        $response = $this->call('GET', '/api/aulas');

        $response->assertStatus(200);
        $this->assertEquals($aulas, $response->getContent());

    }

    public function testPostAulaNueva()
    {
        Session::start();

        $request = Request::create('/aulas/agregar', 'POST', [
            'aulaNombre' => '37',
            'sector_id' => 1,
            '_token' => csrf_token()
        ]);
        $controller = new AulasController();

        #Ruta donde se usa el controlador.
        # Route::post('/aulas/agregar', 'AulasController@store');
        $response = $controller->store($request);

        $aulas = Aula::all();
        print($aulas);

        $this->assertCount(2, $aulas);
        $this->assertEquals(200, $response->getStatusCode());

    }





}
