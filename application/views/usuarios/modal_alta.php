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
								<li>Identificar las ocho pestañas que están contenidas en el formulario.</li>
								<li>Los campos que inicien con (*) son obligatorios, el resto pueden quedar vacíos.</li>
								<li>Llenar inicialmente la pestaña "Información Personal" (cuando termine ésta, se habilitarán las pestañas restantes según sea el caso).</li>
								<li>Llenar las pestañas habilitadas posteriores.</li>
								<li>Los campos incorrectos son iluminados de rojo, puede posicionar el cursor sobre el icono y mostrará cómo se debe llenar.</li>
								<li>Cuando esté completamente seguro de lo capturado, de click al botón "Enviar datos".</li>
								<li>Si al enviar los datos recibe la leyenda "Hay campos vacíos o con errores. Verifique", deberá navegar por las diferentes pestañas para buscar el error.</li>
								<li>Si al enviar los datos recibe la leyenda "Registro Correcto. OK", de click al botón de aceptar y el sistema le mostrará su contraseña.</li>
								<li>Guarde su contraseña, con ella solicitará apoyos económicos en "Inicio de sesión".</li>
								<li>Una vez se haya registrado, no podrá registrarse nuevamente.</li>
							</ol>
							<div class="row">
								<div class="form-group col-sm-12 text-center">
									<h4 class="tipo-perfil obligatorio">Selecciona tu tipo de usuario</h4>
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
									<label class="obligatorio">CURP:</label>
									<input type="text" id="curp" name="curp" maxlength="18" class="form-control" placeholder="Ingresa tu CURP" />
								</div>
								<div class="form-group col-sm-6">
									<label class="obligatorio">Nombre(s):</label>
									<input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingresa tu nombre" />
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-6">
									<label class="obligatorio">Primer apellido:</label>
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
										<label class="obligatorio">Fecha de nacimiento:</label>
										<input type="text" id="fechaNac" name="fechaNac" class="form-control" data-mask="99/99/9999" placeholder="Fecha de nacimiento" />
										<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
									</div>
								</div>
								<div class="form-group col-sm-6">
									<label class="obligatorio">RFC:</label>
									<input type="text" id="rfc" name="rfc" maxlength="13" class="form-control" placeholder="Ingresa tu RFC" />
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-6">
									<label class="obligatorio">Sexo:</label>
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
									<label class="obligatorio">Nacionalidad:</label>
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
									<label class="obligatorio">Correo electrónico:</label>
									<input type="text" id="email" name="email" class="form-control" placeholder="Email para recibir notificación de dictamen" />
								</div>
								<div class="form-group col-sm-6">
									<label class="obligatorio">Confirmar correo electrónico:</label>
									<input type="text" id="emailConf" name="emailConf" class="form-control" placeholder="Confirma el correo electrónico" />
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-3">
									<label class="obligatorio">Lada:</label>
									<input type="text" id="lada" name="lada" maxlength="3" class="form-control" placeholder="Lada" />
								</div>
								<div class="form-group col-sm-6">
									<label class="obligatorio">Teléfono fijo:</label>
									<input type="text" id="telefono" name="telefono" maxlength="15" class="form-control" data-mask="9999999" placeholder="Teléfono fijo" />
								</div>
								<div class="form-group col-sm-3">
									<label class="obligatorio">Extensión:</label>
									<input type="text" id="extension" name="extension" maxlength="5" class="form-control" data-mask="99999" placeholder="Extensión" />
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
										<option value="<?php echo $val->ID; ?>"><?php echo $val->NOMBRE_CORTO; ?></option>
										<?php
										}
										?>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-6">
									<label class="obligatorio">Contraseña:</label>
									<input type="password" id="password" name="password" class="form-control" placeholder="Ingresa una contraseña" />
								</div>
								<div class="form-group col-sm-6">
									<label class="obligatorio">Confirmar contraseña:</label>
									<input type="password" id="passwordConf" name="passwordConf" class="form-control" placeholder="Confirma la contraseña" />
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