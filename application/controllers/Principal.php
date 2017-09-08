<?php
class Principal extends CI_Controller {
	public function index() {
		$header['css'][] = "nivo-slider";
		
		$header['js'][] = "jquery.nivo.slider";
		$header['js'][] = "bootstrap-show-password.min";
		$header['js'][] = "inicio";
		
		$header['titulo'] = "Inicio";
		
		$this->load->view('template/header', $header);
		$this->load->view('inicio');
		$this->load->view('usuarios/modal_alta');
		$this->load->view('template/footer');
	}
}
?>