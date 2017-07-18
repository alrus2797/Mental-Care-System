@extends('layouts.template')
@section('title', 'NEstadistica')
 
   @section('content')      
   	<b>
   		<h2>Bienvenido a Estadistica</h2>
   		<h1>Graficos</h1>
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
				////////////esto seria como un template
			$frecuencia=$grafico->each_dato($array_filas,$tabla,$columna);
			$id_nombre1="cuadro_freq_estados_pacientes";
			///////////////graficamos
			$grafico->torta_lista([$frecuencia,$estados],$id_nombre1);

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
				<a href="/estadistica/paciente" class="list-group-item active">Paciente</a>
				<a href="/estadistica/medicos" class="list-group-item"> Medico </a>
				<a href="/estadistica/citas" class="list-group-item"> Citas </a>
			</div>
	</aside>
	<div class="content">
		<div class="container-fluid">
		<div class="card">
		<h3 style="text-align: center;"> Estados Por Pacientes</h3>
		<div class="row">
			<div class="col-md-4">
				<label class="text"> Inicio</label>
			 	<input class="form-control" type="date" name="uno">
			</div>
			<div  class="col-md-4">
				<label class="text"> Hasta</label>
				<input  class="form-control" type="date" name="dos">
			</div>
		</div>
		<div class="row">
			<div class="col-md-10">
				<div id="canvas-holder" style="width:80%;">
				<canvas id="cuadro_freq_estados_pacientes" width="500" height="350"></canvas>
				</div>
			</div>
			<div class="col-md-2" >
				<button type="submit" class="btn btn-info btn-fill pull-right">
				Analizar
            	</button>	
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