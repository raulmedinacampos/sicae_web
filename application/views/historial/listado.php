<h3>Historial de <?php echo $tipo; ?></h3>
<hr class="red" />
<form id="formFormato" name="formFormato" method="post" action="<?php echo base_url('formato'); ?>">
	<table id="registros">
		<thead>
			<tr>
				<th>No. evento</th>
				<th>Evento</th>
				<th>Nombre</th>
				<th>Fechas</th>
				<th class="text-center">Control</th>
				<th class="text-center">Imprimir</th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach ( $solicitudes as $val ) {
				if ( $val["TIPO_EVENTO_ID"] == 3) {
					$val["NOMBRE_EVENTO"] = $val["ORGANIZA"];
				}
				
				$k = array_search($val["TIPO_EVENTO_ID"], array_column($homoclaves, "TIPO_EVENTO"));
				$homoclave = $homoclaves[$k]["NOMBRE"];
				
				if ( $val["TIPO"] == "R" ) {
					$homoclave = array_search(9, array_column($homoclaves, "ID"));
				}
			?>
			<tr>
				<td><?php echo $val["ID"]; ?></td>
				<td><?php echo $val["TIPO_EVENTO"]; ?></td>
				<td><?php echo $val["NOMBRE_EVENTO"]; ?></td>
				<td><?php echo $val["FECHA_INICIAL"]." - ".$val["FECHA_FINAL"]; ?></td>
				<td class="text-center"><a href="#" data-id="<?php echo $val['ID']; ?>">Requisitos</a></td>
				<td class="text-center"><a href="#" data-id="<?php echo $val['ID']; ?>" data-hc="<?php echo $homoclave; ?>"><img alt="PDF" src="<?php echo base_url('images/pdf-icon.png'); ?>" /></a></td>
			</tr>
			<?php
			}
			?>
		</tbody>
	</table>
	
	<input type="hidden" id="hdnID" name="hdnID" value="" />
</form>

<div id="modalRequisitos" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body"></div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script src="https://framework-gb.cdn.gob.mx/data/encuesta_v1.0/qa/encuestas.js"> </script>