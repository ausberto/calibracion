<?php

class Modelo_formulario extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function InsertPersona($Paterno, $Materno, $Nombres, $Genero, $FechaNac, $LugarNac, $TipoId, $CI, $Expedido, $CodPais, $EstadoCivil, $Domicilio, $Telefono, $Celular, $Correo, $TelUrgencia, $Obs) {

        $consulta = "INSERT INTO persona (Paterno, Materno, Nombres, Genero, FechaNac, LugarNac, TipoId, CI, Expedido, CodPais, EstadoCivil, Domicilio, Telefono, Celular, Correo, TelUrgencia, Obs) ";
        $consulta.= "VALUES ('$Paterno', '$Materno', '$Nombres', '$Genero', '$FechaNac', '$LugarNac', '$TipoId', '$CI', '$Expedido', '$CodPais', '$EstadoCivil', '$Domicilio', '$Telefono', '$Celular', '$Correo', '$TelUrgencia', '$Obs') ";

        $this->db->query($consulta);
        return $this->db->query("select LAST_INSERT_ID() as Codigo;")->row()->Codigo;
    }
    function InsertPreuniversitario($CodPersona, $CodUniversidad, $Colegio, $AnioEgreso, $TipoColegio, $NumTitulo, $AnioTitulo, $Localidad,$CodPais) {
        $consulta = "INSERT INTO preuniversitario (CodPersona, CodUniversidad, Colegio, AnioEgreso, TipoColegio, NumTitulo, AnioTitulo, Localidad,CodPais) ";
        $consulta.= "VALUES ('$CodPersona', '$CodUniversidad', '$Colegio', '$AnioEgreso', '$TipoColegio', '$NumTitulo', '$AnioTitulo', '$Localidad','$CodPais') ";
		return $this->db->query($consulta);        
    }

    function UpdatePersona($CodPersona, $Paterno, $Materno, $Nombres, $Genero, $FechaNac, $LugarNac, $TipoId, $CI, $Expedido, $CodPais, $EstadoCivil, $Domicilio, $Telefono, $Celular, $Correo, $TelUrgencia, $Obs) {
        $consulta = "UPDATE persona SET ";
        $consulta.= " Paterno = '$Paterno', Materno = '$Materno', Nombres = '$Nombres', Genero = '$Genero', FechaNac = '$FechaNac', LugarNac = '$LugarNac', TipoId = '$TipoId', CI = '$CI', Expedido = '$Expedido', CodPais = '$CodPais', EstadoCivil = '$EstadoCivil', Domicilio = '$Domicilio', Telefono = '$Telefono', Celular = '$Celular', Correo = '$Correo', TelUrgencia = '$TelUrgencia', Obs = '$Obs' ";
        $consulta.= " WHERE CodPersona = '$CodPersona'  ";
        return $this->db->query($consulta);
    }

    function UpdatePreuniversitario($CodPersona, $CodUniversidad, $Colegio, $AnioEgreso, $TipoColegio, $NumTitulo, $AnioTitulo, $Localidad,$CodPais) {

        $consulta = "UPDATE preuniversitario SET ";
        $consulta.= " CodUniversidad = '$CodUniversidad', Colegio = '$Colegio', AnioEgreso = '$AnioEgreso', TipoColegio = '$TipoColegio', NumTitulo = '$NumTitulo', AnioTitulo = '$AnioTitulo', Localidad = '$Localidad',CodPais='$CodPais' ";
        $consulta.= " WHERE CodPersona = '$CodPersona'  ";

        return $this->db->query($consulta);
    }

    function InsertSocioeconomico($CodPersona, $CodZona, $Gestion, $Vivienda, $Caracteristicas, $Trabaja, $Trabajo, $Jornada) {
        $consulta = "INSERT INTO socio_economico (CodPersona, CodZona, Gestion, Vivienda, Caracteristicas, Trabaja, Trabajo, Jornada) ";
        $consulta.= "VALUES ('$CodPersona', '$CodZona', '$Gestion', '$Vivienda', '$Caracteristicas', '$Trabaja', '$Trabajo', '$Jornada') ";
        return $this->db->query($consulta);
    }

    function UpdateSocioeconomico($CodPersona, $CodZona, $Gestion, $Vivienda, $Caracteristicas, $Trabaja, $Trabajo, $Jornada) {

        $consulta = "UPDATE socio_economico SET ";
        $consulta.= " CodZona = '$CodZona', Gestion = '$Gestion', Vivienda = '$Vivienda', Caracteristicas = '$Caracteristicas', Trabaja = '$Trabaja', Trabajo = '$Trabajo', Jornada = '$Jornada' ";
        $consulta.= " WHERE CodPersona = '$CodPersona' ";
        return $this->db->query($consulta);
    }

    function Disable($CodUsuario) {
        $sql = "UPDATE $this->Tabla SET Activo='N'
                WHERE CodUsuario=$CodUsuario";
        return $this->db->query($sql);
    }

    function GetAll() {

        $sql = "SELECT u.*,p.*,pr.Nombres,pr.Paterno,pr.Materno FROM  usuario u, perfil p,persona pr WHERE pr.CodPersona=u.CodPersona and u.TipoUsuario=p.CodPerfil and u.Activo in ('S')";
        //echo $sql;
        return $this->db->query($sql);
    }

    function GetXId($CodPersona) {

        $sql = " SELECT p.*,p.CodPais as PaisNacimiento,ps1.Nombre as NombrePaisNacimiento,p2.*,p2.CodPais as PaisTitulo,
          ps2.Nombre as NombrePaisTitulo,s.*,z.Nombre as Zona,u.Nombre as Universidad
FROM persona p INNER JOIN preuniversitario  p2 ON (p.CodPersona=p2.CodPersona)
INNER JOIN socio_economico s ON (s.CodPersona=p.CodPersona)
INNER JOIN zona z ON (z.CodZona=s.CodZona)
LEFT JOIN pais ps1 ON (ps1.CodPais=p.CodPais)
LEFT JOIN pais ps2 ON(ps2.CodPais=p2.CodPais)
LEFT JOIN universidad u on (p2.CodUniversidad=u.CodUniversidad)
WHERE p.CodPersona=$CodPersona ;";
        //echo $sql;
        return $this->db->query($sql)->row();
        
    }

    function ComboPais($Combo,$Selected) {
        $sql = "SELECT * FROM pais";
        $resultado = $this->db->query($sql);
        $s = "<select name='$Combo' id='$Combo'>";
        $s .= "<option value=''>--Seleccione Pais--</option>";
        foreach ($resultado->result() as $row){
            if($row->CodPais==$Selected)
            {
                $s .= "<option value=" . $row->CodPais . " Selected>" . utf8_decode($row->Nombre) . "</option>";
            }
            else
            $s .= "<option value=" . $row->CodPais . ">" . utf8_decode($row->Nombre) . "</option>";
        }
        return $s . "</select>";
    }

     function ComboUniversidades($Combo,$Selected) {
        $sql = "SELECT * FROM universidad u";
        $resultado = $this->db->query($sql);
        $s = "<select name='$Combo' id='$Combo'>";
        $s .= "<option value=''>--Seleccione Universidad--</option>";
        foreach ($resultado->result() as $row){
            if($row->CodUniversidad==$Selected)
            {
                $s .= "<option value=" . $row->CodUniversidad . " Selected>" .utf8_decode($row->Nombre) . "</option>";
            }
            else
            $s .= "<option value=" . $row->CodUniversidad . ">" .utf8_decode( $row->Nombre) . "</option>";
        }
        return $s . "</select>";
    }
    
    function ComboZona($Combo,$Selected) {
        $sql = "SELECT * FROM zona z;";
        $resultado = $this->db->query($sql);
        $s = "<select name='$Combo' id='$Combo'>";
        $s .= "<option value=''>--Seleccione Zona--</option>";
        foreach ($resultado->result() as $row){
            if($row->CodZona==$Selected)
            {
                $s .= "<option value=" . $row->CodZona . " Selected>" .utf8_decode($row->Nombre) . "</option>";
            }
            else
            $s .= "<option value=" . $row->CodZona . ">" .utf8_decode( $row->Nombre) . "</option>";
        }
        return $s . "</select>";
    }
    function VerificaEstudiante($Nombre, $Paterno, $Materno,$CI)
    {
        $sql = "SELECT * FROM persona WHERE Nombres = '$Nombre' and Paterno='$Paterno' and Materno = '$Materno' and CI='$CI' ";
        return $resultado = $this->db->query($sql)->row();
        
    }
    function VerificaPais()
    {
        $sql = "SELECT Numero FROM valores WHERE Codigo = 'CODIGOPAIS'";
        //echo $sql;
        return $resultado = $this->db->query($sql)->row()->Numero;
        
    }

}

?>
