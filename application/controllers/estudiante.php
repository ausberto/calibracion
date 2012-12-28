<?php

class Estudiante extends CI_Controller {

	private $Menu;
	
    function __construct() {
        parent::__construct();
		$this->Menu = 'vista_menu';  //depende del tipo de usuario
    }

    function Index() {
		//$data['VistaMenu'] = $this->Menu;
		//$data['VistaPrincipal'] = 'vista_nula';
		$data['VistaPrincipal'] = 'xx';
        $this->load->view('vista_maestra', $data);
    }
	
	function BuscaParaModificar($Modificacion) {
        $this->funciones->VerificaSesion();
        
        $this->form_validation->set_rules('Apellido', '"apellido"', 'trim|min_length[3]');
        if ($this->form_validation->run()) {
            $registros = $this->modelo_estudiante->Busqueda($this->input->post('Apellido'), $this->input->post('CI'), $this->input->post('RegUniversitario'));

            if( $Modificacion==1 )
                $Vista = 'vista_modifica_estudiante';
            else
                $Vista = 'vista_consulta_estudiante';
                
            $data['VistaMenu'] = $this->Menu;
            if ($registros->num_rows() == 0) {
                $data['Mensaje'] = 'No se encontraron registros que cumplan el criterio de b&uacute;squeda';
                $data['VistaPrincipal'] = 'vista_mensaje';            
                $this->load->view('vista_maestra', $data);
            } else if ($registros->num_rows() == 1) {            //solo un registro encontrado                
				redirect("/formulario/Editar/".$registros->row()->CodPersona, 'refresh');
            } else {                                             // varios registros encontrados: muestra lista
                //genera tabla
                $this->load->library('table');
                $this->table->set_empty("&nbsp;");
                $this->table->set_heading('No.', 'Nombre del estudiante', 'Carrera', 'Acci&oacute;n');
                $aux = array('table_open' => '<table class="tablaseleccion">');
                $this->table->set_template($aux);
                $i = 0;
                foreach ($registros->result() as $registro)
                    $this->table->add_row(++$i, $registro->NombreCompleto, $registro->NombreCarrera,
                            anchor("estudiante/CargaVista/$Vista/" . $registro->CodPersona, 
                                  ($Modificacion==1? ' Modificar ':' Ver '), 
                                  array('class'=>($Modificacion==1? ' actualiza':'vista'))));
					/*$this->table->add_row(++$i, $registro->NombreCompleto, $registro->NombreCarrera,
                            anchor("estudiante/CargaVista/$Vista/" . $registro->CodPersona, 
                                  ($Modificacion==1? ' Modificar ':' Ver '), 
                                  array('class'=>($Modificacion==1? ' actualiza':'vista'))). '  '.
                            anchor("estudiante/CargaVista/vista_borrado/" . $registro->CodPersona, 'Eliminar', array('class'=>'elimina',
									'onclick'=>"return confirm('¿Realmente desea borrar este registro?')")));*/
                $data['Tabla'] = $this->table->generate();
                $data['VistaPrincipal'] = 'vista_lista_estudiantes';
                $this->load->view('vista_maestra', $data);
            }
        } else {
            $data['VistaMenu'] = $this->Menu;
            $data['VistaPrincipal'] = 'vista_busca_estudiante';
            $data['Modificacion'] = $Modificacion;
            $this->load->view('vista_maestra', $data);
        }
    }
	
	function BuscaParaEliminar() {
        $this->funciones->VerificaSesion();
        
        $this->form_validation->set_rules('Apellido', '"apellido"', 'trim|min_length[3]');
        if ($this->form_validation->run()) {
            $registros = $this->modelo_estudiante->Busqueda($this->input->post('Apellido'), $this->input->post('CI'), $this->input->post('RegUniversitario'));

            $Vista = 'vista_elimina_estudiante';
            $data['VistaMenu'] = $this->Menu;
            if ($registros->num_rows() == 0) {
                $data['Mensaje'] = 'No se encontraron registros que cumplan el criterio de b&uacute;squeda';
                $data['VistaPrincipal'] = 'vista_mensaje';            
                $this->load->view('vista_maestra', $data);
            } else if ($registros->num_rows() == 1) {            //solo un registro encontrado                
				$data['NombreEstudiante'] = $registros->row()->NombreCompleto;
				$data['NombreCarrera'] = $registros->row()->NombreCarrera;
				$data['CodPersona'] = $registros->row()->CodPersona;
				$data['VistaPrincipal'] = 'vista_elimina_estudiante';            
                $this->load->view('vista_maestra', $data);
            } else {                                             // varios registros encontrados: muestra lista
                //genera tabla
                $this->load->library('table');
                $this->table->set_empty("&nbsp;");
                $this->table->set_heading('No.', 'Nombre del estudiante', 'Carrera', 'Acci&oacute;n');
                $aux = array('table_open' => '<table class="tablaseleccion">');
                $this->table->set_template($aux);
                $i = 0;
                foreach ($registros->result() as $registro)
                    $this->table->add_row(++$i, $registro->NombreCompleto, $registro->NombreCarrera,
                            anchor("estudiante/CargaVista/$Vista/" . $registro->CodPersona, 
                                  'Eliminar', array('class'=>'elimina')));
                $data['Tabla'] = $this->table->generate();
                $data['VistaPrincipal'] = 'vista_lista_estudiantes';
                $this->load->view('vista_maestra', $data);
            }
        } else {
            $data['VistaMenu'] = $this->Menu;
            $data['VistaPrincipal'] = 'vista_busca_estudiante';
            $this->load->view('vista_maestra', $data);
        }
    }
	
	function CargaVista($Vista, $CodPersona) {
        redirect("/formulario/Editar/".$CodPersona, 'refresh');
    }

    function EliminarEstudiante() {
		$this->form_validation->set_rules('CodPersona', '"CodPersona"', 'required');
        if ($this->form_validation->run()) {
			$CodPersona = $this->input->post('CodPersona');
			$Accion = $this->input->post("submit");
			if ($Accion == "borrar") {
				$data['Mensaje'] = 'El registro ha sido eliminado de la base de datos.';
				$data['VistaPrincipal'] = 'vista_mensaje';            
				$this->load->view('vista_maestra', $data);		
			}
		}
		else {
            $data['VistaMenu'] = $this->Menu;
            $data['VistaPrincipal'] = 'vista_elimina_estudiante';
            $this->load->view('vista_maestra', $data);
        }
    }

}
?>
