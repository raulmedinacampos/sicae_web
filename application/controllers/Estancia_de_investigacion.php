<?php
class Estancia_de_investigacion extends CI_Controller {
	public function index() {
		$header["js"][] = "estancia";
		
		$header["titulo"] = "Estancia de investigación";
		
		$this->load->model("moneda_md");
		
		$params["monedas"] = $this->moneda_md->GetAll();
		
		$this->load->view('template/header', $header);
		$this->load->view('realizacion/estancia', $params);
		$this->load->view('template/footer');
	}
}