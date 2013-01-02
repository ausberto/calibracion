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
				<div id="sub_container" class='span-14 prefix-5 suffix-5 last center'>
					<input type="button" onclick="javascript:guarda();" value="Guardar" />
					<input type="button" onclick="javascript:exportar();" value="Exportar diseno" />
					<input type="button" onclick="javascript:reset();" value="Resetear calibracion" />
					<input type="button" onclick="javascript:imprime();" value="Imprimir prueba" />
					<br />
					Separaci&oacute;n horizontal: <input type="text" name="hs" id="hs" value="<?php echo (isset($espacios['hs']))?$espacios['hs']:''; ?>" /><br />
					Separaci&oacute;n vertical: <input type="text" name="vs" id="vs" value="<?php echo (isset($espacios['vs']))?$espacios['vs']:''; ?>" /><br />
					Margen superior para pie: <input type="text" name="ms" id="ms" value="<?php echo (isset($espacios['ms']))?$espacios['ms']:''; ?>" />
					<br />
					<div id="anverso" style='height:350px'>
						<?php if ($anverso){ echo stripslashes($anverso);} else { ?>
						<div class="draggable">{Apellidos y Nombres}</div>
						<div class="draggable">{Carnet}</div>
						<div class="draggable">{Reg. univ.}</div>
						<div class="draggable">{Carrera}</div>
						<div class="draggable">{Domicilio}</div>
						<div class="draggable">{Fecha}</div>
						<div class="draggable">{Categoria}</div>
						<div class="draggable">{N&uacute;mero}</div>
						<?php } ?>
					</div>
					<br />
					<div id="reverso" style='height:350px'>
						<?php if ($reverso){ echo stripslashes($reverso);} else { ?>
						<div class="draggable">{Apellidos y Nombres}</div>
						<div class="draggable">{Carnet}</div>
						<div class="draggable">{Reg. univ.}</div>
						<div class="draggable">{Carrera}</div>
						<div class="draggable">{Domicilio}</div>
						<div class="draggable">{Fecha}</div>
						<div class="draggable">{Categoria}</div>
						<div class="draggable">{N&uacute;mero}</div>
						<?php } ?>
					</div>
				</div>
			</div>
        </div>
		<!-- <div id="footer"></div> -->
    </body>