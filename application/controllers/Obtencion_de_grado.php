<?php
class Obtencion_de_grado extends CI_Controller {
	public function index() {
		$header["js"][] = "grado";
		
		$header['titulo'] = "Obtención de grado";
		
		$perfil = $this->session->rol;
		$params["perfil"] = $perfil;
		
		$this->load->model("moneda_md");
		
		$params["monedas"] = $this->moneda_md->GetAll();
		
		$this->load->view('template/header', $header);
		$this->load->view('realizacion/grado', $params);
		$this->load->view('template/footer');
	}
	
	public function guardar() {
		$this->load->model("solicitud_md");
		$usr=$this->session->userdata('id');
		$data=array();
		
		array_push($data,'A');
		array_push($data, $usr);
		array_push($data,4);//Tipo obtención de grado
		array_push($data,$this->input->post('grado'));
		array_push($data, $this->input->post('universidad'));
		array_push($data, $this->input->post('sede'));
		array_push($data, $this->input->post('fechaInicio'));
		array_push($data, $this->input->post('fechaFin'));
		array_push($data, 1);//Se manda 1 pero la validación es en el modelo
		array_push($data, NULL);
		array_push($data, NULL);
		array_push($data, NULL);
		array_push($data, $this->input->post('itinerario'));
		array_push($data, NULL);
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
			$this->monto_md->InsertRecord(array(4,$sol,"a",$terrestre,0,$this->input->post("espTTerrestre"),$this->input->post("moneda"),$this->input->post("moneda")));
			
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