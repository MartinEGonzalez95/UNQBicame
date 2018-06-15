<form method="post" action="/materias">
    {{csrf_field()}}

    <div class="form-group">

        <label for="materiaNombre">Nombre</label>

        <input type="text" class="form-control" id="materiaNombre" name="materiaNombre">

    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>

</form>