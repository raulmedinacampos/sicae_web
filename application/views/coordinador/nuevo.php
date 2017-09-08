<h3 class="titulo">Alta de coordinador</h3>
<form id="formCoordinador" name="formCoordinador" method="post" action="">
	<!-- Tab panes -->
	<div class="tab-content">
		<div role="tabpanel" class="tab-pane active" id="personal">
			<div class="row">
				<div class="form-group col-sm-6">
					<label>Nombre</label>
					<input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingrese su nombre" />
				</div>
				<div class="form-group col-sm-6">
					<label>Apellido paterno</label>
					<input type="text" id="apPaterno" name="apPaterno" class="form-control" placeholder="Ingrese su apellido paterno" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-6">
					<label>Apellido materno</label>
					<input type="text" id="apMaterno" name="apMaterno" class="form-control" placeholder="Ingrese su apellido materno" />
				</div>
				<div class="form-group col-sm-6">
					<label>Fecha de nacimiento</label>
					<div class="input-group date datepicker">
						<input type="text" id="fechaNac" name="fechaNac" class="form-control" data-mask="99/99/9999" placeholder="dd/mm/aaaa" />
						<div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-6">
					<label>Sexo</label>
					<select id="sexo" name="sexo" class="form-control">
						<option value="">Seleccione su sexo</option>
						<option value="h">Hombre</option>
						<option value="m">Mujer</option>
					</select>
				</div>
				<div class="form-group col-sm-6">
					<label>CURP</label>
					<input type="text" id="curp" name="curp" maxlength="18" class="form-control" placeholder="Ingrese su CURP" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-6">
					<label>Correo electrónico</label>
					<input type="text" id="email" name="email" class="form-control" placeholder="Ingrese su email para recibir notificación de dictamen" />
				</div>
				<div class="form-group col-sm-6">
					<label>Confirmar correo electrónico</label>
					<input type="text" id="emailConf" name="emailConf" class="form-control" placeholder="Confirme el correo electrónico" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-6">
					<label>Teléfono</label>
					<input type="text" id="telefono" name="telefono" maxlength="15" class="form-control" data-mask="9999999999" placeholder="Ingrese su teléfono incluyendo lada" />
				</div>
				<div class="form-group col-sm-6">
					<label>Extensión</label>
					<input type="text" id="extension" name="extension" maxlength="6" class="form-control" data-mask="999?999" placeholder="Ingrese su extensión. Mínimo 3 y máximo 6 dígitos" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-12">
					<label>Escuela</label>
					<select id="escuela" name="escuela" class="form-control">
						<option value="">Seleccione su centro de adscripción</option>
					</select>
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