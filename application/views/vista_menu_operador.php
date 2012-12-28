<div class="full">
<h3>Opciones de operador: <?php echo $this->session->userdata('Nombre'); ?></h3>
<div id="page-wrap">
	<ul class="dropdown">
		<li><a href='<?php echo base_url() ?>index.php/Matriculacion/Formulario' title="Confirmacion de registros via web">Matriculaci&oacute;n</a></li>
		<li><a href='<?php echo base_url() ?>nuevo' title="Registro de nuevo estudiante">Nuevo</a></li>		
		<li><a href='#' title="Impresion">Impresi&oacute;n</a>
			<ul class="sub_menu">				
				<li><a href='<?php echo base_url() ?>impresion/Matricula' title="Impresion de matricula">Matr&iacute;cula</a></li>
				<li><a href='<?php echo base_url() ?>impresion/ReporteDiario' title="Reporte de actividad diaria">ReporteDiario</a>
                                <ul class="sub_menu">				
				<li><a href='<?php echo base_url() ?>impresion/Matricula' title="Impresion de matricula">Matr&iacute;cula</a></li>
				<li><a href='<?php echo base_url() ?>impresion/ReporteDiario' title="Reporte de actividad diaria">ReporteDiario</a></li>
			</ul>
                                
                                </li>
			</ul>
		</li>
		<li><a href='<?php echo base_url() ?>anulacion' title="Anulacion de matricula">Anulaci&oacute;n</a></li>		
		<li><a href='<?php echo base_url() ?>index.php/login/Salir' title="Cerrar sesi&oacute;n">Salir</a></li>

	</ul>
</div>
</div>