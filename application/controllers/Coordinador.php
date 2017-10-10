<?php
class Coordinador extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('persona_md');
	}
	
	public function index() {
		$header["js"][] = "coordinador";
		
		$header['titulo'] = "Coordinador";
		
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
		$this->load->view('coordinador/nuevo', $params);
		$this->load->view('template/footer');
	}
	
	public function consultar() {
		$id = $this->input->post("id");
		$area = $this->persona_md->GetById($id);
		echo json_encode($area);
	}
	
	public function agregar() {
		$data=array();
		
		array_push($data,$this->input->post('escuela'));
		array_push($data,2);
		array_push($data,$this->input->post('curp'));//username
		array_push($data,$this->input->post('password'));
		array_push($data,$this->input->post('nombre'));
		array_push($data,$this->input->post('apPatermo'));
		array_push($data,$this->input->post('apMaterno'));
		array_push($data,$this->input->post('fechaNac'));
		array_push($data,$this->input->post('email'));
		array_push($data,$this->input->post('rfc'));
		array_push($data,$this->input->post('curp'));
		array_push($data,$this->input->post('sexo'));
		array_push($data,$this->input->post('telefono'));
		array_push($data,$this->input->post('extension'));
		array_push($data,NULL);
		array_push($data,NULL);
		array_push($data,NULL);
		array_push($data,NULL);
		
		//$this->persona_md->InsertRecord($data);
		
		redirect(base_url("coordinador"));
	}
	
	public function editar() {
		$id=$this->input->post("hdnID");
		$data=array();
		
		array_push($data,$this->input->post('escuela'));
		array_push($data,2);
		array_push($data,$this->input->post('curp'));//username
		array_push($data,$this->input->post('password'));
		array_push($data,$this->input->post('nombre'));
		array_push($data,$this->input->post('apPatermo'));
		array_push($data,$this->input->post('apMaterno'));
		array_push($data,$this->input->post('fechaNac'));
		array_push($data,$this->input->post('email'));
		array_push($data,$this->input->post('rfc'));
		array_push($data,$this->input->post('curp'));
		array_push($data,$this->input->post('sexo'));
		array_push($data,$this->input->post('telefono'));
		array_push($data,$this->input->post('extension'));
		array_push($data,NULL);
		array_push($data,NULL);
		array_push($data,NULL);
		array_push($data,NULL);
		
		$this->persona_md->UpdateRecord($data,$id);
		
		redirect(base_url("usuario"));
	}
}
?>