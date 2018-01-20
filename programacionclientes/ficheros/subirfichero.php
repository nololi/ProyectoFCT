<?php
	session_start();
	require_once("../../conexion/conexion.php");
	$conexion = crearConexion();	
	
	$extensionarchivo=preg_split("/\./",$_FILES['archivo']['name']);
	$extension = $extensionarchivo[1];	//extensión archivo
	$imagen_temporal = $_FILES['archivo']['tmp_name'];	
	
	if($extension =="jpg" || $extension=="png" || $extension =="gif"){			
			// Leemos el contenido del archivo temporal en binario.
			$ficheroimagen = fopen($imagen_temporal, 'r+b');
			$datosbinario = fread($ficheroimagen, filesize($imagen_temporal));
			fclose($ficheroimagen);
			// Escapamos los caracteres para que se puedan almacenar en la base de datos correctamente.
			$datosbinario = mysqli_real_escape_string($conexion,$datosbinario);		
			$consulta = "INSERT INTO imagenes (imagen, tipo_imagen) VALUES ('$datosbinario', '$extension')";
			if($conexion->query($consulta)===TRUE){
				echo true;
			}else{
				echo false;
			}			
	}
	else{
			echo false;
		
	}
	

?>