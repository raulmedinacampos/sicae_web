<?php
class Obtencion_de_grado extends CI_Controller {
	public function index() {
		$header["js"][] = "grado";
		
		$header['titulo'] = "Obtención de grado";
		
		$perfil = $this->session->rol;
		$params["perfil"] = $perfil;
		
		$this->load->model("moneda_md");
		
		$params["monedas"] = $this->moneda_md->GetAll();
		
		$this->load->view('template/header', $header);
		$this->load->view('realizacion/grado', $params);
		$this->load->view('template/footer');
	}
}
?>