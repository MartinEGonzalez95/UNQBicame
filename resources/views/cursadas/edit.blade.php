@extends('welcome')

@section('content')

    <h1 class="mt-3"><em>Editando:</em> <strong>{{ $cursada->materia->nombre }}, {{ $cursada->dia }} {{ $cursada->hora_inicio }} a {{ $cursada->hora_fin }} en aula {{ $cursada->aula->nombre }}</strong></h1>

    <ul class="nav nav-tabs mb-3">
        <li class="nav-item">
            <a class="nav-link disabled" href="#">Ver</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('cursadas.edit', ['cursada' => $cursada->id]) }}">Editar</a>
        </li>
    </ul>

    <form method="post" action="/cursadas/{{$cursada->id}}/editar">
    {{method_field('PUT')}}
        {{ csrf_field() }}

        <div class="form-group">

            <div class="form-group">
                <label for="diaCursada">Día</label>
                <select class="form-control" name="dia" id="diaCursada">

                    {{-- TODO Pasar dias cómo array para evitar repetir el if --}}
                    <option @if($cursada->dia == 'lunes') {{ 'selected' }} @endif value="lunes">Lunes</option>
                    <option @if($cursada->dia == 'martes') {{ 'selected' }} @endif value="martes">Martes</option>
                    <option @if($cursada->dia == 'miercoles') {{ 'selected' }} @endif value="miercoles">Miércoles</option>
                    <option @if($cursada->dia == 'jueves') {{ 'selected' }} @endif value="jueves">Jueves</option>
                    <option @if($cursada->dia == 'viernes') {{ 'selected' }} @endif value="viernes">Viernes</option>
                    <option @if($cursada->dia == 'sabado') {{ 'selected' }} @endif value="sabado">Sábado</option>

                </select>
            </div>

            <div class="form-group">
                <label for="horaInicio">Hora de inicio</label>
                <input type="time" value="{{ $cursada->hora_inicio }}" min="8:00" max="22:00" class="form-control" id="horaInicio" name="hora_inicio">
            </div>

            <div class="form-group">
                <label for="horaFin">Hora de fin</label>
                <input type="time" value="{{ $cursada->hora_fin }}" class="form-control" id="horaFin" name="hora_fin">
            </div>

            <div class="form-group">
            <label for="materia">Materia</label>
            <select class="form-control" name="materia" id="materia">
            @foreach($materias as $materia)

                @if($materia->id == $cursada->materia->id)

                    <option selected value="{{ $materia->id }}">{{ $materia->nombre }}</option>

                @else

                    <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>

                @endif


            @endforeach
            </select>
            </div>


            <div class="form-group">
                <label for="aula">Aula</label>
                <select class="form-control" name="aula" id="aula">
                    @foreach($aulas as $aula)

                        @if($aula->id == $cursada->aula->id)

                            <option value="{{ $aula->id }}">{{ $aula->nombre }}</option>

                        @else

                            <option value="{{ $aula->id }}">{{ $aula->nombre }}</option>

                        @endif

                    @endforeach
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>

    </form>

@endsection