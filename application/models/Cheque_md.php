<?php

class Cheque_md extends CI_Model {
	
	const tabla="CHEQUE";
	
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
	
	function GetByUsuario($id) {
		$this->db->where(array('USUARIO_ID'=>$id));
        $query = $this->db->get(self::tabla);
        return $query->result_array();
    }
	
	function GetBySolicitud($id) {
		$this->db->where(array('SOLICITUD_ID'=>$id));
        $query = $this->db->get(self::tabla);
        return $query->result_array();
    }
	
    function InsertRecord($data) {
    	
    	$this->db->set('SOLICITUD_ID', $data[0]);
    	$this->db->set('TIPO_SOLICITUD', $data[1]);
    	$this->db->set('NUMERO', $data[2]);
    	$this->db->set('FECHA', "to_date('$data[3]', 'DD/MM/RRRR')",FALSE);
    	$this->db->set('IMPORTE', $data[4]);
    	$this->db->set('USUARIO_ID', $data[5]);
		
        $this->db->insert(self::tabla,$this);
        
        $this->db->select("ID");
        $this->db->where(array("NUMERO"=>$data[2],"USUARIO_ID"=>$data[5]));
        $query = $this->db->get(self::tabla);
        
        $usr = $query->row();
        
		return $usr->ID;
    }
	
    function UpdateRecord($data,$id) {
    	
    	$this->db->set('SOLICITUD_ID', $data[0]);
    	$this->db->set('TIPO_SOLICITUD', $data[1]);
    	$this->db->set('NUMERO', $data[2]);
    	$this->db->set('FECHA', "to_date('$data[3]', 'DD/MM/RRRR')",FALSE);
    	$this->db->set('IMPORTE', $data[4]);
    	$this->db->set('USUARIO_ID', $data[5]);
		
		$this->db->update(self::tabla, $this, array('IDUSUARIO' => $id));
		
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