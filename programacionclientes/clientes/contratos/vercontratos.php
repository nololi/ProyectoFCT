<?php
	require_once("programacionclientes/consultasgenerales/consultardni.php");
	/**
	**
	**	MOSTRAR CONTRATOS DE UN CLIENTE 
	**
	*/
	
	
	
	function contratosImprimir(){		
		$conexion = crearConexion();
		$error = $conexion->connect_errno;	

		
		if ($error != null) {
					echo "<p>Error $error conectando a la base de datos</p>";
					exit();
		}else{				
			$consultaDatosCliente = "SELECT * from clientes as clie RIGHT JOIN poblaciones ON poblaciones.idpoblacion = clie.idpoblacion
									RIGHT JOIN provincias ON provincias.idprovincia = clie.idprovincia where dni ="."'". consultarDni()  . "'";
			$resultados = $conexion->query($consultaDatosCliente);
			$valor =$resultados->fetch_assoc(); //sólo puede dar 1


 			/* $TABLA = LO QUE SE VA A MOSTRAR*/
			
			$tabla ="<div class='relativoizquierda'>";
			$tabla .="<p><span class='negrita'>DNI  </span><span class='text-muted'>" . consultarDni() . "</span></p>";
			$tabla .= "<p><span class='negrita'>Nombre y apellidos </span><span class='text-muted'>" . ucwords($valor['nombre']) ."</span></p>";
			$tabla .= "<p><span class='negrita'>Fecha de nacimiento </span>  <span class='text-muted'>" . $valor['FN'] ."</span></p>";
			$tabla .= "<p><span class='negrita'>Email </span><span class='text-muted'>" . $valor['email'] ."</span></p>";
			$tabla .= "<p><span class='negrita'>Teléfono </span><span class='text-muted'>" . $valor['telefono'] ."</span></p>";
			$tabla .= "<p><span class='negrita'>Dirección </span><span class='text-muted'>" . ucwords($valor['direccion']) ."</span></p>";
			$tabla .= "<p><span class='negrita'>Población </span><span class='text-muted'>" . ucwords($valor['poblacion']) ."</span></p>";
			$tabla .= "<p><span class='negrita'>Provincia </span><span class='text-muted'>" . ucwords($valor['provincia']) ."</span></p>";
			$tabla .= "<p><span class='negrita'>Código postal </span> <span class='text-muted'>" . $valor['codigopostal'] ."</span></p>";			
			$tabla .= "</div>";
			$tabla .="<div class='relativoderecha'>";
			$tabla .="<img src='images/1.gif' alt='FamInsurance SL' class='img-responsive img-rounded thumbnail'/>";
			$tabla .="<p class='text-primary negrita'>FamInsurance SL</p>";
			$tabla .="<p>NIF 32XXXXXXXX</p>";
			$tabla .="<p>Avenida Páncreas 2017 888D</p>";
			$tabla .="<p>15000 A Coruña</p>";
			$tabla .="</div>";		
			$tabla .= "<hr class='margen40arriba'>";
			$tabla .="<h2 class='text-center bg-primary'>Desglose de coberturas </h2>";
			$tabla .= "<hr class='margen5debajo'>";
			$tabla .= "<p> <span class='negrita'>Número contrato : </span> &nbsp;<span class='text-muted'>" .$_GET['codigo']."</span></p>";
		
			
				//consulta contratos 
				$consultaContratos = "SELECT * from contratos RIGHT JOIN producto ON contratos.idproducto = producto.idproducto  where numerocontrato ='" .$_GET['codigo'] ."'";			
				$resultadosContrato = $conexion->query($consultaContratos);
				//sólo puede salir 1 contrato con ese numero
				$valoresContrato =$resultadosContrato->fetch_assoc();	

			
			$tabla .= "<p><span class='negrita'>Fecha contrato : </span> &nbsp;<span class='text-muted'>" . $valoresContrato['fechacontrato'] ."</span></p>";
			$tabla .="<p><span class='negrita'>Tipo contrato : </span>&nbsp; <span class='text-muted'>" . $valoresContrato['nombreproducto'] ."</span></p>";
			$tabla .="<p><span class='negrita'>Total anual: </span>&nbsp; <span class='text-muted'>" . $valoresContrato['primaanual'] ."€</span></p>";	
			
			
				/*Contrato detalle*/
				$consultaDetalleContratos = "SELECT * from contratodetalle  as cd RIGHT JOIN producto as pro ON cd.idproducto = pro.idproducto
											 where numerocontrato ='" .$_GET['codigo'] ."'";	
				$resultadosDetalleContrato = $conexion->query($consultaDetalleContratos);
			
			
			
			$tabla .= "<table class='margen5'>";
			$tabla .="<caption>*Contrato vigente </caption>";
			$tabla .="<tr><th>Cobertura </th>";
			$tabla .="<th>Capital </th>";
			$tabla .="<th>Prima Anual </th></tr>";
			
			while($valoresDetalle = $resultadosDetalleContrato->fetch_assoc()){
			
				$tabla .="<tr>";
				$tabla .="<td>";
				if($valoresDetalle['idproducto']==1)//esto es el detalle por coberturas que sólo pueden ser 2 
					$tabla .= "Vida";
				if($valoresDetalle['idproducto']==2)
					$tabla .= "Accidentes";				
				$tabla .="</td>";
				$tabla .="<td>";
					$tabla .=$valoresDetalle['capital'];
				$tabla .=" € </td>";
				$tabla .="<td>";
					$tabla .=$valoresDetalle['precio'];
				$tabla .=" € </td>";
				$tabla .="</tr>";
				
			}
			
			$tabla .="</table>";			
			$tabla .="<p><small>FamInsurance SL, NIF 32XXXXXXXX con domicilio social Avenida Páncreas 2017 888D 15000 A Coruña
					  e inscrita en el registro mercantil de A Coruña Tomo 00 Folio 00 Hoja 00000</small></p>";
					  
			echo $tabla;
			
			
			
		}
	}
	

	



?>