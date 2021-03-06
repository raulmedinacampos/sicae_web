<h3>Publicaciones</h3>
<hr class="red" />
<form id="formPublicacion" name="formPublicacion" method="post" action="">
	<!-- Nav tabs -->
	<ul class="nav nav-tabs" role="tablist">
		<li role="presentation" class="active"><a href="#presentacion" aria-controls="presentacion" role="tab" data-toggle="tab">Publicación de artículo</a></li>
		<li role="presentation"><a href="#coautores" aria-controls="coautores" role="tab" data-toggle="tab">Coautores</a></li>
		<li role="presentation"><a href="#monto" aria-controls="monto" role="tab" data-toggle="tab">Monto solicitado</a></li>
	</ul>

	<!-- Tab panes -->
	<div class="tab-content">
		<div role="tabpanel" class="tab-pane active" id="presentacion">
			<div class="row">
				<div class="form-group col-sm-12">
					<label>Título del artículo en inglés y en español<span class="form-text">*</span>:</label>
					<textarea id="titulo" name="titulo" rows="3" class="form-control" placeholder="Anota el nombre del artículo a publicar en inglés y en español separado por un salto de línea. El nombre de la ponencia deberá coincidir con los demás documentos (oficio, carta de aceptación y el extenso del artículo)."><?php if(isset($publicacion)&& ($publicacion)) {echo $publicacion["NOMBRE_EVENTO"];} ?></textarea>
					<input type="hidden" id="idSolicitud" name="idSolicitud" value="<?php if(isset($publicacion)&& ($publicacion)) {echo $publicacion["ID"];} ?>" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-12">
					<label>Nombre de la revista<span class="form-text">*</span>:</label>
					<input type="text" id="revista" name="revista" class="form-control" placeholder="Ingresa el nombre de la revista donde se publicará el artículo" value="<?php if(isset($publicacion)&& ($publicacion)) {echo $publicacion["ORGANIZA"];} ?>" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-4">
					<label>ISSN de la revista<span class="form-text">*</span>:  <span class="icon-infocircle" data-toggle="tooltip" title="Ingresa el Número de Serie Estándar Internacional para publicaciones"></span></label>
					<input type="text" id="issn" name="issn" class="form-control" data-mask="9999-9999" placeholder="Ingresa el ISSN" value="<?php if(isset($publicacion)&& ($publicacion)) {echo $publicacion["OTRO"];} ?>" />
				</div>
				<div class="form-group col-sm-4">
					<label>Sede<span class="form-text">*</span>:</label>
					<input type="text" id="sede" name="sede" class="form-control" placeholder="Ciudad, país" value="<?php if(isset($publicacion)&& ($publicacion)) {echo $publicacion["SEDE"];} ?>" />
				</div>
			</div>
		</div>
		
		<div role="tabpanel" class="tab-pane" id="coautores">
			<div class="row">
				<div class="form-group col-sm-12">
					<button id="btnAgregarCoautor" class="btn btn-sm btn-primary">
						<span class="glyphicon glyphicon-plus"></span> Agregar coautor
					</button>
				</div>
			</div>
			<?php
			$i = "";
			if ( (empty($coautores) && isset($publicacion)) || (!isset($publicacion)) ) {
			?>
			<div class="panel-group ficha-collapse" id="accordion1">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-parent="#accordion1" data-toggle="collapse" href="#panel-1" aria-expanded="true" aria-controls="panel-1">
								Coautor 1 
							</a>
							<a href="#"><span class="glyphicon glyphicon-trash"></span></a>
						</h4>
						<button type="button" class="collpase-button" data-parent="#accordion1" data-toggle="collapse" href="#panel-1"></button>
					</div>
					<div class="panel-collapse collapse in" id="panel-1">
						<div class="panel-body">
							<div class="row">
								<div class="form-group col-sm-4">
									<label>Nombre(s):</label>
									<input type="text" id="coNombre1" name="coNombre[]" class="form-control" placeholder="Nombre del coautor" />
								</div>
								<div class="form-group col-sm-4">
									<label>Primer apellido:</label>
									<input type="text" id="coApP1" name="coApP[]" class="form-control" placeholder="Primer apellido del coautor" />
								</div>
								<div class="form-group col-sm-4">
									<label>Segundo apellido:</label>
									<input type="text" id="coApM1" name="coApM[]" class="form-control" placeholder="Segundo apellido del coautor" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
			} else {
				$i = 1;
				foreach ( $coautores as $val ) {
			?>
			<div class="panel-group ficha-collapse" id="accordion<?php echo $i; ?>">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-parent="#accordion<?php echo $i; ?>" data-toggle="collapse" href="#panel-<?php echo $i; ?>" aria-expanded="true" aria-controls="panel-<?php echo $i; ?>">
								Coautor <?php echo $i; ?>
							</a>
							<a href="#"><span class="glyphicon glyphicon-trash"></span></a>
						</h4>
						<button type="button" class="collpase-button" data-parent="#accordion<?php echo $i; ?>" data-toggle="collapse" href="#panel-<?php echo $i; ?>"></button>
					</div>
					<div class="panel-collapse collapse in" id="panel-<?php echo $i; ?>">
						<div class="panel-body">
							<div class="row">
								<div class="form-group col-sm-4">
									<label>Nombre(s):</label>
									<input type="text" id="coNombre<?php echo $i; ?>" name="coNombre[]" class="form-control" placeholder="Nombre del coautor" value="<?php if(!empty($coautores)) {echo $val["NOMBRE"];} ?>" />
								</div>
								<div class="form-group col-sm-4">
									<label>Primer apellido:</label>
									<input type="text" id="coApP<?php echo $i; ?>" name="coApP[]" class="form-control" placeholder="Primer apellido del coautor" value="<?php if(!empty($coautores)) {echo $val["APELLIDO_P"];} ?>" />
								</div>
								<div class="form-group col-sm-4">
									<label>Segundo apellido:</label>
									<input type="text" id="coApM<?php echo $i; ?>" name="coApM[]" class="form-control" placeholder="Segundo apellido del coautor" value="<?php if(!empty($coautores)) {echo $val["APELLIDO_M"];} ?>" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
				$i++;
				}
			}
			?>
			<input type="hidden" id="hdnTotalCoautores" value="<?php echo $i; ?>" />
		</div>
		
		<div role="tabpanel" class="tab-pane" id="monto">
			<div class="row">
				<div class="form-group col-sm-4">
					<label>Costo de publicación:</label>
					<div class="input-group">
						<div class="input-group-addon">$</div>
						<input type="text" id="costo" name="costo" class="form-control" placeholder="Costo de publicación" value="<?php if(isset($costo)) {echo $costo["SOLICITADO"];} ?>" />
					</div>
				</div>
				<div class="form-group col-sm-4">
					<label>Tipo de moneda<span class="form-text">*</span>:</label>
					<select id="moneda" name="moneda" class="form-control">
						<option value="">Selecciona</option>
						<?php
						foreach ( $monedas as $val ) {
						?>
						<option <?php if ( isset($costo) && $costo["S_MONEDA_ID"] == $val->ID ) {echo 'selected="selected"'; } ?> value="<?php echo $val->ID; ?>"><?php echo $val->NOMBRE; ?></option>
						<?php
						}
						?>
					</select>
				</div>
			</div>
		</div>
		
		<div class="row">
				<div class="form-group col-sm-2 pull-right">
					<button type="submit" id="btnGuardar" class="btn btn-block btn-primary">Guardar</button>
				</div>
			</div>
	</div>
</form>