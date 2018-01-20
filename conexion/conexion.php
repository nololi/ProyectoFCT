<?php		


	/**
	
		ESTA ES LA FUNCIÓN DE CONEXIÓN PARA TODAS LAS CONSULTAS A LA BASE DE DATOS. SE CAMBIA AQUÍ CUALQUIER CAMBIO
	
	*/
	function crearConexion(){       
        //Creando la conexión, nuevo objeto mysqli
        $conexion = new mysqli('servidor', 'user', 'contra', 'bd');
		$conexion->set_charset("utf8"); //para las´ñ
        //Si sucede algún error la función muere e imprimir el error
        if($conexion->connect_error){
            die("Error en la conexion : ".$conexion->connect_errno.
                                      "-".$conexion->connect_error);
        }
        //Si nada sucede retornamos la conexión
        return $conexion;
    }
?>