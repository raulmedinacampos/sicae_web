<?php

class Expositor_md extends CI_Model {
	
	const tabla="EXPOSITOR";
	
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
	
    function GetByPonencia($id) {
		$this->db->where(array('PONENCIA_ID'=>$id));
        $query = $this->db->get(self::tabla);
        return $query->result_array();
    }
	
    function GetByPersona($id) {
		$this->db->where(array('PERSONA_ID'=>$id));
        $query = $this->db->get(self::tabla);
    }
	
    function InsertRecord($data) {
    	$this->db->select_max('ID');
    	$query = $this->db->get(self::tabla);
    	$id = $query->row();
    	$id = $id->ID + 1;
    	
    	$this->db->set('ID', $id);
    	$this->db->set('SOLICITUD_ID', $data[0]);
    	$this->db->set('TIPO_SOLICITUD', $data[1]);
    	$this->db->set('PERSONA_ID', $data[2]);
    	$this->db->set('NOMBRE', $data[3]);
    	$this->db->set('APELLIDO_P', $data[4]);
    	$this->db->set('APELLIDO_M', $data[5]);
		$this->db->set('PROCEDENCIA', $data[6]);
		$this->db->set('DEDICACION', $data[7]);
		$this->db->set('LICENCIATURA', $data[8]);
		$this->db->set('MAESTRIA', $data[9]);
		$this->db->set('DOCTORADO', $data[10]);
		$this->db->set('ESPECIALIDAD', $data[11]);
		$this->db->set('TEMA', $data[12]);
		$this->db->set('ACTIVIDAD', $data[13]);
		$this->db->set('HORARIO', $data[14]);
		
        $this->db->insert(self::tabla,$this);
        
		$this->db->select("ID");
        $this->db->where(array("SOLICITUD_ID"=>$data[0],"NOMBRE"=>$data[3],"APELLIDO_P"=>$data[4],"TEMA"=>$data[12]));
        $query = $this->db->get(self::tabla);
        
        $usr = $query->row();
        
		return $usr->ID;
    }
	
    function UpdateRecord($data,$id) {
    	
    	$this->db->set('SOLICITUD_ID', $data[0]);
    	$this->db->set('TIPO_SOLICITUD', $data[1]);
    	$this->db->set('PERSONA_ID', $data[2]);
    	$this->db->set('NOMBRE', $data[3]);
    	$this->db->set('APELLIDO_P', $data[4]);
    	$this->db->set('APELLIDO_M', $data[5]);
		$this->db->set('PROCEDENCIA', $data[6]);
		$this->db->set('DEDICACION', $data[7]);
		$this->db->set('LICENCIATURA', $data[8]);
		$this->db->set('MAESTRIA', $data[9]);
		$this->db->set('DOCTORADO', $data[10]);
		$this->db->set('ESPECIALIDAD', $data[11]);
		$this->db->set('TEMA', $data[12]);
		$this->db->set('ACTIVIDAD', $data[13]);
		$this->db->set('HORARIO', $data[14]);
		
		$this->db->update(self::tabla, $this, array('ID' => $id));
		
		return $id;
    }
    
    function CleanSol($sol) {
    	$this->db->where(array('SOLICITUD_ID'=>$sol));
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