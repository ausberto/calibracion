<?php
// hereda la clase FPDF para crear header() y footer()
require('headerfooter.php');

$pdf = new Mypdf;

$pdf->Linea1 =  $this->modelo_valores->GetTexto('LINEA1');		 
$pdf->Linea2 =  $this->modelo_valores->GetTexto('LINEA2');
$pdf->Linea3 =  $this->modelo_valores->GetTexto('LINEA3');
$pdf->Titulo = "Matrículas expedidas";
$pdf->AddPage();

$pdf->SetFont('Arial','',10);
//cabezera de columnas
//carrera
//$pdf->Cell(90,5,'Carrera: '.utf8_decode($Carrera->Nombre),0,1);
//gestion
$pdf->Cell(70,5,'Gestion: '.$Gestion,0,1);
//fecha actual 
$pdf->Cell(70,5,'Fecha actual: '.date('d/M/Y'),0,1);
$pdf->Ln(2);

$pdf->SetFont('Arial','B',9);
//titulos de columnas
$pdf->Cell(22, 5, 'Matrícula', 1, 0, 'L');
$pdf->Cell(23, 5, 'Fecha', 1, 0, 'L');
if ($RegUniversitario){
	$pdf->Cell(22, 5, 'Reg.Univ.', 1, 0, 'L');  
}
if ($CI){
	$pdf->Cell(20, 5, 'CI', 1, 0, 'L');  
}
$pdf->Cell(40, 5, 'Nombre', 1, 0, 'L');  
$pdf->Cell(40, 5, 'Carrera', 1, 1, 'L');  
//$pdf->Ln(1);
$pdf->SetFont('Arial','',9);
foreach($Tabla->result() as $row) {
	$pdf->Cell(22, 5, $row->Matricula, 'LB', 0, 'L');  
	$pdf->Cell(23, 5, date('d/M/Y',strtotime($row->Fecha)), 'B', 0, 'L');  
	if ($RegUniversitario){
		$pdf->Cell(22, 5, $row->RegUniversitario, 'B', 0, 'L');
	}
	if ($CI){
		$pdf->Cell(20, 5, $row->CI, 'B', 0, 'L');
	}
	$pdf->Cell(40, 5, utf8_decode($row->NombreCompleto), 'B', 0, 'L');
	$pdf->Cell(40, 5, utf8_decode($row->NombreCarrera), 'BR', 1, 'L');
}

$pdf->Output('quote.pdf', 'D');  
?>