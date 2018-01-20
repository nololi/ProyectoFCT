$(document).ready(function(){	
		//al pulsar sobre el submit del formulario
		$("#loginusuario").on('submit', function(evt){
			evt.preventDefault();
				//ruta desde login.html
				var url = "programacionclientes/login/login.php";
				var valor1= $('#email').val();
				var valor2= $('#password').val();
				var comparacion = "Redirigiendo";
				var parametros = {
						"email" : valor1,
						"password" : valor2			
					   
				};				
				//método ajax
				$.ajax({                        
				   type: "POST",                 
				   url: url,                     
				   data: parametros, 
				   success: function(data)             
				   {		
					 //recibo un json con 2 datos
					 var json = eval(data); 					 
					var estado = json['estado'];
					var pagina = json['pagina'];					
					 if(estado==comparacion){	
						//quito el / a la página 
						pagina = pagina.replace("/","");					
						$('#resp').html(comparacion);						
						if(pagina== "login.php"){							
							$(location).attr('href',"panel-de-cliente");// si estoy página login voy a panel
						}else{
							$(location).attr('href',pagina);//redirijo a la última visitada
						}						
					}else{
						$('#resp').html(estado);
					}
					
				   }
			   });
			
		});		

});