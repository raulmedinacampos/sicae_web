<?php

class Producto_otro_md extends CI_Model {
	
	const tabla="PRODUCTO_OTRO";
	
	function __construct() {
        // Call the Model constructor
        parent::__construct();
    }
	
	function GetAll() {
        $query = $this->db->get(self::tabla);
        return $query->result();
    }
   
    function GetById($id) {
    	$this->db->where(array('ID'=>$id));
        $query = $this->db->get(self::tabla);
        return $query->row_array();
    }
	
	
    function GetByPersona($id) {
		$this->db->where(array('PERSONA_ID'=>$id));
        $query = $this->db->get(self::tabla);
		return $query->result_array();
    }
	
    function InsertRecord($data) {
    	$this->db->select_max('ID');
    	$query = $this->db->get(self::tabla);
    	$id = $query->row();
    	$id = $id->ID + 1;
    	 
    	$this->db->set('ID', $id);
    	
    	$this->db->set('PERSONA_ID', $data[0]);
    	$this->db->set('DESCRIPCION', $data[1]);
    	$this->db->set('ANIO', $data[2]);
		
        $this->db->insert(self::tabla,$this);
        
		$this->db->select("ID");
        $this->db->where(array("DESCRIPCION"=>$data[1],"PERSONA_ID"=>$data[0]));
        $query = $this->db->get(self::tabla);
        
        $usr = $query->row();
        
		return $usr->ID;
    }
	
    function UpdateRecord($data,$id) {
    	
    	
    	$this->db->set('PERSONA_ID', $data[0]);
    	$this->db->set('DESCRIPCION', $data[1]);
    	$this->db->set('ANIO', $data[2]);
		
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