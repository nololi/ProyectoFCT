
		/*********
		******VALIDACIONES 
		*********/
		
		
		
		/***
		***DNI
		**/
		function validarDNI(valor){
			//primero valido dni
			var expresion =/^\d{8}[a-zA-Z]$/; //8 dígitos y una letra
			if((expresion.test(valor))==false){
				$("#error").text("Formato Dni no válido: ejemplo 00000000X");
				return false;
			}else{
				var numerodni = valor;				
				var letraDni = numerodni.charAt(8);								
				//divides el numero entre 23
				var posicion = numerodni.substring(0,8);				
				posicion = posicion % 23;
				//string de las letras según posición resultado división
				var letras = 'TRWAGMYFPDXBNJZSQVHLCKET';				
				if(letras.charAt(posicion)==letraDni){
					return true;					
				}
				$("#error").text("Letra DNI no válida");
				return false;				
			}
			return true;			
			
		}
		
		
		
		/***
		***TELEFONO
		**/
		function validarTelefono(valor){
			var expresion =/^\d{9}$/; //nueve dígitos
			if((expresion.test(valor))==false){
				$("#error").text("Teléfono no válido, ejemplo: 123456789");
				return false;
			}
			return true;
			
			
		}
		
		
		/****
		****DIRECCION
		****/
		function validarDireccion(valor){
			var expresion =/^[a-zA-Z0-9\sºª]{8,}$/; //al menos más de 8 caracteres números o ª º
			if((expresion.test(valor))==false){
				$("#error").text("Verifique dirección. Mínimo 8 caracteres.  ");
				return false;
			}
			return true;
			
		}
		
		
		
		
		
		/****
		****Datos bancarios
		****/
		function validarDatosBancarios(valor){
			//24 caracteres, 2 primeras letras mayúsculas, 22 números			
			var expresion =/^[A-Z]{2}\d{22}$/; //al menos más de 4 caracteres
			if((expresion.test(valor))==false){
				$("#error").text("Datos bancarios no válidos. Formato: XX0123456789012345678901");
				return false;
			}
			return true;
			
		}


		/****
		****Fecha de nacimiento
		****/
		function validarFechaNacimiento(valor){
			//24 caracteres, 2 primeras letras mayúsculas, 22 números			
			var expresion =/^\d{4}\/\d{2}\/\d{2}$/; //formato 0000/00/00
			if((expresion.test(valor))==false){
				$("#error").text("Fecha de nacimiento no válida. Formato: 0000/00/00");
				return false;
			}
			return true;
			
		}
		
		/***
		***Código postal
		**/
		function validarCodigoPostal(valor){
			//Doy dos dígitos, faltan otros dos		
			var expresion =/^\d{3}$/; 
			if((expresion.test(valor))==false){
				$("#error").text("Introduzca los últimos tres dígitos de su código postal");
				return false;
			}
			return true;
			
		}
		
		
		/***
		***Contraseñas, parto de que van a tener que estar cubiertas en registro 
		**/
		function validarContrasena(valor){
			//al menos 1 minus,  1 mayus, 1 numero y un mínimo de 8 caracteres
			var expresion =/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}[^'\s]/;
			var valor = valor;
			if((expresion.test(valor))==false){
				$("#error").text("La contraseña ha de tener al menos 1 minuscula, 1 mayúscula, 1 número, y un mínimo de 8 caracteres");
				return false;
			}else{//si ok compruebo que son iguales
				if(valor == $("#contrasenacontrol").val()){					
					return true;
				}				
				else{
					$("#error").text("Contraseñas no coinciden");
					return false;
				}
			}
			
			
		
			
		}
		