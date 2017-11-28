<?php
class Estancia_de_investigacion extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('login_md');
		$this->login_md->validarSesAct();
	}
	public function index() {
		$this->load->model("solicitud_md");
	
		$estancia = $this->solicitud_md->GetByTypePerson(3, $this->session->id);
	
		if ( $estancia && sizeof($estancia) > 0 ) {
			$this->listado();
		} else {
			$this->nueva();
		}
	}
	
	public function listado() {
		$header["js"][] = "jquery.dataTables.min";
		$header["js"][] = "solicitudes";
	
		$header["titulo"] = "Estancia de investigación";
	
		$this->load->model("solicitud_md");
	
		$params["solicitudes"] = $this->solicitud_md->GetByTypePerson(3, $this->session->id);
	
		$this->load->view('template/header', $header);
		$this->load->view('listados/estancia', $params);
		$this->load->view('template/footer');
	}
	
	public function nueva() {
		$header["js"][] = "estancia";
		
		$header["titulo"] = "Estancia de investigación";
		
		$this->load->model("solicitud_md");
		$this->load->model("moneda_md");
		$this->load->model("monto_md");
		$this->load->model("apoyo_md");
		
		$idSol = $this->input->post("hdnID");
		
		$params["monedas"] = $this->moneda_md->GetAll();
		
		if ( $idSol ) {
			$params["estancia"] = $this->solicitud_md->GetById($idSol);
		}
		
		if ( isset($params["estancia"]) ) {
			$params["tAereo"] = $this->monto_md->GetByTypeReq("5", $params["estancia"]["ID"]);
			$params["tTerrestre"] = $this->monto_md->GetByTypeReq("4", $params["estancia"]["ID"]);
			$params["seguro_int"] = $this->monto_md->GetByTypeReq("11", $params["estancia"]["ID"]);
			$params["apoyo"] = $this->apoyo_md->GetBySolicitud($params["estancia"]["ID"]);
		}
		
		$this->load->view('template/header', $header);
		$this->load->view('realizacion/estancia', $params);
		$this->load->view('template/footer');
	}
	
	public function guardar() {
		$this->load->model("solicitud_md");
		$usr=$this->session->userdata('id');
		$data=array();
		
		array_push($data,'A');
		array_push($data, $usr);
		array_push($data,3);
		array_push($data,"");//FALTA CAMPO DE NOMBRE DEL EVENTO EN FORMULARIO DE SOLICITUD
		array_push($data, $this->input->post('universidad'));
		array_push($data, $this->input->post('sede'));
		array_push($data, $this->input->post('fechaInicio'));
		array_push($data, $this->input->post('fechaFin'));
		array_push($data, 1);
		array_push($data, $this->input->post('justificacion'));
		array_push($data, $this->input->post('fechaSalida'));
		array_push($data, $this->input->post('fechaRegreso'));
		array_push($data, $this->input->post('itinerario'));
		array_push($data, $this->input->post('programa'));
		array_push($data, $this->input->post('objetivo'));
		array_push($data, $this->input->post('beneficio'));
		array_push($data, NULL);
		array_push($data, NULL);
		array_push($data, NULL);
		array_push($data, NULL);
		array_push($data, NULL);
		
		if ( $this->input->post("idSolicitud") == 0 )
			$id = $this->solicitud_md->InsertRecord($data);
		else
			$id = $this->solicitud_md->UpdateRecord($data,$this->input->post("idSolicitud"));
		
		echo $id;
	}
		
	public function montos() {
		$this->load->model("monto_md");
		$this->load->model("apoyo_md");
		$aereo=$this->input->post('aereo');
		$terrestre=$this->input->post('terrestre');
		$seguro=$this->input->post('seguroViaje');
		$sol=$this->input->post("idSolicitud");
		
		$this->monto_md->CleanSol($sol);
		
		if($aereo!=""&&$aereo>0){
			$this->monto_md->InsertRecord(array(5,$sol,"A",$aereo,0,$this->input->post("espTAereo"),$this->input->post("moneda"),$this->input->post("moneda")));
		}
		
		if($terrestre!=""&&$terrestre>0){
			$this->monto_md->InsertRecord(array(4,$sol,"A",$terrestre,0,$this->input->post("espTTerrestre"),$this->input->post("moneda"),$this->input->post("moneda")));
		}
		
		if($seguro!=""&&$seguro>0&&$this->input->post('lugar')=="I"){
			$this->monto_md->InsertRecord(array(11,$sol,"A",$seguro,0,"",$this->input->post("moneda"),$this->input->post("moneda")));
		}
		
		$this->apoyo_md->CleanSupport($sol);
		
		if( $this->input->post("apoyo") == 1 ) {
			$data=array();
			
			array_push($data,$sol);
			array_push($data,"A");
			array_push($data,$this->input->post("monedaAp"));
			array_push($data,$this->input->post("institucionAp"));
			array_push($data,$this->input->post("montoAp"));
			array_push($data,$this->input->post("especificacionAp"));
			
			$this->apoyo_md->InsertRecord($data);
		}
		
		echo $sol;
	}
}