
	<?php 
	$bd= new Conexion();


	 ?>


	<div id="<?php echo $modal_a;?>" class="modal fade" >
 		<div class="modal-dialog">
 			<div class="modal-content">
		 		<div class="modal-header">					
						<h3>Detalles boleta #<?php echo $row['idboleta']; ?></h3>
				</div>
			<div class="modal-body">
				<div class="container-fluid">
					<div class="row">
					  	<div class="col-md-12">
					  		<label for="">Detalle:</label>
					  		<br>
					  		<textarea  class="form-control" cols="61" rows="3" readonly="" ><?php echo $row['detalle']?></textarea>
					  	</div>
					</div>

					<div class="row">
					</div>
						<br>
						

					<div class="row">
						<div class="col-md-4">
						<label for=""><center>Firma 1:</center></label><br>
							
								<font size="1" style="text-align: center;"><center><?php echo user_firma($bd,$row['firma1']);  ?></center></font>
							
						</div>
						<div class="col-md-4">
							<label for=""><center>Firma 2:</center></label><br>
							
								<font size="1" style="text-align: center;"><center><?php echo user_firma($bd,$row['firma2']);  ?></center></font>
							
						</div>
						<div class="col-md-4">
							<label for=""><center>Firma 3:</center></label><br>
							
								<font size="1" style="text-align: center;" ><center><?php echo user_firma($bd,$row['firma3']);  ?></center></font>
							
						</div>
					</div>

				</div>               
			</div>
			<div class="modal-footer">
			
			<a href="#" data-dismiss="modal" class="btn btn-default">Cerrar</a>
			</div>
 											
 		    </div>
 		</div>
							   
	</div>