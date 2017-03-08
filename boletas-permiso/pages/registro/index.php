<?php  
include('../../config.php');
include('../../session.php');
include('../../includes/bd/conexion.php');
include('../../includes/clases/Funciones.php');
include('../../includes/bd/conexionSQLserver.php');

$fecha_trabajo = mostrar_fecha_trabajo($_SESSION[KEY.USUARIO]);

 ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
     <title>Registro de Reportes</title>
  <?php include('../../templates/enlaces/principal.php'); ?>
	<?php include('../../templates/enlaces/datatables.php'); ?>
  <?php include('../../templates/enlaces/sweealert.php'); ?>
<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
// Parametros para el combo
$("#horainicio").change(function () {
$("#horainicio option:selected").each(function () {
elegido=$(this).val();
$.post("horas.php", { elegido: elegido }, function(data){
$("#horafin").html(data);
});     
});
});    
});
</script>
<?php include('../../templates/enlaces/selectize.php') ?>
<style>
table{font-size: 12px;}
</style>

  </head>
  <body>
  <?php include("modal/modal_agregar.php");?>
  <?php include("modal/modal_modificar.php");?>
  <?php include("modal/modal_eliminar.php");?>
    <div class="container-fluid">
     
    <div class="row">
    <div class="col-md-12">
    <?php include('../../templates/nav.php'); ?>
    </div>
    </div>

     <div class="row">
     <div class="col-md-12">
    <div class="pull-right">
     <div class="form-group">
     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#dataRegister"><i class='glyphicon glyphicon-plus'></i> Agregar Reporte</button>
     </div>
    </div>
     </div>
     </div>
		
	  <div class="row">
		<div class="col-xs-12">
		<div class="panel panel-default">
			<div class="panel-heading">
		    Detalle de Reporte
			</div>
			<div class="panel-body">

			<div id="loader" class="text-center"> <img src="img/loader.gif"></div>
			<div class="datos_ajax"></div><!-- Datos ajax Final -->
			<div class="outer_div"></div><!-- Datos ajax Final -->
			
			</div>
		</div>
		</div>
	  </div>


	</div>

	<script src="js/app.js"></script>
	<script>
		$(document).ready(function(){
			load(1);
		});
	</script>
 </body>
</html>