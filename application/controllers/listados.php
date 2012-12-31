<?php

class Listados extends CI_Controller {

    private $Menu;
	
	function __construct() {
        parent::__construct();
		define('FPDF_FONTPATH',$this->config->item('fonts_path'));
		$this->load->library('fpdf');

		//$TipoUsuario = $this->session->userdata('TipoUsuario');
		$TipoUsuario = 1;
		$this->Menu = ObtieneVista($TipoUsuario);
    }

    function Index() {
        $this->funciones->VerificaSesion();
		
		$data['TituloPagina'] = 'Reporte';
        $data['Titulo'] = 'Reporte';            
        $data['VistaPrincipal'] = 'vista_consulta_reporte';		
		$data['ListaEstados']=$this->modelo_estado->ComboEstado(set_value('Estado'));
        $this->load->view('vista_maestra', $data);
    }
	
	function ListaPorCarrera2(){
		$data['CodCarrera'] = $this->input->post('CodCarrera');
		$data['Carrera'] = $this->modelo_carrera->GetCarrera($this->input->post('CodCarrera'));
		$data['Gestion'] = $this->input->post('Gestion');
		$data['CI'] = $this->input->post('CI');
		$data['RegUniversitario'] = $this->input->post('RegUniversitario');
		$data['Tabla'] = $this->modelo_matricula->TablaMatriculados($data['CodCarrera'], $data['Gestion']);
		$this->output->set_header('Content: application/pdf');
		$this->load->view('impresion/vista_lista_carrera_pdf', $data);
	}
	
	function ListaPorCarrera1(){
		//$this->funciones->VerificaSesion();
		
		$this->form_validation->set_rules('CodCarrera', 'carrera', 'required|xss_clean');
		$data['ComboCarrera'] = $this->modelo_carrera->ComboCarrera();
		$data['ComboGestion'] = ComboGestion($this->modelo_valores->GetNumero('GESTION'));
		$data['CI'] = true;
		$data['RegUniversitario'] = true;
		$data['VistaMenu'] = $this->Menu;
		if( $this->form_validation->run() )
			$this->ListaPorCarrera2();
		else {
			$data['VistaPrincipal'] = 'impresion/vista_config_lista_carrera';
			$this->load->view('vista_maestra', $data);
		}
	}
}
?>