@extends('layouts.template')
@section('title','Medicamentos')

@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('css/alertify.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/default-alertify.min.css')}}">
<script  src="{{ asset('js/alertify.min.js')}}" ></script>

<form id="form" method="post" action="{{ asset('medicamentos')}}">

  <div class="text-center">
  <br><h2 >Medicamentos</h2><br>

  <button id="nuevo" type="button" class="btn btn-primary btn-large">Nuevo Medicamento </button>
  <br><br><br>

  </div>

  {{ csrf_field()}}

  <div class="col-md-1">
    <p>Buscar por: </p>
  </div>
  <div class="col-md-2">
    <select class="form-control">
      <option>Medicamento</option>
      <option>Componente</option>
    </select>
  </div>
  
  <div class="col-md-4">
    
  </div>

  <div id="crear"></div>
</form>

<!--<div id="buscador"> </div>-->

<form>
  <div class="col-md-3">
      <div class="input-group">
      <div class="input-group-addon">
        <span class="glyphicon glyphicon-search"></span>
      </div>
      <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese nombre" onkeyup="showMedicamentos($('#nombre').val())">
      </div>
  </div><br><br>
</form>

<!--
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
        <td><a onclick="editar({{$m->id}} )" href="#"> <span class="glyphicon glyphicon-pencil"></span></a> </td>
        -->
        <!--Nueva versión
        <td><a href="{{asset('medicamentos')}} "><span class="glyphicon glyphicon-plus"></span></a> </td>
        <td><a  onclick="eliminar({{$m->id}})" href="# "><span class="glyphicon glyphicon-trash"></span></a> </td>

      </tr>
    @endforeach
    </tbody>
  </table>
-->

<div id="ver" ></div>

<div class="container">
  <div id="todos"></div>
</div>

<style type="text/css">
  #todos{
    padding-top: 25px;
  }
</style>

<script type="text/javascript">
//  $("#buscador").load("{{asset('medicamentos/asdf')}}");

  $("#todos" ).load("{{ asset('medicamentos/todos') }}" );

  $("#nuevo").click(function(){
      $.ajax({url: "{{asset('medicamentos/create')}} ", success: function(resultado){
          $("#crear").html(resultado);
      }});
  });

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

  function editar(id) {
    $.ajax({
//        data:{_method: 'PUT'},
        url: "{{asset('medicinas')}}"+"/"+id+"/edit",
        type: 'get',
       success: function(resultado){
          //console.log(resultado);
            $("#ver").html(resultado);
        }});
  }

    function eliminar(id) {
      $.ajax({
        data:{ _token: '{{csrf_token()}}', _method: 'delete' } ,
        url: "{{asset('medicamentos/eliminar/')}} " +"/"+id,
        type: 'post',
       success: function(resultado){
          console.log(resultado);
            //$("#eliminado").html(resultado);
        }});
    }
  
    function showMedicamentos(nom) {
      var datos = {
        "nom" : nom,
      };
      $.ajax({
        data: datos,
        url: 'obtenerMedicamentos',
        type: 'get',
        dataType : 'json',
        success: function(data){
          $("#todos").html(data);
        }
      });
    }

  </script>

@endsection
