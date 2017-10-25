<?php

class Condicion_folio_md extends CI_Model {
	
	const tabla="CONDICION_FOLIO";
	
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
	
    function GetByCondicion($id) {
		$this->db->where(array('CONDICION_ID'=>$id));
        $query = $this->db->get(self::tabla);
        return $query->result_array();
    }
	
    function InsertRecord($data) {
    	
    	$this->db->set('CONDICION_ID', $data[0]);
    	$this->db->set('REUNION_ANIO', $data[1]);
    	$this->db->set('REUNION_NUMERO', $data[2]);
    	$this->db->set('SOLICITUD_ID', $data[3]);
    	$this->db->set('TIPO_SOLICITUD', $data[4]);
    	$this->db->set('FECHA_CUMPLIMIENTO', "to_date('$data[5]', 'DD/MM/RRRR')",FALSE);
    	$this->db->set('DOCUMENTO_COMPROBATORIO', $data[6]);
    	$this->db->set('FECHA_DOCUMENTO', "to_date('$data[7]', 'DD/MM/RRRR')",FALSE);
		
        $this->db->insert(self::tabla,$this);
        
        $this->db->select("ID");
        $this->db->where(array("CONDICION_ID"=>$data[0],"REUNION_NUMERO"=>$data[2],"SOLICITUD_ID"=>$data[3]));
        $query = $this->db->get(self::tabla);
        
        $usr = $query->row();
        
		return $usr->ID;
    }
	
    function UpdateRecord($data,$id) {
    	
    	$this->db->set('CONDICION_ID', $data[0]);
    	$this->db->set('REUNION_ANIO', $data[1]);
    	$this->db->set('REUNION_NUMERO', $data[2]);
    	$this->db->set('SOLICITUD_ID', $data[3]);
    	$this->db->set('TIPO_SOLICITUD', $data[4]);
    	$this->db->set('FECHA_CUMPLIMIENTO', "to_date('$data[5]', 'DD/MM/RRRR')",FALSE);
    	$this->db->set('DOCUMENTO_COMPROBATORIO', $data[6]);
    	$this->db->set('FECHA_DOCUMENTO', "to_date('$data[7]', 'DD/MM/RRRR')",FALSE);
		
		$this->db->update(self::tabla, $this, array("CONDICION_ID"=>$data[0],"REUNION_NUMERO"=>$data[2],"SOLICITUD_ID"=>$data[3]));
		
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