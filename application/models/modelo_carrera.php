<?php

class Modelo_carrera extends CI_Model {

    private $Tabla = 'carrera';

    function __construct() {
        parent::__construct();
    }

	function ComboCarrera($CodCarrera=0, $Nombre='CodCarrera', $Requerido=False) {
		$sql = "select * from carrera order by Nombre";
        $resultado = $this->db->query($sql);
        $s = "<select name='$Nombre' id='$Nombre'".($Requerido?" class='required'":"").">";
		$s .= "<option value=''>Seleccione una opci&oacute;n</option>";
        foreach($resultado->result() as $row) 
			$s .= "<option value='".$row->CodCarrera."'".($CodCarrera==$row->CodCarrera? ' selected ':'').">".$row->Nombre."</option>";
        return $s."</select>";
	}
}

?>