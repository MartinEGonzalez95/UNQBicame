@extends('welcome')

@section('content')

    <h1 class="mt-3"><em>Editando:</em> <strong>{{ $materia->nombre }}</strong></h1>

    <ul class="nav nav-tabs mb-3">
        <li class="nav-item">
            <a class="nav-link disabled" href="#">Ver</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('materias.edit', ['materia' => $materia->id]) }}">Editar</a>
        </li>
    </ul>

    <form method="post" action="{{ route('materias.edit', ['materia' => $materia->id]) }}">

        {{csrf_field()}}

        {{ method_field('PUT') }}

        <div class="form-group">

            <label for="materiaNombre">Nombre</label>

            <input type="text" class="form-control" id="materiaNombre" name="materiaNombre" value="{{ $materia->nombre }}">

        </div>

        <button type="submit" class="btn btn-primary"> Guardar </button>

    </form>


@endsection