<?php
class Realizacion extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('persona_md');
	}
	
	public function index() {
		$header["js"][] = "realizacion";
		
		$header['titulo'] = "Realización";
		
		$perfil = $this->session->rol;
		$params["perfil"] = $perfil;
		
		$this->load->model("persona_md");
		$this->load->model("solicitud_md");
		$this->load->model("tipo_evento_md");
		$this->load->model("escuela_md");
		$this->load->model("moneda_md");
		$this->load->model("monto_md");
		$this->load->model("apoyo_md");
		
		$params["escuelas"] = $this->escuela_md->GetAll();
		$params["tipos_evento"] = $this->tipo_evento_md->GetAllOrganizer();
		$params["monedas"] = $this->moneda_md->GetAll();
		
		if ( $this->session->rol ) {
			$params["persona"] = $this->persona_md->GetById($this->session->id);
			$params["realizacion"] = $this->solicitud_md->GetByPerson($this->session->id);
		}
		
		if ( $params["realizacion"] ) {
			$params["realizacion"] = end($params["realizacion"]);
			$params["apoyo"] = $this->apoyo_md->GetBySolicitud($params["realizacion"]["ID"]);
		}
		
		$this->load->view('template/header', $header);
		$this->load->view('realizacion/realizacion', $params);
		$this->load->view('template/footer');
	}
	
	public function guardar() {
		$this->load->model("solicitud_md");
		$usr=$this->session->userdata('id');
		$data=array();
		
		array_push($data,'R');
		array_push($data, $usr);
		array_push($data, $this->input->post('tipoEvento'));
		array_push($data, $this->input->post('evento'));
		array_push($data, $this->input->post('institucion'));
		array_push($data, $this->input->post('sede'));
		array_push($data, $this->input->post('fechaInicio'));
		array_push($data, $this->input->post('fechaFin'));
		array_push($data, 0);//días adicionales
		array_push($data, NULL);
		array_push($data, NULL);
		array_push($data, NULL);
		array_push($data, NULL);
		array_push($data, $this->input->post('idioma'));
		array_push($data, $this->input->post('objetivo'));
		array_push($data, $this->input->post('beneficio'));
		array_push($data, $this->input->post('tParticipantes'));
		array_push($data, $this->input->post('tExpositores'));
		array_push($data, NULL);
		array_push($data, NULL);
		array_push($data, NULL);
		
		if ( $this->input->post("idSolicitud") == 0 )
			$id = $this->solicitud_md->InsertRecord($data);
		else
			$id = $this->solicitud_md->UpdateRecord($data,$this->input->post("idSolicitud"));
			
		echo $id;
	}
	
	public function expositores() {
		$this->load->model("expositor_md");
		$sol=$this->input->post("idSolicitud");
		$res=array();
		$nombres=$this->input->post("exNombre");
		$apps=$this->input->post("exApP");//Revisar name del campo en la vista de las ponencias que se agregan
		$apms=$this->input->post("exApM");
		$proc=$this->input->post("exProcedencia");
		$ded=$this->input->post("exDedicacion");
		$lic=$this->input->post("exLicenciatura");
		$maes=$this->input->post("exMaestria");
		$doc=$this->input->post("exDoctorado");
		$esp=$this->input->post("exEspecialidad");
		$tema=$this->input->post("exTema");
		$act=$this->input->post("exActividad");
		$horario=$this->input->post("exHorario");
		foreach($nombres as $ky=>$vl){
			$data=array();
			array_push($data,$sol);
			array_push($data,"R");
			array_push($data,NULL);
			array_push($data,$vl);
			array_push($data,$apps[$ky]);
			array_push($data,$apms[$ky]);
			array_push($data,$proc[$ky]);
			array_push($data,$ded[$ky]);
			array_push($data,$lic[$ky]);
			array_push($data,$maes[$ky]);
			array_push($data,$doc[$ky]);
			array_push($data,$esp[$ky]);
			array_push($data,$tema[$ky]);
			array_push($data,$act[$ky]);
			array_push($data,$horario[$ky]);
				
			$rs=$this->expositor_md->insertRecord($data);
			
			array_push($res,$rs);
		}
		
		echo json_encode($res);//Son los id de los expositores agregados
	}
	
	public function datos_banco() {
		$data=array();
		$usr=$this->session->userdata('id');
		
		array_push($data, $this->input->post('banco'));
		array_push($data, $this->input->post('sucursal'));
		array_push($data, $this->input->post('cuentaBanco'));
		array_push($data, str_replace(" ", "", $this->input->post('clabe')));
		
		$id = $this->persona_md->SetCuentaBancaria($data,$usr);
		
		//redirect(base_url("usuario"));
	}
	
		
	public function montos() {
		$this->load->model("monto_md");
		$this->load->model("apoyo_md");
		$aereo=$this->input->post('aereo');
		$terrestre=$this->input->post('terrestre');
		$pago_exp=$this->input->post('pExpositores');
		$viat_exp=$this->input->post('vExpositores');
		$material=$this->input->post('material');
		$otros=$this->input->post('otros');
		$caf=$this->input->post('cafeteria');
		$sol=$this->input->post("idSolicitud");
		if($aereo!=""&&$aereo>0){
			$this->monto_md->InsertRecord(array(5,$sol,"R",$aereo,0,$this->input->post("espTAereo"),$this->input->post("moneda"),$this->input->post("moneda")));
			
		}
		if($terrestre!=""&&$terrestre>0){
			$this->monto_md->InsertRecord(array(4,$sol,"R",$terrestre,0,$this->input->post("espTTerrestre"),$this->input->post("moneda"),$this->input->post("moneda")));
			
		}
		if($pago_exp!=""&&$pago_exp>0){
			$this->monto_md->InsertRecord(array(6,$sol,"R",$pago_exp,0,"",$this->input->post("moneda"),$this->input->post("moneda")));
			
		}
		if($viat_exp!=""&&$viat_exp>0){
			$this->monto_md->InsertRecord(array(7,$sol,"R",$viat_exp,0,"",$this->input->post("moneda"),$this->input->post("moneda")));
			
		}
		if($material!=""&&$material>0){
			$this->monto_md->InsertRecord(array(8,$sol,"R",$material,0,"",$this->input->post("moneda"),$this->input->post("moneda")));
			
		}
		if($otros!=""&&$otros>0){
			$this->monto_md->InsertRecord(array(9,$sol,"R",$otros,0,$this->input->post("espOtros"),$this->input->post("moneda"),$this->input->post("moneda")));
			
		}
		if($caf!=""&&$caf>0){
			$this->monto_md->InsertRecord(array(10,$sol,"R",$caf,0,"",$this->input->post("moneda"),$this->input->post("moneda")));
			
		}
		if($this->input->post("apoyo")==1){
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
?>