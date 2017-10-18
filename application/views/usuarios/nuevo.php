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
					<label class="obligatorio">CURP:</label>
					<input type="text" id="curp" name="curp" maxlength="18" class="form-control" placeholder="Ingresa tu CURP" value="<?php if(isset($persona)) {echo $persona["CURP"];} ?>" />
				</div>
				<div class="form-group col-sm-4">
					<label class="obligatorio">RFC:</label>
					<input type="text" id="rfc" name="rfc" maxlength="13" class="form-control" placeholder="Ingresa tu RFC" value="<?php if(isset($persona)) {echo $persona["RFC"];} ?>" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-4">
					<label class="obligatorio">Nombre(s):</label>
					<input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingresa tu nombre" value="<?php if(isset($persona)) {echo $persona["NOMBRE"];} ?>" />
				</div>
				<div class="form-group col-sm-4">
					<label class="obligatorio">Primer apellido:</label>
					<input type="text" id="apPaterno" name="apPaterno" class="form-control" placeholder="Ingresa tu primer apellido" value="<?php if(isset($persona)) {echo $persona["APELLIDO_P"];} ?>" />
				</div>
				<div class="form-group col-sm-4">
					<label class="obligatorio">Segundo apellido:</label>
					<input type="text" id="apMaterno" name="apMaterno" class="form-control" placeholder="Ingresa tu segundo apellido" value="<?php if(isset($persona)) {echo $persona["APELLIDO_M"];} ?>" />
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
					<label class="obligatorio">Nacionalidad:</label>
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
						<label class="obligatorio">Fecha de nacimiento:</label>
						<input type="text" id="fechaNac" name="fechaNac" class="datepicker form-control" data-mask="99/99/9999" placeholder="Fecha de nacimiento" value="<?php if(isset($persona)) {echo $persona["FECHA_NACIMIENTO"];} ?>" />
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
					<input type="text" id="telefono" name="telefono" maxlength="15" class="form-control" data-mask="9999999" value="<?php if(isset($persona)) {echo $persona["TELEFONO"];} ?>" placeholder="Teléfono fijo" />
				</div>
				<div class="form-group col-sm-2">
					<label class="obligatorio">Extensión:</label>
					<input type="text" id="extension" name="extension" maxlength="5" class="form-control" data-mask="99999" value="<?php if(isset($persona)) {echo $persona["EXTENSION"];} ?>" placeholder="Extensión" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-4">
					<label class="obligatorio">Correo electrónico:</label>
					<input type="text" id="email" name="email" class="form-control" placeholder="Email para recibir notificación de dictamen" value="<?php if(isset($persona)) {echo $persona["EMAIL"];} ?>" />
				</div>
				<div class="form-group col-sm-4">
					<label class="obligatorio">Confirmar correo electrónico:</label>
					<input type="text" id="emailConf" name="emailConf" class="form-control" placeholder="Confirma el correo electrónico" value="<?php if(isset($persona)) {echo $persona["EMAIL"];} ?>" />
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
				<div class="form-group col-sm-4">
					<label>Contraseña:</label>
					<input type="password" id="password" name="password" class="form-control" placeholder="<?php if(isset($persona)) {echo 'Nueva contraseña';} else {echo 'Ingresa una contraseña';} ?>" />
				</div>
				<div class="form-group col-sm-4">
					<label>Confirmar contraseña:</label>
					<input type="password" id="passwordConf" name="passwordConf" class="form-control" placeholder="<?php if(isset($persona)) {echo 'Confirma la nueva contraseña';} else {echo 'Confirma la contraseña';} ?>" />
				</div>
			</div>
		</div>
		<div role="tabpanel" class="tab-pane" id="profesor">
			<div class="row">
				<div class="form-group col-sm-4">
					<label>Tipo de nombramiento</label>
					<select id="tipoNombramiento" name="tipoNombramiento" class="form-control">
						<option value="">Selecciona tu tipo de nombramiento</option>
						<?php
						foreach ( $nombramientos as $val ) {
						?>
						<option <?php if ( isset($profesor) ) {echo 'selected="selected"'; } ?> value="<?php echo $val->ID; ?>"><?php echo $val->DESCRIPCION; ?></option>
						<?php
						}
						?>
					</select>
				</div>
				<div class="form-group col-sm-4">
					<label>Número de empleado</label>
					<input type="text" id="numEmpleado" name="numEmpleado" class="form-control" placeholder="Ingresa tu número de empleado" />
				</div>
				<div class="form-group col-sm-4">
					<div class="datepicker-group">
						<label>Fecha de ingreso</label>
						<input type="text" id="fechaIngreso" name="fechaIngreso" class="datepicker form-control" data-mask="99/99/9999" placeholder="Fecha de ingreso" />
						<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-12">
					<label>¿Fuiste contratado dentro del Personal Académico Extraordinario?</label>
					<div>
						<label class="radio-inline">
							<input type="radio" id="rdbES" name="excelencia" <?php if ( isset($profesor) && $persona["GENERO"] == "M" ) {echo 'checked="checked"'; } ?> value="1" /> Sí
						</label>
						<label class="radio-inline">
							<input type="radio" id="rdbEN" name="excelencia" <?php if ( isset($profesor) && $persona["GENERO"] == "F" ) {echo 'checked="checked"'; } ?> value="0" /> No
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
										<label>Fecha en que obtuviste la base</label>
										<input type="text" id="fechaBase" name="fechaBase" class="datepicker form-control" data-mask="99/99/9999" placeholder="Fecha en que obtuvo la base" />
										<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
									</div>
								</div>
								<div class="form-group col-sm-4">
									<label>Categoría</label>
									<input type="text" id="categoria" name="categoria" class="form-control" placeholder="Ingresa tu categoría" />
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-4">
									<label>Plaza</label>
									<input type="text" id="plaza" name="plaza" class="form-control" placeholder="Ingresa tu plaza" />
								</div>
								<div class="form-group col-sm-4">
									<label>Horas de plaza</label>
									<select id="horas" name="horas" class="form-control">
										<option value="">Selecciona el número de horas</option>
										<option value="20">20</option>
										<option value="30">30</option>
										<option value="40">40</option>
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
										<label>Fecha de inicio de interinato</label>
										<input type="text" id="FechaInicioInt" name="FechaInicioInt" class="datepicker form-control" data-mask="99/99/9999" placeholder="Fecha de inicio" />
										<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
									</div>
								</div>
								<div class="form-group col-sm-4">
									<div class="datepicker-group">
										<label>Fecha de término de interinato</label>
										<input type="text" id="FechaFinInt" name="FechaFinInt" class="datepicker form-control" data-mask="99/99/9999" placeholder="Fecha de término" />
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
					<label>¿Cuentas con sabático?</label>
					<div>
						<label class="radio-inline">
							<input type="radio" id="rdbES" name="sabatico" <?php if ( isset($profesor) && $persona["GENERO"] == "M" ) {echo 'checked="checked"'; } ?> value="1" /> Sí
						</label>
						<label class="radio-inline">
							<input type="radio" id="rdbEN" name="sabatico" <?php if ( isset($profesor) && $persona["GENERO"] == "F" ) {echo 'checked="checked"'; } ?> value="0" /> No
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
									<label>Tipo de sabático</label>
									<select id="tipoSabatico" name="tipoSabatico" class="form-control">
										<option value="">Seleccione una opción</option>
									</select>
								</div>
								<div class="form-group col-sm-4">
									<div class="datepicker-group">
										<label>Fecha de inicio de sabático</label>
										<input type="text" id="fechaInicioSab" name="fechaInicioSab" class="datepicker form-control" data-mask="99/99/9999" placeholder="dd/mm/aaaa" />
										<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
									</div>
								</div>
								<div class="form-group col-sm-4">
									<div class="datepicker-group">
										<label>Fecha de término de sabático</label>
										<input type="text" id="fechaFinSab" name="fechaFinSab" class="datepicker form-control" data-mask="99/99/9999" placeholder="dd/mm/aaaa" />
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
					<label>¿Cuenta con licencia con goce de sueldo?</label>
					<div>
						<label class="radio-inline">
							<input type="radio" id="rdbSS" name="sueldo" <?php if ( isset($profesor) && $persona["GENERO"] == "M" ) {echo 'checked="checked"'; } ?> value="1" /> Sí
						</label>
						<label class="radio-inline">
							<input type="radio" id="rdbSN" name="sueldo" <?php if ( isset($profesor) && $persona["GENERO"] == "F" ) {echo 'checked="checked"'; } ?> value="0" /> No
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
										<label>Fecha de inicio del periodo</label>
										<input type="text" id="fechaInicioGoce" name="fechaInicioGoce" class="datepicker form-control" data-mask="99/99/9999" placeholder="dd/mm/aaaa" />
										<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
									</div>
								</div>
								<div class="form-group col-sm-4">
									<div class="datepicker-group">
										<label>Fecha de término del periodo</label>
										<input type="text" id="fechaFinGoce" name="fechaFinGoce" class="datepicker form-control" data-mask="99/99/9999" placeholder="dd/mm/aaaa" />
										<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-4">
									<label>¿Cuenta usted con prórroga?</label>
									<div>
										<label class="radio-inline">
											<input type="radio" id="rdbSS" name="prorroga" <?php if ( isset($profesor) && $persona["GENERO"] == "M" ) {echo 'checked="checked"'; } ?> value="1" /> Sí
										</label>
										<label class="radio-inline">
											<input type="radio" id="rdbSN" name="prorroga" <?php if ( isset($profesor) && $persona["GENERO"] == "F" ) {echo 'checked="checked"'; } ?> value="0" /> No
										</label>
									</div>
								</div>
								<div class="form-group col-sm-4">
									<div class="datepicker-group">
										<label>Fecha de inicio de prórroga</label>
										<input type="text" id="fechaInicioProrroga" name="fechaInicioProrroga" class="datepicker form-control" data-mask="99/99/9999" placeholder="dd/mm/aaaa" />
										<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
									</div>
								</div>
								<div class="form-group col-sm-4">
									<div class="datepicker-group">
										<label>Fecha de término de prórroga</label>
										<input type="text" id="fechaFinProrroga" name="fechaFinProrroga" class="datepicker form-control" data-mask="99/99/9999" placeholder="dd/mm/aaaa" />
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
								<div class="form-group col-sm-6">
									<label>¿Es becario EDD?</label>
									<select id="edd" name="edd" class="form-control">
										<option value="">Selecciona tu situación</option>
										<option value="0">No soy becario EDD</option>
										<?php
										for ( $i=1; $i<10; $i++ ) {
										?>
										<option value="<?php echo $i; ?>"><?php echo "Nivel ".$i; ?></option>
										<?php
										}
										?>
									</select>
								</div>
								<div class="form-group col-sm-6">
									<label>¿Es becario por exclusividad?</label>
									<select id="exclusividad" name="exclusividad" class="form-control">
										<option value="">Selecciona tu situación</option>
										<option value="0">No soy becario por exclusividad</option>
										<?php
										for ( $i=1; $i<4; $i++ ) {
										?>
										<option value="<?php echo $i; ?>"><?php echo "Nivel ".$i; ?></option>
										<?php
										}
										?>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-6">
									<label>¿Es becario EDI?</label>
									<select id="edi" name="edi" class="form-control">
										<option value="">Selecciona tu situación</option>
										<option value="0">No soy becario EDI</option>
										<?php
										for ( $i=1; $i<10; $i++ ) {
										?>
										<option value="<?php echo $i; ?>"><?php echo "Nivel ".$i; ?></option>
										<?php
										}
										?>
									</select>
								</div>
								<div class="form-group col-sm-6">
									<label>¿Es becario SNI?</label>
									<select id="sni" name="sni" class="form-control">
										<option value="">Selecciona tu situación</option>
										<option value="0">No soy becario SNI</option>
										<option value="1">Investigador 1er nivel</option>
										<option value="2">Investigador 2do nivel</option>
										<option value="3">Investigador 3er nivel</option>
										<option value="4">Candidato</option>
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div role="tabpanel" class="tab-pane" id="alumno">
			<div class="row">
				<div class="form-group col-sm-3">
					<label class="obligatorio">Boleta:</label>
					<input type="text" id="boleta" name="boleta" class="form-control" placeholder="Ingresa tu número de boleta" />
				</div>
				<div class="form-group col-sm-3">
					<label class="obligatorio">Semestre:</label>
					<input type="text" id="semestre" name="semestre" class="form-control" placeholder="Ingresa el semestre que cursas actualmente" />
				</div>
				<div class="form-group col-sm-3">
					<label class="obligatorio">Promedio:</label>
					<input type="text" id="promedio" name="promedio" class="form-control" placeholder="Ingresa tu promedio con dos decimales" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-6">
					<label class="obligatorio">Las materias que cursas actualmente son de:</label>
					<select id="materiasCursa" name="materiasCursa" class="form-control">
						<option value="">Selecciona el nivel que cursas</option>
						<?php
						foreach ( $niveles_academicos as $val ) {
						?>
						<option value="<?php echo $val->ID; ?>"><?php echo $val->NOMBRE; ?></option>
						<?php
						}
						?>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-3">
					<label class="obligatorio">¿Eres becario BEIFI?</label>
					<div>
						<label class="radio-inline">
							<input type="radio" id="pifiS" name="pifi" <?php if ( isset($alumno) && $alumno["PIFI"] == "1" ) {echo 'checked="checked"'; } ?> value="1" /> Sí
						</label>
						<label class="radio-inline">
							<input type="radio" id="pifiN" name="pifi" <?php if ( isset($alumno) && $alumno["PIFI"] == "0" ) {echo 'checked="checked"'; } ?> value="0" /> No
						</label>
					</div>
				</div>
				<div class="form-group col-sm-3">
					<label class="obligatorio">¿Eres becario CONACYT?</label>
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
							<label class="obligatorio">Número de registro:</label>
							<input type="text" id="numSIP" name="numSIP" class="form-control" placeholder="Ingresa el número de registro del proyecto SIP" />
						</div>
						<div class="form-group col-sm-8">
							<label class="obligatorio">Nombre del proyecto:</label>
							<input type="text" id="nombreSIP" name="nombreSIP" class="form-control" placeholder="Ingresa el nombre del proyecto SIP" />
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-6">
							<label class="obligatorio">Escuela:</label>
							<select id="escuelaSIP" name="escuelaSIP" class="form-control">
								<option value="">Selecciona la escuela en donde está inscrito el proyecto SIP</option>
								<?php
								foreach ( $escuelas as $val ) {
								?>
								<option value="<?php echo $val->ID; ?>"><?php echo $val->NOMBRE_CORTO; ?></option>
								<?php
								}
								?>
							</select>
						</div>
						<div class="form-group col-sm-6">
							<label class="obligatorio">Director del proyecto:</label>
							<input type="text" id="directorSIP" name="directorSIP" class="form-control" placeholder="Ingresa el nombre del director del proyecto SIP" />
						</div>
					</div>
				</div>
			</div>
		</div>
		<div role="tabpanel" class="tab-pane" id="grados">
			<div class="row">
				<div class="form-group col-sm-12">
					<label>Nivel licenciatura:</label>
					<input type="text" id="nLicenciatura" name="nLicenciatura" class="form-control" placeholder='Ingresa las carreras separadas por comas, Ej: "en Economía, Ing. Industrial"' />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-12">
					<label>Nivel maestría:</label>
					<input type="text" id="nMaestria" name="nMaestria" class="form-control" placeholder='Ingresa las carreras separadas por comas, Ej: "en Computación"' />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-12">
					<label>Nivel doctorado:</label>
					<input type="text" id="nDoctorado" name="nDoctorado" class="form-control" placeholder='Ingresa las carreras separadas por comas, Ej: "en Ciencias Marinas"' />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-12">
					<label>Otros estudios:</label>
					<input type="text" id="nOtros" name="nOtros" class="form-control" placeholder="Si no cuentas con algún nivel, deja en blanco" />
				</div>
			</div>
		</div>
		<div role="tabpanel" class="tab-pane" id="productividad">
			<p>A continuación, ingresa el total de direcciones de tesis concluidas 
				en <?php echo date('Y')-2; ?> y <?php echo date('Y')-1; ?> por nivel, 
				seguido de cuantas de estas están concluidas y cuantas son institucionales</p>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h5 class="panel-title">Direcciones de tesis de licenciatura:</h5>
				</div>
				<div class="panel-body form-horizontal">
					<div class="form-group col-sm-4">
						<label class="col-sm-8 control-label">Total:</label>
						<div class="col-sm-4">
							<input type="text" id="tTLicenciatura" name="tTLicenciatura" maxlength="3" class="form-control text-center" placeholder="0" />
						</div>
					</div>
					<div class="form-group col-sm-4">
						<label class="col-sm-8 control-label">Concluidas:</label>
						<div class="col-sm-4">
							<input type="text" id="cTLicenciatura" name="cTLicenciatura" maxlength="3" class="form-control text-center" placeholder="0" />
						</div>
					</div>
					<div class="form-group col-sm-4">
						<label class="col-sm-8 control-label">Institucionales:</label>
						<div class="col-sm-4">
							<input type="text" id="iTLicenciatura" name="iTLicenciatura" maxlength="3" class="form-control text-center" placeholder="0" />
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
						<label class="col-sm-8 control-label">Total:</label>
						<div class="col-sm-4">
							<input type="text" id="tTMaestria" name="tTMaestria" maxlength="3" class="form-control text-center" placeholder="0" />
						</div>
					</div>
					<div class="form-group col-sm-4">
						<label class="col-sm-8 control-label">Concluidas:</label>
						<div class="col-sm-4">
							<input type="text" id="cTMaestria" name="cTMaestria" maxlength="3" class="form-control text-center" placeholder="0" />
						</div>
					</div>
					<div class="form-group col-sm-4">
						<label class="col-sm-8 control-label">Institucionales:</label>
						<div class="col-sm-4">
							<input type="text" id="iTMaestria" name="iTMaestria" maxlength="3" class="form-control text-center" placeholder="0" />
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
						<label class="col-sm-8 control-label">Total:</label>
						<div class="col-sm-4">
							<input type="text" id="tTDoctorado" name="tTDoctorado" maxlength="3" class="form-control text-center" placeholder="0" />
						</div>
					</div>
					<div class="form-group col-sm-4">
						<label class="col-sm-8 control-label">Concluidas:</label>
						<div class="col-sm-4">
							<input type="text" id="cTDoctorado" name="cTDoctorado" maxlength="3" class="form-control text-center" placeholder="0" />
						</div>
					</div>
					<div class="form-group col-sm-4">
						<label class="col-sm-8 control-label">Institucionales:</label>
						<div class="col-sm-4">
							<input type="text" id="iTDoctorado" name="iTDoctorado" maxlength="3" class="form-control text-center" placeholder="0" />
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-6">
					<label>Las materias que impartes corresponden a:</label>
					<select class="form-control">
						<option value="">Selecciona el nivel que impartes</option>
						<?php
						foreach ( $niveles_academicos as $val ) {
						?>
						<option value="<?php echo $val->ID; ?>"><?php echo $val->NOMBRE; ?></option>
						<?php
						}
						?>
					</select>
				</div>
				<div class="form-group col-sm-6">
					<label>Publicaciones nacionales realizadas:</label>
					<select class="form-control">
						<option value="">Selecciona el número de publicaciones nacionales</option>
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
				<div class="form-group col-sm-6">
					<label>Publicaciones internacionales realizadas:</label>
					<select class="form-control">
						<option value="">Selecciona el número de publicaciones internacionales</option>
						<?php
						for ( $i=0; $i<=50; $i++) {
						?>
						<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
						<?php
						}
						?>
					</select>
				</div>
				<div class="form-group col-sm-6">
					<label>Unidades de aprendizaje impartidas en el instituto:</label>
					<input type="text" id="" name="" class="form-control" placeholder='Ingresa materias separadas por comas, Ej. "Economía, Bases de datos, Cálculo"' />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-12">
					<label>Patentes y/o publicaciones de libros:</label>
					<textarea id="" name="" rows="5" class="form-control" placeholder="Ingresa, si consideras tener más productividad, la descripción y año del producto, sepáralos por coma (,) y por cada diferente producto inicia en una nueva línea; ejemplo:\nProducto uno, YYYY (representa el año)\nProducto dos, YYYY"></textarea>
				</div>
			</div>
		</div>
		<div role="tabpanel" class="tab-pane" id="proyectos">
			<div class="panel-group ficha-collapse" id="accordion6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
						<a data-parent="#accordion6" data-toggle="collapse" href="#panel-6" aria-expanded="true" aria-controls="panel-6">
							Proyecto <?php echo date('Y'); ?>
						</a>
						</h4>
						<button type="button" class="collpase-button" data-parent="#accordion6" data-toggle="collapse" href="#panel-6"></button>
					</div>
				</div>
				<div class="panel-collapse collapse in" id="panel-6">
					<div class="panel-body">
						<div class="row">
							<div class="form-group col-sm-6">
								<label>Tipo de proyecto</label>
								<select id="tipoProyecto6" name="tipoProyecto[]" class="form-control tipoProy">
									<option value="">Selecciona el tipo de proyecto</option>
									<option value="SIP">SIP</option>
									<option value="CONACYT">CONACYT</option>
									<option value="Otros">Otros</option>
								</select>
							</div>
							<div class="form-group col-sm-6">
								<label>Especifica el tipo de proyecto</label>
								<input type="text" id="espTP6" name="espTP[]" class="form-control otro" disabled="disabled" placeholder='Especifica si el tipo de proyecto es "Otros"' />
							</div>
						</div>
						<div class="row">
							<div class="form-group col-sm-6">
								<label>Número de registro</label>
								<input type="text" id="registro6" name="registro[]" class="form-control" placeholder="Ingresa el número de registro del proyecto" />
							</div>
							<div class="form-group col-sm-6">
								<label>Tipo de participacion</label>
								<select id="tParticipacion6" name="tParticipacion[]" class="form-control">
									<option value="">Selecciona la actividad que desempeñaste dentro del proyecto</option>
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
						<div class="row">
							<div class="form-group col-sm-12">
								<label>Nombre del proyecto</label>
								<input type="text" id="proyecto6" name="proyecto[]" class="form-control" placeholder="Ingresa el nombre del proyecto" />
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
							Proyecto <?php echo (date('Y')-1); ?>
						</a>
						</h4>
						<button type="button" class="collpase-button collapsed" data-parent="#accordion7" data-toggle="collapse" href="#panel-7"></button>
					</div>
					<div class="panel-collapse collapse" id="panel-7">
						<div class="panel-body">
							<div class="row">
								<div class="form-group col-sm-6">
									<label>Tipo de proyecto</label>
									<select id="tipoProyecto7" name="tipoProyecto[]" class="form-control tipoProy">
										<option value="">Selecciona el tipo de proyecto</option>
										<option value="SIP">SIP</option>
										<option value="CONACYT">CONACYT</option>
										<option value="Otros">Otros</option>
									</select>
								</div>
								<div class="form-group col-sm-6">
									<label>Especifica el tipo de proyecto</label>
									<input type="text" id="espTP7" name="espTP[]" class="form-control otro" disabled="disabled" placeholder='Especifica si el tipo de proyecto es "Otros"' />
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-6">
									<label>Número de registro</label>
									<input type="text" id="registro7" name="registro[]" class="form-control" placeholder="Ingresa el número de registro del proyecto" />
								</div>
								<div class="form-group col-sm-6">
									<label>Tipo de participacion</label>
									<select id="tParticipacion7" name="tParticipacion[]" class="form-control">
										<option value="">Selecciona la actividad que desempeñaste dentro del proyecto</option>
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
							<div class="row">
								<div class="form-group col-sm-12">
									<label>Nombre del proyecto</label>
									<input type="text" id="proyecto7" name="proyecto[]" class="form-control" placeholder="Ingresa el nombre del proyecto" />
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
							Proyecto <?php echo (date('Y')-2); ?>
						</a>
						</h4>
						<button type="button" class="collpase-button collapsed" data-parent="#accordion8" data-toggle="collapse" href="#panel-8"></button>
					</div>
					<div class="panel-collapse collapse" id="panel-8">
						<div class="panel-body">
							<div class="row">
								<div class="form-group col-sm-6">
									<label>Tipo de proyecto</label>
									<select id="tipoProyecto8" name="tipoProyecto[]" class="form-control tipoProy">
										<option value="">Selecciona el tipo de proyecto</option>
										<option value="SIP">SIP</option>
										<option value="CONACYT">CONACYT</option>
										<option value="Otros">Otros</option>
									</select>
								</div>
								<div class="form-group col-sm-6">
									<label>Especifica el tipo de proyecto</label>
									<input type="text" id="espTP8" name="espTP[]" class="form-control otro" disabled="disabled" placeholder='Especifica si el tipo de proyecto es "Otros"' />
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-6">
									<label>Número de registro</label>
									<input type="text" id="registro8" name="registro[]" class="form-control" placeholder="Ingresa el número de registro del proyecto" />
								</div>
								<div class="form-group col-sm-6">
									<label>Tipo de participacion</label>
									<select id="tParticipacion8" name="tParticipacion[]" class="form-control">
										<option value="">Selecciona la actividad que desempeñaste dentro del proyecto</option>
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
							<div class="row">
								<div class="form-group col-sm-12">
									<label>Nombre del proyecto</label>
									<input type="text" id="proyecto8" name="proyecto[]" class="form-control" placeholder="Ingresa el nombre del proyecto" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div role="tabpanel" class="tab-pane" id="bancarios">
			<div class="row">
				<div class="form-group col-sm-6">
					<label class="obligatorio">Banco:</label>
					<input type="text" id="banco" name="banco" class="form-control" placeholder="Ingresa el nombre del banco" />
				</div>
				<div class="form-group col-sm-6">
					<label class="obligatorio">Número de sucursal:</label>
					<input type="text" id="sucursal" name="sucursal" class="form-control" placeholder="Ingresa el número de sucursal" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-6">
					<label class="obligatorio">Número de cuenta:</label>
					<input type="text" id="cuentaBanco" name="cuentaBanco" maxlength="12" class="form-control" placeholder="Ingresa tu número de cuenta" />
				</div>
				<div class="form-group col-sm-6">
					<label class="obligatorio">CLABE Interbancaria:</label>
					<input type="text" id="clabe" name="clabe" maxlength="18" class="form-control" data-mask="999 999 99999999999 9" placeholder="Ingresa la CLABE interbancaria (18 dígitos)" />
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