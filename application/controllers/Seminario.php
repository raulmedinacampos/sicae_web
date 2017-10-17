<?php
class Seminario extends CI_Controller {
	public function index() {
		$header["js"][] = "seminario";
		
		$header["titulo"] = "Seminarios y otros";
		
		$this->load->model("tipo_evento_md");
		$this->load->model("moneda_md");
		
		$params["tipos_evento"] = $this->tipo_evento_md->GetAll();
		$params["monedas"] = $this->moneda_md->GetAll();
		
		$this->load->view('template/header', $header);
		$this->load->view('realizacion/seminario', $params);
		$this->load->view('template/footer');
	}
}