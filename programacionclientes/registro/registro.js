$(document).ready(function(){
	
	//ocultar 	
	var campos = ["#camponombre","#campodni", "#campoemail", "#campotelefono","#campodireccion","#campoprovincia","#campocodigopostal","#campopoblacion",
				 "#camposexo", "#campocontrasena","#campofechanacimiento","#registro","#borrar"];
	for(i=1;i<campos.length-1;i++){ //no oculto el campo nombre ni borrar
		$(campos[i]).hide();		
	}	
	//cargo los campos de provincias al iniciar 
		var url = "programacionclientes/registro/listadosdireccion/provincias.php";
		$.ajax({                        
				   type: "POST",                 
				   url: url,                     				  			
				   success: function(data)             
				   {		
					 var json = eval(data);	
					 var option ="";
					 for (i=0;i<data.length;i++){//genero el select
						 //alert(data[i].provincia);
						 option +="<option value='"+data[i].cp+"'>" + data[i].provincia +"</option>";
					 }
					 $('#provincia option').remove();	
					 $('#provincia').append(option);												
				   }
			   });		
		
	
	
	
	
	
	
	
	
	//muestro tras obtener el foco el siguiente en el formulario
	$("#nombre").focus(function(){		
		$("#campodni").show();		
	});
	$("#dni").focus(function(){		
		$("#campoemail").show();		
	});
	$("#email").focus(function(){		
		$("#campotelefono").show();		
	});
	$("#telefono").focus(function(){		
		$("#campodireccion").show();		
	});	
	$("#direccion").focus(function(){		
		$("#campoprovincia").show();		
		
	});
	$("#direccion").blur(function(){		
		$("#campoprovincia").show();
		
	});
	$("#provincia").focus(function(){		
		$("#campocodigopostal").show();			
	});
	$("#provincia").blur(function(){		
				//cargo el codigo postal y consulto poblaciones			
				var valor= $('#provincia').val();							
			    $('#codigopostal').html(valor);	
				//alert("cargopoblaciones");	
				//cargo las poblaciones
				var url = "programacionclientes/registro/listadosdireccion/poblaciones.php";
				var parametros = {					
						"codigopostal" : valor,		
				};					
				$.ajax({                        
				   type: "POST",                 
				   url: url, 
				   data: parametros, 				   
				   success: function(data)             
				   {		
					 var json = eval(data);			 
					 var option ="";
					 for (i=0;i<data.length;i++){//genero el select
						 //alert(data[i].provincia);
						 option +="<option value='"+data[i]+"'>" + data[i] +"</option>";
					 }
					 $('#poblacion option').remove();
					 $('#poblacion').append(option);											
				   }
			   });	
				
	});
	
	$("#codigopostal2").focus(function(){		
		$("#campopoblacion").show();				
	});
	
	$("#poblacion").focus(function(){		
		$("#camposexo").show();			
	});	
	$("#sexo").focus(function(){		
		$("#campocontrasena").show();	
		
	});
	$("#contrasena").focus(function(){
		$("#campofechanacimiento").show();
		$("#registro").show();			
	});
	//me da igual cual tenga el foco antes, lo muestro
	$("#contrasenacontrol").focus(function(){
		$("#campofechanacimiento").show();
		$("#registro").show();			
	});
	$("#fechanacimiento").focus(function(){		
		$("#registro").show();			
	});
	
	
	
	
	
	//al pulsar borrar oculto todo  --->????
	$("#borrar").click(function(){		
		for(i=1;i<campos.length-1;i++){			
			$(campos[i]).hide(5000);		
		}
		$('#poblacion option').remove();
		$("#error").text("");
		
	});
	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	//al pulsar registro	
	$("#registrousuario").on('submit', function(evt){
			evt.preventDefault();			
			$("#resp").text("");//cada vez que pulso reinicio el mensaje
			$('#error').text("");
			
			if(validarDNI($("#dni").val()) && validarTelefono($("#telefono").val()) && validarDireccion($("#direccion").val()) && 
				validarCodigoPostal($("#codigopostal2").val())  &&
				validarFechaNacimiento($("#fechanacimiento").val()) && validarContrasena($("#contrasena").val())){				
				
				$('#resp').html('<img src="images/loading.gif" alt="cargando"/>');
				var url = "programacionclientes/registro/ajax/registro.php";	
				var comparacion ="Registro completado";				
				var parametros = {
						"nombre" : $('#nombre').val(),
						"dni" : $('#dni').val(),
						"email" : $('#email').val(),
						"telefono" : $('#telefono').val(),
						"direccion" : $('#direccion').val(),
						"provincia" : $("select#provincia option:selected").text(), //es el texto 
						"codigopostal" : $('#codigopostal').text() + $('#codigopostal2').val(),
						"poblacion" : $('#poblacion').val(),						
						"sexo" :  $('#sexo').val(),
						"contrasena" : $('#contrasena').val(),
						"fechanacimiento" :$ ("#fechanacimiento").val()
			
				};	
				
				$.ajax({                        
				   type: "POST",                 
				   url: url,                     
				   data: parametros, 			
				   success: function(data)             
				   {				
				
					 if(comparacion==(data.substring(0,19))){
						  $('#resp').html(data);
						  var valor = $("#registrousuario").height();
						  $("#registrousuario").parent().height(valor);//mantengo alto
							for(i=0;i<campos.length;i++){ //si ok oculto todo
								$(campos[i]).hide(5000);		
							}						 
							
	
					 }else{
						 $('#error').html(data);
						 $('#resp').html('');
					 }
										 
				   }
			   });			
			}		
		});

});



