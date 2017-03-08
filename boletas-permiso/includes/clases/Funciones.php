<?php 

function formatear_fecha($fecha){
	$date= new DateTime($fecha);
	return $date->format('d-m-Y');
}



function motivo($idmotivo){

	switch ($idmotivo) {
		case '1':
			return "Salud";
			break;
		case '2':
			return "Familiar";
			break;
		case '3':
			return "Otro";
			break;
		
	}

}


function modalidad($idmodalidad){

	switch ($idmodalidad) {
		case 1 :
			return "A compensar";
			break;
		case 2 :
			return "A descontar";
			break;
		
		
	}

}
function estado($estado){

	switch ($estado) {
		case 1 :
			return "Pendiente";
			break;
		case 2 :
			return "Denegado";
			break;
		
		case 3 :
			return "Aprobado";
			break;
	}

}

function limpiar_fec($fecha4,$mod){
		if($mod!=1){

			return "Descuento";
		}
		else{
			return $fecha4;
		}

}

function diff_horas($hora1,$hora2){
	$h1=substr($hora1, 0,2);
	$m1=round((substr($hora1, -2)/60),2);
	$dh1=$h1+$m1;

	$h2=substr($hora2, 0,2);
	$m2=round((substr($hora2, -2)/60),2);
	$dh2=$h2+$m2;
	$diff=$dh2-$dh1;
	$hdiff=floor($diff);
	$mdiff=($diff-$hdiff);


	return $hdiff+$mdiff;

	
}


function user_firma($conexion,$dni){
	$query="SELECT nomusuario,apeusuario,cargo from usuario where dniusuario='".$dni."'";
	$rs=$conexion->query($query);
	if ($dato=mysqli_fetch_array($rs)) {
		return $dato['nomusuario']." ".$dato['apeusuario']."<br>(".$dato['cargo'].")";
	}

	else{
		return "Pendiente";
	}
}











 ?>

