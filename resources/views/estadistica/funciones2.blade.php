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
		    $this->bbdd ="ment-caretp1";
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
	while($fila = mysqli_fetch_row($resultado) )
	 	{ array_push($datos,$fila); }
		return $datos;		
	}

    public function tablas_virtuales($consulta)
    {
   	    $execucion= mysqli_query($this->conexion,$consulta); 
   	    
   	   // $fila = mysqli_fetch_row($execucion);
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


	//public func
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
		//$consulta="SELECT COUNT(id_user) FROM ".$tabla;
		$consulta="SELECT COUNT(id) FROM ".$tabla;
		$ejecutar = mysqli_query($this->conexion,$consulta);
		$fila = mysqli_fetch_row($ejecutar);
		return $fila[0];
	}
	public function terminar()
	{
		mysqli_close($this->conexion);
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
						backgroundColor: ['
						;
		foreach ($datos_array[0] as $v) {
			echo '"rgba('.rand(0,227).','
						 .rand(0,127).','
						 .rand(0,127).',0.5)",';	
		}

	echo '
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

///////////////////////funciones nuevas(ali)
	function obt($consultasql)
	    {
    	$rptasql = mysqli_query($this->conexion,$consultasql);
    	$datos = [];
    	$fila = mysqli_fetch_row($rptasql);
    	$ncolum = count($fila);
    	if($ncolum == 1)
    	{
    		array_push($datos,$fila[0]);
    		while($fila = mysqli_fetch_row($rptasql))
    			{ array_push($datos,$fila[0]); }
    	}
    	else if($ncolum != 0)
    	{

    		for($i=0;$i<$ncolum;$i++)
    		{
    			//array_push($datos,[]); 
    			array_push($datos,[$fila[$i]]); 
    		}
    		while($fila = mysqli_fetch_row($rptasql))
    		{ 
    			for($i=0;$i<$ncolum;$i++)
    				{ array_push($datos[$i],$fila[$i]); }
    		}
    	}
    	return $datos;
    }

    function orden($ordensql)
    {
    	mysqli_query($this->conexion,$ordensql);
    }

	function __destruct()
	{
		mysqli_close($this->conexion);
	}


	function torta($dominio,$rango,$date_inicio_c,$date_final_c)
	{
	echo '

	<script type="text/javascript">
	$(document).ready(function(){
		';

	echo' $("#date_inicio2").val("'.$date_inicio_c.'"); ';
   	echo '$("#date_final2").val("'.$date_final_c.'"); ';
   	echo '
		//document.write(getRandom());
		var datos = {
			type: "pie",
			data : {
				datasets :[{
					data : [
		';
	// colocar rango separados por comas
	foreach($rango as $i) { echo $i.','; }
	////////////////////////////////////

	echo'			],
					backgroundColor: [
		';
	foreach($rango as $i) 
	{ 
		echo '"rgba('.rand(0,127).','
					 .rand(0,127).','
					 .rand(0,127).',0.5)",'; 
	}
	echo '
					],
				}],
				labels : [
		';
	// colocar dominio separado por comas
	//foreach($dominio as $i) { echo '"'.$i.':"'.','; }
	$ndom = count($dominio);
	for($i=0; $i<$ndom; $i++)
		{ echo '"'.$dominio[$i].'s:'.$rango[$i].'%",'; }
	/////////////////////////////////////

	echo'		]
			},
			options : {
				responsive : true,
			}
		};

		var canvas = document.getElementById("torta").getContext("2d");
		window.pie = new Chart(canvas, datos);
	});
	
	</script>
	<canvas id="torta" width="500" height="500"></canvas>
	';
	}
}

?>