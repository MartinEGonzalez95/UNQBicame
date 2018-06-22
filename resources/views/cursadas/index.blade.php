<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 50%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>

<h2>Cursadas</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Aula</th>
        <th>Materia</th>
        <th>Día</th>
        <th>Inicio</th>
        <th>Fin</th>
    </tr>
    @foreach($cursadas as $cursada)
        <tr>
            <td>{{ $cursada->id }}</td>
            <td>{{ $cursada->aula->nombre }}</td>
            <td>{{ $cursada->materia->nombre }}</td>
            <td>{{ $cursada->dia }}</td>
            <td>{{ $cursada->hora_inicio }}</td>
            <td>{{ $cursada->hora_fin }}</td>
            {{--<td> <a href="{{ route('materias.edit', ['id' => $materia->id]) }}" > Editar </a></td>--}}

        </tr>
    @endforeach
</table>