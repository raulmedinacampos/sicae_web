<h3>Actualización de datos</h3>
<hr class="red" />
<form id="formCoordinador" name="formCoordinador" method="post" action="">
<!-- Nav tabs -->
	<ul class="nav nav-tabs" role="tablist">
		<li role="presentation" class="active"><a href="#personales" aria-controls="personales" role="tab" data-toggle="tab">Datos personales</a></li>
		<li role="presentation"><a href="#bancarios" aria-controls="bancarios" role="tab" data-toggle="tab">Datos bancarios de la escuela o centro</a></li>
	</ul>

	<!-- Tab panes -->
	<div class="tab-content">
		<div role="tabpanel" class="tab-pane active" id="personales">
			<div class="row">
				<div class="form-group col-sm-8">
					<label>CURP<span class="form-text">*</span>: <span class="icon-infocircle" data-toggle="tooltip" title="Clave Única de Registro de Población"></span></label>
					<input type="text" id="curp" name="curp" maxlength="18" readonly="readonly" class="form-control" value="<?php if(isset($persona)) {echo $persona["CURP"];} ?>" placeholder="Ingresa tu CURP" />
					<input type="hidden" id="hdnID" name="hdnID" value="<?php if(isset($persona)) {echo $persona["ID"];} ?>" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-4">
					<label>Nombre(s)<span class="form-text">*</span>:</label>
					<input type="text" id="nombre" name="nombre" class="form-control" value="<?php if(isset($persona)) {echo $persona["NOMBRE"];} ?>" placeholder="Ingresa tu nombre" />
				</div>
				<div class="form-group col-sm-4">
					<label>Primer apellido<span class="form-text">*</span>:</label>
					<input type="text" id="apPaterno" name="apPaterno" class="form-control" value="<?php if(isset($persona)) {echo $persona["APELLIDO_P"];} ?>" placeholder="Ingresa tu primer apellido" />
				</div>
				<div class="form-group col-sm-4">
					<label>Segundo apellido:</label>
					<input type="text" id="apMaterno" name="apMaterno" class="form-control" value="<?php if(isset($persona)) {echo $persona["APELLIDO_M"];} ?>" placeholder="Ingresa tu segundo apellido" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-4">
					<label>Sexo<span class="form-text">*</span>:</label>
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
						<label>Fecha de nacimiento<span class="form-text">*</span>:</label>
						<input type="text" id="fechaNac" name="fechaNac" class="datepicker form-control" data-mask="99/99/9999" value="<?php if(isset($persona)) {echo $persona["FECHA_NACIMIENTO"];} ?>" placeholder="Fecha de nacimiento" />
						<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-4">
					<label>Teléfono fijo<span class="form-text">*</span>:</label>
					<input type="text" id="telefono" name="telefono" maxlength="10" class="form-control" data-mask="9999999999" value="<?php if(isset($persona)) {echo $persona["TELEFONO"];} ?>" placeholder="Teléfono fijo" />
				</div>
				<div class="form-group col-sm-2">
					<label>Extensión<span class="form-text">*</span>:</label>
					<input type="text" id="extension" name="extension" maxlength="5" class="form-control" data-mask="99999" value="<?php if(isset($persona)) {echo $persona["EXTENSION"];} ?>" placeholder="Extensión" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-4">
					<label>Correo electrónico<span class="form-text">*</span>:</label>
					<input type="text" id="email" name="email" class="form-control" value="<?php if(isset($persona)) {echo $persona["EMAIL"];} ?>" placeholder="ejemplo@dominio.com" />
				</div>
				<div class="form-group col-sm-4">
					<label>Confirmar correo electrónico<span class="form-text">*</span>:</label>
					<input type="text" id="emailConf" name="emailConf" class="form-control" value="<?php if(isset($persona)) {echo $persona["EMAIL"];} ?>" placeholder="ejemplo@dominio.com" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-12">
					<label>Escuela<span class="form-text">*</span>:</label>
					<select id="escuela" name="escuela" class="form-control">
						<option value="">Selecciona</option>
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
	
		<div role="tabpanel" class="tab-pane" id="bancarios">
			<h5 class="text-justify">Los datos bancarios que se ingresen deben 
				corresponder a la cuenta de la escuela o centro solicitante.</h5>
			<div class="row">
				<div class="form-group col-sm-4">
					<label>Banco<span class="form-text">*</span>:</label>
					<input type="text" id="banco" name="banco" class="form-control" placeholder="Ingresa el nombre del banco" value="<?php if(isset($persona) && ($persona)) {echo $persona["BANCO_NOMBRE"];} ?>" />
				</div>
				<div class="form-group col-sm-4">
					<label>Número de sucursal<span class="form-text">*</span>:</label>
					<input type="text" id="sucursal" name="sucursal" class="form-control" placeholder="Ingresa el número de sucursal" value="<?php if(isset($persona) && ($persona)) {echo $persona["BANCO_SUCURSAL"];} ?>" />
				</div>
				<div class="form-group col-sm-4">
					<label>Número de cuenta<span class="form-text">*</span>:</label>
					<input type="text" id="cuentaBanco" name="cuentaBanco" maxlength="12" class="form-control" placeholder="Ingresa tu número de cuenta" value="<?php if(isset($persona) && ($persona)) {echo $persona["BANCO_CUENTA"];} ?>" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-4">
					<label>Cuenta CLABE<span class="form-text">*</span>: <span class="icon-infocircle" data-toggle="tooltip" title="Ingresa la Clave Bancaria Estandarizada"></span></label>
					<input type="text" id="clabe" name="clabe" class="form-control" data-mask="999 999 99999999999 9" placeholder="Ingresa la CLABE interbancaria" value="<?php if(isset($persona) && ($persona)) {echo $persona["BANCO_CLABE"];} ?>" />
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