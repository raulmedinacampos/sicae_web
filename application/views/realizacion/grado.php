<h3>Obtención de grado</h3>
<hr class="red" />
<form id="formGrado" name="formGrado" method="post" action="">
	<!-- Nav tabs -->
	<ul class="nav nav-tabs" role="tablist">
		<li role="presentation" class="active"><a href="#grado" aria-controls="grado" role="tab" data-toggle="tab">Obtención de grado</a></li>
		<li role="presentation"><a href="#monto" aria-controls="monto" role="tab" data-toggle="tab">Monto solicitado</a></li>
	</ul>

	<!-- Tab panes -->
	<div class="tab-content">
		<div role="tabpanel" class="tab-pane active" id="grado">
			<div class="row">
				<div class="form-group col-sm-12">
					<label>Nombre de la universidad<span class="form-text">*</span>:</label>
					<input type="text" id="universidad" name="universidad" class="form-control" placeholder="Ingresa el nombre de la universidad" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-4">
					<label>Grado a obtener<span class="form-text">*</span>:</label>
					<select id="grado" name="grado" class="form-control">
						<option value="">Selecciona</option>
						<option value="Maestría">Maestría</option>
						<option value="Doctorado">Doctorado</option>
					</select>
				</div>
				<div class="form-group col-sm-4">
					<label>Sede<span class="form-text">*</span>:</label>
					<input type="text" id="sede" name="sede" class="form-control" placeholder="Ciudad, país" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-4">
					<div class="datepicker-group">
						<label>Fecha del examen<span class="form-text">*</span>:</label>
						<input type="text" id="fechaExamen" name="fechaExamen" class="datepicker form-control" data-mask="99/99/9999" value="<?php if(isset($persona)) {echo $persona["FECHA_NACIMIENTO"];} ?>" placeholder="Fecha del examen" />
						<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
					</div>
				</div>
				<div class="form-group col-sm-4">
					<div class="datepicker-group">
						<label>Fecha de inicio del evento<span class="form-text">*</span>:</label>
						<input type="text" id="fechaInicio" name="fechaInicio" class="datepicker form-control" data-mask="99/99/9999" value="<?php if(isset($persona)) {echo $persona["FECHA_NACIMIENTO"];} ?>" placeholder="Fecha de inicio" />
						<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
					</div>
				</div>
				<div class="form-group col-sm-4">
					<div class="datepicker-group">
						<label>Fecha de término del evento<span class="form-text">*</span>:</label>
						<input type="text" id="fechaFin" name="fechaFin" class="datepicker form-control" data-mask="99/99/9999" value="<?php if(isset($persona)) {echo $persona["FECHA_NACIMIENTO"];} ?>" placeholder="Fecha de término" />
						<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-4">
					<label>Itinerario de viaje<span class="form-text">*</span>:</label>
					<input type="text" id="itinerario" name="itinerario" class="form-control" placeholder="Ingresa tu itinerario de viaje (origen - destino)" />
				</div>
			</div>
		</div>
		
		<div role="tabpanel" class="tab-pane" id="monto">
			<div class="row">
				<div class="form-group col-sm-4">
					<label>Transporte aéreo</label>
					<div class="input-group">
						<div class="input-group-addon">$</div>
						<input type="text" id="aereo" name="aereo" class="form-control" placeholder="Monto del viaje redondo" />
					</div>
				</div>
				<div class="form-group col-sm-4">
					<label>Especifique <span class="icon-infocircle" data-toggle="tooltip" title="Indica el itinerario de vuelo, en clase turista"></span></label>
					<input type="text" id="espTAereo" name="espTAereo" class="form-control" placeholder="Indica el itinerario de viaje" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-4">
					<label>Transporte terrestre</label>
					<div class="input-group">
						<div class="input-group-addon">$</div>
						<input type="text" id="terrestre" name="terrestre" class="form-control" placeholder="Monto del viaje redondo" />
					</div>
				</div>
				<div class="form-group col-sm-4">
					<label>Especifique</label>
					<input type="text" id="espTTerrestre" name="espTTerrestre" class="form-control" placeholder="Indica el itinerario del traslado" />
				</div>
				<div class="form-group col-sm-4">
					<label>Tipo de moneda</label>
					<select id="moneda" name="moneda" class="form-control">
						<option value="">Selecciona</option>
						<?php
						foreach ( $monedas as $val ) {
						?>
						<option value="<?php echo $val->ID; ?>"><?php echo $val->NOMBRE; ?></option>
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
									<label>¿Cuentas con otros apoyos?</label>
									<div>
										<label class="radio-inline">
											<input type="radio" id="rdbApS" name="apoyo" <?php if ( isset($persona) && $persona["GENERO"] == "M" ) {echo 'checked="checked"'; } ?> value="1" /> Sí
										</label>
										<label class="radio-inline">
											<input type="radio" id="rdbApN" name="apoyo" <?php if ( isset($persona) && $persona["GENERO"] == "F" ) {echo 'checked="checked"'; } ?> value="0" /> No
										</label>
									</div>
								</div>
								<div class="form-group col-sm-4">
									<label>Institución que apoya</label>
									<input type="text" id="institucionAp" name="institucionAp" class="form-control" placeholder="Ingresa el nombre de la institución" />
								</div>
								<div class="form-group col-sm-4">
									<label>Monto con el que apoya</label>
									<div class="input-group">
										<div class="input-group-addon">$</div>
										<input type="text" id="montoAp" name="montoAp" class="form-control" placeholder="Monto del apoyo adicional" />
									</div>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-4">
									<label>Tipo de moneda</label>
									<select id="monedaAp" name="monedaAp" class="form-control">
										<option value="">Selecciona</option>
										<?php
										foreach ( $monedas as $val ) {
										?>
										<option value="<?php echo $val->ID; ?>"><?php echo $val->NOMBRE; ?></option>
										<?php
										}
										?>
									</select>
								</div>
								<div class="form-group col-sm-8">
									<label>Especificación del apoyo</label>
									<input type="text" id="especificacionAp" name="especificacionAp" class="form-control" placeholder="Ingresa la especificación del apoyo" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row">
				<div class="form-group col-sm-2 pull-right">
					<button type="submit" class="btn btn-block btn-primary">Guardar</button>
				</div>
			</div>
	</div>
</form>