<?php
// hereda la clase FPDF para crear header() y footer()
require('headerfooter.php');

$pdf = new Mypdf;

$pdf->Linea1 =  $this->modelo_valores->GetTexto('LINEA1');		 
$pdf->Linea2 =  $this->modelo_valores->GetTexto('LINEA2');
$pdf->Linea3 =  $this->modelo_valores->GetTexto('LINEA3');
$pdf->Titulo = "Lista de matriculados por carrera";
$pdf->AddPage();

$pdf->SetFont('Arial','',10);
//cabezera de columnas
//carrera
$pdf->Cell(90,5,'Carrera: '.utf8_decode($Carrera->Nombre),0,1);
//gestion
$pdf->Cell(70,5,'Gestion: '.$Gestion,0,1);
//fecha actual 
$pdf->Cell(70,5,'Fecha actual: '.date('d/M/Y'),0,1);
$pdf->Ln(2);

$pdf->SetFont('Arial','B',10);
//titulos de columnas
$pdf->Cell(100, 5, 'Nombre', 1, 0, 'L');  
if ($CI){
	$final=($RegUniversitario)?0:1;
	$pdf->Cell(35, 5, 'CI', 1, $final, 'L');  
}
if ($RegUniversitario){
	$pdf->Cell(35, 5, 'Reg.Univ.', 1, 1, 'L');  
}
//$pdf->Ln(1);
$pdf->SetFont('Arial','',10);
foreach($Tabla->result() as $row) {
	$pdf->Cell(100, 5, $row->NombreCompleto, 'LB', 0, 'L');  
	if ($CI){
		$margen=($RegUniversitario)?'B':'BR';
		$final=($RegUniversitario)?0:1;
		$pdf->Cell(35, 5, $row->CI, $margen, $final, 'L');
	}
	if ($RegUniversitario){
		$pdf->Cell(35, 5, $row->RegUniversitario, 'BR', 1, 'L');  
	}
}

$pdf->Output('quote.pdf', 'D');  
?>