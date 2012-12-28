<div class='span-24'>
<h5>Bienvenido <?php echo $this->session->userdata('NombreUsuario'); $Llave=$this->session->userdata('Llave'); ?></h5>
<div id="page-wrap">
	<ul class="dropdown">
		<li><a href='#'>Universitarios</a>
			<ul class="sub_menu">
				<?php if($Llave[1]){ ?>
				<li><a href='<?php echo base_url() ?>Formulario/Nuevo' title="Nuevo universitario">Nuevo</a></li>
				<?php } ?>
				<?php if($Llave[2]){ ?>
				<li><a href='<?php echo base_url() ?>estudiante/BuscaParaModificar/1' title="Modificar datos de universitario">Modificar</a></li>
				<?php } ?>
				<?php if($Llave[3]){ ?>
				<li><a href='<?php echo base_url() ?>estudiante/BuscaParaEliminar' title="Eliminar registro de universitario">Eliminar</a></li>
				<?php } ?>
			</ul>
		</li>

		<li><a href='#'>Matriculaci&oacute;n</a>
			<ul class="sub_menu">				
				<?php if($Llave[5]){?>
				<li><a href='<?php echo base_url() ?>Matriculacion/NuevaMatricula/1' title="Nueva matricula">Nueva matricula</a></li>
				<?php }?>
				<?php if($Llave[6]){?>
				<li><a href='<?php echo base_url() ?>index.php/Matriculacion/Modificar' title="Modificar datos de matriculacion">Modificar</a></li>
				<?php }?>
				<?php if($Llave[7]){?>
				<li><a href='<?php echo base_url() ?>index.php/Matriculacion/Eliminar' title="Eliminar registro de matriculacion">Eliminar/anular</a></li>
				<?php }?>
			</ul>
		</li>

		<li><a href='<?php echo base_url() ?>index.php/Matriculacion/Formulario' title="Confirmacion de registros via web">Reportes</a>
			<ul>
				<li><a href='#' title="Impresion">Impresi&oacute;n de matrícula</a></li>
				<li><a href='#' title="Impresion">Listados</a>
					<ul class="sub_menu">				
						<li><a href='<?php echo base_url() ?>impresion/Matricula' title="Impresion de matricula">Matriculas expedidas</a></li>
						<li><a href='<?php echo base_url() ?>impresion/ReporteDiario' title="Reporte de actividad diaria">Lista por gestion</a></li>
						<li><a href='<?php echo base_url() ?>impresion/ReporteDiario' title="Reporte de actividad diaria">Lista por carrera</a></li>
						<li><a href='<?php echo base_url() ?>impresion/ReporteDiario' title="Reporte de actividad diaria">Arqueo</a></li>
					</ul>
				</li>
				<li><a href='#' title="Impresion">Estadisticas</a>
					<ul class="sub_menu">				
						<li><a href='<?php echo base_url() ?>impresion/Matricula' title="Impresion de matricula">Documentacion</a></li>
						<li><a href='<?php echo base_url() ?>impresion/ReporteDiario' title="Reporte de actividad diaria">Num. estudiantes y genero</a></li>
						<li><a href='<?php echo base_url() ?>impresion/ReporteDiario' title="Reporte de actividad diaria">Estado civil</a></li>
						<li><a href='<?php echo base_url() ?>impresion/ReporteDiario' title="Reporte de actividad diaria">Tipo de colegio</a></li>
						<li><a href='<?php echo base_url() ?>impresion/ReporteDiario' title="Reporte de actividad diaria">Vivienda</a></li>
						<li><a href='<?php echo base_url() ?>impresion/ReporteDiario' title="Reporte de actividad diaria">Universidad del titulo</a></li>
						<li><a href='<?php echo base_url() ?>impresion/ReporteDiario' title="Reporte de actividad diaria">Zona</a></li>
						<li><a href='<?php echo base_url() ?>impresion/ReporteDiario' title="Reporte de actividad diaria">Tipo de trabajo</a></li>
						<li><a href='<?php echo base_url() ?>impresion/ReporteDiario' title="Reporte de actividad diaria">Trabajo</a></li>
						<li><a href='<?php echo base_url() ?>impresion/ReporteDiario' title="Reporte de actividad diaria">Jornada laboral</a></li>
						<li><a href='<?php echo base_url() ?>impresion/ReporteDiario' title="Reporte de actividad diaria">Propiedad de vivienda</a></li>
					</ul>
				</li>
				<li><a href='#' title="Impresion">Reporte de irregularidades</a>
					<ul class="sub_menu">				
						<li><a href='<?php echo base_url() ?>impresion/Matricula' title="Impresion de matricula">Documentaci&oacute;n Incompleta</a></li>
						<li><a href='<?php echo base_url() ?>impresion/ReporteDiario' title="Reporte de actividad diaria">Reg. universitario Repetido</a> </li>
						<li><a href='<?php echo base_url() ?>impresion/ReporteDiario' title="Reporte de actividad diaria">C.I. Repetido</a></li>
						<li><a href='<?php echo base_url() ?>impresion/ReporteDiario' title="Reporte de actividad diaria">Universitarios sin C.I.</a></li>
					</ul>
				</li>
				<li><a href='#' title="Impresion">Exportacion a Excel</a></li>
				<li><a href='#' title="Impresion">Auditoria</a></li>
			</ul>
		</li>
		<li><a href='<?php echo base_url() ?>anulacion' title="Anulacion de matricula">Utilidades</a>
			<ul>
				<li><a href='<?php echo base_url() ?>impresion/ReporteDiario' title="Reporte de actividad diaria">Calibraci&oacute;n de la matricula</a> </li>
				<li><a href='<?php echo base_url() ?>index.php/Usuario/Listado' title="Administracion de usuarios">Administraci&oacute;n de usuarios</a> 
					<ul>
						<li><a href='<?php echo base_url() ?>Usuario/Nuevo' title="Reporte de actividad diaria">Nuevo usuario</a> </li>
						<li><a href='<?php echo base_url() ?>Usuario/Listado' title="Reporte de actividad diaria">Modificacion datos usuario</a> </li>
						<li><a href='<?php echo base_url() ?>Perfil/Nuevo' title="Reporte de actividad diaria">Nuevo perfil</a> </li>
						<li><a href='<?php echo base_url() ?>Perfil/Listado' title="Reporte de actividad diaria">Modificacion de perfil</a> </li>
					</ul>
				</li>
				<li><a href='<?php echo base_url() ?>configuracion/CupoMatriculas' title="Control de cupo de matriculas a operadores">Control de cupos de matr&iacute;culas</a> </li>
				<li><a href='<?php echo base_url() ?>impresion/ReporteDiario' title="Reporte de actividad diaria">Habilitaci&oacute;n de registro web</a> </li>
				<li><a href='<?php echo base_url() ?>impresion/ReporteDiario' title="Reporte de actividad diaria">Depuraci&oacute;n de registro web</a> </li>
				
				<li><a href='<?php echo base_url() ?>index.php/Usuario/Listado' title="Administracion de usuarios">Varios</a> 
					<ul>
						<li><a href='<?php echo base_url() ?>configuracion/Varios' title="Gestion e importes de matricula">Gesti&oacute;n y montos</a> </li>
						<li><a href='<?php echo base_url() ?>administrador/Carrera' title="Carreras habilitadas">Carreras</a> </li>
						<li><a href='<?php echo base_url() ?>administrador/Pais' title="Paises registrados">Paises</a> </li>
						<li><a href='<?php echo base_url() ?>administrador/Banco' title="Bancos y cuentas registradas">Bancos</a> </li>
						<li><a href='<?php echo base_url() ?>administrador/GradoAcademico' title="Reporte de actividad diaria">Grados acad&eacute;micos</a> </li>
						<li><a href='<?php echo base_url() ?>administrador/Banco' title="Idiomas registrados">Idiomas</a> </li>
						<li><a href='<?php echo base_url() ?>administrador/Universidad' title="Universidades registradas">Universidades</a> </li>
					</ul>
				</li>
				
			</ul>
		<li><a href='<?php echo base_url() ?>index.php/Login/Logout' title="Cerrar sesi&oacute;n">Salir</a></li>
	</ul>
</div>
</div>