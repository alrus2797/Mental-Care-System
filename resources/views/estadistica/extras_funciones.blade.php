<?php
function redondear_dos_decimal($valor) { 
   $float_redondeado=round($valor * 100) / 100; 
   return $float_redondeado; 
}

function ordenar_mayormenor($array_datos,$array_id)
{
	$Ndatos=count($array_datos);
	$min=0;
	for($i=0;$i<5;$i++) {
		$max=$i;
		for($j=$i+1;$j<$Ndatos;$j++)
		{
			if($array_datos[$i]<$array_datos[$j] )
				$max=$j;
		}
		//////datos
		$temp=$array_datos[$max];
		$array_datos[$max]=$array_datos[$i];
		$array_datos[$i]=$temp;
		////ids
		$temp2=$array_id[$max];
		$array_id[$max]=$array_id[$i];
		$array_id[$i]=$temp2;
	}
	$resultado_datos=[];
	$resultado_id=[];
	for($i=0;$i<5;$i++) {
		array_push($resultado_datos, $array_datos[$i]);
		array_push($resultado_id, $array_id[$i]);
	}
	return [$resultado_datos,$resultado_id];
}
?>