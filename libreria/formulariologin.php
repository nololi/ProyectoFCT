<?php
	/*
		FUNCIÓN COMÚN PARA FORMULARIO LOGIN EN VARIAS PAGINAS 
	*/

	function mostrarFormularioLogin(){
		echo '<form method="post" id="loginusuario">
				  <div class="form-group">
					<label for="email">Email</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="Introduce tu email" required autofocus>
				  </div>
				  <div class="form-group">
					<label for="password">Contraseña</label>
						<input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required>
				  </div>						
					  <input type="submit" class="btn btn-default" value="Login" id="login" name="login"/>
					  <input type="reset" class="btn btn-default" value="Borrar" id="borrar" name="borrar"/>			 
			</form>		
			<p id="resp" class="text-warning negrita"></p>';	
	}
?>