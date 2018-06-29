Feature: Materias

  Scenario: Un Administrador carga una Materia
    Given La materia cargada es "Objetos 1"
    When El Administrador carga la información
    Then Debería de ver la Materia cargada
