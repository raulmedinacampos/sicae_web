<?php

class Homoclave_md extends CI_Model {
	
	const tabla="HOMOCLAVE";
	
	function __construct() {
        // Call the Model constructor
        parent::__construct();
    }
	
	function GetAll() {
		$this->db->order_by("NOMBRE");
        $query = $this->db->get(self::tabla);
        return $query->result();
    }
    
    function GetById($id) {
		$this->db->where(array('ID'=>$id));
        $query = $this->db->get(self::tabla);
        return $query->row_array();
    }
	
    function GetByEvent($id) {
    	$this->db->where(array('TIPO_EVENTO'=>$id));
    	$query = $this->db->get(self::tabla);
    	return $query->row_array();
    }
}