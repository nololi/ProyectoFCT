<?php
	
	
		require_once("programacionclientes/consultasgenerales/consultardni.php");
		
	/*********************************************************************************************
	***** esto muestra los contratos en formato movil, tiene otros estilos diferentes al tamaño pc
	*****
	*********************************************************************************************/
	
	function mostrarContratosMini(){		
		$conexion = crearConexion();
		$error = $conexion->connect_errno;		
		if ($error != null) {
					echo "<p>Error $error conectando a la base de datos</p>";
					exit();
			}else{				
				$tabla ='<table>';
				$tabla .='<caption>Contratos vigentes</caption>';
				$tabla .="<thead><tr>";
				$tabla .="<th>Número contrato</th>";
				$tabla .="<th>Producto</th>";				
				$tabla .="<th>Fecha contrato</th>";
				$tabla .="<th>Prima anual</th>";
				$tabla .="<th>Capital</th>";
				$tabla .="<th>Cobrado</th>";				
				$tabla.="</tr></thead>";
				$consultacontratos = "SELECT * from contratos 
									INNER JOIN contratodetalle ON contratos.numerocontrato = contratodetalle.numerocontrato
									INNER JOIN producto ON contratodetalle.idproducto = producto.idproducto
									where dni ="."'". consultarDni(). "'";										
				$consultaContratoDetalle="SELECT COUNT(contratodetalle.numerocontrato) as total from contratodetalle 
									INNER JOIN contratos ON contratos.numerocontrato = contratodetalle.numerocontrato									
									where contratodetalle.numerocontrato =contratos.numerocontrato" ;



				//ejecución consultas
				$resultado = $conexion->query($consultacontratos);				
				$resultadotipoproducto = $conexion->query($consultaContratoDetalle);				
				
				
				$tipoproducto =  $resultadotipoproducto->fetch_assoc();	
				$cuenta=0; //para el bucle		
				
				if($resultado->num_rows==0){//consulta contrato 0 resultados
					echo "<h1 class='text-center'>Actualmente no tiene contratos</h1>";
					echo "<p class='text-center'><a href='contrate-un-producto' class='btn btn-default'>Ir a página de contrataciones </a></p>";
					echo "<p class='text-center'><a href='panel-de-cliente' class='btn btn-default'>Regresar </a></p>";							
				}
				else{//hay contratos
					while($valor=$resultado->fetch_assoc()){
						$consultatotal = "SELECT count(numerocontrato) as total from contratodetalle where numerocontrato = '". $valor['numerocontrato'] ."'";
						 $resultadoConsultaTotal= $conexion->query($consultatotal);	 
						 $contador = $resultadoConsultaTotal->fetch_assoc();						
						if($contador['total']==2){ // si numerocontrato aparece dos veces en contrato detalle -> es un dual plus 					
							if($cuenta==0){
								$tabla .= "<tr>";
								$tabla .="<td data-label='Nº contrato'>" . $valor['numerocontrato'] . "</td>";
								$tabla .="<td data-label='Fecha'>" . $valor['fechacontrato'] . "</td>";
								$tabla .="<td data-label='Producto'>Dual Plus</td>";												
								$tabla .="<td data-label='Capital Vida'>" . $valor['capital'] ." €</td>";						
								$cuenta++;	//incremento la cuenta 	para la segunda vuelta, si no hago esto la tabla aparece 2 veces
							}else{				
								$tabla .="<td data-label='Capital Acc'>" . $valor['capital'] ." €</td>";  //añado celda con el segundo capital y lo que falta
								if($valor['cobrado']==0)
									$tabla .="<td data-label='Cobrado'>No</td>";
								else	
									$tabla .="<td data-label='Cobrado'>Si</td>";
								$tabla .="<td  data-label='Prima'>" . $valor['primaanual'] . " €/año</td>";							
								$tabla .="</tr>";
							}						
						}else{	//si número contrato aparece 1 vez en contratodetalle -> contrato de 1 cobertura (acc o life)
							$tabla .= "<tbody><tr>";
							$tabla .="<td data-label='Nº contrato'>" . $valor['numerocontrato'] . "</td>";
							$tabla .="<td  data-label='Producto'>" . $valor['nombreproducto'] . "</td>";
							$tabla .="<td  data-label='Fecha'>" . $valor['fechacontrato'] . "</td>";
							$tabla .="<td data-label='Prima'>" . $valor['primaanual'] . " €/año</td>";
							$tabla .="<td data-label='Capital' >". $valor['capital'] ." €</td>";
							if($valor['cobrado']==0)
								$tabla .="<td data-label='Cobrado'>No</td>";
							else	
								$tabla .="<td data-label='Cobrado'>Si</td>";
							$tabla .="</tr></tbody>";
						}
					}
					$tabla .="</table>";
					echo "<h1 class='text-center text-primary subrayado'>Sus contratos</h1>";
					echo $tabla;
				}
			
		}
	}
	
	
	/**********************************************
	*****	Esto muestra los contratos a tamaño pc
	***********************************************/
	
	function mostrarContratos(){		
		$conexion = crearConexion();
		$error = $conexion->connect_errno;		
			if ($error != null) {
					echo "<p>Error $error conectando a la base de datos</p>";
					exit();
			}else{		
				//tabla
				$tabla ="<table class='table table-responsive table-striped' >";
				$tabla .='<caption> *Contratos vigentes </caption>';
				$tabla .="<tr>";
				$tabla .="<th class='text-center'>Número contrato</th>";
				$tabla .="<th class='text-center'>Fecha contrato</th>";
				$tabla .="<th class='text-center'>Producto</th>";					
				$tabla .="<th class='text-center'>Capital</th>";
				$tabla .="<th class='text-center'>Prima anual</th>";
				$tabla .="<th class='text-center'>Cobrado</th>";
				$tabla .="<th class='text-center'>Descargar contrato</th>";				
				$tabla.="</tr>";	
				
				
				
				//escribo y ejecuto consulta
				$consultacontratos = "SELECT * from contratos 
									INNER JOIN contratodetalle ON contratos.numerocontrato = contratodetalle.numerocontrato
									INNER JOIN producto ON contratodetalle.idproducto = producto.idproducto
									where dni ="."'". consultarDni() . "'";							
				$resultado = $conexion->query($consultacontratos);				
				$cuenta=0; //para el bucle
				
				
				
				
				
				if($resultado->num_rows==0){//sin resultados no contratos
					echo "<h1 class='text-center'>Actualmente no tiene contratos</h1>";	
					echo "<p class='text-center'><a href='contrate-un-producto' class='btn btn-default'>Ir a página de contrataciones </a></p>";
					echo "<p class='text-center'><a href='panel-de-cliente' class='btn btn-default'>Regresar </a></p>";
					
				}else{//hay contratos, como no se cuántos -> while
					while($valor=$resultado->fetch_assoc()){
						 
						 $consultatotal = "SELECT count(numerocontrato) as total from contratodetalle where numerocontrato = '". $valor['numerocontrato'] ."'";
						 $resultadoConsultaTotal= $conexion->query($consultatotal);	 
						 $contador = $resultadoConsultaTotal->fetch_assoc();


						// si numerocontrato aparece dos veces es un dual plus : 2 coberturas 						 
						if($contador['total']==2){ 
							if($cuenta==0){
								$tabla .= "<tr>";
								$tabla .="<td rowspan='2' class='text-center'>" . $valor['numerocontrato'] . "</td>";
								$tabla .="<td rowspan='2' class='text-center'>" . $valor['fechacontrato'] . "</td>";
								$tabla .="<td class='text-center'>" . $valor['nombreproducto'] . "</td>";							
								$tabla .="<td class='text-center'>" . $valor['capital'] ." €</td>";
								$tabla .="<td rowspan='2' class='text-center'>" . $valor['primaanual'] . " €/año </td>";
								
								if($valor['cobrado']==0) //contrato no cobrado 
									$tabla .="<td rowspan='2' class='text-center'>No</td>";
								else	
									$tabla .="<td rowspan='2' class='text-center'>Si</td>";	
								
								/*Número de contrato get para cada uno si los hay  */
								$tabla .="<td rowspan='2'>";
								$tabla .='<a href="descargarcontrato.php?codigo=' . $valor['numerocontrato'] . '">';								
								$tabla .="<i class='icon-print icon-2x impresion'></i>Ver contrato</a></td>";	
								/*Fin número de contrato get*/
								$tabla .="</tr>";								
								$cuenta++;
							}else{ //partiendo del rowspan anterior relleno en celdas nombreproducto y capital
								$tabla .= "<tr>";							
								$tabla .="<td class='text-center'>" . $valor['nombreproducto'] . "</td>";							
								$tabla .="<td class='text-center'>" . $valor['capital'] ." €</td>";										
								$tabla .="</tr>";
							}



							
						}else{	//producto de 1 cobertura 		
							$tabla .= "<tr>";
							$tabla .="<td class='text-center'>" . $valor['numerocontrato'] . "</td>";
							$tabla .="<td class='text-center'>" . $valor['fechacontrato'] . "</td>";
							$tabla .="<td class='text-center'>" . $valor['nombreproducto'] . "</td>";							
							$tabla .="<td class='text-center'>". $valor['capital'] ."</td>";
							$tabla .="<td class='text-center'>" . $valor['primaanual'] . "</td>";
						
							if($valor['cobrado']==0)
									$tabla .="<td class='text-center'>No</td>";
								else	
									$tabla .="<td class='text-center'>Si</td>";
							/*Número de contrato get para enlace */
								$tabla .="<td >";
								$tabla .='<a href="descargarcontrato.php?codigo=' . $valor['numerocontrato'] . '">';								
								$tabla .="<i class='icon-print icon-2x impresion'></i> Ver contrato</a></td>";	
							/*Fin número de contrato get*/
							$tabla .="</tr>";
						}
						
					}
					$tabla .="</table>";
					echo "<h1 class='text-center text-primary subrayado'>Sus contratos</h1>";
					echo $tabla;
				}
		}
	}

	
	
	/********************************************************************************
	*********	función para mostrar los datos del cliente 
	*********
	*********************************************************************************/
	
	function mostrarDatosCliente(){
		$conexion = crearConexion();
		$error = $conexion->connect_errno;		
		if ($error != null) {
					echo "<p>Error $error conectando a la base de datos</p>";
					exit();
		}
		else{
				
				$consultacliente = "SELECT * from clientes as clie RIGHT JOIN poblaciones ON poblaciones.idpoblacion = clie.idpoblacion
									RIGHT JOIN provincias ON provincias.idprovincia = clie.idprovincia where dni ='". consultarDni() . "'";									
				
				
				//array con campos para el div 
				$arreglo = array("dni","nombre","direccion","email","telefono","poblacion","provincia","fechaalta","sexo","codigopostal","FN");
				
				//formulario variable inicio 
				$formulario = "<form method='post' name='editarcliente' id='editarcliente' >";	
				
				$resultado = $conexion->query($consultacliente);
				
				/* creo el formulario dinámico a través de los datos obtenidos de la consulta */
					while($valor=$resultado->fetch_assoc()){
						
						for($contador=0;$contador<11;$contador++){//11 campos tabla
						
							if($contador==3 || $contador==4){ //tienen la clase modificar para jquery
								$formulario .="<div class='form-group'>";
									$formulario .="<label for='".$arreglo[$contador]."'>".ucwords($arreglo[$contador]) ."</label>"; //primera a mayúsculas
									$formulario .="<input type='text' class='form-control modificar' name='". $arreglo[$contador]."' id='". $arreglo[$contador]."' value='". $valor[$arreglo[$contador]]."'  readonly/>";
								$formulario .="</div>";								
							}
							else if($contador==8){	//sexo: hombre o mujer 
									if($valor[$arreglo[$contador]]=="M"){
										$formulario .="<div class='form-group'>";
											$formulario .="<label for='".$arreglo[$contador]."'>".ucwords($arreglo[$contador]) ."</label>"; //primera a mayúsculas
											$formulario .="<input type='text' class='form-control ' name='". $arreglo[$contador]."' id='". $arreglo[$contador]."' value='MUJER'  readonly/>";
										$formulario .="</div>";	
									}
									else{
										$formulario .="<div class='form-group'>";
											$formulario .="<label for='".$arreglo[$contador]."'>".ucwords($arreglo[$contador]) ."</label>"; //primera a mayúsculas
											$formulario .="<input type='text' class='form-control ' name='". $arreglo[$contador]."' id='". $arreglo[$contador]."' value='HOMBRE'  readonly/>";
										$formulario .="</div>";	
									}
								
							}
							else if($contador==9){	//código postal 					
									$formulario .="<div class='form-group'>";
										$formulario .="<label for='".$arreglo[$contador]."'>Código postal </label>";
										$formulario .="<input type='text' class='form-control ' name='". $arreglo[$contador]."' id='". $arreglo[$contador]."' value='". $valor[$arreglo[$contador]]."'  readonly/>";
									$formulario .="</div>";								
							}							
							else if($contador==10){//fecha de nacimiento
								$formulario .="<div class='form-group'>";
										$formulario .="<label for='".$arreglo[$contador]."'>Fecha de Nacimiento</label>";
										$formulario .="<input type='text' class='form-control ' name='". $arreglo[$contador]."' id='". $arreglo[$contador]."' value='". $valor[$arreglo[$contador]]."'  readonly/>";
								$formulario .="</div>";
								$formulario .="<div class='form-group campooculto'>";
									$formulario.="<label for='contrasena'>Nueva contraseña</label>";
									$formulario .="<input type='password' class='form-control modificar' id='contrasena' name='contrasena'/>";
								$formulario .="</div>";
								$formulario .="<div class='form-group campooculto'>";
									$formulario.="<label for='contrasenacontrol'>Repita contraseña</label>";
									$formulario .="<input type='password' class='form-control modificar' id='contrasenacontrol' name='contrasenacontrol'/>";
								$formulario .="</div>";	
							}							
							else{//resto de campos
								$formulario .="<div class='form-group'>";
									$formulario .="<label for='".$arreglo[$contador]."'>".ucwords($arreglo[$contador]) ."</label>"; //primera a mayúsculas
									$formulario .="<input  type='text' class='form-control' name='". $arreglo[$contador]."' id='". $arreglo[$contador]."' value='". $valor[$arreglo[$contador]]."'  readonly/>";
								$formulario .="</div>";	
							}						
						}					
					}//fin while 
					
					//finalizo el formulario 
					$formulario .="<div class='form-group campooculto'>";
						$formulario.="<label for='contrasenavieja'>Introduzca su antigua contraseña para cambiar</label>";
						$formulario .="<input type='password' class='form-control modificar' id='contrasenavieja' name='contrasenavieja' readonly/>";
					$formulario .="</div>";	
					$formulario .="<div class='form-group'>";								
						$formulario .="<input type='submit' id='modificar' name='modificar' value='Modificar'/>";
					$formulario .="</div>";	
					$formulario .="<input type='submit' id='cambiar' name='cambiar' value='Guardar cambios'>";
					$formulario .="</form>";
		
				
				
				
				//muestro 
				echo "<h1 class='subrayado text-primary'>Sus datos de cliente </h1>";		
				echo "<p class='text-success'> * Por seguridad sólo puede modificar su email, contraseña y teléfono</p>";
				echo "<p class='text-success'> *  Para cualquier otro cambio, <a href='contacto.php'>contáctenos</a>.</p>";				
				echo $formulario;
				
			
		}
	}
	

	
	
	
	
	
?>