@extends('welcome')

@section('content')

    <h2 class="mt-3">Agregar <strong>Cursada</strong></h2>

    <hr>

    <form method="post" action="{{ route('cursadas.store') }}">

        {{ csrf_field() }}

        <div class="form-group">

            <div class="form-group">
                <label for="diaCursada">Día</label>
                <select class="form-control" name="dia" id="diaCursada">
                    <option value="lunes">Lunes</option>
                    <option value="martes">Martes</option>
                    <option value="miercoles">Miércoles</option>
                    <option value="jueves">Jueves</option>
                    <option value="viernes">Viernes</option>
                    <option value="sabado">Sábado</option>
                </select>
            </div>

            <div class="form-group">
                <label for="horaInicio">Hora de inicio</label>
                <input type="time" min="8:00" max="22:00" class="form-control" id="horaInicio" name="hora_inicio">
            </div>

            <div class="form-group">
                <label for="horaFin">Hora de fin</label>
                <input type="time" class="form-control" id="horaFin" name="hora_fin">
            </div>

            <div class="form-group">
            <label for="materia">Materia</label>
            <select class="form-control" name="materia" id="materia">
            @foreach($materias as $materia)

                <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>

            @endforeach
            </select>
            </div>


            <div class="form-group">
                <label for="aula">Aula</label>
                <select class="form-control" name="aula" id="aula">
                    @foreach($aulas as $aula)

                        <option value="{{ $aula->id }}">{{ $aula->nombre }}</option>

                    @endforeach
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>

    </form>

@endsection