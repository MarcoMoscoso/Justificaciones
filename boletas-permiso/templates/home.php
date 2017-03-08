<?php include('session.php'); 
	  	

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Bienvenidos</title>
<?php include('templates/enlaces/principal.php'); ?>
<?php include('templates/enlaces/selectize.php'); ?>
<?php include('templates/enlaces/datatables.php'); ?>

</head>
<body>
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<?php include('templates/nav.php'); ?>
</div>
</div>


<?php 
	if($_SESSION[KEY.TIPO]<3)
	{include('pages/form.php');
		
	}
	else{
		include('pages/relacionboleta/tabla.php');

	}

	 ?>

</div>
</body>
</html>