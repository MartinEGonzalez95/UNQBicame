<h1>Aula <em>{{ $aula->nombre }}</em></h1>

<h2>En esta aula se cursa:</h2>


@if($aula->cursadas->count())

    <ul>
        @foreach($aula->cursadas as $cursada)
            <li>
                {{ $cursada->dia }} de {{ $cursada->hora_inicio }} a {{ $cursada->hora_fin }}
                <strong>{{ $cursada->materia->nombre }}</strong>
            </li>
        @endforeach

    </ul>

@else

    <p>No hay cursadas asignadas</p>

@endif