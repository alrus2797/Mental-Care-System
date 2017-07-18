@extends('layouts.template')
@section('title', 'NEstadistica')
 
   @section('content') 
   <b>
   		<h2>Bienvenido a Estadistica</h2>
   	</b>
<!DOCTYPE html>
<html>
<head>
	@include('estadistica.funciones2')
	@include('estadistica.extras_funciones')
	<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" media="screen">
	<script type="text/javascript" src="{{asset('js/jquery-1.12.0.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/Chart.bundle.min.js')}}"> </script>
   	<script type="text/javascript">
   		$(document).ready(function(){
   			<?php
   			/////////////Top 5 de los médicos más citados///
			$consulta = "SELECT DISTINCT id,persona_id FROM medico";
			//////obtengo etiquetas para el pie
			$grafico=new grafico();
			$array_filas3=$grafico->get_datos($consulta);

			$tabla="citas";
			$columna="id_medico";
			$id_nombre3="top5_medico_citados";
			$array_idpaciente=[];
			foreach ($array_filas3 as $fila) {
				array_push($array_idpaciente, $fila[1]);
			}
			$frecuencia=$grafico->each_dato($array_filas3,$tabla,$columna);

			$resultado=ordenar_mayormenor($frecuencia,$array_idpaciente);
			$tabla="personas";
			$columna="id";
			$labels=$grafico->mediconombreXid($resultado[1],$tabla,$columna);
			$resultado[1]=$labels;
			$grafico->bar_lista($resultado,$id_nombre3);
			
   			?>
   		});
   	</script>
	<title></title>
</head>
<body>
	<aside class="col-md-2">
			<div class="list-group">
				<a href="/estadistica/paciente" class="list-group-item ">Paciente</a>
				<a href="/estadistica/medicos" class="list-group-item"> Medico </a>
				<a href="/estadistica/citas" class="list-group-item active"> Citas </a>
			</div>
	</aside>
	<div class="row">
		<div class="col-md-4">
			<label class="text"> Inicio</label>
		 	<input class="form-control" type="date" name="uno">
		</div>
		<div  class="col-md-4">
			<label class="text"> Hasta</label>
			<input  class="form-control" type="date" name="dos">
		</div>
		<div class="col-md-4" >
				<button type="submit" class="btn btn-info btn-fill pull-right">
				Analizar
            	</button>	
		</div>
	</div>
	<div class="row">
		<h3 style="text-align: center;">Top de los 5 meicos màs citados</h3>
		<div class="col-md-8">
		<div id="canvas-container" style="width:90%;">
			<canvas id="top5_medico_citados" width="500" height="350"></canvas>
		</div>
		</div>
	</div>
</body>
</html>
	@endsection