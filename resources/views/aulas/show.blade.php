@extends('welcome')

@section('content')

    <h1 class="mt-3"><strong>Aula{{ $aula->nombre }}</strong></h1>


    <ul class="nav nav-tabs mb-3">
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('aulas.show', ['aula' => $aula->id]) }}">Ver</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('aulas.edit', ['aula' => $aula->id]) }}">Editar</a>
        </li>
    </ul>

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

@endsection