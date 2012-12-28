<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Calibra extends CI_Controller {

	public function index()
	{
		$this->load->library('session');
		$this->load->helper('url');
		$data["css"]='<link rel="stylesheet" href="'.base_url().'css/style.css" type="text/css" />
		<link rel="stylesheet" href="'.base_url().'js/shadowbox-3.0.3/shadowbox.css" type="text/css" />
		<link rel="stylesheet" href="'.base_url().'js/jqueryUI/css/south-street/jquery-ui-1.8.16.custom.css" type="text/css" />
		<link rel="stylesheet" href="'.base_url().'css/style_calibra.css" type="text/css" />';
		$data["javascript"]='<script type="text/javascript" src="'.base_url().'js/jquery-1.7.min.js"></script>
		<script type="text/javascript" src="'.base_url().'js/shadowbox-3.0.3/shadowbox.js"></script>
		<script type="text/javascript" src="'.base_url().'js/jqueryUI/js/jquery-ui-1.8.16.custom.min.js"></script>
		<script type="text/javascript" src="'.base_url().'js/functions.js"></script>';
		
		if (!$this->session->userdata('anverso')) {
			if (file_exists('pagina.def')){
				$content=unserialize(file_get_contents('pagina.def'));
				$this->session->set_userdata('anverso', base64_decode($content['anverso']));
				$this->session->set_userdata('reverso', base64_decode($content['reverso']));
				$this->session->set_userdata('espacios', $content['espacios']);
			}
		}
		
		$data["anverso"]=$this->session->userdata('anverso');
		$data["reverso"]=$this->session->userdata('reverso');
		$data["espacios"]=$this->session->userdata('espacios');
		$this->load->view('calibra',$data);
	}
	
	public function printpage()
	{
		$this->load->library('session');
		$this->load->helper('url');
		$data["css"]='<link rel="stylesheet" href="'.base_url().'css/style.css" type="text/css" />
		<link rel="stylesheet" href="'.base_url().'js/shadowbox-3.0.3/shadowbox.css" type="text/css" />
		<link rel="stylesheet" href="'.base_url().'js/jqueryUI/css/south-street/jquery-ui-1.8.16.custom.css" type="text/css" />
		<link rel="stylesheet" href="'.base_url().'css/style_print.css" type="text/css" />';
		$data["javascript"]='<script type="text/javascript" src="'.base_url().'js/jquery-1.7.min.js"></script>
		<script type="text/javascript" src="'.base_url().'js/shadowbox-3.0.3/shadowbox.js"></script>
		<script type="text/javascript" src="'.base_url().'js/jqueryUI/js/jquery-ui-1.8.16.custom.min.js"></script>';

		$arrayVars=array('{Apellidos y Nombres}','{Carnet}','{Reg. universitario}','{Carrera}','{Domicilio}','{Fecha}','{Categoria}','{Numero}');
		$arrayDatos=array('Huanca Vila Ausberto','1234567 LP','12387-UIOPO','Ingenieria de sistemas','Villa Victoria Calle Pacajes #10','20 de octubre','Mi categoria','12313478979');
		$data["anverso"]=str_replace($arrayVars,$arrayDatos,$this->session->userdata('anverso'));
		$data["reverso"]=str_replace($arrayVars,$arrayDatos,$this->session->userdata('reverso'));
		//$data["anverso"]=$this->session->userdata('anverso');
		//$data["reverso"]=$this->session->userdata('reverso');
		$data["espacios"]=$this->session->userdata('espacios');
		$this->load->view('print',$data);
	}
	
	public function ajax($opcion='')
	{
		$this->load->library('session');
		if ($opcion=="exportar"){
			header("Content-Type: application/force-download"); 
			header('Content-Description: File Transfer');
			header('Content-Disposition: attachment; filename="pagina.def"');
			print serialize(array('anverso'=>base64_encode($this->session->userdata('anverso')),'reverso'=>base64_encode($this->session->userdata('reverso')),'espacios'=>$this->session->userdata('espacios')));
			exit;
		} elseif ($this->input->post('anverso') && $this->input->post('reverso')){
			$this->session->set_userdata('anverso', $this->input->post('anverso'));
			$this->session->set_userdata('reverso', $this->input->post('reverso'));
			$this->session->set_userdata('espacios', array('hs'=>$this->input->post("hs"),'vs'=>$this->input->post("vs"),'ms'=>$this->input->post("ms")));
			exit;
		} elseif ($this->input->post('reset')){
			$this->session->unset_userdata('anverso');
			$this->session->unset_userdata('reverso');
			$this->session->unset_userdata('espacios');
			exit;
		}
	}
}