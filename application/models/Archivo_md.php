<?php

class Archivo_md extends CI_Model {
	
	const tabla="ARCHIVO";
	
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
        return $query->row_array();
    }
	
    function InsertRecord($data) {
    	
    	$this->db->set('TIPO_DOCUMENTO', $data[0]);
    	$this->db->set('SOLICITUD_ID', $data[1]);
    	$this->db->set('TIPO_SOLICITUD', $data[2]);
    	$this->db->set('ARCHIVO', $data[3]);
    	$this->db->set('FECHA_REGISTRO', "to_date('$data[4]', 'DD/MM/RRRR')",FALSE);
		
        $this->db->insert(self::tabla,$this);
        
        $this->db->select("ID");
        $this->db->where(array("SOLICITUD_ID"=>$data[1],"TIPO_SOLICITUD"=>$data[2],"TIPO_DOCUMENTO"=>$data[0]));
        $query = $this->db->get(self::tabla);
        
        $usr = $query->row();
        
		return $usr->ID;
    }
	
    function UpdateRecord($data,$id) {
    	
    	$this->db->set('TIPO_DOCUMENTO', $data[0]);
    	$this->db->set('SOLICITUD_ID', $data[1]);
    	$this->db->set('TIPO_SOLICITUD', $data[2]);
    	$this->db->set('ARCHIVO', $data[3]);
    	$this->db->set('FECHA_REGISTRO', "to_date('$data[4]', 'DD/MM/RRRR')",FALSE);
		
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