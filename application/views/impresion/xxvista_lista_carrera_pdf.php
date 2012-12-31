<?php
global $Linea1, $Linea2, $Linea3, $Titulo;

$Linea1 =  $this->modelo_valores->GetTexto('LINEA1');		 
$Linea2 =  $this->modelo_valores->GetTexto('LINEA2');
$Linea3 =  $this->modelo_valores->GetTexto('LINEA3');
$Titulo = "Lista de matriculados por carrera";

$this->fpdf->SetAutoPageBreak(TRUE, 20);
$this->fpdf->Open();
$this->fpdf->SetMargins(25, 10, 20);
$this->fpdf->SetTextColor(0,0,0);
$this->fpdf->AliasNbPages();
$this->fpdf->AddPage('P', 'Letter');
$this->fpdf->setFont('Arial', '', 12);

$this->fpdf->Cell(32, 5, 'Nombre cliente:', 0, 0, 'L');  $this->fpdf->Cell(0,5, 'Juan Perez Gomez', 0, 1, 'L');

$aux = "repo.pdf";
$this->fpdf->Output($aux, 'D');