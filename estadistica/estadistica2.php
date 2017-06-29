<?php

// CONEXION //////////////////////////////////////////////////////////
$host = "localhost";
$puerto = "3306";
$usuario = "root";
$contrasenna = "";
$bbdd = "ment-care";
$tabla = "paciente";
$conexion = mysqli_connect($host,$usuario,$contrasenna);

mysqli_select_db($conexion,$bbdd);
mysqli_set_charset($conexion,"utf8");
//////////////////////////////////////////////////////////////////////

echo 
	'
	<html>
	<head>
		<title>ASAROVA</title>
		<script type="text/javascript" src="jquery-1.12.0.min.js"></script>
	<script type="text/javascript" src="Chart.bundle.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		//document.write(getRandom());
		var datos = {
			type: "pie",
			data : {
				datasets :[{
					data : [
	';
	
	//					5,
	//					10,
	//					40,
	//					12,
	//					23,

//for ($i=1;$i<10;$i++) {echo ($i*10).',';}

// CONSULTA MYSQL ////////////////////////////////////////////////////
$consulta = "SELECT DISTINCT estado FROM paciente";
$resultado = mysqli_query($conexion,$consulta);
//////////////////////////////////////////////////////////////////////

// CAPTURAR DATOS DE LA BBDD /////////////////////////////////////////
$datos = [];
while($fila = mysqli_fetch_row($resultado))
 	{ array_push($datos,$fila[0]); }
$Num_Estados = count($datos);

//echo "[ ";
//for ($i=0;$i<$Num_Estados;$i++)
// 	{ echo $datos[$i].', '; }
//echo "] ";

//echo "<BR><BR><BR>";
$frecuencias = [];
for ($i=0;$i<$Num_Estados;$i++)
	{
	$consulta = "SELECT COUNT(*) FROM paciente where estado=".$datos[$i];
	$NPac = mysqli_query($conexion,$consulta);
	$NPac_S = mysqli_fetch_row($NPac);
	$NPac_Est_i = $NPac_S[0];
	//$NPac_Est_i = $i;
	echo $NPac_Est_i.', ';
	array_push($frecuencias,$NPac_Est_i);
	}

// /////////////////////////////////////////////////////////////////////

echo	
	'
					],
					backgroundColor: [
						"#F7464A",
						"#46BFBD",
						"#FDB45C",
						"#949FB1",
					],
				}],
				labels : [
					"Estado 1",
					"Estado 2",
					"Estado 3",
					"Estado 4",
				]
			},
			options : {
				responsive : true,
			}
		};

		var canvas = document.getElementById("chart").getContext("2d");
		window.pie = new Chart(canvas, datos);
	';
	/*
		setInterval(function(){
			datos.data.datasets.splice(0);
			var newData = {
				backgroundColor : [
					"#F7464A",
					"#46BFBD",
					"#FDB45C",
					"#949FB1",
					"#4D5360",
				],
				data : [getRandom(), getRandom(), getRandom(), getRandom(), getRandom()]
			};

			datos.data.datasets.push(newData);

			window.pie.update();

		},12121);



		function getRandom(){
			return Math.round(Math.random() * 100);
		}
	*/

echo
	'
		
	});
	
	</script>

 	';
echo
	'
	</head>
	';


echo 
	'
	<body>
	>> ERIKA <<
	';

for ($i=1;$i<7;$i++)
 	{ echo '<h'.$i.'> Pagarás David!! </h' .$i.'>'; }

echo "<BR><BR><BR>";

echo "[ ";
for ($i=0;$i<$Num_Estados;$i++)
 	{ echo $frecuencias[$i].', '; }
echo "] ";

echo 
	'
	<div id="canvas-container" style="width:50%;">
		<canvas id="chart" width="500" height="350"></canvas>
	</div>

	</body>
	</html>
	';
//phpinfo();

mysqli_close($conexion);
?>