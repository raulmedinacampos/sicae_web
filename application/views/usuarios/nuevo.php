<h3><?php echo "Alta de ".$perfilC; ?></h3>
<hr class="red" />
<form id="formUsuario" name="formUsuario" method="post" action="">
	<!-- Nav tabs -->
	<ul class="nav nav-tabs" role="tablist">
		<li role="presentation" class="active"><a href="#personal" aria-controls="personal" role="tab" data-toggle="tab">Información personal</a></li>
		<?php
			if ( $perfil == "1") {  // Profesor
		?>
		<li role="presentation"><a href="#profesor" aria-controls="profesor" role="tab" data-toggle="tab">Datos laborales</a></li>
		<li role="presentation"><a href="#grados" aria-controls="grados" role="tab" data-toggle="tab">Grados académicos</a></li>
		<li role="presentation"><a href="#productividad" aria-controls="productividad" role="tab" data-toggle="tab">Productividad <?php echo (date('Y')-1)."-".date('Y'); ?></a></li>
		<li role="presentation"><a href="#proyectos" aria-controls="proyectos" role="tab" data-toggle="tab">Proyectos</a></li>
		<?php
			}
			
			if ( $perfil == "3") {  // Alumno
		?>
		<li role="presentation"><a href="#alumno" aria-controls="alumno" role="tab" data-toggle="tab">Datos escolares</a></li>
		<li role="presentation"><a href="#grados" aria-controls="grados" role="tab" data-toggle="tab">Grados académicos</a></li>
		<?php
			}
		?>
		<li role="presentation"><a href="#bancarios" aria-controls="bancarios" role="tab" data-toggle="tab">Datos bancarios</a></li>
	</ul>

	<!-- Tab panes -->
	<div class="tab-content">
		<div role="tabpanel" class="tab-pane active" id="personal">
			<div class="row">
				<div class="form-group col-sm-4">
					<label>CURP<span class="form-text">*</span>: <span class="icon-infocircle" data-toggle="tooltip" title="Clave Única de Registro de Población"></span></label>
					<input type="text" id="curp" name="curp" maxlength="18" class="form-control" placeholder="Ingresa tu CURP" value="<?php if(isset($persona)) {echo $persona["CURP"];} ?>" />
					<input type="hidden" id="hdnID" name="hdnID" value="<?php if(isset($persona)) {echo $persona["ID"];} ?>" />
					<input type="hidden" id="hdnTipo" name="hdnTipo" value="<?php echo $perfil; ?>" />
				</div>
				<div class="form-group col-sm-4">
					<label>RFC<span class="form-text">*</span>: <span class="icon-infocircle" data-toggle="tooltip" title="Registro Federal de Contribuyentes"></span></label>
					<input type="text" id="rfc" name="rfc" maxlength="13" class="form-control" placeholder="Ingresa tu RFC" value="<?php if(isset($persona)) {echo $persona["RFC"];} ?>" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-4">
					<label>Nombre(s)<span class="form-text">*</span>:</label>
					<input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingresa tu nombre" value="<?php if(isset($persona)) {echo $persona["NOMBRE"];} ?>" />
				</div>
				<div class="form-group col-sm-4">
					<label>Primer apellido<span class="form-text">*</span>:</label>
					<input type="text" id="apPaterno" name="apPaterno" class="form-control" placeholder="Ingresa tu primer apellido" value="<?php if(isset($persona)) {echo $persona["APELLIDO_P"];} ?>" />
				</div>
				<div class="form-group col-sm-4">
					<label>Segundo apellido:</label>
					<input type="text" id="apMaterno" name="apMaterno" class="form-control" placeholder="Ingresa tu segundo apellido" value="<?php if(isset($persona)) {echo $persona["APELLIDO_M"];} ?>" />
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
					<label>Nacionalidad<span class="form-text">*</span>:</label>
					<div>
						<label class="radio-inline">
							<input type="radio" id="rdbMex" name="nacionalidad" <?php if ( isset($persona) && preg_match("/(mex).*/i", $persona["NACIONALIDAD"]) == 1 ) {echo 'checked="checked"'; } ?> value="Mexicano" /> Mexicano
						</label>
						<label class="radio-inline">
							<input type="radio" id="rdbExt" name="nacionalidad" <?php if ( isset($persona) && preg_match("/(mex).*/i", $persona["NACIONALIDAD"]) == 0 ) {echo 'checked="checked"'; } ?> value="Extranjero" /> Extranjero
						</label>
					</div>
				</div>
				<div class="form-group col-sm-4">
					<div class="datepicker-group">
						<label>Fecha de nacimiento<span class="form-text">*</span>:</label>
						<input type="text" id="fechaNac" name="fechaNac" class="datepicker form-control" data-mask="99/99/9999" placeholder="Fecha de nacimiento" value="<?php if(isset($persona)) {echo $persona["FECHA_NACIMIENTO"];} ?>" />
						<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-4">
					<label>Teléfono fijo<span class="form-text">*</span>:</label>
					<input type="text" id="telefono" name="telefono" maxlength="15" class="form-control" data-mask="9999999999" value="<?php if(isset($persona)) {echo $persona["TELEFONO"];} ?>" placeholder="Teléfono fijo" />
				</div>
				<div class="form-group col-sm-2">
					<label>Extensión<span class="form-text">*</span>:</label>
					<input type="text" id="extension" name="extension" maxlength="5" class="form-control" data-mask="99999" value="<?php if(isset($persona)) {echo $persona["EXTENSION"];} ?>" placeholder="Extensión" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-4">
					<label>Correo electrónico<span class="form-text">*</span>:</label>
					<input type="text" id="email" name="email" class="form-control" placeholder="ejemplo@dominio.com" value="<?php if(isset($persona)) {echo $persona["EMAIL"];} ?>" />
				</div>
				<div class="form-group col-sm-4">
					<label>Confirmar correo electrónico<span class="form-text">*</span>:</label>
					<input type="text" id="emailConf" name="emailConf" class="form-control" placeholder="ejemplo@dominio.com" value="<?php if(isset($persona)) {echo $persona["EMAIL"];} ?>" />
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
			<div class="row">
				<div class="form-group col-sm-4">
					<div class="checkbox">
						<label>
							<input type="checkbox" id="chkPass" value="1" /> ¿Deseas modificar la contraseña?
						</label>
					</div>
				</div>
			</div>
			<div class="row oculto">
				<div class="form-group col-sm-4">
					<label>Contraseña<span class="form-text">*</span>:</label>
					<input type="password" id="password" name="password" maxlength="8" class="form-control" placeholder="Nueva contraseña" />
				</div>
				<div class="form-group col-sm-4">
					<label>Confirmar contraseña<span class="form-text">*</span>:</label>
					<input type="password" id="passwordConf" name="passwordConf" maxlength="8" class="form-control" placeholder="Confirma la nueva contraseña" />
				</div>
			</div>
		</div>
		<?php
			if ( $perfil == "1") {  // Profesor
		?>
		<div role="tabpanel" class="tab-pane" id="profesor">
			<div class="row">
				<div class="form-group col-sm-4">
					<label>Tipo de nombramiento<span class="form-text">*</span>:</label>
					<select id="tipoNombramiento" name="tipoNombramiento" class="form-control">
						<option value="">Selecciona</option>
						<?php
						foreach ( $nombramientos as $val ) {
						?>
						<option <?php if ( isset($profesor) && $profesor["NOMBRAMIENTO"] == $val->ID ) {echo 'selected="selected"'; } ?> value="<?php echo $val->ID; ?>"><?php echo $val->DESCRIPCION; ?></option>
						<?php
						}
						?>
					</select>
				</div>
				<div class="form-group col-sm-4">
					<label>Número de empleado<span class="form-text">*</span>:</label>
					<input type="text" id="numEmpleado" name="numEmpleado" class="form-control" placeholder="Ingresa tu número de empleado" value="<?php if(isset($profesor)) {echo $profesor["NO_EMPLEADO"];} ?>" />
				</div>
				<div class="form-group col-sm-4">
					<div class="datepicker-group">
						<label>Fecha de ingreso<span class="form-text">*</span>:</label>
						<input type="text" id="fechaIngreso" name="fechaIngreso" class="datepicker form-control" data-mask="99/99/9999" placeholder="Fecha de ingreso" value="<?php if(isset($profesor)) {echo $profesor["FECHA_INGRESO"];} ?>" />
						<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-12">
					<label>¿Fuiste contratado dentro del Personal Académico Extraordinario?<span class="form-text">*</span>:</label>
					<div>
						<label class="radio-inline">
							<input type="radio" id="rdbES" name="excelencia" <?php if ( isset($profesor) && $profesor["EXCELENCIA"] == "1" ) {echo 'checked="checked"'; } ?> value="1" /> Sí
						</label>
						<label class="radio-inline">
							<input type="radio" id="rdbEN" name="excelencia" <?php if ( isset($profesor) && $profesor["EXCELENCIA"] == "0" ) {echo 'checked="checked"'; } ?> value="0" /> No
						</label>
					</div>
				</div>
			</div>
			<div class="panel-group ficha-collapse" id="accordion1">
				<div id="panel-base" class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-parent="#accordion1" data-toggle="collapse" href="#panel-1" aria-expanded="true" aria-controls="panel-1">
								Base
							</a>
						</h4>
						<button type="button" class="collpase-button" data-parent="#accordion1" data-toggle="collapse" href="#panel-1"></button>
					</div>
					<div class="panel-collapse collapse in" id="panel-1">
						<div class="panel-body">
							<div class="row">
								<div class="form-group col-sm-4">
									<div class="datepicker-group">
										<label>Fecha en que obtuviste la base<span class="form-text">*</span>:</label>
										<input type="text" id="fechaBase" name="fechaBase" class="datepicker form-control" data-mask="99/99/9999" placeholder="Fecha en que obtuvo la base" value="<?php if(isset($profesor)) {echo $profesor["FECHA_BASE"];} ?>" />
										<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
									</div>
								</div>
								<div class="form-group col-sm-4">
									<label>Categoría<span class="form-text">*</span>:</label>
									<input type="text" id="categoria" name="categoria" class="form-control" placeholder="Ingresa tu categoría" value="<?php if(isset($profesor)) {echo $profesor["CATEGORIA"];} ?>" />
								</div>
								<div class="form-group col-sm-4">
									<label>Plaza<span class="form-text">*</span>:</label>
									<input type="text" id="plaza" name="plaza" class="form-control" placeholder="Ingresa tu plaza" value="<?php if(isset($profesor)) {echo $profesor["PLAZA"];} ?>" />
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-4">
									<label>Horas de plaza<span class="form-text">*</span>:</label>
									<select id="horas" name="horas" class="form-control">
										<option value="">Selecciona</option>
										<option <?php if ( isset($profesor) && $profesor["HORAS"] == "20" ) {echo 'selected="selected"'; } ?> value="20">20</option>
										<option <?php if ( isset($profesor) && $profesor["HORAS"] == "30" ) {echo 'selected="selected"'; } ?> value="30">30</option>
										<option <?php if ( isset($profesor) && $profesor["HORAS"] == "40" ) {echo 'selected="selected"'; } ?> value="40">40</option>
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="panel-group ficha-collapse" id="accordion2">
				<div id="panel-interinato" class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-parent="#accordion2" data-toggle="collapse" href="#panel-2" aria-expanded="true" aria-controls="panel-2">
								Interinato
							</a>
						</h4>
						<button type="button" class="collpase-button" data-parent="#accordion2" data-toggle="collapse" href="#panel-2"></button>
					</div>
					<div class="panel-collapse collapse in" id="panel-2">
						<div class="panel-body">
							<div class="row">
								<div class="form-group col-sm-4">
									<div class="datepicker-group">
										<label>Fecha de inicio de interinato<span class="form-text">*</span>:</label>
										<input type="text" id="fechaInicioInt" name="fechaInicioInt" class="datepicker form-control" data-mask="99/99/9999" placeholder="Fecha de inicio" value="<?php if(isset($profesor)) {echo $profesor["INICIO_INTERINATO"];} ?>" />
										<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
									</div>
								</div>
								<div class="form-group col-sm-4">
									<div class="datepicker-group">
										<label>Fecha de término de interinato<span class="form-text">*</span>:</label>
										<input type="text" id="fechaFinInt" name="fechaFinInt" class="datepicker form-control" data-mask="99/99/9999" placeholder="Fecha de término" value="<?php if(isset($profesor)) {echo $profesor["FIN_INTERINATO"];} ?>" />
										<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="form-group col-sm-6">
					<label>¿Cuentas con sabático?<span class="form-text">*</span>:</label>
					<div>
						<label class="radio-inline">
							<input type="radio" id="rdbES" name="sabatico" <?php if ( isset($profesor) && $profesor["SABATICO"] == "1" ) {echo 'checked="checked"'; } ?> value="1" /> Sí
						</label>
						<label class="radio-inline">
							<input type="radio" id="rdbEN" name="sabatico" <?php if ( isset($profesor) && $profesor["SABATICO"] == "0" ) {echo 'checked="checked"'; } ?> value="0" /> No
						</label>
					</div>
				</div>
			</div>
			<div class="panel-group ficha-collapse" id="accordion3">
				<div id="panel-sabatico" class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-parent="#accordion3" data-toggle="collapse" href="#panel-3" aria-expanded="true" aria-controls="panel-3">
								Sabático
							</a>
						</h4>
						<button type="button" class="collpase-button" data-parent="#accordion3" data-toggle="collapse" href="#panel-3"></button>
					</div>
					<div class="panel-collapse collapse in" id="panel-3">
						<div class="panel-body">
							<div class="row">
								<div class="form-group col-sm-4">
									<label>Tipo de sabático<span class="form-text">*</span>:</label>
									<select id="tipoSabatico" name="tipoSabatico" class="form-control">
										<option value="">Selecciona</option>
										<option <?php if ( isset($profesor) && $profesor["SABATICO_ANUAL"] == "0" ) {echo 'selected="selected"'; } ?> value="0">Semestre sabático</option>
										<option <?php if ( isset($profesor) && $profesor["SABATICO_ANUAL"] == "1" ) {echo 'selected="selected"'; } ?> value="1">Año sabático</option>
									</select>
								</div>
								<div class="form-group col-sm-4">
									<div class="datepicker-group">
										<label>Fecha de inicio de sabático<span class="form-text">*</span>:</label>
										<input type="text" id="fechaInicioSab" name="fechaInicioSab" class="datepicker form-control" data-mask="99/99/9999" placeholder="Fecha de inicio" value="<?php if(isset($profesor)) {echo $profesor["SABATICO_INICIO"];} ?>" />
										<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
									</div>
								</div>
								<div class="form-group col-sm-4">
									<div class="datepicker-group">
										<label>Fecha de término de sabático<span class="form-text">*</span>:</label>
										<input type="text" id="fechaFinSab" name="fechaFinSab" class="datepicker form-control" data-mask="99/99/9999" placeholder="Fecha de término" value="<?php if(isset($profesor)) {echo $profesor["SABATICO_FIN"];} ?>" />
										<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-6">
					<label>¿Cuenta con licencia con goce de sueldo?<span class="form-text">*</span>:</label>
					<div>
						<label class="radio-inline">
							<input type="radio" id="rdbSS" name="sueldo" <?php if ( isset($profesor) && $profesor["LIC_SUELDO"] == "1" ) {echo 'checked="checked"'; } ?> value="1" /> Sí
						</label>
						<label class="radio-inline">
							<input type="radio" id="rdbSN" name="sueldo" <?php if ( isset($profesor) && $profesor["LIC_SUELDO"] == "0" ) {echo 'checked="checked"'; } ?> value="0" /> No
						</label>
					</div>
				</div>
			</div>
			<div class="panel-group ficha-collapse" id="accordion4">
				<div id="panel-sueldo" class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-parent="#accordion4" data-toggle="collapse" href="#panel-4" aria-expanded="true" aria-controls="panel-4">
								Goce de sueldo
							</a>
						</h4>
						<button type="button" class="collpase-button" data-parent="#accordion4" data-toggle="collapse" href="#panel-4"></button>
					</div>
					<div class="panel-collapse collapse in" id="panel-4">
						<div class="panel-body">
							<div class="row">
								<div class="form-group col-sm-4">
									<div class="datepicker-group">
										<label>Fecha de inicio del periodo<span class="form-text">*</span>:</label>
										<input type="text" id="fechaInicioGoce" name="fechaInicioGoce" class="datepicker form-control" data-mask="99/99/9999" placeholder="Fecha de inicio" value="<?php if(isset($profesor)) {echo $profesor["LIC_SUELDO_INICIO"];} ?>" />
										<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
									</div>
								</div>
								<div class="form-group col-sm-4">
									<div class="datepicker-group">
										<label>Fecha de término del periodo<span class="form-text">*</span>:</label>
										<input type="text" id="fechaFinGoce" name="fechaFinGoce" class="datepicker form-control" data-mask="99/99/9999" placeholder="Fecha de término" value="<?php if(isset($profesor)) {echo $profesor["LIC_SUELDO_FIN"];} ?>" />
										<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-4">
									<label>¿Cuenta usted con prórroga?<span class="form-text">*</span>:</label>
									<div>
										<label class="radio-inline">
											<input type="radio" id="rdbSS" name="prorroga" <?php if ( isset($profesor) && $profesor["PRORROGA"] == "1" ) {echo 'checked="checked"'; } ?> value="1" /> Sí
										</label>
										<label class="radio-inline">
											<input type="radio" id="rdbSN" name="prorroga" <?php if ( isset($profesor) && $profesor["PRORROGA"] == "0" ) {echo 'checked="checked"'; } ?> value="0" /> No
										</label>
									</div>
								</div>
								<div class="form-group col-sm-4">
									<div class="datepicker-group">
										<label>Fecha de inicio de prórroga</label>
										<input type="text" id="fechaInicioProrroga" name="fechaInicioProrroga" class="datepicker form-control" data-mask="99/99/9999" placeholder="Fecha de inicio" value="<?php if(isset($profesor)) {echo $profesor["PRORROGA_INICIO"];} ?>" />
										<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
									</div>
								</div>
								<div class="form-group col-sm-4">
									<div class="datepicker-group">
										<label>Fecha de término de prórroga</label>
										<input type="text" id="fechaFinProrroga" name="fechaFinProrroga" class="datepicker form-control" data-mask="99/99/9999" placeholder="Fecha de término" value="<?php if(isset($profesor)) {echo $profesor["PRORROGA_FIN"];} ?>" />
										<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="panel-group ficha-collapse" id="accordion5">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-parent="#accordion5" data-toggle="collapse" href="#panel-5" aria-expanded="true" aria-controls="panel-5">
								Becas
							</a>
						</h4>
						<button type="button" class="collpase-button" data-parent="#accordion5" data-toggle="collapse" href="#panel-5"></button>
					</div>
					<div class="panel-collapse collapse in" id="panel-5">
						<div class="panel-body">
							<div class="row">
								<div class="form-group col-sm-4">
									<label>¿Es becario EDD?<span class="form-text">*</span>:</label>
									<select id="edd" name="edd" class="form-control">
										<option value="">Selecciona</option>
										<option <?php if ( isset($profesor) && $profesor["EDD"] == "0" ) {echo 'selected="selected"'; } ?> value="0">No soy becario EDD</option>
										<?php
										for ( $i=1; $i<10; $i++ ) {
										?>
										<option <?php if ( isset($profesor) && $profesor["EDD"] == $i ) {echo 'selected="selected"'; } ?> value="<?php echo $i; ?>"><?php echo "Nivel ".$i; ?></option>
										<?php
										}
										?>
									</select>
								</div>
								<div class="form-group col-sm-4">
									<label>¿Es becario por exclusividad?<span class="form-text">*</span>:</label>
									<select id="exclusividad" name="exclusividad" class="form-control">
										<option value="">Selecciona</option>
										<option <?php if ( isset($profesor) && $profesor["EXCLUSIVIDAD"] == "0" ) {echo 'selected="selected"'; } ?> value="0">No soy becario por exclusividad</option>
										<?php
										for ( $i=1; $i<4; $i++ ) {
										?>
										<option <?php if ( isset($profesor) && $profesor["EXCLUSIVIDAD"] == $i ) {echo 'selected="selected"'; } ?> value="<?php echo $i; ?>"><?php echo "Nivel ".$i; ?></option>
										<?php
										}
										?>
									</select>
								</div>
								<div class="form-group col-sm-4">
									<label>¿Es becario EDI?<span class="form-text">*</span>:</label>
									<select id="edi" name="edi" class="form-control">
										<option value="">Selecciona</option>
										<option <?php if ( isset($profesor) && $profesor["EDI"] == "0" ) {echo 'selected="selected"'; } ?> value="0">No soy becario EDI</option>
										<?php
										for ( $i=1; $i<10; $i++ ) {
										?>
										<option <?php if ( isset($profesor) && $profesor["EDI"] == $i ) {echo 'selected="selected"'; } ?> value="<?php echo $i; ?>"><?php echo "Nivel ".$i; ?></option>
										<?php
										}
										?>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-4">
									<label>¿Es becario SNI?<span class="form-text">*</span>:</label>
									<select id="sni" name="sni" class="form-control">
										<option value="">Selecciona</option>
										<option <?php if ( isset($profesor) && $profesor["SNI"] == "0" ) {echo 'selected="selected"'; } ?> value="0">No soy becario SNI</option>
										<option <?php if ( isset($profesor) && $profesor["SNI"] == "1" ) {echo 'selected="selected"'; } ?> value="1">Investigador 1er nivel</option>
										<option <?php if ( isset($profesor) && $profesor["SNI"] == "2" ) {echo 'selected="selected"'; } ?> value="2">Investigador 2do nivel</option>
										<option <?php if ( isset($profesor) && $profesor["SNI"] == "3" ) {echo 'selected="selected"'; } ?> value="3">Investigador 3er nivel</option>
										<option <?php if ( isset($profesor) && $profesor["SNI"] == "4" ) {echo 'selected="selected"'; } ?> value="4">Candidato</option>
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
			}
		?>
		<?php
			if ( $perfil == "3") {  // Alumno
		?>
		<div role="tabpanel" class="tab-pane" id="alumno">
			<div class="row">
				<div class="form-group col-sm-4">
					<label>Boleta<span class="form-text">*</span>:</label>
					<input type="text" id="boleta" name="boleta" class="form-control" placeholder="Ingresa tu número de boleta" value="<?php if(isset($alumno)) {echo $alumno["BOLETA"];} ?>" />
				</div>
				<div class="form-group col-sm-4">
					<label>Semestre<span class="form-text">*</span>:</label>
					<input type="text" id="semestre" name="semestre" class="form-control" maxlength="2" placeholder="Ingresa el semestre que cursas actualmente" value="<?php if(isset($alumno)) {echo $alumno["SEMESTRE"];} ?>" />
				</div>
				<div class="form-group col-sm-4">
					<label>Promedio<span class="form-text">*</span>:</label>
					<input type="text" id="promedio" name="promedio" class="form-control" placeholder="Ingresa tu promedio con dos decimales" value="<?php if(isset($alumno)) {echo $alumno["PROMEDIO"];} ?>" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-4">
					<label>Las materias que cursas actualmente son de<span class="form-text">*</span>:</label>
					<select id="materiasCursa" name="materiasCursa" class="form-control">
						<option value="">Selecciona</option>
						<?php
						foreach ( $niveles_academicos as $val ) {
						?>
						<option <?php if ( isset($alumno) && $alumno["NIVEL_ACADEMICO"] == $val->ID ) {echo 'selected="selected"'; } ?> value="<?php echo $val->ID; ?>"><?php echo $val->NOMBRE; ?></option>
						<?php
						}
						?>
					</select>
				</div>
				<div class="form-group col-sm-4">
					<label>¿Eres becario BEIFI?<span class="form-text">*</span>:</label>
					<div>
						<label class="radio-inline">
							<input type="radio" id="pifiS" name="pifi" <?php if ( isset($alumno) && $alumno["PIFI"] == "1" ) {echo 'checked="checked"'; } ?> value="1" /> Sí
						</label>
						<label class="radio-inline">
							<input type="radio" id="pifiN" name="pifi" <?php if ( isset($alumno) && $alumno["PIFI"] == "0" ) {echo 'checked="checked"'; } ?> value="0" /> No
						</label>
					</div>
				</div>
				<div class="form-group col-sm-4">
					<label>¿Eres becario CONACYT?<span class="form-text">*</span>:</label>
					<div>
						<label class="radio-inline">
							<input type="radio" id="conacytS" name="conacyt" <?php if ( isset($alumno) && $alumno["CONACYT"] == "1" ) {echo 'checked="checked"'; } ?> value="1" /> Sí
						</label>
						<label class="radio-inline">
							<input type="radio" id="conacytN" name="conacyt" <?php if ( isset($alumno) && $alumno["CONACYT"] == "0" ) {echo 'checked="checked"'; } ?> value="0" /> No
						</label>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Proyecto SIP <?php echo date('Y'); ?></h3>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="form-group col-sm-4">
							<label>Número de registro<span class="form-text">*</span>:</label>
							<input type="text" id="numSIP" name="numSIP" class="form-control" data-mask="SIP-9999?9999" placeholder="Número de registro del proyecto SIP" value="<?php if(isset($alumno)) {echo $alumno["SIP_REGISTRO"];} ?>" />
						</div>
						<div class="form-group col-sm-8">
							<label>Escuela<span class="form-text">*</span>:</label>
							<select id="escuelaSIP" name="escuelaSIP" class="form-control">
								<option value="">Selecciona</option>
								<?php
								foreach ( $escuelas as $val ) {
								?>
								<option <?php if ( isset($alumno) && $alumno["SIP_ESCUELA"] == $val->ID ) {echo 'selected="selected"'; } ?> value="<?php echo $val->ID; ?>"><?php echo $val->NOMBRE_CORTO; ?></option>
								<?php
								}
								?>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-12">
							<label>Director del proyecto<span class="form-text">*</span>:</label>
							<input type="text" id="directorSIP" name="directorSIP" class="form-control" placeholder="Ingresa el nombre del director del proyecto SIP" value="<?php if(isset($alumno)) {echo $alumno["SIP_DIRECTOR"];} ?>" />
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
			}
		?>
		
		
		<div role="tabpanel" class="tab-pane" id="grados">
			<div class="row">
				<div class="form-group col-sm-12">
					<label>Nivel licenciatura:</label>
					<input type="text" id="nLicenciatura" name="nLicenciatura" class="form-control" placeholder='Ingresa las carreras separadas por comas, Ej: "en Economía, Ing. Industrial"' value="<?php if(isset($nivel_lic)) {echo $nivel_lic["NOMBRE"];} ?>" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-12">
					<label>Nivel maestría:</label>
					<input type="text" id="nMaestria" name="nMaestria" class="form-control" placeholder='Ingresa las carreras separadas por comas, Ej: "en Computación"' value="<?php if(isset($nivel_maes)) {echo $nivel_maes["NOMBRE"];} ?>" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-12">
					<label>Nivel doctorado:</label>
					<input type="text" id="nDoctorado" name="nDoctorado" class="form-control" placeholder='Ingresa las carreras separadas por comas, Ej: "en Ciencias Marinas"' value="<?php if(isset($nivel_dr)) {echo $nivel_dr["NOMBRE"];} ?>" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-12">
					<label>Otros estudios:</label>
					<input type="text" id="nOtros" name="nOtros" class="form-control" placeholder="Si no cuentas con algún nivel, deja en blanco" value="<?php if(isset($nivel_otro)) {echo $nivel_otro;} ?>" />
				</div>
			</div>
		</div>
		
		<?php
			if ( $perfil == "1") {  // Profesor
		?>
		<div role="tabpanel" class="tab-pane" id="productividad">
			<p>A continuación, ingresa el total de direcciones de tesis concluidas 
				en <?php echo date('Y')-1; ?> y <?php echo date('Y'); ?> por nivel, 
				seguido de cuantas de estas están concluidas y cuantas son institucionales</p>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h5 class="panel-title">Direcciones de tesis de licenciatura:</h5>
				</div>
				<div class="panel-body form-horizontal">
					<div class="form-group col-sm-4">
						<label class="col-sm-8 control-label">Concluidas:</label>
						<div class="col-sm-4">
							<input type="text" id="cTLicenciatura" name="cTLicenciatura" maxlength="3" class="form-control text-center" placeholder="0" value="<?php if(isset($dirLic)) {echo $dirLic["CONCLUIDAS"];} ?>" />
						</div>
					</div>
					<div class="form-group col-sm-4">
						<label class="col-sm-8 control-label">Institucionales:</label>
						<div class="col-sm-4">
							<input type="text" id="iTLicenciatura" name="iTLicenciatura" maxlength="3" class="form-control text-center" placeholder="0" value="<?php if(isset($dirLic)) {echo $dirLic["INTERNAS"];} ?>" />
						</div>
					</div>
					<div class="form-group col-sm-4">
						<label class="col-sm-8 control-label">Total:</label>
						<div class="col-sm-4">
							<input type="text" id="tTLicenciatura" name="tTLicenciatura" readonly="readonly" class="form-control text-center" placeholder="0" value="<?php if(isset($dirLic)) {echo $dirLic["TOTAL"];} ?>" />
						</div>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h5 class="panel-title">Direcciones de tesis de maestría:</h5>
				</div>
				<div class="panel-body form-horizontal">
					<div class="form-group col-sm-4">
						<label class="col-sm-8 control-label">Concluidas:</label>
						<div class="col-sm-4">
							<input type="text" id="cTMaestria" name="cTMaestria" maxlength="3" class="form-control text-center" placeholder="0" value="<?php if(isset($dirMaes)) {echo $dirMaes["CONCLUIDAS"];} ?>" />
						</div>
					</div>
					<div class="form-group col-sm-4">
						<label class="col-sm-8 control-label">Institucionales:</label>
						<div class="col-sm-4">
							<input type="text" id="iTMaestria" name="iTMaestria" maxlength="3" class="form-control text-center" placeholder="0" value="<?php if(isset($dirMaes)) {echo $dirMaes["INTERNAS"];} ?>" />
						</div>
					</div>
					<div class="form-group col-sm-4">
						<label class="col-sm-8 control-label">Total:</label>
						<div class="col-sm-4">
							<input type="text" id="tTMaestria" name="tTMaestria" readonly="readonly" class="form-control text-center" placeholder="0" value="<?php if(isset($dirMaes)) {echo $dirMaes["TOTAL"];} ?>" />
						</div>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h5 class="panel-title">Direcciones de tesis de doctorado:</h5>
				</div>
				<div class="panel-body form-horizontal">
					<div class="form-group col-sm-4">
						<label class="col-sm-8 control-label">Concluidas:</label>
						<div class="col-sm-4">
							<input type="text" id="cTDoctorado" name="cTDoctorado" maxlength="3" class="form-control text-center" placeholder="0" value="<?php if(isset($dirDoc)) {echo $dirDoc["CONCLUIDAS"];} ?>" />
						</div>
					</div>
					<div class="form-group col-sm-4">
						<label class="col-sm-8 control-label">Institucionales:</label>
						<div class="col-sm-4">
							<input type="text" id="iTDoctorado" name="iTDoctorado" maxlength="3" class="form-control text-center" placeholder="0" value="<?php if(isset($dirDoc)) {echo $dirDoc["INTERNAS"];} ?>" />
						</div>
					</div>
					<div class="form-group col-sm-4">
						<label class="col-sm-8 control-label">Total:</label>
						<div class="col-sm-4">
							<input type="text" id="tTDoctorado" name="tTDoctorado" readonly="readonly" class="form-control text-center" placeholder="0" value="<?php if(isset($dirDoc)) {echo $dirDoc["TOTAL"];} ?>" />
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-4">
					<label>Nivel de materias impartidas<span class="form-text">*</span>: <span class="icon-infocircle" data-toggle="tooltip" title="Selecciona el nivel académicos correspondiente a las materias que impartes"></span></label>
					<select id="materiasImp" name="materiasImp" class="form-control">
						<option value="">Selecciona</option>
						<?php
						foreach ( $niveles_academicos as $val ) {
						?>
						<option <?php if(isset($profesor) && $profesor["NIVEL_ACADEMICO"] == $val->ID) {echo 'selected="selected"';} ?>" value="<?php echo $val->ID; ?>"><?php echo $val->NOMBRE; ?></option>
						<?php
						}
						?>
					</select>
				</div>
				<div class="form-group col-sm-4">
					<label>Publicaciones nacionales<span class="form-text">*</span>: <span class="icon-infocircle" data-toggle="tooltip" title="Selecciona el número de publicaciones nacionales realizadas"></span></label>
					<select id="publNacionales" name="publNacionales" class="form-control">
						<option value="">Selecciona</option>
						<?php
						for ( $i=0; $i<=50; $i++) {
						?>
						<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
						<?php
						}
						?>
					</select>
				</div>
				<div class="form-group col-sm-4">
					<label>Publicaciones internacionales<span class="form-text">*</span>: <span class="icon-infocircle" data-toggle="tooltip" title="Selecciona el número de publicaciones internacionales realizadas"></span></label>
					<select id="publInt" name="publInt" class="form-control">
						<option value="">Selecciona</option>
						<?php
						for ( $i=0; $i<=50; $i++) {
						?>
						<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
						<?php
						}
						?>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-12">
					<label>Unidades de aprendizaje impartidas en el instituto<span class="form-text">*</span>:</label>
					<input type="text" id="unidAprendizaje" name="unidAprendizaje" maxlength="100" class="form-control" placeholder='Ingresa materias separadas por comas, Ej. "Economía, Bases de datos, Cálculo"' value="<?php if(isset($materias)) {echo $materias;} ?>" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-12">
					<label>Patentes y/o publicaciones de libros: <span class="icon-infocircle" data-toggle="tooltip" title="Ingresa, si consideras tener más productividad, la descripción y año del producto, sepáralos por coma (,) y por cada diferente producto inicia en una nueva línea; ejemplo:&#010;Producto uno, YYYY (representa el año)&#010;Producto dos, YYYY"></span></label>
					<textarea id="patentes" name="patentes" rows="5" class="form-control" placeholder="Ingresa, si consideras tener más productividad, la descripción y año del producto, sepáralos por coma (,) y por cada diferente producto inicia en una nueva línea; ejemplo:\nProducto uno, YYYY (representa el año)\nProducto dos, YYYY"></textarea>
				</div>
			</div>
		</div>
		<?php
			}
		?>
		
		<?php
			if ( $perfil == "1") {  // Profesor
		?>
		<div role="tabpanel" class="tab-pane" id="proyectos">
			<div class="panel-group ficha-collapse" id="accordion6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
						<a data-parent="#accordion6" data-toggle="collapse" href="#panel-6" aria-expanded="true" aria-controls="panel-6">
							Proyecto <?php if(date('m')>=10) {echo date('Y')+1;} else {echo date('Y');} ?>
						</a>
						</h4>
						<button type="button" class="collpase-button" data-parent="#accordion6" data-toggle="collapse" href="#panel-6"></button>
					</div>
				</div>
				<div class="panel-collapse collapse in" id="panel-6">
					<div class="panel-body">
						<div class="row">
							<div class="form-group col-sm-4">
								<label>Tipo de proyecto:</label>
								<select id="tipoProyecto6" name="tipoProyecto[]" class="form-control tipoProy">
									<option value="">Selecciona</option>
									<option value="SIP">SIP</option>
									<option value="CONACYT">CONACYT</option>
									<option value="Otros">Otros</option>
								</select>
							</div>
							<div class="form-group col-sm-4">
								<label>Especifica el tipo de proyecto:</label>
								<input type="text" id="espTP6" name="espTP[]" class="form-control otro" disabled="disabled" placeholder='Especifica si el tipo de proyecto es "Otros"' />
							</div>
							<div class="form-group col-sm-4">
								<label>Número de registro:</label>
								<input type="text" id="registro6" name="registro[]" class="form-control" placeholder="Ingresa el número de registro del proyecto" />
							</div>
						</div>
						<div class="row">
							<div class="form-group col-sm-4">
								<label>Tipo de participación:</label>
								<select id="tParticipacion6" name="tParticipacion[]" class="form-control">
									<option value="">Selecciona</option>
									<?php
									foreach ( $tipos_participacion as $val ) {
									?>
									<option value="<?php echo $val->ID; ?>"><?php echo $val->DESCRIPCION; ?></option>
									<?php
									}
									?>
								</select>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="panel-group ficha-collapse" id="accordion7">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
						<a data-parent="#accordion7" data-toggle="collapse" href="#panel-7" aria-expanded="true" aria-controls="panel-7">
							Proyecto <?php if(date('m')>=10) {echo date('Y');} else {echo (date('Y')-1);} ?>
						</a>
						</h4>
						<button type="button" class="collpase-button collapsed" data-parent="#accordion7" data-toggle="collapse" href="#panel-7"></button>
					</div>
					<div class="panel-collapse collapse" id="panel-7">
						<div class="panel-body">
							<div class="row">
								<div class="form-group col-sm-4">
									<label>Tipo de proyecto:</label>
									<select id="tipoProyecto7" name="tipoProyecto[]" class="form-control tipoProy">
										<option value="">Selecciona</option>
										<option value="SIP">SIP</option>
										<option value="CONACYT">CONACYT</option>
										<option value="Otros">Otros</option>
									</select>
								</div>
								<div class="form-group col-sm-4">
									<label>Especifica el tipo de proyecto:</label>
									<input type="text" id="espTP7" name="espTP[]" class="form-control otro" disabled="disabled" placeholder='Especifica si el tipo de proyecto es "Otros"' />
								</div>
								<div class="form-group col-sm-4">
									<label>Número de registro:</label>
									<input type="text" id="registro7" name="registro[]" class="form-control" placeholder="Ingresa el número de registro del proyecto" />
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-4">
									<label>Tipo de participación:</label>
									<select id="tParticipacion7" name="tParticipacion[]" class="form-control">
										<option value="">Selecciona</option>
										<?php
										foreach ( $tipos_participacion as $val ) {
										?>
										<option value="<?php echo $val->ID; ?>"><?php echo $val->DESCRIPCION; ?></option>
										<?php
										}
										?>
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="panel-group ficha-collapse" id="accordion8">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
						<a data-parent="#accordion8" data-toggle="collapse" href="#panel-8" aria-expanded="true" aria-controls="panel-8">
							Proyecto <?php if(date('m')>=10) {echo (date('Y')-1);} else {echo (date('Y')-2);} ?>
						</a>
						</h4>
						<button type="button" class="collpase-button collapsed" data-parent="#accordion8" data-toggle="collapse" href="#panel-8"></button>
					</div>
					<div class="panel-collapse collapse" id="panel-8">
						<div class="panel-body">
							<div class="row">
								<div class="form-group col-sm-4">
									<label>Tipo de proyecto:</label>
									<select id="tipoProyecto8" name="tipoProyecto[]" class="form-control tipoProy">
										<option value="">Selecciona</option>
										<option value="SIP">SIP</option>
										<option value="CONACYT">CONACYT</option>
										<option value="Otros">Otros</option>
									</select>
								</div>
								<div class="form-group col-sm-4">
									<label>Especifica el tipo de proyecto:</label>
									<input type="text" id="espTP8" name="espTP[]" class="form-control otro" disabled="disabled" placeholder='Especifica si el tipo de proyecto es "Otros"' />
								</div>
								<div class="form-group col-sm-4">
									<label>Número de registro:</label>
									<input type="text" id="registro8" name="registro[]" class="form-control" placeholder="Ingresa el número de registro del proyecto" />
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-4">
									<label>Tipo de participación:</label>
									<select id="tParticipacion8" name="tParticipacion[]" class="form-control">
										<option value="">Selecciona</option>
										<?php
										foreach ( $tipos_participacion as $val ) {
										?>
										<option value="<?php echo $val->ID; ?>"><?php echo $val->DESCRIPCION; ?></option>
										<?php
										}
										?>
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
			}
		?>
		
		<div role="tabpanel" class="tab-pane" id="bancarios">
			<div class="row">
				<div class="form-group col-sm-4">
					<label>Banco<span class="form-text">*</span>:</label>
					<input type="text" id="banco" name="banco" class="form-control" placeholder="Ingresa el nombre del banco" value="<?php if(isset($persona)) {echo $persona["BANCO_NOMBRE"];} ?>" />
				</div>
				<div class="form-group col-sm-4">
					<label>Número de sucursal<span class="form-text">*</span>:</label>
					<input type="text" id="sucursal" name="sucursal" class="form-control" placeholder="Ingresa el número de sucursal" value="<?php if(isset($persona)) {echo $persona["BANCO_SUCURSAL"];} ?>" />
				</div>
				<div class="form-group col-sm-4">
					<label>Número de cuenta<span class="form-text">*</span>:</label>
					<input type="text" id="cuentaBanco" name="cuentaBanco" maxlength="15" class="form-control" placeholder="Ingresa tu número de cuenta" value="<?php if(isset($persona)) {echo $persona["BANCO_CUENTA"];} ?>" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-4">
					<label>Cuenta CLABE<span class="form-text">*</span>: <span class="icon-infocircle" data-toggle="tooltip" title="Ingresa la Clave Bancaria Estandarizada"></span></label>
					<input type="text" id="clabe" name="clabe" class="form-control" data-mask="999 999 99999999999 9" placeholder="Ingresa la CLABE interbancaria" value="<?php if(isset($persona)) {echo $persona["BANCO_CLABE"];} ?>" />
				</div>
			</div>
		</div>
		<div class="row">
				<div class="form-group col-sm-2 pull-right">
					<button id="btnGuardar" type="submit" class="btn btn-block btn-primary">Guardar</button>
				</div>
			</div>
	</div>
</form>