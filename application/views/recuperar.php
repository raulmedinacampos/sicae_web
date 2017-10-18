<h3>Recuperación de contraseña</h3>
<hr class="red" />
<form id="formRecuperar" name="formRecuperar" method="post" action="">
	<div class="row">
		<div class="col-sm-4">
			<img alt="" src="<?php echo base_url('images/candado.png'); ?>" class="img-responsive" />
		</div>
		<div class="col-sm-8">
			<h4 class="form-group">Ingresa el CURP que registraste y la contraseña te será enviada a tu correo electrónico.</h4>
			<div class="row">
				<div class="form-group col-sm-5">
					<input type="text" id="curp" name="curp" maxlength="18" class="form-control" placeholder="Ingresa el CURP que registraste" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-3">
					<button type="submit" class="btn btn-block btn-primary">Recuperar</button>
				</div>
			</div>
			<div class="panel panel-default panel-sm">
				<div class="panel-body">
					<p>Es un mecanismo de recuperación de clave de acceso para que 
					los docentes, alumnos y Unidades Académicas del IPN ingresen a 
					los servicios que brinda el Programa de Apoyos Económicos de la 
					COFAA.</p>
				</div>
			</div>
		</div>
	</div>
</form>