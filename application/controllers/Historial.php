<?php
class Historial extends CI_Controller {
	public function index() {
		$header["js"][] = "jquery.dataTables.min";
		$header["js"][] = "historial";
		
		$header["titulo"] = "Historial de asistencia";
		
		$this->load->view('template/header', $header);
		$this->load->view('historial/listado');
		$this->load->view('template/footer');
	}
}
?>