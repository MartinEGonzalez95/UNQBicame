<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 08/06/18
 * Time: 00:54
 */

namespace Tests\Unit\Controllers\API;

use App\Aula;
use App\Sector;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

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

        $this->assertEquals(200, $response->status());
        $this->assertEquals($aulas, $response->getContent());

    }

}
