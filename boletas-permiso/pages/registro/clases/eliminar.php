<?php

    # conectare la base de datos
    include('../../../config.php');
    include('../../../includes/bd/conexion.php');
    include('../../../includes/clases/Reporte.php');
    $db = new Conexion();
    
    $id          = addslashes($_POST['id']);
   
    $reporte = new Reporte('?','?','?','?','?','?','?','?');
    $valor   = $reporte->Eliminar($id);
    
    if ($valor == 'ok')
    {
    echo '<script>swal("Buen Trabajo", "Eliminación Exitosa", "success")</script>';
    }
    else if ($valor == 'error')
    {
    echo '<script>sweetAlert("Ocurrio un error al Eliminar", "Consulte al área de soporte", "error");</script>';
    }
    else 
    {
    echo '<script>sweetAlert("Ocurrio un error inesperado", "Consulte al área de soporte", "error");</script>';
    }



    
    

     
    



            

?>