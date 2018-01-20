<?php
	/*
	
		Aquí actualiza los datos del cliente logado desde el formulario 
	
	*/
	require_once("../../conexion/conexion.php");
	require_once("../../filtrar/filtrar.php");		
	session_start();
	
	$conexion= crearConexion();
	$error = $conexion->connect_errno;

	
	
	
	
	//filtro lo que contiene el array $_POST
	foreach ($_POST as $clave=>$valor)
   	{
		$_POST[$clave] = filtrar($valor);
   	}
	

	
	
	//si he conectado a la bd consulto y actualizo 
		if ($error != null) {
				echo "<p>Error $error conectando a la base de datos</p>";
				exit();
		}else{
			
			//por claridad para mí variables que se pueden modificar 
				$email = $_POST['email'];
				$contra  = md5($_POST['password']);
				$telefono = $_POST['telefono'];
				$contraantigua = md5($_POST['passwordviejo']);
			
			
			
			
			//primero tengo que comprobar que la contraseña vieja coincide
			$compruebacontrasena = "SELECT * from usuario where email = " . "'" . $_SESSION['email'] ."' AND password ='$contraantigua'";			
			$resultado = $conexion->query($compruebacontrasena);
			
			
			if($resultado->num_rows==1){ //si tengo resultados tendré 1 row			



				/* escribo la consulta*/
					$sql = "UPDATE usuario SET email='". $email."'";					
						//sólo actualizo la contraseña si la he puesto en el formulario					
						if(strlen($_POST['password'])!=0){ //uso strlen no puedo poner la $contra porque el caracter en blanco tiene codificación
							$sql .= ",password ='". $contra. "'"; 
						}				
					$sql .=  "where email = " . "'" . $_SESSION['email'] ."'" ;		
					
					
				/* si ejecución  consulta ok */
				if($conexion->query($sql)){	
					//el email lo cambia en cascade, sólo actualizo aquí, el resto lo hace la base de datos 			
					$sql = "UPDATE clientes SET telefono ='". $telefono. "', email='". $email."' where dni = " . "'" . $_POST['dni'] ."'" ;					
					if($conexion->query($sql)){
						$_SESSION['email']=$email; //por si ha cambiado el email, tengo que cambiar la variable de sesión 									
						echo "Datos cambiados";	
					}else{
						echo "no se ha podido cambiar teléfono";
					}					
				}
				else{
					echo "no se ha podido cambiar email";
				}				
			}else{
					echo "Contraseña actual no coincide";
				
			}
	
		}

			
?>