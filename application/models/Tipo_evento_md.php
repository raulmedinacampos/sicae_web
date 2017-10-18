<?php

class Tipo_evento_md extends CI_Model {
	
	const tabla="TIPO_EVENTO";
	
	function __construct() {
        // Call the Model constructor
        parent::__construct();
    }
	
	function GetAll() {
		$this->db->where_in("ID", array(1, 2, 7, 8));
		$this->db->order_by("DESCRIPCION");
		$query = $this->db->get(self::tabla);
		return $query->result();
    }
    
    function GetAllOrganizer() {
    	$this->db->where_in("ID", array(1, 2, 7, 8, 10, 11, 12, 13, 14));
    	$this->db->order_by("DESCRIPCION");
    	$query = $this->db->get(self::tabla);
    	return $query->result();
    }
    
    function GetById($id) {
		$this->db->where(array('ID'=>$id));
        $query = $this->db->get(self::tabla);
        return $query->row_array();
    }
}