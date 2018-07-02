Feature: Materias

  Scenario: Un Administrador carga una Cursada
    Given La Cursada cargada
      And El Aula es "37B"
      And La Materia es "Intro"
      And El día es "Lunes"
      And El Horario es inicio "18:00"
      And El Horario de fin es "21:00"
    When El Administrador carga la informacion de la Cursada
    Then Debería de ver la Cursada cargada
