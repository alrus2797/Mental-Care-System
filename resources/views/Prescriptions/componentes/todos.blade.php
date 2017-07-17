<table class="table table-condensed">
    <thead>
      <tr>
        
        <th>Componente</th>
        <th>Editar</th>
        <th>Eliminar</th>
      </tr>
    </thead>

    <tbody>
    @foreach($componentes as $c)
      <tr>
        
        <td>{{$c->nombre}}</td>
        <td><a onclick="editar({{$c->id}})"><span class="glyphicon glyphicon-pencil"></span></a>   </td>
        <td><a  onclick="eliminar({{$c->id}})"><span class="glyphicon glyphicon-trash"></span></span>    </td>
      </tr>
    @endforeach
    </tbody>
  </table>
