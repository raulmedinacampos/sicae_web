<h3>Ponencia</h3>
<hr class="red" />
<form id="formPonencia" name="formPonencia" method="post" action="">
	<!-- Nav tabs -->
	<ul class="nav nav-tabs" role="tablist">
		<li role="presentation" class="active"><a href="#presentacion" aria-controls="presentacion" role="tab" data-toggle="tab">Presentación de ponencia</a></li>
		<li role="presentation"><a href="#ponencias" aria-controls="ponencias" role="tab" data-toggle="tab">Ponencias</a></li>
		<li role="presentation"><a href="#coautores" aria-controls="coautores" role="tab" data-toggle="tab">Coautores</a></li>
		<li role="presentation"><a href="#monto" aria-controls="monto" role="tab" data-toggle="tab">Monto solicitado</a></li>
	</ul>

	<!-- Tab panes -->
	<div class="tab-content">
		<div role="tabpanel" class="tab-pane active" id="presentacion">
			<div class="row">
				<div class="form-group col-sm-12">
					<label>Nombre del evento<span class="form-text">*</span>:</label>
					<input type="text" id="evento" name="evento" class="form-control" placeholder="Ingresa el nombre del evento" value="<?php if(isset($ponencia) && ($ponencia)) {echo $ponencia["NOMBRE_EVENTO"];} ?>" />
					<input type="hidden" id="idSolicitud" name="idSolicitud" value="<?php if(isset($ponencia) && ($ponencia)) {echo $ponencia["ID"];} ?>" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-4">
					<label>Idioma del evento<span class="form-text">*</span>: <span class="icon-infocircle" data-toggle="tooltip" title="Ingresa el idioma en que se presentará el evento (Inglés, español, otro)"></span></label>
					<input type="text" id="idioma" name="idioma" class="form-control" placeholder="Ingresa el idioma del evento" value="<?php if(isset($ponencia) && ($ponencia)) {echo $ponencia["OTRO"];} ?>" />
				</div>
				<div class="form-group col-sm-4">
					<label>Sede<span class="form-text">*</span>:</label>
					<input type="text" id="sede" name="sede" class="form-control" placeholder="Ciudad, país" value="<?php if(isset($ponencia) && ($ponencia)) {echo $ponencia["SEDE"];} ?>" />
				</div>
				<?php
				if ( $this->session->rol != "1" ) {  // No se muestra para profesor
				?>
				<div class="form-group col-sm-4">
					<label>Tipo de sede<span class="form-text">*</span>:</label>
					<div>
						<label class="radio-inline">
							<input type="radio" id="rdbLN" name="lugar" <?php if ( !isset($seguro_int) && isset($estancia) ) {echo 'checked="checked"'; } ?> value="N" /> Nacional
						</label>
						<label class="radio-inline">
							<input type="radio" id="rdbLI" name="lugar" <?php if ( isset($seguro_int) ) {echo 'checked="checked"'; } ?> value="I" /> Internacional
						</label>
					</div>
				</div>
				<?php
				}
				?>
			</div>
			
			<div class="row">
				<div class="form-group col-sm-12">
					<label>Ingresa el nombre de la institución o instituciones que organizan el evento<span class="form-text">*</span>:</label>
					<input type="text" id="institucion" name="institucion" class="form-control" placeholder="Ingresa la institución que organiza" value="<?php if(isset($ponencia) && ($ponencia)) {echo $ponencia["ORGANIZA"];} ?>" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-4">
					<div class="datepicker-group">
						<label>Fecha de inicio del evento<span class="form-text">*</span>:</label>
						<input type="text" id="fechaInicio" name="fechaInicio" class="datepicker form-control" data-mask="99/99/9999" placeholder="Fecha de inicio" value="<?php if(isset($ponencia) && ($ponencia)) {echo $ponencia["FECHA_INICIAL"];} ?>" />
						<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
					</div>
				</div>
				<div class="form-group col-sm-4">
					<div class="datepicker-group">
						<label>Fecha de término del evento<span class="form-text">*</span>:</label>
						<input type="text" id="fechaFin" name="fechaFin" class="datepicker form-control" data-mask="99/99/9999" placeholder="Fecha de término" value="<?php if(isset($ponencia) && ($ponencia)) {echo $ponencia["FECHA_FINAL"];} ?>" />
						<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
					</div>
				</div>
				<div class="form-group col-sm-4">
					<label>Itinerario de viaje<span class="form-text">*</span>: <span class="icon-infocircle" data-toggle="tooltip" title="Ingresa tu itinerario de viaje (origen - destino)"></span></label>
					<input type="text" id="itinerario" name="itinerario" class="form-control" placeholder="Ingresa tu itinerario de viaje" value="<?php if(isset($ponencia) && ($ponencia)) {echo $ponencia["ITINERARIO"];} ?>" />
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
									<input type="text" id="justificacion" name="justificacion" class="form-control" placeholder="Llenar solo en caso de requerir dos o más días adicionales anteriores y/o posteriores al evento" value="<?php if(isset($ponencia) && ($ponencia)) {echo $ponencia["DA_JUSTIFICACION"];} ?>" />
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-4">
									<div class="datepicker-group">
										<label>Fecha de salida:</label>
										<input type="text" id="fechaSalida" name="fechaSalida" class="datepicker form-control" data-mask="99/99/9999" placeholder="Fecha de salida" value="<?php if(isset($ponencia) && ($ponencia)) {echo $ponencia["DA_FECHA_SALIDA"];} ?>" />
										<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
									</div>
								</div>
								<div class="form-group col-sm-4">
									<div class="datepicker-group">
										<label>Fecha de regreso:</label>
										<input type="text" id="fechaRegreso" name="fechaRegreso" class="datepicker form-control" data-mask="99/99/9999" placeholder="Fecha de regreso" value="<?php if(isset($ponencia) && ($ponencia)) {echo $ponencia["DA_FECHA_REGRESO"];} ?>" />
										<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div role="tabpanel" class="tab-pane" id="ponencias">
			<div class="row">
				<div class="form-group col-sm-12">
					<button id="btnAgregarPonencia" class="btn btn-sm btn-primary">
						<span class="glyphicon glyphicon-plus"></span> Agregar ponencia
					</button>
				</div>
			</div>
			<?php
			$i = "";
			if ( (empty($titulos) && isset($ponencia)) || (!isset($ponencia)) ) {
			?>
			<div class="row">
				<div class="form-group col-sm-12">
					<label>Ponencia 1. Título de ponencia en inglés y español</label>
					<textarea id="tituloPonencia1" name="tituloPonencia[]" rows="3" class="form-control" placeholder="Anota el nombre de tu ponencia en inglés y en español separados por un salto de línea.\nNOTA: El nombre de la ponencia deberá coincidir con los demás documentos (oficio, carta de aceptación, resumen y ponencia completa)"></textarea>
				</div>
			</div>
			<?php
			} else {
				$i = 1;
				foreach ( $titulos as $val ) {
			?>
			<div class="row">
				<div class="form-group col-sm-12">
					<label>Ponencia <?php echo $i; ?>. Título de ponencia en inglés y español</label>
					<textarea id="tituloPonencia<?php echo $i; ?>" name="tituloPonencia[]" rows="3" class="form-control" placeholder="Anota el nombre de tu ponencia en inglés y en español separados por un salto de línea.\nNOTA: El nombre de la ponencia deberá coincidir con los demás documentos (oficio, carta de aceptación, resumen y ponencia completa)"><?php echo $val["NOMBRE"]; ?></textarea>
				</div>
			</div>
			<?php
				$i++;
				}
			}
			?>
			<input type="hidden" id="hdnTotalTitulos" value="<?php echo $i; ?>" />
		</div>
		
		<div role="tabpanel" class="tab-pane" id="coautores">
			<?php
			$i = 1;
			if ( !empty($titulos) && !empty($coautores) && isset($ponencia) ) {
				foreach ( $titulos as $t ) {
			?>
			<div class="panel-group ficha-collapse" id="accordion-c<?php echo $i; ?>">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-parent="#accordion-c<?php echo $i; ?>" data-toggle="collapse" href="#panel-c<?php echo $i; ?>" aria-expanded="true" aria-controls="panel-c<?php echo $i; ?>">Ponencia <?php echo $i; ?></a>
						</h4>
						<button type="button" class="collpase-button" data-parent="#accordion-c<?php echo $i; ?>" data-toggle="collapse" href="#panel-c<?php echo $i; ?>"></button>
					</div>
					<div class="panel-collapse collapse in" id="panel-c<?php echo $i; ?>">
						<div class="panel-body">
							<button id="btnAgregarCoautor<?php echo $i; ?>" data-c="<?php echo $i; ?>" class="btn btn-sm btn-primary btnAgregarCoautor">
								<span class="glyphicon glyphicon-plus"></span> Agregar coautor
							</button>
							<?php
							$j = 1;
							foreach ( $coautores as $co ) {
								if ( $t["ID"] == $co["PONENCIA_ID"] ) {
							?>
							<h5>Coautor <?php echo $j; ?></h5>
							<div class="row">
								<div class="form-group col-sm-4">
									<label>Nombre(s):</label>
									<input type="text" id="coNombre<?php echo $i."_".$j; ?>" name="coNombre_<?php echo $j; ?>[]" class="form-control" placeholder="Nombre del coautor" value="<?php if(isset($coautores) && ($coautores)) {echo $co["NOMBRE"];} ?>" />
								</div>
								<div class="form-group col-sm-4">
									<label>Primer apellido:</label>
									<input type="text" id="coApP<?php echo $i."_".$j; ?>" name="coApP_<?php echo $j; ?>[]" class="form-control" placeholder="Primer apellido del coautor" value="<?php if(isset($coautores) && ($coautores)) {echo $co["APELLIDO_P"];}?>" />
								</div>
								<div class="form-group col-sm-4">
									<label>Segundo apellido:</label>
									<input type="text" id="coApM<?php echo $i."_".$j; ?>" name="coApM_<?php echo $j; ?>[]" class="form-control" placeholder="Segundo apellido del coautor" value="<?php if(isset($coautores) && ($coautores)) {echo $co["APELLIDO_M"];}?>" />
								</div>
							</div>
							<?php
								$j++;
								}
							}
							?>
						</div>
					</div>
				</div>
			</div>
			<?php
				$i++;
				}
			}
			?>
			<input type="hidden" id="hdnTotalCoautores" value="<?php if(isset($coautores)) {echo sizeof($coautores);} ?>" />
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
				<?php
				if ( $this->session->rol != "1" ) {  // No se muestra para profesor
				?>
				<div class="form-group col-sm-4 oculto">
					<label>Seguro de viaje internacional<span class="form-text">*</span>:</label>
					<div class="input-group">
						<div class="input-group-addon">$</div>
						<input type="text" id="seguroViaje" name="seguroViaje" class="form-control" placeholder="Solo aplica en viajes internacionales" value="<?php if(isset($seguro_int)) {echo $seguro_int["SOLICITADO"];} ?>" />
					</div>
				</div>
				<?php
				}
				?>
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
			</div>
			<div class="row">
				<div class="form-group col-sm-4">
					<label>Otros gastos:</label>
					<div class="input-group">
						<div class="input-group-addon">$</div>
						<input type="text" id="otrosGastos" name="otrosGastos" class="form-control" placeholder="Total de sus otros gastos" value="<?php if(isset($otros_gastos)) {echo $otros_gastos["SOLICITADO"];} ?>" />
					</div>
				</div>
				<div class="form-group col-sm-4">
					<label>Especifica: <span class="icon-infocircle" data-toggle="tooltip" title="Indica para qué es requerido el monto de este rubro"></span></label>
					<input type="text" id="espOtros" name="espOtros" class="form-control" placeholder="Describe el uso de este monto" value="<?php if(isset($otros_gastos)) {echo $otros_gastos["JUSTIFICACION"];} ?>" />
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
											<input type="radio" id="rdbApN" name="apoyo" <?php if ( !isset($apoyo) && isset($estancia) ) {echo 'checked="checked"';} ?> value="0" /> No
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