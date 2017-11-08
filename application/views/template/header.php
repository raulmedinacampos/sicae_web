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
							<div class="hidden-xs col-xs-3"><img id="logoSEP" alt="SEP" src="<?php echo base_url('images/sep.png'); ?>" class="img-responsive" /></div>
							<div class="hidden-xs col-xs-1"><img id="logoIPN" alt="IPN" src="<?php echo base_url('images/ipn.png'); ?>" class="img-responsive" /></div>
							<div class="col-xs-4"><img id="logoCOFAA" alt="COFAA" src="<?php echo base_url('images/cofaa.png'); ?>" class="img-responsive" /></div>
							<div class="col-xs-4 text-right">
								<h6 class="hidden-xs hidden-md hidden-sm">Dirección de Especialización Docente e Investigación Científica y Tecnológica</h6>
								<h7 class="hidden-xs hidden-md hidden-sm">Departamento de Apoyos Económicos</h7>
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
		<li<?php if(uri_string() == "usuario") {echo ' class="active"';}?>><a href="<?php echo base_url('usuario'); ?>">Actualizar datos</a></li>
        <li class="dropdown<?php if(uri_string() == 'estancia-de-investigacion'||uri_string() == 'obtencion-de-grado'||uri_string() == 'ponencia'||uri_string() == 'publicaciones'||uri_string() == 'seminario') {echo ' active';}?>">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Eventos <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url('estancia-de-investigacion'); ?>">Estancia de investigación</a></li>
            <li><a href="<?php echo base_url('obtencion-de-grado'); ?>">Obtención de grado</a></li>
            <li><a href="<?php echo base_url('ponencia'); ?>">Ponencia</a></li>
            <li><a href="<?php echo base_url('publicaciones'); ?>">Publicaciones</a></li>
            <li><a href="<?php echo base_url('seminario'); ?>">Seminarios y otros</a></li>
          </ul>
        </li>
        <li<?php if(uri_string() == "historial") {echo ' class="active"';}?>><a href="<?php echo base_url('historial'); ?>">Formato</a></li>
        <li><a href="<?php echo base_url('uploads/encuesta_2018.pdf'); ?>" target="_blank">Encuesta de calidad</a></li>
		<?php
			}
		?>
		<?php
		if ( $this->session->rol== "2" ) {  // Coordinador
		?>
        <li<?php if(uri_string() == "coordinador") {echo ' class="active"';}?>><a href="<?php echo base_url('coordinador'); ?>">Actualizar datos</a></li>
        <li<?php if(uri_string() == "realizacion") {echo ' class="active"';}?>><a href="<?php echo base_url('realizacion'); ?>">Realización</a></li>
        <li<?php if(uri_string() == "historial") {echo ' class="active"';}?>><a href="<?php echo base_url('historial'); ?>">Formato</a></li>
        <li><a href="<?php echo base_url('uploads/encuesta_2018.pdf'); ?>" target="_blank">Encuesta de calidad</a></li>
        <?php
			}
		?>
		<?php
        if ( $this->session->rol== "3" ) {  // Alumno
		?>
		<li<?php if(uri_string() == "usuario") {echo ' class="active"';}?>><a href="<?php echo base_url('usuario'); ?>">Actualizar datos</a></li>
        <li class="dropdown<?php if(uri_string() == 'estancia-de-investigacion'||uri_string() == 'ponencia') {echo ' active';}?>">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Eventos <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url('estancia-de-investigacion'); ?>">Estancia de investigación</a></li>
            <li><a href="<?php echo base_url('ponencia'); ?>">Ponencia</a></li>
          </ul>
        </li>
        <li<?php if(uri_string() == "historial") {echo ' class="active"';}?>><a href="<?php echo base_url('historial'); ?>">Formato</a></li>
        <li><a href="<?php echo base_url('uploads/encuesta_2018.pdf'); ?>" target="_blank">Encuesta de calidad</a></li>
		<?php
			}
		?>
      </ul>
      
      

      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo base_url('login/cerrar'); ?>">Cerrar sesión</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<?php } ?>