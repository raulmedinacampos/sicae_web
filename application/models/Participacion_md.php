<?php

class Participacion_md extends CI_Model {
	
	const tabla="TIPO_PARTICIPACION";
	
	function __construct() {
        // Call the Model constructor
        parent::__construct();
    }
	
	function GetAll() {
		$this->db->where_in("ID", array("1", "2"));
		$this->db->order_by("ID");
		$query = $this->db->get(self::tabla);
		return $query->result();
    }
    
    function GetById($id) {
		$this->db->where(array('ID'=>$id));
        $query = $this->db->get(self::tabla);
        return $query->row_array();
    }
}