<form method='post' action="/aulas">

    <div class="form-group">

        <label for="aulaNumero">Número</label>

        <input type="text" class="form-control" id="aulaNumero">

    </div>

    <div class="form-group">

        <label for="aulaSector">Sector</label>

        <select id="aulaSector">

            @foreach($sectores as $sector):

                <option label="{{$sector}}" >{{$sector->nombre}}</option>

            @endforeach

        </select>

    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>

</form>