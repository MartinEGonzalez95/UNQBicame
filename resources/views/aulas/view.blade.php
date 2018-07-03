@extends('welcome')

@section('content')

    <h2 class="mt-3">Listado de <strong>Aulas</strong></h2>

    <a href="{{ route('aulas.create') }}" class="btn btn-outline-primary">Agregar</a>

    <hr>

    <table class="table table-borderless table-hover table-sm mt-3">
        <tr>
            <th>Numero</th>
            <th>Sector</th>
            <th>Piso</th>
            <th>Acciones</th>
        </tr>

        @foreach($aulas as $aula)

        <tr>
            <td><a href="{{ route("aulas.show", [ $aula->id ] ) }}">{{$aula->nombre}}</a></td>
            <td>{{$aula->sector->nombre}}</td>
            <td>{{$aula->sector->piso}}</td>
            <td>
                <a class="btn btn-link" href="{{ route("aulas.edit", [ $aula->id ] ) }}" class="btn" type="button">
                    <i class="fas fa-pencil-alt"></i>
                </a>
            </td>
        </tr>

        @endforeach

    </table>
@endsection
