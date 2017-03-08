<?php 

class Usuario
{

protected $nombres;
protected $apellidos;
protected $dni;
protected $user;
protected $pass;
protected $tipo;
protected $area;


function __construct($nombres,$apellidos,$dni,$user,$pass,$tipo,$area)
{

  $this->nombres    = $nombres;
  $this->apellidos  = $apellidos;
  $this->dni        = $dni;
  $this->user       = $user;
  $this->pass       = $pass;
  $this->tipo       = $tipo;
  $this->area       = $area;

}


function Registrar()
{

$db      = new Conexion();
$query   = "SELECT * FROM usuarios WHERE user='".$this->user."'";
$result  = $db->query($query);
$numfila = mysqli_fetch_object($result);
if ($numfila > 0)
{
 return "existe";
} 
else
{
  $query  = "INSERT INTO usuarios(nombres,apellidos,dni,user,pass,area_id)
  VALUES('".$this->nombres."','".$this->apellidos."','".$this->user."','".$this->user."','".$this->pass."','".$this->area."')";
  $result = $db->query($query);
  if($result)
  return "ok";
  else
  return "error";
}


}

function Actualizar($id)
{
$db = new Conexion();
$query  = "UPDATE usuarios SET nombres='".$this->nombres."',apellidos='".$this->apellidos."',tipo='".$this->tipo."',area_id='".$this->area."' WHERE id='".$id."'";
  $result = $db->query($query);
  if($result)
  return "ok";
  else
  return "error";	
}

function Eliminar($id)
{
$db = new Conexion();
$query  = "DELETE FROM usuarios WHERE id='".$id."'";
  $result = $db->query($query);
  if($result)
  return "ok";
  else
  return "error";
}


function  Existe_reporte($usuario)
{

$db      = new Conexion();
$query   = "SELECT count(*) as cantidad FROM reporte WHERE  usuarios_id='".$usuario."'";
$result  = $db->query($query);
$numfila = $result->num_rows;
return $numfila;

}



}

 ?>