<?php 
$bd=new Conexion();



	
		if ($_SESSION[KEY.TIPO]==1) {
			$boletas="SELECT b.idboleta,detalle,fecha_creacion,concat(nomusuario,' ',apeusuario) as nombres,motivo,concat(horasalida,'-',horallegada) as rango,total,modalidad,fechacompensar,firma1,firma2,firma3,estado  from boleta b 
    			inner join usuario u on b.dnisolicitante=u.dniusuario inner join area a on u.idarea=a.idarea 
    			where a.idarea='".$_SESSION[KEY.AREA]."' and b.estado=".$_GET['estados']. " and dnisolicitante='".$_SESSION[KEY.DNI]."' ";
		}

		if ($_SESSION[KEY.TIPO]==2) {
			$boletas="SELECT b.idboleta,detalle,fecha_creacion,concat(nomusuario,' ',apeusuario) as nombres,motivo,concat(horasalida,'-',horallegada) as rango,total,modalidad,fechacompensar,firma1,firma2,firma3,estado  from boleta b 
    		inner join usuario u on b.dnisolicitante=u.dniusuario inner join area a on u.idarea=a.idarea 
    		where a.idarea='".$_SESSION[KEY.AREA]."' and b.estado=".$_GET['estados']."";
		}

		if ($_SESSION[KEY.TIPO]==3) {
			$boletas="SELECT b.idboleta,detalle,fecha_creacion,concat(nomusuario,' ',apeusuario) as nombres,motivo,concat(horasalida,'-',horallegada) as rango,total,modalidad,fechacompensar,firma1,firma2,firma3,estado  from boleta b 
    		inner join usuario u on b.dnisolicitante=u.dniusuario inner join area a on u.idarea=a.idarea 
    		where  b.estado=".$_GET['estados']."";
		}

    
	$result=$bd->query($boletas);

 ?>

 <div class="container">
 	<div class="row panel panel-default">
 		<br>
 		<div class="col-md-9 col-md-offset-1">
 			<form action="<?php echo $_SERVER['PHP_SELF']; ?>">
 				<div class="row">
		 			<div class="col-md-5">	 
		 				 <label for="">Listar :</label>
		                 <br>
						 <label class="radio-inline">
		                <input type="radio" name="estados"  value="1" required>Pendientes
		                </label> 
		                 <label class="radio-inline">
		                <input type="radio" name="estados"  value="3" required>Aprobados
		                </label>
		                 <label class="radio-inline">
		                <input type="radio" name="estados"  value="2" required>Denegados
		                </label>
		              
		             </div>

		             <div class="col-md-1 ">
		             	<br>
		             	<input type="submit" class="btn btn-success" value="Listar">
		             </div>
       			</div>

                
                <br>
 			</form>
 			<br>
 		</div>

 	</div>

 </div>


 <div class="container panel panel-default">
 	
 	<div class="row panel panel-heading">
 		<div class="col-md-12">
 			<h4 style="text-align: center;">Lista</h4>
 		</div>
 	</div>

 	<div class="row">
 		<div class="col-md-12 table-responsive">
 			<table class="table table-condensed table-bordered" id="lista2">
 				<thead>
	 				<tr class="active">	
	 					<th>Fecha</th>
	 					<th>Nombres</th>
	 					<th>Motivo</th>
	 					<th>Salida</th>
	 					<th>Total</th>
	 					<th>Compensa</th>
	 					<th>Estado</th>
	 					<th>Detalles</th>
	 					
	 				</tr>
 				</thead>
 				<tbody>
 				<?php while($row=mysqli_fetch_array($result)){ 
 					$modal_a   ='modal-container-';
        			$button_a  ='#modal-container-';
        			$modal_a   .=$a;
        			$button_a   =$button_a.=$a;


 					?>
 					<tr>
 						<td><?php echo formatear_fecha($row['fecboleta']); ?></td>
 						<td><?php echo $row['nombres']; ?></td>
 						<td><?php echo motivo($row['motivo']); ?></td>
 						<td><?php echo $row['rango']; ?></td> 
 						<td><?php echo $row['total']; ?></td>						
 						<td><?php echo limpiar_fec(formatear_fecha($row['feccompensar']),$row['modalidad']); ?></td>
 						<td><?php echo estado($row['estado']); ?></td>
 						<td> 							
 							<a data-toggle="modal"  href='<?php echo $button_a;?>' class="btn btn-success btn-large">Ver Mas</a>
								<?php  include'modal.php'; ?>
 							
 						</td>
							
 					</tr>
				<?php  $a=$a+1 ;} ?>
 				</tbody>

 			</table>
 		</div>
 	</div>
 </div>
 		 		<script>
			 $(document).ready(function() {
			    $('#lista2').DataTable();
			} );
			 </script>
