<?php


	
	/* esta es una función común de filtrado para eliminar caracteres introducidos por formulario */
	function filtrar($variable){
		$variable = htmlspecialchars($variable);
		$variable = htmlentities($variable);
		$variable = strip_tags($variable);
		return $variable;
		
		
		
	}
	
?>