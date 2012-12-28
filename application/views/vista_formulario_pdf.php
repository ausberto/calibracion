<?php
$Upea="Universidad Pública y Autónoma de El Alto";
$Titulo = "DATOS PERSONALES DE MATRICULACIÓN";
$Form="Formulario 01";
$maxX=170;
$marginX=25;



$this->fpdf->SetAutoPageBreak(TRUE, 20);
$this->fpdf->Open();
$this->fpdf->SetMargins(25, 10, 20);
$this->fpdf->SetTextColor(0,0,0);
$this->fpdf->AliasNbPages();
$this->fpdf->AddPage('P', 'Letter');
$this->fpdf->setFont('Arial', 'B', 12);
$this->fpdf->SetXY(10,10);
$this->fpdf->Cell($maxX-40, 15, utf8_decode($Upea), 0, 0, 'C');  $this->fpdf->Cell(32, 15, $Form, 0, 1, 'L');  
$this->fpdf->setFont('Arial', 'B', 12);
$this->fpdf->Cell($maxX, 15,utf8_decode( $Titulo), 0, 1, 'C');  
$this->fpdf->setFont('Arial', '', 8);
$this->fpdf->SetX($marginX);

$this->fpdf->MultiCell($maxX,5, "DOCUMENTOS PRESENTADOS A REGISTROS Y ADMISIONES(En esta Parte se debe ser llenada por el encargado de Ventanilla./ Unica)", "LTR", 'L', 0);
$this->fpdf->SetX($marginX);
$this->fpdf->Cell($maxX/3+10, 5,utf8_decode("Fotoc. Legalizada del Título de Bachiller: Si: [_]" ) , "L", 0, 'C');  
$this->fpdf->Cell($maxX/3-5, 5,utf8_decode("Certificado de Nac. Comp: Si: [_]"), "", 0, 'C');  
$this->fpdf->Cell($maxX/3-5, 5,utf8_decode("Legalizado CI/RUN/PAS.: Si: [_]"), "R", 0, 'C');  

$this->fpdf->Ln();
$this->fpdf->SetX($marginX);
$this->fpdf->Cell($maxX/3+10, 5,utf8_decode("                                                                  No: [_] " ) , "LB", 0, 'C');  
$this->fpdf->Cell($maxX/3-5, 5,utf8_decode("                                           No: [_] "), "B", 0, 'C');  
$this->fpdf->Cell($maxX/3-5, 5,utf8_decode("                                          No: [_] "), "RB", 0, 'C');  


$this->fpdf->Ln();
$this->fpdf->SetX($marginX);
$this->fpdf->setFont('Arial', 'B', 12);
$this->fpdf->Cell($maxX, 5,utf8_decode("DATOS ACADÉMICOS"), 0, 1, 'L');  
$this->fpdf->MultiCell($maxX,5, "", "LTR", 'L', 0);

$this->fpdf->setFont('Arial', '', 9);
$this->fpdf->SetX($marginX);
$this->fpdf->Cell($maxX/3-20, 5,utf8_decode("Gestión:  [_______] " ) , "L", 0, 'C');  
$this->fpdf->Cell($maxX/3-10, 5,utf8_decode("Fecha de Ingreso: [___/___/_____]"), "", 0, 'C');  
$this->fpdf->Cell($maxX/3+30, 5,utf8_decode("Ingreso por: [_] Examen de Dispensación"), "R", 0, 'L');  
$this->fpdf->Ln();
$this->fpdf->SetX($marginX);
$this->fpdf->Cell($maxX/3-15, 5,utf8_decode("") , "L", 0, 'C');  
$this->fpdf->Cell($maxX/3-15, 5,utf8_decode(""), "", 0, 'C');  
$this->fpdf->Cell($maxX/3+30, 5,utf8_decode("                    [_] Curso Preuniversitario"), "R", 0, 'L');  
$this->fpdf->Ln();
$this->fpdf->SetX($marginX);
$this->fpdf->Cell($maxX/3-15, 5,utf8_decode("") , "L", 0, 'C');  
$this->fpdf->Cell($maxX/3-15, 5,utf8_decode(""), "", 0, 'C');  
$this->fpdf->Cell($maxX/3+30, 5,utf8_decode("                    [_] Traspaso de otra Universidad"), "R", 0, 'L');  
$this->fpdf->Ln();
$this->fpdf->SetX($marginX);
$this->fpdf->Cell($maxX/3-15, 5,utf8_decode("") , "LB", 0, 'C');  
$this->fpdf->Cell($maxX/3-15, 5,utf8_decode(""), "B", 0, 'C');  
$this->fpdf->Cell($maxX/3+30, 5,utf8_decode("                    [_] Profesional"), "RB", 0, 'L');  

$this->fpdf->Ln();
$this->fpdf->SetX($marginX);
$this->fpdf->setFont('Arial', 'B', 12);
$this->fpdf->Cell($maxX, 5,utf8_decode("DATOS GENERALES DEL ESTUDIANTE"), 0, 1, 'L');  
$this->fpdf->setFont('Arial', 'B', 9);
$this->fpdf->MultiCell($maxX,5, utf8_decode("Nombres:  ".$Fila->Nombres), "LTR", 'L', 0);

$this->fpdf->setFont('Arial', 'B', 9);
$this->fpdf->SetX($marginX);
$this->fpdf->Cell($maxX/3, 5,utf8_decode("Ap. Paterno:  ".$Fila->Paterno ) , "L", 0, 'L');  
$this->fpdf->Cell($maxX/3+30, 5,utf8_decode("Sexo:  ".$Genero), "", 0, 'C');  
$this->fpdf->Cell($maxX/3-30 , 5,utf8_decode(""), "LRT", 0, 'L');  

$this->fpdf->Ln();
$this->fpdf->SetX($marginX);
$this->fpdf->Cell($maxX/3, 5,utf8_decode("Ap. Materno:  ".$Fila->Materno ) , "L", 0, 'L');  
$this->fpdf->Cell($maxX/3, 5,utf8_decode("CI/RUN/PAS.:".$Fila->CI), "", 0, 'C');  
$this->fpdf->Cell($maxX/3 /2+1.7 , 5,utf8_decode("Exp.".$Fila->Expedido), "0", 0, 'L');  
$this->fpdf->Cell($maxX/3 /2-1.7, 5,utf8_decode(""), "LR", 0, 'L');  

$this->fpdf->Ln();
$this->fpdf->SetX($marginX);
$this->fpdf->Cell($maxX/3, 5,utf8_decode("Fecha de Nacimiento:  ".$FechaNac ) , "L", 0, 'L');  
$this->fpdf->Cell($maxX/3+30, 5,utf8_decode("Lugar de Nacimiento: ".$Fila->LugarNac), "", 0, 'C');  

$this->fpdf->Cell(($maxX/3-30) , 5,utf8_decode(""), "LR", 0, 'L');  

$this->fpdf->Ln();
$this->fpdf->SetX($marginX);
$this->fpdf->Cell($maxX/3+30, 5,utf8_decode("Domicilio:  ".$Fila->Domicilio ) , "L", 0, 'L');  
$this->fpdf->Cell($maxX/3, 5,utf8_decode("Nacionalidad:  ".$Fila->NombrePaisNacimiento), "", 0, 'C');  
$this->fpdf->Cell($maxX/3-30 , 5,utf8_decode(""), "LBR", 0, 'L');  

$this->fpdf->Ln();
$this->fpdf->SetX($marginX);
$this->fpdf->Cell($maxX/3, 5,utf8_decode("Teléfono:  ".$Fila->Telefono ) , "L", 0, 'L');  
$this->fpdf->Cell($maxX/3+30, 5,utf8_decode("Email:  ".$Fila->Correo), "", 0, 'C');  
$this->fpdf->Cell($maxX/3-30 , 5,utf8_decode(""), "R", 0, 'L');  

$this->fpdf->Ln();
$this->fpdf->SetX($marginX);
$this->fpdf->Cell($maxX/2, 5,utf8_decode("Estado Civil:  ".$EstadoCivil) , "LB", 0, 'L');  
$this->fpdf->Cell($maxX/2, 5,utf8_decode("Tel. de Emergencia: ".$Fila->TelUrgencia), "BR", 0, 'C');  

$this->fpdf->Ln();
$this->fpdf->SetX($marginX);
$this->fpdf->setFont('Arial', 'B', 12);
$this->fpdf->Cell($maxX, 5,utf8_decode("DATOS DE EGRESO DE SECUNDARIA"), 0, 1, 'L');  
$this->fpdf->MultiCell($maxX,5, "", "LTR", 'L', 0);
$this->fpdf->setFont('Arial', '', 9);
$this->fpdf->SetX($marginX);
$this->fpdf->Cell($maxX/3, 5,utf8_decode("Colegio:  ".$Fila->Colegio ) , "L", 0, 'L');  
$this->fpdf->Cell($maxX/3, 5,utf8_decode("Año de Egreso: ".$Fila->AnioEgreso), "", 0, 'C');  
$this->fpdf->Cell($maxX/3 , 5,utf8_decode(""), "R", 0, 'L');  

$this->fpdf->Ln();
$this->fpdf->SetX($marginX);
$this->fpdf->Cell($maxX/3-30, 5,utf8_decode("Tipo:  ".$TipoColegio ) , "L", 0, 'L');  
$this->fpdf->Cell($maxX/3+30, 5,utf8_decode("Localidad: ".$Fila->Localidad), "", 0, 'C');  
$this->fpdf->Cell($maxX/3 , 5,utf8_decode("Pais:  ".$Fila->NombrePaisTitulo), "R", 0, 'L');  

$this->fpdf->Ln();
$this->fpdf->SetX($marginX);
$this->fpdf->Cell($maxX, 5,utf8_decode("Univerdidad que expide el Título de Bachiller: ".$Fila->Universidad ) , "LR", 0, 'L');  

$this->fpdf->Ln();
$this->fpdf->SetX($marginX);
$this->fpdf->Cell($maxX/2 , 5,utf8_decode("Número del Tit. de Bachiller:  ".$Fila->NumTitulo), "LB", 0, 'L');  
$this->fpdf->Cell($maxX/2 , 5,utf8_decode("Año del titulo de Bachiller:  ".$Fila->AnioTitulo), "RB", 0, 'L');  

$this->fpdf->Ln();
$this->fpdf->SetX($marginX);
$this->fpdf->setFont('Arial', 'B', 12);
$this->fpdf->Cell($maxX, 5,utf8_decode("DATOS SOCIO ECONÓMICOS"), 0, 1, 'L');  
$this->fpdf->MultiCell($maxX,5, "", "LTR", 'L', 0);
$this->fpdf->setFont('Arial', '', 9);
$this->fpdf->SetX($marginX);
$this->fpdf->Cell($maxX, 5,utf8_decode("Zona Aproximada de la Vivienda:  ".$Fila->Zona ) , "LR", 0, 'L');  
$this->fpdf->Ln();
$this->fpdf->SetX($marginX);
$this->fpdf->Cell($maxX/2 , 5,utf8_decode("La Vivienda que habita es:  ".$TipoVivienda), "L", 0, 'L');  
$this->fpdf->Cell($maxX/2 , 5,utf8_decode("Caracteristicas de la Vivienda:  ".$Caracteristicas), "R", 0, 'L');  
$this->fpdf->Ln();
$this->fpdf->SetX($marginX);
$this->fpdf->Cell($maxX/3 , 5,utf8_decode("¿Trabaja?:  ".$Trabaja), "LB", 0, 'L');  
$this->fpdf->Cell($maxX/3 , 5,utf8_decode("¿Trabaja Como?:  ".$Trabajo), "B", 0, 'L');  
$this->fpdf->Cell($maxX/3 , 5,utf8_decode("Jornada:  ".$Jornada), "RB", 0, 'L');  

$this->fpdf->Ln();
$this->fpdf->SetX($marginX);
$this->fpdf->setFont('Arial', 'B', 12);
$this->fpdf->Cell($maxX, 5,utf8_decode("CAMBIOS DE CARRERA REALIZADOS"), 0, 1, 'L');   
$this->fpdf->MultiCell($maxX,5, "", "LTR", 'L', 0);
$this->fpdf->setFont('Arial', '', 9);


$this->fpdf->SetX($marginX);
$this->fpdf->Cell($maxX/3 , 5,utf8_decode(" "), "LR", 0, 'L');  
$this->fpdf->Cell($maxX/3 , 5,utf8_decode("Carrera de Origen:  "), "L", 0, 'L');  
$this->fpdf->Cell($maxX/3 , 5,utf8_decode("-----------------------------------------"), "R", 0, 'L');  
$this->fpdf->Ln();
$this->fpdf->SetX($marginX);
$this->fpdf->Cell($maxX/3 , 5,utf8_decode(" "), "LR", 0, 'L');  
$this->fpdf->Cell($maxX/3 , 5,utf8_decode("1er Cambio de carrera:  "), "L", 0, 'L');  
$this->fpdf->Cell($maxX/3 , 5,utf8_decode("-----------------------------------------"), "R", 0, 'L');  

$this->fpdf->Ln();
$this->fpdf->SetX($marginX);
$this->fpdf->Cell($maxX/3 , 5,utf8_decode(" "), "LR", 0, 'L');  
$this->fpdf->Cell($maxX/3 , 5,utf8_decode("2do Cambio de carrera:  "), "L", 0, 'L');  
$this->fpdf->Cell($maxX/3 , 5,utf8_decode("-----------------------------------------"), "R", 0, 'L');  

$this->fpdf->Ln();
$this->fpdf->SetX($marginX);
$this->fpdf->Cell($maxX , 5,utf8_decode(""), "LBR", 0, 'L');  
$this->fpdf->Ln();
$this->fpdf->SetX($marginX);
$this->fpdf->Cell($maxX , 5,utf8_decode("Generado por el sistema de Matriculación de la Universidad Pública y Autónoma de El Alto (".date("d-m-Y H:i").")"), "LBR", 0, 'L');  


$this->fpdf->Ln();


$aux = "Formulario01".$Fila->CI.".pdf";
$this->fpdf->Output($aux, 'D');