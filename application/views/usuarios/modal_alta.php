<!-- Modal alta nuevo usuario -->
<div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<form id="formNuevo" name="formNuevo" method="post" action="">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Registro de usuario nuevo</h4>
				</div>
				<div class="modal-body">
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane active" id="perfil">
							<p>El registro único es un formulario que nos permitirá introducir 
								nuestra información más relevante para la solicitud de apoyo ecónomico.</p>
							<p>Pasos para capturar correctamente la información</p>
							<ol>
								<li>Identificar las ocho pestañas que están contenidas en el formulario de las cuales siete están deshabilitadas.</li>
								<li>Los campos que inicien con (*) pueden quedar vacíos, el resto son obligatorios.</li>
								<li>Llenar inicialmente la pestaña "Información Personal" (cuando termine ésta, se habilitarán las pestañas restantes según sea el caso).</li>
								<li>Llenar las pestañas habilitadas posteriores.</li>
								<li>Los campos incorrectos son iluminados de rojo, puede posicionar el cursor sobre el icono y mostrará como se debe llenar.</li>
								<li>Cuando este completamente seguro de lo capturado, de click al botón "Enviar datos".</li>
								<li>Si al enviar los datos recibe la leyenda "Hay campos vacíos o con errores. Verifique", deberá navegar por las diferentes pestañas para buscar el error.</li>
								<li>Si al enviar los datos recibe la leyenda "Registro Correcto. OK", de click al botón de aceptar y el sistema le mostrará su contraseña.</li>
								<li>Guarde su contraseña, con ella solicitará apoyos económicos.</li>
								<li>Una vez se haya registrado, no podrá registrarse nuevamente.</li>
							</ol>
							<div class="row">
								<div class="form-group col-sm-12 text-center">
									<h4 class="tipo-perfil">Seleccione su tipo de usuario</h4>
									<label class="radio-perfil">
										<input type="radio" name="rPerfil" id="rProfesor" value="p" />
										<div class="profesor"></div>
										<span>Profesor</span>
									</label>
									<label class="radio-perfil">
										<input type="radio" name="rPerfil" id="rAlumno" value="a" />
										<div class="alumno"></div>
										<span>Alumno</span>
									</label>
								</div>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane" id="registro">
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
									<label>CURP</label>
									<input type="text" id="curp" name="curp" maxlength="18" class="form-control" placeholder="Ingrese su CURP" />
								</div>
								<div class="form-group col-sm-6">
									<label>RFC</label>
									<input type="text" id="rfc" name="rfc" maxlength="13" class="form-control" placeholder="Ingrese su RFC" />
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
									<label>Nacionalidad</label>
									<input type="text" id="nacionalidad" name="nacionalidad" class="form-control" placeholder="Ingrese su nacionalidad de origen" />
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
							<div class="row">
								<div class="form-group col-sm-6">
									<label>Contraseña</label>
									<input type="password" id="password" name="password" class="form-control" placeholder="Ingrese una contraseña" />
								</div>
								<div class="form-group col-sm-6">
									<label>Confirmar contraseña</label>
									<input type="password" id="passwordConf" name="passwordConf" class="form-control" placeholder="Confirme la contraseña" />
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