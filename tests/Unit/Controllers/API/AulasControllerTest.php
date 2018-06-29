<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 08/06/18
 * Time: 00:54
 */

namespace Tests\Unit\Controllers\API;

use App\Aula;
use App\Http\Controllers\AulasController;
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
        
        $controller = new AulasController();
        
        $aulas = $controller->index();
        
        $response = $this->call('GET', '/api/aulas');
        $response->assertStatus(200);
        $this->assertEquals($aulas, $response->getContent());

    }

}
