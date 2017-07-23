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
   		////////////////////////////% medico por especialidad
   			$grafico=new Grafico();
			$consulta = "SELECT DISTINCT id_especialidad,nombre FROM especialidad";
			/*echo "alert('$date_inicio_c');";
			echo "alert('$date_final_c');";*/
			if ($_SERVER['REQUEST_METHOD']==="POST") {
			//echo "alert('sdsd');"; 
			if (isset($_POST['date_inicio'])) {
    			//if (in_array($_POST['date_inicio'],$nombres)) {
	             
	            $date_final=$_POST['date_final'];
	            echo "alert($date_final);"; 
		        //}
		    }
		            //exit;
			}
			$array_filas2=$grafico->get_datos($consulta);
			//////obtengo etiquetas para el pie
			$nombre_especialidad=[];
			
			foreach ($array_filas2 as $fila) {
				array_push($nombre_especialidad, $fila[1]);
			}

			/////////por cada dato cuantos hay
			$tabla="medico";
			$columna="id_especialidad";
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

		<form  action="/controlador12"  method="post">
		{{ csrf_field() }}
		<!--<input type="text" name="_token value="{{csrf_token()}}">-->
		<div class="col-md-4">
			<label class="text"> Inicio</label>
		 	<input class="form-control" type="date" name="date_inicio">
		</div>
		<div  class="col-md-4">
			<label class="text"> Hasta</label>
			<input  class="form-control" type="date" name="date_final">
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
					<canvas id="porcentaje_medicos_x_especialidad" width="500" height="350"></canvas>
				</div>
			</div>

			</div>

		</div>

		

</body>
</html>
@endsection