$(document).ready(function(){	
	//variables 	
		
	var preciovida=0;
	var precioaccidentes=0;
	
	
	//cargo la cuota inicial a partir de la edad
	var edad = $("#edad").val();
	calcular();
	
	
	/********
	**********Funcion general calcular prima
	**/
	function calcular(){
		var seleccionado =($("input[name=idproducto]:checked")).val();
		var capital= $("#formulariocontratacion option:selected").val();
			
		/*
		** la consulta de las tarifas contra la base de datos la hago en dicho fichero
		*/
		var url = "programacionclientes/contratar/calcularpoliza.php";		
		var parametros = {
			"producto" : seleccionado,
			"capital" : capital,
			"edad" : edad
		};
		$.ajax({ //mostrar en navegador respuesta							
				type: "POST",                 
				url: url,                     
				data: parametros, 
				success: function(data)             
					{
						
						var json = eval(data); 
						var cuotas = new Array(json['prima'], json['primaaccidentes'], json['primavida']);
						
						$("#cuota").text("");						
						$("#cuota").text(cuotas[0] + " euros/año").append(" <small><em>impuestos incluidos </em></small>"); 						
						$("#enviarcuota").val(cuotas); 							
					}		
		 });
		
	}
	
	
	/**************
	*******Al cambiar input (tipo producto ) o select (capital) recalculo 
	******************/
	
	
	$('#formulariocontratacion input').on('change', function() { 
			calcular();
			
	});	
	
	$('#formulariocontratacion select').on('click', function() { 
		calcular();
	});
	
	
	
	/**************
	*******Al darle a contratar 
	******************/
	
	
		$("#formulariocontratacion").on('submit', function(evt){ //al pulsar el submit
				evt.preventDefault();
				$('#error').text("");							
				if(validarDatosBancarios($("#datosbancarios").val())){				
						
						/*
						*
						*	subida de ficheros 
						*/
						$.ajax({
							url: "programacionclientes/ficheros/subirfichero.php", // compruebo extensión y si se ha subido 
							type: "POST",             // Type of request to be send, called as method
							data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
							contentType: false,       // The content type used when sending data to the server.
							cache: false,             // To unable request pages to be cached
							processData:false,        // To send DOMDocument or non processed data file it is set to false
							success: function(data)   // A function to be called if request succeeds
								{
									/*
									*	si ok la subida de archivo procedo a la subida de datos a la bd 
									*
									*/
									if(data==1){ 
										//ruta desde contratar.php				
										var url = "programacionclientes/contratar/contratarpoliza.php";							
										var comparacion = "Petición realizada";								
										var parametros = {
												"producto" : $("input[name=idproducto]:checked").val(),
												"cuota" : $('#enviarcuota').val(),
												"capital" : $("#formulariocontratacion option:selected").text(),
												"datosbancarios" : $('#datosbancarios').val()
										};
						
										$.ajax({                      
										type: "POST",                 
										url: url,                     
										data: parametros, 
										success: function(data)             
										   {
											
											 if(data==comparacion){													
												 $('#respuesta').html(data);
												 var valor = $("#formulariocontratacion").height();
												$("#formulariocontratacion").parent().height(valor);//mantengo alto 
												$("#formulariocontratacion").hide(5000);//oculto formulario 												 
												 $('#cabeceracontratacion').toggle(3000);
												 
												 //muestro enlaces												 
												 $("#formulariocontratacion").parent().append('<p><a href="contrate-un-producto" class="btn btn-default">Contratar otro producto</a></p>');
												 $("#formulariocontratacion").parent().append('<p><a href="panel-de-cliente" class="btn btn-default">Volver a su panel</a></p>');
												 
												 									
											 }else{
												
												 $('#error').html(data);
											 }
											
										   }
									   });
									
									
									}else{	
										
										//mirar de cambiarle esto por un append/remove child
										$('#error').html("Formato dni no válido. Formatos válidos: png, jpg, gif. Si el formato es correcto contáctenos.");
									}
									
									
								}
						});		
				
				}
				
				   
			
		});	

		
		
		

		

});