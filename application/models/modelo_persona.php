<?php

class Modelo_persona extends CI_Model {

    private $Tabla = 'persona';

    function __construct() {
        parent::__construct();
    }

	function EsNacional($CodPersona) {
		$sql = "select CodPais from persona WHERE CodPersona=$CodPersona";
        $query = $this->db->query($sql);	
		return $query->row()->CodPais==$this->modelo_valores->GetNumero('CODIGOPAIS');
	}
	
	function GetNombre($CodPersona) {
		$sql = "select CONCAT_WS(' ', Nombres, Paterno, Materno) AS Nombre from persona WHERE CodPersona=$CodPersona";
        $query = $this->db->query($sql);	
		return $query->row()->Nombre;
	}
}

?>