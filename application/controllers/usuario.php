<?php

class Usuario extends CI_Controller {

    function __construct() {
        parent::__construct();
		//$this->load->model('Modelo_usuario', '', TRUE);
    }

    function Index() {
	$data['VistaMenu'] = 'vista_menu';
	$data['VistaPrincipal'] = 'vista_nula';
        $this->load->view('vista_maestra', $data);
    }
    function Nuevo(){
       
        $this->load->model('Modelo_usuario');
        $data['ComboPerfil'] = $this->Modelo_usuario->ComboPerfil();
        
        $data['VistaMenu'] = 'vista_menu';
        $data['Tipo'] = 'nuevo';
        $data['VistaPrincipal'] = 'vista_nuevo_usuario';
        $this->load->view('vista_maestra', $data);
        
    }
    function Editar($codigo){
       
        $this->load->model('Modelo_usuario');
        
        $data['Fila'] = $this->Modelo_usuario->GetXId($codigo);
        //print_r($data['Fila']);
        $data['VistaMenu'] = 'vista_menu';
        $data['Tipo'] = 'editar';
        $data['ComboPerfil'] = $this->Modelo_usuario->ComboPerfil();
        $data['VistaPrincipal'] = 'vista_editar_usuario';
        $this->load->view('vista_maestra', $data);
        
    }
    function Guardar() {
        $this->load->model('Modelo_usuario');
            if($this->input->post('Tipo')=="nuevo"){
            $this->Modelo_usuario->InsertPersona($this->input->post('Paterno'),$this->input->post('Materno'),$this->input->post('Nombres'),$this->input->post('Telefono'),$this->input->post('Celular'),$this->input->post('Email'));
            $this->Modelo_usuario->Insert($this->input->post('NombreUsuario'), $this->input->post('Clave'), $this->input->post('CodPerfil'));
            //$data['Mensaje'] = 'Se ha registrado un nuevo Usuario.';
            //$data['VistaPrincipal'] = 'vista_listado_usuarios';
            //$this->load->view('vista_maestra', $data);
            $this->Listado();
            }
            
            if($this->input->post('Tipo')=="editar"){
                
            $this->Modelo_usuario->UpdatePersona($this->input->post('CodPersona'),$this->input->post('Paterno'),$this->input->post('Materno'),$this->input->post('Nombres'),$this->input->post('Telefono'),$this->input->post('Celular'),$this->input->post('Correo'));
            $this->Modelo_usuario->Update($this->input->post('CodUsuario'),  $this->input->post('CodPersona'),$this->input->post('NombreUsuario'), $this->input->post('Clave'), $this->input->post('CodPerfil'));
            $this->Listado();
            }
            
            
            
            
    }
    
    function Listado(){
        $this->load->model('Modelo_usuario');
        $registros = $this->Modelo_usuario->GetAll();
        $this->load->library('table');
                $this->table->set_empty("&nbsp;");
                $this->table->set_heading('No.', 'Nombre Completo', 'Nombre Usuario', 'Perfil', 'Editar','Eliminar');
                $aux = array('table_open' => '<table class="tablaseleccion">');
                $this->table->set_template($aux);
                $i = 0;
                
        foreach ($registros->result() as $registro)
         $this->table->add_row(++$i, $registro->Nombres." ".$registro->Paterno." ".$registro->Materno, $registro->NombreUsuario, $registro->Perfil, anchor("index.php/Usuario/Editar/" . $registro->CodUsuario, 'Modificar '),anchor("index.php/Usuario/Eliminar/" . $registro->CodUsuario, 'Eliminar',array('class'=>'elimina','onclick'=>"return confirm('Realmente desea borrar este registro?')")));
         
        $data['Tabla'] = $this->table->generate();
        $data['VistaMenu'] = 'vista_menu';
        $data['VistaPrincipal'] = 'vista_listado_usuarios';
        $this->load->view('vista_maestra', $data);
                
        
    }
    function Eliminar($CodUsuario) {
        $this->load->model('Modelo_usuario');
        $this->Modelo_usuario->Disable($CodUsuario);
            $this->Listado();
        
    }
    function Verificacion() {
        $this->load->model('Modelo_usuario');
        if($this->Modelo_usuario->GetXUsuario($_POST['Usuario']))
        {
            echo "1";
        }
        else {
            //echo $_POST['Pais'];
            echo "0";
        }
        
    }
}
?>
