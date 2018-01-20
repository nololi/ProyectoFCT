<?php
	session_start();
	$_SESSION['paginaactual']= $_SERVER['REQUEST_URI'];
	require_once("programacionclientes/clientes/funcionescliente.php");
	require_once("conexion/conexion.php");
	

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title> FamInsurance</title>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
	<?php
		if(isset($_SESSION['email']))
			echo "<meta HTTP-EQUIV='Refresh' CONTENT='300; URL=deslogandose.php'/>";
	?>	
	<!--estilos-->
	<link rel="stylesheet" type="text/css" href="libreria/bootstrap/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/estilo.css"/>
	<link rel="stylesheet" type="text/css" href="fontawesome/css/font-awesome.min.css"/>
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Cookie">
	<!--scripts-->
	<script src="libreria/jquery.min.js"></script>
	<script src="programacionclientes/contratar/contratar.js"></script>
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
		<?php				
			if(isset($_SESSION['email'])){
		?>	
			<div class="col-xs-10 col-xs-offset-1">			
									<p  > <strong>1. INFORMACIÓN GENERAL</strong> </p>
					<p>
						La titularidad de este sitio web, http://localhost/, (en adelante Sitio Web) la ostenta: 
						FamINSURANCE, provista de NIF: 32XXXXXXXX  e inscrita en: Registro Mercantil A Coruña; y sus datos
						registrales son: Tomo -20 Folio -200  Hoja -1420 y cuyos datos de contacto son:
					</p>
					<p>	
						Avenida Páncreas 2017 888D 15000 A Coruña
					</p>
					<p>
						Este documento (así como todo otro documentos que aquí se mencionen) regula las condiciones 
					  por las que se rige el uso de este Sitio Web (http://localhost/) y la compra o 
					  adquisición de productos y/o servicios en el mismo (en adelante, Condiciones).
					</p>
					<p> 
						A efectos de estas Condiciones se entiende que la actividad que http://localhost/ 
						desarrolla a través del Sitio Web comprende:</p>
					<p>
						Comercialización de seguros
					</p>
					<p>
						Además de leer las presentes Condiciones, antes de acceder, navegar y/o usar esta página web,
						el Usuario ha de haber leído el Aviso Legal y las Condiciones Generales de Uso, 
						incluyendo, la política de cookies, y la política de privacidad y de protección 
						de datos de http://localhost/ . Al utilizar este Sitio Web 
						o al hacer y/o solicitar la adquisición de un producto y/o servicio a través del 
						mismo el Usuario consiente quedar vinculado por estas Condiciones y por todo lo anteriormente
						mencionado, por lo que si no está de acuerdo con todo ello, no debe usar este Sitio Web.
					</p>
					<p> 
						Asimismo, se informa que estas Condiciones podrían ser modificadas. El Usuario es responsable 
						de consultarlas cada vez que acceda, navegue y/o use el Sitio Web ya que serán aplicables aquellas
						que se encuentren vigentes en el momento en que se solicite la adquisición de productos y/o servicios.
					</p>
					<p>
						Para todas las preguntas que el Usuario pueda tener en relación con las Condiciones puede
						ponerse en contacto con el titular utilizando los datos de contacto facilitados más arriba o,
						en su caso, utilizando el formulario de contacto
					</p>
					<p> 
						<strong> 2. EL USUARIO</strong>
					</p>
					<p>
						El acceso, la navegación y uso del Sitio Web, confiere la condición de usuario 
						(en adelante referido, indistintamente, individualmente como Usuario o conjuntamente como Usuarios),
						por lo que se aceptan, desde que se inicia la navegación por el Sitio Web, todas las Condiciones
						aquí establecidas, así como sus ulteriores modificaciones, sin perjuicio de la aplicación de 
						la correspondiente normativa legal de obligado cumplimiento según el caso. 
					</p>
					<p>
						El Usuario asume su responsabilidad de un uso correcto del Sitio Web. Esta responsabilidad se extenderá a:
					</p>
						<ul>
							<li>
								Hacer uso de este Sitio Web únicamente para realizar consultas y compras o adquisiciones
								legalmente válidas.
							</li>						
							<li> 
								No realizar ninguna compra falsa o fraudulenta. Si razonablemente se pudiera 
								considerar que se ha hecho una compra de esta índole, podría ser anulada y 
								se informaría a las autoridades pertinentes.
							</li>
							<li> 
								Facilitar datos de contacto veraces y lícitos, por ejemplo, dirección de
								correo electrónico, dirección postal y/u otros datos (ver Aviso Legal y
								Condiciones Generales de Uso).
							</li>
						</ul>
					<p>
							El Usuario declara ser mayor de 18 años y tener capacidad legal para celebrar
							contratos a través de este Sitio Web.
					</p>
					<p> 
						El Sitio Web está dirigido principalmente a Usuarios residentes en España.
						http://localhost/  no asegura que el Sitio Web cumpla con legislaciones 
						de otros países, ya sea total o parcialmente. http://localhost/  
						declina toda responsabilidad que se pueda derivar de dicho acceso, así como tampoco
						asegura envíos o prestación de servicios fuera de España. 
					</p>
					<p> 
						El Usuario podrá formalizar, a su elección, con http://localhost/  
						el contrato de compraventa de los productos y/o servicios deseados en cualquiera 
						de los idiomas en los que las presentes Condiciones estén disponibles en este Sitio Web.
					</p>
					<p> 
						<strong> 3. PROCESO DE COMPRA O ADQUISICIÓN</strong>
					</p>
					<p>
						Los Usuarios debidamente registrados  pueden comprar en el Sitio Web por 
						los medios y formas establecidos. Deberán seguir el procedimiento de compra
						y/o adquisición online de http://localhost/ , durante el cual
						varios productos y/o servicios pueden ser seleccionados y añadidos al carrito, 
						cesta o espacio final de compra y, finalmente, hacer clic en " contratar ". 
					</p>
					<p> 
						Asimismo, el Usuario deberá rellenar y/o comprobar la información que 
						en cada paso se le solicita, aunque, durante el proceso de compra,
						antes de realizar el pago, se pueden modificar los datos de la compra. 
					</p>
					<p> 
						Una vez el procedimiento de compra ha concluido, el Usuario consiente que el Sitio
						Web genere una factura electrónica que se hará llegar al Usuario a través
						del correo electrónico. Y, en su caso, a través de su espacio personal 
						de conexión al Sitio Web. Asimismo, el Usuario puede, si así lo desea, 
						obtener una copia de su factura en papel, solicitándolo a http://localhost/contacto.php 
						utilizando los espacios de contacto del Sitio Web o a través de 
						los datos de contacto facilitados más arriba.
					</p>
					<p> 
						El Usuario reconoce estar al corriente, en el momento de la compra, 
						de ciertas condiciones particulares de venta que conciernen 
						al producto y/o servicio en cuestión y que se muestran junto 
						a la presentación o, en su caso, imagen de éste en su página del 
						Sitio Web, indicando, a modo enunciativo, pero no exhaustivo,
						y atendiendo a cada caso: nombre, precio, componentes, peso, cantidad, color, 
						detalles de los productos, o características,
						modo en el que se llevarán a cabo y/o coste de las prestaciones; y 
						reconoce que la realización del pedido de compra o adquisición materializ
						la aceptación plena y completa de las condiciones particulares de venta aplicables a cada caso.
					</p>
					<p>
						Las comunicaciones, órdenes de compra y pagos que intervengan durante las 
						transacciones efectuadas en el Sitio Web podrían ser archivadas y 
						conservadas en los registros informatizados de http://localhost/  
						con el fin de constituir un medio de prueba de las transacciones, en todo caso, 
						respetando las condiciones razonables de seguridad y las leyes y normativas
						vigentes que a este respecto sean de aplicación, y particularmente atendiendo
						a la LOPD y a los derechos que asisten a los Usuarios conforme a la política 
						de privacidad de este Sitio Web (Aviso Legal y Condiciones Generales de Uso).
					</p>
					<p> 
						<strong> 4. DISPONIBILIDAD</strong> 
					</p>
					<p> 
							Todos los pedidos de compra recibidos por http://localhost/
							a través del Sitio Web están sujetos a la disponibilidad de los productos y/o
							a que ninguna circunstancia o causa de fuerza mayor (cláusula nueve de estas Condiciones) 
							afecte al suministro de los mismos y/o a la prestación de los servicios.
							Si se produjeran dificultades en cuanto al suministro de productos o no quedaran productos 
							en stock, http://localhost/  se compromete a contactar al Usuario y reembolsar cualquier
							cantidad que pudiera haber sido abonada en concepto de importe.
					</p>
					<p> <strong>5. PRECIOS Y PAGO</strong> </p>
					<p> 
						Los precios exhibidos en el Sitio Web son los finales, en Euros (€) e 
						incluyen los impuestos, salvo que por exigencia legal, especialmente 
						en lo relativo al IPS, se señale y aplique cuestión distinta. 
					</p>
					<p> 
						En ningún caso el Sitio Web añadirá costes adicionales al precio 
						de un producto o de un servicio de forma automática, sino solo aquellos que el Usuario 
						haya seleccionado y elegido voluntaria y libremente. 
					</p>
					<p> 
						Los precios pueden cambiar en cualquier momento, pero los posibles cambios 
						no afectarán a los pedidos o compras con respecto a los que el Usuario 
						ya ha finalizado el proceso de solicitud de compra en el Sitio Web tal 
						y como se indica en el párrafo uno de la cláusula tres.
					</p>
					<p>
						Los medios de pago aceptados serán: recibo bancario.
					</p>
					<p> 
						http://localhost/  utiliza todos los medios para garantizar 
						la confidencialidad y la seguridad de los datos de pago transmitidos
						por el Usuario durante las transacciones a través del Sitio Web. 
						Como tal, el Sitio Web utiliza un sistema de pago seguro SSL (Secure Socket Layer).
					</p>
					<p> 
						En todo caso, al hacer clic en "contratar" el Usuario confirma que el método 
						de pago utilizado es suyo o que, en su caso, es el legítimo
						poseedor de la cuenta bancaria.
					</p>
					<p>
							Los pedidos de compra o adquisición en los que el
							Usuario seleccione como medio de pago la transferencia bancaria 
							serán reservados durante 5 días naturales a partir de la 
							confirmación del pedido para poder dejar el tiempo suficiente a
							que la transferencia bancaria sea tomada en cuenta por el sistema de pagos
							utilizado por http://localhost/  para el Sitio Web. 
							Cuando el sistema recibe la transferencia, el pedido será confirmado.
					</p>
					<p> 	
							<strong> 7. MEDIOS TÉCNICOS PARA CORREGIR ERRORES</strong>
					</p>
					<p> 
						Se pone en conocimiento del Usuario que en caso de que detecte que se ha producido 
						un error al introducir datos necesarios para procesar su solicitud de compra
						en el Sitio Web, podrá modificar los mismos poniéndose en contacto con 
						http://localhost/  a través de los espacios de contacto 
						habilitados en el Sitio Web, y, en su caso, a través de aquellos
						habilitados para contactar con el servicio de atención al cliente,
						y/o utilizando los datos de contacto facilitados en la cláusula primera
						(Información general). 
					</p>				
					<p>
						De igual forma, se remite al Usuario a consultar el Aviso Legal 
						y Condiciones Generales de Uso para recabar más
						información sobre cómo ejercer su derecho de rectificación según 
						lo establecido en la Ley Orgánica 15/1999, de 13 de diciembre, 
						de Protección de Datos de Carácter Personal. </p>
					<p>
						<strong>8. DEVOLUCIONES</strong>
					</p>
					<p> 
						En los casos en los que el Usuario adquiriera servicios en o través 
						del Sitio Web del titular, le asisten una serie de derechos,
						tal y como se enumeran y describen a continuación: 
					</p>
					<p>
						<strong>Derecho de Desistimiento</strong>
					</p>
					<p> 
						El Usuario, en tanto que consumidor y usuario, realiza una compra en el Sitio Web
						y, por tanto le asiste el derecho a desistir de dicha compra en un plazo de
						14 días naturales sin necesidad de justificación.
					</p>
					<p>
						Este plazo de desistimiento expirará a los 14 días naturales
						del día que el Usuario o un tercero autorizado por éste contrató el servicio
						 el Sitio Web de 
						http://localhost/ 
					</p>
					<p>
						Para ejercer este derecho de desistimiento, el Usuario deberá notificar 
						su decisión a http://localhost/ .
						Podrá hacerlo, en su caso, a través de los espacios
						de contacto habilitados en el Sitio Web o a través de:
					</p>
					<p>
						Avenida Páncreas 2017 888D 15000 A Coruña  
					</p>
					<p>
						El Usuario, independientemente del medio que elija para comunicar su decisión,
						debe expresar de forma clara e inequívoca que es su intención 
						desistir del contrato de compra. 
					<p>  
						<strong>9. EXONERACIÓN DE RESPONSABILIDAD</strong>
					</p>
					<p>
						Salvo disposición legal en sentido contrario,http://localhost/  
						no aceptará ninguna responsabilidad por las siguientes pérdidas, con independencia de su origen: </p>
					<ul>
						<li> cualesquiera pérdidas que no fueran atribuibles a incumplimiento alguno por su parte,  </li>
						<li> pérdidas empresariales (incluyendo lucro cesante, de ingresos, de contratos, 
							de ahorros previstos, de datos, pérdida del fondo de comercio o gastos innecesarios incurridos), 
							o de 
						</li>
						<li> toda otra pérdida indirecta que no fuera razonablemente previsible 
							por ambas partes en el momento en que se formalizó el contrato de
							compraventa de los productos entre ambas partes.
						</li>
					</ul>
					<p> Igualmente, http://localhost/  también limita su responsabilidad en cuanto a los siguientes casos: </p>
					<ul>
						<li>http://localhost/  aplica todas las medidas concernientes a
							proporcionar una visualización fiel del producto en el Sitio Web, 
							sin embargo no se responsabiliza por las mínimas diferencias 
							o inexactitudes que puedan existir debido a falta de resolución 
							de la pantalla, o problemas del navegador que se utilice u otros de esta índole. 
						</li>
						<li>  
							http://localhost/  actuará con la máxima
							diligencia a efectos de poner a disposición del usuario
							el producto objeto del pedido de compra. 
						</li> 
						<li>
							Fallos técnicos que por causas fortuitas o de otra índole,
							impidan un normal funcionamiento del servicio a través de internet.
							Falta de disponibilidad del Sitio Web por razones de mantenimiento
							u otras, que impida disponer del servicio.  http://localhost/
							pone todos los medios a su alcance a efectos de llevar a cabo el proceso de compra, 
							pago y envío/entrega de los productos, no obstante se exime de responsabilidad 
							por causas que no le sean imputables, caso fortuito o fuerza mayor.
						</li>						
						<li> En general, http://localhost/  
							no se responsabilizará por ningún incumplimiento o
							retraso en el cumplimiento de alguna de las obligaciones 
							asumidas, cuando el mismo se deba a acontecimientos 
							que están fuera de nuestro control razonable, es decir,
							que se deban a causa de fuerza mayor, y ésta podrá incluir, a modo enunciativo pero no exhaustivo: 						
							<ul>
								<li> Huelgas, cierres patronales u otras medidas reivindicativas.  </li>
								<li> Conmoción civil, revuelta, invasión, amenaza o ataque terrorista, guerra (declarada o no) o amenaza o preparativos de guerra.  </li>
								<li> Incendio, explosión, tormenta, inundación, terremoto, hundimiento, epidemia o cualquier otro desastre natural.  </li>
								<li> Imposibilidad de uso de trenes, barcos, aviones, transportes de motor u otros medios de transporte, públicos o privados.  </li>
								<li> Imposibilidad de utilizar sistemas públicos o privados de telecomunicaciones.  </li>
								<li> Actos, decretos, legislación, normativa o restricciones de cualquier gobierno o autoridad pública. </li>
							</ul>
						</li>
					</ul>
					<p> 
						De esta forma, las obligaciones quedarán suspendidas durante el periodo en que
						la causa de fuerza mayor continúe, y  http://localhost/  
						dispondrá de una ampliación en el plazo para cumplirlas por un periodo de 
						tiempo igual al que dure la causa de fuerza mayor.  http://localhost/  
						pondrá todos los medios razonables para encontrar una solución que nos permita cumplir 
						nuestras obligaciones a pesar de la causa de fuerza mayor. </p>
					<p> 
						<strong>16. QUEJAS Y RECLAMACIONES</strong>
					</p>
					<p> 
						El Usuario puede hacer llegar a  http://localhost/  
						sus quejas, reclamaciones o todo otro comentario que desee realizar a
						través de los datos de contacto que se facilitan al principio de estas Condiciones (Información General). 
					</p>
					<p> 
						Además,  http://localhost/  dispone de hojas oficiales
						de reclamación a disposición de los consumidores y usuarios, y 
						que estos pueden solicitar a  http://localhost/
						en cualquier momento, utilizando los datos de contacto que se 
						facilitan al principio de estas Condiciones (Información General).
					</p>
					<p> Asimismo, si de la celebración de este contrato de compra entre 
						http://localhost/  y el Usuario emanara una controversia,
						el Usuario como consumidor puede solicitar una solución extrajudicial 
						de controversias, de acuerdo con el Reglamento UE Nº 524/2013 del
						Parlamento Europeo y del Consejo, de 21 de mayo de 2013, sobre 
						resolución de litigios en línea en materia de consumo y por el que
						se modifica el Reglamento (CE) nº 2006/2004 y la Directiva 2009/22/CE. 
						Puede acceder a este método a través del sitio web: http://ec.europa.eu/consumers/odr/. 
					</p>
					<p><strong> Última modificación: 19/10/2017 </strong> </p>	
			</div>		
		<?php
			}
			else{
		?>
			<div class="col-xs-10 col-xs-offset-1">
					<h2 class="text-center">No se ha logado</h2>
					<p class="text-center">
						<a href="login.php" class="btn btn-default">Ir a la página de login</a>
					</p>
			</div>
		<?php
			}
		?>				
	</div>
	<div class="row  margen5ciento">
		<div class="hidden-xs col-sm-10 col-sm-offset-1 margen20">
			<h2 class="text-center text-primary"> Sobre nosotros </h2>
		</div>
	</div>
	<div class="row">
		<div class="hidden-xs col-sm-10 col-sm-offset-1  bg-primary  margen20">	
		</div>
	</div>
	<div class="row  margen5ciento">
		<div class="hidden-sm hidden-lg hidden-md col-xs-10 col-xs-offset-1">
			<h2 class="text-center text-primary"> Sobre nosotros </h2>
		</div>
	</div>
	<div class="row">
		<div class="hidden-sm hidden-lg hidden-md col-xs-12 bg-primary margen20">	
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