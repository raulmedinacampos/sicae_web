<?php
class Ponencia extends CI_Controller {
	public function index() {
		$header["js"][] = "jquery.placeholder.min";
		$header["js"][] = "ponencia";
		
		$header["titulo"] = "Ponencia";
		
		$this->load->model("moneda_md");
		
		$params["monedas"] = $this->moneda_md->GetAll();
		
		$this->load->view('template/header', $header);
		$this->load->view('realizacion/ponencia', $params);
		$this->load->view('template/footer');
	}
	
	public function guardar() {
		$this->load->model("solicitud_md");
		$usr=$this->session->userdata('id');
		$data=array();
		
		array_push($data,'A');
		array_push($data, $usr);
		array_push($data,5);//Tipo Ponencia
		array_push($data,$this->input->post('evento'));
		array_push($data, $this->input->post('institucion'));
		array_push($data, $this->input->post('sede'));
		array_push($data, $this->input->post('fechaInicio'));
		array_push($data, $this->input->post('fechaFin'));
		array_push($data, 1);//Se manda 1 pero la validación es en el modelo
		array_push($data, $this->input->post('justificacion'));
		array_push($data, $this->input->post('fechaSalida'));
		array_push($data, $this->input->post('fechaRegreso'));
		array_push($data, $this->input->post('itinerario'));
		array_push($data, NULL);
		array_push($data, NULL);
		array_push($data, NULL);
		array_push($data, NULL);
		array_push($data, NULL);
		array_push($data, NULL);
		array_push($data, NULL);
		array_push($data, NULL);
		
		$id = $this->solicitud_md->InsertRecord($data);
		
		echo $id;
	}
	
	public function datos_ponencia() {
		$this->load->model("ponencia_md");
		$usr=$this->session->userdata('id');
		$sol=$this->input->post("solicitud_id");
		$ponencias=$this->input->post("tituloPonencia");
		$res=array();
		foreach($ponencias as $pn){
			$id_pon=$this->ponencia_md->insertRecord(array($sol,"A",$pn));
			array_push($res,$id_pon);
		}
		
		echo json_encode($res);//Son los id de las ponencias que se dieron de alta, ya que pueden ser más de una.
	}
	
	public function coautores() {
		$this->load->model("coautor_md");
		$sol=$this->input->post("solicitud_id");
		$ponencias=$this->input->post("id_ponencias");//recibir id de las ponencias como json para insertar coautores en sus respectivas ponencias
		$ctpn=1;
		$res=array();
		foreach($ponencias as $pn){
			$nombres=$this->input->post("coNombre_".$ctpn);
			$apps=$this->input->post("coApP_".$ctpn);//Revisar name del campo en la vista de las ponencias que se agregan
			$apms=$this->input->post("coApM_".$ctpn);
			foreach($nombres as $ky=>$vl){
				$data=array();
				array_push($data,$pn);
				array_push($data,$sol);
				array_push($data,"A");
				array_push($data,NULL);
				array_push($data,$vl);
				array_push($data,$apps[$ky]);
				array_push($data,$apms[$ky]);
				
				$rs=$this->coautor_md->insertRecord($data);
				
				array_push($res,$rs);
			}
		}
		
		echo json_encode($res);//Son los id de los coautores agregados
	}
		
	public function montos() {
		$this->load->model("monto_md");
		$this->load->model("apoyo_md");
		$aereo=$this->input->post('aereo');
		$terrestre=$this->input->post('terrestre');
		$inscripcion=$this->input->post('inscripcion');
		$estancia=$this->input->post('estancia');
		$otros=$this->input->post('otrosGastos');
		$sol=$this->input->post("solicitud_id");
		if($aereo!=""&&$aereo>0){
			$this->monto_md->InsertRecord(array(5,$sol,"a",$aereo,0,$this->input->post("espTAereo"),$this->input->post("moneda"),$this->input->post("moneda")));
			
		}
		if($terrestre!=""&&$terrestre>0){
			$this->monto_md->InsertRecord(array(4,$sol,"a",$terrestre,0,$this->input->post("espTTerrestre"),$this->input->post("moneda"),$this->input->post("moneda")));
			
		}
		if($inscripcion!=""&&$inscripcion>0){
			$this->monto_md->InsertRecord(array(2,$sol,"a",$inscripcion,0,"",$this->input->post("moneda"),$this->input->post("moneda")));
			
		}
		if($estancia!=""&&$estancia>0){
			$this->monto_md->InsertRecord(array(2,$sol,"a",$estancia,0,"",$this->input->post("moneda"),$this->input->post("moneda")));
			
		}
		if($otros!=""&&$otros>0){
			$this->monto_md->InsertRecord(array(9,$sol,"a",$otros,0,"",$this->input->post("moneda"),$this->input->post("moneda")));
			
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