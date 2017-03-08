<?php 

class Reporte
{

protected $fechainicio;
protected $horainicio;
protected $horafin;
protected $horastrabajo;
protected $horashombre;
protected $descripcion;
protected $usuario;
protected $ot;


function __construct($fechainicio,$horainicio,$horafin,$horastrabajo,$horashombre,$descripcion,$usuario,$ot)
{

$this->fechainicio  = $fechainicio;
$this->horainicio   = $horainicio;
$this->horafin      = $horafin;
$this->horastrabajo = $horastrabajo;
$this->horashombre  = $horashombre;
$this->descripcion  = $descripcion;
$this->usuario      = $usuario;
$this->ot           = $ot;

}


function Registrar()
{

$db      = new Conexion();
$query   = "SELECT * FROM reporte WHERE usuarios_id='".$this->usuario."' AND 
hora_inicio='".$this->horainicio."' AND fecha_inicio='".$this->fechainicio."'";
$result  = $db->query($query);
$numfila = $result->num_rows;
if ($numfila > 0)
{
return "existe";
}
else
{

 $query   = "INSERT INTO reporte(fecha_inicio,hora_inicio,hora_fin,horas_trabajo,horas_hombre,descripcion,usuarios_id,cencos_ot_id)
	 VALUES('".$this->fechainicio."','".$this->horainicio."','".$this->horafin."','".$this->horastrabajo."','".$this->horashombre."','".$this->descripcion."','".$this->usuario."','".$this->ot."')";
     $result  = $db->query($query);
     if($result)
     return "ok";
     else
     return "error";
	
}



}

function Actualizar($id)
{

$db     =  new Conexion();
$query  = "UPDATE reporte SET cencos_ot_id='".$this->ot."',
          descripcion='".$this->descripcion."' WHERE id='".$id."'";
$result = $db->query($query);
if($result)
return "ok";
else
return "error";

}


function Eliminar($id)
{

$db     =  new Conexion();
$query  = "DELETE FROM reporte WHERE id='".$id."'";
$result = $db->query($query);
if($result)
return "ok";
else
return "error";



}



}

 ?>