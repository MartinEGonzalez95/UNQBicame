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

<h2> Materias </h2>
<a href="{{ route('materias.create') }}">Agregar</a>
<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th> </th>
    </tr>
    @foreach($materias as $materia)
    <tr>
        <td>{{$materia->id}}</td>
        <td>{{$materia->nombre}}</td>
        <td> <a href="{{ route('materias.edit', ['id' => $materia->id]) }}" > Editar </a></td>

    </tr>
    @endforeach
</table>