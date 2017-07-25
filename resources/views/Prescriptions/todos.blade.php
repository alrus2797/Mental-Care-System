
<table class="table table-condensed">
    <thead>
      <tr>

        <th>Paciente</th>

        <th>Observaciones</th>

        <th><span class="glyphicon glyphicon-eye-open"> </span></th>
        <th><span class="glyphicon glyphicon-pencil"> </span></th>
        <th><span class="glyphicon glyphicon-plus"> </span></th>
        <th><span class="glyphicon glyphicon-trash"> </span></th>
      </tr>
    </thead>
    <tbody>
      @if(!isset($pres))
      @foreach($prescripciones as $p)
      <tr>
        <td>{{$p->paciente->persona->nombre_completo()}}</td>
        <td>{{$p->observacion}}</td>

        <td><a href="{{url('prescripcion/imprimir')}}/{{$p->id}}"> <span class="glyphicon glyphicon-eye-open">  </span> </a>

        </td>
        <td><a onclick="editar()" href="#"> <span class="glyphicon glyphicon-pencil"></span></a> </td>
        <!--Nueva versión-->
        <td><a onclick="mas()" href="#"><span class="glyphicon glyphicon-plus"></span></a> </td>
        <td><a  onclick="eliminar()" href="# "><span class="glyphicon glyphicon-trash"></span></a> </td>

      </tr>
      @endforeach
      @else
      @foreach($pres as $p)
      <tr>
        <td>{{$p->nombres}}</td>
        <td>{{$p->observacion}}</td>

        <td><a onclick="ver({{$p->id}})" href="#"> <span class="glyphicon glyphicon-eye-open">  </span> </a>

        </td>
        <td><a onclick="editar()" href="#"> <span class="glyphicon glyphicon-pencil"></span></a> </td>
        <!--Nueva versión-->
        <td><a onclick="mas()" href="#"><span class="glyphicon glyphicon-plus"></span></a> </td>
        <td><a  onclick="eliminar()" href="# "><span class="glyphicon glyphicon-trash"></span></a> </td>

      </tr>
      @endforeach
      @endif
    </tbody>
  </table>
