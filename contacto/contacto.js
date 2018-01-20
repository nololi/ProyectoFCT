$(document).ready(function(){
	
	//cada vez que recargo error oculto 
	$('#error').hide();
	
	//click formulario 
	$("#formulariocontacto").on('submit', function(evt){
			//oculto error por defecto al click y prevenir evento 
			$('#error').hide();
			evt.preventDefault();			
			
			
			var url = "contacto/contacto.php";	
			
			var parametros = {
				"nombre" : $('#nombre').val(),
				"email" : $('#email').val(),
				"telefono" : $('#telefono').val(),
				"asunto" : $('#asunto').val(),
				"mensaje" : $('#mensaje').val(),
				"idcategoria" : $('input:radio[name=idproducto]:checked').val()					   
			};	
			
			
				//solo valido telefono, la función está en libreria/validaciones (común para otras páginas)
				if(validarTelefono(parametros['telefono'])){
					$('#respuesta').html('<img src="images/loading.gif" alt="cargando"/>');
					$.ajax({                        
						   type: "POST",                 
						   url: url,                     
						   data: parametros, 
						   success: function(data)             
						   {
							 $('#respuesta').html(data); //cambio respuesta por datos recibidos (oculta imagen)
							  var valor = $("#formulariocontacto").height(); 
							  $("#divformulario").parent().height(valor);//mantengo alto
							  $("#formulariocontacto").hide(5000);					
						   }
					});				
					
				}else{	
					//muestro error
					 $('#error').show();			
					 $('#error').html("Teléfono erróneo");
				}
			
			
	});
});