<?php

class Configuracion extends CI_Controller {
    private $Menu = 'vista_menu';
    
	function __construct() {
        parent::__construct();
		
		//solo para pruebas
		$this->session->set_userdata('NombreUsuario', 'Carlos Torrez Suarez');
		$this->session->set_userdata('CodUsuario', 1);
		$this->session->set_userdata('Gestion', 2012);
    }

    function Index() {
		$data['VistaMenu'] = 'vista_menu';
		$data['VistaPrincipal'] = 'vista_nula';
        $this->load->view('vista_maestra', $data);
    }
	
	function CupoMatriculas() {
		$data['VistaMenu'] = 'vista_menu';
		$this->form_validation->set_rules('Fecha', '"Fecha"', 'trim|valid_date');
        if ($this->form_validation->run()) {
			$Fecha = FechaParaMySQL($this->input->post('Fecha'));										
			$this->modelo_usuario->InsertCupo($this->input->post('CodPersona'), $this->session->userdata('GESTION'), $Fecha, 
			                              $this->input->post('Desde'), $this->input->post('Hasta'));
			$data['Mensaje'] = "Se ha registrado la asignaci&oacute;n de cupo de matr&iacute;culas.";                        
            $data['VistaPrincipal'] = 'vista_mensaje';     										  
		} else
            $data['VistaPrincipal'] = 'vista_cupo_matriculas';      
        $this->load->view('vista_maestra', $data);
	}
	
	function Varios() {
		$data['VistaMenu'] = 'vista_menu';
		$data['Nacional'] = $this->modelo_valores->GetNumero('MATRICULANACIONAL')/100;
		$data['Extranjero'] = $this->modelo_valores->GetNumero('MATRICULAEXTRANJERO')/100;
		$data['Depuracion'] = $this->modelo_valores->GetNumero('DEPURACION');
		$this->form_validation->set_rules('Gestion', '"Gestion"', 'trim|required');
        if ($this->form_validation->run()) {
			$this->modelo_valores->SetNumero('GESTION', $this->input->post('Gestion'));
			$this->modelo_valores->SetNumero('MATRICULANACIONAL', $this->input->post('Nacional')*100);
			$this->modelo_valores->SetNumero('MATRICULAEXTRANJERO', $this->input->post('Extranjero')*100);
			$this->modelo_valores->SetNumero('DEPURACION', $this->input->post('Depuracion'));
			$data['Mensaje'] = "Se han registrado los datos de configuraci&oacute;n.";                        
            $data['VistaPrincipal'] = 'vista_mensaje';     										  
		} else
            $data['VistaPrincipal'] = 'vista_configuracion_varios';      
        $this->load->view('vista_maestra', $data);
	}
	
	function Depuracion() {
		$this->form_validation->set_rules('Dias', '"dias"', 'required');
        $data['VistaMenu'] = $this->Menu;
		if ($this->form_validation->run()) {
			$Accion = $this->input->post("submit");
			if ($Accion == "borrar") {
				$data['Mensaje'] = 'Los inscritos y no matriculados han sido eliminados de la base de datos.';
				$data['VistaPrincipal'] = 'vista_mensaje';            
				$this->load->view('vista_maestra', $data);		
			}
		}
		else {
            $data['VistaMenu'] = $this->Menu;
            $data['VistaPrincipal'] = 'vista_depuracion';
            $this->load->view('vista_maestra', $data);
        }
    }
}
?>
