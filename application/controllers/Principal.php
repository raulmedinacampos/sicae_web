<?php
class Principal extends CI_Controller {
	public function index() {
		if( $this->session->rol ) {
			if ( $this->session->rol == 1 || $this->session->rol == 3 ) {
				redirect(base_url("usuario"));
			}
			
			if ( $this->session->rol == 2 ) {
				redirect(base_url("coordinador"));
			}
		} else {
			$this->inicio();
		}
	}
	
	public function inicio() {
		$header['js'][] = "bootstrap-show-password.min";
		$header['js'][] = "inicio";
		
		if ( $this->session->flashdata('error') ) {
			$header["js"][] = "login_error";
		}
	
		$header['titulo'] = "Inicio";
	
		$this->load->model("escuela_md");
	
		$params["escuelas"] = $this->escuela_md->GetAll();
	
		$this->load->view('template/header', $header);
		$this->load->view('inicio', $params);
		$this->load->view('usuarios/modal_alta');
		$this->load->view('coordinador/modal_alta');
		$this->load->view('template/footer');
	}
}
?>