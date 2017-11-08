<?php
class Historial extends CI_Controller {
	public function index() {
		$header["js"][] = "jquery.dataTables.min";
		$header["js"][] = "historial";
		
		$header["titulo"] = "Historial de asistencia";
		
		$this->load->model("solicitud_md");
		$params["solicitudes"] = $this->solicitud_md->GetByPerson($this->session->id);
		
		$this->load->view('template/header', $header);
		$this->load->view('historial/listado', $params);
		$this->load->view('template/footer');
	}
}
?>