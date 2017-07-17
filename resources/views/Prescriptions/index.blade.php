

@extends('layouts.template')
@section('title', 'Inicio')


   
@section('content') 
<h3>Prescripciones</h3>
<div id="buscador"> </div>
<h3>Mis Prescripciones</h3>


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
   
      <tr>

        <td>Pacientex</td>
        <td>Observaciones x del paciente x</td>
        
        <td><a onclick="ver()" href="#"> <span class="glyphicon glyphicon-eye-open">  </span> </a>

        </td>
        <td><a onclick="editar()" href="#"> <span class="glyphicon glyphicon-pencil"></span></a> </td>
        <!--Nueva versión-->
        <td><a onclick="mas()" href="#"><span class="glyphicon glyphicon-plus"></span></a> </td>
        <td><a  onclick="eliminar()" href="# "><span class="glyphicon glyphicon-trash"></span></a> </td>

      </tr>
   
    </tbody>
  </table>


<script type="text/javascript">
   $("#buscador").load("{{asset('pres/buscador')}}");
  </script>



<script type="text/javascript">
	function ver() {
		// body...
	}
	function editar() {
		// body...
	}
	function eliminar() {
		// body...
	}
	function ver() {
		// body...
	}
	function mas() {
		// body...
	}
</script>
@endsection