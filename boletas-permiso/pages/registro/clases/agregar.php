<?php

	# conectare la base de datos
    include('../../../config.php');
    include('../../../session.php');
    include('../../../includes/bd/conexion.php');
    include('../../../includes/clases/Funciones.php');
    include('../../../includes/clases/Reporte.php');
    $db      = new Conexion(); 		
    $fecha        = addslashes($_POST['fecha']);
    $horainicio   = addslashes($_POST['horainicio']);
    $horafin      = addslashes($_POST['horafin']);
    $horastrabajo = horastrabajo($horainicio,$horafin);
    $horashombre  = horashombre($horastrabajo);
    $descripcion  = addslashes($_POST['descripcion']);
    $usuario      = $_SESSION[KEY.USUARIO];
    $ot           = addslashes($_POST['ot']); 

        $reporte = new Reporte($fecha,$horainicio,$horafin,$horastrabajo,$horashombre,$descripcion,$usuario,$ot);
        $valor   = $reporte->Registrar();

        if ($valor =='existe') 
        {
        echo '<script>sweetAlert("Las hora seleccionada ya esta registrada", "Intente de Nuevo", "error");</script>';
        }
        else if ($valor == 'ok')
        {
        echo '<script>swal("Buen Trabajo", "Registro exitoso", "success")</script>';
        }
        else if ($valor == 'error')
        {
         echo '<script>sweetAlert("Ocurrio un error al Registrar", "Consulte al área de soporte", "error");</script>';
        }
        else 
        {
         echo '<script>sweetAlert("Ocurrio un error inesperado", "Consulte al área de soporte", "error");</script>';
        }

  



?>