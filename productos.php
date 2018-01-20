<?php
	session_start();
	$_SESSION['paginaactual']= $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title> FamInsurance SL: nuestros productos</title>	
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
	<?php
		if(isset($_SESSION['email']))
			echo "<meta HTTP-EQUIV='Refresh' CONTENT='300; URL=deslogandose.php'/>";
	?>	
	<!-- descripción seo y robots-->
	<meta name="description" content="FamInsurance: seguros de vida, accidentes, vida y accidentes"/>
	<meta name="robots" content="Index, NoFollow">
	<link rel="canonical" href="https://noeliasanclemente.es/nuestros-productos" />
	<!-- css -->	
	<link rel="stylesheet" type="text/css" href="libreria/bootstrap/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/estilo.css"/>
	<link rel="stylesheet" type="text/css" href="fontawesome/css/font-awesome.min.css"/>
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Cookie">
	<!--scripts-->
	<script src="libreria/jquery.min.js"></script>
	<script src="libreria/bootstrap/js/bootstrap.min.js"></script>
	<script src="libreria/cookie/jquery.cookie.js" defer></script>
	<script src="libreria/cookie/cookie.js" defer></script>		
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
	<div class="row  margen5ciento">
		<div class="hidden-xs col-sm-10 col-sm-offset-1 margen20">
			<a name="contenidoprincipal"></a>
			<h1 class="text-center text-primary"> Nuestros productos </h1>
		</div>
		<div class="col-xs-10 col-xs-offset-1 hidden-sm hidden-lg hidden-md margen5ciento margen5cientodebajo">
			<h1 class="text-center text-primary"> Nuestros productos </h1>
		</div>
	</div>
	<div class="row">
		<div class="hidden-xs col-sm-8 col-sm-offset-2  bg-primary  margen20">	
		</div>
	</div>
	<div class="row margen5ciento">
		<!--tamaño pc-->
		<div class="hidden-xs hidden-sm col-md-4 col-md-offset-2 bg-verde espacio3">
			<h2 class="text-center subrayado"><strong>Life plus</strong></h2>
			<p class="text-center"><em>¡Proteja a su familia con un seguro de vida!</em></p>
			<p>¿Sabía que los seguros de vida contratados con la hipoteca sólo cubren el pago de la misma?</p>
			<p>Te proponemos un seguro idóneo, para proteger a los tuyos pase lo que pase</p>
			<p class="text-center"><a class="btn btn-default" href="contratar.php">Ver opciones</a></p>			
		</div>
		<div class="hidden-xs hidden-sm col-md-4 col-md-offset-0 espacio3">
			<img class="img-responsive " src="images/lifePlus.jpg" alt="seguro de vida Life Plus"/>	
		</div>
		<!--tamaño móvil y tablet-->
		<div class="col-xs-10 col-xs-offset-1 hidden-md hidden-lg bg-verde espacio3">
			<h2 class="text-center subrayado"><strong>Life plus</strong></h2>
			<p class="text-center"><em>¡Proteja a su familia con un seguro de vida!</em></p>
			<p>¿Sabía que los seguros de vida contratados con la hipoteca sólo cubren el pago de la misma?</p>
			<p>Te proponemos un seguro idóneo, para proteger a los tuyos pase lo que pase</p>
			<p class="text-center"><a class="btn btn-default" href="contratar.php">Ver opciones</a></p>			
		</div>		
	</div>
	<div class="row">
		<!--tamaño pc-->
		<div class="hidden-xs hidden-sm col-md-4 col-md-offset-2 espacio3">
				<img class="img-responsive " src="images/avion.jpg" alt="seguro de accidentes Acc Plus"/>		
		</div>
		<div class="hidden-xs hidden-sm col-md-4 col-md-offset-0  bg-naranja espacio3">
			<h2 class="text-center subrayado"><strong>Acc Plus</strong></h2>
			<p class="text-center"><em>¡Le protegemos ante cualquier tipo de accidente!</em></p>
			<p>¿Sabía que la mayoría de seguros de accidentes le aplican un recargo por peligrosidad de su profesión?</p>
			<p>Te proponemos cambiar las normas, con nosotros pagas lo mismo independientemente de su profesión.</p>
			<p class="text-center"><a class="btn btn-default" href="contratar.php">Ver opciones</a></p>			
		</div>	
		<!--tamaño móvil y tablet-->
		<div class="col-xs-10 col-xs-offset-1 hidden-md hidden-lg  bg-naranja espacio3">
			<h2 class="text-center subrayado"><strong>Acc Plus</strong></h2>
			<p class="text-center"><em>¡Le protegemos ante cualquier tipo de accidente!</em></p>
			<p>¿Sabía que la mayoría de seguros de accidentes le aplican un recargo por peligrosidad de su profesión?</p>
			<p>Te proponemos cambiar las normas, con nosotros pagas lo mismo independientemente de su profesión.</p>
			<p class="text-center"><a class="btn btn-default" href="contratar.php">Ver opciones</a></p>			
		</div>			
	</div>
	<div class="row">
		<!--tamaño pc-->
		<div class="hidden-xs hidden-sm col-md-4 col-md-offset-2 bg-rosa espacio3">
			<h2 class="text-center subrayado"><strong>Dual plus</strong></h2>
			<p class="text-center"><em>¡Para protegerlo todo!</em></p>
			<p>Con nuestro seguro Dual plus tiene un seguro de vida con doble capital en su seguro de accidentes.</p>
			<p>Además, le ofrecemos un descuento del 50% anual en su prima de accidentes.</p>
			<p class="text-center"><a class="btn btn-default" href="contratar.php">Ver opciones</a></p>			
		</div>
		<div class="hidden-xs hidden-sm col-md-4 col-md-offset-0  espacio3">
			<img class="img-responsive " src="images/surfer.jpg" alt="seguro de vida y accidentes Dual Plus"/>	
		</div>
		<!--tamaño móvil y tablet-->
		<div class="col-xs-10 col-xs-offset-1 hidden-md hidden-lg  bg-rosa espacio3">
			<h2 class="text-center subrayado"><strong>Dual plus</strong></h2>
			<p class="text-center"><em>¡Para protegerlo todo!</em></p>
			<p>Con nuestro seguro Dual plus tiene un seguro de vida con doble capital en su seguro de accidentes.</p>
			<p>Además, le ofrecemos un descuento del 50% anual en su prima de accidentes.</p>
			<p class="text-center"><a class="btn btn-default" href="contratar.php">Ver opciones</a></p>			
		</div>
	</div>
	<!-- 5a fila sobre nosotros -->
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 margen20">
			<h2 class="text-center text-primary"> Sobre nosotros </h2>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12  col-sm-10 col-sm-offset-1 bg-primary  margen20">	
		</div>
	</div>
	<div class="row ">
		<div class="col-xs-5 col-xs-offset-4 col-sm-2 col-sm-offset-2 margen5ciento margen5cientodebajo">
			<a href="contrate-un-producto">
				<img src="images/seguro.jpg" alt="Calculador precio seguro" class="img-responsive img-circle"/>
				<p class="text-center">Calcula online el precio de tu seguro </p>
			</a>
		</div>
		<div class="col-xs-5 col-xs-offset-4  col-sm-2 col-sm-offset-1 margen5ciento margen5cientodebajo">
			<a href="contacte-con-nosotros">
				<img src="images/atencionalcliente.jpg" alt="Contacto FamInsurance" class="img-responsive img-circle"/>
				<p class="text-center">Contacte con nosotros a través de nuestro formulario online o por teléfono en el 98XXXXXXX 
										de lunes a viernes de 08:00 a 21:00 horas.
				</p>
			</a>
		</div>
		<div class="col-xs-5 col-xs-offset-4  col-sm-2 col-sm-offset-1 margen5ciento margen5cientodebajo">
			<a href="nuestros-productos">
				<img src="images/coberturamundial.jpg" alt="Cobertura los 365 días del año" class="img-responsive img-circle"/>
				<p class="text-center">Cobertura las 24 horas del día los 365 días del año en cualquier lugar del mundo</p>
			</a>
		</div>
	</div>
	<!-- 6A fila pie -->
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
				<p><a href="contacte-con-nosotros">Formulario de contacto</a></p>
				<p>Teléfono:98XXXXXXX</p>
				<p><a href="politica-de-privacidad">Política de privacidad</a></p>				
			</div>
		</div>		
	</div>
	<div class="row">		
		<!-- iconos-->
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