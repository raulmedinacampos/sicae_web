<?php

class Solicitud_md extends CI_Model {
	
	const tabla="SOLICITUD";
	
	function __construct() {
        // Call the Model constructor
        parent::__construct();
    }
	
	function GetAll() {
        $query = $this->db->get(self::tabla);
        return $query->result();
    }
    /*
	function GetAllAdmin() {
		$this->db->where('ACTIVO', 'S');
		$this->db->or_where('ACTIVO', 'N');
        $query = $this->db->get(self::tabla);
        return $query->result();
    }
    
    function GetAllActives() {
    	$this->db->where('ACTIVO', 'S');
    	$query = $this->db->get(self::tabla);
    	return $query->result();
    }
    */
    function GetById($id) {
    	$this->db->select("ID, TIPO, PERSONA_ID, TIPO_EVENTO_ID, NOMBRE_EVENTO, ORGANIZA, SEDE");
    	$this->db->select("TO_CHAR(FECHA_INICIAL, 'DD/MM/RRRR') AS FECHA_INICIAL", FALSE);
    	$this->db->select("TO_CHAR(FECHA_FINAL, 'DD/MM/RRRR') AS FECHA_FINAL", FALSE);
    	$this->db->select("FECHA_REGISTRO, DIAS_ADICIONALES, DA_JUSTIFICACION");
    	$this->db->select("TO_CHAR(DA_FECHA_SALIDA, 'DD/MM/RRRR') AS DA_FECHA_SALIDA", FALSE);
    	$this->db->select("TO_CHAR(DA_FECHA_REGRESO, 'DD/MM/RRRR') AS DA_FECHA_REGRESO", FALSE);
    	$this->db->select("ITINERARIO, OTRO, OBJETIVO, BENEFICIO, PARTICIPANTES, EXPOSITORES");
    	$this->db->select("JUSTIFICACION, HORAS_TOTALES, MONTO");
		$this->db->where(array('ID'=>$id));
		
		if ( $this->session->rol == 1 || $this->session->rol == 3 ) {
			$this->db->where("TIPO", "A");
		}
		
		if ( $this->session->rol == 2 ) {
			$this->db->where("TIPO", "R");
		}
		
        $query = $this->db->get(self::tabla);
        return $query->row_array();
    }
    
    function GetByPerson($id) {
    	$this->db->select("SOLICITUD.ID, TIPO, PERSONA_ID, TIPO_EVENTO_ID, NOMBRE_EVENTO, ORGANIZA, SEDE");
    	$this->db->select("TO_CHAR(FECHA_INICIAL, 'DD/MM/RRRR') AS FECHA_INICIAL", FALSE);
    	$this->db->select("TO_CHAR(FECHA_FINAL, 'DD/MM/RRRR') AS FECHA_FINAL", FALSE);
    	$this->db->select("FECHA_REGISTRO, DIAS_ADICIONALES, DA_JUSTIFICACION");
    	$this->db->select("TO_CHAR(DA_FECHA_SALIDA, 'DD/MM/RRRR') AS DA_FECHA_SALIDA", FALSE);
    	$this->db->select("TO_CHAR(DA_FECHA_REGRESO, 'DD/MM/RRRR') AS DA_FECHA_REGRESO", FALSE);
    	$this->db->select("ITINERARIO, OTRO, OBJETIVO, BENEFICIO, PARTICIPANTES, EXPOSITORES");
    	$this->db->select("JUSTIFICACION, HORAS_TOTALES, MONTO, DESCRIPCION AS TIPO_EVENTO");
    	$this->db->from(self::tabla);
    	$this->db->join("TIPO_EVENTO", "SOLICITUD.TIPO_EVENTO_ID = TIPO_EVENTO.ID", "LEFT");
    	$this->db->where(array('PERSONA_ID'=>$id));
    	$query = $this->db->get();
    	
    	return $query->result_array();
    }
    
    function GetByTypePerson($tipo, $id) {
    	$this->db->select("ID, TIPO, PERSONA_ID, TIPO_EVENTO_ID, NOMBRE_EVENTO, ORGANIZA, SEDE");
    	$this->db->select("TO_CHAR(FECHA_INICIAL, 'DD/MM/RRRR') AS FECHA_INICIAL", FALSE);
    	$this->db->select("TO_CHAR(FECHA_FINAL, 'DD/MM/RRRR') AS FECHA_FINAL", FALSE);
    	$this->db->select("FECHA_REGISTRO, DIAS_ADICIONALES, DA_JUSTIFICACION");
    	$this->db->select("TO_CHAR(DA_FECHA_SALIDA, 'DD/MM/RRRR') AS DA_FECHA_SALIDA", FALSE);
    	$this->db->select("TO_CHAR(DA_FECHA_REGRESO, 'DD/MM/RRRR') AS DA_FECHA_REGRESO", FALSE);
    	$this->db->select("ITINERARIO, OTRO, OBJETIVO, BENEFICIO, PARTICIPANTES, EXPOSITORES");
    	$this->db->select("JUSTIFICACION, HORAS_TOTALES, MONTO");
    	$this->db->where(array('TIPO_EVENTO_ID'=>$tipo, 'PERSONA_ID'=>$id));
    	$query = $this->db->get(self::tabla);
    	 
    	return $query->result_array();
    }
    
    function GetHistoryByPerson($id) {
    	$this->db->select("TIPO_PERSONA_ID");
    	$this->db->from("PERSONA");
    	$this->db->where("ID", $id);
    	$query = $this->db->get();
    	$tipo = $query->row();
    	
    	$this->db->select("s.ID, s.TIPO, s.PERSONA_ID, s.TIPO_EVENTO_ID, s.NOMBRE_EVENTO, s.ORGANIZA, s.SEDE");
    	$this->db->select("TO_CHAR(FECHA_INICIAL, 'DD/MM/RRRR') AS FECHA_INICIAL", FALSE);
    	$this->db->select("TO_CHAR(FECHA_FINAL, 'DD/MM/RRRR') AS FECHA_FINAL", FALSE);
    	$this->db->select("s.FECHA_REGISTRO, s.DIAS_ADICIONALES, s.DA_JUSTIFICACION");
    	$this->db->select("TO_CHAR(DA_FECHA_SALIDA, 'DD/MM/RRRR') AS DA_FECHA_SALIDA", FALSE);
    	$this->db->select("TO_CHAR(DA_FECHA_REGRESO, 'DD/MM/RRRR') AS DA_FECHA_REGRESO", FALSE);
    	$this->db->select("s.ITINERARIO, s.OTRO, s.OBJETIVO, s.BENEFICIO, s.PARTICIPANTES, s.EXPOSITORES");
    	$this->db->select("s.JUSTIFICACION, s.HORAS_TOTALES, s.MONTO, e.DESCRIPCION AS TIPO_EVENTO");
    	$this->db->from(self::tabla." s");
    	
    	if ( $tipo->TIPO_PERSONA_ID == 1 ) {
    		$this->db->join("PROFESOR p", "s.PERSONA_ID = p.PERSONA_ID");
    	}
    	
    	if ( $tipo->TIPO_PERSONA_ID == 3 ) {
    		$this->db->join("ALUMNO a", "s.PERSONA_ID = a.PERSONA_ID");
    	}
    	
    	$this->db->join("TIPO_EVENTO e", "s.TIPO_EVENTO_ID = e.ID", "LEFT");
    	$this->db->where("s.PERSONA_ID", $id);
    	$query = $this->db->get();
    	
    	return $query->result_array();
    }
    
    function GetRequirementById($id) {
    	$this->db->select("s.TIPO, s.TIPO_EVENTO_ID, p.TIPO_PERSONA_ID, c.NIVEL_ID");
    	$this->db->from(self::tabla." s");
    	$this->db->join("PERSONA p", "p.ID = s.PERSONA_ID");
    	$this->db->join("CENTRO c", "c.ID = p.CENTRO_ADSCRIPCION");
    	$this->db->where(array('s.ID'=>$id));
    	
    	if ( $this->session->rol == 1 || $this->session->rol == 3 ) {
    		$this->db->where("TIPO", "A");
    	}
    	
    	if ( $this->session->rol == 2 ) {
    		$this->db->where("TIPO", "R");
    	}
    	
    	$query = $this->db->get();
    	
    	return $query->row_array();
    }
    
    function GetNextId($type) {
    	$this->db->select_max('ID');
    	$this->db->where("TIPO", $type);
    	$query = $this->db->get(self::tabla);
    	$id = $query->row();
    	$id = $id->ID + 1;
    	
    	return $id;
    }
	
    function InsertRecord($data) {
    	$id = $data[21];
    	 
    	$this->db->set('ID', $id);
    	$this->db->set('TIPO', $data[0]);
    	$this->db->set('PERSONA_ID', $data[1]);
    	$this->db->set('TIPO_EVENTO_ID', $data[2]);
    	$this->db->set('NOMBRE_EVENTO', $data[3]);
    	$this->db->set('ORGANIZA', $data[4]);
    	$this->db->set('SEDE', $data[5]);
    	$this->db->set('FECHA_INICIAL', "to_date('$data[6]', 'DD/MM/RRRR')",FALSE);
    	$this->db->set('FECHA_FINAL', "to_date('$data[7]', 'DD/MM/RRRR')",FALSE);
		if($data[9]!=""&&$data[10]!=""&&$data[11]!=""){
			$this->db->set('DIAS_ADICIONALES', $data[8]);
			$this->db->set('DA_JUSTIFICACION', $data[9]);
			$this->db->set('DA_FECHA_SALIDA', "to_date('$data[10]', 'DD/MM/RRRR')",FALSE);
			$this->db->set('DA_FECHA_REGRESO', "to_date('$data[11]', 'DD/MM/RRRR')",FALSE);
		}
		else{
			$this->db->set('DIAS_ADICIONALES',0);
		}
    	$this->db->set('ITINERARIO', $data[12]);
    	$this->db->set('OTRO', $data[13]);
    	$this->db->set('OBJETIVO', $data[14]);
    	$this->db->set('BENEFICIO', $data[15]);
    	$this->db->set('PARTICIPANTES', $data[16]);
    	$this->db->set('EXPOSITORES', $data[17]);
    	$this->db->set('JUSTIFICACION', $data[18]);
    	$this->db->set('HORAS_TOTALES', $data[19]);
    	$this->db->set('MONTO', $data[20]);
		
        if($this->db->insert(self::tabla,$this))
			return $id;	
        
    }
	
    function UpdateRecord($data,$id) {
    	
    	
    	//$this->db->set('TIPO', $data[0]);
    	$this->db->set('PERSONA_ID', $data[1]);
    	$this->db->set('TIPO_EVENTO_ID', $data[2]);
    	$this->db->set('NOMBRE_EVENTO', $data[3]);
    	$this->db->set('ORGANIZA', $data[4]);
    	$this->db->set('SEDE', $data[5]);
    	$this->db->set('FECHA_INICIAL', "to_date('$data[6]', 'DD/MM/RRRR')",FALSE);
    	$this->db->set('FECHA_FINAL', "to_date('$data[7]', 'DD/MM/RRRR')",FALSE);
		if($data[9]!=""&&$data[10]!=""&&$data[11]!=""){
			$this->db->set('DIAS_ADICIONALES', $data[8]);
			$this->db->set('DA_JUSTIFICACION', $data[9]);
			$this->db->set('DA_FECHA_SALIDA', "to_date('$data[10]', 'DD/MM/RRRR')",FALSE);
			$this->db->set('DA_FECHA_REGRESO', "to_date('$data[11]', 'DD/MM/RRRR')",FALSE);
		}
		else{
			$this->db->set('DIAS_ADICIONALES',0);
			$this->db->set('DA_JUSTIFICACION', NULL);
			$this->db->set('DA_FECHA_SALIDA', NULL);
			$this->db->set('DA_FECHA_REGRESO', NULL);
		}
    	$this->db->set('ITINERARIO', $data[12]);
    	$this->db->set('OTRO', $data[13]);
    	$this->db->set('OBJETIVO', $data[14]);
    	$this->db->set('BENEFICIO', $data[15]);
    	$this->db->set('PARTICIPANTES', $data[16]);
    	$this->db->set('EXPOSITORES', $data[17]);
    	$this->db->set('JUSTIFICACION', $data[18]);
    	$this->db->set('HORAS_TOTALES', $data[19]);
    	$this->db->set('MONTO', $data[20]);
		
		$this->db->update(self::tabla, $this, array('ID' => $id, 'TIPO' => $data[0] ));
		
		return $id;
    }

    /*function Disable($id) {
    	$this->ACTIVO = 'N';

        $this->db->update(self::tabla, $this, array('IDUSUARIO' => $id));
    }
	
    function Enable($id) {
    	$this->ACTIVO = 'S';

        $this->db->update(self::tabla, $this, array('IDUSUARIO' => $id));
    }

    function Delete($id) {
        $this->ACTIVO = 'E';

        $this->db->update(self::tabla, $this, array('IDUSUARIO' => $id));
    }
	*/

}