<?php 
include('../config.php');
include('../includes/bd/conexion.php');
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Justificaciones</title>

<?php include('../templates/enlaces/principal.php'); ?>
<?php include('../templates/enlaces/selectize.php'); ?>



<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
// Parametros para el combo
$("#idempresa").change(function () {
$("#idempresa option:selected").each(function () {
elegido=$(this).val();
$.post("../ajax/personal.php", { elegido: elegido }, function(data){
$("#idpersonal").html(data);
});     
});
});    
});
</script>



<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
// Parametros para el combo
$("#idpersonal").change(function () {
$("#idpersonal option:selected").each(function () {
elegido=$(this).val();

$.post("../ajax/area.php", { elegido: elegido }, function(data){
$("#idarea").html(data);
});     
});
});    
});
</script>

<script type="text/javascript">
        function toggle(elemento) 
        {
          if(elemento.value=="OTRO") 
           {
              document.getElementById("motivo2").style.display = "block";
              
           }
           else
           {
            document.getElementById("motivo2").style.display="none";
           }
            
            
        }
</script>

</head>
<body>
	
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<?php include('../templates/nav.php'); ?>

</div>
</div>

<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title" style="text-align: center;">Boleta de Permiso</h3>
    </div>
    <form action="../procesos/registrarJustificacion.php" method="post">
        <div class="panel-body">
         <div class="row">
            <div class="col-md-2">
            <label for="">Fecha</label>
            <input type="date" name="txtfecha" class="form-control">
            </div>

            <div class="col-md-3">
                <div class="form-group">
                <label for="">Empresa</label>
                <select id="idempresa" name="txtempresa"  class="demo-default"   required="">
                <option value="">[Seleccionar]</option>
                 <?php 
                $link   = Conectarse();
                $query  = "
                SELECT Cod_Empresa,Dsc_Empresa FROM [TCX_Asistencia].DBO.Empresa ORDER BY Dsc_Empresa";
                $result = mssql_query($query);
                while ($fila = mssql_fetch_object($result)) 
                  {
                 echo "<option value='$fila->Cod_Empresa'>$fila->Dsc_Empresa</option>";
                  }
                  ?>
                </select>
     
                 <script >
                $('#idempresa').selectize({
                maxItems: 1
                });
                </script>
                </div>
            </div>

             <div class="col-md-5">
             <div id="idpersonal"></div>
             </div>

             <div class="col-md-2">
             <div id="idarea"></div>
             </div>

        </div>

        <div class="row">
            <div class="col-md-10">
                 <label for="">Motivo de Permiso</label>
                 <br>
                <label class="radio-inline">
                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="SALUD" onclick="toggle(this)" > SALUD
                </label>
                <label class="radio-inline">
                <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="FAMILIAR" onclick="toggle(this)" >FAMILIAR
                </label>
                <label class="radio-inline">
                <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="OTRO" onclick="toggle(this)"> OTRO
                </label>
                <br>                
            </div>
            <div class="col-md-4"   id="motivo2"  style="display: none;"><input  type="text" class="form-control" name="otros"></div>
            

        </div>
        <br>

        <div class="row form control">
            <div class="col-md-10">
                <label>Horas Justificadas:</label>
                <br>
                <div class="col-md-2 "><input type="TEXT" placeholder="00:00" name="horasjustificadas" class="form-control"></div>
            </div>
        </div>

        <div >
            
        </div>


     

         <div class="row">
              <div class="col-md-12">
                <h3>Detalle de Compensación</h3>
                <textarea class="form-control" rows="3" name="txtdetalle"></textarea>
              </div>
         </div>
            <br>
         <div class="row ">
            <div class="col-md-4  col-md-offset-5">
             <div>
                <input id="idpersonal" name="variable" type="hidden" />
                 <button type="submit" class="btn btn-default">Registrar</button>
             </div>
            </div>
         </div>

    </div>
    
</form>
</div>
</div>
</div>



</div>
</body>
</html>