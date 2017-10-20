<h3>Actualización de datos</h3>
<hr class="red" />
<form id="formCoordinador" name="formCoordinador" method="post" action="">
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
		<div class="form-group col-sm-4">
			<label class="obligatorio">Teléfono fijo:</label>
			<input type="text" id="telefono" name="telefono" maxlength="7" class="form-control" data-mask="9999999999" value="<?php if(isset($persona)) {echo $persona["TELEFONO"];} ?>" placeholder="Teléfono fijo" />
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
	
	<div class="row">
		<div class="form-group col-sm-2 col-sm-offset-5">
			<button type="submit" class="btn btn-block btn-primary">Guardar</button>
		</div>
	</div>
</form>