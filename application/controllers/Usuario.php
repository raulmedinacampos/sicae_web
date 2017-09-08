<?php
class Usuario extends CI_Controller {
	public function index() {
		$header["js"][] = "usuario";
		
		//$params["perfil"] = "p";
		$params["perfil"] = "a";
		
		$params["perfilC"] = ($params["perfil"] == "p") ? "profesor" : "alumno";
		
		$this->load->view('template/header', $header);
		$this->load->view('usuarios/nuevo', $params);
		$this->load->view('template/footer');
	}
}
?>