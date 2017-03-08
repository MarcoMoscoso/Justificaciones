<?php 

include('../config.php');
include('../includes/bd/conexion.php');
include('../includes/clases/Funciones.php');
include('../session.php');

$usuario = $_SESSION[KEY.USUARIO];
$fecha   = $_REQUEST['fecha'];

$valor   = registro_fecha($usuario,$fecha);

if ($valor=='ok') 
header('Location: '.PATH.'pages/registro');
else
echo "<script>
     alert('Error al registrar');
     window.location='".PATH."';
  </script>";
 ?>