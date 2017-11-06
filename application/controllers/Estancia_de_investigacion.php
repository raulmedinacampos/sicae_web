<?php
class Estancia_de_investigacion extends CI_Controller {
	public function index() {
		$header["js"][] = "estancia";
		
		$header["titulo"] = "Estancia de investigación";
		
		$this->load->model("moneda_md");
		
		$params["monedas"] = $this->moneda_md->GetAll();
		
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
		array_push($data, NULL);
		array_push($data, $this->input->post('objetivo'));
		array_push($data, $this->input->post('beneficio'));
		array_push($data, NULL);
		array_push($data, NULL);
		array_push($data, NULL);
		array_push($data, NULL);
		array_push($data, NULL);
		
		$id = $this->solicitud_md->InsertRecord($data);
		
		echo $id;
	}
		
	public function montos() {
		$this->load->model("monto_md");
		$this->load->model("apoyo_md");
		$aereo=$this->input->post('aereo');
		$terrestre=$this->input->post('terrestre');
		$sol=$this->input->post("solicitud_id");
		if($aereo!=""&&$aereo>0){
			$this->monto_md->InsertRecord(array(5,$sol,"a",$aereo,0,$this->input->post("espTAereo"),$this->input->post("moneda"),$this->input->post("moneda")));
			
		}
		if($terrestre!=""&&$terrestre>0){
			$this->monto_md->InsertRecord(array(4,$sol,"a",$aereo,0,$this->input->post("espTAereo"),$this->input->post("moneda"),$this->input->post("moneda")));
			
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