<?php
require_once("class.phpmailer.php");
include("class.smtp.php");


/*
	he activado en apache
	extension=php_openssl.dll
*/


	/**
	*
	* CORREO INTERNO ADMINISTRADOR
	*
	**/
function enviarCorreo(){
	//include("class.smtp.php"); //si da error stream_socket_enable_crypto(): cargar esto
	//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded
	$mail             = new PHPMailer();
	
	//para el autofirmado
	$mail->SMTPOptions = array(
		'ssl' => array(
			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => true
		)
	);



	$body             = 'Nueva iniciativa en su base de datos de ' . $_POST['nombre'];
	
	
	$mail->IsSMTP(); // telling the class to use SMTP
	$mail->Host       = "smtp.gmail.com"; // SMTP server
	//$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
	// 1 = errors and messages
	// 2 = messages only
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->SMTPSecure = "tls";                 // sets the prefix to the servier
	$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
	$mail->Port       = 587;                   // set the SMTP port for the GMAIL server
	$mail->Username   = "email";  // GMAIL username
	$mail->Password   = "clave";            // GMAIL password
	$mail->SetFrom('email', 'Alerta contacto por formulario');
	$mail->AddReplyTo("email","envio");
	$mail->Subject    = "Nuevo contacto por formulario";
	$mail->AltBody    = "Para ver el mensaje utilice un email compatible con html"; // optional, comment out and test
	$mail->MsgHTML($body);
	$address = "email";
	$mail->AddAddress($address, "Iniciativas");
	$mail->CharSet = 'UTF-8';
	if($mail->Send()) {
		echo "Solicitud enviada";
	}else{//en este caso se ha guardado pero no ha sido enviado el correo
		echo "En breve recibirá una respuesta";
	}

}

	/**
	*
	* CORREO AL CLIENTE POR CONTACTO WEB 
	*
	**/
function enviarCorreoCliente(){
	//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded
	$mail             = new PHPMailer();
	
		//para el autofirmado
	$mail->SMTPOptions = array(
		'ssl' => array(
			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => true
		)
	);
	
	$nombre 		  = $_POST['nombre'];
	$body             = '<p>Estimado ' . $nombre . ' , </p> . <p>Hemos recibido su petición, en breve recibirá; una respuesta</p> ';
	$body 			 .="<hr><p>FamInsurance SL</p><p>NIF 32XXXXXXXX</p><p>Avenida Páncreas 2017 888D 15000 A Coruña</p>";	
	
	
	
	$mail->IsSMTP(); // telling the class to use SMTP
	$mail->Host       = "smtp.gmail.com"; // SMTP server
	//$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
	// 1 = errors and messages
	// 2 = messages only
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->SMTPSecure = "tls";                 // sets the prefix to the servier
	$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
	$mail->Port       = 587;                   // set the SMTP port for the GMAIL server
	$mail->Username   = "email";  // GMAIL username
	$mail->Password   = "pass";            // GMAIL password
	$mail->SetFrom('email', 'email');
	$mail->AddReplyTo("email","contacto");
	$mail->AltBody    = "Para ver el mensaje utilice un email compatible con html"; // optional, comment out and test
	$mail->MsgHTML($body);
	$mail->Subject    = "Contacto FamInsurance";
	$address = $_POST['email'];
	$mail->AddAddress($address, $nombre);
	$mail->CharSet = 'UTF-8';
	
	
	if($mail->Send()) { //sólo si sale el correo respuesta
		echo "</br></br>Un mensaje automático ha sido enviado a su dirección de correo";
	} 



}


	/**
	*
	* CORREO ACTIVACIÓN CUENTA
	*
	**/
function enviarCorreoActivacion($dominio,$cadena,$email){
	//include("class.smtp.php"); 
	$mail             = new PHPMailer();
		//para el autofirmado
	$mail->SMTPOptions = array(
		'ssl' => array(
			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => true
		)
	);
	
	
	
	$link 			  = $dominio;
	$link			  .= "activarregistro.php?cadena=$cadena";
	$body          	 = '<p>Para activar su cuenta, click en el siguiente enlace: ';
	$body 			.= "<a href='$link' target='blank'>$link</a></p>";
	$body 			.="<p>¿Problemas con el enlace?</p>";
	$body 			.="<p>Copie y pegue el siguiente enlace en su navegador:</p>";
	$body			.=	"http://".$link."";
	$body 			 .="<hr><p>FamInsurance SL</p><p>NIF 32XXXXXXXX</p><p>Avenida Páncreas 2017 888D 15000 A Coruña</p>";

	$mail->IsSMTP(); // telling the class to use SMTP
	$mail->Host       = "smtp.gmail.com"; // SMTP server
	//$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
	// 1 = errors and messages
	// 2 = messages only
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->SMTPSecure = "tls";                 // sets the prefix to the servier
	$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
	$mail->Port       = 587;                   // set the SMTP port for the GMAIL server
	$mail->Username   = "email";  // GMAIL username
	$mail->Password   = "pass";            // GMAIL password
	$mail->SetFrom('email', 'Activacion cuenta');
	$mail->AddReplyTo("email","envio");
	$mail->AltBody    = "Para ver el mensaje utilice un email compatible con html"; // optional, comment out and test
	$mail->MsgHTML($body);
	$mail->Subject    = "Active su cuenta en faminsurance";
	$mail->AddAddress($email, "nuevocliente");


	$mail->CharSet = 'UTF-8';
		if($mail->Send()) { //sólo si sale el correo respuesta
			echo "<br><br>Un enlace de activacion ha sido enviado a su dirección de correo";
		} 
	}


	

	

?>