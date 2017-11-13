<?php

class Coautor_md extends CI_Model {
	
	const tabla="COAUTOR";
	
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
	
	function GetBySolicitud($id) {
		$this->db->where(array('SOLICITUD_ID'=>$id));
        $query = $this->db->get(self::tabla);
        return $query->result_array();
    }
	
    function GetByPonencia($id) {
		$this->db->where(array('PONENCIA_ID'=>$id));
        $query = $this->db->get(self::tabla);
        return $query->result_array();
    }
	
    function GetByPersona($id) {
		$this->db->where(array('PERSONA_ID'=>$id));
        $query = $this->db->get(self::tabla);
    }
	
    function InsertRecord($data) {
    	$this->db->select_max('ID');
    	$query = $this->db->get(self::tabla);
    	$id = $query->row();
    	$id = $id->ID + 1;
    	 
    	$this->db->set('ID', $id);
    	$this->db->set('PONENCIA_ID', $data[0]);
    	$this->db->set('SOLICITUD_ID', $data[1]);
    	$this->db->set('TIPO_SOLICITUD', $data[2]);
    	$this->db->set('PERSONA_ID', $data[3]);
    	$this->db->set('NOMBRE', $data[4]);
    	$this->db->set('APELLIDO_P', $data[5]);
    	$this->db->set('APELLIDO_M', $data[6]);
		
        $this->db->insert(self::tabla,$this);
        
		$this->db->select("ID");
        $this->db->where(array("PONENCIA_ID"=>$data[0],"PERSONA_ID"=>$data[3]));
        $query = $this->db->get(self::tabla);
        
        $usr = $query->row();
        
		return $usr->ID;
    }
	
    function UpdateRecord($data,$id) {
    	
    	$this->db->set('PONENCIA_ID', $data[0]);
    	$this->db->set('SOLICITUD_ID', $data[1]);
    	$this->db->set('TIPO_SOLICITUD', $data[2]);
    	$this->db->set('PERSONA_ID', $data[3]);
    	$this->db->set('NOMBRE', $data[4]);
    	$this->db->set('APELLIDO_P', $data[5]);
    	$this->db->set('APELLIDO_M', $data[6]);
		
		$this->db->update(self::tabla, $this, array('ID' => $id));
		
		return $id;
    }
    
    function CleanSol($id) {
    	$this->db->where(array('SOLICITUD_ID'=>$id));
    	$query = $this->db->delete(self::tabla);
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