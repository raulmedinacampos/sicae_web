<?php

class Profesor_md extends CI_Model {
	
	const tabla="PROFESOR";
	
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
    	$this->db->select("PERSONA_ID, NOMBRAMIENTO, EDD, EXCLUSIVIDAD, EDI, SNI");
    	$this->db->select("TO_CHAR(FECHA_INGRESO, 'DD/MM/RRRR') AS FECHA_INGRESO", FALSE);
    	$this->db->select("TO_CHAR(FECHA_BASE, 'DD/MM/RRRR') AS FECHA_BASE", FALSE);
    	$this->db->select("EXCELENCIA, SABATICO, LIC_SUELDO, CATEGORIA, PLAZA, INTERINATO");
    	$this->db->select("TO_CHAR(INICIO_INTERINATO, 'DD/MM/RRRR') AS INICIO_INTERINATO", FALSE);
    	$this->db->select("TO_CHAR(FIN_INTERINATO, 'DD/MM/RRRR') AS FIN_INTERINATO", FALSE);
    	$this->db->select("HORAS, NO_EMPLEADO, SABATICO_ANUAL, PRORROGA");
    	$this->db->select("TO_CHAR(SABATICO_INICIO, 'DD/MM/RRRR') AS SABATICO_INICIO", FALSE);
    	$this->db->select("TO_CHAR(SABATICO_FIN, 'DD/MM/RRRR') AS SABATICO_FIN", FALSE);
    	$this->db->select("TO_CHAR(LIC_SUELDO_INICIO, 'DD/MM/RRRR') AS LIC_SUELDO_INICIO", FALSE);
    	$this->db->select("TO_CHAR(LIC_SUELDO_FIN, 'DD/MM/RRRR') AS LIC_SUELDO_FIN", FALSE);
    	$this->db->select("TO_CHAR(PRORROGA_INICIO, 'DD/MM/RRRR') AS PRORROGA_INICIO", FALSE);
    	$this->db->select("TO_CHAR(PRORROGA_FIN, 'DD/MM/RRRR') AS PRORROGA_FIN", FALSE);
    	$this->db->select("CARGA_ACADEMICA, DIRECCIONES_TESIS, NIVEL_ACADEMICO");
    	$this->db->where(array('PERSONA_ID'=>$id));
        $query = $this->db->get(self::tabla);
        return $query->row_array();
    }
	
    function InsertRecord($data) {
    	
    	$this->db->set('PERSONA_ID', $data[0]);
		if($data[1]!=NULL&&$data[1]!="")
			$this->db->set('NOMBRAMIENTO', $data[1]);
		if($data[2]!=NULL&&$data[2]!="")
			$this->db->set('EDD', $data[2]);
    	if($data[3]!=NULL&&$data[3]!="")
			$this->db->set('EXCLUSIVIDAD', $data[3]);
    	if($data[4]!=NULL&&$data[5]!="")
			$this->db->set('EDI', $data[4]);
    	if($data[5]!=NULL&&$data[5]!="")
			$this->db->set('SNI', $data[5]);
    	if($data[6]!=NULL&&$data[6]!="")
			$this->db->set('FECHA_INGRESO',"to_date('$data[6]', 'DD/MM/RRRR')",FALSE);
    	if($data[7]!=NULL&&$data[7]!="")
			$this->db->set('FECHA_BASE', "to_date('$data[7]', 'DD/MM/RRRR')",FALSE);
    	if($data[8]!=NULL&&$data[8]!="")
			$this->db->set('EXCELENCIA', $data[8]);
    	if($data[9]!=NULL&&$data[9]!="")
			$this->db->set('SABATICO', $data[9]);
    	if($data[10]!=NULL&&$data[10]!="")
			$this->db->set('LIC_SUELDO', $data[10]);
    	if($data[11]!=NULL&&$data[11]!="")
			$this->db->set('CATEGORIA', $data[11]);
    	if($data[12]!=NULL&&$data[12]!="")
			$this->db->set('PLAZA', $data[12]);
    	if($data[13]!=NULL&&$data[13]!="")
			$this->db->set('INTERINATO', $data[13]);
    	if($data[14]!=NULL&&$data[14]!="")
			$this->db->set('INICIO_INTERINATO',"to_date('$data[14]', 'DD/MM/RRRR')",FALSE);
    	if($data[15]!=NULL&&$data[15]!="")
			$this->db->set('FIN_INTERINATO', "to_date('$data[15]', 'DD/MM/RRRR')",FALSE);
    	if($data[16]!=NULL&&$data[16]!="")
			$this->db->set('HORAS', $data[16]);
    	if($data[17]!=NULL&&$data[17]!="")
			$this->db->set('NO_EMPLEADO', $data[17]);
    	if($data[18]!=NULL&&$data[18]!="")
			$this->db->set('SABATICO_ANUAL', $data[18]);
    	if($data[19]!=NULL&&$data[19]!="")
			$this->db->set('SABATICO_INICIO',"to_date('$data[19]', 'DD/MM/RRRR')",FALSE);
    	if($data[20]!=NULL&&$data[20]!="")
			$this->db->set('SABATICO_FIN', "to_date('$data[20]', 'DD/MM/RRRR')",FALSE);
    	if($data[21]!=NULL&&$data[21]!="")
			$this->db->set('LIC_SUELDO_INICIO',"to_date('$data[21]', 'DD/MM/RRRR')",FALSE);
    	if($data[22]!=NULL&&$data[22]!="")
			$this->db->set('LIC_SUELDO_FIN', "to_date('$data[22]', 'DD/MM/RRRR')",FALSE);
    	if($data[23]!=NULL&&$data[23]!="")
			$this->db->set('PRORROGA', $data[23]);
    	if($data[24]!=NULL&&$data[24]!="")
			$this->db->set('PRORROGA_INICIO',"to_date('$data[24]', 'DD/MM/RRRR')",FALSE);
    	if($data[25]!=NULL&&$data[25]!="")
			$this->db->set('PRORROGA_FIN', "to_date('$data[25]', 'DD/MM/RRRR')",FALSE);
    	if($data[26]!=NULL&&$data[26]!="")
			$this->db->set('CARGA_ACADEMICA', $data[26]);
    	if($data[27]!=NULL&&$data[27]!="")
			$this->db->set('DIRECCIONES_TESIS', $data[27]);
    	if($data[28]!=NULL&&$data[28]!="")
			$this->db->set('NIVEL_ACADEMICO', $data[28]);
		
        $this->db->insert(self::tabla,$this);
        
		return $data[0];
    }
	
    function UpdateRecord($data,$id) {
		
		if($data[1]!=NULL&&$data[1]!="")
			$this->db->set('NOMBRAMIENTO', $data[1]);
		if($data[2]!=NULL&&$data[2]!="")
			$this->db->set('EDD', $data[2]);
    	if($data[3]!=NULL&&$data[3]!="")
			$this->db->set('EXCLUSIVIDAD', $data[3]);
    	if($data[4]!=NULL&&$data[5]!="")
			$this->db->set('EDI', $data[4]);
    	if($data[5]!=NULL&&$data[5]!="")
			$this->db->set('SNI', $data[5]);
    	if($data[6]!=NULL&&$data[6]!="")
			$this->db->set('FECHA_INGRESO',"to_date('$data[6]', 'DD/MM/RRRR')",FALSE);
    	if($data[7]!=NULL&&$data[7]!="")
			$this->db->set('FECHA_BASE', "to_date('$data[7]', 'DD/MM/RRRR')",FALSE);
    	if($data[8]!=NULL&&$data[8]!="")
			$this->db->set('EXCELENCIA', $data[8]);
    	if($data[9]!=NULL&&$data[9]!="")
			$this->db->set('SABATICO', $data[9]);
    	if($data[10]!=NULL&&$data[10]!="")
			$this->db->set('LIC_SUELDO', $data[10]);
    	if($data[11]!=NULL&&$data[11]!="")
			$this->db->set('CATEGORIA', $data[11]);
    	if($data[12]!=NULL&&$data[12]!="")
			$this->db->set('PLAZA', $data[12]);
    	if($data[13]!=NULL&&$data[13]!="")
			$this->db->set('INTERINATO', $data[13]);
    	if($data[14]!=NULL&&$data[14]!="")
			$this->db->set('INICIO_INTERINATO',"to_date('$data[14]', 'DD/MM/RRRR')",FALSE);
    	if($data[15]!=NULL&&$data[15]!="")
			$this->db->set('FIN_INTERINATO', "to_date('$data[15]', 'DD/MM/RRRR')",FALSE);
    	if($data[16]!=NULL&&$data[16]!="")
			$this->db->set('HORAS', $data[16]);
    	if($data[17]!=NULL&&$data[17]!="")
			$this->db->set('NO_EMPLEADO', $data[17]);
    	if($data[18]!=NULL&&$data[18]!="")
			$this->db->set('SABATICO_ANUAL', $data[18]);
    	if($data[19]!=NULL&&$data[19]!="")
			$this->db->set('SABATICO_INICIO',"to_date('$data[19]', 'DD/MM/RRRR')",FALSE);
    	if($data[20]!=NULL&&$data[20]!="")
			$this->db->set('SABATICO_FIN', "to_date('$data[20]', 'DD/MM/RRRR')",FALSE);
    	if($data[21]!=NULL&&$data[21]!="")
			$this->db->set('LIC_SUELDO_INICIO',"to_date('$data[21]', 'DD/MM/RRRR')",FALSE);
    	if($data[22]!=NULL&&$data[22]!="")
			$this->db->set('LIC_SUELDO_FIN', "to_date('$data[22]', 'DD/MM/RRRR')",FALSE);
    	if($data[23]!=NULL&&$data[23]!="")
			$this->db->set('PRORROGA', $data[23]);
    	if($data[24]!=NULL&&$data[24]!="")
			$this->db->set('PRORROGA_INICIO',"to_date('$data[24]', 'DD/MM/RRRR')",FALSE);
    	if($data[25]!=NULL&&$data[25]!="")
			$this->db->set('PRORROGA_FIN', "to_date('$data[25]', 'DD/MM/RRRR')",FALSE);
    	if($data[26]!=NULL&&$data[26]!="")
			$this->db->set('CARGA_ACADEMICA', $data[26]);
    	if($data[27]!=NULL&&$data[27]!="")
			$this->db->set('DIRECCIONES_TESIS', $data[27]);
    	if($data[28]!=NULL&&$data[28]!="")
			$this->db->set('NIVEL_ACADEMICO', $data[28]);
		
		
		$this->db->update(self::tabla, $this, array('PERSONA_ID' => $id));
		
		return $id;
    }
	
	function SetDatos($data){
		$pr=$this->GetById($data[0]);
		if(count($pr)<1)
			$this->InsertRecord($data);
		else
			$this->UpdateRecord($data,$data[0]);
		
	}
	
	
	function SetDirecciones($total,$id) {
		$this->db->set('DIRECCIONES_TESIS', $total);
		
		$this->db->update(self::tabla, $this, array('PERSONA_ID'=>$id));
		
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