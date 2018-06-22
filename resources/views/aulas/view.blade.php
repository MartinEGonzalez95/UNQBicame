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

<h2> Aulas </h2>

<table>
    <tr>
        <th>Numero</th>
        <th>Sector</th>
        <th>Piso</th>
        <th> </th>
    </tr>
    @foreach($aulas as $aula)
    <tr>
        <td>{{$aula->nombre}}</td>
        <td>{{$aula->sector->nombre}}</td>
        <td>{{$aula->sector->piso}}</td>
        <td> <a href="{{action("Web\AulasController@edit",[$aula->id])}}" class="btn" type="button"> Editar </a></td>
    </tr>
    @endforeach
</table>