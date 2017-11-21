<?php
class Ponencia extends CI_Controller {
	public function index() {
		$this->load->model("solicitud_md");
		
		$ponencia = $this->solicitud_md->GetByTypePerson(5, $this->session->id);
		
		if ( $ponencia && sizeof($ponencia) > 0 ) {
			$this->listado();
		} else {
			$this->nueva();
		}
	}
	
	public function listado() {
		$header["js"][] = "jquery.dataTables.min";
		$header["js"][] = "solicitudes";
		
		$header["titulo"] = "Ponencia";
		
		$this->load->model("solicitud_md");
		
		$params["solicitudes"] = $this->solicitud_md->GetByTypePerson(5, $this->session->id);
		
		$this->load->view('template/header', $header);
		$this->load->view('listados/ponencia', $params);
		$this->load->view('template/footer');
	}
	
	public function nueva() {
		$header["js"][] = "jquery.placeholder.min";
		$header["js"][] = "ponencia";
		
		$header["titulo"] = "Ponencia";
		
		$this->load->model("solicitud_md");
		$this->load->model("ponencia_md");
		$this->load->model("coautor_md");
		$this->load->model("moneda_md");
		$this->load->model("monto_md");
		$this->load->model("apoyo_md");
		
		$idSol = $this->input->post("hdnID");
		
		$params["monedas"] = $this->moneda_md->GetAll();
		
		if ( $idSol ) {
			$params["ponencia"] = $this->solicitud_md->GetById($idSol);
		}
		
		if ( isset($params["ponencia"]) ) {
			$params["titulos"] = $this->ponencia_md->GetBySolicitud($params["ponencia"]["ID"]);
			$params["coautores"] = $this->coautor_md->GetBySolicitud($params["ponencia"]["ID"]);
			$params["tAereo"] = $this->monto_md->GetByTypeReq("5", $params["ponencia"]["ID"]);
			$params["tTerrestre"] = $this->monto_md->GetByTypeReq("4", $params["ponencia"]["ID"]);
			$params["seguro_int"] = $this->monto_md->GetByTypeReq("11", $params["ponencia"]["ID"]);
			$params["estancia"] = $this->monto_md->GetByTypeReq("2", $params["ponencia"]["ID"]);
			$params["inscripcion"] = $this->monto_md->GetByTypeReq("3", $params["ponencia"]["ID"]);
			$params["otros_gastos"] = $this->monto_md->GetByTypeReq("9", $params["ponencia"]["ID"]);
			$params["apoyo"] = $this->apoyo_md->GetBySolicitud($params["ponencia"]["ID"]);
		}
		
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
		array_push($data, $this->input->post('idioma'));
		array_push($data, NULL);
		array_push($data, NULL);
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
	
	public function datos_ponencia() {
		$this->load->model("ponencia_md");
		$usr=$this->session->userdata('id');
		$sol=$this->input->post("idSolicitud");
		$ponencias=$this->input->post("tituloPonencia");
		$res=array();
		$this->ponencia_md->CleanSol($sol);
		foreach($ponencias as $pn){
			$id_pon=$this->ponencia_md->insertRecord(array($sol,"A",$pn));
			array_push($res,$id_pon);
		}
		
		echo json_encode($res);//Son los id de las ponencias que se dieron de alta, ya que pueden ser más de una.
	}
	
	public function coautores() {
		$this->load->model("coautor_md");
		$sol=$this->input->post("idSolicitud");
		$ponencias=$this->input->post("idPonencias");
		$ponencias=explode(",", $ponencias);
		$ctpn=1;
		$res=array();
		
		$rs=$this->coautor_md->CleanSol($sol);
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
			$ctpn++;
		}
		
		echo json_encode($res);//Son los id de los coautores agregados
	}
		
	public function montos() {
		$this->load->model("monto_md");
		$this->load->model("apoyo_md");
		$aereo=$this->input->post('aereo');
		$terrestre=$this->input->post('terrestre');
		$seguro=$this->input->post('seguroViaje');
		$inscripcion=$this->input->post('inscripcion');
		$estancia=$this->input->post('estancia');
		$otros=$this->input->post('otrosGastos');
		$sol=$this->input->post("idSolicitud");
		
		$this->monto_md->CleanSol($sol);
		
		if($aereo!=""&&$aereo>0){
			$this->monto_md->InsertRecord(array(5,$sol,"A",$aereo,0,$this->input->post("espTAereo"),$this->input->post("moneda"),$this->input->post("moneda")));
			
		}
		
		if($terrestre!=""&&$terrestre>0){
			$this->monto_md->InsertRecord(array(4,$sol,"A",$terrestre,0,$this->input->post("espTTerrestre"),$this->input->post("moneda"),$this->input->post("moneda")));
			
		}
		
		if($seguro!=""&&$seguro>0){
			$this->monto_md->InsertRecord(array(11,$sol,"A",$seguro,0,"",$this->input->post("moneda"),$this->input->post("moneda")));
			
		}
		
		if($inscripcion!=""&&$inscripcion>0){
			$this->monto_md->InsertRecord(array(3,$sol,"A",$inscripcion,0,"",$this->input->post("moneda"),$this->input->post("moneda")));
			
		}
		
		if($estancia!=""&&$estancia>0){
			$this->monto_md->InsertRecord(array(2,$sol,"A",$estancia,0,"",$this->input->post("moneda"),$this->input->post("moneda")));
			
		}
		
		if($otros!=""&&$otros>0){
			$this->monto_md->InsertRecord(array(9,$sol,"A",$otros,0,$this->input->post("espOtros"),$this->input->post("moneda"),$this->input->post("moneda")));
			
		}
		
		if($this->input->post("apoyo")==1){
			$data=array();
			
			array_push($data,$sol);
			array_push($data,"A");
			array_push($data,$this->input->post("monedaAp"));
			array_push($data,$this->input->post("institucionAp"));
			array_push($data,$this->input->post("montoAp"));
			array_push($data,$this->input->post("especificacionAp"));
			
			$this->apoyo_md->CleanSupport($sol);
			$this->apoyo_md->InsertRecord($data);
		}
		
		echo $sol;
		
	}
}
?>