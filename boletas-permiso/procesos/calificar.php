<?php 
session_start();
include ('../config.php');
require_once '../includes/bd/conexion.php';

$idboleta		=$_REQUEST['idboleta'];
$dirigido		=$_REQUEST['dirigido'];
$cal 			=$_REQUEST['cal'];		
$bd= new Conexion();

if($cal==1){
	
	if($_SESSION[KEY.TIPO]==2){
		$aprobar="UPDATE boleta set dnisuperior='".$dirigido."',firma2='".$_SESSION[KEY.DNI]."' where idboleta=".$idboleta."";
	}
	if($_SESSION[KEY.TIPO]==3){
		$aprobar="UPDATE boleta set firma3='".$_SESSION[KEY.DNI]."',estado=3 where idboleta=".$idboleta."";
	}	
	
	$exec=$bd->query($aprobar);
	
	echo "<script>
     	alert('Firmado');
     	window.location='".PATH."';
  		</script>";

}

else {

	$denegar="UPDATE boleta set estado=2 where idboleta=".$idboleta." ";
	$execdenegar=$bd->query($denegar);	
		echo "<script>
     	alert('Denegado');
     	window.location='".PATH."';
  		</script>";
}


	




 ?>