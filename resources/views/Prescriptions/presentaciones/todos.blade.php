<table class="table table-condensed">
    <thead>
      <tr>
        <th>id</th>
        <th>Presentacion</th>
        <th>Unidad</th>
        <th>Editar</th>
        <th>Eliminar</th>
      </tr>
    </thead>

    <tbody>
    @foreach($presentaciones as $p)
      <tr>
        <td>{{$p->id}}</td>
        <td>{{$p->descripcion}}</td>
        <td>{{$p->unidad}}</td>
        <td><a onclick="editar({{$p->id}})"><span class="glyphicon glyphicon-pencil"></span></a>   </td>
        <td><a  onclick="eliminar({{$p->id}})"><span class="glyphicon glyphicon-trash"></span></span>    </td>
      </tr>
    @endforeach
    </tbody>
  </table>
