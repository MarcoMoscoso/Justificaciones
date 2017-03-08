<?php 
    $con=new Conexion();
    $horas="SELECT * from horas";
    $rshoras=$con->query($horas);
    $rshoras2=$con->query($horas);
 ?>

<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-heading">
        		<h3 class="panel-title" style="text-align: center;">Boleta de Permiso</h3>
       		</div>
    
    		<form action="procesos/registrarBoleta.php" method="get">
    			<br>
    			<div class="row ">
    				<div class="col-md-5 col-md-offset-1 ">
    					<label for="">Dirigido a:</label> 
    					<select name="superior" id="" class="form-control">
    						<?php $sql="SELECT * from usuario where tipousuario>".$_SESSION[KEY.TIPO]." and idarea in ('66','".$_SESSION[KEY.AREA]."')" ;
    								$rs=$con->query($sql);
    								while ($filas=mysqli_fetch_array($rs)) {    									
    								
    						?>
    						<option value=<?php echo $filas['dniusuario']; ?>><?php echo $filas['nomusuario']." ".$filas['apeusuario']; ?></option>

    						<?php }?>
    					</select>

    				</div>

					<?php if($_SESSION[KEY.TIPO]==2){ ?>
     				<div class="col-md-5">
    					<label for="">De parte:</label> 
    					<select name="solicitante" id="" class="form-control">
    						<?php $sql2="SELECT * from usuario where idarea=".$_SESSION[KEY.AREA]."" ;
    								$rs2=$con->query($sql2);
    								while ($filas2=mysqli_fetch_array($rs2)) {    									
    								
    						?>
    						<option value=<?php echo $filas2['dniusuario'];if($_SESSION[KEY.DNI]==$filas2["dniusuario"]){ echo " selected";} ?>><?php echo $filas2['nomusuario']." ".$filas2['apeusuario']; ?></option>

    						<?php }?>
    					</select>

    				</div>
    				<?php } ?>
    			
    			</div>

    			 <div class="row">
         <br>
         	<div class="col-md-5 col-md-offset-1">
         		 <label for="">Motivo de Permiso:</label>
                 <br>
                <label class="radio-inline">
                <input type="radio" name="motivo" id="inlineRadio1" value="1" required >Salud
                </label>
                <label class="radio-inline">
                <input type="radio" name="motivo" id="inlineRadio2" value="2" required>Familiar
                </label>
                <label class="radio-inline">
                <input type="radio" name="motivo" id="inlineRadio3" value="3" required> Otro
                </label>    
         	</div>
			<div class="col-md-2">
				<label for="">Desde:</label>
                <select name="desde" class="form-control" required>
                <?php  while ($datohora=mysqli_fetch_array($rshoras)) {?>
                    
                
                    <option value=<?php echo $datohora['descripcion']; ?>><?php echo $datohora['descripcion']; ?></option>

                  <?php }  ?>  
                </select>
				
			</div>
			<div class="col-md-2">
				<label for="">Hasta:</label>
				 <select name="hasta" class="form-control" required>
                <?php  while ($datohora2=mysqli_fetch_array($rshoras2)) {?>
                    
                
                    <option value=<?php echo $datohora2['descripcion']; ?>><?php echo $datohora2['descripcion']; ?></option>

                  <?php }  ?>  
                </select>
			</div>

         </div> 
		<br>
         <div class="row">
         	 <div class="col-md-10 col-md-offset-1">
         	 	<label for="">Detalle:</label>
         		<textarea class="form-control" rows="3" name="detalle"></textarea>
         	 	
         	 </div>

         </div>    
			<br>

         <div class="row">
			<div class="col-md-5 col-md-offset-1">
				 <label for="">Modalidad del Permiso:</label>
                 <br>
				 <label class="radio-inline">
                <input type="radio" name="modalidad"  value="1" required  onclick="toggle(this)"> A compensar
                </label> 
                 <label class="radio-inline">
                <input type="radio" name="modalidad"  value="2" required  onclick="toggle(this)"> A descontar
                </label> 
				
			</div>

           	<div class="col-md-3 " id="fechacom" style="display: none;">
            <label for="">Dia a compensar</label>
            <input type="date" name="compensafecha"  class="form-control">
            </div>
         </div> 
		<br>
         <div class="row">
         	<div class="col-md-2 col-md-offset-5">
         		<input type="submit" class="form-control" value="Enviar">
         	</div>
         </div>
         <br>



    </div>

    		</form>
    		<script type="text/javascript">
        function toggle(elemento) 
        {
          if(elemento.value=="1") 
           {
              document.getElementById("fechacom").style.display = "block";
              
           }
           else
           {
            document.getElementById("fechacom").style.display="none";
           }
            
            
        }
</script>
    	</div>
    </div>
</div>
