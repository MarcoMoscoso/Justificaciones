
<?php
include ('../config.php');
include'../includes/clases/Funciones.php';
require_once '../includes/bd/conexion.php';
session_start();


$superior		=$_REQUEST['superior'];
$solicitante=$_REQUEST['solicitante'];
$idarea			=$_SESSION[KEY.AREA];
$motivo			=$_REQUEST['motivo'];
$desde			=$_REQUEST['desde'];
$hasta			=$_REQUEST['hasta'];
$detalle		=$_REQUEST['detalle'];
$modalidad		=$_REQUEST['modalidad'];
$fechacompensar	=$_REQUEST['compensafecha'];
$firma			=$_REQUEST['firma'];
$fecharegistro=date("Y-m-d");
$difhoras=diff_horas($desde,$hasta);
  if($_SESSION[KEY.TIPO]==1){
    $solicitante=$_SESSION[KEY.DNI];
    $firma1=$_SESSION[KEY.DNI];
    $firma2="0";
    $firma3="0";
  }
  if ($_SESSION[KEY.TIPO]==2) {
    $firma1=$solicitante;
    $firma2=$_SESSION[KEY.DNI];
    $firma3="0";
  }

	
$bd  =new Conexion();
$grabar="INSERT INTO boleta(fecha_creacion,dnisuperior,dnisolicitante,idarea,motivo,detalle,horasalida,horallegada,total,modalidad,fechacompensar,firma1,firma2,firma3)
         VALUES('".$fecharegistro."','".$superior."','".$solicitante."','".$idarea."','".$motivo."','".$detalle."','".$desde."','".$hasta."',".$difhoras.",'".$modalidad."','".$fechacompensar."','".$firma1."','".$firma2."','".$firma3."')";

#ECHO $grabar;

if ($bd->query($grabar)) {

	echo "<script>
     alert('Enviado con exito');
     window.location='".PATH."';
  </script>";
}
else{
	echo "<script>
     alert('Error al registrar');
     window.location='".PATH."';
  </script>";
}

 ?>