@extends('layouts.app')
@section('title', 'NEstadistica')
 
   @section('content')      
   	<b>
   		<h2>Bienvenido a Estadistica</h2>
   	</b>

<html>
	<head>
		@include('estadistica.funciones2')
		@include('estadistica.extras_funciones')
    	<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" media="screen">
		<title>ASAROVA</title>
		<script type="text/javascript" src="{{asset('js/jquery-1.12.0.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('js/Chart.bundle.min.js')}}"> </script>
		<script type="text/javascript">
			$(document).ready(function(){
			<?php 
			$tipo='pie';
			$grafico=new Grafico();
///////////////////////////paciente-estado
			$consulta = "SELECT DISTINCT estado FROM paciente";
			$array_filas=$grafico->get_datos($consulta);
			
			//////obtengo etiquetas para el pie
			$estados=[];
			foreach ($array_filas as $fila) {
				array_push($estados, $fila[0]);
			}
			//////////por cada dato cuantos hay
			$tabla="paciente";
			$columna="estado";
				////////////esto seria como un app
			$frecuencia=$grafico->each_dato($array_filas,$tabla,$columna);
			$id_nombre1="cuadro_freq_estados_pacientes";
			///////////////graficamos
			$grafico->torta_lista([$frecuencia,$estados],$id_nombre1);

////////////////////////////% medico por especialidad
			$consulta = "SELECT DISTINCT id_especialidad,nombre FROM especialidad";

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
				////////////esto seria como un app
			$frecuencia=$grafico->each_dato($array_filas,$tabla,$columna);
			$array_porcentaje=[];
			$Nmedicos=$grafico->cantidadXtabla($tabla);
			foreach ($frecuencia as $cantidad) {
				$porcentaje=($cantidad*100)/$Nmedicos;
				array_push($array_porcentaje, redondear_dos_decimal($porcentaje));
			}

			$grafico->torta_lista([$array_porcentaje,$nombre_especialidad],$id_nombre2);

/////////////Top 5 de los médicos más citados///
			$consulta = "SELECT DISTINCT id,persona_id FROM medico";
			//////obtengo etiquetas para el pie
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
		
	</head>
<body>

<?php
/*
echo '
	>> ERIKA <<
	';

for ($i=1;$i<7;$i++)
 	{ echo '<h'.$i.'> Pagarás David!! </h' .$i.'>'; }

echo "<BR><BR><BR>";

echo "Nos las pagarás todas juntas!!!";
echo " Esta también!!";
echo " y esta !!";

echo "<BR><BR><BR>";

echo "[ ";
foreach ($estados as $dato) {
 echo $dato.', '; }
echo "] ";

echo 
	'

	';*/
//mysqli_close($grafico->$conexion);
?>
	<aside class="col-md-2">
			<div class="list-group">
				<a href="#" class="list-group-item active">Graficos sobre</a>
				<a href="#" class="list-group-item"> Paciente </a>
				<a href="#" class="list-group-item"> Medicos </a>
				<a href="#" class="list-group-item"> Otros </a>
			</div>
	</aside>
	<div class="content">
		<div class="container-fluid">
		<div class="card">
		<div class="row">
			<h3 style="text-align: center;">Estados Por Pacientes</h3>
			<div class="col-md-8">
				<div id="canvas-holder" style="width:80%;">
				<canvas id="cuadro_freq_estados_pacientes" width="500" height="350"></canvas>
				</div>
			</div>
			<div class="col-md-2">
				<label class="text"> Inicio</label>
			 	<input class="form-control" type="date" name="uno">
			</div>
			<div  class="col-md-2">
				<label class="text"> Hasta</label>
				<input  class="form-control" type="date" name="dos">
			</div>
			<br>
			<br>
			<div class="col-md-2" >
				<button type="submit" class="btn btn-info btn-fill pull-right">
				Analizar
            	</button>	
			</div>
			
		</div>
		<div class="row" >
			<h3 style="text-align: center;">Porcentaje por Medicos de Especialidad</h3>
			<div class="col-md-8">
				<div id="canvas-holder" style="width:90%;">
					<canvas id="porcentaje_medicos_x_especialidad" width="500" height="350"></canvas>
				</div>
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

		</div>
		</div>
	</div>

	<!--<div class="wrapper">
    <div class="sidebar" >
    <div class="sidebar-wrapper">
    	<div class="col-md-3">
    	<a href="#" class="list-group-item active">Paciente</a>
		<a href="#" class="list-group-item"> Medicos </a>
		<a href="#" class="list-group-item"> Otros </a>
		</div>
    </div>
    </div>
    </div>-->
	<!-- Librería jQuery requerida por los plugins de JavaScript -->

    <script src="http://code.jquery.com/jquery.js"></script>
 
    <!-- Todos los plugins JavaScript de Bootstrap (también puedes
         incluir archivos JavaScript individuales de los únicos
         plugins que utilices) -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

	</body>
	</html>

   @endsection