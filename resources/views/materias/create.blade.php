@extends('welcome')

@section('content')

    <h2 class="mt-3">Agregar <strong>Materia</strong></h2>

    <hr>

    <form method="post" action="/materias">
        {{csrf_field()}}

        <div class="form-group">

            <label for="materiaNombre">Nombre</label>

            <input type="text" class="form-control" id="materiaNombre" name="materiaNombre">

        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>

    </form>

@endsection
