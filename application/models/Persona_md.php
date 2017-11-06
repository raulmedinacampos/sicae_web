<?php

class Persona_md extends CI_Model {
	
	const tabla="PERSONA";
	
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
    	$this->db->select("ID, CENTRO_ADSCRIPCION, TIPO_PERSONA_ID, USERNAME, NOMBRE, APELLIDO_P, APELLIDO_M");
    	$this->db->select("TO_CHAR(FECHA_NACIMIENTO, 'DD/MM/RRRR') AS FECHA_NACIMIENTO", FALSE);
    	$this->db->select("EMAIL, RFC, CURP, GENERO, TELEFONO, EXTENSION, NACIONALIDAD");
    	$this->db->select("BANCO_NOMBRE, BANCO_SUCURSAL, BANCO_CUENTA, BANCO_CLABE");
		$this->db->where(array('ID'=>$id));
        $query = $this->db->get(self::tabla);
        return $query->row_array();
    }
	
    function InsertRecord($data) {
    	
    	$this->db->set('CENTRO_ADSCRIPCION', $data[0]);
    	$this->db->set('TIPO_PERSONA_ID', $data[1]);
    	$this->db->set('USERNAME', $data[2]);
    	$this->db->set('PASSWORD', $data[3]);
    	$this->db->set('NOMBRE', $data[4]);
    	$this->db->set('APELLIDO_P', $data[5]);
    	$this->db->set('APELLIDO_M', $data[6]);
    	$this->db->set('FECHA_NACIMIENTO', "to_date('$data[7]', 'DD/MM/RRRR')",FALSE);
    	$this->db->set('EMAIL', $data[8]);
    	$this->db->set('RFC', $data[9]);
    	$this->db->set('CURP', $data[10]);
    	$this->db->set('GENERO', $data[11]);
    	$this->db->set('TELEFONO', $data[12]);
    	$this->db->set('EXTENSION', $data[13]);
    	$this->db->set('BANCO_NOMBRE', $data[14]);
    	$this->db->set('BANCO_SUCURSAL', $data[15]);
    	$this->db->set('BANCO_CUENTA', $data[16]);
    	$this->db->set('BANCO_CLABE', $data[17]);
    	//$this->db->set('NACIONALIDAD', $data[18]);
		
        $this->db->insert(self::tabla,$this);
        
        $this->db->select("ID");
        $this->db->where("EMAIL", $data[8]);
        $query = $this->db->get(self::tabla);
        
        $usr = $query->row();
        
		return $usr->ID;
    }
	
    function UpdateRecord($data,$id) {
    	
    
    	$this->db->set('CENTRO_ADSCRIPCION', $data[0]);
    	$this->db->set('TIPO_PERSONA_ID', $data[1]);
    	$this->db->set('USERNAME', $data[2]);
    	
    	if ( $data[3] ) {
    		$this->db->set('PASSWORD', $data[3]);
    	}
    	
    	$this->db->set('NOMBRE', $data[4]);
    	$this->db->set('APELLIDO_P', $data[5]);
    	$this->db->set('APELLIDO_M', $data[6]);
    	$this->db->set('FECHA_NACIMIENTO', "to_date('$data[7]', 'DD/MM/RRRR')",FALSE);
    	$this->db->set('EMAIL', $data[8]);
    	$this->db->set('RFC', $data[9]);
    	$this->db->set('CURP', $data[10]);
    	$this->db->set('GENERO', $data[11]);
    	$this->db->set('TELEFONO', $data[12]);
    	$this->db->set('EXTENSION', $data[13]);
    	$this->db->set('BANCO_NOMBRE', $data[14]);
    	$this->db->set('BANCO_SUCURSAL', $data[15]);
    	$this->db->set('BANCO_CUENTA', $data[16]);
    	$this->db->set('BANCO_CLABE', $data[17]);
    	$this->db->set('NACIONALIDAD', $data[18]);
		
		$this->db->update(self::tabla, $this, array('ID' => $id));
		
		return $id;
    }
	
    function SetCuentaBancaria($data,$id) {
    	
    	$this->db->set('BANCO_NOMBRE', $data[0]);
    	$this->db->set('BANCO_SUCURSAL', $data[1]);
    	$this->db->set('BANCO_CUENTA', $data[2]);
    	$this->db->set('BANCO_CLABE', $data[3]);
		
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