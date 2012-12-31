<?php
$Titulo = "Reporte de prueba";

$this->fpdf->SetAutoPageBreak(TRUE, 20);
$this->fpdf->Open();
$this->fpdf->SetMargins(25, 10, 20);
$this->fpdf->SetTextColor(0,0,0);
$this->fpdf->AliasNbPages();
$this->fpdf->AddPage('P', 'Letter');
$this->fpdf->setFont('Arial', '', 12);

$this->fpdf->Cell(32, 5, 'Nombre cliente:', 0, 0, 'L');  $this->fpdf->Cell(0,5, $Nombre, 0, 1, 'L');

$aux = "prueba.pdf";
$this->fpdf->Output($aux, 'D');