<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Habilita extends CI_Controller {

	public function index()
	{
		$this->load->view('habilita_lista');
	}
	
	public function agrega()
	{
		if ($this->input->post('FechaInicio')){
			/*$this->load->model('Modelo');
			$this->Modelo->agrega(); */
		}
		$this->load->view('habilita_agrega');
	}
	
	public function edita($id=0)
	{
		if ($this->input->post('FechaInicio')){
			/*$this->load->model('Modelo');
			$this->Modelo->edita(); */
		}
		$this->load->view('habilita_edita');
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