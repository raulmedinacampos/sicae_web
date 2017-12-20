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
    	
    	if ( $this->session->rol == 1 || $this->session->rol == 3 ) {
    		$this->db->where("TIPO_SOLICITUD", "A");
    	}
    	
    	if ( $this->session->rol == 2 ) {
    		$this->db->where("TIPO_SOLICITUD", "R");
    	}
    	
        $query = $this->db->get(self::tabla);
        return $query->result_array();
    }
	
    function InsertRecord($data) {
    	$this->db->set('ID', $data[0]);
    	$this->db->set('SOLICITUD_ID', $data[1]);
    	$this->db->set('TIPO_SOLICITUD', $data[2]);
    	$this->db->set('NOMBRE', $data[3]);
		
        $this->db->insert(self::tabla,$this);
		
		$this->db->select("ID");
        $this->db->where(array("SOLICITUD_ID"=>$data[1],"NOMBRE"=>$data[3]));
        $query = $this->db->get(self::tabla);
        
        $usr = $query->row();
        
		return $usr->ID;
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