<?php 

include('../config.php');
include('../includes/clases/Acceso.php');
include('../includes/bd/conexion.php');

$db = new Conexion();

$acceso  = new Acceso($_POST['user'],$_POST['pass']);
$acceso -> Login();





 ?>