<?php

class Proyecto_md extends CI_Model {
	
	const tabla="PROYECTO";
	
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
	
    function GetByPersona($id) {
    	$this->db->select("p.*, tp.DESCRIPCION");
    	$this->db->from(self::tabla." p");
    	$this->db->join("TIPO_PARTICIPACION tp", "tp.ID = p.PARTICIPACION_ID", "left");
    	$this->db->where(array('PERSONA_ID'=>$id));
        $query = $this->db->get();
        return $query->result_array();
    }
	
    function InsertRecord($data) {
    	$this->db->select_max('ID');
    	$query = $this->db->get(self::tabla);
    	$id = $query->row();
    	$id = $id->ID + 1;
    	 
    	$this->db->set('ID', $id);
    	$this->db->set('PERSONA_ID', $data[0]);
    	$this->db->set('PARTICIPACION_ID', $data[1]);
    	//$this->db->set('NOMBRE', $data[2]);
    	$this->db->set('NOMBRE', ".");
    	$this->db->set('REGISTRO', $data[3]);
		$this->db->set('TIPO', $data[4]);
		
		if ( $data[4] == "Otros" ) {
			$this->db->set('TIPO', substr($data[2], 0, 20));
		}
		
        $this->db->insert(self::tabla,$this);
		
		$this->db->select("ID");
        $this->db->where(array("PERSONA_ID"=>$data[0],"PARTICIPACION_ID"=>$data[1]));
        $query = $this->db->get(self::tabla);
        
        $usr = $query->row();
        
		return $usr->ID;
    
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