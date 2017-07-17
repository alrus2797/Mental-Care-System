<?php

/**
* Principal clase
*/
class Grafico
{
	public $host;
	public $puerto;
	public $usuario;
	public $contrasenna;
	public $bbdd;
	public $conexion;
	function __construct()
	{
		try
		{
			$this->host="localhost";
			$this->puerto="3306";
			$this->usuario="root";
			$this->contrasenna="";
		    $this->bbdd ="ment-care";
			$this->conexion = mysqli_connect($this->host,$this->usuario,$this->contrasenna);
			mysqli_select_db($this->conexion,$this->bbdd);
			mysqli_set_charset($this->conexion,"utf8");
		}
		catch(Exception $e)
		{
			die("Algo esta saliendo mal");
		}
	}

	public function get_datos($consulta)
	{
	// CONSULTA MYSQL ////////////////////////////////////////////////////
	$resultado = mysqli_query($this->conexion,$consulta);
	// CAPTURAR DATOS DE LA BBDD /////////////////////////////////////////
	$datos = [];
	while($fila = mysqli_fetch_row($resultado))
	 	{ array_push($datos,$fila); }
		return $datos;
	}

	public function each_dato($datos,$tabla,$columna)
	{
	$Num_Estados = count($datos);

	$frecuencias = [];
	$str_datos='';
	$i=0;
	for ($j=0;$j<$Num_Estados;$j++)
		{
		$consulta = "SELECT COUNT(*) FROM ".$tabla." where ".$columna."=".$datos[$j][$i];
		$NPac = mysqli_query($this->conexion,$consulta);
		$NPac_S = mysqli_fetch_row($NPac);
		$NPac_Est_i = $NPac_S[0];
		//echo $NPac_S[0].', ';
		array_push($frecuencias,$NPac_Est_i);
		}
		return $frecuencias;
	}

	public function mediconombreXid($array_id,$tabla,$columna)
	{
		$array_nombre=[];
		foreach ($array_id as $id) {
			$consulta="SELECT nombres FROM ".$tabla." Where ".$columna."=".$id;
			$ejecutar = mysqli_query($this->conexion,$consulta);
			$fila = mysqli_fetch_row($ejecutar);
			array_push($array_nombre,$fila[0]);
		}
		return $array_nombre;
	}

	public function cantidadXtabla($tabla)
	{
		$consulta="SELECT COUNT(id_user) FROM ".$tabla;
		$ejecutar = mysqli_query($this->conexion,$consulta);
		$fila = mysqli_fetch_row($ejecutar);
		return $fila[0];
	}

	public function bar_lista($datos_array,$id_nombre)
	{
		echo '
			var datos = {
				type : "bar",
				data :{
				labels : [';
		foreach ($datos_array[1] as $dato) {
			echo '"'.$dato.'", ';
		}
		echo	'],
				datasets : [{
					label : "' ;
		echo $id_nombre ;
		echo '",
					backgroundColor : "rgba(220,220,220,0.5)",
					data : [';
		foreach ($datos_array[0] as $dato) {
			echo $dato.', ';
		}
		echo 	']
				}
				]
				},
				options : {
					elements : {
						rectangle : {
							borderWidth : 1,
							borderColor : "rgb(0,255,0)",
							
						}
					},
					responsive : true,
					title : {
						display : true,
						text : "';
						echo $id_nombre;
echo					'"
					}
				}
			}; 
			var canvas = document.getElementById("';
			echo $id_nombre;
			echo '").getContext("2d");
			window.bar = new Chart(canvas, datos);
			';
	}

	public function torta_lista($datos_array,$id_nombre)
	{
		echo 
		'	var datos_pie = {
				type:"pie",
				data : {
					datasets :[{
						data :[';
		foreach ($datos_array[0] as $v) {
			echo $v.', ';
		}

	echo	
		'],
						backgroundColor: [
							"#F7464A",
							"#46BFBD",
							"#FDB45C",
							"#949FB1",
						],
					}],
					labels : [';
		foreach ($datos_array[1] as $v) {
			echo '"'.$v.'", ';
		}
	echo       ']
				},
				options : {
					responsive : true,
				}
			};

			var canvas = document.getElementById("';
	echo $id_nombre;
	echo  '").getContext("2d");
			window.pie = new Chart(canvas,datos_pie);
	';

	}
}

?>