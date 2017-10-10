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
					<label class="obligatorio">Nombre del evento:</label>
					<input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingresa el nombre del evento" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-6">
					<label class="obligatorio">Idioma del evento:</label>
					<input type="text" id="apMaterno" name="apMaterno" class="form-control" placeholder="Ingresa el idioma en que se presentará el evento (Inglés, español, otro)" />
				</div>
				<div class="form-group col-sm-6">
					<label class="obligatorio">Sede:</label>
					<input type="text" id="apMaterno" name="apMaterno" class="form-control" placeholder="Ciudad, país" />
				</div>
			</div>
			
			<div class="row">
				<div class="form-group col-sm-12">
					<label class="obligatorio">Institución que organiza:</label>
					<input type="text" id="email" name="email" class="form-control" placeholder="Ingresa la institución que organiza" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-4">
					<div class="datepicker-group">
						<label class="obligatorio">Fecha de inicio del evento:</label>
						<input type="text" id="fechaNac" name="fechaNac" class="datepicker form-control" data-mask="99/99/9999" value="<?php if(isset($persona)) {echo $persona["FECHA_NACIMIENTO"];} ?>" placeholder="Fecha de inicio" />
						<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
					</div>
				</div>
				<div class="form-group col-sm-4">
					<div class="datepicker-group">
						<label class="obligatorio">Fecha de término del evento:</label>
						<input type="text" id="fechaNac" name="fechaNac" class="datepicker form-control" data-mask="99/99/9999" value="<?php if(isset($persona)) {echo $persona["FECHA_NACIMIENTO"];} ?>" placeholder="Fecha de término" />
						<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
					</div>
				</div>
				<div class="form-group col-sm-4">
					<label class="obligatorio">Itinerario de viaje:</label>
					<input type="text" id="extension" name="extension" class="form-control" placeholder="Ingresa tu itinerario de viaje (origen - destino)" />
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
									<label>Justificación</label>
									<input type="text" id="extension" name="extension" class="form-control" placeholder="Llenar solo en caso de requerir dos o más días adicionales anteriores y/o posteriores al evento" />
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-6">
									<div class="datepicker-group">
										<label>Fecha de salida:</label>
										<input type="text" id="fechaNac" name="fechaNac" class="datepicker form-control" data-mask="99/99/9999" value="<?php if(isset($persona)) {echo $persona["FECHA_NACIMIENTO"];} ?>" placeholder="Fecha de salida" />
										<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
									</div>
								</div>
								<div class="form-group col-sm-6">
									<div class="datepicker-group">
										<label>Fecha de regreso:</label>
										<input type="text" id="fechaNac" name="fechaNac" class="datepicker form-control" data-mask="99/99/9999" value="<?php if(isset($persona)) {echo $persona["FECHA_NACIMIENTO"];} ?>" placeholder="Fecha de regreso" />
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
			<div class="row">
				<div class="form-group col-sm-12">
					<label>Ponencia 1. Título de ponencia en inglés y español</label>
					<textarea id="tituloPonencia1" name="tituloPonencia1" rows="3" class="form-control" placeholder="Anota el nombre de tu ponencia en inglés y en español separados por un salto de línea.\nNOTA: El nombre de la ponencia deberá coincidir con los demás documentos (oficio, carta de aceptación, resumen y ponencia completa)"></textarea>
				</div>
			</div>
		</div>
		
		<div role="tabpanel" class="tab-pane" id="coautores">
		</div>
		
		<div role="tabpanel" class="tab-pane" id="monto">
			<div class="row">
				<div class="form-group col-sm-4">
					<label>Transporte aéreo</label>
					<div class="input-group">
						<div class="input-group-addon">$</div>
						<input type="text" id="fechaNac" name="fechaNac" class="form-control" placeholder="Especifique el monto del viaje redondo" />
					</div>
				</div>
				<div class="form-group col-sm-4">
					<label>Especifique</label>
					<input type="text" id="extension" name="extension" class="form-control" placeholder="Indique el itinerario de viaje, en clase turista" />
				</div>
				<div class="form-group col-sm-4">
					<label>Seguro de viaje internacional</label>
					<div class="input-group">
						<div class="input-group-addon">$</div>
						<input type="text" id="fechaNac" name="fechaNac" class="form-control" placeholder="Solo aplica a alumnos en viajes internacionales" />
					</div>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-4">
					<label>Transporte terrestre</label>
					<div class="input-group">
						<div class="input-group-addon">$</div>
						<input type="text" id="fechaNac" name="fechaNac" class="form-control" placeholder="Especifique el monto del viaje redondo" />
					</div>
				</div>
				<div class="form-group col-sm-4">
					<label>Especifique</label>
					<input type="text" id="extension" name="extension" class="form-control" placeholder="Indique el itinerario de viaje" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-4">
					<label>Gastos de estancia</label>
					<div class="input-group">
						<div class="input-group-addon">$</div>
						<input type="text" id="fechaNac" name="fechaNac" class="form-control" placeholder="Hotel y alimentos" />
					</div>
				</div>
				<div class="form-group col-sm-4">
					<label>Inscripción</label>
					<div class="input-group">
						<div class="input-group-addon">$</div>
						<input type="text" id="fechaNac" name="fechaNac" class="form-control" placeholder="Costo de inscripción" />
					</div>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-4">
					<label>Otros gastos</label>
					<div class="input-group">
						<div class="input-group-addon">$</div>
						<input type="text" id="fechaNac" name="fechaNac" class="form-control" placeholder="Total de sus otros gastos" />
					</div>
				</div>
				<div class="form-group col-sm-4">
					<label>Tipo de moneda</label>
					<select id="" name="" class="form-control">
						<option value="">Seleccione el tipo de moneda</option>
						<option value="d">Dólares</option>
						<option value="p">Pesos</option>
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
									<label>¿Cuenta con otros apoyos?</label>
									<div>
										<label class="radio-inline">
											<input type="radio" id="rdbH" name="sexo" <?php if ( isset($persona) && $persona["GENERO"] == "M" ) {echo 'checked="checked"'; } ?> value="M" /> Sí
										</label>
										<label class="radio-inline">
											<input type="radio" id="rdbM" name="sexo" <?php if ( isset($persona) && $persona["GENERO"] == "F" ) {echo 'checked="checked"'; } ?> value="F" /> No
										</label>
									</div>
								</div>
								<div class="form-group col-sm-4">
									<label>Institución que apoya</label>
									<input type="text" id="extension" name="extension" class="form-control" placeholder="Ingrese el nombre de la institución" />
								</div>
								<div class="form-group col-sm-4">
									<label>Monto con el que apoya</label>
									<div class="input-group">
										<div class="input-group-addon">$</div>
										<input type="text" id="fechaNac" name="fechaNac" class="form-control" placeholder="Monto del apoyo adicional" />
									</div>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-4">
									<label>Tipo de moneda</label>
									<select id="" name="" class="form-control">
										<option value="">Seleccione el tipo de moneda</option>
										<option value="d">Dólares</option>
										<option value="p">Pesos</option>
									</select>
								</div>
								<div class="form-group col-sm-8">
									<label>Especificación del apoyo</label>
									<input type="text" id="extension" name="extension" class="form-control" placeholder="Ingrese la especificación del apoyo" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row">
				<div class="form-group col-sm-2 col-sm-offset-5">
					<button type="submit" class="btn btn-block btn-primary">Guardar</button>
				</div>
			</div>
	</div>
</form>