<?php

class Modelo_perfil extends CI_Model {

    //nombre de la tabla
    private $Tabla = 'perfil';

    function __construct() {
        parent::__construct();
    }
    
    function Insert($Perfil, $Llave) {
        
        $sql = "INSERT INTO perfil (Perfil,Activo,Llave) VALUES ('$Perfil', 'S', '$Llave')";
        return $this->db->query($sql);
    }

    function Update($CodPerfil, $Perfil,$Llave) {
        $sql = "UPDATE perfil SET Perfil='$Perfil', Llave='$Llave'
                WHERE CodPerfil=$CodPerfil";
        return $this->db->query($sql);
    }

    function Disable($CodPerfil) {
        $sql = "UPDATE perfil SET Activo='N'
                WHERE CodPerfil=$CodPerfil";
        return $this->db->query($sql);
    }

    function GetAll() {

        $sql = "SELECT p.* FROM  perfil p WHERE p.Activo in ('S')";
        //echo $sql;
        return $this->db->query($sql);
    }
    
    function GetXId($codigo) {

        $sql = "SELECT p.* FROM  perfil p WHERE p.Activo in ('S') and CodPerfil=$codigo";
        return $this->db->query($sql)->row();
     
    }


}

?>
