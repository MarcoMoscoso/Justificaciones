<?php 

class Acceso
{

protected $user;
protected $pass;


function __construct($user,$pass)
{

$this->user  = addslashes($user);
$this->pass  = addslashes($pass);


}


function Login()
{

$db      = new Conexion();
$query   = "SELECT * FROM usuario WHERE 
            dniusuario='".$this->user."' 
            AND passusuario='".$this->pass."'";
$result  = $db->query($query);
$numfila = $result->num_rows;
$dato    = mysqli_fetch_array($result);
if ($numfila > 0)
{
session_start();
$_SESSION[KEY.USUARIO]   = $dato['idusuario'];
$_SESSION[KEY.NOMBRES]   = $dato['nomusuario'];
$_SESSION[KEY.APELLIDOS] = $dato['apeusuario'];
$_SESSION[KEY.DNI]       = $dato['dniusuario'];
$_SESSION[KEY.TIPO]      = $dato['tipousuario'];
$_SESSION[KEY.AREA]      = $dato['idarea'];

echo "<script>
     window.location='".PATH."';
     </script>";
}
else
{
echo "<script>
     alert('Usuario o Contraseña Incorrecto');
     window.location='".PATH."';
     </script>";
}




}


function Logout()
{

session_start();

if (!isset($_SESSION[KEY.USUARIO]))
{
  echo "<script>
     window.location='".PATH."';
     </script>";
}
else 
{
   unset($_SESSION[KEY.USUARIO]);
   unset($_SESSION[KEY.NOMBRES]);
   unset($_SESSION[KEY.APELLIDOS]);
   unset($_SESSION[KEY.DNI]);
   unset($_SESSION[KEY.TIPO]);
   unset($_SESSION[KEY.AREA]);
   unset($_SESSION['fecha']);
  echo "<script>
     window.location='".PATH."';
     </script>";
}



}




}






 ?>