<?php
class Ponencia extends CI_Controller {
	public function index() {
		$header["js"][] = "jquery.placeholder.min";
		$header["js"][] = "ponencia";
		
		$header["titulo"] = "Ponencia";
		
		$this->load->view('template/header', $header);
		$this->load->view('ponencia/nueva');
		$this->load->view('template/footer');
	}
}
?>