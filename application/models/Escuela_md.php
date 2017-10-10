<?php

class Escuela_md extends CI_Model {
	
	const tabla="CENTRO";
	
	function __construct() {
        // Call the Model constructor
        parent::__construct();
    }
	
	function GetAll() {
		$this->db->order_by("NOMBRE_CORTO");
		$query = $this->db->get(self::tabla);
		return $query->result();
    }
    
    function GetById($id) {
		$this->db->where(array('ID'=>$id));
        $query = $this->db->get(self::tabla);
        return $query->row_array();
    }
}