<?php 

include ('../../config.php');
require_once '../../includes/bd/conexion.php';
include('../../includes/clases/Funciones.php');
session_start();





 ?>

 <!DOCTYPE html>
 <html lang="es">
 <head>
 	<meta charset="UTF-8">
 	<title>Firmar Boletas</title>
 	<?php include('../../templates/enlaces/principal.php'); ?>
	<?php include('../../templates/enlaces/selectize.php'); ?>
	<?php include('../../templates/enlaces/datatables.php'); ?>
 </head>
 <body>
 <div class="container-fluid">
 	
 	<div class="row">
		<div class="col-md-12">
		<?php include('../../templates/nav.php'); ?>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
		<?php  include('tabla.php'); ?>
		</div>
	</div>



 </div>
 	
 </body>

 </html>