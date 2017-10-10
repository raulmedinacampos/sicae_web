<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="Descripción del sistema">
	    <meta name="author" content="UDS">
		
		<title><?php if (isset($titulo)) {echo $titulo." - ";} ?>SICAE</title>
		
		<!-- Hojas de estilo -->
		<link href="https://framework-gb.cdn.gob.mx/assets/styles/main.css" rel="stylesheet" />
		<!-- <link href="<?php echo base_url("css/bootstrap-datetimepicker.min.css"); ?>" rel="stylesheet" /> -->
		<link href="<?php echo base_url("css/template.css"); ?>" rel="stylesheet" />
		<link href="<?php echo base_url("css/styles.css"); ?>" rel="stylesheet" />
		
		<!-- Bucle para jalar las hojas de estilo por sección -->
		<?php
		if (isset ( $css )) {
			foreach ( $css as $val ) {
		?>
		<link href="<?php echo base_url("css/".$val.".css"); ?>" rel="stylesheet" />
		<?php
			}
		}
		?>
		
		<!-- Scripts JS -->
		<script src="https://framework-gb.cdn.gob.mx/gobmx.js"></script>
		<script type="text/javascript" src="<?php echo base_url("js/jquery-2.2.4.min.js"); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("js/jasny-bootstrap.min.js"); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("js/jquery.validate.min.js"); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("js/moment.js"); ?>"></script>
		<script type="text/javascript" src="https://framework-gb.cdn.gob.mx/assets/scripts/jquery-ui-datepicker.js"></script>
		<!-- <script type="text/javascript" src="<?php echo base_url("js/bootstrap-datetimepicker.min.js"); ?>"></script> -->
		<script type="text/javascript" src="<?php echo base_url("js/mayusculas.js"); ?>"></script>
		
		<!-- Bucle para jalar scripts por sección -->
		<?php
		if (isset ( $js )) {
			foreach ( $js as $val ) {
		?>
		<script type="text/javascript" src="<?php echo base_url("js/".$val.".js"); ?>"></script>
		<?php
			}
		}
		?>
	</head>
	
	<body<?php if(uri_string() == "login") {echo ' class="login"';} ?>>
		<div id="siteWrapper">  <!-- Contenedor para ajustar altura al 100% -->
			<!-- Header -->
			<header class="header">
				<div id="logosWraper">
					<div class="container">
						<div class="row">
							<div class="hidden-xs col-xs-3"><img id="logoSEP" alt="SEP" src="<?php echo base_url("images/sep.png"); ?>" class="img-responsive" /></div>
							<div class="hidden-xs col-xs-1"><img id="logoIPN" alt="IPN" src="<?php echo base_url("images/ipn.png"); ?>" class="img-responsive" /></div>
							<div class="col-xs-4"><img id="logoCOFAA" alt="COFAA" src="<?php echo base_url("images/cofaa.png"); ?>" class="img-responsive" /></div>
							<div class="col-xs-4 text-right">
								<h6 class="hidden-xs hidden-md hidden-sm">Dirección de Especialización Docente e Investigación Científica y Tecnológica</h6>
								<h7 class="hidden-xs hidden-md hidden-sm">Departamento de Apoyos económicos</h7>
							</div>
						</div>
					</div>
				</div>
			</header>
		
			<div id="mainWrapper">  <!-- Contenedor principal -->
				<div class="container">
					<?php if( uri_string() != "" && !$this->session->rol ) { ?>
					<div class="row">
						<h6 class="pull-right"><a href="<?php echo base_url(); ?>">Volver al inicio</a></h6>
					</div>
					<?php } ?>
					<h1 class="titulo">Sistema Integral para el Control de<br />Apoyos Económicos</h1>
					
					<?php if( $this->session->rol ) { ?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
  <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      <?php
      if ( $this->session->rol== "1" ) {  // Profesor
		?>
		<li class="active"><a href="<?php echo base_url('usuario'); ?>">Actualizar datos</a></li>
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Eventos <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Estancia de investigación</a></li>
            <li><a href="#">Obtención de grado</a></li>
            <li><a href="<?php echo base_url('ponencia'); ?>">Ponencia</a></li>
            <li><a href="#">Publicaciones</a></li>
            <li><a href="#">Seminarios y otros</a></li>
          </ul>
        </li>
        <li><a href="<?php echo base_url('historial'); ?>">Formato</a></li>
        <li><a href="<?php echo base_url('uploads/encuesta_2016.pdf'); ?>" target="_blank">Encuesta de calidad</a></li>
		<?php
			}
		?>
		<?php
		if ( $this->session->rol== "2" ) {  // Coordinador
		?>
        <li class="active"><a href="<?php echo base_url('coordinador'); ?>">Actualizar datos</a></li>
        <li><a href="<?php echo base_url('ponencia'); ?>">Realización</a></li>
        </li>
        <li><a href="<?php echo base_url('historial'); ?>">Formato</a></li>
        <li><a href="<?php echo base_url('uploads/encuesta_2016.pdf'); ?>" target="_blank">Encuesta de calidad</a></li>
        <?php
			}
		?>
		<?php
        if ( $this->session->rol== "3" ) {  // Alumno
		?>
		<li class="active"><a href="<?php echo base_url('usuario'); ?>">Actualizar datos</a></li>
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Eventos <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Estancia de investigación</a></li>
            <li><a href="<?php echo base_url('ponencia'); ?>">Ponencia</a></li>
          </ul>
        </li>
        <li><a href="<?php echo base_url('historial'); ?>">Formato</a></li>
        <li><a href="<?php echo base_url('uploads/encuesta_2016.pdf'); ?>" target="_blank">Encuesta de calidad</a></li>
		<?php
			}
		?>
      </ul>
      
      
      <!-- <ul class="wizard-steps" role="tablist">
		<li role="presentation" class="completed">
			<a href="#personal" aria-controls="personal" role="tab" data-toggle="tab">
				<h5>Datos del</h5>
				<span>coordinador</span>
			</a>
		</li>
		<li role="presentation">
			<a href="#evento" aria-controls="evento" role="tab" data-toggle="tab">
				<h5>Selección de</h5>
				<span>eventos</span>
			</a>
		</li>
		<li role="presentation">
			<a href="#expositores" aria-controls="expositores" role="tab" data-toggle="tab">
				<h5>Formato</h5>
				<span>&nbsp;</span>
			</a>
		</li>
        <li role="presentation">
        	<a href="#monto" aria-controls="monto" role="tab" data-toggle="tab">
            	<h5>Encuesta de</h5>
            	<span>calidad</span>
            </a>
        </li>
    </ul> -->
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo base_url('login/cerrar'); ?>">Cerrar sesión</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<?php } ?>