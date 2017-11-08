<h3>Historial de asistencia</h3>
<hr class="red" />
<form id="formFormato" name="formFormato" method="post" action="<?php echo base_url('Formato'); ?>">
	<table id="registros">
		<thead>
			<tr>
				<th>No. evento</th>
				<th>Nombre</th>
				<th>Fechas</th>
				<th class="text-center">Control</th>
				<th class="text-center">Imprimir</th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach ( $solicitudes as $val ) {
			?>
			<tr>
				<td><?php echo $val["ID"]; ?></td>
				<td><?php echo $val["NOMBRE_EVENTO"]; ?></td>
				<td><?php echo $val["FECHA_INICIAL"]." - ".$val["FECHA_FINAL"]; ?></td>
				<td class="text-center"><a href="#">Requisitos</a></td>
				<td class="text-center"><a href="#" data-id="<?php echo $val['ID']; ?>"><img alt="PDF" src="<?php echo base_url('images/pdf-icon.png'); ?>" /></a></td>
			</tr>
			<?php
			}
			?>
		</tbody>
	</table>
	
	<input type="hidden" id="hdnID" name="hdnID" value="" />
</form>