<h3>Realización del evento</h3>
<hr class="red" />
<form id="formRealizacion" name="formRealizacion" method="post" action="">
	<!-- Nav tabs -->
	<ul class="nav nav-tabs" role="tablist">
		<li role="presentation" class="active"><a href="#evento" aria-controls="evento" role="tab" data-toggle="tab">Datos del evento</a></li>
		<li role="presentation"><a href="#expositores" aria-controls="expositores" role="tab" data-toggle="tab">Expositores</a></li>
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
						<option <?php if(isset($realizacion) && ($realizacion) && $realizacion["TIPO_EVENTO_ID"] == $val->ID ) {echo 'selected="selected"'; } ?> value="<?php echo $val->ID; ?>"><?php echo $val->DESCRIPCION; ?></option>
						<?php
						}
						?>
					</select>
				</div>
				<div class="form-group col-sm-8">
					<label>Nombre del evento<span class="form-text">*</span>:</label>
					<input type="text" id="evento" name="evento" class="form-control" placeholder="Ingresa el nombre del evento" value="<?php if(isset($realizacion) && ($realizacion)) {echo $realizacion["NOMBRE_EVENTO"];} ?>" />
					<input type="hidden" id="idSolicitud" name="idSolicitud" value="<?php if(isset($realizacion) && ($realizacion)) {echo $realizacion["ID"];} ?>" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-4">
					<label>Idioma del evento<span class="form-text">*</span>: <span class="icon-infocircle" data-toggle="tooltip" title="Ingresa el idioma del evento (inglés, español, otro)"></span></label>
					<input type="text" id="idioma" name="idioma" class="form-control" placeholder="Ingresa el idioma del evento" value="<?php if(isset($realizacion) && ($realizacion)) {echo $realizacion["IDIOMA"];} ?>" />
				</div>
				<div class="form-group col-sm-4">
					<label>Sede<span class="form-text">*</span>:</label>
					<input type="text" id="sede" name="sede" class="form-control" placeholder="Ciudad, país" value="<?php if(isset($realizacion) && ($realizacion)) {echo $realizacion["SEDE"];} ?>" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-4">
					<div class="datepicker-group">
						<label>Fecha de inicio<span class="form-text">*</span>:</label>
						<input type="text" id="fechaInicio" name="fechaInicio" class="datepicker form-control" data-mask="99/99/9999" placeholder="Fecha de inicio" value="<?php if(isset($realizacion) && ($realizacion)) {echo $realizacion["FECHA_INICIAL"];} ?>" />
						<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
					</div>
				</div>
				<div class="form-group col-sm-4">
					<div class="datepicker-group">
						<label>Fecha de término<span class="form-text">*</span>:</label>
						<input type="text" id="fechaFin" name="fechaFin" class="datepicker form-control" data-mask="99/99/9999" placeholder="Fecha de término" value="<?php if(isset($realizacion) && ($realizacion)) {echo $realizacion["FECHA_FINAL"];} ?>" />
						<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-4">
					<label>Total de participantes<span class="form-text">*</span>:</label>
					<input type="text" id="tParticipantes" name="tParticipantes" class="form-control" placeholder="Ingresa el total de participantes" value="<?php if(isset($realizacion) && ($realizacion)) {echo $realizacion["PARTICIPANTES"];} ?>" />
				</div>
				<div class="form-group col-sm-4">
					<label>Total de expositores<span class="form-text">*</span>:</label>
					<input type="text" id="tExpositores" name="tExpositores" class="form-control" placeholder="Ingresa el total de expositores" value="<?php if(isset($realizacion) && ($realizacion)) {echo $realizacion["EXPOSITORES"];} ?>" />
				</div>
				<div class="form-group col-sm-4">
					<label>Horas de duración del evento<span class="form-text">*</span>:</label>
					<input type="text" id="duracion" name="duracion" class="form-control" placeholder="Ingresa la duración del evento" value="<?php if(isset($realizacion) && ($realizacion)) {echo $realizacion["HORAS_TOTALES"];} ?>" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-12">
					<label>A quién va dirigido el evento<span class="form-text">*</span>:</label>
					<input type="text" id="dirigido" name="dirigido" class="form-control" placeholder="Ingresa a quién va dirigido el evento" value="<?php if(isset($realizacion) && ($realizacion)) {echo $realizacion["DIRIGIDO"];} ?>" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-12">
					<label>Objetivo<span class="form-text">*</span>:</label>
					<textarea id="objetivo" name="objetivo" maxlength="700" cols="3" class="form-control" placeholder="Ingrese el objetivo del evento (700 caracteres max.)"><?php if(isset($realizacion) && ($realizacion)) {echo $realizacion["OBJETIVO"];} ?></textarea>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-12">
					<label>Beneficio institucional<span class="form-text">*</span>:</label>
					<textarea id="beneficio" name="beneficio" maxlength="700" cols="3" class="form-control" placeholder="Ingrese el beneficio del evento (700 caracteres max.)"><?php if(isset($realizacion) && ($realizacion)) {echo $realizacion["BENEFICIO"];} ?></textarea>
				</div>
			</div>
		</div>
		<div role="tabpanel" class="tab-pane" id="expositores">
			<div class="row">
				<div class="form-group col-sm-12">
					<button id="btnAgregarExpositor" class="btn btn-sm btn-primary">
						<span class="glyphicon glyphicon-plus"></span> Agregar expositor
					</button>
				</div>
			</div>
			
			<?php
			$i = "";
			if ( (empty($expositores) && isset($realizacion)) || (!isset($realizacion)) ) {
			?>
			<div class="panel-group ficha-collapse" id="accordion1">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
						<a data-parent="#accordion1" data-toggle="collapse" href="#panel-1" aria-expanded="true" aria-controls="panel-1">
							Expositor 1
						</a>
						</h4>
						<button type="button" class="collpase-button" data-parent="#accordion1" data-toggle="collapse" href="#panel-1"></button>
					</div>
					<div class="panel-collapse collapse in" id="panel-1">
						<div class="panel-body">
							<div class="row">
								<div class="form-group col-sm-4">
									<label>Nombre(s)<span class="form-text">*</span>:</label>
									<input type="text" id="exNombre1" name="exNombre[]" class="form-control" placeholder="Ingresa el nombre del expositor" />
								</div>
								<div class="form-group col-sm-4">
									<label>Primer apellido<span class="form-text">*</span>:</label>
									<input type="text" id="exApP1" name="exApP[]" class="form-control" placeholder="Ingresa el primer apellido" />
								</div>
								<div class="form-group col-sm-4">
									<label>Segundo apellido:</label>
									<input type="text" id="exApM1" name="exApM[]" class="form-control" placeholder="Ingresa el segundo apellido" />
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-8">
									<label>Procedencia:</label>
									<input type="text" id="exProcedencia1" name="exProcedencia[]" class="form-control" placeholder="Ingresa la procedencia del expositor" />
								</div>
								<div class="form-group col-sm-4">
									<label>Trabajo actual:</label>
									<input type="text" id="exOcupacion1" name="exOcupacion[]" class="form-control" placeholder="Ingresa el trabajo actual del expositor" />
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-4">
									<label>Licenciatura:</label>
									<input type="text" id="exLicenciatura1" name="exLicenciatura[]" class="form-control" placeholder="Estudios de licenciatura" />
								</div>
								<div class="form-group col-sm-4">
									<label>Maestría:</label>
									<input type="text" id="exMaestria1" name="exMaestria[]" class="form-control" placeholder="Estudios de maestría" />
								</div>
								<div class="form-group col-sm-4">
									<label>Doctorado:</label>
									<input type="text" id="exDoctorado1" name="exDoctorado[]" class="form-control" placeholder="Estudios de doctorado" />
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-4">
									<label>Especialidad:</label>
									<input type="text" id="exEspecialidad1" name="exEspecialidad[]" class="form-control" placeholder="Estudios de especialidad" />
								</div>
								<div class="form-group col-sm-8">
									<label>Actividad del expositor:</label>
									<input type="text" id="exActividad1" name="exActividad[]" class="form-control" placeholder="Actividad del expositor" />
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-8">
									<label>Tema a exponer:</label>
									<input type="text" id="exTema1" name="exTema[]" class="form-control" placeholder="Tema a exponer" />
								</div>
								<div class="form-group col-sm-4">
									<label>Horario:</label>
									<input type="text" id="exHorario1" name="exHorario[]" class="form-control" placeholder="Horario de la exposición" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
			} else {
				$i = 1;
				foreach ( $expositores as $val ) {
			?>
			<div class="panel-group ficha-collapse" id="accordion<?php echo $i; ?>">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
						<a data-parent="#accordion1" data-toggle="collapse" href="#panel-<?php echo $i; ?>" aria-expanded="true" aria-controls="panel-<?php echo $i; ?>">
							Expositor <?php echo $i; ?>
						</a>
						</h4>
						<button type="button" class="collpase-button" data-parent="#accordion<?php echo $i; ?>" data-toggle="collapse" href="#panel-<?php echo $i; ?>"></button>
					</div>
					<div class="panel-collapse collapse in" id="panel-<?php echo $i; ?>">
						<div class="panel-body">
							<div class="row">
								<div class="form-group col-sm-4">
									<label>Nombre(s)<span class="form-text">*</span>:</label>
									<input type="text" id="exNombre<?php echo $i; ?>" name="exNombre[]" class="form-control" placeholder="Ingresa el nombre del expositor" value="<?php echo $val["NOMBRE"]; ?>" />
								</div>
								<div class="form-group col-sm-4">
									<label>Primer apellido<span class="form-text">*</span>:</label>
									<input type="text" id="exApP<?php echo $i; ?>" name="exApP[]" class="form-control" placeholder="Ingresa el primer apellido" value="<?php echo $val["APELLIDO_P"]; ?>" />
								</div>
								<div class="form-group col-sm-4">
									<label>Segundo apellido:</label>
									<input type="text" id="exApM<?php echo $i; ?>" name="exApM[]" class="form-control" placeholder="Ingresa el segundo apellido" value="<?php echo $val["APELLIDO_M"]; ?>" />
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-8">
									<label>Procedencia:</label>
									<input type="text" id="exProcedencia<?php echo $i; ?>" name="exProcedencia[]" class="form-control" placeholder="Ingresa la procedencia del expositor" value="<?php echo $val["PROCEDENCIA"]; ?>" />
								</div>
								<div class="form-group col-sm-4">
									<label>Trabajo actual:</label>
									<input type="text" id="exOcupacion<?php echo $i; ?>" name="exOcupacion[]" class="form-control" placeholder="Ingresa el trabajo actual del expositor" value="<?php echo $val["DEDICACION"]; ?>" />
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-4">
									<label>Licenciatura:</label>
									<input type="text" id="exLicenciatura<?php echo $i; ?>" name="exLicenciatura[]" class="form-control" placeholder="Estudios de licenciatura" value="<?php echo $val["LICENCIATURA"]; ?>" />
								</div>
								<div class="form-group col-sm-4">
									<label>Maestría:</label>
									<input type="text" id="exMaestria<?php echo $i; ?>" name="exMaestria[]" class="form-control" placeholder="Estudios de maestría" value="<?php echo $val["MAESTRIA"]; ?>" />
								</div>
								<div class="form-group col-sm-4">
									<label>Doctorado:</label>
									<input type="text" id="exDoctorado<?php echo $i; ?>" name="exDoctorado[]" class="form-control" placeholder="Estudios de doctorado" value="<?php echo $val["DOCTORADO"]; ?>" />
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-4">
									<label>Especialidad:</label>
									<input type="text" id="exEspecialidad<?php echo $i; ?>" name="exEspecialidad[]" class="form-control" placeholder="Estudios de especialidad" value="<?php echo $val["ESPECIALIDAD"]; ?>" />
								</div>
								<div class="form-group col-sm-8">
									<label>Actividad del expositor:</label>
									<input type="text" id="exActividad<?php echo $i; ?>" name="exActividad[]" class="form-control" placeholder="Actividad del expositor" value="<?php echo $val["ACTIVIDAD"]; ?>" />
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-8">
									<label>Tema a exponer:</label>
									<input type="text" id="exTema<?php echo $i; ?>" name="exTema[]" class="form-control" placeholder="Tema a exponer" value="<?php echo $val["TEMA"]; ?>" />
								</div>
								<div class="form-group col-sm-4">
									<label>Horario:</label>
									<input type="text" id="exHorario<?php echo $i; ?>" name="exHorario[]" class="form-control" placeholder="Horario de la exposición" value="<?php echo $val["HORARIO"]; ?>" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
				$i++;
				}
			}
			?>
			<input type="hidden" id="hdnTotalExp" value="<?php echo $i; ?>" />
		</div>
		<div role="tabpanel" class="tab-pane" id="monto">
			<div class="row">
				<div class="form-group col-sm-4">
					<label>Pago de honorarios a expositores:</label>
					<div class="input-group">
						<div class="input-group-addon">$</div>
						<input type="text" id="honorarios" name="honorarios" class="form-control" placeholder="Honorarios de expositores" value="<?php if(isset($honorarios)) {echo $honorarios["SOLICITADO"];} ?>" />
					</div>
				</div>
				<div class="form-group col-sm-4">
					<label>Viáticos a expositores:</label>
					<div class="input-group">
						<div class="input-group-addon">$</div>
						<input type="text" id="viaticos" name="viaticos" class="form-control" placeholder="Viáticos de expositores" value="<?php if(isset($viaticos)) {echo $viaticos["SOLICITADO"];} ?>" />
					</div>
				</div>
				<div class="form-group col-sm-4">
					<label>Transporte aéreo:</label>
					<div class="input-group">
						<div class="input-group-addon">$</div>
						<input type="text" id="aereo" name="aereo" class="form-control" placeholder="Monto del viaje redondo" value="<?php if(isset($tAereo)) {echo $tAereo["SOLICITADO"];} ?>" />
					</div>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-12">
					<label>+ Especifica:</label>
					<input type="text" id="espTAereo" name="espTAereo" class="form-control" placeholder="Indica el itinerario de vuelo, en clase turista" value="<?php if(isset($tAereo)) {echo $tAereo["JUSTIFICACION"];} ?>" />
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
				<div class="form-group col-sm-8">
					<label>+ Especifica:</label>
					<input type="text" id="espTTerrestre" name="espTTerrestre" class="form-control" placeholder="Indica el itinerario del traslado" value="<?php if(isset($tTerrestre)) {echo $tTerrestre["JUSTIFICACION"];} ?>" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-4">
					<label>Material didáctico:</label>
					<div class="input-group">
						<div class="input-group-addon">$</div>
						<input type="text" id="material" name="material" class="form-control" placeholder="Costo de material didáctico" value="<?php if(isset($material)) {echo $material["SOLICITADO"];} ?>" />
					</div>
				</div>
				<div class="form-group col-sm-4">
					<label>Servicio de cafetería:</label>
					<div class="input-group">
						<div class="input-group-addon">$</div>
						<input type="text" id="cafeteria" name="cafeteria" class="form-control" placeholder="Costo de servicio de cafetería" value="<?php if(isset($cafeteria)) {echo $cafeteria["SOLICITADO"];} ?>" />
					</div>
				</div>
				<div class="form-group col-sm-4">
					<label>Otros gastos:</label>
					<div class="input-group">
						<div class="input-group-addon">$</div>
						<input type="text" id="otrosGastos" name="otrosGastos" class="form-control" placeholder="Otros gastos" value="<?php if(isset($otros_gastos)) {echo $otros_gastos["SOLICITADO"];} ?>" />
					</div>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-12">
					<label>Especifica tus otros gastos:</label>
					<input type="text" id="espOtros" name="espOtros" class="form-control" placeholder="Describe los otros gastos" value="<?php if(isset($otros_gastos)) {echo $otros_gastos["JUSTIFICACION"];} ?>" />
				</div>
			</div>
			
			<div class="panel-group ficha-collapse" id="accordion2">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-parent="#accordion100" data-toggle="collapse" href="#panel-100" aria-expanded="true" aria-controls="panel-100">
								Otras aportaciones
							</a>
						</h4>
						<button type="button" class="collpase-button" data-parent="#accordion100" data-toggle="collapse" href="#panel-100"></button>
					</div>
					<div class="panel-collapse collapse in" id="panel-100">
						<div class="panel-body">
							<div class="row">
								<div class="form-group col-sm-4">
									<label>¿Cuentas con otros apoyos?<span class="form-text">*</span>:</label>
									<div>
										<label class="radio-inline">
											<input type="radio" id="rdbApS" name="apoyo" <?php if ( isset($apoyo) ) {echo 'checked="checked"';} ?>value="1" /> Sí
										</label>
										<label class="radio-inline">
											<input type="radio" id="rdbApN" name="apoyo" <?php if ( !isset($apoyo) && isset($realizacion) ) {echo 'checked="checked"';} ?> value="0" /> No
										</label>
									</div>
								</div>
							</div>
							<div class="row">
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
							</div>
							<div class="row">
								<div class="form-group col-sm-12">
									<label>Especificación del apoyo:</label>
									<textarea id="especificacionAp" name="especificacionAp" rows="3" class="form-control" placeholder="Ingresa la especificación del apoyo"><?php if(isset($apoyo)) {echo $apoyo["ESPECIFICACION"];} ?></textarea>
								</div>
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
</form>