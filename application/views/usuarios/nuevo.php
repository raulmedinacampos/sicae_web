<h3 class="titulo"><?php echo "Alta de ".$perfilC; ?></h3>
<form id="formUsuario" name="formUsuario" method="post" action="">
	<!-- Nav tabs -->
	<ul class="nav nav-tabs" role="tablist">
		<li role="presentation" class="active"><a href="#personal" aria-controls="personal" role="tab" data-toggle="tab">Información personal</a></li>
		<?php
			if ( $perfil == "p") {
		?>
		<li role="presentation"><a href="#profesor" aria-controls="profesor" role="tab" data-toggle="tab">Profesor</a></li>
		<li role="presentation"><a href="#grados" aria-controls="grados" role="tab" data-toggle="tab">Grados académicos</a></li>
		<li role="presentation"><a href="#productividad" aria-controls="productividad" role="tab" data-toggle="tab">Productividad <?php echo (date('Y')-2)."-".(date('Y')-1); ?></a></li>
		<li role="presentation"><a href="#proyectos" aria-controls="proyectos" role="tab" data-toggle="tab">Proyectos</a></li>
		<?php
			}
			
			if ( $perfil == "a") {
		?>
		<li role="presentation"><a href="#alumno" aria-controls="alumno" role="tab" data-toggle="tab">Alumno</a></li>
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
		<div role="tabpanel" class="tab-pane" id="profesor">
			<div class="row">
				<div class="form-group col-sm-6">
					<label>Tipo de nombramiento</label>
					<input type="text" id="" name="" class="form-control" placeholder="Ingrese su nombre" />
				</div>
				<div class="form-group col-sm-6">
					<label>Número de empleado</label>
					<input type="text" id="" name="" class="form-control" placeholder="Ingrese su apellido paterno" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-6">
					<label>Fecha de ingreso</label>
					<div class="input-group date datepicker">
						<input type="text" class="form-control" data-mask="99/99/9999" placeholder="dd/mm/aaaa" />
						<div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></div>
					</div>
				</div>
				<div class="form-group col-sm-6">
					<label>¿Fue contratado dentro del programa de profesor de excelencia?</label>
					<div>
						<div class="btn-group" data-toggle="buttons">
							<label class="btn btn-switch">
								<input type="radio" id="" name="" value="1" /> 
								Sí
							</label>
							<label class="btn btn-switch active">
								<input type="radio" id="" name="" value="0" checked="checked" /> 
								No
							</label>
						</div>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Base</h3>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="form-group col-sm-6">
							<label>Fecha en que obtuvo la base</label>
							<div class="input-group date datepicker">
								<input type="text" class="form-control" data-mask="99/99/9999" placeholder="dd/mm/aaaa" />
								<div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></div>
							</div>
						</div>
						<div class="form-group col-sm-6">
							<label>Categoría</label>
							<input type="text" id="" name="" class="form-control" placeholder="Ingrese su categoría" />
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-6">
							<label>Plaza</label>
							<input type="text" id="" name="" class="form-control" placeholder="Ingrese su plaza" />
						</div>
						<div class="form-group col-sm-6">
							<label>Horas de plaza</label>
							<select class="form-control">
								<option value="">Seleccione el número de horas</option>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Interinato</h3>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="form-group col-sm-6">
							<label>Fecha de inicio de interinato</label>
							<div class="input-group date datepicker">
								<input type="text" class="form-control" data-mask="99/99/9999" placeholder="dd/mm/aaaa" />
								<div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></div>
							</div>
						</div>
						<div class="form-group col-sm-6">
							<label>Fecha de término de interinato</label>
							<div class="input-group date datepicker">
								<input type="text" class="form-control" data-mask="99/99/9999" placeholder="dd/mm/aaaa" />
								<div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Sabático</h3>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="form-group col-sm-6">
							<label>¿Cuenta con sabático?</label>
								<div class="btn-group" data-toggle="buttons">
									<label class="btn btn-switch">
										<input type="radio" id="" name="" value="1" /> 
										Sí
									</label>
									<label class="btn btn-switch active">
										<input type="radio" id="" name="" value="0" checked="checked" /> 
										No
									</label>
								</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-4">
							<label>Tipo de sabático</label>
							<select class="form-control">
								<option value="">Seleccione una opción</option>
							</select>
						</div>
						<div class="form-group col-sm-4">
							<label>Fecha de inicio de sabático</label>
							<div class="input-group date datepicker">
								<input type="text" class="form-control" data-mask="99/99/9999" placeholder="dd/mm/aaaa" />
								<div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></div>
							</div>
						</div>
						<div class="form-group col-sm-4">
							<label>Fecha de término de sabático</label>
							<div class="input-group date datepicker">
								<input type="text" class="form-control" data-mask="99/99/9999" placeholder="dd/mm/aaaa" />
								<div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-6">
					<label>¿Cuenta con licencia con goce de sueldo?</label>
						<div class="btn-group" data-toggle="buttons">
							<label class="btn btn-switch">
								<input type="radio" id="" name="" value="1" /> 
								Sí
							</label>
							<label class="btn btn-switch active">
								<input type="radio" id="" name="" value="0" checked="checked" /> 
								No
							</label>
						</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title pull-left">¿Cuenta con licencia de goce de sueldo?</h3>
					<div class="btn-group" data-toggle="buttons">
						<label class="btn btn-switch">
							<input type="radio" id="" name="" value="1" /> 
							Sí
						</label>
						<label class="btn btn-switch active">
							<input type="radio" id="" name="" value="0" checked="checked" /> 
							No
						</label>
					</div>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="form-group col-sm-4">
							<label>Fecha de inicio del periodo</label>
							<div class="input-group date datepicker">
								<input type="text" class="form-control" data-mask="99/99/9999" placeholder="dd/mm/aaaa" />
								<div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></div>
							</div>
						</div>
						<div class="form-group col-sm-4">
							<label>Fecha de término del periodo</label>
							<div class="input-group date datepicker">
								<input type="text" class="form-control" data-mask="99/99/9999" placeholder="dd/mm/aaaa" />
								<div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-4">
							<label>¿Cuenta usted con prórroga?</label>
							<div>
								<div class="btn-group" data-toggle="buttons">
									<label class="btn btn-switch">
										<input type="radio" id="" name="" value="1" /> 
										Sí
									</label>
									<label class="btn btn-switch active">
										<input type="radio" id="" name="" value="0" checked="checked" /> 
										No
									</label>
								</div>
							</div>
						</div>
						<div class="form-group col-sm-4">
							<label>Fecha de inicio de prórroga</label>
							<div class="input-group date datepicker">
								<input type="text" class="form-control" data-mask="99/99/9999" placeholder="dd/mm/aaaa" />
								<div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></div>
							</div>
						</div>
						<div class="form-group col-sm-4">
							<label>Fecha de término de prórroga</label>
							<div class="input-group date datepicker">
								<input type="text" class="form-control" data-mask="99/99/9999" placeholder="dd/mm/aaaa" />
								<div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Becas</h3>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="form-group col-sm-6">
							<label>¿Es becario EDD?</label>
							<select class="form-control">
								<option value="">Seleccione su situación</option>
							</select>
						</div>
						<div class="form-group col-sm-6">
							<label>¿Es becario por exclusividad?</label>
							<select class="form-control">
								<option value="">Seleccione su situación</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-6">
							<label>¿Es becario EDI?</label>
							<select class="form-control">
								<option value="">Seleccione su situación</option>
							</select>
						</div>
						<div class="form-group col-sm-6">
							<label>¿Es becario SNI?</label>
							<select class="form-control">
								<option value="">Seleccione su situación</option>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div role="tabpanel" class="tab-pane" id="alumno">
			<div class="row">
				<div class="form-group col-sm-6">
					<label>Boleta</label>
					<input type="text" id="boleta" name="boleta" class="form-control" placeholder="Ingrese su número de boleta" />
				</div>
				<div class="form-group col-sm-6">
					<label>Semestre</label>
					<input type="text" id="semestre" name="semestre" class="form-control" placeholder="Ingrese el semestre que cursa actualmente" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-6">
					<label>Promedio</label>
					<input type="text" id="promedio" name="promedio" class="form-control" placeholder="Ingrese su promedio con dos decimales" />
				</div>
				<div class="form-group col-sm-6">
					<label>Las materias que cursa actualmente son de</label>
					<select id="materiasCursa" name="materiasCursa" class="form-control">
						<option value="">Seleccione el nivel que cursa</option>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-3">
					<label>¿Es becario PIFI?</label>
					<div>
						<div class="btn-group" data-toggle="buttons">
							<label class="btn btn-switch">
								<input type="radio" id="" name="" value="1" /> 
								Sí
							</label>
							<label class="btn btn-switch active">
								<input type="radio" id="" name="" value="0" checked="checked" /> 
								No
							</label>
						</div>
					</div>
				</div>
				<div class="form-group col-sm-3">
					<label>¿Es becario CONACYT?</label>
					<div>
						<div class="btn-group" data-toggle="buttons">
							<label class="btn btn-switch">
								<input type="radio" id="" name="" value="1" /> 
								Sí
							</label>
							<label class="btn btn-switch active">
								<input type="radio" id="" name="" value="0" checked="checked" /> 
								No
							</label>
						</div>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Proyecto SIP <?php echo date('Y'); ?></h3>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="form-group col-sm-6">
							<label>Número de registro</label>
							<input type="text" id="numSIP" name="numSIP" class="form-control" placeholder="Ingrese el número de registro del proyecto SIP" />
						</div>
						<div class="form-group col-sm-6">
							<label>Nombre del proyecto</label>
							<input type="text" id="nombreSIP" name="nombreSIP" class="form-control" placeholder="Ingrese el nombre del proyecto SIP" />
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-6">
							<label>Escuela</label>
							<select id="escuelaSIP" name="escuelaSIP" class="form-control">
								<option value="">Seleccione la escuela en donde está inscrito el proyecto SIP</option>
							</select>
						</div>
						<div class="form-group col-sm-6">
							<label>Director del proyecto</label>
							<input type="text" id="directorSIP" name="directorSIP" class="form-control" placeholder="Ingrese el nombre del director del proyecto SIP" />
						</div>
					</div>
				</div>
			</div>
		</div>
		<div role="tabpanel" class="tab-pane" id="grados">
			<div class="row">
				<div class="form-group col-sm-12">
					<label>Carreras técnicas</label>
					<input type="text" id="" name="" class="form-control" placeholder='Ingrese las carreras separadas por comas, Ej: "en Informática, en Comunicaciones"' />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-12">
					<label>Nivel licenciatura</label>
					<input type="text" id="" name="" class="form-control" placeholder='Ingrese las carreras separadas por comas, Ej: "en Economía, Ing. Industrial"' />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-12">
					<label>Nivel maestría</label>
					<input type="text" id="" name="" class="form-control" placeholder='Ingrese las carreras separadas por comas, Ej: "en Computación"' />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-12">
					<label>Nivel doctorado</label>
					<input type="text" id="" name="" class="form-control" placeholder='Ingrese las carreras separadas por comas, Ej: "en Ciencias Marinas"' />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-12">
					<label>Otros estudios</label>
					<input type="text" id="" name="" class="form-control" placeholder="Si no cuenta con algún nivel, deje en blanco" />
				</div>
			</div>
		</div>
		<div role="tabpanel" class="tab-pane" id="productividad">
			<div class="row">
				<div class="form-group col-sm-6">
					<label>Las materias que imparte corresponden a</label>
					<select class="form-control">
						<option value="">Seleccione el nivel que imparte</option>
					</select>
				</div>
				<div class="form-group col-sm-6">
					<label>Publicaciones nacionales realizadas</label>
					<select class="form-control">
						<option value="">Seleccione el número de publicaciones nacionales</option>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-6">
					<label>Publicaciones internacionales realizadas</label>
					<select class="form-control">
						<option value="">Seleccione el número de publicaciones internacionales</option>
					</select>
				</div>
				<div class="form-group col-sm-6">
					<label>Unidades de aprendizaje impartidas en el instituto</label>
					<input type="text" id="" name="" class="form-control" placeholder='Ingrese materias separadas por comas, Ej. "Economía, Bases de datos, Cálculo"' />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-12">
					<label>Patentes y/o publicaciones de libros</label>
					<textarea id="" name="" rows="5" class="form-control" placeholder="Ingrese, si considera tener más productividad, la descripción y año del producto, sepárelos por coma (,) y por cada diferente producto inicie en una nueva línea; ejemplo: Producto uno, YYYY (representa el año)&#10;Producto dos, YYYY"></textarea>
				</div>
			</div>
		</div>
		<div role="tabpanel" class="tab-pane" id="proyectos">
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				<div class="panel panel-default">
					<div class="panel-heading" role="tab" id="headingOne">
						<h4 class="panel-title">
							<a role="button" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Proyecto <?php echo date('Y'); ?></a>
						</h4>
					</div>
					<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
						<div class="panel-body">
							<div class="row">
								<div class="form-group col-sm-6">
									<label>Tipo de proyecto</label>
									<select class="form-control">
										<option value="">Seleccione el tipo de proyecto</option>
									</select>
								</div>
								<div class="form-group col-sm-6">
									<label>Especifique el tipo de proyecto</label>
									<input type="text" id="" name="" class="form-control" placeholder='Especifique si el tipo de proyecto es "Otros"' />
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-6">
									<label>Número de registro</label>
									<input type="text" id="" name="" class="form-control" placeholder="Ingrese el número de registro del proyecto" />
								</div>
								<div class="form-group col-sm-6">
									<label>Tipo de participacion</label>
									<select class="form-control">
										<option value="">Seleccione la actividad que desempeño dentro del proyecto</option>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-12">
									<label>Nombre del proyecto</label>
									<input type="text" id="" name="" class="form-control" placeholder="Ingrese el nombre del proyecto" />
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading" role="tab" id="headingTwo">
						<h4 class="panel-title">
							<a class="collapsed" role="button" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Proyecto <?php echo (date('Y')-1); ?></a>
						</h4>
					</div>
					<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
						<div class="panel-body">
							<div class="row">
								<div class="form-group col-sm-6">
									<label>Tipo de proyecto</label>
									<select class="form-control">
										<option value="">Seleccione el tipo de proyecto</option>
									</select>
								</div>
								<div class="form-group col-sm-6">
									<label>Especifique el tipo de proyecto</label>
									<input type="text" id="" name="" class="form-control" placeholder='Especifique si el tipo de proyecto es "Otros"' />
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-6">
									<label>Número de registro</label>
									<input type="text" id="" name="" class="form-control" placeholder="Ingrese el número de registro del proyecto" />
								</div>
								<div class="form-group col-sm-6">
									<label>Tipo de participacion</label>
									<select class="form-control">
										<option value="">Seleccione la actividad que desempeño dentro del proyecto</option>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-12">
									<label>Nombre del proyecto</label>
									<input type="text" id="" name="" class="form-control" placeholder="Ingrese el nombre del proyecto" />
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading" role="tab" id="headingThree">
						<h4 class="panel-title">
							<a class="collapsed" role="button" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Proyecto <?php echo (date('Y')-2); ?></a>
						</h4>
					</div>
					<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
						<div class="panel-body">
							<div class="row">
								<div class="form-group col-sm-6">
									<label>Tipo de proyecto</label>
									<select class="form-control">
										<option value="">Seleccione el tipo de proyecto</option>
									</select>
								</div>
								<div class="form-group col-sm-6">
									<label>Especifique el tipo de proyecto</label>
									<input type="text" id="" name="" class="form-control" placeholder='Especifique si el tipo de proyecto es "Otros"' />
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-6">
									<label>Número de registro</label>
									<input type="text" id="" name="" class="form-control" placeholder="Ingrese el número de registro del proyecto" />
								</div>
								<div class="form-group col-sm-6">
									<label>Tipo de participacion</label>
									<select class="form-control">
										<option value="">Seleccione la actividad que desempeño dentro del proyecto</option>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-12">
									<label>Nombre del proyecto</label>
									<input type="text" id="" name="" class="form-control" placeholder="Ingrese el nombre del proyecto" />
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
					<label>Banco</label>
					<input type="text" id="banco" name="banco" class="form-control" placeholder="Ingrese el nombre del banco" />
				</div>
				<div class="form-group col-sm-6">
					<label>Número de sucursal</label>
					<input type="text" id="sucursal" name="sucursal" class="form-control" placeholder="Ingrese su número de sucursal" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-6">
					<label>Número de cuenta</label>
					<input type="text" id="cuentaBanco" name="cuentaBanco" maxlength="12" class="form-control" placeholder="Ingrese su número de cuenta" />
				</div>
				<div class="form-group col-sm-6">
					<label>CLABE Interbancaria</label>
					<input type="text" id="clabe" name="clabe" maxlength="18" class="form-control" data-mask="999 999 99999999999 9" placeholder="Ingrese la CLABE interbancaria (18 dígitos)" />
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