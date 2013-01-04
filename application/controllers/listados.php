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
	
	function ExportaListaCarrera2(){
		$data['CodCarrera'] = $this->input->post('CodCarrera');
		$data['Carrera'] = $this->modelo_carrera->GetCarrera($this->input->post('CodCarrera'));
		$data['Gestion'] = $this->input->post('Gestion');
		$data['delimitador'] = ';';
		$data['Tabla'] = $this->modelo_matricula->TablaMatriculados($data['CodCarrera'], $data['Gestion']);
		//$this->output->set_header('Content: text/plain');
		$this->output->set_header('Content-Disposition: attachment; filename="lista.csv"');
		$this->output->set_header('Content-Type: application/force-download');
		$this->load->view('impresion/vista_exporta_lista_carrera', $data);
	}
	
	function ExportaListaCarrera(){
		//$this->funciones->VerificaSesion();
		$this->form_validation->set_rules('CodCarrera', 'carrera', 'required|xss_clean');
		$data['ComboCarrera'] = $this->modelo_carrera->ComboCarrera();
		$data['ComboGestion'] = ComboGestion($this->modelo_valores->GetNumero('GESTION'));
		$data['VistaMenu'] = $this->Menu;
		if( $this->form_validation->run() ){
			$this->ExportaListaCarrera2();
		} else {
			$data['VistaPrincipal'] = 'impresion/vista_config_exporta_carrera';
			$this->load->view('vista_maestra', $data);
		}
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
		if( $this->form_validation->run() ){
				$this->ListaPorCarrera2();
		} else {
			$data['VistaPrincipal'] = 'impresion/vista_config_lista_carrera';
			$this->load->view('vista_maestra', $data);
		}
	}
	
	function ListaPorGestion2(){
		//0 : Soltero(a)	1 : Casado(a)	2 : Conviviente		3 : Divorciado(a)	4 : Viudo(a)
		$data['Gestion'] = $this->input->post('Gestion');
		$data['Varones'] = $this->input->post('Varones');
		$data['Mujeres'] = $this->input->post('Mujeres');
		
		$TipoReporte = ($data['Mujeres'])?'F':'';
		$TipoReporte = ($data['Varones'])?'M':$TipoReporte;
		$TipoReporte = ($data['Mujeres']&&$data['Varones'])?'FM':$TipoReporte;

		$ArrayTiposReportes=array('F'=>'Mujeres','M'=>'Varones','FM'=>'Varones y mujeres');
		$data['Reporte'] = $ArrayTiposReportes[$TipoReporte];
		$data['Tabla'] = $this->modelo_matricula->TablaEstadosCiviles($data['Gestion'],$TipoReporte);
		$this->output->set_header('Content: application/pdf');
		$this->load->view('impresion/vista_lista_gestion_pdf', $data);
	}
	
	function ListaPorGestion(){
		$data['ComboGestion'] = ComboGestion($this->modelo_valores->GetNumero('GESTION'));
		$data['Varones'] = true;
		$data['Mujeres'] = true;
		$data['VistaMenu'] = $this->Menu;
		$this->form_validation->set_rules('Gestion', 'Gestion', 'required|xss_clean');
		if( $this->form_validation->run() ){
				$this->ListaPorGestion2();
		} else {
			$data['VistaPrincipal'] = 'impresion/vista_config_lista_gestion';
			$this->load->view('vista_maestra', $data);
		}
	}
	
	function ListaMatriculas2(){
		$data['CodCarrera'] = $this->input->post('CodCarrera');
		//$data['Carrera'] = $this->modelo_carrera->GetCarrera($this->input->post('CodCarrera'));
		$data['Gestion'] = $this->input->post('Gestion');
		$data['Tabla'] = $this->modelo_matricula->TablaMatriculados($data['CodCarrera'], $data['Gestion']);
		$this->output->set_header('Content: application/pdf');
		$this->load->view('impresion/vista_lista_matricula_pdf', $data);
	}
	
	function ListaMatriculas(){
		$data['ComboCarrera'] = $this->modelo_carrera->ComboCarrera();
		$data['ComboGestion'] = ComboGestion($this->modelo_valores->GetNumero('GESTION'));
		$data['CI'] = true;
		$data['RegUniversitario'] = true;
		$data['VistaMenu'] = $this->Menu;
		$this->form_validation->set_rules('Gestion', 'Gestion', 'required|xss_clean');
		if( $this->form_validation->run() ){
			$this->ListaMatriculas2();
		} else {
			$data['VistaPrincipal'] = 'impresion/vista_config_lista_matricula';
			$this->load->view('vista_maestra', $data);
		}
	}
	
	function EstadisticaPorCarreraEdad2(){
		$data['Gestion'] = $this->input->post('Gestion');
		$data['Tabla'] = $this->modelo_matricula->TablaCarreraEdad($data['Gestion']);
		$this->output->set_header('Content: application/pdf');
		$this->load->view('impresion/vista_lista_carrera_edad_pdf', $data);
	}
	
	function EstadisticaPorCarreraEdad(){
		$data['ComboGestion'] = ComboGestion($this->modelo_valores->GetNumero('GESTION'));
		$data['VistaMenu'] = $this->Menu;
		$this->form_validation->set_rules('Gestion', 'Gestion', 'required|xss_clean');
		if( $this->form_validation->run() ){
			$this->EstadisticaPorCarreraEdad2();
		} else {
			$data['VistaPrincipal'] = 'impresion/vista_config_lista_carrera_edad';
			$this->load->view('vista_maestra', $data);
		}
	}
	
	function ImprimeMatricula(){
		$this->load->library('session');
		$this->load->helper('url');

		$data['VistaMenu'] = $this->Menu;
		$data["css"]='
		<link rel="stylesheet" href="'.base_url().'js/jqueryUI/css/south-street/jquery-ui-1.8.16.custom.css" type="text/css" />
		<link rel="stylesheet" href="'.base_url().'css/style_calibra.css" type="text/css" />';
		$data["javascript"]='<script type="text/javascript" src="'.base_url().'js/jquery-1.7.min.js"></script>
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
		
		$this->form_validation->set_rules('hs', 'hs', 'required');
		$this->form_validation->set_rules('vs', 'vs', 'required');
		$this->form_validation->set_rules('ms', 'ms', 'required');
		if( $this->form_validation->run() ){
			$this->ImprimeMatricula2();
		} else {
			$data['VistaPrincipal'] = 'impresion/vista_config_matricula';
			$this->load->view('vista_maestra', $data);
		}
	}
	
	public function ImprimeMatricula2()
	{
		$this->load->library('session');
		$this->load->helper('url');
		$data["css"]='
		<link rel="stylesheet" href="'.base_url().'js/jqueryUI/css/south-street/jquery-ui-1.8.16.custom.css" type="text/css" />
		<link rel="stylesheet" href="'.base_url().'css/style_print.css" type="text/css" />';
		$data["javascript"]='<script type="text/javascript" src="'.base_url().'js/jquery-1.7.min.js"></script>
		<script type="text/javascript" src="'.base_url().'js/jqueryUI/js/jquery-ui-1.8.16.custom.min.js"></script>';

		$arrayVars=array('{Apellidos y Nombres}','{Carnet}','{Reg. univ.}','{Carrera}','{Domicilio}','{Fecha}','{Categoria}','{Numero}');
		$arrayDatos=array('Huanca Vila Ausberto','1234567 LP','12387-UIOPO','Ingenieria de sistemas','Villa Victoria Calle Pacajes #10','20 de octubre','Mi categoria','12313478979');
		$data["anverso"]=str_replace($arrayVars,$arrayDatos,$this->session->userdata('anverso'));
		$data["reverso"]=str_replace($arrayVars,$arrayDatos,$this->session->userdata('reverso'));
		$data["espacios"]=$this->session->userdata('espacios');
		//$data['VistaPrincipal'] = 'impresion/vista_imprime_matricula';
		//$this->load->view('vista_maestra',$data);
		$this->load->view('impresion/vista_imprime_matricula',$data);
	}
	
	public function ajax($opcion='')
	{
		$this->load->library('session');
		if ($opcion=="exportar"){
			header("Content-Type: application/force-download"); 
			header('Content-Description: File Transfer');
			header('Content-Disposition: attachment; filename="pagina.def"');
			print serialize(array('anverso'=>base64_encode($this->session->userdata('anverso')),'reverso'=>base64_encode($this->session->userdata('reverso')),'espacios'=>$this->session->userdata('espacios')));
		} elseif ($this->input->post('anverso') && $this->input->post('reverso')){
			$this->session->set_userdata('anverso', $this->input->post('anverso'));
			$this->session->set_userdata('reverso', $this->input->post('reverso'));
			$this->session->set_userdata('espacios', array('hs'=>$this->input->post("hs"),'vs'=>$this->input->post("vs"),'ms'=>$this->input->post("ms")));
		} elseif ($this->input->post('reset')){
			$this->session->unset_userdata('anverso');
			$this->session->unset_userdata('reverso');
			$this->session->unset_userdata('espacios');
		}
		exit;
	}
}
?>