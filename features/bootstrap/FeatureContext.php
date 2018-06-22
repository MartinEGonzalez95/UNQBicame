<?php

use App\Aula;
use App\Sector;
use Behat\Behat\Context\Context;
use Tests\TestCase;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends TestCase implements Context
{

    private $numeroAula;
    private $nombreSector;
    private $pisoSector;

    private $aula;
    private $sector;

    /**
     * Initializes context.
     */
    public function __construct()
    {

        $this->aula = new Aula();
        $this->sector = new Sector();

    }

    /**
     * @Given el numero del aula es :arg1 y el sector :arg2 piso :arg3
     */
    public function elNumeroDelAulaEsYElSectorPiso($arg1, $arg2, $arg3)
    {
        $this->numeroAula = $arg1;
        $this->nombreSector = $arg2;
        $this->pisoSector = $arg3;
    }

    /**
     * @When el Administrador ingresa la informacion
     */
    public function elAdministradorIngresaLaInformacion()
    {

        $this->aula->nombre = $this->numeroAula;

        $this->sector->nombre = $this->nombreSector;

        $this->sector->piso = $this->pisoSector;

    }

    /**
     * @Then el aula aparece cargada en la aplicacion
     */
    public function elAulaApareceCargadaEnLaAplicacion()
    {

        $this->assertEquals($this->aula->nombre, $this->numeroAula);
        $this->assertEquals($this->sector->nombre, $this->nombreSector);
        $this->assertEquals($this->sector->piso, $this->pisoSector);

    }
}
