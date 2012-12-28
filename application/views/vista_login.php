<link rel='stylesheet' type='text/css' href='" . base_url() . "css/tables.css' />

<script>
	$(document).ready(function(){
		$(".texto").hover(function(){
			$(this).css('border','2px solid #cd474b');
		}, function(){
			$(this).css('border','1px solid #cd474b');
		}
	);	
	
	$("#submit").hover(function(){
			$(this).css("opacity", "0.8");
			
		}, function(){
			$(this).css("opacity", "1");
		}
	);
	
	});
</script>
		
<style>
	#login{
		border:2px #676aaf solid;
		width: 30%;
		margin: auto;
		position: relative;
	}
	
	#titulo{
		background-color: #676aaf;
		color:#ffffff;
		font-family: Arial Narrow;
		font-weight: bold;
	}
	
	#formulario{
		width: 100%;
	}
	
	#formulario input[type=submit]{
		background-color: #cd474b;
		color: #ffffff;
		font-family: Arial Narrow;
		font-weight: bold;
		vertical-align: middle;
		border: none;
		width: 45%;
		height: 25px;
		font-size: 16px;
	}
	
	#formulario input[type=text],input[type=password]{
		width: 200px;
		border: 1px solid #cd474b;
	}
	
	#formulario label{
		font-family: Arial Narrow;
		margin-right: 50px;
		margin-left: 10px;
	}	
</style>
       
<hr />
<div id="login" class='center'>	
	<div id="titulo">Introduzca sus datos</div>
	<div id="formulario">
		<form action="<?php echo base_url() ?>index.php/Login/Verifica" method="POST">
			<br />
			<p>
				<label for="NombreUsuario">Usuario: </label><input type="text" name="NombreUsuario" id="NombreUsuario" value="" class="texto"/>
			</p>
			<p>
				<label>Contrase&ntilde;a: </label><input type="password" name="Clave" id="Clave" value="" class="texto" />
			</p>
			<p style="text-align: center;">
				<input type="submit" value="Ingresar"  id="submit"/>
			</p>
		</form>
	</div>
</div>

