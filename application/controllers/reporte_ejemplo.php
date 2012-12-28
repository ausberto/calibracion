<?php

class Reporte_ejemplo extends CI_Controller {

    private $Menu;
	
	function __construct() {
        parent::__construct();
		define('FPDF_FONTPATH',$this->config->item('fonts_path'));
		$this->load->library(array('fpdf'));
    }

	function Index() {
		$data['Nombre'] = 'juan perez';
		$this->output->set_header('Content: application/pdf');
		$this->load->view('vista_reporte_prueba_pdf', $data);
	}
}
?>