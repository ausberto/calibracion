<?php

class Modelo_habilitacion extends CI_Model {

    //nombre de la tabla
    private $Tabla = 'habilitacion';

    function __construct() {
        parent::__construct();
    }
	
	function ComboCarrera($CodCarrera=0,$Requerido=False) {
		$sql = "select * from carrera order by Nombre";
        $resultado = $this->db->query($sql);
        $s = "<select name='CodCarrera' id='CodCarrera'".($Requerido?" class='required'":"").">";
		$s .= "<option value=''>Seleccione una opci&oacute;n</option>";
        foreach($resultado->result() as $row){
			$s .= "<option value='".$row->CodCarrera."'".($CodCarrera==$row->CodCarrera? ' selected ':'').">".$row->Nombre."</option>";
		}
        return $s."</select>";
	}
	
    function Insert($FechaInicio,$FechaFin,$CodCarrera,$DesdeNombre,$HastaNombre) {
        $sql = "INSERT INTO habilitacion (FechaInicio,FechaFin,CodCarrera,DesdeNombre,HastaNombre) VALUES 
		        ('$FechaInicio','$FechaFin','$CodCarrera','$DesdeNombre','$HastaNombre')";
        return $this->db->query($sql);
    }

    function Update($CodHabilitacion,$FechaInicio,$FechaFin,$CodCarrera,$DesdeNombre,$HastaNombre) {
        $sql = "UPDATE habilitacion SET FechaInicio='$FechaInicio',FechaFin='$FechaFin',CodCarrera='$CodCarrera',DesdeNombre='$DesdeNombre',HastaNombre='$HastaNombre' WHERE CodHabilitacion='$CodHabilitacion'";
        return $this->db->query($sql);
    }
}
?>