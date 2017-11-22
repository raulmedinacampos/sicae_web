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
		$params["tipos_evento"] = $this->tipo_evento_md->GetAllOrganizer();
		
		if ( $this->session->rol ) {
			$params["persona"] = $this->persona_md->GetById($this->session->id);
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
		
		array_push($data,$this->input->post('escuelaC'));
		array_push($data,2);
		array_push($data, NULL);
		array_push($data, NULL);
		array_push($data,$this->input->post('nombreC'));
		array_push($data,$this->input->post('apPaternoC'));
		array_push($data,$this->input->post('apMaternoC'));
		array_push($data,$this->input->post('fechaNacC'));
		array_push($data,$this->input->post('emailC'));
		array_push($data, NULL);
		array_push($data,strtoupper($this->input->post('curpC')));
		array_push($data,$this->input->post('sexoC'));
		array_push($data,$this->input->post('telefonoC'));
		array_push($data,$this->input->post('extensionC'));
		array_push($data,NULL);
		array_push($data,NULL);
		array_push($data,NULL);
		array_push($data,NULL);
		
		$id = $this->persona_md->InsertRecord($data);
		$usr = $this->persona_md->GetById($id);
		
		$nom = trim($usr["NOMBRE"]." ".$usr["APELLIDO_P"]." ".$usr["APELLIDO_M"]);
		$id = $usr["ID"];
		$rol = $usr["TIPO_PERSONA_ID"];
		$name = $usr["USERNAME"];
		$curp = $usr["CURP"];
		$this->session->set_userdata(array("nom"=>$nom,"rol"=>$rol,"username"=>$name,"id"=>$id,"curp"=>$curp));
		
		redirect(base_url("coordinador"));
	}
	
	public function editar() {
		$id=$this->input->post("hdnID");
		$data=array();
		
		array_push($data,$this->input->post('escuela'));
		array_push($data,2);
		array_push($data, NULL);
		array_push($data, NULL);
		array_push($data,$this->input->post('nombre'));
		array_push($data,$this->input->post('apPaterno'));
		array_push($data,$this->input->post('apMaterno'));
		array_push($data,$this->input->post('fechaNac'));
		array_push($data,$this->input->post('email'));
		array_push($data, NULL);
		array_push($data,$this->input->post('curp'));
		array_push($data,$this->input->post('sexo'));
		array_push($data,$this->input->post('telefono'));
		array_push($data,$this->input->post('extension'));
		array_push($data, $this->input->post('banco'));
		array_push($data, $this->input->post('sucursal'));
		array_push($data, $this->input->post('cuentaBanco'));
		array_push($data, str_replace(" ", "", $this->input->post('clabe')));
		array_push($data,NULL);
		
		$this->persona_md->UpdateRecord($data,$id);
		
		//redirect(base_url("coordinador"));
	}
}
?>