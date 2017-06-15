<table class="table table-condensed">
    <thead>
      <tr>
        <th>id</th>
        <th>Presentacion</th>
        <th>Unidad</th>
        <th>Ver</th>
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
        <td><span class="glyphicon glyphicon-eye-open"></span> </td>
        <td><span class="glyphicon glyphicon-pencil"></span>   </td>
        <td><span class="glyphicon glyphicon-trash"></span>    </td>
      </tr>
    @endforeach
    </tbody>
  </table>
