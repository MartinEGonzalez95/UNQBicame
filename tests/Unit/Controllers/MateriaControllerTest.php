<?php
/**
 * Created by PhpStorm.
 * User: gaston
 * Date: 10/06/18
 * Time: 21:33
 */

namespace Tests\Unit\Controllers;

use App\Materia;
use PHPUnit\Framework\TestCase;

class MateriaControllerTest extends TestCase
{


    public function setUp()
    {
        parent::setUp();

    }
    public function testIndex()
    {

        $materias = Materia::all();

        $response  = $this->get('GET',' \MateriaController@index');

        self::assertEquals($materias,$response->content());
    }


    public function testStore()
    {



    }


}
