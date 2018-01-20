<?php
	require_once("../../conexion/conexion.php");
	require_once("../../filtrar/filtrar.php");
	session_start();
	$conexion = crearConexion();
	
	
	
	
	//variable ver si tiene ya algo contratado y si repite
	$encontrado =false;
	
	
	
	/*
		DATOS QUE RECIBO 
	*/
	
	//separo las cuotas
	$cuotas = explode(',',$_POST['cuota'],3);	
	//creo los $_POST DE LAS CUOTAS por los valores;
	$_POST['cuota'] = $cuotas[0];
	$_POST['cuotaaccidentes'] = $cuotas[1];
	$_POST['cuotavida'] = $cuotas[2];
	
	//filtrar $_POST  por si acaso mete SCRIPTS 
	foreach($_POST as $clave => $valor){
		$_POST[$clave]=filtrar($valor);
		
	}
	
	$capital = $_POST['capital'];
	$producto = $_POST['producto'];
	$cuota = $_POST['cuota'];
	$cuotaaccidentes = $_POST['cuotaaccidentes'];	
	$cuotavida = $_POST['cuotavida'];
	$datosbancarios = $_POST['datosbancarios'];	
	//buscar el dni
	$consulta= "SELECT dni from clientes where email= " . "'" . $_SESSION['email'] ."'";
	$resultado = $conexion->query($consulta);
	$valores = $resultado->fetch_assoc();		
	$dni = $valores['dni'] ;	
	
	
	
	
	//consulto el id de la imagen_id
	$resultados= $conexion->query("SELECT MAX(imagen_id) from imagenes");
	$imagen =$resultados->fetch_assoc(); 
	$imagenid = $imagen['MAX(imagen_id)'];		
		
	
	
	
	
	
	
	//primero hago una consulta para comprobar cuantos contratos por dni tenemos
	$consultacontratos = "SELECT * from contratos where dni ='$dni'";
	$resultados = $conexion->query($consultacontratos);
	while($valor=$resultados->fetch_assoc()){
		if($producto==3 && ($valor['idproducto']==3 || $valor['idproducto']==2 || $valor['idproducto']==1)){
			echo "No puede contratar, ya tiene un contrato vigente o la cobertura cubierta con Dual Plus";
			$conexion->query("DELETE FROM imagenes where imagen_id='$imagenid'"); //elimino la imagen 
			$encontrado=true;
			break;
		}
		if($producto==2 && ($valor['idproducto']==2 || $valor['idproducto']==3)){
			echo "No puede contratar, ya tiene un contrato vigente o la cobertura cubierta con Dual Plus";
			$conexion->query("DELETE FROM imagenes where imagen_id='$imagenid'");
			$encontrado=true;
			break;
		}
		if($producto==1 && ($valor['idproducto']==1 || $valor['idproducto']==3)){
			echo "No puede contratar, ya tiene un contrato vigente o la cobertura cubierta con Dual Plus";
			$conexion->query("DELETE FROM imagenes where imagen_id='$imagenid'");			
			$encontrado=true;
			break;
		}
		
	}

		/*
			CREA CONTRATO  SI NO HAY CONTRATOS DE COBERTURAS
		*/
	
	if($encontrado==false){
		//creo el número de contrato
		$numerocontrato = crearNumContrato($dni);		
		//llamo al método grabar contrato
		grabarContrato($numerocontrato,$capital,$producto,$cuota,$cuotaaccidentes,$cuotavida,$datosbancarios,$dni,$imagenid,$conexion);

	}	
	
	
	
	
	
	
	
	
	
	
	
	/*
		FUNCIONES
	*/
	
	function crearNumContrato($dni){		
		//númerocontrato al azar por fecha y hora más letra dni
		$fecha = getDate();		
		//añadir dígitos si sólo tiene 1
		if(strlen($fecha['mon'])==1)
			$fecha['mon'] = "0" . $fecha['mon'];
		if(strlen($fecha['mday'])==1)
			$fecha['mday'] = "0" . $fecha['mday'];
		if(strlen($fecha['hours'])==1)
			$fecha['hours'] = "0" . $fecha['hours'];		
		$numerocontrato = $fecha['year'] . $fecha['mon']  .$fecha['mday'] . substr($dni,8) . (rand(10,99));		
		return $numerocontrato;
	}
	
	
	
		/*
		
			GRABACIÓN CONTRATO POR TIPO
		 
		*/
	function grabarContrato($numerocontrato,$capital,$producto,$cuota,$cuotaaccidentes,$cuotavida,$datosbancarios,$dni,$imagenid,$conexion){	
		
		//si es tipo 1 y 2 sólo hay un registro en contratodetalle		
		if($producto==1 || $producto==2){			
			$consultaContrato = "INSERT into contratos (numerocontrato, cobrado, primaanual, dni,idproducto,datosbancarios,imagen_id) values ('$numerocontrato','0','$cuota','$dni','$producto','$datosbancarios','$imagenid')";	
			//echo $consultaContrato;			
			$consultaContratoDetalle = "INSERT into contratodetalle values ('','$numerocontrato','$capital','$cuota','$producto')";					
			//echo $consultaContrato;
			if ($conexion->query($consultaContrato) === TRUE) {
				if ($conexion->query($consultaContratoDetalle) === TRUE) {							
							echo "Petición realizada";
				}else{
					echo "Error al contratar";						
					$conexion->query("DELETE FROM imagenes where imagen_id='$imagennid'");					
				}
			}
			else{
				echo "Error al contratar";
				$conexion->query("DELETE FROM imagenes where imagen_id='$imagennid'");				
			}		
		}
		else{ //tipo 3
			$consultaContrato = "INSERT into contratos (numerocontrato, cobrado, primaanual, dni,idproducto,datosbancarios,imagen_id) values ('$numerocontrato','0','$cuota','$dni','3','$datosbancarios','$imagenid')";								
			$consultaContratoDetalle = "INSERT into contratodetalle values ('','$numerocontrato','$capital','$cuotavida','1')";	//el primero tiene un 1
			$capital2 = $capital*2;
			$consultaContratoDetalle2 ="INSERT into contratodetalle values ('','$numerocontrato','$capital2','$cuotaaccidentes','2')";				
			if ($conexion->query($consultaContrato) === TRUE) {
				if ($conexion->query($consultaContratoDetalle) === TRUE && $conexion->query($consultaContratoDetalle2) === TRUE ){							
							echo "Petición realizada";
				}else{
					echo "Error al contratar";	
					$conexion->query("DELETE FROM imagenes where imagen_id='$imagennid'");					
				}
			}
			else{
				echo "Error al contratar";
				
			}		
			
			
		}
		
	}

?>