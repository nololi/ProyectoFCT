<?php
	session_start();
	//guardo la página actual
	$_SESSION['paginaactual']= $_SERVER['REQUEST_URI'];
	
	
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title> FamInsurance</title>
	<!--no index -->
	<meta name="robots" content="noindex">
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
	<?php
		if(isset($_SESSION['email']))
			echo "<meta HTTP-EQUIV='Refresh' CONTENT='300; URL=deslogandose.php'/>";
	?>	
	<!-- descripción seo y robots-->
	<meta name="description" content="FamInsurance SL: nuestra política de privacidad"/>
	<meta name="robots" content="Index, NoFollow">
	<link rel="canonical" href="https://noeliasanclemente.es/politica-de-privacidad" />	
	<!-- css -->
	<link rel="stylesheet" type="text/css" href="libreria/bootstrap/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/estilo.css"/>
	<link rel="stylesheet" type="text/css" href="fontawesome/css/font-awesome.min.css"/>
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Cookie">
	<!-- scripts -->
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
	<div class="row">
		<div class="col-xs-12 margen5ciento">
			<a name="contenidoprincipal"></a>
			<h1 class="text-primary text-center">Política de privacidad FamInsurance</h1>
			<div class="hidden-xs col-sm-10 col-sm-offset-1  bg-primary  margen20 margen5cientodebajo ">	
			</div>
		</div>
			
			
	
	</div>



	<div class="row">
		<div class="col-xs-10 col-xs-offset-1">							
				<h2><a name="condiciones">1. Uso de cookies </a></h2>
				<p> 
				Una Cookie es un fichero que se descarga en su ordenador al acceder a determinadas páginas web.
				Las cookies permiten a una página web, entre otras cosas, almacenar y recuperar información sobre 
				los hábitos de navegación de un usuario o de su equipo y, dependiendo de la información que contenga 
				y de la forma en que utilice su equipo, pueden utilizarse para reconocer al usuario</p>
				
				<p>
				Las cookies son esenciales para el funcionamiento de internet, aportando innumerables ventajas en la 
				prestación de servicios interactivos, facilitándole la navegación y usabilidad de nuestra web.
				</p>				
				<p>
					Según lo dispuesto en el artículo 22.2 de la Ley 34/2002, de 11 de julio, de Servicios de la Sociedad de
					la Información y de Comercio Electrónico (LSSI-CE), FamInsurance SL  informa de 
					las cookies utilizadas en nuestra website:					
				</p>
				<ul>
					<li>Cookies propias </li>
					<li>Cookies de terceros </li>
					<li>Cookies de sesión </li>
					<li>Cookies persistentes</li>
				</ul>			
				<p>
					Asimismo, FamInsurance informa al usuario de que tiene la posibilidad 
					de configurar su navegador de modo que se le informe de la recepción de cookies, 
					pudiendo, si así lo desea, impedir que sean instaladas en su disco duro.
				</p>
				<p>
					A continuación le proporcionamos los enlaces de diversos navegadores, 
					a través de los cuales podrá realizar dicha configuración:
				</p>
				<p>
					Firefox desde aquí:<a href=" http://support.mozilla.org/es/kb/habilitar-y-deshabilitar-cookies-que-los-sitios-we"> http://support.mozilla.org/es/kb/habilitar-y-deshabilitar-cookies-que-los-sitios-we</a>
				</p>
				<p>
					Chrome desde aquí:<a href=" http://support.google.com/chrome/bin/answer.py?hl=es&answer=95647"> http://support.google.com/chrome/bin/answer.py?hl=es&answer=95647</a>
				</p>
				<p>
					Explorer desde aquí: <a href="http://windows.microsoft.com/es-es/internet-explorer/delete-manage-cookies#ie=ie-10" >http://windows.microsoft.com/es-es/internet-explorer/delete-manage-cookies#ie=ie-10</a>
				</p>
				<p>	
					Safari desde aquí: <a href="https://support.apple.com/kb/ph17191?locale=es_ES">https://support.apple.com/kb/ph17191?locale=es_ES</a>
				</p>
				<p>
					Opera desde aquí:<a href="http://help.opera.com/Windows/11.50/es-ES/cookies"> http://help.opera.com/Windows/11.50/es-ES/cookies.</a>
				</p>				
				<p><a href="#contenidoprincipal">Volver al principio </a></p>						
		</div>
	</div>
	<div class="row">		
		<div class="col-xs-10 col-xs-offset-1">		
				<h2><a name="condiciones">2. Condiciones de uso </a></h2>
				<p> 
				En cumplimiento de la Ley 34/2002, de 11 de julio, de Servicios de la Sociedad de la Información y de Comercio Electrónico (LSSI-CE), 
				FamInsurance SL  informa que es titular del sitio web <a href="#">faminsurance</a>.
				De acuerdo con la exigencia del artículo 10 de la 
				citada Ley,FamInsurance SL  informa de los siguientes datos:</p>
				<p>El titular de este sitio web es FamInsurance SL , con NIF  32XXXXXXXX y domicilio social 
				en Avenida Páncreas 2017 888D 15000 A Coruña (A CORUÑA). La dirección de correo electrónico de contacto con la empresa es: 
				<a href="mailto:faminsurancecontacto@gmail.com">faminsurancecontacto@gmail.com</a></p>
				<p><a href="#contenidoprincipal">Volver al principio </a></p>							
				<h2><a>3. Usuario y régimen de responsabilidades</a></h2>
				<p>
			La navegación, acceso y uso por el sitio web de FamInsurance SL confiere la condición de usuario,
			por la que se aceptan, desde la navegación por el sitio web de FamInsurance SL , todas las condiciones
			de uso aquí establecidas sin perjuicio de la aplicación de la correspondiente normativa de obligado cumplimiento legal según el caso.
			</p>
			<p>
			El sitio web de FamInsurance SL proporciona gran diversidad de información, servicios y datos. 
			El usuario asume su responsabilidad en el uso correcto del sitio web. Esta responsabilidad se extenderá a:			
			</p>
			<ul>
				<li> La veracidad y licitud de las informaciones aportadas por el usuario en los formularios extendidos por FamInsurance SL para el acceso a ciertos contenidos o servicios ofrecidos por el web.</li>
				<li>El uso de la información, servicios y datos ofrecidos por FamInsurance SL  contrariamente a lo dispuesto por
				las presentes condiciones, la Ley, la moral, las buenas costumbres o el orden público, o que de cualquier otro modo puedan suponer
				lesión de los derechos de terceros o del mismo funcionamiento del sitio web.				
				</li>			
			</ul>
			<p><a href="#contenidoprincipal">Volver al principio </a></p>						
			<h2><a>5. Política de enlaces y exenciones de responsabilidad</a> </h2>
				<p>
				FamInsurance SL  no se hace responsable del contenido de los sitios web a los que el usuario 
				pueda acceder a través de los enlaces establecidos en su sitio web y declara que en ningún caso 
				procederá a examinar o ejercitar ningún tipo de control sobre el contenido de otros sitios de la red.
				Asimismo, tampoco garantizará la disponibilidad técnica, exactitud, veracidad, validez o legalidad de
				sitios ajenos a su propiedad a los que se pueda acceder por medio de los enlaces.
			
			</p>
			<p>
				FamInsurance SL  declara haber adoptado todas las medidas necesarias para evitar cualquier 
				daño a los usuarios de su sitio web, que pudieran derivarse de la navegación por su sitio web.
				En consecuencia, FamInsurance SL  no se hace responsable, en ningún caso,
				de los eventuales daños que por la navegación por Internet pudiera sufrir el usuario.
			</p>
			<p><a href="#contenidoprincipal">Volver al principio </a></p>		
			<h2><a>6. Modificaciones</a> </h2>
			<p>
			FamInsurance SL  se reserva el derecho a realizar las modificaciones que considere oportunas, sin aviso previo, 
			en el contenido de su sitio web. Tanto en lo referente a los contenidos del sitio web, 
			como en las condiciones de uso del mismo. Dichas modificaciones podrán realizarse a través de su sitio web por cualquier
			forma admisible en derecho y serán de obligado cumplimiento durante el tiempo en que se encuentren publicadas 
			en la web y hasta que no sean modificadas válidamente por otras posteriores.
			</p>
			<p><a href="#contenidoprincipal">Volver al principio </a></p>			
			<h2><a name="propiedad">7. Propiedad intelectual e industrial</a></h2>
			<p>
			FamInsurance SL  por sí misma o como cesionaria, es titular de todos los derechos de propiedad intelectual.
			e industrial de su página web, así como de los elementos contenidos en la misma (a título enunciativo, imágenes,
			sonido, audio, vídeo, software o textos; marcas o logotipos, combinaciones de colores, estructura y diseño, 
			selección de materiales usados, programas de ordenador necesarios para su funcionamiento, acceso y uso, etc.),
			titularidad de FamInsurance SL . Serán, por consiguiente, obras protegidas como propiedad intelectual
			por el ordenamiento jurídico español, siéndoles aplicables tanto la normativa española y comunitaria en este campo, 
			como los tratados internacionales relativos a la materia y suscritos por España.
			</p>
			<p>
			Todos los derechos reservados. En virtud de lo dispuesto en la Ley de Propiedad Intelectual, 
			quedan expresamente prohibidas la reproducción, la distribución y la comunicación pública, 
			incluida su modalidad de puesta a disposición, de la totalidad o parte de los contenidos de esta página web, 
			con fines comerciales, en cualquier soporte y por cualquier medio técnico, sin la autorización de FamInsurance SL 
			</p>
			<p>
			El usuario se compromete a respetar los derechos de Propiedad Intelectual e Industrial titularidad de FamInsurance SL . 
			Podrá visualizar los elementos del portal e incluso imprimirlos, copiarlos y almacenarlos en el disco duro de su ordenador 
			o en cualquier otro soporte físico siempre y cuando sea, única y exclusivamente, para su uso personal y privado. 
			El usuario deberá abstenerse de suprimir, alterar, eludir o manipular cualquier dispositivo de protección o
			sistema de seguridad que estuviera instalado en las páginas de FamInsurance SL .
			</p>
			<p><a href="#contenidoprincipal">Volver al principio </a></p>
			<h2><a>8. Acciones legales, legislación aplicable y jurisdicción</a></h2>
			<p>
			FamInsurance SL  se reserva, asimismo, la facultad de presentar las acciones civiles o 
			penales que considere oportunas por la utilización indebida de su sitio web y contenidos, 
			o por el incumplimiento de las presentes condiciones.
			</p>
			<p>
			La relación entre el usuario y el prestador se regirá por la normativa vigente y de aplicación en el territorio español.
			De surgir cualquier controversia las partes podrán someter sus conflictos a arbitraje o acudir a la jurisdicción ordinaria
			cumpliendo con las normas sobre jurisdicción y competencia al respecto. FamInsurance SL  tiene su domicilio en A CORUÑA, España.
			</p>
			<p><a href="#contenidoprincipal">Volver al principio </a></p>
		</div>
	</div>
	<div class="row">		
		<div class="col-xs-10 col-xs-offset-1">		
				<h2><a>9. Redes sociales</a></h2>
				<p> 
				En cumplimiento de la Ley Orgánica 15/1999, de 13 de diciembre, de Protección de Datos de Carácter Personal (LOPD) y la Ley 34/2002,
				de 11 de julio, de Servicios de la Sociedad de la Información y de Comercio Electrónico (LSSI-CE),
				FamInsurance SL  informa a los usuarios, que ha procedido a crear un perfil en la Red Social Facebook, 
				con la finalidad principal de publicitar sus productos y servicios.</p>
				<p>Datos de FamInsurance SL :</p>
				<p>32XXXXXXXX <br/>
				Avenida Páncreas 2017 888D 15000 A Coruña<br/>
				http://localhost/<br/>
				faminsurancecontacto@gmail.com
				</p>
				<p>
					El usuario dispone de un perfil en la misma Red Social y ha decidido unirse a la página creada por 
					FamInsurance SL , mostrando así interés en la información que se publicite en la Red.
					Al unirse a nuestra página, nos facilita su consentimiento para el tratamiento de aquellos datos personales publicados en su perfil.
				</p>
				<p>
					El usuario puede acceder en todo momento a las políticas de privacidad de la propia Red Social,
					así como configurar su perfil para garantizar su privacidad.
				</p>
				<p>
					FamInsurance SL  tiene acceso y trata aquella información pública del usuario, en especial, su nombre de contacto.
					Estos datos, sólo son utilizados dentro de la propia Red Social. No son incorporados a ningún fichero.
				</p>
				<p>
					En relación a los derechos de acceso, rectificación, cancelación y oposición,
					de los que usted dispone y que pueden ser ejercitados ante FamInsurance SL , 
					de acuerdo con la LOPD, debe tener en cuenta los siguientes matices:
				</p>
					<ul>	
						<li>Acceso: Vendrá definido por la funcionalidad de la Red Social y la capacidad de acceso
						a la información de los perfiles de los usuarios.</li>
						<li>Rectificación: Sólo podrá satisfacerse en relación a aquella información que se encuentre bajo 
						el control de FamInsurance SL , por ejemplo, eliminar comentarios publicados en la propia página.
						Normalmente, este derecho deberá ejercerlo ante la Red Social.</li>
						<li>
						Cancelación y/u Oposición: Como en el caso anterior, sólo podrá satisfacerse
						en relación a aquella información que se encuentre bajo el control de FamInsurance SL , 
						por ejemplo, dejar de estar unido al perfil.
						</li>					
					</ul>				
				
				<p>FamInsurance SL  realizará las siguientes actuaciones:</p>
				<ul>
					<li>Acceso a la información pública del perfil.</li>
					<li>Publicación en el perfil del usuario de toda aquella información ya publicada en la página de FamInsurance SL .</li>
					<li>Enviar mensajes personales e individuales a través de los canales de la Red Social.</li>
					<li>Actualizaciones del estado de la página que se publicarán en el perfil del usuario.</li>				
				</ul>
				<p>
				El usuario siempre puede controlar sus conexiones, eliminar los contenidos que dejen de interesarle y restringir con quién comparte
				sus conexiones, para ello deberá acceder a su configuración de privacidad.
				</p>				
				<p><a href="#contenidoprincipal">Volver al principio </a></p>
							
				<h2><a>10. Publicaciones</a></h2>
				<p>
				El usuario, una vez unido a la página de FamInsurance SL ,
				podrá publicar en ésta última comentarios, enlaces, imágenes o
				fotografías o cualquier otro tipo de contenido multimedia soportado por la Red Social.
				El usuario, en todos los casos, debe ser el titular de los mismos, gozar de los
				derechos de autor y de propiedad intelectual o contar con el consentimiento
				de los terceros afectados. Se prohíbe expresamente cualquier publicación en 
				la página, ya sean textos, gráficos, fotografías, vídeos, etc. que atenten 
				o sean susceptibles de atentar contra la moral, la ética, el buen gusto 
				o el decoro, y/o que infrinjan, violen o quebranten los derechos 
				de propiedad intelectual o industrial, el derecho a la imagen o la Ley.
				En estos casos, FamInsurance SL  se reserva el derecho 
				a retirar de inmediato el contenido, pudiendo solicitar el bloqueo permanente del usuario
				</p>
				<p>
					FamInsurance SL  no se hará responsable de los contenidos que libremente ha publicado un usuario.
				</p>
				<p>
					El usuario debe tener presente que sus publicaciones serán conocidas por 
					los otros usuarios, por lo que él mismo es el principal responsable de su privacidad.
				</p>
				<p>
					Las imágenes que puedan publicarse en la página no serán almacenadas en ningún 
					fichero por parte de FamInsurance SL , pero sí que permanecerán en la Red Social.
				</p>
				
			
			
				<p><a href="#contenidoprincipal">Volver al principio </a></p>
				
				<h2><a>11. Concursos y promociones</a> </h2>
				<p>
					FamInsurance SL  se reserva el derecho a realizar concursos y promociones, 
					en los que podrá participar el usuario unido a su página. Las bases de cada uno de ellos,
					cuando se utilice para ello la plataforma de la Red Social, serán publicadas en la misma.
					Cumpliendo siempre con la LSSI-CE y con cualquier otra norma que le sea de aplicación.			
				</p>
				<p>
					La Red Social no patrocina, avala ni administra, de modo alguno, ninguna de nuestras promociones,
					ni está asociada a ninguna de ellas.
				</p>
			<p><a href="#contenidoprincipal">Volver al principio </a></p>				
			<h2><a>12. Publicidad</a> </h2>
			<p>
				FamInsurance SL  utilizará la Red Social para publicitar sus productos y servicios,
				en todo caso, si decide tratar sus datos de contacto para realizar acciones directas de prospección comercial,
				será siempre, cumpliendo con las exigencias legales de la LOPD y de la LSSI-CE.
			</p>
			<p>
				No se considerará publicidad el hecho de recomendar a otros usuarios la página de FamInsurance SL  
				para que también ellos puedan disfrutar de las promociones o estar informados de su actividad.
			</p>
			<p>
				A continuación detallamos el enlace a la política de privacidad de la Red Social:
			</p>
			<p>
				Facebook: <small><a href="#">https://www.facebook.com/help/323540651073243/</a></small>
			</p>			
			<p><a href="#contenidoprincipal">Volver al principio </a></p>		
		</div>
	</div>

	<!-- fila pie -->
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