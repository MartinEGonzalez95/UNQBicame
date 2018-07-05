@extends('welcome')

@section('content')

<h2 class="mt-3">Listado de <strong>Materias</strong></h2>

<a href="{{ route('materias.create') }}" class="btn btn-outline-primary">Agregar</a>

<hr>

<table class="table table-borderless table-hover table-sm mt-3">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Acciones</th>
    </tr>
    @foreach($materias as $materia)
    <tr>
        <td>{{$materia->id}}</td>
        <td>{{$materia->nombre}}</td>
        <td>
            <a class="btn btn-link" href="{{ route("materias.edit", [ $materia->id ] ) }}">
                <i class="fas fa-pencil-alt"></i>
            </a>
            <form class="form-inline" action="/materias/{{ $materia->id }}" method="post">
                {{ method_field('DELETE') }}
                {!! csrf_field() !!}

                <label class="sr-only" for="delete-{{$materia->id}}">Name</label>
                <button id="delete-{{$materia->id}}" class="btn btn-link" type="submit">
                    <i class="fa fa-trash"></i>
                </button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

@endsection