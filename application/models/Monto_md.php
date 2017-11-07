<?php

class Monto_md extends CI_Model {
	
	const tabla="MONTO";
	
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
    
    function GetByTypeReq($tipo, $id) {
    	$this->db->where(array('TIPO_MONTO_ID'=>$tipo, 'SOLICITUD_ID'=>$id));
    	$query = $this->db->get(self::tabla);
    	return $query->row_array();
    }
	
    function InsertRecord($data) {
    	
    	$this->db->set('TIPO_MONTO_ID', $data[0]);
    	$this->db->set('SOLICITUD_ID', $data[1]);
    	$this->db->set('TIPO_SOLICITUD', $data[2]);
    	$this->db->set('SOLICITADO', $data[3]);
    	$this->db->set('CALCULADO', $data[4]);
    	$this->db->set('JUSTIFICACION', $data[5]);
    	$this->db->set('S_MONEDA_ID', $data[6]);
    	$this->db->set('C_MONEDA_ID', $data[7]);
		
        $this->db->insert(self::tabla,$this);
    }
    
    function CleanAmount($id) {
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