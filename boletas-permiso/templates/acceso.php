<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Acceso</title>
<?php include('templates/enlaces/principal.php'); ?>
<?php include('templates/enlaces/selectize.php'); ?>
</head>
<body>
<div class="container-fluid">
<div class="row">
<div class="col-md-4">
</div>
<div class="col-md-4">
<h1 class="text-center">Boleta de Permiso</h1>

<p></p>
<form action="procesos/Login" method="post" autocomplete="Off">
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title text-center">Iniciar Sesión</h3>
	</div>
	<div class="panel-body">
	 <div class="form-group">
	 <input type="text" name="user" id="" class="form-control" placeholder="Ingrese su Usuario" required="" autofocus="">
	 </div>
	 <div class="form-group">
	 <input type="password" name="pass" id="" class="form-control" placeholder="Ingrese su Contraseña" required="">
	 </div>
	
	 <button class="btn btn-success col-md-4 col-md-offset-4">Ingresar</button>
	</div>
</div>
</form>
</div>
</div>
</div>	
</body>
</html>