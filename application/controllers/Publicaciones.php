<?php
class Publicaciones extends CI_Controller {
	public function index() {
		$header["js"][] = "jquery.placeholder.min";
		$header["js"][] = "publicaciones";
		
		$header['titulo'] = "Publicaciones";
		
		$this->load->model("moneda_md");
		
		$params["monedas"] = $this->moneda_md->GetAll();
		
		$this->load->view('template/header', $header);
		$this->load->view('realizacion/publicacion', $params);
		$this->load->view('template/footer');
	}
}
?>