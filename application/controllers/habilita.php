<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Habilita extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model('Modelo_habilitacion','modelo_habilitacion');
    }
	
	public function index()
	{
		$this->load->view('habilita_lista');
	}
	
	public function agrega()
	{
		$data['VistaMenu'] = 'vista_menu';
        if ($this->form_validation->run()) {
			$FechaInicio = FechaParaMySQL($this->input->post('FechaInicio'));
			$FechaFin = FechaParaMySQL($this->input->post('FechaFin'));
			$this->modelo_habilitacion->Insert($FechaInicio, $FechaFin, $this->input->post('CodCarrera'), $this->input->post('DesdeNombre'),$this->input->post('HastaNombre'));
			$data['Mensaje'] = "Se ha registrado la habilitaci&oacute;n de matr&iacute;culas.";
            $data['VistaPrincipal'] = 'vista_mensaje';
		} else
            $data['VistaPrincipal'] = 'habilita_agrega';      
        $this->load->view('vista_maestra', $data);
	}
	
	public function edita($id=0)
	{
		$data['VistaMenu'] = 'vista_menu';
        if ($this->form_validation->run()) {
			$FechaInicio = FechaParaMySQL($this->input->post('FechaInicio'));
			$FechaFin = FechaParaMySQL($this->input->post('FechaFin'));
			$this->modelo_habilitacion->Update($this->input->post('CodHabilitacion'),$FechaInicio, $FechaFin, $this->input->post('CodCarrera'), $this->input->post('DesdeNombre'),$this->input->post('HastaNombre'));
			$data['Mensaje'] = "Se ha actualizado la habilitaci&oacute;n de matr&iacute;culas.";
            $data['VistaPrincipal'] = 'vista_mensaje';
		} else
            $data['VistaPrincipal'] = 'habilita_edita';      
        $this->load->view('vista_maestra', $data);
	}

	public function verificar($id_carrera)
	{
		$test=array('id_carrera'=>1,'inicio'=>'25/12/2012','fin'=>'25/01/2013','apellido_ini'=>'A','apellido_fin'=>'H');

		//CONSULTA SQL para ver si esta disponible la matriculacion para esa carrera
		//strtodate($fecha)
		//EL resultado se almacena en $result
		$result=$test;
		
		$this->load->view('habilita_verifica',$data);
	}
}