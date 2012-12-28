<?php

class Formulario_pdf extends CI_Controller {

    private $Menu;

    function __construct() {
        parent::__construct();
        define('FPDF_FONTPATH', $this->config->item('fonts_path'));
        $this->load->library(array('fpdf'));
    }

    function Index() {
        //$data['Nombre'] = 'juan perez';
        //$this->output->set_header('Content: application/pdf');
        //$this->load->view('vista_reporte_prueba_pdf', $data);
        ;
    }

    function Pdf($CodPersona) {
        $this->load->model('Modelo_formulario');
        $this->load->helper('utiles');
        $Fila = $this->Modelo_formulario->GetXId($CodPersona);
        $data['Fila'] = $Fila;
        $data['Genero']=Genero($Fila->Genero);
        $data['EstadoCivil']=EstadoCivil($Fila->EstadoCivil);
        $data['FechaNac']=FechaDeMySQL($Fila->FechaNac);
        $data['TipoColegio']=TipoColegio($Fila->TipoColegio);
        $data['TipoVivienda']=TipoVivienda($Fila->Vivienda);
        $data['Caracteristicas']=CaracteristicasVivienda($Fila->Caracteristicas);
        $data['Trabaja']=Trabaja($Fila->Trabaja);
        $data['Trabajo']=Trabajo($Fila->Trabajo);
        $data['Jornada']=Jornada($Fila->Jornada);
        $this->output->set_header('Content: application/pdf');
        $this->load->view('vista_formulario_pdf', $data);
    }

}

?>