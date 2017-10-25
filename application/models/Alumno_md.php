<?php

class Alumno_md extends CI_Model {
	
	const tabla="ALUMNO";
	
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
    	$this->db->where(array('PERSONA_ID'=>$id));
        $query = $this->db->get(self::tabla);
        return $query->row_array();
    }
	
    function InsertRecord($data) {
    	
    	$this->db->set('PERSONA_ID', $data[0]);
    	$this->db->set('PIFI', $data[1]);
    	$this->db->set('CONACYT', $data[2]);
    	$this->db->set('BOLETA', $data[3]);
    	$this->db->set('SEMESTRE', $data[4]);
    	$this->db->set('PROMEDIO', $data[5]);
    	$this->db->set('SIP_REGISTRO', $data[6]);
    	$this->db->set('SIP_NOMBRE', $data[7]);
    	$this->db->set('SIP_ESCUELA', $data[8]);
    	$this->db->set('SIP_DIRECTOR', $data[9]);
    	$this->db->set('NIVEL_ACADEMICO', $data[10]);
		
        $this->db->insert(self::tabla,$this);
        
		return $data[0];
    }
	
    function UpdateRecord($data,$id) {
    	
    	$this->db->set('PIFI', $data[0]);
    	$this->db->set('CONACYT', $data[1]);
    	$this->db->set('BOLETA', $data[2]);
    	$this->db->set('SEMESTRE', $data[3]);
    	$this->db->set('PROMEDIO', $data[4]);
    	$this->db->set('SIP_REGISTRO', $data[5]);
    	$this->db->set('SIP_NOMBRE', $data[6]);
    	$this->db->set('SIP_ESCUELA', $data[7]);
    	$this->db->set('SIP_DIRECTOR', $data[8]);
    	$this->db->set('NIVEL_ACADEMICO', $data[9]);
		
		$this->db->update(self::tabla, $this, array('PERSONA_ID' => $id));
		
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