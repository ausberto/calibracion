<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title>Calibracion</title>
        <!-- Stylesheets -->
        <?php echo $css; ?>
		<!-- Javascript -->
        <?php echo $javascript; ?>
    </head>
    <body>
        <div id="main_container">
            
			<div id="header"></div>
			
			<div id="content">
				<div id="sub_container">
					<input type="button" onclick="javascript:guarda();" value="Guardar" />
					<input type="button" onclick="javascript:exportar();" value="Exportar diseno" />
					<!--<input type="button" onclick="javascript:importar();" value="Importar diseno" />-->
					<input type="button" onclick="javascript:reset();" value="Resetear calibracion" />
					<input type="button" onclick="javascript:imprime();" value="Imprimir prueba" />
					<br />
					Separacion horizontal: <input type="text" name="hs" id="hs" value="<?php echo (isset($espacios['hs']))?$espacios['hs']:''; ?>" /><br />
					Separacion vertical: <input type="text" name="vs" id="vs" value="<?php echo (isset($espacios['vs']))?$espacios['vs']:''; ?>" /><br />
					Margen superior para pie: <input type="text" name="ms" id="ms" value="<?php echo (isset($espacios['ms']))?$espacios['ms']:''; ?>" />
					<br />
					<div id="anverso">
						<?php if ($anverso){ echo stripslashes($anverso);} else { ?>
						<div class="draggable">{Apellidos y Nombres}</div>
						<div class="draggable">{Carnet}</div>
						<div class="draggable">{Reg. universitario}</div>
						<div class="draggable">{Carrera}</div>
						<div class="draggable">{Domicilio}</div>
						<div class="draggable">{Fecha}</div>
						<div class="draggable">{Categoria}</div>
						<div class="draggable">{Numero}</div>
						<?php } ?>
					</div>
					<br />
					<div id="reverso">
						<?php if ($reverso){ echo stripslashes($reverso);} else { ?>
						<div class="draggable">{Apellidos y Nombres}</div>
						<div class="draggable">{Carnet}</div>
						<div class="draggable">{Reg. universitario}</div>
						<div class="draggable">{Carrera}</div>
						<div class="draggable">{Domicilio}</div>
						<div class="draggable">{Fecha}</div>
						<div class="draggable">{Categoria}</div>
						<div class="draggable">{Numero}</div>
						<?php } ?>
					</div>
				</div>
			</div>
        </div>
		<div id="footer"></div>
    </body>
</html>