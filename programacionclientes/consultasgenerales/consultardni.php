<?php
		function consultarDni(){
		
		$conexion = crearConexion();
		$error = $conexion->connect_errno;	
		if ($error == null) {
			//buscar el dni
			$consulta= "SELECT dni from clientes where email= " . "'" . $_SESSION['email'] ."'";
			$resultado = $conexion->query($consulta);
			$valores = $resultado->fetch_assoc();		
			$dni = $valores['dni'] ;
			return $dni;
		}
		
	}

?>