<?php

class Moneda_md extends CI_Model {
	
	const tabla="MONEDA";
	
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
	
    function InsertRecord($data) {
    	
    	$this->db->set('NOMBRE', $data[0]);
    	$this->db->set('CAMBIO', $data[1]);
		
        $this->db->insert(self::tabla,$this);
        
        $this->db->select("ID");
        $this->db->where(array("NOMBRE"=>$data[0]));
        $query = $this->db->get(self::tabla);
        
        $usr = $query->row();
        
		return $usr->ID;
    }
	
    function UpdateRecord($data,$id) {
    	
    	$this->db->set('NOMBRE', $data[0]);
    	$this->db->set('CAMBIO', $data[1]);
		
		$this->db->update(self::tabla, $this, array('ID' => $id));
		
		return $id;
    }
}