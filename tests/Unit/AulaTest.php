<?php
/**
 * Created by PhpStorm.
 * User: german
 * Date: 3/6/18
 * Time: 4:15 PM
 */

namespace Tests\Unit;


use App\Aula;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class AulaTest extends TestCase
{

    public function setUp()
    {
        parent::setUp();

        Artisan::call('migrate');
    }

    public function testCrearAula()
    {

        Aula::create();

        $aulas = Aula::all();

        $this->assertCount(1, $aulas);

    }

}