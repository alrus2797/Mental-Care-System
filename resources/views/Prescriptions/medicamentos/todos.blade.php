<table class="table table-condensed">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Presentación</th>
        <th>Cantidad</th>
        <th>Unidad</th>
        <th><span class="glyphicon glyphicon-eye-open"> </span></th>
        <th><span class="glyphicon glyphicon-pencil"> </span></th>
        <!--
        <th><span class="glyphicon glyphicon-plus"> </span></th>
        <th><span class="glyphicon glyphicon-trash"> </span></th>
        -->
      </tr>
    </thead>

    <tbody>
    @foreach($medicinas as $m)
      <tr>
        <td>{{$m->nombre}}</td>
        <td>{{$m->descripcion}}</td>
        <td>{{$m->cantidad}}</td>
        <td>{{$m->unidad}}</td>
        <td><a onclick="ver({{$m->id}})" href="#"> <span class="glyphicon glyphicon-eye-open">  </span> </a>
        </td>
        <td><a onclick="editar({{$m->id}} )" href="#"> <span class="glyphicon glyphicon-pencil"></span></a> </td>
        <!--Nueva versión
        <td><a href="{{asset('medicamentos')}} "><span class="glyphicon glyphicon-plus"></span></a> </td>
        <td><a  onclick="eliminar({{$m->id}})" href="# "><span class="glyphicon glyphicon-trash"></span></a> </td>
        -->
      </tr>
    @endforeach
    </tbody>
</table>