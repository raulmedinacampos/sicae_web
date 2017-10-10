<h3>Alta de coordinador</h3>
<hr class="red" />
<form id="formCoordinador" name="formCoordinador" method="post" action="">
	<!-- Nav tabs -->
	<ul class="nav nav-tabs" role="tablist">
		<li role="presentation" class="active"><a href="#personal" aria-controls="personal" role="tab" data-toggle="tab">Información personal</a></li>
		<li role="presentation"><a href="#evento" aria-controls="evento" role="tab" data-toggle="tab">Datos del evento</a></li>
		<li role="presentation"><a href="#expositores" aria-controls="expositores" role="tab" data-toggle="tab">Expositores</a></li>
		<li role="presentation"><a href="#monto" aria-controls="monto" role="tab" data-toggle="tab">Monto solicitado</a></li>
		<li role="presentation"><a href="#bancarios" aria-controls="bancarios" role="tab" data-toggle="tab">Datos bancarios</a></li>
	</ul>

	<!-- Tab panes -->
	<div class="tab-content">
		<div role="tabpanel" class="tab-pane active" id="personal">
			<div class="row">
				<div class="form-group col-sm-8">
					<label class="obligatorio">Clave Única de Registro de Población (CURP):</label>
					<input type="text" id="curp" name="curp" maxlength="18" class="form-control" value="<?php if(isset($persona)) {echo $persona["CURP"];} ?>" placeholder="Ingresa tu CURP" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-4">
					<label class="obligatorio">Nombre(s):</label>
					<input type="text" id="nombre" name="nombre" class="form-control" value="<?php if(isset($persona)) {echo $persona["NOMBRE"];} ?>" placeholder="Ingresa tu nombre" />
				</div>
				<div class="form-group col-sm-4">
					<label class="obligatorio">Primer apellido:</label>
					<input type="text" id="apPaterno" name="apPaterno" class="form-control" value="<?php if(isset($persona)) {echo $persona["APELLIDO_P"];} ?>" placeholder="Ingresa tu primer apellido" />
				</div>
				<div class="form-group col-sm-4">
					<label>Segundo apellido:</label>
					<input type="text" id="apMaterno" name="apMaterno" class="form-control" value="<?php if(isset($persona)) {echo $persona["APELLIDO_M"];} ?>" placeholder="Ingresa tu segundo apellido" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-4">
					<label class="obligatorio">Sexo:</label>
					<div>
						<label class="radio-inline">
							<input type="radio" id="rdbH" name="sexo" <?php if ( isset($persona) && $persona["GENERO"] == "M" ) {echo 'checked="checked"'; } ?> value="M" /> Hombre
						</label>
						<label class="radio-inline">
							<input type="radio" id="rdbM" name="sexo" <?php if ( isset($persona) && $persona["GENERO"] == "F" ) {echo 'checked="checked"'; } ?> value="F" /> Mujer
						</label>
					</div>
				</div>
				<div class="form-group col-sm-4">
					<div class="datepicker-group">
						<label class="obligatorio">Fecha de nacimiento:</label>
						<input type="text" id="fechaNac" name="fechaNac" class="datepicker form-control" data-mask="99/99/9999" value="<?php if(isset($persona)) {echo $persona["FECHA_NACIMIENTO"];} ?>" placeholder="Fecha de nacimiento" />
						<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-2">
					<label class="obligatorio">Lada:</label>
					<input type="text" id="lada" name="lada" maxlength="3" class="form-control" value="<?php if(isset($persona)) {echo $persona["LADA"];} ?>" placeholder="Lada" />
				</div>
				<div class="form-group col-sm-4">
					<label class="obligatorio">Teléfono fijo:</label>
					<input type="text" id="telefono" name="telefono" maxlength="7" class="form-control" data-mask="9999999" value="<?php if(isset($persona)) {echo $persona["TELEFONO"];} ?>" placeholder="Teléfono fijo" />
				</div>
				<div class="form-group col-sm-2">
					<label class="obligatorio">Extensión:</label>
					<input type="text" id="extension" name="extension" maxlength="5" class="form-control" data-mask="99999" value="<?php if(isset($persona)) {echo $persona["EXTENSION"];} ?>" placeholder="Extensión" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-4">
					<label class="obligatorio">Correo electrónico:</label>
					<input type="text" id="email" name="email" class="form-control" value="<?php if(isset($persona)) {echo $persona["EMAIL"];} ?>" placeholder="Email para recibir notificación de dictamen" />
				</div>
				<div class="form-group col-sm-4">
					<label class="obligatorio">Confirmar correo electrónico:</label>
					<input type="text" id="emailConf" name="emailConf" class="form-control" value="<?php if(isset($persona)) {echo $persona["EMAIL"];} ?>" placeholder="Confirma el correo electrónico" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-12">
					<label class="obligatorio">Escuela:</label>
					<select id="escuela" name="escuela" class="form-control">
						<option value="">Selecciona tu centro de adscripción</option>
						<?php
						foreach ( $escuelas as $val ) {
						?>
						<option <?php if ( isset($persona) && $persona["CENTRO_ADSCRIPCION"] == $val->ID ) {echo 'selected="selected"'; } ?> value="<?php echo $val->ID; ?>"><?php echo $val->NOMBRE_CORTO; ?></option>
						<?php
						}
						?>
					</select>
				</div>
			</div>
		</div>
		<div role="tabpanel" class="tab-pane" id="evento">
			<div class="row">
				<div class="form-group col-sm-6">
					<label class="obligatorio">Tipo de evento</label>
					<select id="tipoEvento" name="tipoEvento" class="form-control">
						<option value="">Selecciona el tipo de evento</option>
						<?php
						foreach ( $tipos_evento as $val ) {
						?>
						<option value="<?php echo $val->ID; ?>"><?php echo $val->DESCRIPCION; ?></option>
						<?php
						}
						?>
					</select>
				</div>
				<div class="form-group col-sm-6">
					<label class="obligatorio">Nombre del evento</label>
					<input type="text" id="" name="" class="form-control" placeholder="" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-6">
					<label class="obligatorio">Idioma del evento (Inglés, español, otro)</label>
					<input type="text" id="" name="" class="form-control" placeholder="" />
				</div>
				<div class="form-group col-sm-6">
					<label class="obligatorio">Sede</label>
					<select id="" name="" class="form-control">
						<option value="">Selecciona tu centro de adscripción</option>
						<?php
						foreach ( $escuelas as $val ) {
						?>
						<option value="<?php echo $val->ID; ?>"><?php echo $val->NOMBRE_CORTO; ?></option>
						<?php
						}
						?>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-6">
					<div class="datepicker-group">
						<label class="obligatorio">Fecha de inicio</label>
						<input type="text" id="" name="" class="datepicker form-control" data-mask="99/99/9999" placeholder="dd/mm/aaaa" value="<?php if(isset($persona)) {echo $persona["FECHA_NACIMIENTO"];} ?>" />
						<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
					</div>
				</div>
				<div class="form-group col-sm-6">
					<div class="datepicker-group">
						<label class="obligatorio">Fecha de término</label>
						<input type="text" id="" name="" class="datepicker form-control" data-mask="99/99/9999" placeholder="dd/mm/aaaa" value="<?php if(isset($persona)) {echo $persona["FECHA_NACIMIENTO"];} ?>" />
						<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-6">
					<label class="obligatorio">Total de participantes</label>
					<input type="text" id="" name="" class="form-control" placeholder="" />
				</div>
				<div class="form-group col-sm-6">
					<label class="obligatorio">Total de expositores</label>
					<input type="text" id="" name="" class="form-control" placeholder="" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-6">
					<label class="obligatorio">Horas totales</label>
					<input type="text" id="" name="" class="form-control" placeholder="" />
				</div>
				<div class="form-group col-sm-6">
					<label class="obligatorio">A quién va dirigido el evento</label>
					<input type="text" id="" name="" class="form-control" placeholder="" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-6">
					<label class="obligatorio">Objetivo</label>
					<textarea cols="3" class="form-control" placeholder=""></textarea>
				</div>
				<div class="form-group col-sm-6">
					<label class="obligatorio">Beneficio institucional</label>
					<textarea cols="3" class="form-control" placeholder=""></textarea>
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
			
			<div class="panel-group ficha-collapse" id="accordion1">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
						<a data-parent="#accordion1" data-toggle="collapse" href="#panel-1" aria-expanded="true" aria-controls="panel-1">
							Expositor 1
						</a>
						</h4>
						<button type="button" class="collpase-button collapsed" data-parent="#accordion1" data-toggle="collapse" href="#panel-1"></button>
					</div>
					<div class="panel-collapse collapse in" id="panel-1">
						<div class="panel-body">
							<div class="row">
								<div class="form-group col-sm-4">
									<label>Nombre(s):</label>
									<input type="text" id="" name="" class="form-control" />
								</div>
								<div class="form-group col-sm-4">
									<label>Primer apellido</label>
									<input type="text" id="" name="" class="form-control" />
								</div>
								<div class="form-group col-sm-4">
									<label>Segundo apellido</label>
									<input type="text" id="" name="" class="form-control" />
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-6">
									<label>Procedencia</label>
									<input type="text" id="" name="" class="form-control" />
								</div>
								<div class="form-group col-sm-6">
									<label>Trabajo actual</label>
									<input type="text" id="" name="" class="form-control" />
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-6">
									<label>Licenciatura</label>
									<input type="text" id="" name="" class="form-control" />
								</div>
								<div class="form-group col-sm-6">
									<label>Maestría</label>
									<input type="text" id="" name="" class="form-control" />
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-6">
									<label>Doctorado</label>
									<input type="text" id="" name="" class="form-control" />
								</div>
								<div class="form-group col-sm-6">
									<label>Especialidad</label>
									<input type="text" id="" name="" class="form-control" />
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-6">
									<label>Actividad del expositor</label>
									<input type="text" id="" name="" class="form-control" />
								</div>
								<div class="form-group col-sm-6">
									<label>Tema a exponer</label>
									<input type="text" id="" name="" class="form-control" />
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-6">
									<label>Horario</label>
									<input type="text" id="" name="" class="form-control" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div role="tabpanel" class="tab-pane" id="monto">
			<div class="row">
				<div class="form-group col-sm-6">
					<label class="obligatorio">Pago a expositores</label>
					<input type="text" id="" name="" class="form-control" placeholder="" />
				</div>
				<div class="form-group col-sm-6">
					<label class="obligatorio">Viáticos a expositores</label>
					<input type="text" id="" name="" class="form-control" placeholder="" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-6">
					<label class="obligatorio">Transporte aéreo</label>
					<input type="text" id="" name="" class="form-control" placeholder="" />
				</div>
				<div class="form-group col-sm-6">
					<label class="obligatorio">+ Especifique</label>
					<input type="text" id="" name="" class="form-control" placeholder="" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-6">
					<label class="obligatorio">Transporte terrestre</label>
					<input type="text" id="" name="" class="form-control" placeholder="" />
				</div>
				<div class="form-group col-sm-6">
					<label class="obligatorio">+ Especifique</label>
					<input type="text" id="" name="" class="form-control" placeholder="" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-6">
					<label class="obligatorio">Material</label>
					<input type="text" id="" name="" class="form-control" placeholder="" />
				</div>
				<div class="form-group col-sm-6">
					<label class="obligatorio">Cafetería</label>
					<input type="text" id="" name="" class="form-control" placeholder="" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-6">
					<label class="obligatorio">Otros gastos</label>
					<input type="text" id="" name="" class="form-control" placeholder="" />
				</div>
				<div class="form-group col-sm-6">
					<label class="obligatorio">Especifique sus otros gastos</label>
					<input type="text" id="" name="" class="form-control" placeholder="" />
				</div>
			</div>
			
			<div class="panel panel-default">
				<div class="panel-heading">
					Otras aportaciones
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="form-group col-sm-4">
						<label class="obligatorio">¿Cuenta con otros apoyos?</label>
						
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-4">
						<label class="obligatorio">Institución que apoya</label>
						<input type="text" id="" name="" class="form-control" placeholder="" />
					</div>
					<div class="form-group col-sm-4">
						<label class="obligatorio">Monto con el que apoya</label>
						<input type="text" id="" name="" class="form-control" placeholder="" />
					</div>
					<div class="form-group col-sm-4">
						<label class="obligatorio">Tipo de moneda</label>
						<select class="form-control">
							<option value="">Selecciona</option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-8">
						<label class="obligatorio">Especificación del apoyo</label>
						<textarea rows="3" class="form-control"></textarea>
					</div>
				</div>
			</div>
		</div>
		<div role="tabpanel" class="tab-pane" id="bancarios">
			<div class="row">
				<div class="form-group col-sm-6">
					<label class="obligatorio">Banco</label>
					<input type="text" id="banco" name="banco" class="form-control" placeholder="Ingrese el nombre del banco" />
				</div>
				<div class="form-group col-sm-6">
					<label class="obligatorio">Número de sucursal</label>
					<input type="text" id="sucursal" name="sucursal" class="form-control" placeholder="Ingrese su número de sucursal" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-6">
					<label class="obligatorio">Número de cuenta</label>
					<input type="text" id="cuentaBanco" name="cuentaBanco" maxlength="12" class="form-control" placeholder="Ingrese su número de cuenta" />
				</div>
				<div class="form-group col-sm-6">
					<label class="obligatorio">CLABE Interbancaria</label>
					<input type="text" id="clabe" name="clabe" maxlength="18" class="form-control" data-mask="999 999 99999999999 9" placeholder="Ingrese la CLABE interbancaria (18 dígitos)" />
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="form-group col-sm-2 col-sm-offset-5">
			<button type="submit" class="btn btn-block btn-primary">Guardar</button>
		</div>
	</div>
</form>