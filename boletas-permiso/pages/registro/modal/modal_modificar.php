<form id="actualidarDatos" name="actualizarDatos">
<div class="modal fade" id="dataUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Actualizar Reporte</h4>
      </div>
      <div class="modal-body">
			<div id="datos_ajax"></div>

<input type="hidden" class="form-control" id="id" name="id">

<div class="form-group">
<input type="date" class="form-control" id="fecha" name="fecha" required maxlength="100"onchange="Mayusculas(this)" readonly="">
</div>

<label>Orden de Trabajo</label>
<div class="form-group">  
<div class="row">
<div class="col-md-6">
<input type="hidden" id="idot" name="ot">
<input type="text" class="form-control" id="ot" name="" required maxlength="100" onchange="Mayusculas(this)" readonly="">
</div>
<div class="col-md-6">
<select name="otnueva" id="otnueva" class="demo-default">
<option value="">[Seleccionar]</option>
<?php 
$db     = new Conexion();
$query  = "SELECT * FROM cencos_ot WHERE estado='ACTIVO' ORDER BY ot";
$result = $db->query($query);
while ($fila = mysqli_fetch_object($result))
{
echo "<option value='$fila->id'>$fila->ot</option>";
}

?>
</select>
<script >
$('#otnueva').selectize({
maxItems: 1
});
</script>
</div>
</div>
</div>


<div class="form-group">
<label  class="control-label">Descripción de Trabajo</label>
<textarea name="descripcion" id="descripcion"  rows="6" class="form-control" required=""></textarea>
</div>

 





        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Actualizar datos</button>
      </div>
    </div>
  </div>
</div>
</form>