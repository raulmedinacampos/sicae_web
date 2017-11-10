<?php

class Ponencia_md extends CI_Model {
	
	const tabla="PONENCIA";
	
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
	
    function InsertRecord($data) {
    	$this->db->select_max('ID');
    	$query = $this->db->get(self::tabla);
    	$id = $query->row();
    	$id = $id->ID + 1;
    	
    	$this->db->set('ID', $id);
    	$this->db->set('SOLICITUD_ID', $data[0]);
    	$this->db->set('TIPO_SOLICITUD', $data[1]);
    	$this->db->set('NOMBRE', $data[2]);
		
        $this->db->insert(self::tabla,$this);
		
		$this->db->select("ID");
        $this->db->where(array("SOLICITUD_ID"=>$data[0],"NOMBRE"=>$data[2]));
        $query = $this->db->get(self::tabla);
        
        $usr = $query->row();
        
		return $usr->ID;
    
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