$(document).ready(function(){
	//al cargar oculto el password (clase campo oculto) y el campo botón  con id cambiar
	$(".campooculto").hide();	
	$("#cambiar").hide();

		
		//al hacer click sobre editar cambio atributos, muestro y oculto campos
		$("#editarcliente").on('submit', function(evt){
			evt.preventDefault();
			$("input.modificar").removeAttr("readonly");			
			$("#contrasenavieja").attr("required","true");
			$("#email").attr("required","true");
			$("#telefono").attr("required","true");
			$("#modificar").hide(2000);		
			$("#cambiar").show(2000);
			$('#email').attr("type","email"); //al hacer click cambio el tipo a email por validación html  
			$(".campooculto").show(2000); //muestro campos ocultos
		});
	
		$("#cambiar").click(function(evt){//al hacer click			
			evt.preventDefault;			
			$("#error").text("");			
			
			
			var url = "programacionclientes/clientes/actualizar.php"; //ruta desde administrarusuario.php
			var comparacion="Datos cambiados"; //con lo que comparo lo que devuelve php
			var valor1= $('#email').val();	
			var valor2 =$('#telefono').val();
			var valor3 =$('#contrasena').val();
			var valor5 =$('#contrasenavieja').val();
			var valor4 =$('#dni').val();
			var parametros = {
						"email" : valor1,
						"telefono":valor2,
						"password" : valor3,
						"dni" : valor4,
						"passwordviejo" : valor5
					   
			};			
			if(valor1.length!=0 && valor2.length!=0 && valor5!=0 && validarContrasenaPanel(valor3,valor5) && validarTelefono(valor2)){//si no están vacíos
				$('#cargando').html('<img src="../../images/loading.gif" alt="cargando"/>'); //imagen de cargando
				$.ajax({                        
					   type: "POST",                 
					   url: url,                     
					   data: parametros, 
					   success: function(data)             
					   {
						
						 if(data==comparacion){//si los datos devueltos son iguales a 
							 $('#guardado').html(data);
							 						 
							 //creo enlace para volver							
							 $('.mostrarenlaceguardado').append('<a class="btn btn-default" title="volver al panel" href="panel-de-cliente">Volver </a>');
							 $('.mostrarenlaceguardado').addClass('margen5ciento');

							//capturo el alto de la capa	
							var valor = $("#capaformulario").height(); 							
							$(".mostrarenlaceguardado").height(valor/4);//alto a la mitad para que no se vea un excesivo cambio de tamaño 
							$('#capaformulario').hide(3000); //después la oculto  
							 
						 }
						 else{
							 $('#error').html(data);
						 }
							$('#cargando').html(''); 
						
						 
					   }
				 });
			}
			
		});			
		
		
		
		
		/***
		***Validar contraseña. El validar teléfono va 100% contra la librería
		**/
		function validarContrasenaPanel(valor,valor5){
			//si están vacías retorno true y salgo, no la voy a cambiar
			if(valor.length==0 && valor5.length ==0)
				return true;				
			
			return validarContrasena(valor); //función librería			
			
		}
		
		
		
		
	

});