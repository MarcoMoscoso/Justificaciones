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
        <div class="panel-body">

            <div class="hidden" >
                <input type="text" name="dni" value=<?php echo $_SESSION[KEY.DNI]; ?>>
            </div>

             <div class="hidden" >
                <input type="text" name="firma" value=<?php echo $_SESSION[KEY.TIPO]; ?>>
            </div>        
			<br>
         <div class="row">
         	<div class="col-md-5 col-md-offset-1">
         		<label for="">Nombres:</label>
         		<input type="text" class="form-control" name="nombres" readonly="" value="<?php echo $_SESSION[KEY.NOMBRES];  ?>">
         	</div>

         	    <div class="col-md-5">
         		<label for="">Apellidos:</label>
         		<input type="text" class="form-control" name="apellidos" readonly="" value="<?php echo $_SESSION[KEY.APELLIDOS];  ?>"">
         	    </div>

         </div>
		<br>
          

        <div class="row">
         	<div class="col-md-5 col-md-offset-1">
         		<label for="">Area:</label>
         		<select name="idarea" class="form-control" >
         		<?php 
         			
         			$areas="SELECT * from area";
         			$rs=$con->query($areas);
         			while ($dato    = mysqli_fetch_array($rs)) {
         				
         			
         		 ?>
         			<option value=<?php echo $dato["idarea"]; if($_SESSION[KEY.AREA]==$dato["idarea"]){ echo " selected";} ?>      ><?php echo $dato["area"]; ?></option>

         		<?php
         			} 
         		 ?>	
         		</select>
         	</div>

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



    </div>
    
</form>
</div>
</div>
</div>
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