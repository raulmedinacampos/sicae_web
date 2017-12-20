<section id="lSolicitud">
	<h3>Listado de estancias de investigación</h3>
	<hr class="red" />
	
	<form id="formSolicitud" name="formSolicitud" method="post" action="<?php echo base_url('estancia-de-investigacion/nueva'); ?>">
		<div class="text-left">
			<a class="btn btn-primary" href="<?php echo base_url('estancia-de-investigacion/nueva'); ?>"><span class="glyphicon glyphicon-plus"></span> Solicitar nueva estancia de investigación</a>
		</div>
		
		<h5>Estancias de investigación solicitadas</h5>
		<hr class="red" />
		<table id="registros">
			<thead>
				<tr>
					<th>No. evento</th>
					<th>Nombre</th>
					<th>Fechas</th>
					<th class="text-center">Editar</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ( $solicitudes as $val ) {
				?>
				<tr>
					<td><?php echo $val["ID"]; ?></td>
					<td><?php echo $val["ORGANIZA"]; ?></td>
					<td><?php echo $val["FECHA_INICIAL"]." - ".$val["FECHA_FINAL"]; ?></td>
					<td class="text-center"><a href="#" data-id="<?php echo $val['ID']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
				</tr>
				<?php
				}
				?>
			</tbody>
		</table>
		
		<input type="hidden" id="hdnID" name="hdnID" value="" />
	</form>
</section>