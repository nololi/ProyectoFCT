<?php				
		require_once("../../../conexion/conexion.php");		
		//require_once("registropoblacionprovincia.php");
		require_once("../../../email/enviarcorreogmail.php");		
		require_once("../../../filtrar/filtrar.php");
		
		//filtrar $_POST 
		foreach($_POST as $clave => $valor){
			$_POST[$clave]=filtrar($valor);		
		}
			
		//fecha nacmiento para saber si más 18
		$fechanacimiento = $_POST['fechanacimiento'];
		//fecha actual 
		$fecha = getDate();	
			




			
		if($fecha['year']-substr($fechanacimiento,0,4)<18){ //primero compruebo el año
			echo "No puede registrarse debido a que no posee la edad mínima de contratación";
		}
		else if($fecha['year']-substr($fechanacimiento,0,4)==18){ //si el año que cumple 18
				$mesintroducido = substr($fechanacimiento,5,2);				
				 if(substr($fechanacimiento,5,1)==0){
					$mesintroducido=substr($fechanacimiento,6,1);
				}			
				$diaintroducido = substr($fechanacimiento,8,2);				
				if(substr($fechanacimiento,8,1)==0){
					$diaintroducido = substr($fechanacimiento,9,1);
				}	
			
				//compruebo el mes y dia
				if($fecha['mon']<$mesintroducido){
					echo "No puede registrarse debido a que no posee la edad mínima de contratación mes";						
				}
							
				else if($fecha['mon']==$mesintroducido && $fecha['mday']<$diaintroducido){
					echo "No puede registrarse debido a que no posee la edad mínima de contratación dia";
				}
				else{//si
					registrarse();
				}
		}		
		else{//si es mayor de edad			
			registrarse();
		}
		
		
		
		
		
		
		function registrarse(){
			//ip	
			$clienteIp = $_SERVER['REMOTE_ADDR'];
			$conexion = crearConexion();	
			$error = $conexion->connect_errno;
			if ($error != null) {
				echo "<p>Error $error conectando a la base de datos</p>";
				exit();
			}else{			
					/***
					*****
					****VARIABLES
					***
					*/								
					$dni = $_POST['dni'];
					$nombre = $_POST['nombre'];
					$direccion = $_POST['direccion'];
					$email = $_POST['email'];
					$telefono = $_POST['telefono'];				
					$sexo = $_POST['sexo'];
					$codigopostal = $_POST['codigopostal'];
					$fechanacimiento = $_POST['fechanacimiento'];
					$provincia = $_POST['provincia'];
					$poblacion =$_POST['poblacion'];
					
					
					//primero compruebo si ya existe
					if(comprobarExiste($conexion,$email,$dni)==1){
							return false;
					}
					//si no he salido, no existe:  registro 					
									
						//obtener el código provincia 
				
					$consulta = "SELECT `idprovincia` FROM `provincias` WHERE provincia='$provincia'";				
					$resultados = $conexion->query($consulta);
					$valor =$resultados->fetch_assoc();
					$provinciaid = $valor['idprovincia'];					
						//obtener el código  población	
					$consulta = "SELECT `idpoblacion` FROM `poblaciones` WHERE poblacion='$poblacion'";			
					$resultados = $conexion->query($consulta);
					$valor =$resultados->fetch_assoc();
					$poblacionid = $valor['idpoblacion'];	
						
					
					
						$consulta = "INSERT INTO usuario (email, password,ipRegistro,activo) values (" ."'".$_POST['email']."'".  ", '". md5($_POST['contrasena']) . "','$clienteIp','NO')";		
						$cadena = crearCadena(); //cadena activacion
						$consultaCadena ="INSERT INTO activarusuarios values(" ."'".$_POST['email']."'". ",'$cadena')";	
						
						if ($conexion->query($consulta) === TRUE && $conexion->query($consultaCadena)) {					
						
							
							//fecha actual 
							$fecha = getDate();	
							$fechaalta= $fecha['year'] ."-". $fecha['mon'] . "-" .$fecha['mday'];	
							


							/**
							*****
							*****GRABAR  CLIENTE
							*/
							$consulta2 = "INSERT INTO clientes VALUES ('$dni', '$nombre', '$direccion', '$email','$telefono', '$poblacionid', '$provinciaid', '$fechaalta', '$sexo', '$codigopostal','$fechanacimiento')";	
							//echo $consulta2;									
							if ($conexion->query($consulta2) === TRUE) {
									echo "Registro completado";
									//si registro completado mando email de confirmación, en local es localhost/
									$dominio = "localhost/";
									enviarCorreoActivacion($dominio,$cadena,$email);
							} else {
									echo "Hubo algún error en su registro ";						
									$consulta = "DELETE from usuario where email ='$email'";						
									$conexion->query($consulta);						
									$consulta = "DELETE from activarusuarios where email ='$email'";
									$conexion->query($consulta);
							}
						}
			}
	
		}
		
		
		
		
		function crearCadena(){//cadena para el email
			$source = 'abcdefghijklmnopqrstuvwxyz';
			$source .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$source .= '1234567890';
			$source .= '()=91;93;{}';
			$cadena = "";
			for($i=0;$i<20;$i++){
				$numero = rand(0, 73);
				$cadena .= substr($source,$numero,1);
			}
			
			return $cadena;
		}
			
			
		function comprobarExiste($conexion,$email,$dni){
				$consultaExiste = "SELECT `dni`,`email` FROM `clientes` WHERE email='$email' OR dni='$dni'";				
				$resultado = $conexion->query($consultaExiste);
				if($resultado->num_rows!=0){
					echo "El usuario o el email ya está registrado";
					return 1;
				}
				
				
		}
			
		
		
?>