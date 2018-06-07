<?php


namespace Tests\Unit;


use App\Sector;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;


class SectorTest extends TestCase
{

    public function setUp()
    {
        parent::setUp();

        Artisan::call('migrate');
    }

    public function testLaTablaSectorEstaVacia()
    {

        $this->assertCount(0, Sector::all());

    }


    public function testCrearSector()
    {

        $sector = new Sector();
        $sector->nombre= 'Hall';
        $sector->piso= 1;

        $sector->save();

        $sectores = Sector::all();

        $this->assertCount(1, $sectores);

    }

}