<?php

class Comprobante_md extends CI_Model {
	
	const tabla="COMPROBANTE";
	
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
    	
    	$this->db->set('SOLICITUD_ID', $data[0]);
    	$this->db->set('TIPO_SOLICITUD', $data[1]);
    	$this->db->set('FOLIO_GLOSA', $data[2]);
    	$this->db->set('IMPORTE', $data[3]);
    	$this->db->set('FECHA_GLOSA', "to_date('$data[4]', 'DD/MM/RRRR')",FALSE);
    	$this->db->set('OFICIO_COMPROBACION', $data[5]);
    	$this->db->set('FECHA_OFICIO', "to_date('$data[6]', 'DD/MM/RRRR')",FALSE);
    	$this->db->set('USUARIO_ID', $data[7]);
    	$this->db->set('OBSERVACION', $data[8]);
		
        $this->db->insert(self::tabla,$this);
        
        $this->db->select("ID");
        $this->db->where(array("SOLICITUD_ID"=>$data[0],"TIPO_SOLICITUD"=>$data[1],"USUARIO_ID"=>$data[7]));
        $query = $this->db->get(self::tabla);
        
        $usr = $query->row();
        
		return $usr->ID;
    }
	
    function UpdateRecord($data,$id) {
    	
    	$this->db->set('SOLICITUD_ID', $data[0]);
    	$this->db->set('TIPO_SOLICITUD', $data[1]);
    	$this->db->set('FOLIO_GLOSA', $data[2]);
    	$this->db->set('IMPORTE', $data[3]);
    	$this->db->set('FECHA_GLOSA', "to_date('$data[4]', 'DD/MM/RRRR')",FALSE);
    	$this->db->set('OFICIO_COMPROBACION', $data[5]);
    	$this->db->set('FECHA_OFICIO', "to_date('$data[6]', 'DD/MM/RRRR')",FALSE);
    	$this->db->set('USUARIO_ID', $data[7]);
    	$this->db->set('OBSERVACION', $data[8]);
		
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