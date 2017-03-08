<form id="guardarDatos">
<div class="modal fade" id="dataRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Agregar Reporte</h4>
      </div>
      <div class="modal-body">
          <div id="datos_ajax_register"></div>
          <div class="form-group">
          <input type="date" name="fecha" class="form-control" value="<?php echo $fecha_trabajo; ?>" readonly>
          </div>
          <div class="form-group">
          <label class="control-label">OT</label>
          <select name="ot" id="of" class="demo-default" required="">
          <option value="">[Seleccionar]</option>
          <?php 
          $link     = Conectarse();
          $query  = "SELECT OF_COD FROM [018BDCOMUN].[dbo].[ORD_FAB] WHERE OF_ESTADO='ACTIVO' ORDER BY OF_COD ASC";
          $result = mssql_query($query);
          while ($fila = mssql_fetch_object($result))
           {
            echo "<option value='$fila->OF_COD'>$fila->OF_COD</option>";
           }

           ?>
          </select>
          <script >
          $('#of').selectize({
          maxItems: 1
          });
          </script>
          </div>

          <div class="form-group">
          <label class="control-label">Hora Inicio</label>
          <select name="horainicio" id="horainicio" class="demo-default" required="">
          <option value="">[Seleccionar]</option>
          <?php 
          $db     = new Conexion();
          $query  = "SELECT * FROM horas ORDER by valor";
          $result = $db->query($query);
          while ($fila = mysqli_fetch_object($result))
           {
            echo "<option value='$fila->descripcion'>$fila->descripcion</option>";
           }

           ?>
          </select>
          <script >
          $('#horainicio').selectize({
          maxItems: 1
          });
          </script>
          </div>

          <div class="form-group">
          <div id="horafin"></div>
          </div>


          <div class="form-group">
          <label  class="control-label">Descripción de Trabajo</label>
          <textarea name="descripcion" id="" class="form-control" rows="6" required=""></textarea>
          </div>

          

            


	
          
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar datos</button>
      </div>
    </div>
  </div>
</div>
</form>