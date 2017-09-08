<?php
class Login_md extends CI_Model {
	const tabla = "USUARIOS";
	
	public function IsUser($usuario, $password) {
		$query = $this->db->select("IDUSUARIO, NUMEMPLEADO, NOMBREUSUARIO, NOMBRE, APPATERNO, APMATERNO");
		$query = $this->db->where(array("NOMBREUSUARIO"=>$usuario,"PASSWORD"=>$password));
		$query = $this->db->get(self::tabla);
		return $query->row();
	}
	
	public function GetByClave($cve) {
		$this->db->where(array("NOMBREUSUARIO"=>$cve));
		$this->db->get(self::tabla);
		return $query->row();
	}
	
	public function Logout() {
		$cimt = & get_instance();
		$cimt->session->sess_destroy();
		redirect(base_url());
	}
	
	public function ValidateSession() {
		$cimt = & get_instance();
		$cve = $cimt->session->userdata('clave');
		
		if ( $cve == NULL || $cve == "" ) {
			//Incluir validacion de tipo cuando se sepan los que existen
			$this->session->sess_destroy();
			redirect(base_url("login"));
		} else {
			redirect(base_url("principal"));
		}
	}

}