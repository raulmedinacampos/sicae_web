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
		
		<!-- Digital Analytix -->
		<!-- Begin Digital Analytix Tag 1.1302.13 -->
		<script type="text/javascript">
			function udm_(e){var t="comScore=",n=document,r=n.cookie,i="",s="indexOf",o="substring",u="length",a=2048,f,l="&ns_",c="&",h,p,d,v,m=window,g=m.encodeURIComponent||escape;if(r[s](t)+1)for(d=0,p=r.split(";"),v=p[u];d<v;d++)h=p[d][s](t),h+1&&(i=c+unescape(p[d][o](h+t[u])));e+=l+"_t="+ +(new Date)+l+"c="+(n.characterSet||n.defaultCharset||"")+"&c8="+g(n.title)+i+"&c7="+g(n.URL)+"&c9="+g(n.referrer),e[u]>a&&e[s](c)>0&&(f=e[o](0,a-8).lastIndexOf(c),e=(e[o](0,f)+l+"cut="+g(e[o](f+1)))[o](0,a)),n.images?(h=new Image,m.ns_p||(ns_p=h),h.src=e):n.write("<","p","><",'img src="',e,'" height="1" width="1" alt="*"',"><","/p",">")};
			function uid_call(a, b){
				ui_c2 = 17183199; // your corporate c2 client value
				ui_ns_site = 'gobmx'; // your sites identifier
				window.b_ui_event = window.c_ui_event != null ? window.c_ui_event:"",window.c_ui_event = a;
				var ui_pixel_url = 'https://sb.scorecardresearch.com/p?c1=2&c2='+ui_c2+'&ns_site='+ui_ns_site+'&name='+a+'&ns_type=hidden&type=hidden&ns_ui_type='+b;
				var b="comScore=",c=document,d=c.cookie,e="",f="indexOf",g="substring",h="length",i=2048,j,k="&ns_",l="&",m,n,o,p,q=window,r=q.encodeURIComponent||escape;if(d[f](b)+1)for(o=0,n=d.split(";"),p=n[h];o<p;o++)m=n[o][f](b),m+1&&(e=l+unescape(n[o][g](m+b[h])));ui_pixel_url+=k+"_t="+ +(new Date)+k+"c="+(c.characterSet||c.defaultCharset||"")+"&c8="+r(c.title)+e+"&c7="+r(c.URL)+"&c9="+r(c.referrer)+"&b_ui_event="+b_ui_event+"&c_ui_event="+c_ui_event,ui_pixel_url[h]>i&&ui_pixel_url[f](l)>0&&(j=ui_pixel_url[g](0,i-8).lastIndexOf(l),ui_pixel_url=(ui_pixel_url[g](0,j)+k+"cut="+r(ui_pixel_url[g](j+1)))[g](0,i)),c.images?(m=new Image,q.ns_p||(ns_p=m),m.src=ui_pixel_url):c.write("<p><img src='",ui_pixel_url,"' height='1' width='1' alt='*'></p>");
			}
			udm_('https://sb.scorecardresearch.com/b?c1=2&c2=17183199&ns_site=gobmx&name=<?php echo trim($this->uri->segment(1).".".$this->uri->segment(2),"."); ?>');
		</script>
		<noscript><p><img src="https://sb.scorecardresearch.com/p?c1=2&amp;c2=17183199&amp;ns_site=gobmx&amp;name=<?php echo trim($this->uri->segment(1).".".$this->uri->segment(2),"."); ?>" height="1" width="1" alt="*"></p></noscript> 
		<!-- End Digital Analytix Tag 1.1302.13 -->
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
            <li><a href="<?php echo base_url('publicacion'); ?>">Publicaciones</a></li>
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