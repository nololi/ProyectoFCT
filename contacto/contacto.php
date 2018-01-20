<?php
	require_once("../conexion/conexion.php");
	require_once("../email/enviarcorreogmail.php");
	require_once("../filtrar/filtrar.php");
	$conexion= crearConexion();
	$error = $conexion->connect_errno;
	$fecha = date("Y-m-d H:i:s"); 
	
	//filtrar $_POST =>seguridad htmlspecialchars 
	foreach($_POST as $clave => $valor){
		$_POST[$clave]=filtrar($valor);		
	}
	
	if ($error != null) {
			echo "Error enviando el correo";
			exit();
	}else{
		//la hora se pone auto
		$consulta ="INSERT INTO iniciativas (nombre,email,telefono,asunto,mensaje,idproducto) values (";
		$consulta .= "'" . $_POST['nombre'] . "','" . $_POST['email'] . "','". $_POST['telefono'];
		$consulta.=	 "','". $_POST['asunto'];   
		$consulta .= "','". $_POST['mensaje']  ."','". $_POST['idcategoria'] . "')";
		
		//guardo en la bd y envío los correos 
		if($conexion->query($consulta)==true){				
				enviarCorreo();
				enviarCorreoCliente();			
		}else{
			echo "Error al enviar, puede enviarnos un correo a <a href='mailto:faminsurancecontacto@gmail.com'>faminsurancecontacto@gmail.com</a>";
		}
		
	}

?>