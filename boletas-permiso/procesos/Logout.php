<?php 

include('../config.php');
include('../includes/clases/Acceso.php');
include('../includes/bd/conexion.php');

$db = new Conexion();

$acceso  = new Acceso('?','?');
$acceso -> Logout();

 ?>