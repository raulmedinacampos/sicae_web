<?php

class Apoyo_md extends CI_Model {
	
	const tabla="APOYO_OTRO";
	
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
    	$this->db->where(array('SOLICITUD_ID'=>$id));
        $query = $this->db->get(self::tabla);
        return $query->row_array();
    }
    
    function GetBySolicitud($id) {
    	$this->db->where(array('SOLICITUD_ID'=>$id));
    	$query = $this->db->get(self::tabla);
    	return $query->row_array();
    }
	
    function InsertRecord($data) {
    	
    	$this->db->set('SOLICITUD_ID', $data[0]);
    	$this->db->set('TIPO_SOLICITUD', $data[1]);
    	$this->db->set('MONEDA_ID', $data[2]);
    	$this->db->set('INSTITUCION', $data[3]);
    	$this->db->set('MONTO', $data[4]);
    	$this->db->set('ESPECIFICACION', $data[5]);
		
        $this->db->insert(self::tabla,$this);
        
		return $data[0];
    }
	
    function UpdateRecord($data,$id) {
    	
    	$this->db->set('TIPO_SOLICITUD', $data[0]);
    	$this->db->set('MONEDA_ID', $data[1]);
    	$this->db->set('INSTITUCION', $data[2]);
    	$this->db->set('MONTO', $data[3]);
    	$this->db->set('ESPECIFICACION', $data[4]);
		
		$this->db->update(self::tabla, $this, array('SOLICITUD_ID' => $id));
		
		return $id;
    }
    
    function CleanSupport($id) {
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