<?php

	/**
	*
	* CORREO INTERNO ADMINISTRADOR
	*
	**/
function enviarCorreo(){	
	$body             = 'Nueva iniciativa en su base de datos de ' . $_POST['nombre'];	
	$from = "email";
	$to = "email";
	$asunto = "Nuevo contacto por formulario";	
	$cabeceras = 'MIME-Version: 1.0' . "\r\n";
    $cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	$cabeceras .="From: FamInsurance SL <$from>\r\n";
	mail($to, $asunto, $body,$cabeceras);
	echo "En breve recibirá una respuesta";
	

}

	/**
	*
	* CORREO AL CLIENTE POR CONTACTO WEB 
	*
	**/
function enviarCorreoCliente(){
	$nombre 		  = $_POST['nombre'];
	$body             = '<p>Estimado ' . $nombre . ' , </p><p>Hemos recibido su petición, en breve recibirá una respuesta</p> ';
	$body 			 .="<hr><p>FamInsurance SL</p><p>NIF 32XXXXXXXX</p><p>Avenida Páncreas 2017 888D 15000 A Coruña</p>";
	$asunto = "Contacto FamInsurance";
	$from = "email";	
	$to = $_POST['email'];
	$cabeceras = 'MIME-Version: 1.0' . "\r\n";
    $cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	$cabeceras .="From: FamInsurance SL <$from>\r\n";
	mail($to, $asunto, $body,$cabeceras);
	echo "</br></br>Un mensaje automático ha sido enviado a su dirección de correo";
}


	/**
	*
	* CORREO ACTIVACIÓN CUENTA
	*
	**/
function enviarCorreoActivacion($dominio,$cadena,$to){	
	$link 			  = $dominio;
	$link			 .= "activarregistro.php?cadena=$cadena";
	$asunto 		 = "Activación cuenta FamInsurance";
	$body          	 = '<p>Para activar su cuenta, click en el siguiente enlace: ';
	$body 			.= "<a href='$link' target='blank'>$link</a></p>";
	$body 			.="<p>¿Problemas con el enlace?</p>";
	$body 			.="<p>Copie y pegue el siguiente enlace en su navegador:</p>";
	$body			.=	$link;
	$body 			 .="<hr><p>FamInsurance SL</p><p>NIF 32XXXXXXXX</p><p>Avenida Páncreas 2017 888D 15000 A Coruña</p>";	
	$cabeceras = 'MIME-Version: 1.0' . "\r\n";
	$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	$cabeceras .="From: FamInsurance SL <$from>\r\n";
	mail($to, $asunto, $body,$cabeceras);
	echo "<br><br>Un enlace de activacion ha sido enviado a su dirección de correo";

}


	

	

?>