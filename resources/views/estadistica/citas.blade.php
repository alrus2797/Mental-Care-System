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
	<!--TODAVIA NO BORRA LOS ELEMENTOS-->
	<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" media="screen">
	<script type="text/javascript" src="{{asset('js/jquery-1.12.0.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/Chart.bundle.min.js')}}"> </script>
   	<script type="text/javascript">
   		$(document).ready(function(){
   			/////////////Top 5 de los médicos más citados///
   			var date="2012-02-12"
   			$("#date_inicio").val(date);
   			<?php
   			$grafico=new grafico();

			if (isset($_POST['date_inicio']) ){
				echo' $("#date_inicio").val("'.$date_inicio_c.'"); ';
   				echo '$("#date_final").val("'.$date_final_c.'"); ';
   			///////////////creabdo tablas
   				///la tabla temporari solo es para una sesion
			$consultavirtuales="CREATE TEMPORARY TABLE citas_rango SELECT id,horario_medico_id FROM citas WHERE fecha<'".$date_final_c."'AND fecha >'".$date_inicio_c."';";

			$grafico->tablas_virtuales($consultavirtuales);
			$consultavirtuales="CREATE TEMPORARY TABLE citas_medico SELECT DISTINCT citas_rango.id,medicos_id FROM citas_rango INNER JOIN horario_Medico ON citas_rango.horario_medico_id=horario_medico.id ; ";	
			$grafico->tablas_virtuales($consultavirtuales);
			
			$sacar_medicoid="SELECT DISTINCT medicos_id FROM citas_medico ";
			$array_medico=$grafico->get_datos($sacar_medicoid);


  		    $tabla="citas_medico";
			$columna="medicos_id";
			$frecuencia=$grafico->each_dato($array_medico,$tabla,$columna);
			$array_id=[];
			$booleano=true;
			foreach($array_medico as $lista)
			{
				foreach($lista as $elemento)
					array_push($array_id,$elemento);
			}
			/////con esta funcion saco los 5 primeros
			$resultado=ordenar_mayormenor($frecuencia,$array_id);
			$array_nombrem=[];
			foreach ($resultado[1] as $id_medico) {
				$nombre_medico="SELECT nombres FROM personas where id =".$id_medico.";";
				$ejecuta=mysqli_query($grafico->conexion,$nombre_medico);
				$array_nombre=mysqli_fetch_row($ejecuta);
				array_push($array_nombrem,$array_nombre[0] );	
			}
			
			$resultado[1]=$array_nombrem;
			$id_canvas="top5_medico_citados";
			/////borrando las tablas temporales
			$consultadrop="DROP TABLE citas_medico;";
			$grafico->tablas_virtuales($consultadrop);
			$controladrop="DROP TABLE citas_rango;"; 
			$grafico->tablas_virtuales($consultadrop);

			$grafico->bar_lista($resultado,$id_canvas);
			}
			else
			{
				$consulta = "CREATE TABLE  citas_medico SELECT DISTINCT citas.id,medicos_id FROM citas INNER JOIN horario_Medico ON citas.horario_medico_id=horario_medico.id ;";
				$grafico->tablas_virtuales($consulta);
				$consulta="SELECT DISTINCT medicos_id FROM citas_medico";
				$array_idmedico=$grafico->get_datos($consulta);
				$tabla="citas_medico";
				$columna="medicos_id";
				$id_nombre3="top5_medico_citados";
				$id_arrayidmedico=[];
				$frecuencia=$grafico->each_dato($array_idmedico,$tabla,$columna);
				foreach ($array_idmedico as $fila) {
					foreach ($fila as $ids) {
						array_push($id_arrayidmedico,$ids);
					}
					
				}
				$resultado=ordenar_mayormenor($frecuencia,$id_arrayidmedico);
				$tabla="personas";
				$columna="id";
				$labels=$grafico->mediconombreXid($resultado[1],$tabla,$columna);
				$resultado[1]=$labels;
				$grafico->bar_lista($resultado,$id_nombre3);
				$consultadrop="DROP TABLE citas_medico;";
				$grafico->tablas_virtuales($consultadrop);
			}
			//$grafico->terminar();
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
	
		<form action="/controladorc" method="post" >
			{{ csrf_field() }}
			<div class="col-md-4">
				<label class="text" > Inicio</label>
			 	<input class="form-control" name="date_inicio" id="date_inicio" type="date">
			</div>
			<div class="col-md-4" name="inicio2" >
				<label class="text"> Hasta</label>
				<input  class="form-control" name="date_final" id ="date_final" type="date">
			</div>
			<div class="col-md-4" >
					<input value="Analizar" type="submit">
					
			</div>
		</form>
	
	<div class="row">
		
		<div class="col-md-8">
		<div id="canvas-container" style="width:90%;">
			<canvas id="top5_medico_citados" width="500" height="350"></canvas>
		</div>
		</div>
	</div>
</body>
</html>
	@endsection