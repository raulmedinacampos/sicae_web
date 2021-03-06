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
							<label>CURP<span class="form-text">*</span>: <span class="icon-infocircle" data-toggle="tooltip" title="Clave Única de Registro de Población"></span></label>
							<a href="https://renapo.gob.mx/swb/swb/RENAPO/consultacurp" target="_blank"><small>Consulta tu CURP</small></a>
							<input type="text" id="curpC" name="curpC" maxlength="18" class="form-control" placeholder="Ingresa tu CURP" />
						</div>
						<div class="form-group col-sm-6">
							<label>Nombre(s)<span class="form-text">*</span>:</label>
							<input type="text" id="nombreC" name="nombreC" class="form-control" placeholder="Ingresa tu nombre" />
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-6">
							<label>Primer apellido<span class="form-text">*</span>:</label>
							<input type="text" id="apPaternoC" name="apPaternoC" class="form-control" placeholder="Ingresa tu primer apellido" />
						</div>
						<div class="form-group col-sm-6">
							<label>Segundo apellido</label>
							<input type="text" id="apMaternoC" name="apMaternoC" class="form-control" placeholder="Ingresa tu segundo apellido" />
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-6">
							<div class="datepicker-group">
								<label>Fecha de nacimiento<span class="form-text">*</span>:</label>
								<input type="text" id="fechaNacC" name="fechaNacC" class="form-control" data-mask="99/99/9999" placeholder="Fecha de nacimiento (dd/mm/aaaa)" />
								<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
							</div>
						</div>
						<div class="form-group col-sm-6">
							<label>Sexo<span class="form-text">*</span>:</label>
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
							<label>Teléfono fijo<span class="form-text">*</span>:</label>
							<input type="text" id="telefonoC" name="telefonoC" maxlength="10" class="form-control" placeholder="Teléfono fijo (lada + teléfono)" />
						</div>
						<div class="form-group col-sm-3">
							<label>Extensión<span class="form-text">*</span>:</label>
							<input type="text" id="extensionC" name="extensionC" maxlength="5" class="form-control" placeholder="Extensión" />
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-6">
							<label>Correo electrónico<span class="form-text">*</span>:</label>
							<input type="text" id="emailC" name="emailC" class="form-control" placeholder="ejemplo@dominio.com" />
						</div>
						<div class="form-group col-sm-6">
							<label>Confirmar correo electrónico<span class="form-text">*</span>:</label>
							<input type="text" id="emailConfC" name="emailConfC" class="form-control" placeholder="ejemplo@dominio.com" />
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-12">
							<label>Escuela<span class="form-text">*</span>:</label>
							<select id="escuelaC" name="escuelaC" class="form-control">
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
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary">Guardar</button>
				</div>
			</div>
		</form>
	</div>
</div>