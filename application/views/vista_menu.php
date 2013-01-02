<div class='span-24'>
    <h5>Bienvenido <?php echo $this->session->userdata('Nombre');
$Llave = $this->session->userdata('Llave'); ?></h5>
    <div id="page-wrap">
        <ul class="dropdown">
            <li><a href='#'>Universitarios</a>
                <ul class="sub_menu">
                    <?php if ($Llave[1]) { ?>
                        <li><a href='<?php echo base_url() ?>Formulario/Nuevo' title="Nuevo universitario">Nuevo</a></li>
                    <?php } ?>
                    <?php if ($Llave[2]) { ?>
                        <li><a href='<?php echo base_url() ?>estudiante/BuscaParaModificar/1' title="Modificar datos de universitario">Modificar</a></li>
                    <?php } ?>
                    <?php if ($Llave[3]) { ?>
                        <li><a href='<?php echo base_url() ?>estudiante/BuscaParaEliminar' title="Eliminar registro de universitario">Eliminar</a></li>
<?php } ?>
                </ul>
            </li>

            <li><a href='#'>Matriculaci&oacute;n</a>
                <ul class="sub_menu">				
                    <?php if ($Llave[5]) { ?>
                        <li><a href='<?php echo base_url() ?>Matriculacion/NuevaMatricula/1' title="Nueva matricula">Nueva matricula</a></li>
                    <?php } ?>
                    <?php if ($Llave[6]) { ?>
                        <li><a href='<?php echo base_url() ?>index.php/Matriculacion/Modificar' title="Modificar datos de matriculacion">Modificar</a></li>
                    <?php } ?>
                    <?php if ($Llave[7]) { ?>
                        <li><a href='<?php echo base_url() ?>index.php/Matriculacion/Eliminar' title="Eliminar registro de matriculacion">Eliminar/anular</a></li>
<?php } ?>
                </ul>
            </li>

            <li><a href='#' >Reportes</a>
                <ul>
                    <?php if ($Llave[8]) { ?>
                    <li><a href='#' title="Impresion de matricula">Impresi&oacute;n de matrícula</a></li>
                     <?php } ?>
                    <li><a href='#' title="Impresion">Listados</a>
                        <ul class="sub_menu">				
                            <?php if ($Llave[10]) { ?>
                            <li><a href='<?php echo base_url() ?>listados/ListaPorCarrera1' title="Estudiantes matriculados a una carrera">Matriculaci&oacute;n por carrera</a></li>
                            <?php } ?>
                            <?php if ($Llave[11]) { ?>
                            <li><a href='<?php echo base_url() ?>impresion/Matricula' title="Impresion de matricula">Matriculas expedidas</a></li>
                            <?php } ?>
                            <?php if ($Llave[12]) { ?>
                            <li><a href='<?php echo base_url() ?>impresion/ReporteDiario' title="">Lista por gestion</a></li>
                            <?php } ?>
                            <?php if ($Llave[13]) { ?>
                            <li><a href='<?php echo base_url() ?>impresion/ReporteDiario' title="">Arqueo</a></li>
                            <?php } ?>
                        </ul>
                    </li>
                    <?php if ($Llave[8]) { ?>
                    <li><a href='#' title="Impresion">Estadisticas</a>
                        <ul class="sub_menu">				
                            <li><a href='<?php echo base_url() ?>impresion/Matricula' title="Impresion de matricula">Documentacion</a></li>
                            <li><a href='<?php echo base_url() ?>impresion/ReporteDiario'>Num. estudiantes y genero</a></li>
                            <li><a href='<?php echo base_url() ?>impresion/ReporteDiario'>Estado civil</a></li>
                            <li><a href='<?php echo base_url() ?>impresion/ReporteDiario'>Tipo de colegio</a></li>
                            <li><a href='<?php echo base_url() ?>impresion/ReporteDiario'>Vivienda</a></li>
                            <li><a href='<?php echo base_url() ?>impresion/ReporteDiario'>Universidad del titulo</a></li>
                            <li><a href='<?php echo base_url() ?>impresion/ReporteDiario'>Zona</a></li>
                            <li><a href='<?php echo base_url() ?>impresion/ReporteDiario'>Tipo de trabajo</a></li>
                            <li><a href='<?php echo base_url() ?>impresion/ReporteDiario'>Trabajo</a></li>
                            <li><a href='<?php echo base_url() ?>impresion/ReporteDiario'>Jornada laboral</a></li>
                            <li><a href='<?php echo base_url() ?>impresion/ReporteDiario'>Propiedad de vivienda</a></li>
                        </ul>
                    </li>
                    <?php } ?>
                    <?php if ($Llave[14]) { ?>
                    <li><a href='#' title="Impresion">Reporte de irregularidades</a>
                        <ul class="sub_menu">				
                            <li><a href='<?php echo base_url() ?>impresion/Matricula' >Documentaci&oacute;n Incompleta</a></li>
                            <li><a href='<?php echo base_url() ?>impresion/ReporteDiario' >Reg. universitario Repetido</a> </li>
                            <li><a href='<?php echo base_url() ?>impresion/ReporteDiario'>C.I. Repetido</a></li>
                            <li><a href='<?php echo base_url() ?>impresion/ReporteDiario'>Universitarios sin C.I.</a></li>
                        </ul>
                    </li>
                    <?php } ?>
                    <?php if ($Llave[15]) { ?>
                    <li><a href='#' >Exportacion a Excel</a></li>
                    <?php } ?>
                    <?php if ($Llave[22]) { ?>
                    <li><a href='#' >Auditoria</a></li>
                    <?php } ?>
                </ul>
            </li>
            <li><a href='#' >Utilidades</a>
                <ul>
                    <?php if ($Llave[16]) { ?>
                    <li><a href='<?php echo base_url() ?>calibra' title="Ajuste de la impresion de matriculas">Calibraci&oacute;n de la matricula</a> </li>
                    <?php } ?>
                    <?php if ($Llave[21]) { ?>
                    <li><a href='<?php echo base_url() ?>Usuario/Listado' >Administraci&oacute;n de usuarios</a> 
                        <ul>
                            <li><a href='<?php echo base_url() ?>Usuario/Nuevo' >Nuevo usuario</a> </li>
                            <li><a href='<?php echo base_url() ?>Usuario/Listado'>Modificacion datos usuario</a> </li>
                            <li><a href='<?php echo base_url() ?>Perfil/Nuevo'>Nuevo perfil</a> </li>
                            <li><a href='<?php echo base_url() ?>Perfil/Listado'>Modificacion de perfil</a> </li>
                        </ul>
                    </li>
                    <?php } ?>
                    <?php if ($Llave[17]) { ?>
                    <li><a href='<?php echo base_url() ?>configuracion/CupoMatriculas' >Control de cupos de matr&iacute;culas</a> </li>
                    <?php } ?>
                    <?php if ($Llave[18]) { ?>
                    <li><a href='<?php echo base_url() ?>impresion/ReporteDiario' >Habilitaci&oacute;n de registro web</a> </li>
                    <?php } ?>
                    <?php if ($Llave[19]) { ?>
                    <li><a href='<?php echo base_url() ?>impresion/ReporteDiario' >Depuraci&oacute;n de registro web</a> </li>
                    <?php } ?>
                    <?php if ($Llave[20]) { ?>
                    <li><a href='<?php echo base_url() ?>index.php/Usuario/Listado' >Varios</a> 
                        <ul>
                            <li><a href='<?php echo base_url() ?>configuracion/Varios' title="Gestion e importes de matricula">Gesti&oacute;n, montos y depuraci&oacute;n</a> </li>
							<li><a href='<?php echo base_url() ?>administrador/Carrera' >Carreras</a> </li>
                            <li><a href='<?php echo base_url() ?>administrador/Pais' >Paises</a> </li>
                            <li><a href='<?php echo base_url() ?>administrador/Banco' >Bancos</a> </li>
                            <li><a href='<?php echo base_url() ?>administrador/GradoAcademico' >Grados acad&eacute;micos</a> </li>
                            <li><a href='<?php echo base_url() ?>administrador/Banco' >Idiomas</a> </li>
                            <li><a href='<?php echo base_url() ?>administrador/Universidad'>Universidades</a> </li>
                        </ul>
                    </li>
                    <?php } ?>

                </ul>
            <li><a href='<?php echo base_url() ?>index.php/Login/Logout' title="Cerrar sesi&oacute;n">Salir</a></li>
        </ul>
    </div>
</div>