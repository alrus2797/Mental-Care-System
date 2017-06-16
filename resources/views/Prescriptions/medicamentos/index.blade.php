@extends('layouts.prescriptionsTemplate')
@section('title','medicamentos')

@section('content')
  
<h2 >Medicamentos</h2>

<div id="buscador"> </div>
  <br>
  <br>
 <table class="table table-condensed">
    <thead>
      <tr>
        
        <th>Nombre</th>
        <th>Presentación</th>
        <th>Cantidad</th>
        <th>Unidad</th>
        <th><span class="glyphicon glyphicon-eye-open"> </span></th>
        <th><span class="glyphicon glyphicon-pencil"> </span></th>
        <th><span class="glyphicon glyphicon-plus"> </span></th>
        <th><span class="glyphicon glyphicon-trash"> </span></th>
      </tr>
    </thead>
    <tbody>
    @foreach($medicinas as $m)
      <tr>
        
        <td>{{$m->medicamento->nombre}}</td>
        <td>{{$m->presentacion->descripcion}}</td>
        <td>{{$m->cantidad}}</td>
        <td>{{$m->presentacion->unidad}}</td>
        <td><a onclick="ver({{$m->id}})" href="#"> <span class="glyphicon glyphicon-eye-open">  </span> </a> 

        </td>
        <td><a href="{{asset('medicamentos')}} "> <span class="glyphicon glyphicon-pencil"></span></a> </td>
        <!--Nueva versión-->
        <td><a href="{{asset('medicamentos')}} "><span class="glyphicon glyphicon-plus"></span></a> </td>
        <td><a  onclick="eliminar({{$m->id}})" href="# "><span class="glyphicon glyphicon-trash"></span></a> </td>

      </tr>
    @endforeach
    </tbody>
  </table>

<div id="ver" ></div>

  <script type="text/javascript">
   $("#buscador").load("{{asset('medicamentos/asdf')}}");
  </script>

<script type="text/javascript">
  function ver(id) {
    $.ajax({ 
//        data:{medicina:id},
        url: "{{asset('medicinas')}}"+"/"+id,
        type: 'get',
       success: function(resultado){
          console.log(resultado);
            $("#ver").html(resultado);
        }});
  }
</script>

  <script type="text/javascript">
    function eliminar(id) {
      $.ajax({data:{ _token: '{{csrf_token()}}'} ,
        url: "{{asset('medicamentos/eliminar/')}}"+"/"+id,
        type: 'post',
       success: function(resultado){
          console.log(resultado);
            //$("#eliminado").html(resultado);
        }});
    }
  </script>

@endsection

