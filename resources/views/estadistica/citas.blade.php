

@extends('layouts.app')
@section('title', 'NEstadistica')
@section('content')

<html>

	<head>
		@include('estadistica.funciones2')
		@include('estadistica.extras_funciones')
		@include('estadistica.funciones_ali')
    	<link href="{{asset('css/bootstrap.min.css')}}" 
    		  rel="stylesheet" media="screen">		
		<script type="text/javascript" 
				src="{{asset('js/jquery-1.12.0.min.js')}}">
		</script>
		<script type="text/javascript" 
				src="{{asset('js/Chart.bundle.min.js')}}">
		</script>
		<script type="text/javascript">
   		$(document).ready(function(){
   			/////////////Top 5 de los médicos más citados///
   			
   			<?php
   			$grafico=new grafico();

			if (isset($_POST['date_inicio']) ){
				echo' $("#date_inicio").val("'.$date_inicio_c.'"); ';
   				echo '$("#date_final").val("'.$date_final_c.'"); ';
   			///////////////creabdo tablas
   				///la tabla temporari solo es para una sesion
			$consultavirtuales="CREATE TEMPORARY TABLE citas_rango SELECT id,horario_medico_id FROM citas WHERE fecha_de_cita<'".$date_final_c."'AND fecha_de_cita >'".$date_inicio_c."';";
			$grafico->tablas_virtuales($consultavirtuales);
			$consultavirtuales="CREATE TEMPORARY TABLE citas_medico SELECT DISTINCT citas_rango.id,medicos_id FROM citas_rango INNER JOIN horario_medicos ON citas_rango.horario_medico_id=horario_medicos.id ; ";	
			$grafico->tablas_virtuales($consultavirtuales);
			
			$sacar_medicoid="SELECT DISTINCT medicos_id FROM citas_medico ;";
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
				$consulta = "CREATE TABLE  citas_medico SELECT DISTINCT citas.id,medicos_id FROM citas INNER JOIN horario_medicos ON citas.horario_medico_id=horario_medicos.id ;";
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
			
   			?>
   		});

   	</script>
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
			<h3 style="text-align:center;">Top de los 5 medicos más citados </h3>
			<div class="col-md-4">
				<label class="text" > Inicio</label>
			 	<input class="form-control" name="date_inicio" id="date_inicio" type="date">
			</div>
			<div class="col-md-4" name="inicio2" >
				<label class="text"> Hasta</label>
				<input  class="form-control" name="date_final" id ="date_final" type="date">
			</div>
			<div class="col-md-4" >
					<input value="Analizar" type="submit" class="btn btn-info btn-fill pull-right" >
					
			</div>
		</form>

		<div class="row">
		<div class="col-md-8">
		<div id="canvas-container" style="width:90%;">
			<canvas id="top5_medico_citados" width="500" height="350"></canvas>
		</div>
		</div>
		</div>
		<h3 style="text-align:center;">Citas Porcentaje </h3>
		<form action="/estadistica/porcentajecitas" method="post" >
			{{ csrf_field() }}
			<div class="col-md-4">
				<label class="text" > Inicio</label>
			 	<input class="form-control" name="date_inicio2" id="date_inicio2" type="date" >
			</div>
			<div class="col-md-4" name="inicio2" >
				<label class="text"> Hasta</label>
				<input  class="form-control" name="date_final2" id ="date_final2" type="date">
			</div>
			<div class="col-md-4" >
				<input value="Analizar" type="submit" class="btn btn-info btn-fill pull-right" >
			</div>
		</form>

			<?php
	$tamanno = 1; 

	$bbdd = new grafico();
	//$consulta = "SELECT DISTINCT id FROM estados";
	$consulta = "SELECT id, estado_cita FROM estado_cita";
	$rpta = $bbdd->obt($consulta);
	$id_estados = $rpta[0];
	$estados = $rpta[1];
	
	$num_estados =  count($estados);
	if(isset($_POST['date_inicio2']) )
	{
		$inicio = $date_inicio_c2;//'2017-09-01';
		$fin = $date_final_c2;//'2018-12-31';
		$mi_orden =  "CREATE TEMPORARY TABLE citas_rango 
					  SELECT * FROM citas 
					  WHERE fecha_de_cita > '".$inicio."' 
					  AND fecha_de_cita < '".$fin."'";
		$bbdd->orden($mi_orden);

		$freq = [];
		$total = 0;
		foreach ($id_estados as $id_estado_i)
		{
			$consulta = "SELECT COUNT(*) FROM citas_rango WHERE estado_id=".$id_estado_i;
			$rpta = $bbdd->obt($consulta);
			array_push($freq, $rpta[0]);
			$total += $rpta[0];
		}

		$mi_orden =  "DROP TABLE citas_rango"; 
		$bbdd->orden($mi_orden);

		/*// Ver resultado intermedio //////////////////////////////////
		echo "<BR><BR>Frecuencias = [ ";
		foreach ($freq as $freq_i) 
			{ echo $freq_i.","; }
		echo " ]";
		//////////////////////////////////////////////////////////////*/

		for ($i=0;$i<$num_estados;$i++)
			{ if($total!=0) $freq[$i] = round($freq[$i]*100/$total); 
			  else $freq[$i] = 0; }

		/*// Ver resultado intermedio //////////////////////////////////
		echo "<BR><BR>Frecuencias % = [ ";
		foreach ($freq as $freq_i) 
			{ echo $freq_i.","; }
		echo " ]";
		//////////////////////////////////////////////////////////////*/

		echo "<BR><BR>";

		echo '<div id="canvas-container" style="width:50%;">';
		//torta($estados,$freq);
		torta($estados,$freq,$inicio,$fin);
		echo '</div>';

		echo "<BR><BR>";
	}
	else
	{
		$mi_orden =  "CREATE TEMPORARY TABLE citas_rango 
					  SELECT * FROM citas ";
		$bbdd->orden($mi_orden);

		$freq = [];
		$total = 0;
		foreach ($id_estados as $id_estado_i)
		{
			$consulta = "SELECT COUNT(*) FROM citas_rango WHERE estado_id=".$id_estado_i;
			$rpta = $bbdd->obt($consulta);
			array_push($freq, $rpta[0]);
			$total += $rpta[0];
		}

		$mi_orden =  "DROP TABLE citas_rango"; 
		$bbdd->orden($mi_orden);

		/*// Ver resultado intermedio //////////////////////////////////
		echo "<BR><BR>Frecuencias = [ ";
		foreach ($freq as $freq_i) 
			{ echo $freq_i.","; }
		echo " ]";
		//////////////////////////////////////////////////////////////*/

		for ($i=0;$i<$num_estados;$i++)
			{ if($total!=0) $freq[$i] = round($freq[$i]*100/$total); 
			  else $freq[$i] = 0; }

		/*// Ver resultado intermedio //////////////////////////////////
		echo "<BR><BR>Frecuencias % = [ ";
		foreach ($freq as $freq_i) 
			{ echo $freq_i.","; }
		echo " ]";
		//////////////////////////////////////////////////////////////*/

		echo "<BR><BR>";

		echo '<div id="canvas-container" style="width:50%;">';
		//torta($estados,$freq);
		torta($estados,$freq,"","");
		echo '</div>';

		echo "<BR><BR>";
	}


	?>


	</body>

</html>

@endsection