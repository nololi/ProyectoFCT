<?php
	require_once("../../conexion/conexion.php");
	session_start();


	
	
	if($_POST['producto']==1){		
		consultarMultiplicador("multiplicadorvida");		
	}else if($_POST['producto']==2){
		consultarMultiplicador("multiplicadoraccidentes");		
	}
	else{		
		consultarMultiplicador("multiplicadordual");
	}
	
	
	
	//buscar multiplicador de producto 
	function consultarMultiplicador($tabla){		
		$conexion = crearConexion();
		$consulta = "SELECT multiplicador from $tabla where capital ='".$_POST['capital'] ."'";		
		$resultado = $conexion->query($consulta);
		$valor = $resultado->fetch_assoc();		
		
		
		//producto life plus
		if($tabla=="multiplicadorvida"){
			$prima = ($_POST['edad'])*($valor['multiplicador']); //prima inicial
			$consultaimpuesto = "SELECT multiplicador from impuestos where impuesto='consorcio'";		
			$resultadoimpuesto = $conexion->query($consultaimpuesto);
			$valorimpuesto = $resultadoimpuesto->fetch_assoc();	
			$prima *=$valorimpuesto['multiplicador'];
			
			$datos = array(
					'prima' => round($prima,2)								
			);			
		}
		else if($tabla=="multiplicadoraccidentes"){//producto acc plus
			$prima = ($_POST['edad'])*($valor['multiplicador']);//prima inicial
			$consultaimpuesto = "SELECT multiplicador from impuestos";		
			$resultadoimpuesto = $conexion->query($consultaimpuesto);
			
			while($valorimpuesto = $resultadoimpuesto->fetch_assoc())	
				$prima *=$valorimpuesto['multiplicador']; //multiplico por los dos
			
			$datos = array(
					'prima' => round($prima,2)								
			);
			
		}else{//si es mixto cada uno aplica un multiplicador, o los dos			
			$consultaconsorcio = "SELECT multiplicador from impuestos where impuesto='consorcio'";		
			$resultadoconsorcio = $conexion->query($consultaconsorcio);
			$valorconsorcio = $resultadoconsorcio->fetch_assoc();		
			
			$consultaIPS = "SELECT multiplicador from impuestos where impuesto='IPS'";		
			$resultadoIPS = $conexion->query($consultaIPS);
			$valorIPS = $resultadoIPS->fetch_assoc();
			
			$primavida = ($_POST['edad'])*($valor['multiplicador']);
			$primaaccidentes  =  ($_POST['edad'])*$valorIPS['multiplicador']*$valor['multiplicador']/10;				
			$prima = $primavida + $primaaccidentes;
			$datos = array(
						'prima' => round($prima,2),
						'primaaccidentes' =>  round($primaaccidentes,2),
						'primavida' =>  round($primavida,2)
								
			);
			
			
		}
			//Seteamos el header de "content-type" como "JSON" para que jQuery lo reconozca como tal
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($datos);
	
	}



?>