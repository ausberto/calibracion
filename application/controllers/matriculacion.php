<?php

class Matriculacion extends CI_Controller {

    function __construct() {
        parent::__construct();
		
		//datos de ejemplo
		$this->session->set_userdata('NombreUsuario', 'Carlos Torrez Suarez');
		$this->session->set_userdata('CodUsuario', 1);
		$this->session->set_userdata('Gestion', 2012);
    }

    function Index() {
	    $data['VistaMenu'] = 'vista_menu';
		$data['VistaPrincipal'] = 'vista_nula';
        $this->load->view('vista_maestra', $data);
    }
	
	function Login() {
		$data['VistaPrincipal'] = 'vista_login';
        $this->load->view('vista_maestra', $data);
    }
	
	function InicializaVariables($CodPersona) {
		$data['VistaMenu'] = 'vista_menu_operador';

		if( $this->modelo_matricula->EsEstudianteNuevo($CodPersona) )
			$this->modelo_estudiante->DatosNuevaMatriculacion($CodPersona, $AnioIngreso, $Matricula, $RegUniversitario, $Anexo,
															  $NumArchivo, $AnioEgreso, $CodCarrera, $CodCarreraOrigen, 
															  $CodCambio1, $CodCambio2, $Deposito);
		else
			$this->modelo_estudiante->DatosMatriculacion($CodPersona, $AnioIngreso, $Matricula, $RegUniversitario, $Anexo,
														 $NumArchivo, $AnioEgreso, $CodCarrera, $CodCarreraOrigen, 
														 $CodCambio1, $CodCambio2, $Deposito);
		$data['AnioIngreso'] = $AnioIngreso;
		$data['Matricula'] = $Matricula;
		$data['RegUniversitario'] = $RegUniversitario;
		$data['Anexo'] = $Anexo==0? '': $Anexo;
		$data['NumArchivo'] = $NumArchivo;
		$data['AnioEgreso'] = $AnioEgreso;
		$data['CodCarrera'] = $CodCarrera;
		$data['CodCarreraOrigen'] = $CodCarreraOrigen;
		$data['CodCambio1'] = $CodCambio1;
		$data['CodCambio2'] = $CodCambio2;
		$data['Deposito'] = number_format($Deposito, 2);
		$data['Fecha'] = date('d/m/Y');
		$data['NumDeposito'] = '';
		
		$this->modelo_estudiante->DatosEstudiante($CodPersona, $Notas, $Egresado, $Profesional, $Traspaso, $Magisterio, $DocIngreso);
		$data['Notas'] = $Notas;
		$data['Egresado'] = $Egresado;
		$data['Profesional'] = $Profesional;
		$data['Traspaso'] = $Traspaso;
		$data['Magisterio'] = $Magisterio;
		$data['ComboDocIngreso'] = $this->funciones->ComboDocIngreso($DocIngreso);
		
		$this->modelo_estudiante->RequisitosEstudiante($CodPersona, $Titulo, $FotocopiaCI, $Certificado, $Fotografia);
		$data['Titulo'] = $Titulo;
		$data['FotocopiaCI'] = $FotocopiaCI;
		$data['Certificado'] = $Certificado;
		$data['Fotografia'] = $Fotografia;

		return $data;
	}
	
	function ArregloRequisitos($Titulo, $FotocopiaCI, $Certificado, $Fotografia) {
		$a = array();
		if($Titulo)	$a[] = 1;
		if($FotocopiaCI) $a[] = 2;
		if($Certificado) $a[] = 3;
		if($Fotografia)	$a[] = 4;
		return $a;
	}
	
	//
	//Funcion que se usa cuando el estudiante no esta matriculado en _esta_ gestion
	//
	function NuevaMatricula($CodPersona) {
		//$this->funciones->VerificaSesion();
		
		$this->form_validation->set_rules('Fecha', '"Fecha"', 'trim|valid_date');
		$this->form_validation->set_rules('Matricula', '"matr&iacute;cula"', 'trim|callback_MatriculaValida');
		$this->form_validation->set_rules('RegUniversitario', '"registro universitario"', 'trim|callback_RegUniversitarioValido['.$this->input->post('Anexo').']');
		$data = $this->InicializaVariables($CodPersona);
		$data['CodPersona'] = $CodPersona;
        if ($this->form_validation->run()) {
			$Anexo = $this->input->post('Anexo')==''? 0 : $this->input->post('Anexo');
			
			$Categoria = $this->input->post('Egresado')? 'E':''; $Categoria .= $this->input->post('Profesional')? 'P':'';
			$Categoria .= $this->input->post('Traspaso')? 'T':''; $Categoria .= $this->input->post('Magisterio')? 'M':'';
			
			$Requisito = $this->ArregloRequisitos($this->input->post('Titulo'), $this->input->post('FotocopiaCI'),
			                                        $this->input->post('Certificado'), $this->input->post('Fotografia'));
			$Fecha = FechaParaMySQL($this->input->post('Fecha'));										
			$this->modelo_matricula->Insert($CodPersona, $this->input->post('AnioIngreso'), 
											$this->input->post('Matricula'), $this->input->post('RegUniversitario'), 
											$Anexo, $this->input->post('AnioEgreso'), 
											$this->input->post('Egresado'), $this->input->post('Profesional'), 
											$this->input->post('Traspaso'), $this->input->post('Magisterio'), 
											$this->input->post('Titulo'), $this->input->post('FotocopiaCI'), 
											$this->input->post('Certificado'), $this->input->post('Fotografia'), 
											$this->input->post('DocIngreso'), $this->input->post('NumArchivo'), 
											$this->input->post('CodCarrera'), 
											$Fecha, $this->input->post('NumDeposito'), 
											$this->input->post('Deposito'), $Categoria, $Requisito,
											$this->input->post('Notas')); 
			
			$data['Mensaje'] = "Se ha registrado una nueva matr&iacute;cula.";                        
            $data['VistaPrincipal'] = 'vista_mensaje';            
        } else
            $data['VistaPrincipal'] = 'vista_nueva_matricula';                                                
        $this->load->view('vista_maestra', $data);
    }
	
	function MatriculaValida($mat) {
		//verificacion de cupo del usuario y en la gestion
		$r = False;
		if( ! $this->modelo_matricula->DentroDelCupo($mat) ) 
			$this->form_validation->set_message('MatriculaValida', 'Fuera de cupo asignado.');
		else if( $this->modelo_matricula->MatriculaExistente($mat) ) 
			$this->form_validation->set_message('MatriculaValida', 'Matr&iacute;cula ya registrada.');
		else
			$r = True;
			
		return $r;
	}
	
	function RegUniversitarioValido($RegU, $Anexo) {
		$CodPersona = $this->input->post("CodPersona");
		
		//si es primera matriculacion simplemente no debe repetirse
		$Nuevo = $this->modelo_matricula->EsEstudianteNuevo($CodPersona);
		
		if( $Nuevo && $this->modelo_estudiante->RegUniversitarioExistente($RegU, $Anexo) ) {
			$this->form_validation->set_message('RegUniversitarioValido', "Reg. universitario ya existe.");
			return false;
		} //si es antiguo reg.univ. no debe repetirse para otra persona
		else if( ! $Nuevo && $this->modelo_estudiante->RegUniversitarioUnico($RegU, $Anexo, $CodPersona) ) {
			$this->form_validation->set_message('RegUniversitarioValido', "Reg. universitario ya existe.");
			return false;
		}
			return true;
	}
}

?>