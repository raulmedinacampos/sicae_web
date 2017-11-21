<?php
class Login_md extends CI_Model {
	
	public function IsUser($usuario, $password) {
		$query = $this->db->select("ID, ROL_ID, USERNAME, NOMBRE, APELLIDO_P, APELLIDO_M");
		$query = $this->db->where(array("USERNAME"=>$usuario,"PASSWORD"=>$password));
		$query = $this->db->get('USUARIO');
		return $query->row();
	}
	
	public function IsPerson($usuario, $password) {
		$query = $this->db->select("ID, TIPO_PERSONA_ID, USERNAME, NOMBRE, APELLIDO_P, APELLIDO_M, CURP");
		$query = $this->db->where(array("CURP"=>$usuario,"PASSWORD"=>$password));
		$query = $this->db->get('PERSONA');
		return $query->row();
	}
	
	public function IsOrganizer($usuario, $escuela) {
		$query = $this->db->select("ID, TIPO_PERSONA_ID, NOMBRE, APELLIDO_P, APELLIDO_M, CURP, CENTRO_ADSCRIPCION");
		$query = $this->db->where(array("CURP"=>$usuario,"CENTRO_ADSCRIPCION"=>$escuela,"TIPO_PERSONA_ID"=>2));
		$query = $this->db->get('PERSONA');
		return $query->row();
	}
	
	public function validarUsr($rol) {
		$cimt = & get_instance();
		$ses_rol = $cimt->session->userdata('rol_id');
		
		if($rol!=$sess_rol){
			$this->Logout();
		}
	}
	
	public function validarPersona($tipo_persona) {
		$cimt = & get_instance();
		$tipo_persona = $cimt->session->userdata('tipo_persona');
		
		if($rol!=$sess_rol){
			$this->Logout();
		}
	}
	
	public function Logout() {
		$cimt = & get_instance();
		$cimt->session->sess_destroy();
		redirect(base_url());
	}

}