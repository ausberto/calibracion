<?php

class Perfil extends CI_Controller {

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
       
        $this->load->model('Modelo_perfil');
        $data['VistaMenu'] = 'vista_menu';
        $data['Tipo'] = 'nuevo';
        $data['VistaPrincipal'] = 'vista_nuevo_perfil';
        $this->load->view('vista_maestra', $data);
        
    }
    function Editar($CodPerfil){
       
        $this->load->model('Modelo_perfil');
        
        $data['Fila'] = $this->Modelo_perfil->GetXId($CodPerfil);
        //print_r($data['Fila']);
        $data['VistaMenu'] = 'vista_menu';
        $data['Tipo'] = 'editar';
        $data['VistaPrincipal'] = 'vista_editar_perfil';
        $this->load->view('vista_maestra', $data);
        
    }
    function Guardar() {
        $this->load->model('Modelo_perfil');
            if($this->input->post('Tipo')=="nuevo"){
            $llave="";
                
	if(!isset($_POST["menu1"]))$_POST["menu1"]=0;
        if(!isset($_POST["menu2"]))$_POST["menu2"]=0;
        if(!isset($_POST["menu3"]))$_POST["menu3"]=0;
        if(!isset($_POST["menu4"]))$_POST["menu4"]=0;
        if(!isset($_POST["menu5"]))$_POST["menu5"]=0;
        if(!isset($_POST["menu6"]))$_POST["menu6"]=0;
        if(!isset($_POST["menu7"]))$_POST["menu7"]=0;
        if(!isset($_POST["menu8"]))$_POST["menu8"]=0;
        if(!isset($_POST["menu9"]))$_POST["menu9"]=0;
        if(!isset($_POST["menu10"]))$_POST["menu10"]=0;
        if(!isset($_POST["menu11"]))$_POST["menu11"]=0;
        if(!isset($_POST["menu12"]))$_POST["menu12"]=0;
        if(!isset($_POST["menu13"]))$_POST["menu13"]=0;
        if(!isset($_POST["menu14"]))$_POST["menu14"]=0;
        if(!isset($_POST["menu15"]))$_POST["menu15"]=0;
        if(!isset($_POST["menu16"]))$_POST["menu16"]=0;
        if(!isset($_POST["menu17"]))$_POST["menu17"]=0;
        if(!isset($_POST["menu18"]))$_POST["menu18"]=0;
        if(!isset($_POST["menu19"]))$_POST["menu19"]=0;
        if(!isset($_POST["menu20"]))$_POST["menu20"]=0;
        if(!isset($_POST["menu21"]))$_POST["menu21"]=0;
        if(!isset($_POST["menu22"]))$_POST["menu22"]=0;
        if(!isset($_POST["menu23"]))$_POST["menu23"]=0;
        if(!isset($_POST["menu24"]))$_POST["menu24"]=0;
        if(!isset($_POST["menu25"]))$_POST["menu25"]=0;
        if(!isset($_POST["menu26"]))$_POST["menu26"]=0;
        if(!isset($_POST["menu27"]))$_POST["menu27"]=0;
        if(!isset($_POST["menu28"]))$_POST["menu28"]=0;
        if(!isset($_POST["menu29"]))$_POST["menu29"]=0;
        if(!isset($_POST["menu30"]))$_POST["menu30"]=0;
        if(!isset($_POST["menu31"]))$_POST["menu31"]=0;
        if(!isset($_POST["menu32"]))$_POST["menu32"]=0;
        if(!isset($_POST["menu33"]))$_POST["menu33"]=0;
        if(!isset($_POST["menu34"]))$_POST["menu34"]=0;
        if(!isset($_POST["menu35"]))$_POST["menu35"]=0;
        if(!isset($_POST["menu36"]))$_POST["menu36"]=0;
        if(!isset($_POST["menu37"]))$_POST["menu37"]=0;
        if(!isset($_POST["menu38"]))$_POST["menu38"]=0;
        if(!isset($_POST["menu39"]))$_POST["menu39"]=0;
        
        
        $llave=$_POST["menu1"].$_POST["menu2"].$_POST["menu3"].$_POST["menu4"].$_POST["menu5"].$_POST["menu6"].$_POST["menu7"].$_POST["menu8"].$_POST["menu9"].$_POST["menu10"].$_POST["menu11"].$_POST["menu12"].$_POST["menu13"];
        $llave.=$_POST["menu14"].$_POST["menu15"].$_POST["menu16"].$_POST["menu17"].$_POST["menu18"].$_POST["menu19"].$_POST["menu20"].$_POST["menu21"].$_POST["menu22"].$_POST["menu23"].$_POST["menu24"].$_POST["menu25"].$_POST["menu26"];
        $llave.=$_POST["menu27"].$_POST["menu28"].$_POST["menu29"].$_POST["menu30"].$_POST["menu31"].$_POST["menu32"].$_POST["menu33"].$_POST["menu34"].$_POST["menu35"].$_POST["menu36"].$_POST["menu37"].$_POST["menu38"].$_POST["menu39"];
        //echo $llave;
	
            $this->Modelo_perfil->Insert($this->input->post('Perfil'), $llave);
            
            $this->Listado();
            }
            
            if($this->input->post('Tipo')=="editar"){
                
                $llave="";
                
	if(!isset($_POST["menu1"]))$_POST["menu1"]=0;
        if(!isset($_POST["menu2"]))$_POST["menu2"]=0;
        if(!isset($_POST["menu3"]))$_POST["menu3"]=0;
        if(!isset($_POST["menu4"]))$_POST["menu4"]=0;
        if(!isset($_POST["menu5"]))$_POST["menu5"]=0;
        if(!isset($_POST["menu6"]))$_POST["menu6"]=0;
        if(!isset($_POST["menu7"]))$_POST["menu7"]=0;
        if(!isset($_POST["menu8"]))$_POST["menu8"]=0;
        if(!isset($_POST["menu9"]))$_POST["menu9"]=0;
        if(!isset($_POST["menu10"]))$_POST["menu10"]=0;
        if(!isset($_POST["menu11"]))$_POST["menu11"]=0;
        if(!isset($_POST["menu12"]))$_POST["menu12"]=0;
        if(!isset($_POST["menu13"]))$_POST["menu13"]=0;
        if(!isset($_POST["menu14"]))$_POST["menu14"]=0;
        if(!isset($_POST["menu15"]))$_POST["menu15"]=0;
        if(!isset($_POST["menu16"]))$_POST["menu16"]=0;
        if(!isset($_POST["menu17"]))$_POST["menu17"]=0;
        if(!isset($_POST["menu18"]))$_POST["menu18"]=0;
        if(!isset($_POST["menu19"]))$_POST["menu19"]=0;
        if(!isset($_POST["menu20"]))$_POST["menu20"]=0;
        if(!isset($_POST["menu21"]))$_POST["menu21"]=0;
        if(!isset($_POST["menu22"]))$_POST["menu22"]=0;
        if(!isset($_POST["menu23"]))$_POST["menu23"]=0;
        if(!isset($_POST["menu24"]))$_POST["menu24"]=0;
        if(!isset($_POST["menu25"]))$_POST["menu25"]=0;
        if(!isset($_POST["menu26"]))$_POST["menu26"]=0;
        if(!isset($_POST["menu27"]))$_POST["menu27"]=0;
        if(!isset($_POST["menu28"]))$_POST["menu28"]=0;
        if(!isset($_POST["menu29"]))$_POST["menu29"]=0;
        if(!isset($_POST["menu30"]))$_POST["menu30"]=0;
        if(!isset($_POST["menu31"]))$_POST["menu31"]=0;
        if(!isset($_POST["menu32"]))$_POST["menu32"]=0;
        if(!isset($_POST["menu33"]))$_POST["menu33"]=0;
        if(!isset($_POST["menu34"]))$_POST["menu34"]=0;
        if(!isset($_POST["menu35"]))$_POST["menu35"]=0;
        if(!isset($_POST["menu36"]))$_POST["menu36"]=0;
        if(!isset($_POST["menu37"]))$_POST["menu37"]=0;
        if(!isset($_POST["menu38"]))$_POST["menu38"]=0;
        if(!isset($_POST["menu39"]))$_POST["menu39"]=0;
        
        
        
        $llave=$_POST["menu1"].$_POST["menu2"].$_POST["menu3"].$_POST["menu4"].$_POST["menu5"].$_POST["menu6"].$_POST["menu7"].$_POST["menu8"].$_POST["menu9"].$_POST["menu10"].$_POST["menu11"].$_POST["menu12"].$_POST["menu13"];
        $llave.=$_POST["menu14"].$_POST["menu15"].$_POST["menu16"].$_POST["menu17"].$_POST["menu18"].$_POST["menu19"].$_POST["menu20"].$_POST["menu21"].$_POST["menu22"].$_POST["menu23"].$_POST["menu24"].$_POST["menu25"].$_POST["menu26"];
        $llave.=$_POST["menu27"].$_POST["menu28"].$_POST["menu29"].$_POST["menu30"].$_POST["menu31"].$_POST["menu32"].$_POST["menu33"].$_POST["menu34"].$_POST["menu35"].$_POST["menu36"].$_POST["menu37"].$_POST["menu38"].$_POST["menu39"];
        
            $this->Modelo_perfil->Update($this->input->post('CodPerfil'),$this->input->post('Perfil'), $llave);
            $this->Listado();
            
            }
            
    }
    
    function Listado(){
        $this->load->model('Modelo_perfil');
        $registros = $this->Modelo_perfil->GetAll();
        $this->load->library('table');
                $this->table->set_empty("&nbsp;");
                $this->table->set_heading('No.', 'Perfil','Editar','Eliminar');
                $aux = array('table_open' => '<table class="tablaseleccion">');
                $this->table->set_template($aux);
                $i = 0;
                
        foreach ($registros->result() as $registro)
        $this->table->add_row(++$i, $registro->Perfil, anchor("index.php/Perfil/Editar/" . $registro->CodPerfil, 'Modificar '),anchor("index.php/Perfil/Eliminar/" . $registro->CodPerfil, 'Eliminar',array('class'=>'elimina','onclick'=>"return confirm('Realmente desea borrar este registro?')")));
        $data['Tabla'] = $this->table->generate();
        $data['VistaMenu'] = 'vista_menu';
        $data['VistaPrincipal'] = 'vista_listado_perfiles';
        $this->load->view('vista_maestra', $data);
                
        
    }
    function Eliminar($CodPerfil) {
        $this->load->model('Modelo_perfil');
        $this->Modelo_perfil->Disable($CodPerfil);
            $this->Listado();
        
    }
}
?>
