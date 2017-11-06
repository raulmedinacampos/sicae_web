<h5 class="text-justify" style="font-weight:normal;">El apoyo económico es una 
aportación de recurso que asigna la Comisión para que el docente, alumno o Unidad 
Académica del IPN cubra una parte significativa del costo total que se origina 
para asistir o realizar un evento académico, así como para la publicación de un 
artículo*. <strong>El Programa de Apoyos Económicos no contempla el financiamiento 
total de los gastos que se generen para dicho rubro.</strong></h5>
<p style="margin-bottom:50px;">*Solo en los casos cuya convocatoria contemple 
apoyar la modalidad de publicación de artículos.</p>
<div class="row">
	<div class="col-sm-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title text-center">Asistencia</h3>
			</div>
			<div class="panel-body">
				<p class="text-justify">Evento de Participación individual para Docentes o alumnos 
					del Instituto Politécnico Nacional con la finalidad de que 
					asistan a difundir sus conocimientos a través de Ponencias,
					Publicaciones o Estancias de Investigación en foros 
					Nacionales o Internacionales y que compartan el resultado, 
					producto de sus investigaciones</p>
				<div class="text-center col-sm-6 col-sm-offset-3">
					<p><a href="#" class="btn btn-block btn-default" data-toggle="modal" data-target="#loginAsistente">Iniciar sesión</a></p>
					<p><a id="btnNuevoUsuario" href="#" class="btn btn-block btn-default">Nuevo usuario</a></p>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title text-center">Realización</h3>
			</div>
			<div class="panel-body">
				<p class="text-justify">Evento de Participación Grupal dirigido principalmente a 
					Docentes y alumnos del Instituto Politécnico Nacional, 
					organizado por las Dependencias Politécnicas, y cuyo 
					objetivo es actualizar y proporcionar nuevas herramientas 
					para la investigación a través de conferencistas 
					reconocidos en su área de competencia.</p>
				<div class="text-center col-sm-6 col-sm-offset-3">
					<p><a href="#" class="btn btn-block btn-default" data-toggle="modal" data-target="#loginCoordinador">Iniciar sesión</a></p>
					<p><a id="btnNuevoCoordinador" href="#" class="btn btn-block btn-default">Nuevo coordinador</a></p>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal inicio de sesión como asistente -->
<div class="modal fade" id="loginAsistente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<form id="formLoginA" name="formLoginA" method="post" action="<?php echo base_url('login/validarprs'); ?>">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title text-center" id="myModalLabel">Iniciar sesión como asistente</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="form-group col-sm-10 col-sm-offset-1">
							<label>CURP<span class="form-text">*</span>: <span class="icon-infocircle" data-toggle="tooltip" title="Clave Única de Registro de Población"></span></label>
							<a href="https://renapo.gob.mx/swb/swb/RENAPO/consultacurp" target="_blank"><small>Consulta tu CURP</small></a>
							<input type="text" id="curpA" name="curpA" maxlength="18" class="form-control" placeholder="Ingresa el CURP que registraste" />
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-10 col-sm-offset-1">
							<label>Contraseña<span class="form-text">*</span>:</label>
							<input type="password" id="passA" name="passA" class="form-control" placeholder="Contraseña" />
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-8 col-sm-offset-2">
							<a href="<?php echo base_url('login/recuperar-contrasena'); ?>" class="recuperar pull-right">¿Olvidaste tu contraseña?</a>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-8 col-sm-offset-2">
							<label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
							<button type="submit" class="btn btn-block btn-primary">Iniciar sesión</button>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<!-- Modal inicio de sesión como coordinador -->
<div class="modal fade" id="loginCoordinador" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<form id="formLoginC" name="formLoginC" method="post" action="<?php echo base_url('login/validarcoord'); ?>">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title text-center" id="myModalLabel">Iniciar sesión como coordinador</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="form-group col-sm-10 col-sm-offset-1">
							<label>CURP<span class="form-text">*</span>: <span class="icon-infocircle" data-toggle="tooltip" title="Clave Única de Registro de Población"></span></label>
							<a href="https://renapo.gob.mx/swb/swb/RENAPO/consultacurp" target="_blank"><small>Consulta tu CURP</small></a>
							<input type="text" id="curpC" name="curpC" maxlength="18" class="form-control" placeholder="Ingresa tu CURP con el que registraste el evento" />
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-10 col-sm-offset-1">
							<label>Escuela<span class="form-text">*</span>:</label>
							<select id="escuelaC" name="escuelaC" class="form-control">
								<option value="">Selecciona el centro de adscripción</option>
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
						<div class="form-group col-sm-8 col-sm-offset-2">
							<a href="<?php echo base_url('login/recuperar-contrasena'); ?>" class="recuperar pull-right">¿Problemas para ingresar?</a>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-8 col-sm-offset-2">
							<label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
							<button type="submit" class="btn btn-block btn-primary">Iniciar sesión</button>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>