<?php
//Lista de matriculados por carrera
//echo 'Carrera: '.utf8_decode($Carrera->Nombre);
//echo 'Gestion: '.$Gestion;
//echo 'Fecha actual: '.date('d/M/Y');
echo 'Nombre'.$delimitador.'CI'.$delimitador.'Reg.Univ.';
foreach($Tabla->result() as $row) {
	echo "\r\n".$row->NombreCompleto.$delimitador.$row->CI.$delimitador.$row->RegUniversitario;
}
?>