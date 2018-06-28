@extends('welcome')

@section('content')
<h2> Aulas </h2>
<a href="{{ route('aulas.create') }}" class="btn btn-link">Agregar</a>
<table class="table table-borderless table-hover table-sm">
    <tr>
        <th>Numero</th>
        <th>Sector</th>
        <th>Piso</th>
        <th> </th>
    </tr>
    @foreach($aulas as $aula)
    <tr>
        <td>{{$aula->nombre}}</td>
        <td>{{$aula->sector->nombre}}</td>
        <td>{{$aula->sector->piso}}</td>
        <td>
            <a href="{{action("Web\AulasController@edit",[$aula->id])}}"><i class="fas fa-pencil-alt"></i></a>
        </td>
    </tr>
    @endforeach
</table>
@endsection