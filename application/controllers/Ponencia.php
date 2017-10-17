<?php
class Ponencia extends CI_Controller {
	public function index() {
		$header["js"][] = "jquery.placeholder.min";
		$header["js"][] = "ponencia";
		
		$header["titulo"] = "Ponencia";
		
		$this->load->model("moneda_md");
		
		$params["monedas"] = $this->moneda_md->GetAll();
		
		$this->load->view('template/header', $header);
		$this->load->view('realizacion/ponencia', $params);
		$this->load->view('template/footer');
	}
}
?>