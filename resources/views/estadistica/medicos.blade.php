@extends('layouts.app')
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
   		////////////////////////////% medico por especialidad
   			$grafico=new Grafico();
			$consulta = "SELECT DISTINCT id,especialidad FROM especialidad";
			/*echo "alert('$date_inicio_c');";
			echo "alert('$date_final_c');";*/
			$array_filas2=$grafico->get_datos($consulta);
			//////obtengo etiquetas para el pie
			$nombre_especialidad=[];
			
			foreach ($array_filas2 as $fila) {
				array_push($nombre_especialidad, $fila[1]);
			}

			/////////por cada dato cuantos hay
			$tabla="medicos";
			$columna="especialidad_id";
			$id_nombre2="porcentaje_medicos_x_especialidad";
				////////////esto seria como un template
			$frecuencia=$grafico->each_dato($array_filas2,$tabla,$columna);
			$array_porcentaje=[];
			$Nmedicos=$grafico->cantidadXtabla($tabla);
			foreach ($frecuencia as $cantidad) {
				$porcentaje=($cantidad*100)/$Nmedicos;
				array_push($array_porcentaje, redondear_dos_decimal($porcentaje));
			}

			$grafico->torta_lista([$array_porcentaje,$nombre_especialidad],$id_nombre2);
			$consulta="SELECT medicina_id FROM medicina_prescription";

			$array_filas = $grafico->get_datos($consulta);
			$array_id=[];
			foreach ($array_filas as $value) {
				array_push($array_id, $value[0]);
			}

			$tabla="medicina_prescription";
			$columna="medicina_id";
			$frecuencia_medicamentos =$grafico->each_dato($array_id,$tabla,$columna);
			$array_datos1 =ordenar_mayormenor($frecuencia_medicamentos,$array_id);
			$nombre_array=[];
			foreach ($array_datos1[1] as $value) {
				$consulta="SELECT nombre FROM medicamentos WHERE id =".$value;
				$nombre=$grafico->get_datos($consulta);
				array_push($nombre_array,$nombre[0][0]);
			}
			$array_datos1[1]=$nombre_array;
			$id_nombreid="Top_5_medicamentos_recetados";
			$grafico->torta_lista($array_datos1,$id_nombreid) ;
		?>
		});
   	</script>

</head>
<body>
	<aside class="col-md-2">
			<div class="list-group">
				<a href="/estadistica/paciente" class="list-group-item ">Paciente</a>
				<a href="/estadistica/medicos" class="list-group-item active "> Medico </a>
				<a href="/estadistica/citas" class="list-group-item"> Citas </a>
			</div>
	</aside>
<div class="content">
		<h3 style="text-align: center;">Porcentaje por Medicos de Especialidad</h3>

		<div class="row" >
		<div class="col-md-8">
			<div id="canvas-holder" style="width:90%;">
				<canvas id="porcentaje_medicos_x_especialidad" width="500" height="350"></canvas>
			</div>
		</div>
		</div>

		
		<h3 style="text-align: center;"> Top 5 de los medicamentos más recetados</h3>

		<form  action="/estadistica/Top_5_medicamentos_recetados"  method="post">
		{{ csrf_field() }}
		<div class="col-md-4">
			<label class="text"> Inicio</label>
		 	<input class="form-control" type="date" name="date_inicio" id="date_inicio">
		</div>
		<div  class="col-md-4">
			<label class="text"> Hasta</label>
			<input  class="form-control" type="date" name="date_final" id="date_final">
		</div>
		<div class="col-md-4" >
				<button type="submit" class="btn btn-info btn-fill pull-right">
				Analizar
            	</button>	
		</div>
		</form>
		
	
		<div class="row" >
		<div class="col-md-8">
			<div id="canvas-holder" style="width:90%;">
				<canvas id="Top_5_medicamentos_recetados" width="500" height="350"></canvas>
			</div>
		</div>

		</div>
		
</div>		

</body>
</html>
@endsection