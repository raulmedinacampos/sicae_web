<?php
class Historial extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('login_md');
		$this->login_md->validarSesAct();
	}
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