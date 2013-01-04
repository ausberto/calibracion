<?php

class Modelo_matricula extends CI_Model {

    private $Tabla = 'matricula';

    function __construct() {
        parent::__construct();
    }
	
	function InsertEstudianteCarrera($CodPersona, $CodCarrera, $AnioIngreso, $AnioEgreso, $NumArchivo) {
		$sql = "INSERT INTO estudiante_carrera (CodPersona, CodCarrera, AnioIngreso, AnioEgreso, NumArchivo) 
                VALUES ($CodPersona, $CodCarrera, '$AnioIngreso', '$AnioEgreso', '$NumArchivo')";
        $this->db->query($sql);
		$sql = "SELECT LAST_INSERT_ID() AS Codigo";
		return $this->db->query($sql)->row()->Codigo;
	}
	
	function InsertEstudiante($CodPersona, $RegUniversitario, $Anexo, $DocIngreso, $Categoria) {
		$sql = "INSERT INTO estudiante (CodPersona, RegUniversitario, Anexo, DocIngreso, Categoria) 
                VALUES ($CodPersona, $RegUniversitario, $Anexo, $DocIngreso, '$Categoria')";
        $this->db->query($sql);
	}
	
	function InsertRequisitos($CodPersona, $Requisito, $Fecha) {
		foreach($Requisito as $r) {
			$sql = "INSERT INTO estudiante_requisito (CodPersona, CodRequisito, FechaPresentacion) VALUES(
			       $CodPersona, $r, '$Fecha')";
			$this->db->query($sql);
		}
	}
	
	function InsertMatricula($CodEstudianteCarrera, $Matricula, $Fecha, $Gestion) {
		$sql = "INSERT INTO matricula (CodEstudianteCarrera, Matricula, Fecha, Gestion) 
                VALUES ($CodEstudianteCarrera, $Matricula, '$Fecha', '$Gestion')";
        $this->db->query($sql);
		$sql = "SELECT LAST_INSERT_ID() AS Codigo";
		return $this->db->query($sql)->row()->Codigo;
	}
	
	function InsertDeposito($CodMatricula, $TipoMatricula, $CodBanco, $DepMatricula, $FechaDeposito, $NumDeposito) {
		if( $DepMatricula>0) {
			$sql = "INSERT INTO deposito_bancario (CodMatricula, TipoMatricula, CodBanco, DepMatricula, FechaDeposito, NumDeposito) 
					VALUES ($CodMatricula, '$TipoMatricula', $CodBanco, $DepMatricula, '$FechaDeposito', '$NumDeposito')";
			$this->db->query($sql);
		}
	}

	function Insert($CodPersona, $AnioIngreso, $Matricula, $RegUniversitario, $Anexo, $AnioEgreso,  
					$Egresado, $Profesional, $Traspaso, $Magisterio, $Titulo, $FotocopiaCI, 
					$Certificado, $Fotografia, $DocIngreso, $NumArchivo, $CodCarrera, $Fecha, 
					$NumDeposito, $Deposito, $Categoria, $Requisito, $Notas) {
					
		//en estudiante: CodPersona, RegUniversitario, Anexo, DocIngreso, Categoria
		$this->InsertEstudiante($CodPersona, $RegUniversitario, $Anexo, $DocIngreso, $Categoria);
		
		//en estudiante_requisito: codpersona, codrequisito, fechapresentacion
		$this->InsertRequisitos($CodPersona, $Requisito, $Fecha);
		
		//en estudiante_carrera: codpersona, codcarrera, anioingreso, anioegreso, numarchivo, modalidad, activo
		$CodEstudianteCarrera = $this->InsertEstudianteCarrera($CodPersona, $CodCarrera, $AnioIngreso, $AnioEgreso, $NumArchivo);
		
		//en matricula: CodEstudianteCarrera, Matricula, Fecha, Gestion. Fuente
		$CodMatricula = $this->InsertMatricula($CodEstudianteCarrera, $Matricula, $Fecha, $this->session->userdata('Gestion'));
		
		//en deposito_bancario: codmatricula, tipomatricula, codbanco, depMatricula, fecha, numdeposito
		$this->InsertDeposito($CodMatricula, 'U', $this->modelo_valores->GetNumero('BANCO'), $Deposito, $Fecha, $NumDeposito);
		
		$this->modelo_estudiante->UpdateNotas($CodPersona, $Notas);
	}
	
	function GetCupo($CodPersona, $Gestion, &$Desde, &$Hasta) {
		$sql = "SELECT * FROM cupo_matricula WHERE CodPersona=$CodPersona AND Gestion='$Gestion'";
		$query = $this->db->query($sql);
		if( $query->num_rows()>0 ) {
			$Desde = $query->row()->Desde;
			$Hasta = $query->row()->Hasta;
		}
		else
			$Desde = $Hasta = 0;
	}
	
	function DentroDelCupo($mat) {
		$CodUsuario = $this->session->userdata('CodUsuario');
		$Gestion = $this->session->userdata('Gestion');

		$this->GetCupo($CodUsuario, $Gestion, $Desde, $Hasta);
		return ($mat>=$Desde && $mat<=$Hasta) || ($Desde==0 && $Hasta==0);
	}
	
	function MatriculaExistente($mat) {
		$CodUsuario = $this->session->userdata('CodUsuario');
		$Gestion = $this->session->userdata('Gestion');
		
		$sql = "SELECT COUNT(*) AS Conteo FROM matricula WHERE Matricula=$mat AND Gestion='$Gestion'";
		$query = $this->db->query($sql);
		$row = $query->row();
		return $row->Conteo>0;
	}
	
	function EsEstudianteNuevo($CodPersona) {
		$sql = "SELECT COUNT(*) AS Conteo FROM estudiante_carrera, matricula
				WHERE estudiante_carrera.CodEstudianteCarrera= matricula.CodEstudianteCarrera
				AND estudiante_carrera.CodPersona=$CodPersona";
		$query = $this->db->query($sql);
		return $query->row()->Conteo == 0;
	}
	
	function TablaMatriculados($CodCarrera, $Gestion) {
		$sql = "SELECT CONCAT_WS(' ', Paterno, Materno, Nombres) AS NombreCompleto, CONCAT(CI, ' ', Expedido) AS CI, RegUniversitario,
				matricula.fecha as Fecha,carrera.Nombre AS NombreCarrera,matricula.Matricula
				FROM matricula, estudiante_carrera, persona, estudiante, carrera
				WHERE matricula.CodEstudianteCarrera=estudiante_carrera.CodEstudianteCarrera
				AND estudiante_carrera.CodPersona=persona.CodPersona
				AND persona.CodPersona=estudiante.CodPersona
				AND estudiante_carrera.CodPersona=estudiante.CodPersona
				AND matricula.Gestion='$Gestion'
				".(($CodCarrera)?"AND estudiante_carrera.CodCarrera=$CodCarrera":'')."
				AND carrera.CodCarrera=estudiante_carrera.CodCarrera
				ORDER BY NombreCompleto";
		return $this->db->query($sql);
	}
	
	function TablaCarreraEdad($Gestion) {
		$sql = "SELECT carrera.CodCarrera,carrera.Nombre AS NombreCarrera, 
				IF( persona.Genero='M', COUNT(persona.Genero), NULL ) AS Varones,
				IF( persona.Genero='F', COUNT(persona.Genero), NULL ) AS Mujeres
				FROM matricula, estudiante_carrera, persona, estudiante, carrera
				WHERE matricula.CodEstudianteCarrera=estudiante_carrera.CodEstudianteCarrera
				AND estudiante_carrera.CodPersona=persona.CodPersona
				AND persona.CodPersona=estudiante.CodPersona
				AND estudiante_carrera.CodPersona=estudiante.CodPersona
				AND matricula.Gestion='$Gestion'
				AND carrera.CodCarrera=estudiante_carrera.CodCarrera
				GROUP BY carrera.CodCarrera,persona.Genero ORDER BY NombreCarrera";
		return $this->db->query($sql);
	}
	
	function TablaEstadosCiviles($Gestion,$Tipo) {
		$sql = "SELECT carrera.CodCarrera,carrera.Nombre AS NombreCarrera, persona.EstadoCivil,
				IF( persona.EstadoCivil='0', 1, NULL ) AS Solteros,
				IF( persona.EstadoCivil='1', 1, NULL ) AS Casados,
				IF( persona.EstadoCivil='2', 1, NULL ) AS Convivientes,
				IF( persona.EstadoCivil='3', 1, NULL ) AS Divorciados,
				IF( persona.EstadoCivil='4', 1, NULL ) AS Viudos
				FROM matricula, estudiante_carrera, persona, estudiante, carrera
				WHERE matricula.CodEstudianteCarrera=estudiante_carrera.CodEstudianteCarrera
				AND estudiante_carrera.CodPersona=persona.CodPersona
				AND persona.CodPersona=estudiante.CodPersona
				AND estudiante_carrera.CodPersona=estudiante.CodPersona
				AND matricula.Gestion='$Gestion'
				".(($Tipo!="FM")?"AND persona.Genero='$Tipo'":"")."
				AND carrera.CodCarrera=estudiante_carrera.CodCarrera
				ORDER BY NombreCarrera";
		return $this->db->query($sql);
	}
}

?>