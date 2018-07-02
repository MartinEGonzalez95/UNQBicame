<?php

use App\Aula;
use App\Cursada;
use App\Sector;
use App\Materia;

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
    private $materia;
    private $nombreMateria;

    /**
     * Initializes context.
     */
    public function __construct()
    {
        $this->materia = new Materia();
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


    /**
     * @Given La materia cargada es :arg1
     */
    public function laMateriaCargadaEs($arg1)
    {
        $this->nombreMateria = $arg1;
    }

    /**
     * @When El Administrador carga la información
     */
    public function elAdministradorCargaLaInformacion()
    {
        $this->materia->nombre = $this->nombreMateria;
    }

    /**
     * @Then Debería de ver la Materia cargada
     */
    public function deberiaDeVerLaMateriaCargada()
    {
        $this->assertEquals($this->materia->nombre, $this->nombreMateria);
    }

    private $cursada;
    private $horaFin;
    private $diaCursada;
    private $horaInicio;


    /**
     * @Given La Cursada cargada
     */
    public function laCursadaCargada()
    {

        $this->cursada = new Cursada();


    }

    /**
     * @Given El Aula es :arg1
     */
    public function elAulaEs($arg1)
    {

        $this->aula->nombre = $arg1;
    }

    /**
     * @Given La Materia es :arg1
     */
    public function laMateriaEs($arg1)
    {
        $this->materia->nombre = $arg1;
    }

    /**
     * @Given El día es :arg1
     */
    public function elDiaEs($arg1)
    {
        $this->diaCursada = $arg1;
    }

    /**
     * @Given El Horario es inicio :arg1
     */
    public function elHorarioEsInicio($arg1)
    {
        $this->horaInicio = $arg1;
    }

    /**
     * @Given El Horario de fin es :arg1
     */
    public function elHorarioDeFinEs($arg1)
    {
        $this->horaFin = $arg1;
    }


    /**
     * @When /^El Administrador carga la informacion de la Cursada$/
     */
    public function elAdministradorCargaLaInformacionDeLaCursada1()
    {
        $this->cursada->hora_inicio= $this->horaInicio;
        $this->cursada->hora_fin= $this->horaFin;
        $this->cursada->aula = ($this->aula);
        $this->cursada->materia = ($this->materia);
        $this->cursada->dia= $this->diaCursada;

    }

   /**
     * @Then Debería de ver la Cursada cargada
     */
    public function deberiaDeVerLaCursadaCargada()
    {
        $this->assertEquals($this->cursada->dia, $this->diaCursada);
        $this->assertEquals($this->cursada->hora_inicio,$this->horaInicio);
        $this->assertEquals($this->cursada->hora_fin,$this->horaFin);

        $this->assertEquals($this->cursada->aula,$this->aula);
        $this->assertEquals($this->cursada->materia,$this->materia);
    }


}
