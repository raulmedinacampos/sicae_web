<?php
class Coordinador extends CI_Controller {
	public function index() {
		$header["js"][] = "coordinador";
		
		$this->load->view('template/header', $header);
		$this->load->view('coordinador/nuevo');
		$this->load->view('template/footer');
	}
}
?>