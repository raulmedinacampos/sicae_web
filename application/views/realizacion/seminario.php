<h3>Seminarios y otros</h3>
<hr class="red" />
<form id="formSeminario" name="formSeminario" method="post" action="">
	<!-- Nav tabs -->
	<ul class="nav nav-tabs" role="tablist">
		<li role="presentation" class="active"><a href="#evento" aria-controls="evento" role="tab" data-toggle="tab">Evento</a></li>
		<li role="presentation"><a href="#monto" aria-controls="monto" role="tab" data-toggle="tab">Monto solicitado</a></li>
	</ul>

	<!-- Tab panes -->
	<div class="tab-content">
		<div role="tabpanel" class="tab-pane active" id="evento">
			<div class="row">
				<div class="form-group col-sm-4">
					<label>Tipo de evento<span class="form-text">*</span>:</label>
					<select id="tipoEvento" name="tipoEvento" class="form-control">
						<option value="">Selecciona</option>
						<?php
						foreach ( $tipos_evento as $val ) {
						?>
						<option <?php if ( isset($seminario) && ($seminario) && $seminario["TIPO_EVENTO_ID"] == $val->ID ) {echo 'selected="selected"';} ?> value="<?php echo $val->ID; ?>"><?php echo $val->DESCRIPCION; ?></option>
						<?php
						}
						?>
					</select>
				</div>
				<div class="form-group col-sm-4">
					<label>Nombre del evento<span class="form-text">*</span>:</label>
					<input type="text" id="evento" name="evento" class="form-control" placeholder="Ingresa el nombre del evento" value="<?php if(isset($seminario) && ($seminario)) {echo $seminario["NOMBRE_EVENTO"];} ?>" />
					<input type="hidden" id="idSolicitud" name="idSolicitud" value="<?php if(isset($seminario) && ($seminario)) {echo $seminario["ID"];} ?>" />
				</div>
				<div class="form-group col-sm-4">
					<label>Sede<span class="form-text">*</span>:</label>
					<input type="text" id="sede" name="sede" class="form-control" placeholder="Ciudad, país" value="<?php if(isset($seminario) && ($seminario)) {echo $seminario["SEDE"];} ?>" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-12">
					<label>Institución que organiza<span class="form-text">*</span>:</label>
					<input type="text" id="institucion" name="institucion" class="form-control" placeholder="Ingresa la institución que organiza" value="<?php if(isset($seminario) && ($seminario)) {echo $seminario["ORGANIZA"];} ?>" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-4">
					<div class="datepicker-group">
						<label>Fecha de inicio del evento<span class="form-text">*</span>:</label>
						<input type="text" id="fechaInicio" name="fechaInicio" class="datepicker form-control" data-mask="99/99/9999" placeholder="Fecha de inicio" value="<?php if(isset($seminario) && ($seminario)) {echo $seminario["FECHA_INICIAL"];} ?>" />
						<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
					</div>
				</div>
				<div class="form-group col-sm-4">
					<div class="datepicker-group">
						<label>Fecha de término del evento<span class="form-text">*</span>:</label>
						<input type="text" id="fechaFin" name="fechaFin" class="datepicker form-control" data-mask="99/99/9999" placeholder="Fecha de término" value="<?php if(isset($seminario) && ($seminario)) {echo $seminario["FECHA_FINAL"];} ?>" />
						<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-12">
					<label>Objetivo:</label>
					<textarea id="objetivo" name="objetivo" rows="3" maxlength="700" class="form-control" placeholder="Ingresa el objetivo del evento (700 caracteres max.)"><?php if(isset($estancia)) {echo $estancia["OBJETIVO"];} ?></textarea>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-12">
					<label>Beneficio institucional:</label>
					<textarea id="beneficio" name="beneficio" rows="3" maxlength="700" class="form-control" placeholder="Ingresa el beneficio al instituto del evento (700 caracteres max.)"><?php if(isset($estancia)) {echo $estancia["BENEFICIO"];} ?></textarea>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-8">
					<label>Itinerario de viaje<span class="form-text">*</span>:</label>
					<input type="text" id="itinerario" name="itinerario" class="form-control" placeholder="Ingresa tu itinerario de viaje (origen - destino)" value="<?php if(isset($seminario) && ($seminario)) {echo $seminario["ITINERARIO"];} ?>" />
				</div>
			</div>
			
			<div class="panel-group ficha-collapse" id="accordion1">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
						<a data-parent="#accordion1" data-toggle="collapse" href="#panel-1" aria-expanded="false" aria-controls="panel-1">
							En caso de requerir días adicionales al evento
						</a>
						</h4>
						<button type="button" class="collpase-button collapsed" data-parent="#accordion1" data-toggle="collapse" href="#panel-1"></button>
					</div>
					<div class="panel-collapse collapse" id="panel-1">
						<div class="panel-body">
							<div class="row">
								<div class="form-group col-sm-12">
									<label>Justificación:</label>
									<input type="text" id="justificacion" name="justificacion" class="form-control" placeholder="Llenar solo en caso de requerir dos o más días adicionales anteriores y/o posteriores al evento" value="<?php if(isset($seminario) && ($seminario)) {echo $seminario["DA_JUSTIFICACION"];} ?>" />
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-4">
									<div class="datepicker-group">
										<label>Fecha de salida:</label>
										<input type="text" id="fechaSalida" name="fechaSalida" class="datepicker form-control" data-mask="99/99/9999" placeholder="Fecha de salida" value="<?php if(isset($seminario) && ($seminario)) {echo $seminario["DA_FECHA_SALIDA"];} ?>" />
										<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
									</div>
								</div>
								<div class="form-group col-sm-4">
									<div class="datepicker-group">
										<label>Fecha de regreso:</label>
										<input type="text" id="fechaRegreso" name="fechaRegreso" class="datepicker form-control" data-mask="99/99/9999" placeholder="Fecha de regreso" value="<?php if(isset($seminario) && ($seminario)) {echo $seminario["DA_FECHA_REGRESO"];} ?>" />
										<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div role="tabpanel" class="tab-pane" id="monto">
			<div class="row">
				<div class="form-group col-sm-4">
					<label>Transporte aéreo:</label>
					<div class="input-group">
						<div class="input-group-addon">$</div>
						<input type="text" id="aereo" name="aereo" class="form-control" placeholder="Monto del viaje redondo" value="<?php if(isset($tAereo)) {echo $tAereo["SOLICITADO"];} ?>" />
					</div>
				</div>
				<div class="form-group col-sm-4">
					<label>Especifica: <span class="icon-infocircle" data-toggle="tooltip" title="Indica el itinerario de vuelo, en clase turista"></span></label>
					<input type="text" id="espTAereo" name="espTAereo" class="form-control" placeholder="Indica el itinerario de vuelo" value="<?php if(isset($tAereo)) {echo $tAereo["JUSTIFICACION"];} ?>" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-4">
					<label>Transporte terrestre:</label>
					<div class="input-group">
						<div class="input-group-addon">$</div>
						<input type="text" id="terrestre" name="terrestre" class="form-control" placeholder="Monto del viaje redondo" value="<?php if(isset($tTerrestre)) {echo $tTerrestre["SOLICITADO"];} ?>" />
					</div>
				</div>
				<div class="form-group col-sm-4">
					<label>Especifica:</label>
					<input type="text" id="espTTerrestre" name="espTTerrestre" class="form-control" placeholder="Indica el itinerario del traslado" value="<?php if(isset($tTerrestre)) {echo $tTerrestre["JUSTIFICACION"];} ?>" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-4">
					<label>Gastos de estancia:</label>
					<div class="input-group">
						<div class="input-group-addon">$</div>
						<input type="text" id="estancia" name="estancia" class="form-control" placeholder="Hotel y alimentos" value="<?php if(isset($estancia)) {echo $estancia["SOLICITADO"];} ?>" />
					</div>
				</div>
				<div class="form-group col-sm-4">
					<label>Inscripción:</label>
					<div class="input-group">
						<div class="input-group-addon">$</div>
						<input type="text" id="inscripcion" name="inscripcion" class="form-control" placeholder="Costo de inscripción" value="<?php if(isset($inscripcion)) {echo $inscripcion["SOLICITADO"];} ?>" />
					</div>
				</div>
				<div class="form-group col-sm-4">
					<label>Tipo de moneda:</label>
					<select id="moneda" name="moneda" class="form-control">
						<option value="">Selecciona</option>
						<?php
						foreach ( $monedas as $val ) {
						?>
						<option <?php if ( isset($tTerrestre) && $tTerrestre["S_MONEDA_ID"] == $val->ID ) {echo 'selected="selected"'; } ?> value="<?php echo $val->ID; ?>"><?php echo $val->NOMBRE; ?></option>
						<?php
						}
						?>
					</select>
				</div>
			</div>
			<div class="panel-group ficha-collapse" id="accordion2">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-parent="#accordion2" data-toggle="collapse" href="#panel-2" aria-expanded="true" aria-controls="panel-2">
								Otras aportaciones
							</a>
						</h4>
						<button type="button" class="collpase-button" data-parent="#accordion2" data-toggle="collapse" href="#panel-2"></button>
					</div>
					<div class="panel-collapse collapse in" id="panel-2">
						<div class="panel-body">
							<div class="row">
								<div class="form-group col-sm-4">
									<label>¿Cuentas con otros apoyos?<span class="form-text">*</span>:</label>
									<div>
										<label class="radio-inline">
											<input type="radio" id="rdbApS" name="apoyo" <?php if ( isset($apoyo) ) {echo 'checked="checked"';} ?> value="1" /> Sí
										</label>
										<label class="radio-inline">
											<input type="radio" id="rdbApN" name="apoyo" <?php if ( !isset($apoyo) && isset($seminario) && ($seminario) ) {echo 'checked="checked"';} ?> value="0" /> No
										</label>
									</div>
								</div>
								<div class="form-group col-sm-4">
									<label>Institución que apoya:</label>
									<input type="text" id="institucionAp" name="institucionAp" class="form-control" placeholder="Ingresa el nombre de la institución" value="<?php if(isset($apoyo)) {echo $apoyo["INSTITUCION"];} ?>" />
								</div>
								<div class="form-group col-sm-4">
									<label>Monto con el que apoya:</label>
									<div class="input-group">
										<div class="input-group-addon">$</div>
										<input type="text" id="montoAp" name="montoAp" class="form-control" placeholder="Monto del apoyo adicional" value="<?php if(isset($apoyo)) {echo $apoyo["MONTO"];} ?>" />
									</div>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-4">
									<label>Tipo de moneda:</label>
									<select id="monedaAp" name="monedaAp" class="form-control">
										<option value="">Selecciona</option>
										<?php
										foreach ( $monedas as $val ) {
										?>
										<option <?php if ( isset($apoyo) && $apoyo["MONEDA_ID"] == $val->ID ) {echo 'selected="selected"';} ?> value="<?php echo $val->ID; ?>"><?php echo $val->NOMBRE; ?></option>
										<?php
										}
										?>
									</select>
								</div>
								<div class="form-group col-sm-8">
									<label>Especificación del apoyo:</label>
									<input type="text" id="especificacionAp" name="especificacionAp" class="form-control" placeholder="Ingresa la especificación del apoyo" value="<?php if(isset($apoyo)) {echo $apoyo["ESPECIFICACION"];} ?>" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row">
				<div class="form-group col-sm-2 pull-right">
					<button type="submit" id="btnGuardar" class="btn btn-block btn-primary">Guardar</button>
				</div>
			</div>
	</div>
</form>