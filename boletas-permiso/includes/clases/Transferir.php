<?php 


function registrar_ot($ot,$cencost,$fechainicio,$fechafin)
{

$db     = new Conexion();
$query  = "INSERT INTO cencos_ot(ot,cencost,fecha_inicio,fecha_fin,comentario)
VALUES('".$ot."','".$cencost."','".$fechainicio."','".$fechafin."','')";
$result = $db->query($query);
if($result)
echo "ok INSERT";
else
echo "error INSERT";

}


function actualizar_ot($estado,$ot)
{

$db     = new Conexion();
$query  = "UPDATE cencos_ot SET estado='".$estado."' WHERE ot='".$ot."'";
$result = $db->query($query);
if($result)
echo "ok UPDATE";
else
echo "error UPDATE";
	
}



 ?>