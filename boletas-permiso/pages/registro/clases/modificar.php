<?php

	# conectare la base de datos
    include('../../../config.php');
    include('../../../includes/bd/conexion.php');
    include('../../../includes/clases/Reporte.php');
    $db = new Conexion();
    
    $id          = addslashes($_POST['id']);
    $descripcion = addslashes($_POST['descripcion']);
    $idot        = addslashes($_POST['ot']);
    $otnueva     = addslashes($_POST['otnueva']);
    
    if(empty($otnueva))
    {
     $ot = $idot ;
    }
    else
    {
     $ot = $otnueva;
    }

    $reporte = new Reporte('?','?','?','?','?',$descripcion,'?',$ot);
    $valor   = $reporte->Actualizar($id);
    
    if ($valor == 'ok')
    {
    echo '<script>swal("Buen Trabajo", "Actualización Exitosa", "success")</script>';
    }
    else if ($valor == 'error')
    {
    echo '<script>sweetAlert("Ocurrio un error al Actualizar", "Consulte al área de soporte", "error");</script>';
    }
    else 
    {
    echo '<script>sweetAlert("Ocurrio un error inesperado", "Consulte al área de soporte", "error");</script>';
    }



    
    

     
	



			

?>