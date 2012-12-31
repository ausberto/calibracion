<?php
class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function Index() {
        $data['VistaPrincipal'] = 'vista_login';
		$this->load->view('vista_maestra', $data);
    }

    function Verifica() {
        if ($this->input->post('NombreUsuario')) {
            $usuario = $this->input->post('NombreUsuario');
            $contrasena = $this->input->post('Clave');

            $this->load->model('Modelo_login');
            if ($this->Modelo_login->Login($usuario, $contrasena)) {
                $Fila=$this->Modelo_login->LoginDatos($usuario, $contrasena);
                $datasession = array(
                    'Usuario' => $usuario,
                    'Autenticado' => TRUE,
                    'Llave'=>$Fila->Llave,
					'CodUsuario'=>$Fila->CodUsuario,
					'TipoUsuario'=>$Fila->TipoUsuario
                );
                $this->session->set_userdata($datasession);
				$this->session->set_userdata('NombreUsuario', $this->modelo_persona->GetNombre($Fila->CodPersona));
				$data['VistaMenu'] = 'vista_menu';
				$data['VistaPrincipal'] = 'vista_nula';
				$this->load->view('vista_maestra', $data);
            } else {
                $this->session->set_flashdata('error', 'El usuario o contraseña son incorrectos.');				
                $this->load->view('vista_login');
            }
        } else {
            $this->load->view('vista_login');
        }
    }

    function Logout() {
        $this->session->unset_userdata('Autenticado');
        $this->session->unset_userdata('Usuario');
        $this->session->unset_userdata('Llave');
        $this->session->unset_userdata('Nombre');
        //session_destroy();
        $this->load->view('vista_login');
    }
    
    

}

?>
