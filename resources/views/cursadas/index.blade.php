@extends('welcome')

@section('content')

<h2 class="mt-3">Listado de <strong>Cursadas</strong></h2>

<a href="{{ route('cursadas.create') }}" class="btn btn-outline-primary">Agregar</a>
<hr>
<table class="table table-borderless table-hover table-sm mt-3">


    <tr>
        <th>Aula</th>
        <th>Materia</th>
        <th>Día</th>
        <th>Inicio</th>
        <th>Fin</th>
        <th>Acciones</th>
    </tr>
    @foreach($cursadas as $cursada)
        <tr>
            <td>{{ $cursada->aula->nombre }}</td>
            <td>{{ $cursada->materia->nombre }}</td>
            <td>{{ $cursada->dia }}</td>
            <td>{{ $cursada->hora_inicio }}</td>
            <td>{{ $cursada->hora_fin }}</td>
            <td>
                <a class="btn btn-link" href="{{ route('cursadas.edit', ['cursada' => $cursada->id]) }}">
                    <i class="fas fa-pencil-alt"></i>
                </a>
                <form class="form-inline" action="/cursadas/{{ $cursada->id }}" method="post">
                    {{ method_field('DELETE') }}
                    {!! csrf_field() !!}

                    <label class="sr-only" for="delete-{{$cursada->id}}">Name</label>
                    <button id="delete-{{$cursada->id}}" class="btn btn-link" type="submit">
                        <i class="fa fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
</table>

@endsection
