<?php

class Modelo_estudiante extends CI_Model {

    function __construct() {
        parent::__construct();
    }
	
	function DatosEstudiante($CodPersona, &$Notas, &$Egresado, &$Profesional, &$Traspaso, &$Magisterio, &$DocIngreso) {
		$Notas = $Egresado = $Profesional = $Traspaso = $Magisterio = '';
	
		$sql = "SELECT Categoria, DocIngreso FROM estudiante WHERE CodPersona=$CodPersona";
		$query = $this->db->query($sql);
		if( $query->num_rows()>0 ) {
			$Categoria = $query->row()->Categoria;
			if(strpos($Categoria, "E")===True)
				$Egresado = "checked"; 
			if(strpos($Categoria, "P")===True)
				$Profesional = "checked"; 
			if(strpos($Categoria, "T")===True)
				$Traspaso = "checked";
			if(strpos($Categoria, "M")===True)
				$Magisterio = "checked";
			$DocIngreso = $query->row()->DocIngreso;
		}
		
		$Notas = $this->GetNotas($CodPersona);
	}
	
	function RequisitosEstudiante($CodPersona, &$Titulo, &$FotocopiaCI, &$Certificado, &$Fotografia) {
		$Titulo = $FotocopiaCI = $Certificado = $Fotografia = '';
		
		$sql = "SELECT CodRequisito FROM estudiante_requisito WHERE CodPersona=$CodPersona";
		$query = $this->db->query($sql);
		foreach($query->result() as $row) {
			if( $row->CodRequisito==1 )
				$Titulo = 'checked';
			if( $row->CodRequisito==2 )
				$FotocopiaCI = 'checked';
			if( $row->CodRequisito==3 )
				$Certificado = 'checked';
			if( $row->CodRequisito==4 )
				$Fotografia = 'checked';
		}
	}
	
	//funcion invocada cuando el estudiante es antiguo
	function CarrerasEstudiante($CodPersona, &$CodCarrera, &$NumArchivo, &$CodCarreraOrigen, &$AnioIngreso, &$AnioEgreso, &$CodCambio1, &$CodCambio2) {
		//determina carrera actual que es la de la ultima matriculacion
		//carrera de origen es la de la primera matriculacion
		//primer cambio es la segunda despues de la primera y asi para segundo cambio
		$sql = "SELECT * FROM estudiante_carrera WHERE CodPersona=$CodPersona ORDER BY AnioIngreso ASC";
		$query = $this->db->query($sql);

		//siempre existe la carrera de origen
		$CodCarrera = $query->row()->CodCarrera;
		$NumArchivo = $query->row()->NumArchivo;
		$AnioIngreso = $query->row()->AnioIngreso;
		$AnioEgreso = $query->row()->AnioEgreso;
		$CodCarreraOrigen = $CodCarrera;
		$CodCambio1 = 0;
		$CodCambio2 = 0;

		//recorre cambios o carrera paralela
		foreach($query->result() as $row) {
			if($row->Modalidad=='C') {
				$CodCarrera = $query->row()->CodCarrera;
				$NumArchivo = $query->row()->NumArchivo;
				$AnioIngreso = $query->row()->AnioIngreso;
				$AnioEgreso = $query->row()->AnioEgreso;
				if( $CodCambio1==0)   
					$CodCambio1 = $CodCarrera;
				else  //si CodCambio1!=0, es segundo cambio
					$CodCambio2 = $CodCarrera;
			}
		}
	}
	
	//devuelve ultima matricula expedida dentro del cupo asignado y que sea de la gestion
	function UltimaMatriculaExpedida() {
		$CodUsuario = $this->session->userdata('CodUsuario');
		$Gestion = $this->session->userdata('Gestion');
		
		$this->modelo_matricula->GetCupo($CodUsuario, $Gestion, $Desde, $Hasta);
		
		//determina maximo utilizado. Si no hay cupo, devuelve maximo de la gestion simplemente	
		$sql = "SELECT IFNULL(MAX(Matricula),0) AS Mayor FROM matricula 
				WHERE Gestion='$Gestion'";
		if( $Desde!=0 && $Hasta!=0) 
			$sql .= " AND Matricula BETWEEN $Desde AND $Hasta";
		$query = $this->db->query($sql);
		return $query->row()->Mayor;
	}
	
	function UltimoRegUniversitario() {
		$sql = "SELECT MAX(RegUniversitario) AS Mayor FROM estudiante";
		$query = $this->db->query($sql);
		return $query->row()->Mayor;
	}

	//recupera datos de anteriores matriculaciones
	function DatosMatriculacion($CodPersona, &$AnioIngreso, &$Matricula, &$RegUniversitario, &$Anexo,
								 &$NumArchivo, &$AnioEgreso, &$CodCarrera, &$CodCarreraOrigen, 
								 &$CodCambio1, &$CodCambio2, &$Deposito) {
		$sql = "SELECT RegUniversitario, Anexo FROM estudiante WHERE CodPersona=$CodPersona";
		$query = $this->db->query($sql);
		$RegUniversitario = $query->row()->RegUniversitario;
		$Anexo = $query->row()->Anexo;
		//determina carrera actual y anteriores
		$this->CarrerasEstudiante($CodPersona, $CodCarrera, $NumArchivo, $CodCarreraOrigen, $AnioIngreso, $AnioEgreso, $CodCambio1, $CodCambio2);
		$Matricula = $this->UltimaMatriculaExpedida() + 1;

		//importe de la matricula depende de la nacionalidad
		if( $this->modelo_persona->EsNacional($CodPersona) ) 
			$Deposito = $this->modelo_valores->GetNumero('MATRICULANACIONAL');
		else
			$Deposito = $this->modelo_valores->GetNumero('MATRICULAEXTRANJERO');
	}
	
	//genera datos para nuevo universitario
	function DatosNuevaMatriculacion($CodPersona, &$AnioIngreso, &$Matricula, &$RegUniversitario, &$Anexo,
								 &$NumArchivo, &$AnioEgreso, &$CodCarrera, &$CodCarreraOrigen, 
								 &$CodCambio1, &$CodCambio2, &$Deposito) {
		$AnioIngreso = date("Y");
		$Matricula = $this->UltimaMatriculaExpedida() + 1;
		$RegUniversitario = $this->UltimoRegUniversitario() + 1;
		$Anexo = "";
		$NumArchivo = "";
		$AnioEgreso = "";
		$CodCarrera = 0;
		$CodCarreraOrigen = 0;
		$CodCambio1 = 0;
		$CodCambio2 = 0;
		
		//importe de la matricula depende de la nacionalidad
		if( $this->modelo_persona->EsNacional($CodPersona) ) 
			$Deposito = $this->modelo_valores->GetNumero('MATRICULANACIONAL');
		else
			$Deposito = $this->modelo_valores->GetNumero('MATRICULAEXTRANJERO');
	}
	
	function Busqueda($Apellido, $CI, $RegUniversitario) {
		//$sql = "SELECT * FROM persona, estudiante WHERE persona.CodPersona=estudiante.CodPersona 
		//		AND CONCAT_WS(' ', Paterno, Materno) like '%".$Apellido."%'";
		$sql = "SELECT persona.CodPersona, CONCAT_WS(' ', Paterno, Materno, Nombres) AS NombreCompleto, 
				Carrera.Nombre AS NombreCarrera 
				FROM estudiante, persona LEFT OUTER JOIN estudiante_carrera 
				ON  persona.CodPersona=estudiante_carrera.CodPersona 
				LEFT OUTER JOIN carrera ON estudiante_carrera.CodCarrera=carrera.CodCarrera 
				LEFT OUTER JOIN matricula ON estudiante_carrera.CodEstudianteCarrera=matricula.CodEstudianteCarrera 
				WHERE persona.CodPersona=estudiante.CodPersona  
				AND (CONCAT_WS(' ', Paterno, Materno) LIKE '%$Apellido%' OR '$Apellido'='') 
				AND (CI='$CI' OR '$CI'='') 
				AND (RegUniversitario='$RegUniversitario' OR '$RegUniversitario'='')";			
		return $this->db->query($sql);
	}
	
	function getFila($CodPersona) {
        $sql = "select * from persona where CodPersona=$CodPersona";
        return $this->db->query($sql)->row();
    }

    function Delete($CodPersona) {
        $this->db->where('CodPersona', $CodPersona);
        $this->db->delete('persona');
    }
	
	function GetNotas($CodPersona) {
		$sql = "SELECT Obs FROM persona WHERE CodPersona=$CodPersona";
		$query = $this->db->query($sql);
		return $query->row()->Obs;
	}
	
	function UpdateNotas($CodPersona, $Notas) {
		$sql = "UPDATE persona SET Obs='$Notas' WHERE CodPersona=$CodPersona";
		$this->db->query($sql);
	}
	
	function GetDocIngreso($CodPersona) {
		$sql = "SELECT DocIngreso FROM estudiante WHERE CodPersona=$CodPersona";
		return $this->db->query($sql)->row()->DocIngreso;
	}
	
	function RegUniversitarioExistente($RegUniversitario, $Anexo) {
		$sql = "SELECT COUNT(*) AS Conteo FROM estudiante WHERE (RegUniversitario=$RegUniversitario AND '$Anexo'='') OR 
		        (RegUniversitario=$RegUniversitario AND 'Anexo'='$Anexo')";
		$query = $this->db->query($sql);
		$row = $query->row();
		return $row->Conteo>0;
	}
	
	//verifica que el reg.univ. corresponda a la persona indicada
	function RegUniversitarioUnico($RegU, $Anexo, $CodPersona) {
		$sql = "SELECT CodPersona FROM estudiante WHERE (RegUniversitario=$RegUniversitario AND '$Anexo'='') OR 
		        (RegUniversitario=$RegUniversitario AND 'Anexo'='$Anexo')";
		$query = $this->db->query($sql);  //0:ok, 1:es de la persona?, 2 o mas: no
		if($query->num_rows()==0)
			return True;
		else if($query->num_rows()==1) 
			return $query->row()->CodPersona==$CodPersona; 
		else
			return False;
	}
}

?>