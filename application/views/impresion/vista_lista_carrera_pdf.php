<?php

// hereda la clase FPDF para crear header() y footer()
require('headerfooter.php');

$pdf = new Mypdf;

$pdf->Linea1 =  $this->modelo_valores->GetTexto('LINEA1');		 
$pdf->Linea2 =  $this->modelo_valores->GetTexto('LINEA2');
$pdf->Linea3 =  $this->modelo_valores->GetTexto('LINEA3');
$pdf->Titulo = "Lista de matriculados por carrera";
$pdf->AddPage();

//cabezera de columnas
//carrera
//gestion
//fecha actual 
//titulos de columnas

$pdf->SetFont('Arial','',11);
foreach($Tabla->result() as $row) {
	$pdf->Cell(100, 5, $row->NombreCompleto, 0, 0, 'L');  
	$pdf->Cell(35, 5, $row->CI, 0, 0, 'L');  
	$pdf->Cell(35, 5, $row->RegUniversitario, 0, 1, 'L');  
}

$pdf->Output('quote.pdf', 'D');  
?>