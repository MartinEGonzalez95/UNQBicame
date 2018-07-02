@extends('welcome')

@section('content')

<h2>Cursadas</h2>
<a href="{{ route('cursadas.create') }}" class="btn btn-link">Agregar</a>
<table class="table table-borderless table-hover table-sm">
    <tr>
        <th>Aula</th>
        <th>Materia</th>
        <th>Día</th>
        <th>Inicio</th>
        <th>Fin</th>
        <th></th>
    </tr>
    @foreach($cursadas as $cursada)
        <tr>
            <td>{{ $cursada->aula->nombre }}</td>
            <td>{{ $cursada->materia->nombre }}</td>
            <td>{{ $cursada->dia }}</td>
            <td>{{ $cursada->hora_inicio }}</td>
            <td>{{ $cursada->hora_fin }}</td>
            <td>
                <form action="/cursadas/{{ $cursada->id }}" method="post">
                    <input type="hidden" name="_method" value="delete" />
                        {!! csrf_field() !!}
                    <button class="fa fa-trash" type="submit"></button>
                </form>
            </td>
        </tr>
    @endforeach
</table>

@endsection
