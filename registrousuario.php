<?php 		
	
	//require_once("listadocatastro/ajax/provincias.php");
	session_start();
	$_SESSION['paginaactual']= $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title> FamInsurance SL : registro de usuario </title>	
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
	<?php
		if(isset($_SESSION['email']))
			echo "<meta HTTP-EQUIV='Refresh' CONTENT='300; URL=deslogandose.php'/>";
	?>
	<!-- descripción seo y robots-->
	<meta name="description" content="FamInsurance: registro en el sitio"/>
	<meta name="robots" content="Index, NoFollow">
	<link rel="canonical" href="https://noeliasanclemente.es/registrarse" />	
	<!-- css -->
	<link rel="stylesheet" type="text/css" href="libreria/bootstrap/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/estilo.css"/>
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Cookie">
	<!--scripts -->
	<script src="libreria/jquery.min.js"></script>
	<script src="libreria/bootstrap/js/bootstrap.min.js"></script>	
	<script src="programacionclientes/registro/registro.js" defer></script>
	<script src="libreria/validaciones/validaciones.js" defer></script>
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
	<div class="row margen5ciento">
		<div class="col-xs-12">
			<a name="contenidoprincipal"></a>
			<h1 class="text-primary text-center">Registro FamInsurance</h1>
			<div class="hidden-xs col-sm-10 col-sm-offset-1  bg-primary  margen20 ">	
			</div>
		</div>
	</div>



	<div class="row">	
		<div class="col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-2 margen5ciento">
				<?php
					if(isset($_SESSION['email'])){
				
				?>
					<p>Usuario ya registrado </p>					
				
				<?php
					}else{
				?>
					<form method="POST" id="registrousuario">						
						  <div class="form-group" id="camponombre">
							<label for="nombre">Nombre y apellidos</label>
							<input type="text" class="form-control"  id="nombre"  name="nombre"  placeholder="Introduce tu nombre y apellidos" required>
						  </div>
						  <div class="form-group" id="campodni">
							<label for="dni">Dni</label>
							<input type="text" class="form-control" id="dni" name="dni" maxlength="9" placeholder="Introduce tu dni" required>
						  </div>
						 <div class="form-group" id="campoemail">
							<label for="email">Email</label>
							<input type="email" class="form-control"  id="email" name="email"   placeholder="Introduce tu email" required>
						  </div>
						  <div class="form-group" id="campotelefono">
							<label for="telefono">Teléfono</label>
							<input type="tel" class="form-control" id="telefono" name="telefono"   placeholder="Introduce tu teléfono" maxlength="9" required>
						  </div>
						  <div class="form-group" id="campodireccion">
							<label for="direccion">Dirección</label>
							<input type="text" class="form-control" id="direccion" name="direccion"  maxlength="70" placeholder="Introduce tu dirección" required>
						  </div>
						   <div class="form-group" id="campoprovincia">
							<label for="provincia">Provincia</label>
								<select class="form-control" id="provincia" name="provincia">
								
								</select>							
						  </div>
						  <div class="form-group" id="campocodigopostal">
						  <label for="codigopostal2">Código postal</label>	
							<div class="row ">
								<div class="col-xs-1">										
									<p  id="codigopostal"></p>
								</div>
								<div class="col-xs-11">
															
									<input type="text" class="form-control" id="codigopostal2" name="codigopostal2" maxlength="3" placeholder="resto código postal"  required>
								</div>
							</div>
						  </div>
						   <div class="form-group" id="campopoblacion">
							<label for="poblacion">Población</label>
							<select class="form-control" id="poblacion" name="poblacion">
								
							</select>
						  </div>						  
						<div class="form-group" id="camposexo">
							<label for="sexo">Sexo</label>
							<select class="form-control"  id="sexo" name="sexo">
								<option value="H">Hombre</option>
								<option value="M">Mujer </option>
							</select>					
						  </div>						  
						  <div class="form-group" id="campocontrasena">
							<label for="contrasena">Contraseña</label>
							<input type="password" class="form-control"  id="contrasena" name="contrasena" placeholder="Contraseña" required>
							<label for="contrasenacontrol">Repita Contraseña</label>
							<input type="password" class="form-control"  id="contrasenacontrol" name="contrasenacontrol" placeholder="Repita contraseña" required>
						  </div>
						 <div class="form-group" id="campofechanacimiento">
							<!--date no soportado en firefox -->
							<label for="fechanacimiento">Fecha de nacimiento</label>
							<input type="text" class="form-control"  id="fechanacimiento" name="fechanacimiento"   placeholder="AAAA/MM/DD" required>
						  </div>						  
						  <input type="submit" class="btn btn-default" value="Registro" id="registro" name="registro"/>
						  <input type="reset" class="btn btn-default" value="Borrar" id="borrar" name="borrar"/>			 
					</form>		
					<p id="resp" class="text-success negrita">
									
					</p>
					<p id="error" class="text-warning negrita">
									
					</p>
				<?php
					}
				?>
					
		</div>
		<div class="col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-2 margen5ciento">
			<p>¿Ya registrado?</p>
			<a href="inicie-sesion" class="btn btn-default">Logarse</a>
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