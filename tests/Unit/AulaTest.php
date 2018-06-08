<?php
/**
 * Created by PhpStorm.
 * User: german
 * Date: 3/6/18
 * Time: 4:15 PM
 */

namespace Tests\Unit;


use App\Aula;
use App\Sector;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class AulaTest extends TestCase
{
    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();

        Artisan::call('migrate');
    }

    public function testCrearAula()
    {

        $aula  = new Aula();
        $sector = new Sector(['nombre'=> 'Ala Izquierda','piso'=>1]);
        $sector->save();

        $aula->sector()->associate($sector);
        $aula->save();

        $aulas = Aula::all();

        $this->assertCount(1, $aulas);

    }


    public function testCrearRelacionConAula()
    {

        $sector = new Sector(['nombre'=> 'Ala Izquierda','piso'=>1]);
        $sector->save();

        $aula = new Aula();
        $aula->sector()->associate($sector);
        $aula->save();


        $this->assertEquals($sector->id, $aula->sector_id);

    }


}