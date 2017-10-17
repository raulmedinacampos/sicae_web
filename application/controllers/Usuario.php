<?php
class Usuario extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('persona_md');
	}
	
	public function index() {
		$header['js'][] = "bootstrap-show-password.min";
		$header["js"][] = "jquery.placeholder.min";
		$header["js"][] = "usuario";
		
		$this->load->model("escuela_md");
		$this->load->model("nombramiento_md");
		$this->load->model("nivel_academico_md");
		
		$perfil = $this->session->rol;
		$params["perfil"] = $perfil;
		
		if ( $this->session->rol ) {
			$params["persona"] = $this->persona_md->GetById($this->session->id);
			$this->load->helper("telefono");
			$telefono = SepareteLada($params["persona"]["TELEFONO"]);
			list($params["persona"]["LADA"], $params["persona"]["TELEFONO"]) = $telefono;
		}
		
		switch ( $perfil ) {
			case 1:
				$params["perfilC"] = "profesor";
				break;
			case 3:
				$params["perfilC"] = "alumno";
				break;
			default:
				break;
		}
		
		$params["escuelas"] = $this->escuela_md->GetAll();
		$params["nombramientos"] = $this->nombramiento_md->GetAll();
		$params["niveles_academicos"] = $this->nivel_academico_md->GetAll();
		
		$this->load->view('template/header', $header);
		$this->load->view('usuarios/nuevo', $params);
		$this->load->view('template/footer');
	}
	
	public function consultar() {
		$id = $this->input->post("id");
		$persona = $this->persona_md->GetById($id);
		echo json_encode($persona);
	}
	
	public function agregar() {
		$data=array();
		
		array_push($data, $this->input->post('escuela'));
		array_push($data, $this->input->post('rPerfil'));
		array_push($data, strtoupper($this->input->post('curp')));//username
		array_push($data, $this->input->post('password'));
		array_push($data, $this->input->post('nombre'));
		array_push($data, $this->input->post('apPaterno'));
		array_push($data, $this->input->post('apMaterno'));
		array_push($data, $this->input->post('fechaNac'));
		array_push($data, $this->input->post('email'));
		array_push($data, strtoupper($this->input->post('rfc')));
		array_push($data, strtoupper($this->input->post('curp')));
		array_push($data, $this->input->post('sexo'));
		array_push($data, $this->input->post('telefono'));
		array_push($data, $this->input->post('extension'));
		array_push($data, NULL);
		array_push($data, NULL);
		array_push($data, NULL);
		array_push($data, NULL);
		
		$id = $this->persona_md->InsertRecord($data);
		$usr = $this->persona_md->GetById($id);
		
		$nom = trim($usr["NOMBRE"]." ".$usr["APELLIDO_P"]." ".$usr["APELLIDO_M"]);
		$id = $usr["ID"];
		$rol = $usr["TIPO_PERSONA_ID"];
		$name = $usr["USERNAME"];
		$curp = $usr["CURP"];
		$this->session->set_userdata(array("nom"=>$nom,"rol"=>$rol,"username"=>$name,"id"=>$id,"curp"=>$curp));
		
		redirect(base_url("usuario"));
	}
	
	public function editar() {
		$id=$this->input->post("hdnID");
		$data=array();
		
		array_push($data,$this->input->post('escuela'));
		array_push($data,4);
		//array_push($data,$this->input->post('perfil'));//revisar como recibo tipo de usuario
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