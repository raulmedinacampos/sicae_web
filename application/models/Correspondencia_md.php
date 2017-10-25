<?php

class Correspondencia_md extends CI_Model {
	
	const tabla="CORRESPONDENCIA";
	
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
	
    function GetByUsuario($id) {
		$this->db->where(array('USUARIO_ID'=>$id));
        $query = $this->db->get(self::tabla);
        return $query->result_array();
    }
	
    function InsertRecord($data) {
    	
    	$this->db->set('MEDIO', $data[0]);
    	$this->db->set('CORR_ANIO', $data[1]);
    	$this->db->set('CORR_CONSECUTIVO', $data[2]);
    	$this->db->set('CORR_FECHA_RECIBIDO', "to_date('$data[3]', 'DD/MM/RRRR')",FALSE);
    	$this->db->set('CORR_OFICIO_ECUD', $data[4]);
    	$this->db->set('CORR_ECUD', $data[5]);
    	$this->db->set('CORR_ASUNTO', $data[6]);
    	$this->db->set('TIPO_OFICIO', $data[7]);
    	$this->db->set('SOLICITUD_ID', $data[8]);
    	$this->db->set('SOLICITUD_TIPO', $data[9]);
    	$this->db->set('ANIO_ASIGNADO', $data[10]);
    	$this->db->set('REUNION_ASIGNADA', $data[11]);
    	$this->db->set('PROCEDE_REC', $data[12]);
    	$this->db->set('TIPO_GLOSA', $data[13]);
    	$this->db->set('OTROS_DESCRIPCION', $data[14]);
    	$this->db->set('USUARIO_ID', $data[15]);
    	$this->db->set('F_CONSECUTIVO', $data[16]);
    	$this->db->set('F_REUNION_ANIO', $data[17]);
		
        $this->db->insert(self::tabla,$this);
        
        $this->db->select("ID");
        $this->db->where(array("CORR_CONSECUTIVO"=>$data[2],"SOLICITUD_ID"=>$data[8],"USUARIO_ID"=>$data[15]));
        $query = $this->db->get(self::tabla);
        
        $usr = $query->row();
        
		return $usr->ID;
    }
	
    function UpdateRecord($data,$id) {
    	
    	$this->db->set('MEDIO', $data[0]);
    	$this->db->set('CORR_ANIO', $data[1]);
    	$this->db->set('CORR_CONSECUTIVO', $data[2]);
    	$this->db->set('CORR_FECHA_RECIBIDO', "to_date('$data[3]', 'DD/MM/RRRR')",FALSE);
    	$this->db->set('CORR_OFICIO_ECUD', $data[4]);
    	$this->db->set('CORR_ECUD', $data[5]);
    	$this->db->set('CORR_ASUNTO', $data[6]);
    	$this->db->set('TIPO_OFICIO', $data[7]);
    	$this->db->set('SOLICITUD_ID', $data[8]);
    	$this->db->set('SOLICITUD_TIPO', $data[9]);
    	$this->db->set('ANIO_ASIGNADO', $data[10]);
    	$this->db->set('REUNION_ASIGNADA', $data[11]);
    	$this->db->set('PROCEDE_REC', $data[12]);
    	$this->db->set('TIPO_GLOSA', $data[13]);
    	$this->db->set('OTROS_DESCRIPCION', $data[14]);
    	$this->db->set('USUARIO_ID', $data[15]);
    	$this->db->set('F_CONSECUTIVO', $data[16]);
    	$this->db->set('F_REUNION_ANIO', $data[17]);
		
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