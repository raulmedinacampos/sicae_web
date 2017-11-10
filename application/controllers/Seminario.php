<?php
class Seminario extends CI_Controller {
	public function index() {
		$header["js"][] = "seminario";
		
		$header["titulo"] = "Seminarios y otros";
		
		$this->load->model("tipo_evento_md");
		$this->load->model("solicitud_md");
		$this->load->model("moneda_md");
		$this->load->model("monto_md");
		$this->load->model("apoyo_md");
		
		$params["tipos_evento"] = $this->tipo_evento_md->GetAll();
		$params["monedas"] = $this->moneda_md->GetAll();
		$params["seminario"] = $this->solicitud_md->GetByTypePerson(1, $this->session->id);
		
		if ( !$params["seminario"] ) {
			$params["seminario"] = $this->solicitud_md->GetByTypePerson(2, $this->session->id);
		}
		
		if ( !$params["seminario"] ) {
			$params["seminario"] = $this->solicitud_md->GetByTypePerson(7, $this->session->id);
		}
		
		if ( !$params["seminario"] ) {
			$params["seminario"] = $this->solicitud_md->GetByTypePerson(8, $this->session->id);
		}
		
		if ( $params["seminario"] ) {
			$params["seminario"] = end($params["seminario"]);
			$params["tAereo"] = $this->monto_md->GetByTypeReq("5", $params["seminario"]["ID"]);
			$params["tTerrestre"] = $this->monto_md->GetByTypeReq("4", $params["seminario"]["ID"]);
			$params["estancia"] = $this->monto_md->GetByTypeReq("2", $params["seminario"]["ID"]);
			$params["inscripcion"] = $this->monto_md->GetByTypeReq("3", $params["seminario"]["ID"]);
			$params["apoyo"] = $this->apoyo_md->GetBySolicitud($params["seminario"]["ID"]);
		}
		
		$this->load->view('template/header', $header);
		$this->load->view('realizacion/seminario', $params);
		$this->load->view('template/footer');
	}
	
	
	public function guardar() {
		$this->load->model("solicitud_md");
		$usr=$this->session->userdata('id');
		$data=array();
		
		array_push($data,'A');
		array_push($data, $usr);
		array_push($data,$this->input->post('tipoEvento'));
		array_push($data,$this->input->post('evento'));
		array_push($data, $this->input->post('institucion'));
		array_push($data, $this->input->post('sede'));
		array_push($data, $this->input->post('fechaInicio'));
		array_push($data, $this->input->post('fechaFin'));
		array_push($data, 1);
		array_push($data, $this->input->post('justificacion'));
		array_push($data, $this->input->post('fechaSalida'));
		array_push($data, $this->input->post('fechaRegreso'));
		array_push($data, $this->input->post('itinerario'));
		array_push($data, NULL);
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
		$inscripcion=$this->input->post('inscripcion');
		$estancia=$this->input->post('estancia');
		$sol=$this->input->post("idSolicitud");
		if($aereo!=""&&$aereo>0){
			$this->monto_md->InsertRecord(array(5,$sol,"a",$aereo,0,$this->input->post("espTAereo"),$this->input->post("moneda"),$this->input->post("moneda")));
			
		}
		if($terrestre!=""&&$terrestre>0){
			$this->monto_md->InsertRecord(array(4,$sol,"a",$terrestre,0,$this->input->post("espTTerrestre"),$this->input->post("moneda"),$this->input->post("moneda")));
			
		}
		if($inscripcion!=""&&$inscripcion>0){
			$this->monto_md->InsertRecord(array(3,$sol,"a",$inscripcion,0,"",$this->input->post("moneda"),$this->input->post("moneda")));
			
		}
		if($estancia!=""&&$estancia>0){
			$this->monto_md->InsertRecord(array(2,$sol,"a",$estancia,0,"",$this->input->post("moneda"),$this->input->post("moneda")));
			
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