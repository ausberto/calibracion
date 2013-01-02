<?php

class Formulario extends CI_Controller {

    private $Menu;
	
	function __construct() {
        parent::__construct();
		$this->Menu = ObtieneVista($this->session->userdata('TipoUsuario'));
    }

    function Index() {
        $this->load->model('Modelo_formulario');
        $this->load->view('vista_busca_formulario');
		//$data['VistaPrincipal'] = 'vista_busca_formulario';
		//$this->load->view('vista_maestra', $data);
    }

    function Nuevo() {
        $this->load->model('Modelo_formulario');
        $this->load->helper('utiles');

        $data['ComboZona'] = $this->Modelo_formulario->ComboZona("CodZona", "");
        $data['ComboUniversidades'] = $this->Modelo_formulario->ComboUniversidades("CodUniversidad", "");
        $data['ComboDepartamentos'] = ComboDepartamentos("Expedido", "");
        $data['ComboVivienda'] = ComboTipoVivienda("Vivienda", "");
        $data['ComboCaracteristicasVivienda'] = ComboCaracteristicasVivienda("Caracteristicas", "");
        $data['ComboComoTrabaja'] = ComboComoTrabaja("Trabajo", "");
        $data['ComboJornada'] = ComboJornada("Jornada", "");
        $data['ComboTipoColegio'] = ComboTipoColegio("TipoColegio", "");
        $data['ComboPaisesNacimiento'] = $this->Modelo_formulario->ComboPais("PaisNacimiento", "11");
        $data['ComboPaisesColegio'] = $this->Modelo_formulario->ComboPais("PaisColegio", "11");
        $data['EstadoCivil'] = ComboEstadoCivil("EstadoCivil", "0");
        $data['Modo'] = "Nuevo";
		$data['VistaMenu'] = $this->Menu;
		$data['VistaPrincipal'] = 'vista_formulario01';
		$this->load->view('vista_maestra', $data);
        //$this->load->view('vista_formulario01', $data);
    }

    function Lectura() {
        $this->load->model('Modelo_formulario');
        $this->load->helper('utiles');
        $Fila = $this->Modelo_formulario->GetXId($this->session->userdata('CodPersona'));
        $data['Fila'] = $Fila;
        $data['ComboZona'] = $this->Modelo_formulario->ComboZona("CodZona", $Fila->CodZona);
        $data['ComboUniversidades'] = $this->Modelo_formulario->ComboUniversidades("CodUniversidad", $Fila->CodUniversidad);
        $data['ComboDepartamentos'] = ComboDepartamentos("Expedido", $Fila->Expedido);
        $data['ComboVivienda'] = ComboTipoVivienda("Vivienda", $Fila->Vivienda);
        $data['ComboCaracteristicasVivienda'] = ComboCaracteristicasVivienda("Caracteristicas", $Fila->Caracteristicas);
        $data['ComboComoTrabaja'] = ComboComoTrabaja("Trabajo", $Fila->Trabajo);
        $data['ComboJornada'] = ComboJornada("Jornada", $Fila->Jornada);
        $data['ComboTipoColegio'] = ComboTipoColegio("TipoColegio", $Fila->TipoColegio);
        $data['ComboPaisesNacimiento'] = $this->Modelo_formulario->ComboPais("PaisNacimiento", $Fila->PaisNacimiento);
        $data['ComboPaisesColegio'] = $this->Modelo_formulario->ComboPais("PaisColegio", $Fila->PaisTitulo);
        $data['EstadoCivil'] = ComboEstadoCivil("EstadoCivil", $Fila->EstadoCivil);
        //$this->load->view('vista_formulario01_lectura', $data);
		$data['VistaMenu'] = $this->Menu;
		$data['VistaPrincipal'] = 'vista_formulario01_lectura';
		$this->load->view('vista_maestra', $data);
    }

    function Editar($CodPersona) {
        $this->load->model('Modelo_formulario');
        $this->load->helper('utiles');
        $Fila = $this->Modelo_formulario->GetXId($CodPersona);
        $data['Fila'] = $Fila;
        $data['ComboZona'] = $this->Modelo_formulario->ComboZona("CodZona", $Fila->CodZona);
        $data['ComboUniversidades'] = $this->Modelo_formulario->ComboUniversidades("CodUniversidad", $Fila->CodUniversidad);
        $data['ComboDepartamentos'] = ComboDepartamentos("Expedido", $Fila->Expedido);
        $data['ComboVivienda'] = ComboTipoVivienda("Vivienda", $Fila->Vivienda);
        $data['ComboCaracteristicasVivienda'] = ComboCaracteristicasVivienda("Caracteristicas", $Fila->Caracteristicas);
        $data['ComboComoTrabaja'] = ComboComoTrabaja("Trabajo", $Fila->Trabajo);
        $data['ComboJornada'] = ComboJornada("Jornada", $Fila->Jornada);
        $data['ComboTipoColegio'] = ComboTipoColegio("TipoColegio", $Fila->TipoColegio);
        $data['ComboPaisesNacimiento'] = $this->Modelo_formulario->ComboPais("PaisNacimiento", $Fila->PaisNacimiento);
        $data['ComboPaisesColegio'] = $this->Modelo_formulario->ComboPais("PaisColegio", $Fila->PaisTitulo);
        $data['EstadoCivil'] = ComboEstadoCivil("EstadoCivil", $Fila->EstadoCivil);
        $data['Modo'] = "Editar";
        //$this->load->view('vista_editar_formulario01', $data);
		$data['VistaMenu'] = $this->Menu;
		$data['VistaPrincipal'] = 'vista_editar_formulario01';
		$this->load->view('vista_maestra', $data);
    }

    function Busqueda() {
        $this->load->model('Modelo_formulario');
        $this->load->helper('utiles');
        $datasession = array(
            'Carnet' => "",
            'Modo' => "",
            'Nombres' => "",
            'Paterno' => "",
            'Materno' => "",
            'CodPersona' => "",
        );

        $this->session->set_userdata($datasession);
        if ($this->input->post('Nombres') && $this->input->post('Carnet')) {
            if ($this->Modelo_formulario->VerificaEstudiante($this->input->post('Nombres'), $this->input->post('Paterno'), $this->input->post('Materno'), $this->input->post('Carnet'))) {
                $Fila = $this->Modelo_formulario->VerificaEstudiante($this->input->post('Nombres'), $this->input->post('Paterno'), $this->input->post('Materno'), $this->input->post('Carnet'));
                $datasession = array(
                    'Carnet' => $Fila->CI,
                    'Modo' => "Lectura",
                    'Nombres' => $Fila->Nombres,
                    'Paterno' => $Fila->Paterno,
                    'Materno' => $Fila->Materno,
                    'CodPersona' => $Fila->CodPersona
                );

                $this->session->set_userdata($datasession);
                //modo lectura
                $this->Lectura();
                //redirect('index.php/Matriculacion', 'refresh');
            } else {

                $datasession = array(
                    'Carnet' => $this->input->post('Carnet'),
                    'Nombres' => $this->input->post('Nombres'),
                    'Paterno' => $this->input->post('Paterno'),
                    'Materno' => $this->input->post('Materno'),
                    'Modo' => "Nuevo"
                );

                $this->session->set_userdata($datasession);
                $this->Nuevo();
            }
        } else {
            //$this->load->view('vista_busca_formulario');
			$data['VistaMenu'] = $this->Menu;
			$data['VistaPrincipal'] = 'vista_busca_formulario';
			$this->load->view('vista_maestra', $data);
        }
    }

    function Guardar() {
        if ($this->input->post('Modo') == "Nuevo") {
            $this->load->model('Modelo_formulario');
            if ($this->input->post('Expedido') != "") {
                $TipoId = "C";
            } else {
                $TipoId = "P";
            }
            $CodPersona = $this->Modelo_formulario->InsertPersona($this->input->post('Paterno'), $this->input->post('Materno'), $this->input->post('Nombres'), $this->input->post('Genero'),FechaParaMySQL($this->input->post('FechaNac')) , $this->input->post('LugarNac'), $TipoId, $this->input->post('CI'), $this->input->post('Expedido'), $this->input->post('PaisNacimiento'), $this->input->post('EstadoCivil'), $this->input->post('Domicilio'), $this->input->post('Telefono'), $this->input->post('Celular'), $this->input->post('Correo'), $this->input->post('TelUrgencia'), $this->input->post('Obs'));
            $this->Modelo_formulario->InsertPreuniversitario($CodPersona, $this->input->post('CodUniversidad'), $this->input->post('Colegio'), $this->input->post('AnioEgreso'), $this->input->post('TipoColegio'), $this->input->post('NumTitulo'), $this->input->post('AnioTitulo'), $this->input->post('Localidad'), $this->input->post('PaisColegio'));
            $this->Modelo_formulario->InsertSocioeconomico($CodPersona, $this->input->post('CodZona'), $this->session->userdata('gestion'), $this->input->post('Vivienda'), $this->input->post('Caracteristicas'), $this->input->post('Trabaja'), $this->input->post('Trabajo'), $this->input->post('Jornada'));
            $data['CodPersona'] = $CodPersona;
            $datasession = array(
                'CodPersona' => $CodPersona
            );

            $this->session->set_userdata($datasession);
            //header("locattion:/".base_url()."index.php/Formulario_pdf/Pdf");
			$data['VistaMenu'] = $this->Menu;
            //$this->load->view('vista_formulario01_pdf', $data);
			$data['VistaPrincipal'] = 'vista_formulario01_pdf';
			$this->load->view('vista_maestra', $data);
        }
        if ($this->input->post('Modo') == "Editar") {
                        $this->load->model('Modelo_formulario');
            if ($this->input->post('Expedido') != "") {
                $TipoId = "C";
            } else {
                $TipoId = "P";
            }
            
            $this->Modelo_formulario->UpdatePersona($this->input->post('CodPersona'), $this->input->post('Paterno'), $this->input->post('Materno'), $this->input->post('Nombres'), $this->input->post('Genero'), FechaParaMySQL($this->input->post('FechaNac')), $this->input->post('LugarNac'), $TipoId, $this->input->post('CI'), $this->input->post('Expedido'), $this->input->post('PaisNacimiento'), $this->input->post('EstadoCivil'), $this->input->post('Domicilio'), $this->input->post('Telefono'), $this->input->post('Celular'), $this->input->post('Correo'), $this->input->post('TelUrgencia'), $this->input->post('Obs'));
            $this->Modelo_formulario->UpdatePreuniversitario($this->input->post('CodPersona'), $this->input->post('CodUniversidad'), $this->input->post('Colegio'), $this->input->post('AnioEgreso'), $this->input->post('TipoColegio'), $this->input->post('NumTitulo'), $this->input->post('AnioTitulo'), $this->input->post('Localidad'), $this->input->post('PaisColegio'));
            $this->Modelo_formulario->UpdateSocioeconomico($this->input->post('CodPersona'), $this->input->post('CodZona'), $this->session->userdata('gestion'), $this->input->post('Vivienda'), $this->input->post('Caracteristicas'), $this->input->post('Trabaja'), $this->input->post('Trabajo'), $this->input->post('Jornada'));
            $data['CodPersona'] = $this->input->post('CodPersona');
            $datasession = array(
                'CodPersona' => $this->input->post('CodPersona')
            );

            $this->session->set_userdata($datasession);
			$data['VistaMenu'] = $this->Menu;
            //$this->load->view('vista_formulario01_pdf', $data);
			$data['VistaPrincipal'] = 'vista_formulario01_pdf';
			$this->load->view('vista_maestra', $data);
        }
    }

    function ValorPais() {
        $this->load->model('Modelo_formulario');
        $Fila = $this->Modelo_formulario->VerificaPais();
        if ($Fila == $_POST['Pais']) {
            echo "1";
        } else {
            echo "0";
        }
    }

}

?>