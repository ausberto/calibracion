<?php
// hereda la clase FPDF para crear header() y footer()
require('headerfooter.php');

$pdf = new Mypdf;

$pdf->Linea1 =  $this->modelo_valores->GetTexto('LINEA1');		 
$pdf->Linea2 =  $this->modelo_valores->GetTexto('LINEA2');
$pdf->Linea3 =  $this->modelo_valores->GetTexto('LINEA3');
$pdf->Titulo = "Estadística por universidad que expidio el titulo";
$pdf->AddPage();

$pdf->SetFont('Arial','',10);
//cabezera de columnas
//carrera
$pdf->Cell(90,5,'Reporte: '.$Reporte,0,1);
//gestion
$pdf->Cell(70,5,'Gestion: '.$Gestion,0,1);
//fecha actual 
$pdf->Cell(70,5,'Fecha actual: '.date('d/M/Y'),0,1);
$pdf->Ln(2);

$pdf->SetFont('Arial','B',8);
//titulos de columnas
$pdf->Cell(8, 5, '#', 1, 0, 'C');
$pdf->Cell(80, 5, 'Carrera', 1, 0, 'L');  
$pdf->Cell(15, 5, 'UPEA', 1, 0, 'C');
$pdf->Cell(15, 5, 'UMSA', 1, 0, 'C');
$pdf->Cell(15, 5, 'UTO', 1, 0, 'C');
$pdf->Cell(15, 5, 'UTF', 1, 0, 'C');
$pdf->Cell(15, 5, 'USXX', 1, 0, 'C');
$pdf->Cell(15, 5, 'USFX', 1, 0, 'C');
$pdf->Cell(15, 5, 'UMSS', 1, 0, 'C');
$pdf->Cell(15, 5, 'UAGRM', 1, 0, 'C');
$pdf->Cell(15, 5, 'UAP', 1, 0, 'C');
$pdf->Cell(15, 5, 'UJMS', 1, 0, 'C');
$pdf->Cell(15, 5, 'UTB', 1, 0, 'C');
$pdf->Cell(15, 5, 'SEDUCA', 1, 0, 'C');
$pdf->Cell(15, 5, 'Total', 1, 1, 'C');
//$pdf->Ln(1);
$pdf->SetFont('Arial','',8);
$newArray=array();
foreach($Tabla->result() as $row) {
	$newArray[$row->CodCarrera]['UPEA']=(!isset($newArray[$row->CodCarrera]['UPEA']))?0:$newArray[$row->CodCarrera]['UPEA'];
	$newArray[$row->CodCarrera]['UMSA']=(!isset($newArray[$row->CodCarrera]['UMSA']))?0:$newArray[$row->CodCarrera]['UMSA'];
	$newArray[$row->CodCarrera]['UTO']=(!isset($newArray[$row->CodCarrera]['UTO']))?0:$newArray[$row->CodCarrera]['UTO'];
	$newArray[$row->CodCarrera]['UTF']=(!isset($newArray[$row->CodCarrera]['UTF']))?0:$newArray[$row->CodCarrera]['UTF'];
	$newArray[$row->CodCarrera]['USXX']=(!isset($newArray[$row->CodCarrera]['Otro']))?0:$newArray[$row->CodCarrera]['Otro'];
	$newArray[$row->CodCarrera]['USFX']=(!isset($newArray[$row->CodCarrera]['Otro']))?0:$newArray[$row->CodCarrera]['Otro'];
	$newArray[$row->CodCarrera]['UMSS']=(!isset($newArray[$row->CodCarrera]['Otro']))?0:$newArray[$row->CodCarrera]['Otro'];
	$newArray[$row->CodCarrera]['UAGRM']=(!isset($newArray[$row->CodCarrera]['Otro']))?0:$newArray[$row->CodCarrera]['Otro'];
	$newArray[$row->CodCarrera]['UAP']=(!isset($newArray[$row->CodCarrera]['Otro']))?0:$newArray[$row->CodCarrera]['Otro'];
	$newArray[$row->CodCarrera]['UJMS']=(!isset($newArray[$row->CodCarrera]['Otro']))?0:$newArray[$row->CodCarrera]['Otro'];
	$newArray[$row->CodCarrera]['UTB']=(!isset($newArray[$row->CodCarrera]['Otro']))?0:$newArray[$row->CodCarrera]['Otro'];
	$newArray[$row->CodCarrera]['SEDUCA']=(!isset($newArray[$row->CodCarrera]['Otro']))?0:$newArray[$row->CodCarrera]['Otro'];
	
	$newArray[$row->CodCarrera]['NombreCarrera']=$row->NombreCarrera;
	$newArray[$row->CodCarrera]['UPEA']+=$row->UPEA;
	$newArray[$row->CodCarrera]['UMSA']+=$row->UMSA;
	$newArray[$row->CodCarrera]['UTO']+=$row->UTO;
	$newArray[$row->CodCarrera]['UTF']+=$row->UTF;
}

$count=0;
$TotalPublico=0;
$TotalPrivado=0;
$TotalCema=0;
$TotalOtro=0;
foreach($newArray as $row) {
	$count++;
	$pdf->Cell(8, 5, $count, 'LB', 0, 'C');
	$pdf->Cell(80, 5, utf8_decode($row["NombreCarrera"]), 'B', 0, 'L');  
	$TotalPublico+=$row["Publico"];
	$pdf->Cell(15, 5, $row["Publico"], 'B', 0, 'C');
	$TotalPrivado+=$row["Privado"];
	$pdf->Cell(15, 5, $row["Privado"], 'B', 0, 'C');
	$TotalCema+=$row["Cema"];
	$pdf->Cell(15, 5, $row["Cema"], 'B', 0, 'C');
	$TotalOtro+=$row["Otro"];
	$pdf->Cell(15, 5, $row["Otro"], 'B', 0, 'C');
	$pdf->Cell(15, 5, ($row["Publico"]+$row["Privado"]+$row["Cema"]+$row["Otro"]), 'BR', 1, 'C');
}
$pdf->Cell(8, 5, '', 0, 0, 'C');
$pdf->Cell(80, 5, 'Total', 0, 0, 'C');
$pdf->Cell(15, 5, $TotalPublico, 0, 0, 'C');
$pdf->Cell(15, 5, $TotalPrivado, 0, 0, 'C');
$pdf->Cell(15, 5, $TotalCema, 0, 0, 'C');
$pdf->Cell(15, 5, $TotalOtro, 0, 0, 'C');
$pdf->Cell(15, 5, ($TotalPublico+$TotalPrivado+$TotalCema+$TotalOtro), 0, 1, 'C');


$pdf->Output('quote.pdf', 'D');  
?>