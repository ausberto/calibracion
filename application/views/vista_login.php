<script>
$(document).ready(function(){
   $(":input:first").focus();
 });
</script>
<div id="upea"></div>
<div id="login">
	

	<div id="formulario">
		<form action="<?php echo base_url() ?>index.php/Login/Verifica" method="POST" id="formlogin">
			<fieldset>        
				 <legend>Introduzca sus datos</legend>   
				 <br>
			<div>
				<label for="NombreUsuario">Usuario:</label>  <input type="text" name="NombreUsuario" id="NombreUsuario" value="" />
			</div>
			<div>
				<label>Contrase&ntilde;a:</label><input type="password" name="Clave" id="Clave" value="" />
			</div>
			<div style="text-align: center">
				<button class="button positive">
				<img src="<?php echo base_url(); ?>css/images/icons/tick.png" alt=""> Ingresar 
				</button>
			</div>
				</fieldset> 

		</form>

	</div>
</div>