<?php 
include('../../config.php');
include('../../session.php');
include('../../includes/bd/conexion.php');
include('../../includes/clases/Funciones.php');

 $horainicio  = $_POST['elegido'];
 $valor       = valor_horainicio($horainicio);

 ?>
<label>Hora Fin</label>
<select name="horafin" id="idhorafin" class="demo-default" required="">
<?php 
$db     = new Conexion();
$query  = "SELECT * FROM horas WHERE valor > '".$valor."'";
$result = $db->query($query);
while ($fila = mysqli_fetch_object($result))
{
echo "<option value='$fila->descripcion'>$fila->descripcion</option>";
}

?>
</select>
<script >
$('#idhorafin').selectize({
maxItems: 1
});
</script>