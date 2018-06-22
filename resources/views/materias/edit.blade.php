
<div class="container">

    <h1>Editando:  {{ $materia->nombre}}</h1>

    <form method="post" action="/materias/{{$materia->id}}/editar">
        {{csrf_field()}}
        {{ method_field('PUT') }}
        <div class="form-group">

            <label for="materiaNombre">Nombre</label>

            <input type="text" class="form-control" id="materiaNombre" name="materiaNombre">

        </div>

        <button type="submit" class="btn btn-primary"> Guardar </button>

    </form>
</div>
