<?php 
$nivel=$_SESSION[KEY.TIPO]-1;
$bd= new Conexion();
$lista="SELECT b.idboleta,b.fecha_creacion,u.nomusuario,u.apeusuario,a.area,b.motivo,b.detalle,b.horasalida,b.horallegada,b.total,b.modalidad,b.fechacompensar
 from boleta b inner join usuario u on b.dnisolicitante=u.dniusuario
inner join area a on a.idarea=b.idarea  
where dnisuperior='".$_SESSION[KEY.DNI]."' and estado=1";

$rs=$bd->query($lista);

 ?>
  	
 
 <div class="container-fluid panel panel-default">
 	<div class="row panel panel-heading">
 		<div class="col-md-12">
 			<h4 style="text-align: center;">Relacion de Boletas por firmar</h4>
 		</div>

 	</div>
	
 	<div class="row" >
 		<div class="table-responsive col-xs-12">
 			<table class="table table-bordered table-condensed" id="boletas">
 				<thead>
 					<tr class="active">
	 					<th>fecha</th>
	 					<th>Apellidos y nombres</th>
	 					<th>Area</th>
	 					<th>Motivo</th>
	 					<th>Detalle</th>
	 					<th>Salida</th>
	 					<th>Total Horas</th>
	 					<th>Modalidad</th>
	 					<th>Compensa</th>	 					
	 					<th>Acciones</th>
 					</tr>
 				</thead>
<?php  ?>
 				<tbody>

 				<?php while($dato=mysqli_fetch_array($rs)){ 
 					$modal_a   ='modal-container-';
        			$button_a  ='#modal-container-';
        			$modal_a   .=$a;
        			$button_a   =$button_a.=$a;


 					?>
 					<tr> 						
 						<td><?php echo formatear_fecha($dato['fecha_creacion']); ?></td>
 						<td><?php echo $dato['apeusuario'].$dato['nomusuario']; ?></td>
 						<td><?php echo $dato['area']; ?></td>
 						<td><?php echo motivo($dato['motivo']); ?></td>
 						<td><?php echo $dato['detalle']; ?></td>
 						<td><?php echo $dato['horasalida']."-".$dato['horallegada']; ?></td> 						
 						<td><?php echo $dato['total']; ?></td>
 						<td><?php echo modalidad($dato['modalidad']); ?></td>
 						<td><?php echo limpiar_fec(formatear_fecha($dato['fechacompensar']),$dato['modalidad']); ?></td>
 						
 						<td>
 							<div class="row">
	 							 <div class="col-xs-4 col-md-offset-1">

								<?php if($_SESSION[KEY.TIPO]==3){ ?>		
									
										<a href="<?php echo PATH;?>procesos/calificar.php?idboleta=<?php echo $dato['idboleta'];?>&cal=1" class="btn btn-success btn-large"><span class="glyphicon glyphicon-ok"></span></a>
									
								<?php } ?>	

	 							<?php if($_SESSION[KEY.TIPO]==2){  ?>
	 								
	 									<a data-toggle="modal"  href='<?php echo $button_a;?>' class="btn btn-success btn-large"><span class="glyphicon glyphicon-ok"></a>
	 												

	 							<?php } ?>
	 							<?php  ?>
	 							
								</div>	

							

 								
 								<div class="col-xs-5">
 									<a href="<?php echo PATH;?>procesos/calificar.php?idboleta=<?php echo $dato['idboleta'];?>&cal=2" class="btn btn-danger btn-large"><span class="glyphicon glyphicon-remove"></span></a>
								</div>
							</div>
								
 						</td>
 					</tr>
 					<?php include'modal.php';  ?>
				<?php  $a=$a+1 ;} ?>
 				</tbody>
	<?php  ?>
 			</table>
 		</div>
			 		<script>
			 $(document).ready(function() {
			    $('#boletas').DataTable();
			} );
			 </script>

		


 	</div>


 </div>