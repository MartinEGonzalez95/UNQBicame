@extends('welcome')

@section('content')

    <h1 class="mt-3">Editando: <strong>Aula {{ $aula->nombre }}</strong></h1>

    <ul class="nav nav-tabs mb-3">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('aulas.show', ['aula' => $aula->id]) }}">Ver</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('aulas.edit', ['aula' => $aula->id]) }}">Editar</a>
        </li>
    </ul>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="/aulas/{{$aula->id}}/editar">
        {{csrf_field()}}
        {{method_field('PUT')}}

        <div class="form-group">

            <label for="aulaNombre">Número</label>

            <input type="text" class="form-control" id="aulaNombre" name="aulaNombre" value="{{ $aula->nombre }}">

        </div>

        <div class="form-group">

            <label for="aulaSector">Sector</label>

            <select id="aulaSector"  name="sector_id">

                @foreach($sectores as $sector):

                    <option @if($sector->id == $aula->sector->id) {{ 'selected' }} @endif value="{{$sector->id}}">{{$sector->nombre}} - {{$sector->piso}}</option>

                @endforeach

            </select>

        </div>

        <button type="submit" class="btn btn-primary"> Guardar </button>

    </form>

@endsection
