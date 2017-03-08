<?php 
include('../../../config.php');
include('../../../session.php');
include('../../../includes/bd/conexion.php');
include('../../../includes/clases/Funciones.php');
$fecha_trabajo = mostrar_fecha_trabajo($_SESSION[KEY.USUARIO]);
$fecha_creacion=fecha_creacion($_SESSION[KEY.USUARIO]);
$fecha_inicio=fecha_inicio($_SESSION[KEY.USUARIO]);


$db     = new Conexion();
$query  = "SELECT id,fecha_inicio,hora_inicio,hora_fin,horas_hombre,horas_trabajo,descripcion,cencos_ot_id FROM  reporte 
WHERE usuarios_id='".$_SESSION[KEY.USUARIO]."' AND fecha_inicio='".$fecha_trabajo."'";
$result = $db->query($query);
$nr=$result->num_rows;
/*
$query3="SELECT cencos_ot_id,sum(horas_hombre) as 
GROUP BY A.OT, TOTALHORAS, B.usuarios_id,B.fecha_creacion,f_inicio having f_inicio=from_unixtime(UNIX_TIMESTAMP('".$fecha_trabajo."'),'%d-%m-%Y') ";
$result3=$db->query($query3);
*/
$query4="SELECT HORASTRABAJADAS FROM VIEW_HT WHERE OT=";
$result4=$db->query($query4);



 ?>

 <div class="table-responsive">
 	<table id="consulta" class="table table-bordered table-condensed">
 		<thead>
 			<tr class="success">
 				<th>HoraInicio</th>
 				<th>HoraFin</th>
 				<th width="500">Descripción</th>
 				<th>HorasTrabajo</th>
 				<th>HorasHombre</th>
 				<th>Orden de Trabajo</th>
 				<th>Acciones</th>
 			</tr>
 		</thead>
 		<tbody>
 		<?php 

       $a = 0;

        while ($row = mysqli_fetch_array($result))
         {
        ?>
		<tr>
		<td><?php echo $row['hora_inicio']; ?></td>
		<td><?php echo $row['hora_fin']; ?></td>
		<td><?php echo $row['descripcion']; ?></td>
		<td><?php echo $row['horas_trabajo']; ?></td>
		<td><?php echo round($row['horas_hombre'],2); ?></td>
		<td><?php echo $row['cencos_ot_id'];?></td>
		<td>
		<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#dataUpdate" data-id="<?php echo $row['id']?>" data-descripcion="<?php echo $row['descripcion']?>" data-hfin="<?php echo $row['hora_fin']?>" data-htrabajo="<?php echo $row['horas_trabajo']?>" data-hhombre="<?php echo $row['horas_hombre']?>" data-ot="<?php echo $row['cencos_ot_id']?>" data-idot="<?php echo $row['id']?>" data-fecha="<?php echo $row['fecha_inicio']?>"><i class='glyphicon glyphicon-edit'></i> Modificar</button>
		<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#dataDelete" data-id="<?php echo $row['id']?>"  ><i class='glyphicon glyphicon-trash'></i> Eliminar</button>
		</td>
		<?php   $a = $a+$row['horas_hombre'];  ?>
		</tr>
        <?php
         }

 		 ?>
 		</tbody>
 		 <tr>
 		 <td colspan="4" style="text-align: right;"><strong>Total de Horas:</strong> </td>
 		 <td colspan="3"><strong><?php echo $a; ?> horas</strong></td>
 		 
 		 </tr>
 	</table>
 </div>

<?php if($nr<0){  ?>
 DETALLES

 <div class="table-responsive">
 	<table id="" class="table table-bordered table-condensed">
 		<thead>
 			<tr class="success">
 				<th>Orden de trabajo</th>
 				<th>Horas Asignadas</th>
 				<th>Horas reportadas</th>
 				<th>Horas Faltantes</th> 				
 			</tr>
 		</thead>
 		<tbody>
 		
 			<?php
				while ($row=mysqli_fetch_array($result3)) {
 					if ($row['idusuario']==$_SESSION[KEY.USUARIO]) {
 				?>
						<tr>
			 				<th><?php echo $row[0]; ?></th>
			 				<th><?php echo $row[1]; ?></th>
			 				<th><?php 
			 						$query4="SELECT HORASTRABAJADAS FROM VIEW_HT WHERE OT='".$row[0]."'";
									$result4=$db->query($query4);
									$dato=mysqli_fetch_array($result4)[0];
									echo $dato;

			 				 ?></th>
			 				<th><?php echo $row[1]-$dato; ?></th> 				
			 			</tr>

 				<?php		
 					}
 				}



 			?>
 					
 		
 		</tbody>
 		 
 	  	</table>
 </div>
 <?php  } ?>

 <script>
 $(document).ready(function() {
    $('#consulta').DataTable();
    $('#detalle').DataTable();

} );
 </script>