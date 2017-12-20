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
		
		$this->load->model("homoclave_md");
		$this->load->model("solicitud_md");
		
		$params["homoclaves"] = $this->homoclave_md->GetAll();
		$params["solicitudes"] = $this->solicitud_md->GetHistoryByPerson($this->session->id);
		
		if ( $this->session->rol == 1 || $this->session->rol == 3 ) {
			$params["tipo"] = "asistencia";
		}
		
		if ( $this->session->rol == 2 ) {
			$params["tipo"] = "realización";
		}
		
		$this->load->view('template/header', $header);
		$this->load->view('historial/listado', $params);
		$this->load->view('template/footer');
	}
}
?>