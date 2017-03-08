<?php 

include('config.php');
session_start();

if (!isset($_SESSION[KEY.USUARIO]))
{
 include('templates/acceso.php');
} 
else
{
include('includes/clases/Funciones.php');
include('includes/bd/conexion.php');

include('templates/home.php');
}

 ?>