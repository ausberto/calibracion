<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Funciones {           
    
	protected $ci;
   
    function __construct(){
		$this->ci =& get_instance();
    }
	
    function ComboDocIngreso($DocIngreso='0') {
        $s = "<select style='width:15em;' name='DocIngreso' id='DocIngreso' class='required'>";
		$s .= "<option value=''>Seleccione una opcion</option>";
        
        $s .= "<option value='1' ".($DocIngreso==1?' selected ': '').">Certificado de aprobacion de pre-universitario</option>";
		$s .= "<option value='2' ".($DocIngreso==2?' selected ': '').">Certificado de notas</option>";
		$s .= "<option value='3' ".($DocIngreso==3?' selected ': '').">Fotocopia de certificado de egreso</option>";
		$s .= "<option value='4' ".($DocIngreso==4?' selected ': '').">Fotocopia legalizada de titulo</option>";
        return $s."</select>";
    }
	
	function VerificaSesion() {
		$this->ci->load->library('funciones'); 
		//session_start();
		if(! $this->ci->session->userdata('CodUsuario') ) 
			redirect('ingreso/'.$_SESSION['CarpetaUsuario']);
	}
}

?>