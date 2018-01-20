<?php
	require_once("../../conexion/conexion.php");
	require_once("../../filtrar/filtrar.php");
	session_start();
	$conexion= crearConexion();
	$error = $conexion->connect_errno;


		
		//filtrar $_POST 
	foreach($_POST as $clave => $valor){
			$_POST[$clave]=filtrar($valor);		
	}
	$email = $_POST['email'];
    $contra  = md5($_POST['password']);
	
	
		if ($error != null) {
				header('Content-Type: application/json; charset=utf-8');
				$datos = array(
								'estado' => 'Error conectando a la base de datos',
								'pagina' => 'nada'
							);
				//Devolvemos el array pasado a JSON 
				echo json_encode($datos);			
				exit();
		}else{			
			$sql = "SELECT * from usuario where email = " . "'" . $email . "'" . " and password = " . "'" . $contra ."'" ;	
			$resultado = $conexion->query($sql);
			$valor = $resultado->fetch_assoc();	
				if($valor){	//si hay valores es correcto 
				
				
						//¿cuenta activada?
						if($valor['activo']=="NO"){
							//Seteamos el header de "content-type" como "JSON" para que jQuery lo reconozca como tal
							header('Content-Type: application/json; charset=utf-8');
							$datos = array(
								'estado' =>  'No ha activado su cuenta',
								'pagina' => " nada"
							);
							echo json_encode($datos);
						}else{	

						
							//Seteamos el header de "content-type" como "JSON" para que jQuery lo reconozca como tal
							header('Content-Type: application/json; charset=utf-8');
							//Guardamos los datos en un array
							$datos = array(
								'estado' => 'Redirigiendo',
								'pagina' => $_SESSION['paginaactual']
							);
							//Devolvemos el array pasado a JSON 
							echo json_encode($datos);								
							//guardo los datos de conexión en la tabla conexiones
							$sql = "INSERT INTO conexiones (email,ipLogin) VALUES ('$email','". $_SERVER['REMOTE_ADDR'] ."')"; 							
							$conexion->query($sql);							
							//sesión on 
							$_SESSION['email']=$email; 													
						}						
				}	
				else{					
					//Seteamos el header de "content-type" como "JSON" para que jQuery lo reconozca como tal
							header('Content-Type: application/json; charset=utf-8');
					$datos = array(
								'estado' =>  'Usuario y/o contraseña errónea',
								'pagina' => " nada"
							);
					echo json_encode($datos);					
				}		
		}
?>