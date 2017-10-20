<!-- Modal alta nuevo coordinador -->
<div class="modal fade" id="modalCoordinador" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<form id="formNuevoCoordinador" name="formNuevoCoordinador" method="post" action="<?php echo base_url('coordinador/agregar'); ?>">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Registro de coordinador nuevo</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="form-group col-sm-6">
							<label class="obligatorio">CURP:</label>
							<input type="text" id="curpC" name="curpC" maxlength="18" class="form-control" placeholder="Ingresa tu CURP" />
						</div>
						<div class="form-group col-sm-6">
							<label class="obligatorio">Nombre(s):</label>
							<input type="text" id="nombreC" name="nombreC" class="form-control" placeholder="Ingresa tu nombre" />
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-6">
							<label class="obligatorio">Primer apellido:</label>
							<input type="text" id="apPaternoC" name="apPaternoC" class="form-control" placeholder="Ingresa tu primer apellido" />
						</div>
						<div class="form-group col-sm-6">
							<label class="obligatorio">Segundo apellido:</label>
							<input type="text" id="apMaternoC" name="apMaternoC" class="form-control" placeholder="Ingresa tu segundo apellido" />
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-6">
							<div class="datepicker-group">
								<label class="obligatorio">Fecha de nacimiento:</label>
								<input type="text" id="fechaNacC" name="fechaNacC" class="form-control" data-mask="99/99/9999" placeholder="Fecha de nacimiento" />
								<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
							</div>
						</div>
						<div class="form-group col-sm-6">
							<label class="obligatorio">Sexo:</label>
							<div>
								<label class="radio-inline">
									<input id="rdbHC" name="sexoC" value="M" type="radio" /> Hombre
								</label>
								<label class="radio-inline">
									<input id="rdbMC" name="sexoC" value="F" type="radio" /> Mujer
								</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-6">
							<label class="obligatorio">Teléfono fijo:</label>
							<input type="text" id="telefonoC" name="telefonoC" maxlength="7" class="form-control" data-mask="9999999999" placeholder="Teléfono fijo" />
						</div>
						<div class="form-group col-sm-3">
							<label class="obligatorio">Extensión:</label>
							<input type="text" id="extensionC" name="extensionC" maxlength="5" class="form-control" data-mask="99999" placeholder="Extensión" />
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-6">
							<label class="obligatorio">Correo electrónico:</label>
							<input type="text" id="emailC" name="emailC" class="form-control" placeholder="Email para recibir notificación de dictamen" />
						</div>
						<div class="form-group col-sm-6">
							<label class="obligatorio">Confirmar correo electrónico:</label>
							<input type="text" id="emailConfC" name="emailConfC" class="form-control" placeholder="Confirma el correo electrónico" />
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-12">
							<label class="obligatorio">Escuela:</label>
							<select id="escuelaC" name="escuelaC" class="form-control">
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
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary">Guardar</button>
				</div>
			</div>
		</form>
	</div>
</div>