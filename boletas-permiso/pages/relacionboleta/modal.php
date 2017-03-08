
	<div id='<?php echo $modal_a;?>' class="modal fade" >
 		<div class="modal-dialog">
 			<div class="modal-content">
		 		<div class="modal-header">					
						<h3>Enviar a boleta #<?php echo $dato['idboleta']; ?>: </h3>
				</div>
			<div class="modal-body">
				<div class="container">
					<div class="row">
					  	<form action="../../procesos/calificar.php" method="get">
					  		<input type="hidden" name="idboleta" value="<?php echo $dato['idboleta']; ?>">
					  		<input type="hidden" name=cal value="1">
							<div class="col-md-4 col-md-offset-1">
								

								<select name="dirigido" id=""  class="form-control">
									<?php 
										$dirigir="SELECT * from usuario where tipousuario=3";
										$rsdirigir=$bd->query($dirigir);
										while ($dirigirdato=mysqli_fetch_array($rsdirigir)) {
											?>
											<option value=<?php echo $dirigirdato['dniusuario']; ?>><?php echo $dirigirdato['nomusuario']." ".$dirigirdato['apeusuario']; ?></option>
										<?php
										}

									 ?>
								</select>
								
							</div>
								<input type="submit" class="btn btn-success" >
						</form>
					</div>
				</div>               
			</div>
			<div class="modal-footer">
			
			<a href="#" data-dismiss="modal" class="btn btn-default">Cerrar</a>
			</div>
 											
 		    </div>
 		</div>
							   
	</div>