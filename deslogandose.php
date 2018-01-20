<?php

	session_start();
	$pagina = $_SESSION['paginaactual'];

	session_destroy();
	//require_once("clientes/funcionescliente.php");
	//require_once("conexion/conexion.php");

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title> FamInsurance</title>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
	<!-- tiene que redirigir a la última página visitada a los 5 segundos -->
	<meta HTTP-EQUIV='Refresh' CONTENT='5; URL=<?php echo $pagina;?>'/>
	<!-- css-->
	<link rel="stylesheet" type="text/css" href="libreria/bootstrap/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/estilo.css"/>
	<link rel="stylesheet" type="text/css" href="fontawesome/css/font-awesome.min.css"/>
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Cookie">
	<!--scripts-->
	<script src="libreria/jquery.min.js"></script>
	<script src="libreria/bootstrap/js/bootstrap.min.js"></script>			
	<!--favicon-->
	<link rel='shortcut icon' type='image/x-icon' href='images/favicon.png' />	
</head>
<body>
<div class="container-fluid">
	<!--1a FILA menú-->
	<div class="row">
		<nav class="navbar navbar-default navbar-static-top ">
			<div class="navbar-header bg-primary">
				<a href="#contenidoprincipal">
					<img src="images/1.gif" alt="FamInsurance SL" class="img-responsive img-rounded izquierda espacio1"/>
				</a>
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>			 
				</div>
				<div id="navbar" class="navbar-collapse collapse bg-primary">
				  <ul class="nav navbar-nav navegacion text-center">
					<li ><a href="inicio">Inicio</a></li>
					<li ><a href="nuestros-productos">Nuestros productos</a></li>
					<?php
						if(isset($_SESSION['email'])){
					?>
					<li ><a href="panel-de-cliente">Ir a su área cliente</a></li>
					<li ><a href="contrate-un-producto">Contratar</a></li>	
					<?php
						
						}else{				
					?>
						<li ><a href="inicie-sesion">Área clientes</a></li>
					
					<?php
						}
					?>				
					<li ><a href="contacte-con-nosotros">Contacto</a></li>
					<li ><a href="politica-de-privacidad">Política de privacidad</a></li>
					<?php
					if(isset($_SESSION['email'])){
					
					?>
						<li ><a href="deslogarse">Deslogarse</a></li>			
					<?php
					}
					?>
				  </ul>			  
			</div><!--/.nav-collapse -->
		</nav>
	</div>	
	<div class="row margen5ciento" id="capaformulario">	
		<div class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2">
			<!-- mensaje de aviso -->
			<h1 class="text-success">Deslogándose, redirigiendo en 5 segundos </h1>
			<img src="images/loading.gif" alt="Redirigiendo en 5 segundos"/>
		</div>		
	</div>
	<div class="row margen5ciento">	
		<div class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2">		
			<h2 id="guardado"></h2>	
		</div>
	</div>
	<div class="row">	
		<div class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2  mostrarenlaceguardado">		
			
		</div>
	</div>
	
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 margen20 margen5ciento">
			<h2 class="text-center text-primary"> Sobre nosotros </h2>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12  col-sm-10 col-sm-offset-1 bg-primary  margen20">	
		</div>
	</div>
	<div class="row ">
		<div class="col-xs-5 col-xs-offset-4 col-sm-2 col-sm-offset-2 margen5ciento margen5cientodebajo">
			<a href="contratar.php">
				<img src="images/seguro.jpg" alt="seguros de vida y accidentes" class="img-responsive img-circle"/>
				<p class="text-center">Calcula online el precio de tu seguro </p>
			</a>
		</div>
		<div class="col-xs-5 col-xs-offset-4  col-sm-2 col-sm-offset-1 margen5ciento margen5cientodebajo">
			<a href="contacto.php">
				<img src="images/atencionalcliente.jpg" alt="seguros de vida y accidentes" class="img-responsive img-circle"/>
				<p class="text-center">Contacte con nosotros a través de nuestro formulario online o por teléfono en el 98XXXXXXX 
										de lunes a viernes de 08:00 a 21:00 horas.
				</p>
			</a>
		</div>
		<div class="col-xs-5 col-xs-offset-4  col-sm-2 col-sm-offset-1 margen5ciento margen5cientodebajo">
			<a href="#">
				<img src="images/coberturamundial.jpg" alt="seguros de vida y accidentes" class="img-responsive img-circle"/>
				<p class="text-center">Cobertura las 24 horas del día los 365 días del año en cualquier lugar del mundo</p>
			</a>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 bg-primary margen20 pie  text-center">	
			<div class="col-xs-12 col-sm-3 col-sm-offset-1">
				<p class="subrayado pieazulclaro">Sobre nosotros </p>
				<p>FamInsurance SL</p>
				<p>NIF  32XXXXXXXX</p>
				<p>Avenida Páncreas 2017 888D 15000 A Coruña</p>
			</div>
			<div class="col-xs-12 col-sm-3 col-sm-offset-1">
				<p class="subrayado pieazulclaro">Nuestros productos</p>
				<p>Life Plus</p>
				<p>Acc Plus </p>
				<p>Dual Plus</p>
			</div>
			<div class="col-xs-12 col-sm-2 col-sm-offset-1">
				<p class="subrayado pieazulclaro">Contacto</p>
				<p>Formulario de contacto</p>
				<p>Teléfono:98XXXXXXX</p>
				<p>Política de privacidad</p>				
			</div>
		</div>		
	</div>
	<div class="row">	
		<div class="col-xs-12">
					<a href="#">
						<i class="icon-google-plus-sign icon-2x pull-right" alt="twitter"></i>
					</a>
					<a href="#">
						<i class="icon-linkedin icon-2x pull-right" alt="facebook"></i>
					</a>
					<a href="#">
						<i class="icon-facebook icon-2x pull-right" alt="linkedin"></i>
					</a>
					<a href="#">
						<i class="icon-twitter icon-2x pull-right" alt="Google+"></i>	
					</a>
		</div>
	</div>
</div>
</body>
</html>