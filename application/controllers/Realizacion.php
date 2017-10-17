<?php
class Realizacion extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('persona_md');
	}
	
	public function index() {
		$header["js"][] = "coordinador";
		
		$header['titulo'] = "Realización";
		
		$perfil = $this->session->rol;
		$params["perfil"] = $perfil;
		
		$this->load->model("tipo_evento_md");
		$this->load->model("escuela_md");
		
		$params["escuelas"] = $this->escuela_md->GetAll();
		$params["tipos_evento"] = $this->tipo_evento_md->GetAll();
		
		if ( $this->session->rol ) {
			$params["persona"] = $this->persona_md->GetById($this->session->id);
			$this->load->helper("telefono");
			$telefono = SepareteLada($params["persona"]["TELEFONO"]);
			list($params["persona"]["LADA"], $params["persona"]["TELEFONO"]) = $telefono;
		}
		
		$this->load->view('template/header', $header);
		$this->load->view('realizacion/realizacion', $params);
		$this->load->view('template/footer');
	}
}
?>