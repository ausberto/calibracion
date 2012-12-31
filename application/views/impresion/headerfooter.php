<?php 
class Mypdf extends fpdf {
    
	public $Linea1, $Linea2, $Linea3, $Titulo;
	
	function __construct() {
        parent::__construct();
        $this->init();
    }

    function init() {
        $this->Open();
        $this->SetMargins(25, 15, 15);
        $this->SetAutoPageBreak(TRUE);
        
        # Image scale factor
        //$this->setImageScale(PDF_IMAGE_SCALE_RATIO);
        $this->AliasNbPages(); 
    }

        //Page header
    public function Header() {
        // Logo
		//$this->Image('logo.png',10,6,30);
		$this->SetFont('Arial','',11);
		$this->Cell(60,5, utf8_decode($this->Linea1), 0, 1, 'C');
		$this->Cell(60,5, utf8_decode($this->Linea2), 0, 1, 'C');
		$this->Cell(60,5, utf8_decode($this->Linea3), 0, 1, 'C');
		$this->Ln(2);//...
		// Arial bold 15
		$this->SetFont('Arial','B',15);
		// Move to the right
		$this->Cell(10);
		// Title
		$this->Cell(150,8, $this->Titulo, 1,0,'C');
		// Line break
		$this->Ln(10);//...
    }

	function Footer() {
		// Position at 1.5 cm from bottom
		$this->SetY(-15);
		// Arial italic 8
		$this->SetFont('Arial','I',8);
		// Page number
		$this->Cell(0,10, utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'R');
	}
} 
?>