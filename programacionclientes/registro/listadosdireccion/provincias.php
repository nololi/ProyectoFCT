<?php
	require_once("../../../conexion/conexion.php");	
	$conexion = crearConexion();
	$error = $conexion->connect_errno;
	
	$listadoprovincias =array();
	
	if ($error != null) {
				echo "<p>Error  </p>";
				exit();
	}else{	
		$consulta ="SELECT *  FROM provincias";		
		$listadoprovincias = array();
		$resultados = $conexion->query($consulta);
		while($valor = $resultados->fetch_assoc()){			
			$valores = array('provincia' => $valor['provincia'],'cp'=>$valor['cp']);
			array_push($listadoprovincias,$valores);
		}	
		//Seteamos el header de "content-type" como "JSON" para que jQuery lo reconozca como tal
		header('Content-Type: application/json; charset=utf-8');		
		echo json_encode($listadoprovincias);		
	}
	
	
	
	
	
	
	
	
?>