<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="Descripción del sistema">
	    <meta name="author" content="UDS">
		
		<title><?php if (isset($titulo)) {echo $titulo." - ";} ?>SICAE</title>
		
		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
		
		<!-- Hojas de estilo -->
		<link href="<?php echo base_url("css/bootstrap.min.css"); ?>" rel="stylesheet" />
		<link href="<?php echo base_url("css/bootstrap-datetimepicker.min.css"); ?>" rel="stylesheet" />
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
		<script type="text/javascript" src="<?php echo base_url("js/jquery-2.2.4.min.js"); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("js/jasny-bootstrap.min.js"); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("js/bootstrap.min.js"); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("js/jquery.validate.min.js"); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("js/moment.js"); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("js/bootstrap-datetimepicker.min.js"); ?>"></script>
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
			<header>
				<div id="logosWraper" class="container">
					<div class="col-xs-3"><img id="logoCOFAA" alt="COFAA" src="<?php echo base_url("images/cofaa.png"); ?>" class="img-responsive" /></div>
					<div class="hidden-xs col-xs-3"><img id="logoIPN" alt="IPN" src="<?php echo base_url("images/ipn.png"); ?>" class="img-responsive" /></div>
					<div class="hidden-xs col-xs-offset-3 col-xs-3"><img id="logoSEP" alt="SEP" src="<?php echo base_url("images/sep.png"); ?>" class="img-responsive" /></div>
				</div>
			</header>
		
			<div id="mainWrapper">  <!-- Contenedor principal -->
				<div class="container">
					<?php if(uri_string() != "") { ?>
					<h4 class="pull-right"><a href="<?php echo base_url(); ?>">Volver al inicio</a></h4>
					<?php } ?>
					<h1 class="titulo">Sistema Integral para el Control de<br />Apoyos Económicos</h1>