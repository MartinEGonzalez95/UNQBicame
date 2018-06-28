@extends('welcome')

@section('content')

<h2> Materias </h2>
<a href="{{ route('materias.create') }}" class="btn btn-link">Agregar</a>
<table class="table table-borderless table-hover table-sm">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th> </th>
    </tr>
    @foreach($materias as $materia)
    <tr>
        <td>{{$materia->id}}</td>
        <td>{{$materia->nombre}}</td>
        <td> <a href="{{ route('materias.edit', ['id' => $materia->id]) }}" ><i class="fas fa-pencil-alt"></i></a></td>

    </tr>
    @endforeach
</table>

@endsection