<?php

class Centro_md extends CI_Model {
	
	const tabla="CENTRO";
	
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
	
    function InsertRecord($data) {
    	
    	$this->db->set('NIVEL_ID', $data[0]);
    	$this->db->set('NOMBRE_COMPLETO', $data[1]);
    	$this->db->set('NOMBRE_CORTO', $data[2]);
    	$this->db->set('NOMBRE_EXTRACORTO', $data[3]);
    	$this->db->set('NOMBRE_DIRECTOR', $data[4]);
    	$this->db->set('GENERO_DIRECTOR', $data[5]);
    	$this->db->set('PUESTO_DIRECTOR', $data[6]);
    	$this->db->set('CIUDAD_DIRECTOR', $data[7]);
    	$this->db->set('ORDEN', $data[8]);
    	$this->db->set('CIUDAD_CENTRO', $data[9]);
    	$this->db->set('CLAVE_UR', $data[10]);
    	$this->db->set('EXTENSION_DIRECTOR', $data[11]);
    	$this->db->set('EMAIL_DIRECTOR', $data[12]);
    	$this->db->set('NOMBRE_GESTOR', $data[13]);
    	$this->db->set('GENERO_GESTOR', $data[14]);
    	$this->db->set('EXTENSION_GESTOR', $data[15]);
    	$this->db->set('EMAIL_GESTOR', $data[16]);
    	//$this->db->set('NACIONALIDAD', $data[18]);
		
        $this->db->insert(self::tabla,$this);
        
        $this->db->select("ID");
        $this->db->where(array("NOMBRE_CORTO"=>$data[2],"NOMBRE_EXTRACORTO"=>$data[3]));
        $query = $this->db->get(self::tabla);
        
        $usr = $query->row();
        
		return $usr->ID;
    }
	
    function UpdateRecord($data,$id) {
    	
    	$this->db->set('NIVEL_ID', $data[0]);
    	$this->db->set('NOMBRE_COMPLETO', $data[1]);
    	$this->db->set('NOMBRE_CORTO', $data[2]);
    	$this->db->set('NOMBRE_EXTRACORTO', $data[3]);
    	$this->db->set('NOMBRE_DIRECTOR', $data[4]);
    	$this->db->set('GENERO_DIRECTOR', $data[5]);
    	$this->db->set('PUESTO_DIRECTOR', $data[6]);
    	$this->db->set('CIUDAD_DIRECTOR', $data[7]);
    	$this->db->set('ORDEN', $data[8]);
    	$this->db->set('CIUDAD_CENTRO', $data[9]);
    	$this->db->set('CLAVE_UR', $data[10]);
    	$this->db->set('EXTENSION_DIRECTOR', $data[11]);
    	$this->db->set('EMAIL_DIRECTOR', $data[12]);
    	$this->db->set('NOMBRE_GESTOR', $data[13]);
    	$this->db->set('GENERO_GESTOR', $data[14]);
    	$this->db->set('EXTENSION_GESTOR', $data[15]);
    	$this->db->set('EMAIL_GESTOR', $data[16]);
		
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