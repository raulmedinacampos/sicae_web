<?php

class C_evaluaicon_md extends CI_Model {
	
	const tabla="C_EVALUACION";
	
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
		$this->db->where(array('ID'=>$id));
        $query = $this->db->get(self::tabla);
        return $query->row_array();
    }
	
    function GetByPersona($id) {
		$this->db->where(array('PERSONA_ID'=>$id));
        $query = $this->db->get(self::tabla);
        return $query->row_array();
    }
	
    function GetByPregunta($id) {
		$this->db->where(array('PREGUNTA_ID'=>$id));
        $query = $this->db->get(self::tabla);
        return $query->row_array();
    }
	
    function InsertRecord($data) {
    	
    	$this->db->set('PERSONA_ID', $data[0]);
    	$this->db->set('PREGUNTA_ID', $data[1]);
    	$this->db->set('CALIFICACION_ID', $data[2]);
		
        $this->db->insert(self::tabla,$this);
        
        $this->db->select("PERSONA_ID");
        $this->db->where(array("PERSONA_ID"=>$data[0],"PREGUNTA_ID"=>$data[1],"CALIFICACION_ID"=>$data[2]));
        $query = $this->db->get(self::tabla);
        
        $usr = $query->row();
        
		return $usr->ID;
    }
	
    /*function UpdateRecord($data,$id) {
    	
    	$this->db->set('PERSONA_ID', $data[0]);
    	$this->db->set('PREGUNTA_ID', $data[1]);
    	$this->db->set('CALIFICACION_ID', $data[2]);
		
		$this->db->update(self::tabla, $this, array('ID' => $id));
		
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