@extends('welcome')

@section('content')

<h2> Materias </h2>
<a href="{{ route('materias.create') }}">Agregar</a>
<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th> </th>
    </tr>
    @foreach($materias as $materia)
    <tr>
        <td>{{$materia->id}}</td>
        <td>{{$materia->nombre}}</td>
        <td> <a href="{{ route('materias.edit', ['id' => $materia->id]) }}" > Editar </a></td>

    </tr>
    @endforeach
</table>

@endsection