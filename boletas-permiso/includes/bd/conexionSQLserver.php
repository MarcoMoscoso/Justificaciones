<?php

  
function Conectarse()

{

if(!($link=mssql_connect(SERVERBD_SS,USERBD_SS,PASSBD_SS)))
{

echo"Error conectando la base de datos";

	exit();
}
  if (!mssql_select_db(BD_SS,$link)) 
  {

  	echo"Error seleccionando la base de datos";

  	exit();
}

return $link;

}


  ?>