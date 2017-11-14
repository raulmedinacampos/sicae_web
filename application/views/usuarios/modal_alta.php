<!-- Modal alta nuevo usuario -->
<div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<form id="formNuevo" name="formNuevo" method="post" action="<?php echo base_url('usuario/agregar'); ?>">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Registro de usuario nuevo</h4>
				</div>
				<div class="modal-body">
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane active" id="perfil">
							<p>El registro único es un formulario que nos permitirá introducir 
								nuestra información más relevante para la solicitud de apoyo económico.</p>
							<p>Pasos para capturar correctamente la información:</p>
							<ol>
								<li>Seleccionar el tipo de usuario (profesor/alumno). Dar click en siguiente.</li>
								<li>Llenar inicialmente la pantalla "Registro de usuario nuevo". Dar click en guardar.</li>
								<li>Posteriormente se habilitarán las pestañas de Información Personal, Datos Escolares, Grados Académicos y Datos Bancarios. Al finalizar la captura de la información deberá dar click en guardar.</li>
								<li>Los campos marcados con (*) son obligatorios.</li>
								<li>Si no se captura correctamente un dato o existe algún error se desplegará un mensaje indicando que hay campos pendientes de llenar.</li>
								<li>Una vez hecho el registro como nuevo usuario no podrán registrarse nuevamente.</li>
							</ol>
							<div class="row">
								<div class="form-group col-sm-12 text-center">
									<h4 class="tipo-perfil">Selecciona tu tipo de usuario*</h4>
									<label class="radio-perfil">
										<input type="radio" name="rPerfil" id="rProfesor" value="1" />
										<div class="profesor"></div>
										<span>Profesor</span>
									</label>
									<label class="radio-perfil">
										<input type="radio" name="rPerfil" id="rAlumno" value="3" />
										<div class="alumno"></div>
										<span>Alumno</span>
									</label>
								</div>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane" id="registro">
							<div class="row">
								<div class="form-group col-sm-6">
									<label>CURP<span class="form-text">*</span>: <span class="icon-infocircle" data-toggle="tooltip" title="Clave Única de Registro de Población"></span></label>
									<a href="https://renapo.gob.mx/swb/swb/RENAPO/consultacurp" target="_blank"><small>Consulta tu CURP</small></a>
									<input type="text" id="curp" name="curp" maxlength="18" class="form-control" placeholder="Ingresa tu CURP" />
								</div>
								<div class="form-group col-sm-6">
									<label>Nombre(s)<span class="form-text">*</span>:</label>
									<input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingresa tu nombre" />
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-6">
									<label>Primer apellido<span class="form-text">*</span>:</label>
									<input type="text" id="apPaterno" name="apPaterno" class="form-control" placeholder="Ingresa tu primer apellido" />
								</div>
								<div class="form-group col-sm-6">
									<label>Segundo apellido:</label>
									<input type="text" id="apMaterno" name="apMaterno" class="form-control" placeholder="Ingresa tu segundo apellido" />
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-6">
									<div class="datepicker-group">
										<label>Fecha de nacimiento<span class="form-text">*</span>:</label>
										<input type="text" id="fechaNac" name="fechaNac" class="form-control" data-mask="99/99/9999" placeholder="Fecha de nacimiento (dd/mm/aaaa)" />
										<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
									</div>
								</div>
								<div class="form-group col-sm-6">
									<label>RFC<span class="form-text">*</span>: <span class="icon-infocircle" data-toggle="tooltip" title="Registro Federal de Contribuyentes"></span></label>
									<input type="text" id="rfc" name="rfc" maxlength="13" class="form-control" placeholder="Ingresa tu RFC" />
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-6">
									<label>Sexo<span class="form-text">*</span>:</label>
									<div>
										<label class="radio-inline">
											<input id="rdbH" name="sexo" value="M" type="radio" /> Hombre
										</label>
										<label class="radio-inline">
											<input id="rdbM" name="sexo" value="F" type="radio" /> Mujer
										</label>
									</div>
								</div>
								<div class="form-group col-sm-6">
									<label>Nacionalidad<span class="form-text">*</span>:</label>
									<div>
										<label class="radio-inline">
											<input id="rdbMex" name="nacionalidad" value="Mexicano" type="radio" /> Mexicano
										</label>
										<label class="radio-inline">
											<input id="rdbExt" name="nacionalidad" value="Extranjero" type="radio" /> Extranjero
										</label>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-6">
									<label>Correo electrónico<span class="form-text">*</span>:</label>
									<input type="text" id="email" name="email" class="form-control" placeholder="ejemplo@dominio.com" />
								</div>
								<div class="form-group col-sm-6">
									<label>Confirmar correo electrónico<span class="form-text">*</span>:</label>
									<input type="text" id="emailConf" name="emailConf" class="form-control" placeholder="ejemplo@dominio.com" />
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-6">
									<label>Teléfono fijo<span class="form-text">*</span>:</label>
									<input type="text" id="telefono" name="telefono" maxlength="15" class="form-control" placeholder="Teléfono fijo (lada + teléfono)" />
								</div>
								<div class="form-group col-sm-3">
									<label>Extensión<span class="form-text">*</span>:</label>
									<input type="text" id="extension" name="extension" maxlength="5" class="form-control" placeholder="Extensión" />
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
										<option value="<?php echo $val->ID; ?>"><?php echo $val->NOMBRE_CORTO; ?></option>
										<?php
										}
										?>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-6">
									<label>Contraseña<span class="form-text">*</span>:</label>
									<input type="password" id="password" name="password" maxlength="8" class="form-control" placeholder="Ingresa una contraseña" />
								</div>
								<div class="form-group col-sm-6">
									<label>Confirmar contraseña<span class="form-text">*</span>:</label>
									<input type="password" id="passwordConf" name="passwordConf" maxlength="8" class="form-control" placeholder="Confirma la contraseña" />
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" id="btnCancelar" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<button type="button" id="btnAnterior" class="btn btn-primary">Anterior</button>
					<button type="button" id="btnSiguiente" class="btn btn-primary">Siguiente</button>
					<button type="submit" id="btnGuardar" class="btn btn-primary">Guardar</button>
				</div>
			</div>
		</form>
	</div>
</div>