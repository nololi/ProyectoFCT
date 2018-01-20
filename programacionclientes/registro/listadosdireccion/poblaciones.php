<?php
	require_once("../../../conexion/conexion.php");	
	$conexion = crearConexion();
	$error = $conexion->connect_errno;
	$codigopostal = $_POST['codigopostal'];
	//$codigopostal='15';
	
	$listadopoblaciones =array();	
	if ($error != null) {
				echo "<p>Error  </p>";
				exit();
	}else{	
		$consulta ="SELECT *  FROM poblaciones where cp='$codigopostal'";	

		//$consulta ="SELECT *  FROM poblaciones where codigopostal='15'";
		$listadopoblaciones = array();
		$resultados = $conexion->query($consulta);
		while($valor = $resultados->fetch_assoc()){				
			array_push($listadopoblaciones,$valor['poblacion']);
		}	
		//Seteamos el header de "content-type" como "JSON" para que jQuery lo reconozca como tal
		header('Content-Type: application/json; charset=utf-8');		
		echo json_encode($listadopoblaciones);		
	}
	
	
	
	
	
	
	
	
?>